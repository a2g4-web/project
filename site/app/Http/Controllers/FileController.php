<?php

namespace App\Http\Controllers;

use App\User;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

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
}
