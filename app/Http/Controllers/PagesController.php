<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;

use App\Models\Page;

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
        $page_next = null;

        if($page->child == null && isset($page->parent) && $page->parent != null)
        {
            $page_next = Page::get_next_page($this->levelup, $page->parent, $page->id);
        }
        if($this->levelup->get_last_http_status() == Page::PAGE_MISSING)
        {
            return abort(404,'Missing Page');
        }
        return view('pages.page',compact('page','page_next'));
    }
}
