<?php

namespace App\Services;

/**
 * LevelUp API PHP Wrapper - version 1.2.1
 *
*/

/**
 * Ensure that CURL, JSON and Memcached PHP extensions are present
 */
if (!function_exists('curl_init')) {
  throw new Exception('The LevelUpApi PHP class is unable to find the CURL PHP extension.');
}
if (!function_exists('json_decode')) {
  throw new Exception('The LevelUpApi PHP class is unable to find the JSON PHP extension.');
}
if (!class_exists('Memcached')) {
  //throw new Exception('The LevelUpApi PHP class is unable to find the Memcached extension.');
}

if (!function_exists('is_json')) {
    function is_json($json) {
        json_decode($json);
        return (json_last_error() == JSON_ERROR_NONE);
    }
}

class LevelUpApi {
    private $_apiUrl;
    private $_token;
    private $_headers;
    private $_memcached;
    private $_disable_cache;
    private $_hash;
    private $_version;
    private $_screen_width;
    private $_browser_token;
    private $_ip;

    public $http_status = 200;
    public $content_type;
    public $result;
    public $error;
    public $curl_info;

    function __construct()
    {
        $cacheUrl = getenv('CACHEURL');
        $cachePort = getenv('CACHEPORT');
        $this->_apiUrl = getenv('APIURL');
        $this->_disable_cache = true;
        $this->_version = '2.0';

        // Enable MemCache support in non-Debug (Production) mode.
        if($this->_disable_cache == false)
        {
            $this->_memcached = new Memcached();
            $this->_memcached->setOption(Memcached::OPT_DISTRIBUTION, Memcached::DISTRIBUTION_CONSISTENT);
            $this->_memcached->setOption(Memcached::OPT_BINARY_PROTOCOL, TRUE);

            // Add each configured MemCache server.
            $urls = explode(',', $cacheUrl);
            foreach($urls as $i) {
               $this->_memcached->addServer($i, $cachePort);
            }
        }

        // Get users IP
        $ipAddress = $_SERVER['REMOTE_ADDR'];
        $x_forward = empty($_SERVER['HTTP_X_FORWARDED_FOR']) ? 'NULL' : $_SERVER['HTTP_X_FORWARDED_FOR'];
        if (array_key_exists('HTTP_X_FORWARDED_FOR', $_SERVER))
        {
            $x_forward_array = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);
            sizeof($x_forward_array) <= 2 ?: array_pop($x_forward_array);
            $ipAddress = implode($x_forward_array,',');
        }

        $this->_ip = $ipAddress;

        //Token used to identify browser
        $browser_token = uniqid('', true);
        if(!isset($_COOKIE['mobi']))
        {
            setcookie('mobi', $browser_token , time() + (10 * 365 * 24 * 60 * 60), "/");
        }else{
            $browser_token = $_COOKIE['mobi'];
        }

        $this->_browser_token = $browser_token;

