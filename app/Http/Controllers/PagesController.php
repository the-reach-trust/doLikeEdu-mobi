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

    public function page($id)
    {
        $page = $this->levelup->get_page($id);
        if($this->levelup->get_last_http_status() == Page::PAGE_MISSING)
        {
            dd('missing page');
        }
        return view('pages.page',compact('page'));
    }
}
