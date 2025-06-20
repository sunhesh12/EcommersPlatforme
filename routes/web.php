<?php

use App\Http\Controllers\catalogController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\ShoppingCartController;
use App\Http\Controllers\AddtoCartControlle;
use App\Http\Controllers\CartController;
use App\Http\Controllers\checkout1;
use App\Http\Controllers\checkout2Controller;
use App\Http\Controllers\Checkout3Controller;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\ProductController;
use App\Models\Product;

// ========================
// General Routes
// ========================
// Route::get('/', [HomeController::class, 'index'])->name('home');
// Route::get('/home', [HomeController::class, 'index'])->name('home');

// Route::view('/aboutuss', 'app/Aboutus')->name('user.aboutuss');
// Route::view('/faq', 'app/faq')->name('user.faq');
// Route::view('/contactUs', 'app/contactUs')->name('user.contactUs');
Route::middleware('web')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::view('/aboutuss', 'app/Aboutus')->name('user.aboutuss');
    Route::view('/faq', 'app/faq')->name('user.faq');
    Route::view('/contactUs', 'app/contactUs')->name('user.contactUs');
});
// ========================
// catalog Routes
// ========================

// Route::get('/catalog', [catalogController::class, 'index'])->name('user.catalog');
// Route::get('/catalog', [CatalogController::class, 'index01'])->name('catalog.filter');
// Route::get('/catalog/filter-live', [ProductController::class, 'liveCatalog'])->name('catalog.filter.live');
Route::middleware('web')->group(function () {
    Route::get('/catalog', [CatalogController::class, 'index01'])->name('catalog.filter');
    Route::get('/catalog/filter-live', [ProductController::class, 'liveCatalog'])->name('catalog.filter.live');
});



// ========================
// Authentication Routes
// ========================
// Route::get('/registerr', [RegisterController::class, 'showRegisterForm'])->name('user.registerr');
// Route::post('/registerr', [RegisterController::class, 'register'])->name('register.post');

// Route::post('/loginn', [AuthController::class, 'login'])->name('user.loginn');
// Route::get('/loginn', [AuthController::class, 'index'])->name('user.loginn');
// Route::post('/loginn1', [AuthController::class, 'login'])->name('loginn.post');
// Route::get('/logoutt', [AuthController::class, 'logout'])->name('logoutt');

// Route::post('/accept-terms', [AuthController::class, 'acceptTerms'])->name('accept.terms');
Route::middleware('web')->group(function () {
    Route::get('/registerr', [RegisterController::class, 'showRegisterForm'])->name('user.registerr');
    Route::post('/registerr', [RegisterController::class, 'register'])->name('register.post')->middleware('throttle:5,1');

    Route::get('/loginn', [AuthController::class, 'index'])->name('user.loginn');
    Route::post('/loginn', [AuthController::class, 'login'])->name('user.loginn')->middleware('throttle:5,1');
    Route::post('/loginn1', [AuthController::class, 'login'])->name('loginn.post')->middleware('throttle:5,1');

    Route::get('/logoutt', [AuthController::class, 'logout'])->name('logoutt')->middleware('auth');
    Route::post('/accept-terms', [AuthController::class, 'acceptTerms'])->name('accept.terms')->middleware('auth');
});


use App\Http\Controllers\ForgotPasswordController;

// Route::get('/forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
// Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');

use App\Http\Controllers\changePasswordController;

// Route::middleware(['auth'])->group(function () {
//     Route::get('/change-password', [changePasswordController::class, 'showChangePasswordForm'])->name('user.change-password');
//     Route::post('/change-password', [changePasswordController::class, 'changePassword'])->name('user.update-password');
// });
Route::middleware('web')->group(function () {
    Route::get('/forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
    Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email')->middleware('throttle:3,1');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/change-password', [changePasswordController::class, 'showChangePasswordForm'])->name('user.change-password');
    Route::post('/change-password', [changePasswordController::class, 'changePassword'])->name('user.update-password');
});



