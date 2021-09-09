<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FrontendController;

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

Route::get('/', function () {
    return view('frontend.index');
});
Route::get("/admin", function () {
    return view("admin.index");
});

// Route::resource('/product', ProductController::class);
Route::resource('/product', 'ProductController');

// Authentication Routes
Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('post-login', [AuthController::class, 'postLogin'])->name('login.post');
Route::get('registration', [AuthController::class, 'registration'])->name('register');
Route::post('post-registration', [AuthController::class, 'postRegistration'])->name('register.post');
Route::get('dashboard', [AuthController::class, 'dashboard']);
Route::get('logout', [AuthController::class, 'logout'])->name('logout');


//frontend route
Route::get('/', [FrontendController::class, 'index']);
Route::get('/show/{post}', [FrontendController::class, 'show']);
Route::get('/frontend/category/{category?}', [FrontendController::class, 'getByCategory']);
Route::get('/frontend/search/', [FrontendController::class, 'getBySearch']);
