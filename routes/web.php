<?php

use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromtController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\Client\EventController;
use App\Http\Controllers\Client\ProfileController;
use App\Http\Controllers\Client\UserController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/email/verify', [EmailVerificationPromtController::class, '__invoke'])->middleware('auth')->name('verification.notice');
Route::get('/email/verify/{id}/{hash}', [VerifyEmailController::class, '__invoke'])->middleware(['auth', 'signed'])->name('verification.verify');
Route::post('/email/verification-notification', [EmailVerificationNotificationController::class, '__invoke'])->middleware('auth')->name('verification.send');

Route::name('user.')->middleware(['auth', 'verified'])->group(function () {
    Route::get('profile/create', [ProfileController::class, 'create'])->name('profile.create');
    Route::post('profile', [ProfileController::class, 'store'])->name('profile.store');
    Route::middleware('check.profile')->group(function () {
        Route::resource('events', EventController::class);
        Route::get('profile', [ProfileController::class, 'index'])->name('profile.index');
        Route::post('profile/upload', [ProfileController::class, 'upload'])->name('profile.upload');
        Route::put('profile/{profile}', [ProfileController::class, 'update'])->name('profile.update');
        Route::get('profile/{profile}', [ProfileController::class, 'show'])->name('profile.show');
        Route::get('user/setting', [UserController::class, 'edit'])->name('profile.edit');
        Route::put('/user/update-email', [UserController::class, 'updateEmail'])->name('user.updateEmail');
        Route::put('/user/update-password', [UserController::class, 'updatePassword'])->name('user.updatePassword');
        Route::delete('/user/delete-account', [UserController::class, 'deactivateAccount'])->name('user.deleteAccount');
    });
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
