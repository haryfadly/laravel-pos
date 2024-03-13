<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\UserController;

// tambahkan baris no 5 di atas

    Route::get('/welcome', function () {
        return view('welcome');
    });

    // auth here
    Route::get('/', [IndexController::class, 'index'])->name('index');
    Route::post('/', [IndexController::class, 'login'])->name('login');
    Route::get('/logout', [IndexController::class, 'logout'])->name('logout');
    Route::get('/signup', [IndexController::class, 'signup'])->name('signup');
    Route::post('/register', [IndexController::class, 'register'])->name('register');
    
    // middleware
    Route::group(['prefix' => 'admin', 'middleware' => ['auth'], 'as' => 'admin.'], function(){

        // dashboard
        Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');
        
        
    });
    // crud data user
    Route::get('/user',[UserController::class,'index'])->name('user');
    Route::post('/user/create',[UserController::class,'create'])->name('user.create');
    Route::post('/user/update/{id}',[UserController::class,'update'])->name('user.update');
    Route::get('/user/delete/{id}',[UserController::class,'delete'])->name('user.delete');
