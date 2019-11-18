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
        return back();
    }

    public function addToBasket($articleId)
    {
        $articles = json_decode(Cookie::get('basket'), true);
        if($articles == null)
        {
            $articles = [];
        }
        array_push($articles, $articleId);
        return back()->withCookie(cookie('basket', json_encode($articles), 1440));
    }

    public function removeFromBasket($articleId)
    {
        $articles = json_decode(Cookie::get('basket'), true);
        $new_articles = [];
        foreach ($articles as $item)
        {
            if($item !== $articleId)
            {
                array_push($new_articles, $item);
            }
        }
        return back()->withCookie(cookie('basket', json_encode($new_articles), 1440));
    }

    public function addEvent(Request $req){
        try
        {
            $response = $this->client->request('POST', '/api/event', [
                'json' => [
                    'name' => $req->input('name'),
                    'description' => $req->input('description'),
                    'location' => $req->input('location'),
                    'date' => $req->input('date'),
                    'price' => $req->input('price'),
                ],
                'headers' => [
                    'authorization' => Cookie::get('userToken')
                ]
            ]);
            $rep = json_decode($response->getBody(), true);
            $eventId = $rep['id'];
            $file = $req->file('fileInput');
            if($file->isValid())
            {
                $file->storeAs('img', $file->getClientOriginalName());
                $this->client->request('POST', '/api/image', [
                    'headers' => [
                        'authorization' => 'Bearer ' . Cookie::get('userToken')
                    ],
                    'json' => [
                        'eventId' => $eventId,
                        'url' => '/assets/img/' . $file->getClientOriginalName()
                    ]
                ]);
            }
        }
        catch (ClientException $e)
        {
            return redirect('/')->with('addEventState', 'error');
        }
        return back();

    }
    public function allowCookies()
    {
        return back()->withCookie(cookie('allowCookies', 'yes'));
    }

    public function addArticle(Request $req){
        $file = $req->file('fileInput');
        if($file->isValid())
        {
            $file->storeAs('article', $file->getClientOriginalName());
        }
        try
        {
            $this->client->request('POST', '/api/article',[
                'json' => [
                    'name' => $req->input('name'),
                    'description' => $req->input('description'),
                    'price' => $req->input('price'),
                    'categoryId' => $req->input('categoryId'),
                    'imageUrl' => '/assets/article/' . $file->getClientOriginalName(),
                ],
                'headers' => [
                    'authorization' => Cookie::get('userToken')
                ]
            ]);
        }
        catch (ClientException $e)
        {
            return redirect('/')->with('addArticleState', 'error');
        }
        return back();
    }

    public function addCategory(Request $req){
        try
        {
            $this->client->request('POST', '/api/category',[
                'json' => [
                    'name' => $req->input('name'),
                ],
                'headers' => [
                    'authorization' => Cookie::get('usetToken')
                ]
            ]);
        }
        catch (ClientException $e)
        {
            return redirect('/')->with('addCategoryState', 'error');
        }
        return back();
    }

    public function removeEvent($eventId)
    {
        $this->client->request('DELETE', '/api/event/' . $eventId, [
            'headers' => [
                'authorization' => 'Bearer ' . Cookie::get('userToken')
            ]
        ]);
        return redirect('/events');
    }
}

