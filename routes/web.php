<?php

use App\Http\Controllers\Frontend\Customer\CustomerBuildingChecklistController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Frontend\Home\StoreController;
use App\Http\Controllers\Frontend\StoreDashboardController;
use App\Http\Controllers\Frontend\VendorDashboardController;
use App\Http\Controllers\Frontend\CustomerDashboardController;
use App\Http\Controllers\Frontend\Home\ProfessionalController;
use App\Http\Controllers\Frontend\Store\StoreProductController;
use App\Http\Controllers\Frontend\Store\StoreProfileController;
use App\Http\Controllers\Frontend\Vendor\VendorProfileController;
use App\Http\Controllers\Frontend\Vendor\VendorserviceController;
use App\Http\Controllers\Frontend\Customer\CustomerCartController;
use App\Http\Controllers\Frontend\Customer\CustomerChatController;
use App\Http\Controllers\Frontend\ProfessionalDashboardController;
use App\Http\Controllers\Frontend\Vendor\VendorPortfolioController;
use App\Http\Controllers\Frontend\Customer\CustomerProfileController;
use App\Http\Controllers\Frontend\Customer\CustomerTransactionController;
use App\Http\Controllers\Frontend\Home\NotificationController;
use App\Http\Controllers\Frontend\NotifiactionController;
use App\Http\Controllers\Frontend\Professional\ProfessionalProfileController;
use App\Http\Controllers\Frontend\Professional\ProfessionalServiceController;
use App\Http\Controllers\Frontend\Professional\ProfessionalPortfolioController;
use App\Http\Controllers\Frontend\Store\StoreChatController;
use App\Http\Controllers\VendorController;
use App\Models\CustomerTransaction;

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
Route::get('/professional', [ProfessionalController::class, 'index'])->name('professional');
Route::get('/store', [StoreController::class, 'index'])->name('store');
Route::get('/vendorr', [VendorController::class, 'index'])->name('vendor');

Route::get('/product/{slug}', [StoreController::class, 'singleProduct'])->name('singleItem');
Route::get('/service/by-professional/{slug}', [ProfessionalController::class, 'singleService'])->name('serviceItemProfessional');
Route::get('/service/by-vendor/{id}', [VendorController::class, 'singleService'])->name('serviceItemVendor');

Route::get('/notification', [NotificationController::class, 'index'])->name('notification');


