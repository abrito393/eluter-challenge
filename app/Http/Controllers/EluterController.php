<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use GuzzleHttp\Client;


class EluterController extends Controller
{
    function pushEluterActions($id) : array {
        
        $urlCallback = env('URL_CALLBACK').'/api/webhooks/eluter';

        $data = [
            'id' => $id,
            'value' => Str::random(10), 
            'callbackUrl' => $urlCallback
        ];

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'https://laravel.tt.eluter.com/api/action');
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json',
        ]);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($ch);

        return [ "msg" => "Post has been made to api"];
    }
}
