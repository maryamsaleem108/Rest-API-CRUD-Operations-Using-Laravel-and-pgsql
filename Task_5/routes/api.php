<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\inventoryController;

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

//    ---------------------------- READ ----------------------------------
Route::get('inventory', [inventoryController::class, 'index']);
Route::get('inventory/{id}', [inventoryController::class, 'show']);

//    ---------------------------- CREATE ----------------------------------
//set key = Accept and value = application/json in header in postman
Route::post('inventory/insert', [inventoryController::class, 'store']);

//    ---------------------------- UPDATE ----------------------------------
Route::match(['put', 'post'], 'inventory/update/{id}', [inventoryController::class, 'update']);

//    ---------------------------- DELETE ----------------------------------
Route::match(['delete', 'post'], 'inventory/delete/{id}', [inventoryController::class, 'destroy']);
