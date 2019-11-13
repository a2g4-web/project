<?php

namespace App;

use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;

class User
{

    public static function getUser()
    {
        return json_decode(Cookie::get('user'), true);
    }
}
