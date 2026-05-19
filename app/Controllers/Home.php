<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        return view('welcome_message');
    }

     public function about_us(): string
    {
        return view('about-us');
    }
    public function monkey(){
        echo "test 1";
    }
    public function wisata(){
        return view ('nio');
    }
    public function hidden_gems($apa){
        echo "nasi kuning mak limha". $apa;
    }
    
}
