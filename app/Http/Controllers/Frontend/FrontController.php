<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
class FrontController extends Controller
{
    public function enLanguage(){
        Session::get('lang');
        Session()->forget('lang');
        Session()->put('lang','en');
        return Redirect()->back();
    }
    public function viLanguage(){
        Session::get('lang');
        Session()->forget('lang');
        Session()->put('lang','vi');
        return Redirect()->back();
    }
}