// ========================
// User Profile Routes
// ========================
// Route::get('/my-profile', [UserProfileController::class, 'Profile'])->name('user.my-profile');
// Route::get('/my-profile/{id}/edit', [UserProfileController::class, 'edit'])->name('user.my-profile.edit');
// Route::put('/my-profile/{id}', [UserProfileController::class, 'update'])->name('user.my-profile.update');
// Route::post('/update-profile-picture', [UserProfileController::class, 'updateProfilePicture'])->name('user.update-profile-picture');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/my-profile', [UserProfileController::class, 'Profile'])->name('user.my-profile');
    Route::get('/my-profile/{id}/edit', [UserProfileController::class, 'edit'])->name('user.my-profile.edit');
    Route::put('/my-profile/{id}', [UserProfileController::class, 'update'])->name('user.my-profile.update');
    Route::post('/update-profile-picture', [UserProfileController::class, 'updateProfilePicture'])->name('user.update-profile-picture');
});


// ========================
// Shopping Cart Routes
// ========================
Route::
middleware(['web', 'checkLogin'])->
group(function () {
    Route::get('/cart', [ShoppingCartController::class, 'index'])->name('user.cart');
    Route::post('/cart/update', [ShoppingCartController::class, 'update'])->name('cart.update');
    Route::post('/cart/remove', [ShoppingCartController::class, 'remove'])->name('cart.remove');
    Route::post('/cart/clear', [ShoppingCartController::class, 'clearCart'])->name('cart.clearAll');
    Route::post('/add-to-cart', [AddtoCartControlle::class, 'add'])->name('cart.add');
});

// ========================
// Product Details Route
// ========================
Route::get('/product/{id}', function ($id) {
    $product = Product::findOrFail($id);
    return view('app.ProductDetails', ['product' => $product]);
})->name('product.details');

// ========================
// Checkout Routes
// ========================
// Route::get('/checkout1', [checkout1::class, 'index'])->name('user.checkout1');
// Route::get('/checkout2', [checkout2Controller::class, 'index'])->name('user.checkout2');
// Route::view('/checkout3', 'app/checkout3')->name('user.checkout3');
// Route::view('/checkout4', 'app/checkout4')->name('user.checkout4');

// ========================
// Payment and OTP Routes
// ========================
// Route::middleware('auth')->group(function () {
//     Route::post('/payment/save', [PaymentController::class, 'store'])->name('save.payment');
// });
// Route::get('/payment/otp', [PaymentController::class, 'showOtpForm'])->name('verify.payment.otp');
// Route::post('/payment/otp', [PaymentController::class, 'verifyOtp'])->name('verify.payment.otp.submit');
// Route::get('/resend-otp', [Checkout3Controller::class, 'resendOtp'])->name('resend.otp');
// Route::middleware(['auth', 'verified'])->group(function () {
//     Route::get('/checkout1', [checkout1::class, 'index'])->name('user.checkout1');
//     Route::get('/checkout2', [checkout2Controller::class, 'index'])->name('user.checkout2');
//     Route::view('/checkout3', 'app/checkout3')->name('user.checkout3');
//     Route::view('/checkout4', 'app/checkout4')->name('user.checkout4');

//     Route::post('/payment/save', [PaymentController::class, 'store'])->name('save.payment');
//     Route::post('/payment/otp', [PaymentController::class, 'verifyOtp'])->name('verify.payment.otp.submit');
//     Route::get('/payment/otp', [PaymentController::class, 'showOtpForm'])->name('verify.payment.otp');
//     Route::get('/resend-otp', [Checkout3Controller::class, 'resendOtp'])->name('resend.otp');
// });


// Step 1: Checkout1 – No middleware
Route::get('/checkout1', [checkout1::class, 'index'])->name('user.checkout1');
Route::post('/checkout1/submit', [checkout1::class, 'submitStep1'])->name('checkout1.submit');

// Step 2: Checkout2 – Only if step 1 is complete
Route::middleware('checkout.step1')->group(function () {
    Route::get('/checkout2', [checkout2Controller::class, 'index'])->name('user.checkout2');
    Route::post('/checkout2/submit', [checkout2Controller::class, 'submitStep2'])->name('checkout2.submit');
    Route::post('/payment/save', [PaymentController::class, 'store'])->name('save.payment');
});

