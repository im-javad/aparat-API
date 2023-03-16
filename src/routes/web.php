<?php

use App\Http\Controllers\AparatApiController;
use Illuminate\Support\Facades\Route;

Route::get('/popular-videos', [AparatApiController::class , 'popularVideos']);

Route::get('/login', [AparatApiController::class , 'login']);

// for this route, we Postman because of sending the request parameters
Route::post('/upload', [AparatApiController::class , 'upload']);
