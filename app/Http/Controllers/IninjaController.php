<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class IninjaController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /** 
     * Get Data from CRM
    */
    public function getData() 
    {
        $client = new Client();
        $url    = 'https://crm.patioconcepts.ca/api/v1/clients';
        $token  = 'av9ikrhggsu61zuxesaz0vhhd3rm9c4l';

        try {
            $response = $client->request(
                'GET',
                $url,
                [
                    "headers" => [
                        "X-Ninja-Token" => $token
                    ]
                ]
            );

            $data = $response->getBody()->getContents();

            return response($data, Response::HTTP_OK);

        } catch(\GuzzleHttp\Exception\RequestException $exception) {
            $error = $exception->getResponse()->getBody()->getContents();
            return response($error, Response::HTTP_BAD_REQUEST);
        }
    }
}
