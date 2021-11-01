<?php

use App\Http\Controllers\AddressController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AuthResetPasswordController;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\EventFeedsController;
use App\Http\Controllers\FavrouiteController;
use App\Http\Controllers\FollowerController;
use App\Http\Controllers\FollowingController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\LikesController;
use App\Http\Controllers\NotificationsController;
use App\Models\Event;
use App\Models\Favrouite;
use App\Models\Following;
use Egulias\EmailValidator\Warning\Comment;
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
Route::get('/', [UserController::class, 'create'])->middleware('auth');
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
Route::post('/unfollowing', [FollowingController::class, 'unfollow']); //from followingtable
//Followers
Route::post('/follower', [FollowerController::class, 'store']);
Route::get('follower', [FollowerController::class, 'create']);
Route::post('/acceptFollowingRequest', [FollowingController::class, 'acceptFollowingRequest']);
Route::post('/cancelPendingRequest', [FollowerController::class, 'cancelPendingRequest']);
Route::post('unfollow', [FollowerController::class, 'unfollow']);

//Notifications

Route::get('notifications', [NotificationsController::class, 'create']);
Route::get('notificationReadable/{id}/{routeName}', [NotificationsController::class, 'makeNotificationReadable']);


//Make Priate No
Route::post('/makeNoPrivate', [UserController::class, 'makeNoPrivate']);

//EVENTS
Route::post('/createEvent', [EventController::class, 'store']);
Route::post('/draftEvent', [EventController::class, 'draftEvent']);
Route::get('/getPastEvents', [EventController::class, 'getUserPastEvent']);
Route::get('/getUpcomingEvents', [EventController::class, 'getUserUpcomingEvents']);
Route::get('/getDraftEvents', [EventController::class, 'getDraftEvents']);
Route::get('/eventDetails/{id}', [EventController::class, 'getEventDetail']);
Route::post('/deleteEvent', [EventController::class, 'deleteEvent']);
//FavrouiteEvnets
Route::post('/saveFavrouite', [FavrouiteController::class, 'store']);
Route::post('/deleteFavrouite', [FavrouiteController::class, 'remove']);
Route::get('/favrouite', [FavrouiteController::class, 'create']);

Route::get('getFavouriteUserPastEvents', [FavrouiteController::class, 'getFavouritePastEvents']);
Route::get('getFavouriteUpcomingEvents', [FavrouiteController::class, 'getFavouriteUpcomingEvents']);

//YOUR EVENTS
Route::view('/userEvents', 'front.your_events');
Route::get('/yourEvents', [EventController::class, 'yourEvents']);
Route::get('/yourPastEvents', [EventController::class, 'yourPastEvents']);
Route::get('/yourDraftEvents', [EventController::class, 'yourDraftEvents']);

//Event Snaps

Route::get('/eventSnap/{id}', [EventController::class, 'eventSnap']);
Route::post('/uploadEventSnap', [EventFeedsController::class, 'store']);
Route::post('/deleteSnap', [EventFeedsController::class, 'deleteEventSnap']);


//COmments

Route::get('eventComment/{id}', [CommentsController::class, 'create']);
Route::post('storeComment', [CommentsController::class, 'store']);

//Likes

Route::post('like', [LikesController::class, 'store']);

Route::get('filter/{filter}', [EventController::class, 'filterEvent']);
