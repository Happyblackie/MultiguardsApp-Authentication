<?php
use Illuminate\Support\Facades\Route;

//step x v
use App\Http\Controllers\Admin\AdmController;

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