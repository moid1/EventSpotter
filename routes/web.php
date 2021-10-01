<?php


use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AuthResetPasswordController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ForgotPasswordController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::view('login', 'front.login');
Route::view('signup', 'front.signup');
Route::view('forgot', 'front.forgot');
Route::view('left', 'front.left');
Route::view('right', 'front.right');
Route::view('header', 'front.header');
Route::get('profile', [ProfileController::class, 'create'])->middleware('auth');
Route::view('/', 'front.home')->middleware('auth');

Route::post('login', [AuthController::class, 'login'])->name('login');
Route::post('user', [UserController::class, 'store'])->name('user');
// Route::get('/',[HomeController::class,'create']);
// Route::get('/post', [PostController::class, 'create'])->name('home');
// Route::post('/add-post',[PostController::class,'store'])->name('add-post');
Route::get('/logout', [AuthController::class, 'logout'])->name('/logout');

Route::get('forget-password', [ForgotPasswordController::class, 'getEmail']);
Route::post('forget-password', [ForgotPasswordController::class, 'postEmail']);

Route::get('reset-password/{token}', [AuthResetPasswordController::class, 'getPassword']);
Route::post('reset-password', [AuthResetPasswordController::class, 'updatePassword']);
