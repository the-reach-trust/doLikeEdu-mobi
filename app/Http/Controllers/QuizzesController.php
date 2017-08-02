<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;

use App\Models\Challenge;
use App\Models\Page;

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
        $category = null;

         foreach($categories as $categorynum){
            if ($categorynum->category == $category_id){
                $category = $categorynum;
                break;
            }
        }

        $challenges = $this->levelup->get_challenges($challenges_param);
        $pages = array();
        foreach ($challenges as $challenge) {
            $pages[$challenge->content_page] = $this->levelup->get_page($challenge->content_page,false,3600);
        }

        return view('quizzes.category',compact('category_id','category','categories','challenges','pages','offset','challenge_count'));
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
        $challengescategories = $this->levelup->get_challengecategories();
        $category = null;

         foreach($challengescategories as $categorynum){
            if ($categorynum->category == $category_id){
                $category = $categorynum;
                break;
            }
        }

        $challenges = $this->levelup->get_challenges($challenges_param);

        $pages = array();
        foreach ($challenges as $challenge) {
            $pages[$challenge->content_page] = $this->levelup->get_page($challenge->content_page,false,3600);
        }

        return view('quizzes.topic',compact('category_id','topic_id','category','challengescategories','challenges','pages','offset','challenge_count'));
    }

    public function quiz($id)
    {
        $challenge = $this->levelup->get_challenge($id);
        $challenge_http_response = $this->levelup->get_last_http_status();

        if($challenge_http_response == Challenge::CHALLENGE_NOT_FOUND || $challenge_http_response == Challenge::CHALLENGE_EXPIRED || $challenge == null)
        {
            dd('missing challenge');
            //redirect(base_url().$this->router->fetch_class().'/index');
        }

        $page = $this->levelup->get_page($challenge->content_page,false,3600);

        //Check if page is unpublished
        if(empty($page) || $this->levelup->get_last_http_status() == Page::PAGE_MISSING)
        {
            dd('missing page');
            //redirect(base_url().'page/missing/'.$challenge->content_page);
        }

        return view('quizzes.quiz',compact('challenge','page'));
    }

    public function quiz_post(FormRequest $request,$id)
    {
        dd($request);
    }
}
