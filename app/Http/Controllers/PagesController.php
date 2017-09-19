<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Log;

use Sunra\PhpSimple\HtmlDomParser;

use App\Models\Page;
use App\Http\Requests\ChallengePostRequest;

use Session;

class PagesController extends AppController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        dd('index');
    }

    public function page($id=25)
    {
        $page = $this->levelup->get_page($id);

        if($this->levelup->get_last_http_status() == Page::PAGE_MISSING)
        {
            return abort(404,'Missing Page');
        }

        $page_html = HtmlDomParser::str_get_html($page->content);

        if($page->programme && $page->completed == false && $page->child == null){
            if($page_html->find('form') == null){
                $this->levelup->post_programme($id);
                $page->completed = true;
                if(!empty($page->parent)){
                    $this->levelup->post_programme($page->parent);
                }
            }
        }

        $page_next = Page::get_next_page($this->levelup, $page->parent, $page->id);

        if($page_html == true && $page_html->find('form') != null){
            $page_html->find('form', 0)->method = 'post';
        }

        $page->content = $page_html;

        return view('pages.page',compact('page','page_next'));
    }

    public function answer(ChallengePostRequest $request, $id)
    {
        $page = $this->levelup->get_page($id);
        if($this->levelup->get_last_http_status() == Page::PAGE_MISSING)
        {
            return abort(404,'Missing Page');
        }

        //Post Answer
        $this->levelup->post_programme($id,['answer' => $request->answer]);
        if($this->levelup->get_last_http_status() == Page::PAGE_ANSWER_INCORRECT){
            Session::flash('flash_error', 'Sorry that was incorrect try again ?');
        }elseif($this->levelup->get_last_http_status() == Page::PAGE_ANSWER_CORRECT){
            Session::flash('flash_success', 'That was correct');
        }else{
           //something unexpected happened.
            Log::alert('Page answer',(array)$page);
            Log::alert('Page answer request',(array)$request);
        }
        return redirect()->back();
    }
}
