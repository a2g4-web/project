<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index() {
        return view('index');
    }

    public function campus() {
        return view('campus');
    }

    public function shop() {
        return view('shop');
    }

    public function events() {
        return view('events');
    }

    public function signup() {
        return view('signup');
    }

    public function basket(Request $req) {
        
        return view('basket');
    }
}
