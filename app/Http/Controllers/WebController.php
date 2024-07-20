<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebController extends Controller
{
    public function index(){
        return view('web.index');
    }
    public function about(){
        return view('web.about');
    }
    public function events(){
        return view('web.events');
    }
    public function gallery(){
        return view('web.gallery');
    }
    public function contact(){
        return view('web.contact');
    }
    public function members(){
        return view('web.members');
    }
    public function member_registration(){
        return view('web.member-registration');
    }
}
