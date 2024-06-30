<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class LanguageController extends Controller
{

    public function language($lang){
 //set localization language in session and call this session var in home to set localization
 session(['locale' => $lang]);
$value = session()->get('locale');
// return redirect()->route('home');
return redirect()->back();
    }
}
