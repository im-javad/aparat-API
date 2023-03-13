<?php

namespace App\Http\Controllers;

use App\Services\Aparat\AparatHandler;

class AparatApiController extends Controller
{
    public function __construct(private AparatHandler $aparatHabdler) {
    }

    public function popularVideos()
    {
        $videos = $this->aparatHabdler->receivePopularVideos();

        return view('aparat.popularVideos' , compact('videos'));
    }
}
