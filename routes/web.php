<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController; 
use App\Http\Controllers\RegisterController; // Ensure this class exists in the specified namespace

Route::get('/', function () {
    return view('app/Home');
});

Route::get('/home', function () {
    return view('app/Home');
})->name('home');

// ======================register routes=========================
// Route::get('/registerr', function () {
//     return view('app/Register');
// });

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

// Route::get('/dashboardd/usermanagement', function () {
//     return view('admin/usermanagement');
// })->name('admin.dashboard.usermanagement');

// Route::get('/dashboardd/usermanagement/create', function () {
//     return view('admin/addUser');
// })->name('admin.users.create');

// Route::get('/admin/users/create', [UserController::class, 'create'])->name('admin.users.create');
// Route::post('/admin/users/store', [UserController::class, 'store'])->name('admin.users.store');

//usermanagement
// Route::get('/dashboardd', [UserController::class, 'index'])->name('admin.users.index');
//editUserDetils
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



// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

// require __DIR__.'/auth.php';






