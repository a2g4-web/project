<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Exception\ServerException;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;
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
        $pass = md5($req->input('password'));
        $loc = $req->input('location');

        try
        {
            $this->client->request('POST', '/api/user', [
                'json' => [
                    'last_name' => $lastName,
                    'first_name' => $firstName,
                    'email' => $email,
                    'password' => $pass,
                    'campusId' => $loc,
                    'usertypeId' => 1,
                ]
            ]);
        }
        catch (ClientException $e)
        {
            return redirect('/')->with('registerState', 'error');
        }
        return redirect('/');
    }

    public function login(Request $req)
    {
        $email = $req->input('email');
        $pass = md5($req->input('password'));

        try
        {
            $response = $this->client->request('GET', '/api/user/login', [
                'json' => [
                    'email' => $email,
                    'password' => $pass
                ]
            ]);
        }
        catch (ClientException $e)
        {
            return redirect('/')->withCookie(cookie('loginState', 'error', 1));
        }
        $token = $response->getBody();
        Log::info($token);
        return $this->loginFromToken($token);
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
            return back()->withCookies([cookie('userToken', $token, 1440), cookie('user', $response->getBody(), 1440)]);
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

    public function addcom(Request $req, $eventId)
    {
        $com = $req->input('commentaries');
        try
        {
            $this->client->request('POST', '/api/commentary', [
                'json' => [
                    'commentary' => $com,
                    'eventId' => $eventId,
                    'userId' => User::getUser()['id']
                ],
                'headers' => [
                    'authorization' => Cookie::get('userToken')
                ]
            ]);
        }
        catch (ClientException $e)
        {
            return redirect('/')->with('addcomState', 'error');
        }
        return back();
    }

    public function like($eventId) {
        $like = null;
        try {
            $like = $this->client->request('GET', '/api/event/' . $eventId . '/likes');
        }
        catch (ClientException $e) {
            $this->sendLike($eventId);
            return back();
        }
        $likes = array();
        if($like->getStatusCode() === 200) {
            $likes = json_decode($like->getBody());
        }
        foreach ($likes as $item) {
            if($item->userId == User::getUser()['id'])
            {
                $this->client->request('DELETE', '/api/like', [
                    'json' => [
                        'eventId' => $eventId
                    ],
                    'headers' => [
                        'authorization' => 'Bearer ' . Cookie::get('userToken')
                    ]
                ]);
            }
            else
            {
                $this->sendLike($eventId);
            }
            return back();
        }
        return back();
    }

    private function sendLike($eventId) {
        $this->client->request('POST', '/api/like', [
            'json' => [
                'eventId' => $eventId
            ],
            'headers' => [
                'authorization' => 'Bearer ' . Cookie::get('userToken')
            ]
        ]);
    }

    public function registerEvent($eventId)
    {
        $this->client->request('POST', '/api/event/' . $eventId . '/register', [
            'headers' => [
                'authorization' => 'Bearer ' . Cookie::get('userToken')
            ]
        ]);
        return back();
    }

    public function unregisterEvent($eventId)
    {
        $this->client->request('DELETE', '/api/event/' . $eventId . '/unregister', [
            'headers' => [
                'authorization' => 'Bearer ' . Cookie::get('userToken')
            ]
        ]);
    }
}
