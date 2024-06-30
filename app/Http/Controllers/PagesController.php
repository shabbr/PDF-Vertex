<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function privacyPolicy(){
        return view('frontend.privacyPolicy');
    }
    public function terms(){
        return view('frontend.term');
    }
}
