<?php

namespace App\Http\Controllers;

use App\Services\Aparat\AparatHandler;

class AparatApiController extends Controller
{
    public function __construct(private AparatHandler $aparat) {
    }

    public function popularVideos()
    {
        $response = $this->aparat->receivePopularVideos();

        return view('aparat.popularVideos' , ['videos' => $response]);
    }

    public function login()
    {
        $response = $this->aparat->login();

        return response()->json([
            'data' => $response,
            'third_party' => 'https://aparat.com'
        ] , 200);
    }
}
