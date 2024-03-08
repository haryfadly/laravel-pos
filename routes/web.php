<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\UserController;

// tambahkan baris no 5 di atas

    Route::get('/welcome', function () {
        return view('welcome');
    });

    Route::get('/', [IndexController::class, 'index']);
    Route::get('/home', [HomeController::class, 'home']);
    
    // crud data user
    Route::get('/user',[UserController::class,'index']);
    Route::post('/user/store',[UserController::class,'store']);
    Route::post('/user/update/{id}',[UserController::class,'update']);
    Route::get('/user/destroy/{id}',[UserController::class,'destroy']);