// Step 3: Checkout3 – Only if step 2 is complete
// Route::middleware(['checkout.step1', 'checkout.step2'])->group(function () {
    Route::get('/checkout3', [checkout3Controller::class, 'index'])->name('user.checkout3');
    Route::get('/resend-otp', [checkout3Controller::class, 'resendOtp'])->name('resend.otp');
// });

// Step 4: OTP + Payment – Only if step 3 is complete
Route::middleware(['auth', 'checkout.step1', 'checkout.step2'])->group(function () {
    Route::get('/payment/otp', [PaymentController::class, 'showOtpForm'])->name('verify.payment.otp');
    Route::post('/payment/otp', [PaymentController::class, 'verifyOtp'])->name('verify.payment.otp.submit');
});

// Final: Checkout4 – Only if OTP (step 4) is done
Route::middleware(['checkout.step1', 'checkout.step2', 'checkout.step3'])->group(function () {
    Route::view('/checkout4', 'app.checkout4')->name('user.checkout4');
});


// ========================
// Order Summary & Download
// ========================
// Route::get('/order-summary/download', [OrderController::class, 'downloadOrderSummary'])->name('order.summary.download');

Route::middleware(['auth', 'verified'])->get('/order-summary/download', [OrderController::class, 'downloadOrderSummary'])->name('order.summary.download');

// ========================
// Admin Dashboard (Demo View)
// ========================
Route::middleware('checkLogin')->get('/dashboardd', function () {
    return view('admin/dashboard');
})->name('admin.dashboard');

// ========================
// Admin - User Management
// ========================
Route::middleware(['checkLogin', 'is_admin'])->prefix('/dashboardd/usermanagement')->name('admin.users.')->group(function () {
    Route::get('/', [UserController::class, 'index'])->name('index');
    Route::get('/create', [UserController::class, 'create'])->name('create');
    Route::post('/', [UserController::class, 'store'])->name('store');
    Route::get('/{id}/edit', [UserController::class, 'edit'])->name('edit');
    Route::put('/{id}', [UserController::class, 'update'])->name('update');
    Route::delete('/delete/{id}', [UserController::class, 'destroy'])->name('destroy');
    Route::post('/{id}/block', [UserController::class, 'block'])->name('block');
    Route::post('/{id}/unblock', [UserController::class, 'unblock'])->name('unblock');
});

// ========================
// Admin - Brand Management
// ========================
Route::middleware(['checkLogin', 'is_admin'])->prefix('/dashboardd/brandmanagement')->name('admin.brands.')->group(function () {
    Route::get('/', [BrandController::class, 'index'])->name('index');
    Route::get('/create', [BrandController::class, 'create'])->name('create');
    Route::post('/', [BrandController::class, 'store'])->name('store');
    Route::get('/{id}/edit', [BrandController::class, 'edit'])->name('edit');
    Route::put('/{id}', [BrandController::class, 'update'])->name('update');
    Route::delete('/delete/{id}', [BrandController::class, 'destroy'])->name('destroy');
});

// ========================
// Admin - Product Management
// ========================
Route::middleware(['checkLogin', 'is_admin'])->prefix('dashboardd/products')->name('admin.products.')->group(function () {
    Route::get('/', [ProductController::class, 'index'])->name('index');
    Route::get('/create', [ProductController::class, 'create'])->name('create');
    Route::post('/store', [ProductController::class, 'store'])->name('store');
    Route::get('/edit/{product}', [ProductController::class, 'edit'])->name('edit');
    Route::put('/update/{product}', [ProductController::class, 'update'])->name('update');
    Route::delete('/delete/{product}', [ProductController::class, 'destroy'])->name('destroy');
});

// ========================
// Laravel Default Auth Routes
// ========================
require __DIR__ . '/auth.php';

Route::middleware(['auth', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::view('/error', 'errors.error')->name('custom.error');

