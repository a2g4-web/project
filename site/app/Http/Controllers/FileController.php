<?php

namespace App\Http\Controllers;

use App\User;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\File;

class FileController extends Controller
{

    private $client;

    public function __construct()
    {
        $this->client = new Client(['base_uri' => 'http://minecloud.fr:8001']);
    }

    public function upload(Request $req, $eventId)
    {
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
        return back();
    }

    public function downloadParticipants($eventId)
    {
        $response = $this->client->request('GET', '/api/event/' . $eventId . '/participants');
        if($response->getStatusCode() === 200)
        {
            $body = $response->getBody();
            if($body != null)
            {
                $participants = json_decode($body, true);
                $str = 'Prénom;Nom' . PHP_EOL;
                foreach ($participants as $item)
                {
                    $str .= $item['user']['first_name'] . ';' . $item['user']['last_name'] . PHP_EOL;
                }
                File::put(public_path('/upload/participants.csv'), "\xEF\xBB\xBF" . $str);
            }
        }
        return back();
    }

    public function downloadImages($eventId)
    {
        $response = $this->client->request('GET', '/api/event/' . $eventId . '/images');
        if($response->getStatusCode() === 200)
        {
            $body = $response->getBody();
            $images = json_decode($body, true);
            foreach ($images as $item)
            {
                if(substr($item['url'], 0, 1) == '/')
                {
                    
                }
            }
        }
    }
}
