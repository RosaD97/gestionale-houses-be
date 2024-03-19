<?php

use App\Http\Controllers\Api\HouseController;
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

// http://127.0.0.1:8000/api/houses
Route::get('houses', [HouseController::class, 'index']);

// per dettaglio
//http://127.0.0.1:8000/api/houses/house/{id}
Route::get('houses/house/{id}', [HouseController::class, 'show']);

// per in evidenza
//http://127.0.0.1:8000/api/houses/evidenza
Route::get('houses/evidenza', [HouseController::class, 'evidenza']);
