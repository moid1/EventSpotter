<?php

use App\Http\Controllers\AddressController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AuthResetPasswordController;
use App\Http\Controllers\FollowerController;
use App\Http\Controllers\FollowingController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\NotificationsController;
use App\Models\Following;
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
Route::view('cookie_policy', 'front.cookie_policy');
Route::view('disclamier', 'front.disclamier');
Route::view('privacy_policy', 'front.privacy_policy');
Route::view('refund', 'front.refund_policy');
Route::view('terms_of_service', 'front.terms_of_service ');
Route::view('login', 'front.login');
Route::view('signup', 'front.signup');
Route::view('forgot', 'front.forgot');
Route::view('left', 'front.left');
Route::view('right', 'front.right');
Route::view('header', 'front.header');
Route::get('profile', [ProfileController::class, 'create'])->middleware('auth');
Route::get('profile/{id}', [ProfileController::class, 'userProfile']);
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
//saving latlng after login
Route::post('/save-lat-lng', [UserController::class, 'saveLatLng']);
Route::post('/save-address', [AddressController::class, 'store']);
Route::post('/update-profile-picture', [UserController::class, 'uploadProfilePicture']);
//searching
Route::get('/search', [UserController::class, 'search']);
//Following
Route::post('/following', [FollowingController::class, 'store']);
Route::get('following', [FollowingController::class, 'create']);
Route::post('/unfollowing',[FollowingController::class,'unfollow']); //from followingtable
//Followers
Route::post('/follower', [FollowerController::class, 'store']);
Route::get('follower', [FollowerController::class, 'create']);
Route::post('/acceptFollowingRequest', [FollowingController::class, 'acceptFollowingRequest']);
Route::post('/cancelPendingRequest',[FollowerController::class,'cancelPendingRequest']);
Route::post('unfollow',[FollowerController::class,'unfollow']);

//Notifications

Route::get('notifications', [NotificationsController::class, 'create']);


//Make Priate No
Route::post('/makeNoPrivate',[UserController::class,'makeNoPrivate']);