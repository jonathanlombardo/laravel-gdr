<?php

use App\Http\Controllers\CharactersController;
use App\Http\Controllers\ItemController;
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
//   return view('home');
// })->name('home');

Route::redirect('/', 'items');
Route::get('/items', [ItemController::class, 'index'])->name('items');
Route::resource('characters', CharactersController::class);