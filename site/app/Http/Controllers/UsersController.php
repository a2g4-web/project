<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class UsersController extends Controller
{

    private $client;

    public function __construct()
    {
        $this->client = new Client(['base_uri' => 'http://minecloud.fr:8001']);
    }

    public function register(Request $req)
    {
        $lastName = $req->input('last_name');
        $firstName = $req->input('first_name');
        $email = $req->input('email');
        $pass = $req->input('password');
        $loc = $req->input('location');

        $response = $this->client->request('POST', '/api/user', [
            'json' => [
                'last_name' => $lastName,
                'first_name' => $firstName,
                'email' => $email,
                'password' => $pass,
                'campusId' => $loc,
                'usertypeId' => 1
            ]
        ]);
        if($response->getStatusCode() === 201)
        {
            return redirect('/');
        }
        else
        {
            return redirect('/signup');
        }
    }

    public function login(Request $req)
    {
        $email = $req->input('email');
        $pass = $req->input('password');

        $response = $this->client->request('GET', '/api/user/login', [
            'json' => [
                'email' => $email,
                'password' => $pass
            ]
        ]);
        if($response->getStatusCode() === 200)
        {
            $token = $response->getBody();
            Log::info($token);
            return $this->loginFromToken($token);
        }
        else
        {
            return redirect('/signup');
        }
    }

    private function loginFromToken($token)
    {
        $response = $this->client->request('GET', '/api/user/me', [
            'headers' => [
                'authorization' => 'Bearer ' . $token
            ]
        ]);
        if($response->getStatusCode() === 200)
        {
            return redirect('/')->withCookies([cookie('userToken', $token, 1440), cookie('user', $response->getBody(), 1440)]);
        }
        else
        {
            return redirect('/signup');
        }
    }

    public function logout()
    {
        return redirect('/')->withCookies([cookie('userToken', null), cookie('user', null)]);
    }
}
