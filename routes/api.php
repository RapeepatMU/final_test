<?php

use App\Http\Controllers\LocationController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\TourController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::group(['prefix' => 'tour'], function () {
    Route::get('/', [TourController::class, 'getTour'])->name('tour.get');
    Route::post('/create', [TourController::class, 'create']);
});

Route::group(['prefix' => 'location'], function () {
    Route::get('/', [LocationController::class, 'getLocation']);
    Route::post('/create', [LocationController::class, 'create']);
});

Route::group(['prefix' => 'register'], function () {
    Route::get('/', [RegisterController::class, 'getRegister']);
    Route::put('/{id}', [RegisterController::class, 'update']);
});
Route::group(['prefix' => 'status'], function () {
    Route::get('/', [TourController::class, 'getStatus']);
});




Route::get('test', function () {
    return 'Hiiiii';
});
