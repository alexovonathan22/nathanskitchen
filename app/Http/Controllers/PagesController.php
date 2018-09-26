<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('index', 'about', 'connect');// you
    }
    public function index(){
        return view('pages.index');
    }
    public function about(){
        return view('pages.about');
    }
    public function connect(){
        return view('pages.connect');
    }

    public function message(){
        return view('pages.thankuorder');
    }
    
    
    
}
