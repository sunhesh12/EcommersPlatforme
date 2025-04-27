<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\BrandController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController; 
use App\Http\Controllers\ShoppingCartController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\RegisterController; // Ensure this class exists in the specified namespace
use App\Http\Controllers\AuthController;
use Symfony\Component\HttpKernel\Profiler\Profile;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AddtoCartControlle;
use App\Http\Controllers\CartController;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/home', [HomeController::class, 'index'])->name('home');

// ======================register routes=========================

Route::get('/registerr', [RegisterController::class, 'showRegisterForm'])->name('user.registerr');

Route::post('/registerr', [RegisterController::class, 'register'])->name('register.post');

// ============================rigster route end ======================

// Route::get('/loginn', function () {
//     return view('app/login');
// }) ->name('user.loginn');

// Route::post('/loginn', function () {
//     return view('app/login');
// }) ->name('loginn.post');

Route::get('/loginn', [AuthController::class, 'index'])->name('user.loginn');
Route::post('/loginn1', [AuthController::class, 'login'])->name('loginn.post');

Route::get('/logoutt', [AuthController::class, 'logout'])->name('logoutt');



Route::get('/aboutuss', function () {
    return view('app/Aboutus');
})->name('user.aboutuss');

Route::get('/faq', function () {
    return view('app/faq');
})->name('user.faq');

// Route::get('/cart', function () {
//     return view('app/ShoppingCart');
// })->name('user.cart');



Route::middleware('web')->group(function () {
    Route::get('/cart', [ShoppingCartController::class, 'index'])->name('user.cart');
    Route::post('/cart/update', [ShoppingCartController::class, 'update'])->name('cart.update');
    Route::post('/cart/remove', [ShoppingCartController::class, 'remove'])->name('cart.remove');
    Route::post('/cart/clear', [ShoppingCartController::class, 'clearCart'])->name('cart.clearAll');

});



Route::get('/my-profile', [UserProfileController::class, 'Profile'] )->name('user.my-profile');
Route::get('/my-profile/{id}/edit', [UserProfileController::class, 'edit'] )->name('user.my-profile.edit');
Route::put('/my-profile/{id}', [UserProfileController::class, 'update'] )->name('user.my-profile.update');
Route::post('/update-profile-picture', [UserProfileController::class, 'updateProfilePicture'])->name('user.update-profile-picture');


// =============admin===============

Route::get('/dashboardd', function () {
    return view('admin/dashboard');
})->middleware('checkLogin')->name('admin.dashboard');


Route::prefix('/dashboardd/usermanagement')
// ->middleware('checkLogin')
->name('admin.users.')->group(function () {
    Route::get('/', [UserController::class, 'index'])->name('index');
    Route::get('/create', [UserController::class, 'create'])->name('create');
    Route::post('/', [UserController::class, 'store'])->name('store');
    Route::get('/{id}/edit', [UserController::class, 'edit'])->name('edit');
    Route::put('/{id}', [UserController::class, 'update'])->name('update');
    Route::delete('/delete/{id}', [UserController::class, 'destroy'])->name('destroy');
    Route::post('/{id}/block', [UserController::class, 'block'])->name('block');
    Route::post('/{id}/unblock', [UserController::class, 'unblock'])->name('unblock');
});


Route::get('/contactUs', function () {
    return view('app/contactUs');
})->name('user.contactUs');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::get('/dashboardd/brandmanagement', function () {
    return view('admin/brandDetils');
})->middleware('checkLogin')->name('admin.dashboard');
//brandDetils

Route::prefix('/dashboardd/brandmanagement')
// ->middleware('checkLogin')
->name('admin.brands.')->group(function () {
    Route::get('/', [BrandController::class, 'index'])->name('index');
    Route::get('/create', [BrandController::class, 'create'])->name('create');
    Route::post('/', [BrandController::class, 'store'])->name('store');
    Route::get('/{id}/edit', [BrandController::class, 'edit'])->name('edit');
    Route::put('/{id}', [BrandController::class, 'update'])->name('update');
    Route::delete('/delete/{id}', [BrandController::class, 'destroy'])->name('destroy');
    // Route::post('/{id}/block', [BrandController::class, 'block'])->name('block');
    // Route::post('/{id}/unblock', [BrandController::class, 'unblock'])->name('unblock');
});

// Route::get('/product/{id}', function ($id) {
//     return view('app.ProductDetails', ['id' => $id]);
// })
// // ->middleware('checkLogin')
// ->name('product.details');

use App\Models\Product;

Route::get('/product/{id}', function ($id) {
    $product = Product::findOrFail($id); // fetch the product or return 404
    return view('app.ProductDetails', ['product' => $product]);
})->name('product.details');



//need to make product view controller to product and complete the base code need to connet conly =routes




Route::prefix('dashboardd/products')->name('admin.products.')
// ->middleware('checkLogin')
->group(function () 
{
    Route::get('/', [ProductController::class, 'index'])->name('index');
    Route::get('/create', [ProductController::class, 'create'])->name('create');
    Route::post('/store', [ProductController::class, 'store'])->name('store');
    Route::get('/edit/{product}', [ProductController::class, 'edit'])->name('edit');
    Route::put('/update/{product}', [ProductController::class, 'update'])->name('update');
    Route::delete('/delete/{product}', [ProductController::class, 'destroy'])->name('destroy');
});


// use App\Http\Controllers\CartController;

// Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
// Route::get('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add');
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




Route::post('/add-to-cart', [AddtoCartControlle::class, 'add'])->name('cart.add');



