<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;

use Sunra\PhpSimple\HtmlDomParser;

use App\Models\ChallengeType;
use App\Models\Challenge;
use App\Models\Page;
use App\Http\Requests\ChallengePostRequest;

use Session;

class QuizzesController extends AppController
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = $this->levelup->get_challengecategories();
        $pages = array();

        //Get featured challenges
        $challenges_param = array(
                                'type' => "featured",
                                'count' => 3);

        $challenges_featured = $this->levelup->get_challenges($challenges_param);
        if(!empty($challenges_featured)){
            //Get pages for set challenge
            foreach ($challenges_featured as $challenge) {
                $pages[$challenge->content_page] = $this->levelup->get_page($challenge->content_page,false,3600);
            }
        }

        return view('quizzes.index',compact('pages','categories','challenges_featured'));
    }

    public function category($category_id,$offset=0,$sort='popular')
    {
        $challenge_count = 15;
        $challenges_param = array(
                                'type' => "all",
                                'category' => $category_id,
                                'offset' => $offset,
                                'sort' => $sort,
                                'count' => $challenge_count);

        // Loop through all the categories again and grab the name of the matching id
        $categories = $this->levelup->get_challengecategories();
        $category_current = null;

         foreach($categories as $categorynum){
            if ($categorynum->category == $category_id){
                $category_current = $categorynum;
                break;
            }
        }

        $challenges = $this->levelup->get_challenges($challenges_param);
        $pages = array();
        foreach ($challenges as $challenge) {
            $pages[$challenge->content_page] = $this->levelup->get_page($challenge->content_page,false,3600);
        }

        return view('quizzes.category',compact('category_id','category_current','categories','challenges','pages','offset','challenge_count'));
    }

    public function topic($category_id,$topic_id,$offset=0,$sort='popular')
    {
        $challenge_count = 15;
        $challenges_param = array(
                                'type' => "all",
                                'category' => $category_id,
                                'topic' => $topic_id,
                                'offset' => $offset,
                                'sort' => $sort,
                                'count' => $challenge_count);

        // Loop through all the categories again and grab the name of the matching id
        $categories = $this->levelup->get_challengecategories();
        $category_current = null;

         foreach($categories as $categorynum){
            if ($categorynum->category == $category_id){
                $category_current = $categorynum;
                break;
            }
        }

        $challenges = $this->levelup->get_challenges($challenges_param);

        $pages = array();
        foreach ($challenges as $challenge) {
            $pages[$challenge->content_page] = $this->levelup->get_page($challenge->content_page,false,3600);
        }

        return view('quizzes.topic',compact('category_id','topic_id','category_current','categories','challenges','pages','offset','challenge_count'));
    }

    public function quiz($id)
    {
        $challenge = $this->levelup->get_challenge($id);
        $challenge_http_response = $this->levelup->get_last_http_status();

        if($challenge_http_response == Challenge::CHALLENGE_NOT_FOUND || $challenge_http_response == Challenge::CHALLENGE_EXPIRED || $challenge == null)
        {
            return abort(404,'Missing Challenge');
        }

        $page = $this->levelup->get_page($challenge->content_page,false,3600);

        //Check if page is unpublished
        if(empty($page) || $this->levelup->get_last_http_status() == Page::PAGE_MISSING)
        {
            return abort(404,'Missing Page');
        }

        //Make sure form is post
        $page_html = HtmlDomParser::str_get_html($page->content);
        if($page_html == true && $page_html->find('form') != null){
            $page_html->find('form', 0)->method = 'post';
        }
        $page->content = $page_html;

        return view('quizzes.quiz',compact('challenge','page'));
    }

    public function quiz_post(ChallengePostRequest $request,$id)
    {
        $challenge = $this->levelup->get_challenge($id);

        if($challenge->remaining_attempts == 0){
            \Session::flash('flash_error', 'You have no attempts left');
            return redirect()->back()->withInput();
        }

        $quiz_result = $this->levelup->answer_challenge($id,$request->all());

        if($this->levelup->get_last_http_status() == Challenge::CHALLENGE_EXPIRED || $this->levelup->get_last_http_status() == Challenge::CHALLENGE_NOT_FOUND)
        {
            //TODO: Handle
            redirect()->route('quizzes.index');
        }

        foreach ($quiz_result->user_answers as $user_answer) {
            if($user_answer == $quiz_result->answer)
            {
                return redirect()->route('quizzes.result',[$id,true]);
            }
        }

        return redirect()->route('quizzes.result',[$id,0]);
    }

    public function quiz_result($id = 0,$correct = false)
    {
        $challenge = $this->levelup->get_challenge($id);
        $challenge_http_response = $this->levelup->get_last_http_status();

        if($challenge_http_response == Challenge::CHALLENGE_NOT_FOUND || $challenge_http_response == Challenge::CHALLENGE_EXPIRED || $challenge == null)
        {
            return abort(404,'Missing Challenge');
        }

        $page = $this->levelup->get_page($challenge->content_page,false,3600);
        //Check if page is unpublished
        if(empty($page) || $this->levelup->get_last_http_status() == Page::PAGE_MISSING)
        {
            return abort(404,'Missing Page');
        }

        //
        if($challenge->remaining_attempts == 0){
            //Update session data
            $quiz_completed = 0;
            foreach ($this->levelup->get_challenge_progress() as $category) {
                $quiz_completed+= $category->completed;
            }
            $points = $this->levelup->get_points();
            Session::put('levelup_points', $points);
            Session::put('levelup_quiz_completed', $quiz_completed);

            if($challenge->type == ChallengeType::FEATURED){
                $dailys_complete = Challenge::completed_featured_challenges($this->levelup);
                Session::put('levelup_dailys_complete', $dailys_complete);
            }
        }

        if($correct)
        {
            return view('quizzes.correct',compact('challenge','page'));
        }

        return view('quizzes.incorrect',compact('challenge','page'));
    }

    public function page($id)
    {
        $page = $this->levelup->get_page($id);

        if($this->levelup->get_last_http_status() == Page::PAGE_MISSING)
        {
            return abort(404,'Missing Page');
        }
        return view('quizzes.page',compact('page'));
    }
}
