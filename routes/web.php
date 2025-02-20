<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProviderController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\WelcomeController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\ProviderMiddleware;

//homepage routes
//Route::get('/', function () {
    //return view('welcome');
//});

Route::get('/', [WelcomeController::class, 'index'])->name('home');
Route::get('/provider/{id}', [ProviderController::class, 'show'])->name('provider.profile');





Route::get('/index', function () {
    return view('homepage.index');
});
Route::get('/login', function () {
    return view('homepage.login');
})->name('login');

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
    ->middleware(ProviderMiddleware::class) 
    ->name('pdash');


Route::get('/profileupdate', [ProfileController::class, 'edit'])->name('profile.edit'); // Allows GET request to load the form
Route::match(['put', 'post'], '/profileupdate', [ProfileController::class, 'update'])->name('profile.update');
