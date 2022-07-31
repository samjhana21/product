<?php
use Illuminate\Support\Facades\Route;
use App\Http\controllers\AdminController;
use App\Http\controllers\UserController;
use App\Http\Controllers\ViewplacesController;
use App\Http\Controllers\ContactController;

use Illuminate\Support\Facades\Auth;


Route::get('/', function () {
    return view('welcome');
});
Auth::routes(['verify' =>true]);

Route::resource('/viewplaces', ViewplacesController::class);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::group(['prefix'=>'admin', 'middleware'=>['isAdmin','auth']], function(){
    Route::get('dashboard',[AdminController::class,'index'])->name('admin.dashboard');
    Route::get('profile',[AdminController::class,'profile'])->name('admin.profile');
  
});

Route::group(['prefix'=>'user', 'middleware'=>['isUser','auth']], function(){
        Route::get('dashboard',[UserController::class,'index'])->name('user.dashboard');
        Route::get('profile',[UserController::class,'profile'])->name('user.profile');
        
});
Route::get('/contact-us',[ContactController::class, 'contact']);
Route::post('/send-message',[ContactController::class, 'sendEmail'])->name('contact.send');


/* for email
Route::middleware(['middleware'=>'PreventBackHistory'])->group(function () {
});*/
