<?php

use Illuminate\Support\Facades\Route;

//importing serController
use App\Http\Controllers\User\UserController;

//create route groups
Route::prefix('user')->name('user.')->group(function(){
    //route middlewares
                            //:web is a guard name  added at  step v vi 
    Route::middleware(['guest:web','PreventBackHistory'])->group(function(){
        //g routes for login & registration 
        Route::view('/login', 'dashboard.user.login')->name('login');
        Route::view('/register', 'dashboard.user.register')->name('register');
        //step l
        Route::post('/create',[UserController::class,'create'])->name('create');
        //step p          checks login users
        Route::post('/check',[UserController::class,'check'])->name('check');
    });
                             //:web is a guard name  added at  step v vi                     
    Route::middleware(['auth:web','PreventBackHistory'])->group(function(){
        //g routes for home views
        Route::view('/home', 'dashboard.user.home')->name('home'); 
         //step u g 
        Route::post('/logout', [UserController::class,'logout'])->name('logout');   
    });
});