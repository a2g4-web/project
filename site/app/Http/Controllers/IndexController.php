<?php

namespace App\Http\Controllers;

use App\User;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Log;

class IndexController extends Controller
{
    private $client;

    public function __construct()
    {
        $this->client = new Client(['base_uri' => 'http://minecloud.fr:8001']);
    }

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

    public function mentions(){
        return view('mentions');
    }

    public function signup() {
        $data = array();
        $response = $this->client->request('GET', '/api/campuses');
        if($response->getStatusCode() == 200)
        {
            $data = json_decode($response->getBody(), true);
        }
        return view('signup', ['data' => $data]);
    }

    public function basket() {
        $response = $this->client->request('GET', '/api/articles');
        $array = array();
        if($response->getStatusCode() === 200)
        {
            $body = json_decode($response->getBody(), true);
            $cookie = json_decode(Cookie::get('basket'), true);
            if($body != null && $cookie != null)
            {
                foreach ($body as $item)
                {
                    if(in_array($item['id'], $cookie))
                    {
                        array_push($array, $item);
                    }
                }
            }
        }
        return view('basket', ['articles' => $array]);
    }

    public function eventype($id){
        $data = array();
        $response = $this->client->request('GET', '/api/event/' . $id);
        if($response->getStatusCode() === 200)
        {
            $data = json_decode($response->getBody(), true);
        }
        $comsData = array();
        $coms = $this->client->request('GET', '/api/commentaries');
        if($response->getStatusCode() === 200)
        {
            $comsData = json_decode($coms->getBody(), true);
        }
        $participateObj = false;
        try
        {
            $participate = $this->client->request('GET', '/api/event/' . $id . '/participants');
            if($participate->getStatusCode() === 200)
            {
                $participateData = json_decode($participate->getBody(), true);
                foreach ($participateData as $p)
                {
                    if($p['userId'] == User::getUser()['id'])
                    {
                        $participateObj = true;
                    }
                }
            }
        }
        catch (ClientException $e)
        {

        }
        $likeObj = false;
        try {
            $like = $this->client->request('GET', '/api/event/' . $id . '/likes');
            if($like->getStatusCode() === 200)
            {
                $likesData = json_decode($like->getBody(), true);
                foreach ($likesData as $l)
                {
                    if($l['userId'] == User::getUser()['id'])
                    {
                        $likeObj = true;
                    }
                }
            }
        }
        catch (ClientException $e) {
            return view('eventype', ['data' => $data, 'coms' => $comsData, 'likes' => $likeObj, 'participate' => $participateObj]);
        }
        return view('eventype', ['data' => $data, 'coms' => $comsData, 'likes' => $likeObj, 'participate' => $participateObj]);
    }
}
