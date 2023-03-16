<?php

use App\Http\Controllers\AparatApiController;
use Illuminate\Support\Facades\Route;

Route::get('/popular-videos', [AparatApiController::class , 'popularVideos']);

Route::get('/login', [AparatApiController::class , 'login']);

// for this route, we use Postman because of sending the request parameters , and post method 
Route::post('/upload', [AparatApiController::class , 'upload']);

Route::get('/delete' , [AparatApiController::class , 'delete']);

Route::get('/video-information' , [AparatApiController::class , 'videoInformation']);
