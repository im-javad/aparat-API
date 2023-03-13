<?php

use App\Http\Controllers\AparatApiController;
use Illuminate\Support\Facades\Route;

Route::get('/popular-videos', [AparatApiController::class , 'popularVideos']);

Route::get('/login', [AparatApiController::class , 'login']);

