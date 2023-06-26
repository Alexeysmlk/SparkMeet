<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashBoardController;
use App\Http\Controllers\Admin\EventController as AdminEventController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
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
    return redirect()->route('login');
});

Route::get('/email/verify', [EmailVerificationPromtController::class, '__invoke'])->middleware('auth')->name('verification.notice');
Route::get('/email/verify/{id}/{hash}', [VerifyEmailController::class, '__invoke'])->middleware(['auth', 'signed'])->name('verification.verify');
Route::post('/email/verification-notification', [EmailVerificationNotificationController::class, '__invoke'])->middleware('auth')->name('verification.send');

Route::get('/privacy', [\App\Http\Controllers\Client\DocumentController::class, 'privacy'])->name('privacy');
Route::get('/terms-conditions', [\App\Http\Controllers\Client\DocumentController::class, 'termsConditions'])->name('terms-conditions');

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
        Route::post('/events/{event}/like', [EventController::class, 'like'])->name('events.like');
    });
});

Route::name('admin.')->middleware(['role:admin', 'verified'])->prefix('admin')->group(function (){
    Route::get('dashboard', [DashBoardController::class, 'index'])->name('dashboard.main');
    Route::resource('events', AdminEventController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('tags', TagController::class)->except('show');
    Route::get('users', [AdminUserController::class, 'index'])->name('user.index');
    Route::get('users/{user}', [AdminUserController::class, 'show'])->name('user.show');
    Route::post('/users/{user}/change-role', [AdminUserController::class, 'changeRole'])->name('user.change-role');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
