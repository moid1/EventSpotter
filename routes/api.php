<?php

use App\Http\Controllers\API\AuthController as APIAuthController;
use App\Http\Controllers\API\EventController;
use App\Http\Controllers\API\NotificationsController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FavrouiteController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Password;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::post('/create-account', [AuthController::class, 'createAccount']);
Route::post('/login', [AuthController::class, 'functionLogin']);
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/logged-in', function (Request $request) {
        return response()->json([
            'success' => true,
            'data' => auth()->user(),
            'message' => 'Logged In User'
        ]);
    });

    Route::post('/saveLatLng', [AuthController::class, 'saveLatLng']);
    Route::get('/logout', [AuthController::class, 'appLogout']);
    Route::get('/getEvents', [EventController::class, 'getEvents']);
    Route::get('/getUserUpcomingEvents', [EventController::class, 'getUserUpcomingEvents']);
    Route::get('/getUserPastEvent', [EventController::class, 'getUserPastEvent']);
    Route::get('/getUserDraftEvent', [EventController::class, 'getUserDraftEvents']);

    Route::get('/profile', [APIAuthController::class, 'getUserProfile']);
    Route::get('/notifications', [NotificationsController::class, 'getUserNotifications']);

    //FavrouiteEvent

    Route::post('/favrouite', [FavrouiteController::class, 'store']);
    Route::post('/unfavrouit', [FavrouiteController::class, 'remove']);
});
