<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('app/Home');
});

Route::get('/loginn', function () {
    return view('app/login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/checkout1', function() {
    return view('app/checkout1'); 
});
Route::get('/checkout2', function() {
    return view('app/checkout2'); 
});
Route::get('/checkout3', function() {
    return view('app/checkout3'); 
});
Route::get('/checkout4', function() {
    return view('app/checkout4'); 
});
require __DIR__.'/auth.php';
