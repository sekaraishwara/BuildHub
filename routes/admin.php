<?php

use App\Models\Admin;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DomisiliController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\Auth\PasswordController;
use App\Http\Controllers\Admin\Master\DataUserController;
use App\Http\Controllers\Admin\Auth\NewPasswordController;
use App\Http\Controllers\Admin\Auth\VerifyEmailController;
use App\Http\Controllers\Admin\Master\DataVendorController;
use App\Http\Controllers\Admin\Auth\RegisteredUserController;
use App\Http\Controllers\Admin\Master\DataCategoryController;
use App\Http\Controllers\Admin\Auth\PasswordResetLinkController;
use App\Http\Controllers\Admin\Master\StoreTransactionController;
use App\Http\Controllers\Admin\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Admin\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Admin\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Admin\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Admin\Blog\DataBlogController;
use App\Http\Controllers\Admin\Event\DataEventController;
use App\Http\Controllers\Admin\Master\DataProfessionalController;
use App\Http\Controllers\Admin\Master\DataStoreController;

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

    /** Data-User Route*/
    Route::get('data-user', [DataUserController::class, 'index'])->name('data.user');
    // Route::post('data-user/delete{id}', [DataUserController::class, 'delete'])->name('data.user.delete');

    Route::get('data-vendor', [DataVendorController::class, 'index'])->name('data.vendor');
    Route::get('data-professional', [DataProfessionalController::class, 'index'])->name('data.professional');
    Route::get('data-store', [DataStoreController::class, 'index'])->name('data.store');

    /** Data-Transaction Route*/
    Route::get('store-transaction/need-approve', [StoreTransactionController::class, 'needApprove'])->name('transaction.approval');
    Route::get('store-transaction/need-approve/service', [StoreTransactionController::class, 'needApproveService'])->name('transaction.approval.service');
    Route::post('store-transaction/approve-transaction/{inv}', [StoreTransactionController::class, 'approveTransaction'])->name('transaction.approveTransaction');

    /** Data-Category Route*/
    Route::get('data-category/store', [DataCategoryController::class, 'storeCategory'])->name('data-category.store');
    Route::post('data-category/store/update', [DataCategoryController::class, 'storeCategoryUpdate'])->name('data-category.store.update');

    Route::get('data-category/vendor', [DataCategoryController::class, 'vendorCategory'])->name('data-category.vendor');
    Route::post('data-category/vendor/update', [DataCategoryController::class, 'vendorCategoryUpdate'])->name('data-category.vendor.update');

    Route::get('data-category/professional', [DataCategoryController::class, 'professionalCategory'])->name('data-category.professional');
    Route::post('data-category/professional/update', [DataCategoryController::class, 'professionalCategoryUpdate'])->name('data-category.professional.update');

    /** Data-Blog Route*/
    Route::get('/data-blog', [DataBlogController::class, 'index'])->name('data.blog');
    Route::get('/data-blog/create', [DataBlogController::class, 'create'])->name('data.blog.create');
    Route::post('/data-blog/store', [DataBlogController::class, 'store'])->name('data.blog.store');
    Route::get('/data-blog/edit{slug}', [DataBlogController::class, 'edit'])->name('data.blog.edit');
    Route::post('/data-blog/update{id}', [DataBlogController::class, 'update'])->name('data.blog.update');
    Route::delete('/data-blog/delete{id}', [DataBlogController::class, 'delete'])->name('data.blog.delete');

    /** Data-Event Route*/
    Route::get('/data-event', [DataEventController::class, 'index'])->name('data.event');
    Route::get('/data-event/create', [DataEventController::class, 'create'])->name('data.event.create');
    Route::post('/data-event/store', [DataEventController::class, 'store'])->name('data.event.store');
    Route::get('/data-event/edit{slug}', [DataEventController::class, 'edit'])->name('data.event.edit');
    Route::post('/data-event/update{id}', [DataEventController::class, 'update'])->name('data.event.update');
    Route::delete('/data-event/delete{id}', [DataEventController::class, 'delete'])->name('data.event.delete');




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
