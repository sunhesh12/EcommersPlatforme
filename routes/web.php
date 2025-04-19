<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\BrandController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController; 
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\RegisterController; // Ensure this class exists in the specified namespace

use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/home', [HomeController::class, 'index'])->name('home');

// ======================register routes=========================

Route::get('/registerr', [RegisterController::class, 'showRegisterForm'])->name('user.registerr');

Route::post('/registerr', [RegisterController::class, 'register'])->name('register.post');

// ============================rigster route end ======================

Route::get('/loginn', function () {
    return view('app/login');
}) ->name('user.loginn');

Route::post('/loginn', function () {
    return view('app/login');
}) ->name('loginn.post');



Route::get('/aboutuss', function () {
    return view('app/Aboutus');
})->name('user.aboutuss');

Route::get('/faq', function () {
    return view('app/faq');
})->name('user.faq');

Route::get('/cart', function () {
    return view('app/ShoppingCart');
})->name('user.cart');

Route::get('/my-profile', function () {
    return view('app/MyProfile');
})->name('user.my-profile');


// =============admin===============

Route::get('/dashboardd', function () {
    return view('admin/dashboard');
})->name('admin.dashboard');


Route::prefix('/dashboardd/usermanagement')->name('admin.users.')->group(function () {
    Route::get('/', [UserController::class, 'index'])->name('index');
    Route::get('/create', [UserController::class, 'create'])->name('create');
    Route::post('/', [UserController::class, 'store'])->name('store');
    Route::get('/{id}/edit', [UserController::class, 'edit'])->name('edit');
    Route::put('/{id}', [UserController::class, 'update'])->name('update');
    Route::delete('/delete/{id}', [UserController::class, 'destroy'])->name('destroy');
    Route::post('/{id}/block', [UserController::class, 'block'])->name('block');
    Route::post('/{id}/unblock', [UserController::class, 'unblock'])->name('unblock');
});



Route::get('/dashboardd/brandmanagement', function () {
    return view('admin/brandDetils');
})->name('admin.dashboard');
//brandDetils

Route::prefix('/dashboardd/brandmanagement')->name('admin.brands.')->group(function () {
    Route::get('/', [BrandController::class, 'index'])->name('index');
    Route::get('/create', [BrandController::class, 'create'])->name('create');
    Route::post('/', [BrandController::class, 'store'])->name('store');
    Route::get('/{id}/edit', [BrandController::class, 'edit'])->name('edit');
    Route::put('/{id}', [BrandController::class, 'update'])->name('update');
    Route::delete('/delete/{id}', [BrandController::class, 'destroy'])->name('destroy');
    // Route::post('/{id}/block', [BrandController::class, 'block'])->name('block');
    // Route::post('/{id}/unblock', [BrandController::class, 'unblock'])->name('unblock');
});




Route::prefix('dashboardd/products')->name('admin.products.')->group(function () {
    Route::get('/', [ProductController::class, 'index'])->name('index');
    Route::get('/create', [ProductController::class, 'create'])->name('create');
    Route::post('/store', [ProductController::class, 'store'])->name('store');
    Route::get('/edit/{product}', [ProductController::class, 'edit'])->name('edit');
    Route::put('/update/{product}', [ProductController::class, 'update'])->name('update');
    Route::delete('/delete/{product}', [ProductController::class, 'destroy'])->name('destroy');
});


use App\Http\Controllers\CartController;

// Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::get('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add');
// Route::get('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
// Route::get('/cart/clear', [CartController::class, 'clear'])->name('cart.clear');


// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

// require __DIR__.'/auth.php';






