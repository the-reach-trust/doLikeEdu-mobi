<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;

use App\Services\LevelUpApi;

class QuizzesController extends Controller
{
    public function __construct() {
        $this->middleware('LUuser');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $LUApi = $this->LevelUpSetup();
        dd($LUApi->get_content);
    }
}
