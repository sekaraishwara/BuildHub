<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Frontend\StoreDashboardController;
use App\Http\Controllers\Frontend\VendorDashboardController;
use App\Http\Controllers\Frontend\CustomerDashboardController;
use App\Http\Controllers\Frontend\CandidateDashboardController;
use App\Http\Controllers\Frontend\ProfessionalDashboardController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [HomeController::class, 'index'])->name('home');


Route::group(
    [
        'middleware' => ['auth', 'verified', 'user.role:customer'],
        'prefix' => 'customer',
        'as' => 'customer.' //for name
    ],
    function () {
        Route::get('/dashboard', [CustomerDashboardController::class, 'index'])->name('dashboard');
    }
);

Route::group(
    [
        'middleware' => ['auth', 'verified', 'user.role:professional'],
        'prefix' => 'professional',
        'as' => 'professional.' //for name
    ],
    function () {
        Route::get('/dashboard', [ProfessionalDashboardController::class, 'index'])->name('dashboard');
    }
);

Route::group(
    [
        'middleware' => ['auth', 'verified', 'user.role:vendor'],
        'prefix' => 'vendor',
        'as' => 'vendor.' //for name
    ],
    function () {
        Route::get('/dashboard', [VendorDashboardController::class, 'index'])->name('dashboard');
    }
);

Route::group(
    [
        'middleware' => ['auth', 'verified', 'user.role:store'],
        'prefix' => 'store',
        'as' => 'store.' //for name
    ],
    function () {
        Route::get('/dashboard', [StoreDashboardController::class, 'index'])->name('dashboard');
    }
);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
