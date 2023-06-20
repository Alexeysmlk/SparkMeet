<?php

use App\Http\Controllers\User\EventController;
use App\Http\Controllers\User\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::name('user.')->group(function () {
    Route::resource('events', EventController::class);
    Route::middleware('check.profile')->group(function () {
        Route::get('profile/create', [ProfileController::class, 'create'])->name('profile.create');
        Route::post('profile', [ProfileController::class, 'store'])->name('profile.store');
    });
});





Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
