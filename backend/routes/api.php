<?php

use App\Events\TestEvent;
use App\Http\Controllers\MessageController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MessageController;

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

<<<<<<< Updated upstream

// Route::controller('message', MessageController::class)->group(function () {
//     Route::get('/getAllRoom', 'getAllRoom');
//     Route::post('/sendMessage', 'sendMessage');
// });

Route::get('/getAllRooms', [MessageController::class, 'getAllRooms']);
Route::post('/sendMessage', [MessageController::class, 'sendMessage']);
Route::get('/joinRoom/{room_id}', [MessageController::class, 'joinRoom']);
=======
Route::get('/rooms', [MessageController::class, 'getRooms']);
Route::get('/room/{id}', [MessageController::class, 'roomMessage']);

Route::post('/send/message', [MessageController::class, 'addMessage']);
Route::get('/send/message', [MessageController::class, 'addMessage']);


Route::get('/test', function () {
    event(new TestEvent());
    return 'Haloo';
});
>>>>>>> Stashed changes
