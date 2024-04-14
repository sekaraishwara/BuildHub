<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Frontend\StoreDashboardController;
use App\Http\Controllers\Frontend\VendorDashboardController;
use App\Http\Controllers\Frontend\CustomerDashboardController;
use App\Http\Controllers\Frontend\ProfessionalDashboardController;
use App\Http\Controllers\Frontend\Professional\ProfessionalServiceController;
use App\Http\Controllers\Frontend\Professional\ProfessionalPortfolioController;

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
        Route::get('/profile', [ProfessionalDashboardController::class, 'profile'])->name('profile');
        Route::patch('/profile', [ProfessionalDashboardController::class, 'update'])->name('profile.update');

        Route::get('/service', [ProfessionalServiceController::class, 'index'])->name('service');
        Route::post('/service/store', [ProfessionalServiceController::class, 'store'])->name('service.store');
        Route::post('/service/update{id}', [ProfessionalServiceController::class, 'update'])->name('service.update');
        Route::post('/service/delete{id}', [ProfessionalServiceController::class, 'delete'])->name('service.delete');

        Route::get('/portfolio', [ProfessionalPortfolioController::class, 'index'])->name('portfolio');
        Route::post('/portfolio/store', [ProfessionalPortfolioController::class, 'store'])->name('portfolio.store');
        Route::post('/portfolio/update{id}', [ProfessionalPortfolioController::class, 'update'])->name('portfolio.update');
        Route::post('/portfolio/delete{id}', [ProfessionalPortfolioController::class, 'delete'])->name('portfolio.delete');
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

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

require __DIR__ . '/auth.php';
