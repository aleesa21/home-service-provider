<?php
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProviderController;
use App\Http\Controllers\ProviderProfileUpdateController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WelcomeController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\ProviderMiddleware;
use App\Http\Middleware\UserMiddleware;

//homepage routes
//Route::get('/', function () {
    //return view('welcome');
//});

Route::get('/', [WelcomeController::class, 'index'])->name('home');
Route::get('/provider/{id}', [ProviderController::class, 'show'])->name('provider.profile');





Route::get('/index', function () {
    return view('homepage.index');
});
// Show the login form
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');


Route::post('/logout', function () {
    Auth::logout();
    return redirect('/'); // Redirect to homepage after logout
})->name('logout');

Route::get('/register', [RegisterController::class, 'showRegisterForm'])->name('register');


//controller route
Route::post('/register_submit',[RegisterController::class,'register'])->name('reguser');
Route::post('/login_submit', [LoginController::class, 'login'])->name('loguser');

//admindashboard route through inline middleware
Route::get('/admindash', [AdminController::class, 'index'])
    ->middleware([AdminMiddleware::class]) // Middleware applied here
    ->name('adash');


//dashboard route;
/*Route::get('/userdash', function () {
    return view('dashboard.userdash');//without middleware
})->name('udash');*/



/*Route::get('/userdash', function () {
    return view('dashboard.userdash');//inline way
})->name('udash');*/

Route::get('/userdash', [UserController::class, 'show'])
    ->middleware(['auth', UserMiddleware::class]) 
    ->name('udash');
 

Route::get('/providerdash/{id}', [ProviderController::class, 'dashboard'])
    ->middleware(['auth', ProviderMiddleware::class]) 
    ->name('pdash');

Route::get('/profileupdate', [ProfileController::class, 'edit'])->name('profile.edit'); // Allows GET request to load the form
Route::match(['put', 'post'], '/profileupdate', [ProfileController::class, 'update'])->name('profile.update');

//use App\Http\Controllers\ProviderProfileUpdateController;

Route::middleware(['auth'])->group(function () {
    Route::get('/ppedit/{id}', [ProviderProfileUpdateController::class, 'edit'])->name('provider.profile.edit');

    Route::post('/ppupdate/{id}', [ProviderProfileUpdateController::class, 'update'])->name('provider.profile.update');
});
