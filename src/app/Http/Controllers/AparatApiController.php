<?php

namespace App\Http\Controllers;

use App\Exceptions\systemErrorInGettingTheFormActionException;
use App\Services\Aparat\AparatHandler;
use Illuminate\Http\Request;

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

        return $this->handleResponse($response , 200);
    }

    public function upload(Request $request)
    {
        try {
            $response = $this->aparat->upload($request->filename , $request->title , $request->category);
            
            return $this->handleResponse($response , 201);
        } catch (systemErrorInGettingTheFormActionException $event) {
            return response()->json([
                'error' => $event->getMessage(),
                'third_party' => 'https://aparat.com',
            ] , 404);
        }
    }

    public function delete(Request $request)
    {
        $response = $this->aparat->delete($request->uid);

        return $this->handleResponse($response , 200);
    }
    
    private function handleResponse($data , $statusCode , $option = null)
    {
        return response()->json([
            'data' => $data,
            'third_party' => 'https://aparat.com',
        ] , $statusCode);
    }
}
