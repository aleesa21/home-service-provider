<?php
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProviderController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WelcomeController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\ProviderMiddleware;
use App\Http\Middleware\UserMiddleware;


//welcome page route
Route::get('/', [WelcomeController::class, 'index'])->name('home');



//index page route
Route::get('/index', function () {
    return view('homepage.index');
});



// Show the login and register form
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::get('/register', [RegisterController::class, 'showRegisterForm'])->name('register');



//logout route
Route::post('/logout', function () {
    Auth::logout();
    return redirect('/'); // Redirect to homepage after logout
})->name('logout');



//login submit and register submit routes
Route::post('/register_submit',[RegisterController::class,'register'])->name('reguser');
Route::post('/login_submit', [LoginController::class, 'login'])->name('loguser');



//admindashboard route through inline middleware
Route::get('/admindash', [AdminController::class, 'index']) ->middleware([AdminMiddleware::class]) ->name('adash');
    Route::get('/adminproprofile', [AdminController::class, 'show'])->middleware([AdminMiddleware::class]) ->name('adashpprofile');
    Route::get('/admin/provider/{providerId}/reviews/{filter?}', [AdminController::class, 'review'])->name('admin.review');
    Route::delete('/admin/provider/{providerId}', [AdminController::class, 'deleteProvider'])->name('admin.delete');
    Route::delete('/admin/user/{providerId}', [AdminController::class, 'deleteUser'])->name('user.delete');
    Route::get('/adminuserprofile', [AdminController::class, 'user']) ->middleware([AdminMiddleware::class]) ->name('auserpprofile');
    
    
    

//userdasgboard routes
Route::get('/userdash', [UserController::class, 'show'])->middleware(['auth', UserMiddleware::class]) ->name('udash');
Route::get('/provider/{id}', [UserController::class, 'provider'])->name('provider.details');





//providerdashboard routes
Route::get('/providerdash/{id}', [ProviderController::class, 'dashboard'])->middleware(['auth', ProviderMiddleware::class]) ->name('pdash');
Route::get('/profileupdate', [ProviderController::class, 'profileedit'])->name('profile.edit'); // Allows GET request to load the form
Route::match(['put', 'post'], '/profileupdate', [ProviderController::class, 'profileupdate'])->name('profile.update');
Route::get('/provider/{id}/reviews', [ProviderController::class, 'review'])->name('provider.reviews');
Route::get('/providerhome', [ProviderController::class, 'home'])->name('provider.home');
Route::get('/pro/{id}', [ProviderController::class, 'otherproviderdetails'])->name('pro');
Route::middleware(['auth'])->group(function () {
    Route::get('/ppedit/{id}', [ProviderController::class, 'edit'])->name('provider.profile.edit');
    Route::post('/ppupdate/{id}', [ProviderController::class, 'update'])->name('provider.profile.update');
});



//feedback routes
Route::post('/feedback/{provider_id}', [FeedbackController::class, 'store'])->name('feedback.store')->middleware('auth');
Route::get('/feedback/{provider_id}', [FeedbackController::class, 'show'])->name('feedback.show');
