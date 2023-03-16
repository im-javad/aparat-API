<?php

namespace App\Http\Controllers;

use App\Exceptions\systemErrorInGettingTheFormActionException;
use App\Services\Aparat\AparatHandler;
use App\Services\Aparat\Traits\AparatApi;
use Illuminate\Http\Request;

class AparatApiController extends Controller
{
    use AparatApi;

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

        return $this->handleResponse($response , 200);
    }

    public function upload(Request $request)
    {
        try {
            $response = $this->aparat->upload($request->filename , $request->title , $request->category);
            
            return $this->handleResponse($response , 201);
        } catch (systemErrorInGettingTheFormActionException $event) {
            $this->errorResponse($event->getMessage() , 404);
        }
    }

    public function delete(Request $request)
    {
        $response = $this->aparat->delete($request->uid);

        return $this->handleResponse($response , 200);
    }

    public function videoInformation(Request $request)
    {
        try {
            $response = $this->aparat->videoInformation($request->uid);
        
            return $this->handleResponse($response , 200);
        } catch (\App\Exceptions\VideoNotFoundException $event) {
            $this->errorResponse($event->getMessage() , 404);
        }
    }
}
