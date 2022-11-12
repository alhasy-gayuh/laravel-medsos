<?php

use App\Http\Controllers\EditPasswordController;
use App\Http\Controllers\EditProfileController;
use App\Http\Controllers\ExploreUserController;
use App\Http\Controllers\FollowingController;
use App\Http\Controllers\ProfileInformationController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\TimelineController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;


Route::get('/', WelcomeController::class)->name('welcome');

Route::middleware('auth')->group(function () {

    Route::get('timeline', [TimelineController::class, 'index'])->name('timeline');
    Route::post('status/create', [StatusController::class, 'store'])->name('status.store');

    Route::get('explore', ExploreUserController::class)->name('users.index');

    Route::prefix('profile')->group(function () {
        Route::get('edit', [EditProfileController::class, 'edit'])->name('profile.edit');
        Route::put('update', [EditProfileController::class, 'update'])->name('profile.update');

        Route::get('password/edit', [EditPasswordController::class, 'edit'])->name('password.edit');
        Route::put('password/edit', [EditPasswordController::class, 'update']);

        Route::get('{user}/{following}', [FollowingController::class, 'index'])->name('following.index');
        Route::post('{user}', [FollowingController::class, 'store'])->name('following.store');

        Route::get('{user}', ProfileInformationController::class)->name('profile')->withoutMiddleware('auth');
    });
});


require __DIR__ . '/auth.php';
