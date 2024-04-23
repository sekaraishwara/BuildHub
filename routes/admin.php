<?php

use App\Http\Controllers\Admin\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Admin\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Admin\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Admin\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Admin\Auth\NewPasswordController;
use App\Http\Controllers\Admin\Auth\PasswordController;
use App\Http\Controllers\Admin\Auth\PasswordResetLinkController;
use App\Http\Controllers\Admin\Auth\RegisteredUserController;
use App\Http\Controllers\Admin\Auth\VerifyEmailController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DomisiliController;
use App\Http\Controllers\Admin\Master\DataCategoryController;
use App\Models\Admin;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['guest:admin'], 'prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('login', [AuthenticatedSessionController::class, 'create'])
        ->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store']);

    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
        ->name('password.request');

    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
        ->name('password.email');

    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
        ->name('password.reset');

    Route::post('reset-password', [NewPasswordController::class, 'store'])
        ->name('password.store');
});

Route::group(['middleware' => ['auth:admin'], 'prefix' => 'admin', 'as' => 'admin.'], function () {
    /** Dashboard Route*/
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

    /** Data-Domisili Route*/
    Route::get('data-domisili', [DomisiliController::class, 'index'])->name('data.domisili');

    /** Data-Category Route*/
    Route::get('data-category/store', [DataCategoryController::class, 'storeCategory'])->name('data-category.store');
    Route::post('data-category/store/update', [DataCategoryController::class, 'storeCategoryUpdate'])->name('data-category.store.update');

    Route::get('data-category/vendor', [DataCategoryController::class, 'vendorCategory'])->name('data-category.vendor');
    Route::post('data-category/vendor/update', [DataCategoryController::class, 'vendorCategoryUpdate'])->name('data-category.vendor.update');

    Route::get('data-category/professional', [DataCategoryController::class, 'professionalCategory'])->name('data-category.professional');
    Route::post('data-category/professional/update', [DataCategoryController::class, 'professionalCategoryUpdate'])->name('data-category.professional.update');




    /** Data-Category Route*/
    Route::get('verify-email', EmailVerificationPromptController::class)
        ->name('verification.notice');

    Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
        ->middleware(['signed', 'throttle:6,1'])
        ->name('verification.verify');

    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
        ->middleware('throttle:6,1')
        ->name('verification.send');

    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
        ->name('password.confirm');

    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);

    Route::put('password', [PasswordController::class, 'update'])->name('password.update');

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');
});
