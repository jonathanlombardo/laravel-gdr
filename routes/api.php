<?php

use App\Http\Controllers\Api\CharacterController;
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

Route::get('characters', [CharacterController::class, 'index']);
Route::get('user-character/{character}', [CharacterController::class, 'generateUserCard']);
Route::get('pc-character}', [CharacterController::class, 'generatePCCard']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
