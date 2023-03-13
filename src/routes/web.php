<?php

use App\Http\Controllers\AparatApiController;
use Illuminate\Support\Facades\Route;

Route::get('/', [AparatApiController::class , 'popularVideos']);
