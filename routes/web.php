<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
//     return view('pages/registation');
// });

Route::get('/', function () {
    return view('pages.welcome');
});

// Route::get('/register', function () {
//     return view('auth/register');
// })->name('register');

Auth::routes();

// Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::get('/login', function(){
//     return view('auth/login');
// })->name('login');

Route::get('/login', function () {
    return view('auth.login');
})->middleware('guest')->name('login');

Route::get('/register', function () {
    return view('auth.register');
})->name('register');

