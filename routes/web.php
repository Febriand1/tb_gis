<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', [\App\Http\Controllers\MasjidController::class, 'welcome']);

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', function () {
    return view('home');
})->name('home')->middleware('auth');

// Route::resource('sekolahs', \App\Http\Controllers\SekolahController::class)
//     ->middleware('auth');

Route::resource('masjids', \App\Http\Controllers\MasjidController::class)
    ->middleware('auth');

    Route::get('/maps', [\App\Http\Controllers\MasjidController::class, 'map'])
    ->middleware('auth');
