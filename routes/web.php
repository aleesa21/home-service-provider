<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProviderController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Middleware\AdminMiddleware;

//homepage routes
Route::get('/', function () {
    return view('welcome');
});

Route::get('/index', function () {
    return view('homepage.index');
});
Route::get('/login', function () {
    return view('homepage.login');
});

Route::get('/register', function () {
    return view('homepage.register');
});

//controller route
Route::post('/register_submit',[RegisterController::class,'register'])->name('reguser');
Route::post('/login_submit', [LoginController::class, 'login'])->name('loguser');

//admindashboard route through inline middleware
Route::get('/admindash', [AdminController::class, 'index'])
    ->middleware([AdminMiddleware::class]) // Middleware applied here
    ->name('adash');


//dashboard  route
Route::get('/userdash', function() {
    return view('dashboard.userdash');
})->name('udash');
 


Route::get('/providerdash/{id}', [ProviderController::class, 'dashboard'])
    ->name('pdash');
    