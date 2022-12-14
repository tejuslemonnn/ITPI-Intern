<?php

use App\Events\TestEvent;
use App\Http\Controllers\MessageController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});



Route::get('/rooms', [MessageController::class, 'getAllRooms']);
Route::post('/sendMessage', [MessageController::class, 'sendMessage']);
Route::get('/joinRoom/{id}', [MessageController::class, 'joinRoom']);

Route::get('/test', function () {
    event(new TestEvent());
    dd('Event has been sent!');
});
