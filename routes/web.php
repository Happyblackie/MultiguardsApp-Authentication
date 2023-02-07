<?php

use Illuminate\Support\Facades\Route;

//importing serController
use App\Http\Controllers\User\UserController;

//step x v
use App\Http\Controllers\Admin\AdmController;

//part 3 d
use App\Http\Controllers\Doctor\DoctorController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () { /*for  normal users */
    return view('welcome');
});


Route::get('/welcomeadmin', function () { /* for admin */
    return view('welcomeAdmin');
});

Route::get('/welcomedoctor', function () { /* for doctor */
    return view('welcomeDoctor');
});


Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//crate route groups
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


//step x i
Route::prefix('adm')->name('adm.')->group(function(){ 

    Route::middleware(['guest:adm','PreventBackHistory'])->group(function(){
        Route::view('/login', 'dashboard.adm.login')->name('login');
        //route for checking admin login step Y
        
        Route::post('/check', [AdmController::class, 'check'])->name('check');
        
       
    });
                            
    Route::middleware(['auth:adm','PreventBackHistory'])->group(function(){
        Route::view('/home', 'dashboard.adm.home')->name('home'); 
         //part 2 step b 
         Route::post('/logout', [AdmController::class,'logout'])->name('logout');   
    });
});

/* part 3 e */
Route::prefix('doctor')->name('doctor.')->group(function(){ 

    Route::middleware(['guest:doctor','PreventBackHistory'])->group(function(){
        Route::view('/login', 'dashboard.doctor.login')->name('login');
        Route::view('/register', 'dashboard.doctor.register')->name('register');
        /* part 3 i */
        Route::post('/create',[DoctorController::class,'create'])->name('create');
        /* part 3 l */
        Route::post('/check', [DoctorController::class, 'check'])->name('check');
     
       
    });
                            
    Route::middleware(['auth:doctor','PreventBackHistory'])->group(function(){
        Route::view('/home', 'dashboard.doctor.home')->name('home')->middleware('auth'); 
        /* part 3 n */
        Route::post('/logout',[DoctorController::class,'logout'])->name('logout'); 
    });
});

