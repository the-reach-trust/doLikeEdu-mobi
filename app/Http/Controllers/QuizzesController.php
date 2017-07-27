<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;

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

    public function category($category,$offset=0,$sort='popular')
    {
        $challenge_count = 10;
        $challenges_param = array(
                                'type' => "all",
                                'category' => $category,
                                'offset' => $offset,
                                'sort' => $sort,
                                'count' => $challenge_count);

        // Loop through all the categories again and grab the name of the matching id
        $challengescategories = $this->levelup->get_challengecategories();
        $categoryDetails = null;

         foreach($challengescategories as $categorynum){
            if ($categorynum->category == $category){
                $categoryDetails = $categorynum;
                break;
            }
        }

        $challenges = $this->levelup->get_challenges($challenges_param);

        $pages = array();
        foreach ($challenges as $challenge) {
            $pages[$challenge->content_page] = $this->levelup->get_page($challenge->content_page,false,3600);
        }

        return view('quizzes.category',compact('category','challengescategories','challenges','pages'));
    }

    public function topic($category,$topic)
    {

    }

    public function challenge($id)
    {

    }
}
