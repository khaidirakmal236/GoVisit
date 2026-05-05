<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        return view('welcome_message');
    }
    public function monkey(): string
    {
        return view('about-us');
    }
     public function about_us(): string
    {
        return view('about-us');
    }
    
    
}