        $this->_screen_width = 320;
    }

    private function _api_headers($format='application/json') {
        $this->_headers = array();
        $this->_headers[] = 'Content-type: '. $format;
        $this->_headers[] = 'LU-ver: Mobi/'. $this->_version;
        $this->_headers[] = 'LU-Sw: '. $this->_screen_width;
        $this->_headers[] = 'Authorization: Bearer '. $this->_token;
        $this->_headers[] = 'LU-Cookie: '. $this->_browser_token;
        $this->_headers[] = 'X-Forwarded-For: '. $this->_ip;
    }

    private function _call_api($url, $method='POST', $params='', $decode=TRUE) {
        $this->http_status = NULL;
        $this->content_type = NULL;
        $this->result = NULL;
        $this->error = FALSE;
        $fields = '';
        if (($method == 'POST' || $method == 'PUT' || $method == 'DELETE') && $params != '') {
            $fields = (is_array($params)) ? http_build_query($params) : $params;
        }
        if ($method == 'PUT' || $method == 'POST' || $method == 'DELETE') {
            $this->_headers[] = 'Content-Length: '. strlen($fields);
        }
        // Add to opts when API has support
        //CURLOPT_ENCODING => "gzip",
        $opts = array(
                CURLOPT_CONNECTTIMEOUT => 10,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_VERBOSE        => false,
                CURLOPT_SSL_VERIFYPEER => false,
                CURLOPT_TIMEOUT        => 60,
                CURLINFO_HEADER_OUT    => true,
                CURLOPT_URL            => $url,
                CURLOPT_HTTPHEADER     => $this->_headers
                );
        if (($method == 'POST' || $method == 'PUT' || $method == 'DELETE') && $params != '') {
            $opts[CURLOPT_POSTFIELDS] = $fields; 
        }
        
        if ($method == 'POST' && is_array($params)) {
            $opts[CURLOPT_POST] = count($params);
        } elseif ($method == 'PUT') {
            $opts[CURLOPT_CUSTOMREQUEST] = 'PUT';
        } elseif ($method == 'DELETE') {
            $opts[CURLOPT_CUSTOMREQUEST] = 'DELETE';
        } elseif ($method == 'POST') {
            $opts[CURLOPT_POST] = TRUE;
        }
        $ch = curl_init();
        curl_setopt_array($ch, $opts);
        $result = curl_exec($ch);
        $this->http_status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $this->content_type = curl_getinfo($ch, CURLINFO_CONTENT_TYPE);
        $this->curl_info = curl_getinfo($ch);
        curl_close($ch);
        if ($this->http_status != 200) {
            // Problem with API call, we received an HTTP status code other than 200
            $this->error = TRUE;
            error_log($url.': http_status'.$this->http_status .' result - '.$result);
        }
        $this->result = (($decode === TRUE) && (is_json($result) === TRUE)) ? json_decode($result) : $result;
    }

    private function _set_cache($key,$vales,$time = 3600)
    {
        if($this->_disable_cache == false)
        {
            $this->_memcached->set($key, $vales, $time);
        }
    }

    private function _get_cache($key)
    {
        if($this->_disable_cache == false)
        {
            $get_result = $this->_memcached->get($key);
            return ($get_result);
        }
    }

    private function _del_cache($key)
    {
        if($this->_disable_cache == false)
        {
            $this->_memcached->delete($key);
        }
    }

    private function token_checker()
    {
        if (!isset($this->_token))
            throw new Exception('User token is not set, obtain an token using authenticate($mode, $credentials)');

        if (!isset($this->_hash))
            throw new Exception('User hash is not set, obtain an token using authenticate($mode, $credentials) then set the set_hashcode($hashcode)');            
    }

    public function get_last_http_status()
    {
        return $this->http_status;
    }

    /**
     *   Return the version of the LevelUp API.
     */
    public function get_version()
    {
        $key = 'version';
        $result = $this->_get_cache($key);

        if(!$result)
        {
            $this->_api_headers();

            $url = $this->_apiUrl .$key;
            $this->_call_api($url, 'GET');
            $result = $this->result;
            $this->_set_cache($key,$result);
        }
        return $result;
    }

    /**
     *  Set Token
     */
    public function set_token($token)
    {
        $this->_token = $token;
    }

    /**
     *  Set Users screenwidth
    */
    public function set_screen_width($screen_width)
    {
        $this->_screen_width = $screen_width;
    }

    /**
     * Set users hash code
    */
    public function set_hashcode($hashcode)
    {
       $this->_hash = $hashcode;
    }

    /**
     *   Used to register a new account or re-activate an existing account.
     */
    public function authenticate($mode,$credentials)
    {
        if(!is_int ($mode))
        {
            throw new Exception('Unsupported mode');
        }
        $url = $this->_apiUrl ."authenticate";

        $this->_headers = array();
        $this->_headers[] = 'LU-ver: Mobi/'. $this->_version;
        $this->_headers[] = "Content-Type: application/json";
        $this->_headers[] = 'LU-Cookie: '. $this->_browser_token;
        $this->_headers[] = 'X-Forwarded-For: '. $this->_ip;

        $params = array(
            'mode'              => $mode,
            'credentials'       => $credentials
        );

        $this->_call_api($url, 'POST', json_encode($params));

        $result = $this->result;

        return $result;
    }

    /**
     *   Retrieve the user profile.
     *
     *   Url: http://levelup.mxit.com/profile
     *
     *   NOTE: This method requires the user's token
     */
    public function get_profile()
    {
        $this->token_checker();

        $call = "profile";
        $key = ($call.$this->_hash);
        $result = $this->_get_cache($key);

        if(!$result)
        {
            $this->_api_headers();
            $url = $this->_apiUrl .$call;
            $this->_call_api($url, 'GET');
            $result = $this->result;

            $this->_set_cache($key,$result);
        }
        return $result;
    }

    /**
     *   Update the user profile.
     *
     *   Url: http://levelup.mxit.com/profile
     *
     *   NOTE: This method requires the user's token
     */
    public function set_profile($data)
    {     
        $this->token_checker();

        $this->_api_headers();
        $url = $this->_apiUrl ."profile";

        $this->_call_api($url, 'PUT', json_encode($data));

        $this->_del_cache("profile".$this->_hash);

        return $this->result;
    }

    /**
     *   Update the user profile.
     *
     *   Url: http://levelup.mxit.com/profile/location
     *
     *   NOTE: This method requires the user's token
     */
    public function set_profile_location($data)
    {     
        $this->token_checker();

        $this->_api_headers();
        $url = $this->_apiUrl ."profile/location";

        $this->_call_api($url, 'PUT', json_encode($data));

        $this->_del_cache("profile".$this->_hash);

        return $this->result;
    }

    /**
     *   Retrieve the user's current points and level information.
     *
     *   Url: http://levelup.mxit.com/points
     *
     *   NOTE: This method requires the user's token
     */
    public function get_points()
    {
        $this->token_checker();

        $call = "points";
        $key = ($call.$this->_hash);
        $result = $this->_get_cache($key);

        if(!$result)
        {
            $this->_api_headers();
            $url = $this->_apiUrl .$call;
            $this->_call_api($url, 'GET');
            $result = $this->result;

            $this->_set_cache($key,$result);
        }

        return $result;
    }

    /**
     *   Retrieve the user's current points and level information.
     *
     *   Url: http://levelup.mxit.com/v2/points
     *
     *   NOTE: This method requires the user's token
     */
    public function get_v2_points()
    {
        $this->token_checker();

        $call = "v2/points";
        $key = ($call.$this->_hash);
        $result = $this->_get_cache($key);

        if(!$result)
        {
            $this->_api_headers();
            $url = $this->_apiUrl .$call;
            $this->_call_api($url, 'GET');
            $result = $this->result;

            $this->_set_cache($key,$result);
        }

        return $result;
    }

    /**
     *   Retrieve the user's points history.
     *
     *   Url: http://levelup.mxit.com/history
     *
     *   NOTE: This method requires the user's token
     */
    public function get_history()
    {
        $this->token_checker();

        $call = "history";
        $key = ($call.$this->_hash);
        $result = $this->_get_cache($key);

        if(!$result)
        {
            $this->_api_headers();
            $url = $this->_apiUrl .$call;
            $this->_call_api($url, 'GET');
            $result = $this->result;

            $this->_set_cache($key,$result);
        }
        return $result;
    }

    /**
     *   Retreive the list of reward categories.
     *
     *   Url: http://levelup.mxit.com/rewardcategories
     *
     *   NOTE: This method requires the user's token
     */
    public function get_rewardcategories()
    {
        $this->token_checker();

        $call = "rewardcategories";
        $key = $call.$this->_hash;
        $result = $this->_get_cache($key);

        if(!$result)
        {
            $this->_api_headers();
            $url = $this->_apiUrl .$call;
            $this->_call_api($url, 'GET');
            $result = $this->result;

            $this->_set_cache($key,$result);
        }
        return $result;
    }

    /**
     *   Retrieve the list of available rewards for a LevelUp user.
     *
     *   Url: http://levelup.mxit.com/rewards
     *
     *   NOTE: This method requires the user's token
     */
    public function get_rewards()
    {
        $this->token_checker();

        $call = "rewards";
        $key = $call.$this->_hash;
        $result = $this->_get_cache($key);

        if(!$result)
        {
            $this->_api_headers();
            $url = $this->_apiUrl .$call;
            $this->_call_api($url, 'GET');
            $result = $this->result;

            $this->_set_cache($key,$result);
        }
        return $result;
    }

    /**
     *   Retrieve information on a specific rewards.
     *
     *   Url: http://levelup.mxit.com/rewards/{id}
     *
     *   NOTE: This method requires the user's token
     */
    public function get_reward($id)
    {
        $this->token_checker();

        $call = "reward/".$id;
        $this->_api_headers();
        $url = $this->_apiUrl .$call;
        $this->_call_api($url, 'GET');
        $result = $this->result;

        return $result;
    }

    /**
     *   An action has been taken on a reward.
     *
     *   Url: http://levelup.mxit.com/reward/{id}
     *
     *   NOTE: This method requires the user's token
     */
    public function post_reward($id,$data)
    {
        $this->token_checker();

        $this->_api_headers();
        $url = $this->_apiUrl ."reward/".$id;

        $this->_call_api($url, 'POST', json_encode($data));

        $this->_del_cache("points".$this->_hash);
        $this->clear_history();

        return $this->result;
    }

    /**
     *   Retrieve the list of vouchers allocated to this user.
     *
     *   Url: http://levelup.mxit.com/vouchers
     *
     *   NOTE: This method requires the user's token
     */
    public function get_vouchers()
    {
        $this->token_checker();

        $call = "vouchers";

        $this->_api_headers();
        $url = $this->_apiUrl .$call;
        $this->_call_api($url, 'GET');
        $result = $this->result;

        return $result;
    }

    /**
     *   Cancel a voucher.
     *
     *   Url: http://levelup.mxit.com/voucher/{id}
     *
     *   NOTE: This method requires the user's token
     */
    public function delete_voucher($id)
    {
        $this->token_checker();

        $this->_api_headers();
        $url = $this->_apiUrl ."voucher/".$id;
        $this->_call_api($url, 'DELETE');

        $this->_del_cache("points".$this->_hash);
        $this->clear_history();

        return $this->result;
    }

    /**
     *   Retrieve information on a specific voucher.
     *
     *   Url: http://levelup.mxit.com/voucher/{id}
     *
     *   NOTE: This method requires the user's token
     */
    public function get_voucher($id)
    {
        $this->token_checker();

        $call = "voucher/".$id;
        $this->_api_headers();
        $url = $this->_apiUrl .$call;
        $this->_call_api($url, 'GET');
        $result = $this->result;

        return $result;
    }

    /**
     *   Activate a Promo Code.
     *
     *   Url: http://levelup.mxit.com/post_promocode/{promocode}
     *
     *   NOTE: This method requires the user's token
     */
    public function post_promocode($promocode)
    {
        $this->token_checker();

        $this->_api_headers();
        $promocode = trim($promocode);
        $url = $this->_apiUrl ."promocode/".$promocode;

        $this->_call_api($url, 'POST');

        $this->_del_cache("points".$this->_hash);
        $this->_del_cache("profile".$this->_hash);
        $this->clear_history();

        return $this->result;
    }

    /**
     *   Retrieve the list of transactions.
     *
     *   Url: http://levelup.mxit.com/transactions
     *
     *   NOTE: This method requires the user's token
     */
    public function get_transactions($txtype=3,$offset=0,$count=15)
    {
        $this->token_checker();

        $params = array(  'txtype' => $txtype,
                        'offset' => $offset,
                        'count' => $count);

        $call = "transactions";
        $call .= '?' . http_build_query($params);

        $key = ($call.$this->_hash);
        $result = $this->_get_cache($key);

        if(!$result)
        {
            $this->_api_headers();
            $url = $this->_apiUrl .$call;
            $this->_call_api($url, 'GET');
            $result = $this->result;

            $this->_set_cache($key,$result);
        }
        return $result;
    }

    /**
     *   Retrieve information on all channels.
     *
     *   Url: http://levelup.mxit.com/channels
     *
     *   NOTE: This method requires the user's token
     */
    public function get_channels()
    {
        $this->token_checker();

        $call = "channels";
        $key = ($call.$this->_hash);
        $result = $this->_get_cache($key);

        if(!$result)
        {
            $this->_api_headers();
            $url = $this->_apiUrl .$call;
            $this->_call_api($url, 'GET');
            $result = $this->result;

            $this->_set_cache($key,$result);
        }
        return $result;
    }

    /**
     *   Retrieve information on a specific channel.
     *
     *   Url: http://levelup.mxit.com/channel/{id}
     *
     *   NOTE: This method requires the user's token
     */
    public function get_channel($id)
    {
        $this->token_checker();

        $call = "channel/".$id;
        $key = ($call.$this->_hash);
        $result = $this->_get_cache($key);

        if(!$result)
        {
            $this->_api_headers();
            $url = $this->_apiUrl .$call;
            $this->_call_api($url, 'GET');
            $result = $this->result;

            $this->_set_cache($key,$result);
        }
        return $result;
    }

    /**
     *   Retrieve the mailbox messages for the account.
     *
     *   Url: http://levelup.mxit.com/messages
     *
     *   NOTE: This method requires the user's token
     */
    public function get_messages()
    {
        $this->token_checker();

        $call = "messages";
        $key = ($call.$this->_hash);
        $result = $this->_get_cache($key);

        if(!$result)
        {
            $this->_api_headers();
            $url = $this->_apiUrl .$call;
            $this->_call_api($url, 'GET');
            $result = $this->result;

            $expire = 3600;

            if(isset($result[0]->expire))
            {
                $expire = $result[0]->expire;
            }

            $this->_set_cache($key,$result,$expire);
        }
        return $result;
    }

    /**
     *   An action has been taken on a message.
     *
     *   Url: http://levelup.mxit.com/message/{id}
     *
     *   NOTE: This method requires the user's token
     */
    public function post_message($id,$data)
    {
        $this->token_checker();

        $this->_api_headers();
        $url = $this->_apiUrl ."message/".$id;

        $this->_call_api($url, 'POST', json_encode($data));

        $this->_del_cache("messages".$this->_hash);

        return $this->result;
    }

    /**
     *   Delete a specific mailbox message.
     *
     *   Url: http://levelup.mxit.com/message/{id}
     *
     *   NOTE: This method requires the user's token
     */
    public function delete_message($id)
    {
        $this->token_checker();

        $this->_api_headers();
        $url = $this->_apiUrl ."message/".$id;

        $this->_call_api($url, 'DELETE');

        $this->_del_cache("messages".$this->_hash);

        return $this->result;
    }

    /**
     *   Retrieve the list of challenge categories
     *
     *   Url: http://levelup.mxit.com/challengecategories
     *
     *   NOTE: This method requires the user's token
     */
    public function get_challengecategories()
    {
        $this->token_checker();

        $call = "challengecategories";
        $key = ($call.$this->_hash);
        $result = $this->_get_cache($key);

        if(!$result)
        {
            $this->_api_headers();
            $url = $this->_apiUrl .$call;
            $this->_call_api($url, 'GET');
            $result = $this->result;

            $this->_set_cache($key,$result);
        }
        return $result;
    }

    /**
     *   Retrieve list of challenges.
     *
     *   Url: http://levelup.mxit.com/challenges?category=X[&topic=Y]&offset=0&count=2
     *                               /challenges?tag=X&offset=0&count=2
     *
     *   NOTE: This method requires the user's token
     */
    public function get_challenges($params=array(),$time = 3600)
    {
        $this->token_checker();

        $call = "challenges";

        if(!empty($params))
        {
            $call .= '?' . http_build_query($params);
        }
        
        $key = ($call.$this->_hash);
        $this->_api_headers();
        $url = $this->_apiUrl .$call;
        $this->_call_api($url, 'GET');
        $result = $this->result;

        return $result;
    }

    /**
     *   Retrieve challenge.
     *
     *   Url: http://levelup.mxit.com/challenge/{id}
     *
     *   NOTE: This method requires the user's token
     */
    public function get_challenge($id,$time = 3600)
    {
        $this->token_checker();

        $call = "challenge/".$id;
       
        $key = ($call.$this->_hash);
        $result = $this->_get_cache($key);

        if(!$result)
        {
            $this->_api_headers();
            $url = $this->_apiUrl .$call;
            $this->_call_api($url, 'GET');
            $result = $this->result;

            $this->_set_cache($key,$result,$time);
        }
        return $result;
    }    

    /**
     *   Post answer to challenge
     *
     *   Url: http://levelup.mxit.com/challenge
     *
     *   NOTE: This method requires the user's token
     */
    public function answer_challenge($id,$data)
    {
        $this->token_checker();

        $this->_api_headers();
        $url = $this->_apiUrl ."challenge/".$id;

        $this->_call_api($url, 'POST', json_encode($data));

        $this->_del_cache("challenges".$this->_hash);

        $this->_del_cache("challenge/".$id.$this->_hash);

        $this->_del_cache("points".$this->_hash);

        $this->clear_history();

        return $this->result;
    }

    /**
     *   Retrieve a content page.
     *
     *   Url: http://levelup.mxit.com/page/{id}
     *
     *   NOTE: This method requires the user's token
     */
    public function get_page($id,$unique = false,$time = 86400)
    {
        $this->token_checker();

        $call = "page/".$id;
        $key = $call;

        if($unique == true)
        {
            $key = ($call.$this->_hash);
        }
        
        $result = $this->_get_cache($key);

        if(!$result)
        {
            $this->_api_headers();
            $url = $this->_apiUrl .$call;
            $this->_call_api($url, 'GET');
            $result = $this->result;

            $this->_set_cache($key,$result,$time);
        }
        return $result;
    }

    /**
     *   An action has been taken on a page.
     *
     *   Url: http://levelup.mxit.com/page/{id}
     *
     *   NOTE: This method requires the user's token
     */
    public function post_page($id,$data)
    {
        $this->token_checker();

        $this->_api_headers();
        $url = $this->_apiUrl ."page/".$id;

        $this->_call_api($url, 'POST', json_encode($data));

        $this->clear_page($id,true);
        $this->_del_cache("bookmarks".$this->_hash);

        return $this->result;
    }

    /**
     *   The programme page has been viewed, or an answer submitted.
     *
     *   Url: http://levelup.mxit.com/programme/{id}
     *
     *   NOTE: This method requires the user's token
     */
    public function post_programme($page_id,$data = array())
    {
        $this->token_checker();

        $this->_api_headers();
        $url = $this->_apiUrl ."programme/".$page_id;

        $this->_call_api($url, 'POST', json_encode($data));

        $this->clear_page($page_id,true);

        return $this->result;
    }

    /**
     *   Retrieve list of content.
     *
     *   Url: http://levelup.mxit.com/content
     *
     *   NOTE: This method requires the user's token
     */
    public function get_content()
    {
        $this->token_checker();

        $call = "content";
        $key = $call;
        $result = $this->_get_cache($key);

        if(!$result)
        {
            $this->_api_headers();
            $url = $this->_apiUrl .$call;
            $this->_call_api($url, 'GET');
            $result = $this->result;

            $this->_set_cache($key,$result);
        }
        return $result;
    }

    /**
     *   Retrieve the list of user's badges.
     *
     *   Url: http://levelup.mxit.com/badges
     *
     *   NOTE: This method requires the user's token
     */
    public function get_badges()
    {
        $this->token_checker();

        $call = "badges";
        $key = $call.$this->_hash;
        $result = $this->_get_cache($key);

        if(!$result)
        {
            $this->_api_headers();
            $url = $this->_apiUrl .$call;
            $this->_call_api($url, 'GET');
            $result = $this->result;

            $this->_set_cache($key,$result);
        }
        return $result;
    }

    /**
     *   Retrieve information on a specific badge.
     *
     *   Url: http://levelup.mxit.com/badge/{id}
     *
     *   NOTE: This method requires the user's token
     */
    public function get_badge($id)
    {
        $this->token_checker();

        $call = "badge/".$id;
        $key = ($call.$this->_hash);
        $result = $this->_get_cache($key);

        if(!$result)
        {
            $this->_api_headers();
            $url = $this->_apiUrl .$call;
            $this->_call_api($url, 'GET');
            $result = $this->result;

            $this->_set_cache($key,$result);
        }
        return $result;
    }

    /**
     *   Retrieve list of bookmarked pages.
     *
     *   Url: http://levelup.mxit.com/bookmarks
     *
     *   NOTE: This method requires the user's token
     */
    public function get_bookmarks()
    {
        $this->token_checker();

        $call = "bookmarks";
        $key = ($call.$this->_hash);
        $result = $this->_get_cache($key);

        if(!$result)
        {
            $this->_api_headers();
            $url = $this->_apiUrl .$call;
            $this->_call_api($url, 'GET');
            $result = $this->result;

            $this->_set_cache($key,$result);
        }
        return $result;
    }

    /**
     *   Normalize and validate a mobile number.
     *
     *   Url: http://levelup.mxit.com/mobilenumber
     *
     *   NOTE: This method requires the user's token
     */
    public function validate_mobilenumber($countrycode,$number)
    {
        $this->token_checker();

        $this->_api_headers();
        $url = $this->_apiUrl ."mobilenumber";

        $data = array('mobile' => $number,
                      'countrycode' => $countrycode);

        $this->_call_api($url, 'POST', json_encode($data));

        return $this->result;
    }

    /**
     *   Retrieve and search for list of countries.
     *
     *   Url: http://levelup.mxit.com/location/country
     *
     *   NOTE: This method requires the user's token
     */
    public function get_location_country($search='',$offset=0,$count=50)
    {
        $this->token_checker();

        $params = array(  'search' => $search,
                        'offset' => $offset,
                        'count' => $count);

        $call = "location/country";
        $call .= '?' . http_build_query($params);

        $key = $call;
        $result = $this->_get_cache($key);

        if(!$result)
        {
            $this->_api_headers();
            $url = $this->_apiUrl .$call;
            $this->_call_api($url, 'GET');
            $result = $this->result;

            $this->_set_cache($key,$result);
        }
        return $result;
    }

    /**
     *   Retrieve and search for list of regions in a country.
     *
     *   Url: http://levelup.mxit.com/location/country
     *
     *   NOTE: This method requires the user's token
     */
    public function get_location_region($countrycode='',$search='',$offset=0,$count=50)
    {
        $this->token_checker();

        $params = array(  'countrycode' => $countrycode,
                        'search' => $search,
                        'offset' => $offset,
                        'count' => $count);

        $call = "location/region";
        $call .= '?' . http_build_query($params);

        $key = $call;
        $result = $this->_get_cache($key);

        if(!$result)
        {
            $this->_api_headers();
            $url = $this->_apiUrl .$call;
            $this->_call_api($url, 'GET');
            $result = $this->result;

            $this->_set_cache($key,$result);
        }
        return $result;
    }

    /**
     *   Retrieve and search for list of schools in a country and region.
     *
     *   Url: http://levelup.mxit.com/location/country
     *
     *   NOTE: This method requires the user's token
     */
    public function get_location_school($countrycode='',$regioncode='',$search='',$offset=0,$count=50)
    {
        $this->token_checker();

        $params = array('countrycode' => $countrycode,
                        'regioncode' => $regioncode,
                        'search' => $search,
                        'offset' => $offset,
                        'count' => $count);

        $call = "location/school";
        $call .= '?' . http_build_query($params);

        $key = $call;
        $result = $this->_get_cache($key);

        if(!$result)
        {
            $this->_api_headers();
            $url = $this->_apiUrl .$call;
            $this->_call_api($url, 'GET');
            $result = $this->result;

            $this->_set_cache($key,$result);
        }
        return $result;
    }

    /**
     *   Retrieve the leaderboard.
     *
     *   Url: http://levelup.mxit.com/leaderboard
     *
     *   NOTE: This method requires the user's token
     */
    public function get_leaderboard($countrycode='',$regioncode='',$schoolcode=-1,$offset=0,$count=10)
    {
        $this->token_checker();

        $params = array();

        if(is_string($countrycode) && strlen($countrycode) >= 1)
        {
            $params['countrycode'] = $countrycode;
        }
        if(is_string($regioncode) && strlen($regioncode) >= 1)
        {
            $params['regioncode'] = $regioncode;
        }
        if(is_int($schoolcode) && $schoolcode >= 0)
        {
            $params['schoolcode'] = $schoolcode;
        }

        $params['offset'] = $offset;
        $params['count'] = $count;

        $call = "leaderboard";
        $call .= '?' . http_build_query($params);

        $key = $call;
        $result = $this->_get_cache($key);

        if(!$result)
        {
            $this->_api_headers();
            $url = $this->_apiUrl .$call;
            $this->_call_api($url, 'GET');
            $result = $this->result;

            $this->_set_cache($key,$result);
        }
        return $result;
    }

    /*
     *   Retrieve the user dak profile.
     *
     *   Url: http://levelup.mxit.com/ext/dak/profile
     *
     *   NOTE: This method requires the user's token
     */
    public function get_dak_profile()
    {
        $this->token_checker();

        $call = "ext/dak/profile";
        $key = ($call.$this->_hash);
        $result = $this->_get_cache($key);

        if(!$result)
        {
            $this->_api_headers();
            $url = $this->_apiUrl .$call;
            $this->_call_api($url, 'GET');
            $result = $this->result;

            $this->_set_cache($key,$result);
        }
        return $result;
    }

    /**
     *   Update the user dak profile.
     *
     *   Url: http://levelup.mxit.com/ext/dak/profile
     *
     *   NOTE: This method requires the user's token
     */
    public function set_dak_profile($data)
    {     
        $this->token_checker();

        $this->_api_headers();
        $url = $this->_apiUrl ."ext/dak/profile";

        $this->_call_api($url, 'PUT', json_encode($data));

        $this->_del_cache("ext/dak/profile".$this->_hash);

        return $this->result;
    }

    /**     Caching clear
     *
     *
    */

    /**
     *   Clear page for user from cache
     *
     */
    public function clear_page($id,$challenge = false)
    {
        $this->token_checker();

        $call = "page/".$id;
        $key = $call;

        if($challenge == true)
        {
            $key = ($call.$this->_hash);
        }

        $this->_del_cache($key);

        return $this->result;
    }

    /**
     *   Clear history for user from cache
     *
     */
    public function clear_history()
    {
        $this->token_checker();

        $call = "history";
        $key = ($call.$this->_hash);

        $this->_del_cache($key);

        return $this->result;
    }

}