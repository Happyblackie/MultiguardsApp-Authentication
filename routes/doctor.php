<?php
use Illuminate\Support\Facades\Route;


//part 3 d
use App\Http\Controllers\Doctor\DoctorController;

Route::get('/welcomedoctor', function () { /* for doctor */
    return view('welcomeDoctor');
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