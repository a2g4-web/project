<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use Illuminate\Http\Request;
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

    public function signup() {
        $data = array();
        $response = $this->client->request('GET', '/api/campuses');
        if($response->getStatusCode() == 200)
        {
            $data = json_decode($response->getBody(), true);
        }
        return view('signup', ['data' => $data]);
    }

    public function basket(Request $req) {
        return view('basket');
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
        $likesData = array();
        try {
            $like = $this->client->request('GET', '/api/event/' . $id . '/likes');
            if($like->getStatusCode() === 200)
            {
                $likesData = json_decode($like->getBody(), true);
            }
        }
        catch (ClientException $e) {
            return view('eventype', ['data' => $data, 'coms' => $comsData, 'likes' => $likesData]);
        }
        return view('eventype', ['data' => $data, 'coms' => $comsData, 'likes' => $likesData]);
    }
}