Route::group(
    [
        'middleware' => ['auth', 'verified', 'user.role:customer'],
        'prefix' => 'customer',
        'as' => 'customer.' //for name
    ],
    function () {
        Route::get('/dashboard', [CustomerDashboardController::class, 'index'])->name('dashboard');
        Route::get('/profile', [CustomerProfileController::class, 'profile'])->name('profile');

        Route::post('/profile/customer-profile', [CustomerProfileController::class, 'updateCustomerProfile'])->name('profile.customer');
        Route::post('/profile/customer-info', [CustomerProfileController::class, 'updateCustomerInfo'])->name('profile.customer-info');
        Route::post('/profile/account-info', [CustomerProfileController::class, 'updateAccountInfo'])->name('profile.account-info');
        Route::post('/profile/password-update', [CustomerProfileController::class, 'updatePassword'])->name('profile.password-update');


        Route::get('/cart', [CustomerCartController::class, 'index'])->name('cart');
        Route::post('/cart/add', [CustomerCartController::class, 'addToCart'])->name('cart.addToCart');
        Route::get('/cart/count-items', [CustomerCartController::class, 'getTotalItemCart'])->name('getTotalItemCart');

        Route::get('/cart/checkout', [CustomerCartController::class, 'sessionCheckout'])->name('sessionCheckout');
        Route::post('/cart/checkout', [CustomerCartController::class, 'sessionCheckout'])->name('sessionCheckout');

        Route::post('/cart/checkout-submit', [CustomerCartController::class, 'sessionTransaction'])->name('sessionTransaction');

        Route::get('/payment', [CustomerTransactionController::class, 'getPayment'])->name('payment');

        Route::get('/transaction', [CustomerDashboardController::class, 'transaction'])->name('order');
        Route::post('/transaction/payment-upload', [CustomerTransactionController::class, 'uploadPayment'])->name('payment.upload');

        Route::get('/chat', [CustomerChatController::class, 'index'])->name('chat');
        Route::get('/chat/sendMessage', [CustomerChatController::class, 'sendMessage'])->name('send.sendMessage');
        Route::post('/chat/sendMessage', [CustomerChatController::class, 'sendMessage'])->name('send.sendMessage');

        Route::get('/history-transaction', [CustomerDashboardController::class, 'historyTransaction'])->name('history-transaction');
        Route::post('/history-transaction/send-rate', [CustomerTransactionController::class, 'sessionRate'])->name('sessionRate');

        Route::get('/building-checklist', [CustomerBuildingChecklistController::class, 'index'])->name('building-checklist');
        Route::post('/building-checklist', [CustomerBuildingChecklistController::class, 'create'])->name('building-checklist.create');
        Route::post('/building-checklist/items-store', [CustomerBuildingChecklistController::class, 'addItem'])->name('building-checklist.items-store');
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

        Route::get('/profile', [ProfessionalProfileController::class, 'profile'])->name('profile');
        Route::post('/profile/professional-profile', [ProfessionalProfileController::class, 'updateProfessionalProfile'])->name('profile.professional.profile');
        Route::post('/profile/professional-info', [ProfessionalProfileController::class, 'updateProfessionalInfo'])->name('profile.professional-info');
        Route::post('/profile/account-info', [ProfessionalProfileController::class, 'updateAccountInfo'])->name('profile.account-info');
        Route::post('/profile/password-update', [ProfessionalProfileController::class, 'updatePassword'])->name('profile.password-update');

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

        Route::get('/profile', [VendorProfileController::class, 'profile'])->name('profile');
        Route::post('/profile/vendor-profile', [VendorProfileController::class, 'updateVendorProfile'])->name('vendor.profile');
        Route::post('/profile/vendor-info', [VendorProfileController::class, 'updateVendorInfo'])->name('profile.vendor-info');
        Route::post('/profile/account-info', [VendorProfileController::class, 'updateAccountInfo'])->name('profile.account-info');
        Route::post('/profile/password-update', [VendorProfileController::class, 'updatePassword'])->name('profile.password-update');

        Route::get('/service', [VendorserviceController::class, 'index'])->name('service');
        Route::post('/service/store', [VendorserviceController::class, 'store'])->name('service.store');
        Route::post('/service/update{id}', [VendorserviceController::class, 'update'])->name('service.update');
        Route::post('/service/delete{id}', [VendorserviceController::class, 'delete'])->name('service.delete');

        Route::get('/portfolio', [VendorPortfolioController::class, 'index'])->name('portfolio');
        Route::post('/portfolio/store', [VendorPortfolioController::class, 'store'])->name('portfolio.store');
        Route::post('/portfolio/update{id}', [VendorPortfolioController::class, 'update'])->name('portfolio.update');
        Route::post('/portfolio/delete{id}', [VendorPortfolioController::class, 'delete'])->name('portfolio.delete');
    }
);

Route::group(
    [
        'middleware' => ['auth', 'verified', 'user.role:store'],
        'prefix' => 'store',
        'as' => 'store.'
    ],
    function () {
        Route::get('/dashboard', [StoreDashboardController::class, 'index'])->name('dashboard');

        Route::get('/profile', [StoreProfileController::class, 'profile'])->name('profile');
        Route::post('/profile/my-store', [StoreProfileController::class, 'updateMyStore'])->name('profile.my-store');
        Route::post('/profile/store-info', [StoreProfileController::class, 'updateStoreInfo'])->name('profile.store-info');
        Route::post('/profile/account-info', [StoreProfileController::class, 'updateAccountInfo'])->name('profile.account-info');
        Route::post('/profile/password-update', [StoreProfileController::class, 'updatePassword'])->name('profile.password-update');

        Route::get('/product', [StoreProductController::class, 'index'])->name('product');
        Route::get('/product/create', [StoreProductController::class, 'create'])->name('product.create');
        Route::post('/product/store', [StoreProductController::class, 'store'])->name('product.store');
        Route::get('/product/edit{id}', [StoreProductController::class, 'edit'])->name('product.edit');
        Route::post('/product/update{id}', [StoreProductController::class, 'update'])->name('product.update');
        Route::delete('/product/delete{id}', [StoreProductController::class, 'delete'])->name('product.delete');

        Route::get('/transaction', [StoreDashboardController::class, 'transaction'])->name('transaction');
        Route::post('/transaction/resi-upload', [StoreDashboardController::class, 'uploadResi'])->name('resi.upload');

        /*Chat Route*/
        Route::get('/chat', [StoreChatController::class, 'index'])->name('chat');
    }
);

require __DIR__ . '/auth.php';
