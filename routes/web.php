<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
// Route::get('/dashbord', [MainController::class, 'dashbordShowForm'])->name('dashbord');
Route::get('/register', [MainController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [MainController::class, 'registerUser'])->name('register.submit');
Route::get('/login', [MainController::class, 'showLoginForm'])->name('login');

// Route::get('/login', [MainController::class, 'login'])->name('login');
Route::post('/login', [MainController::class, 'loginUser'])->name('login.submit');
Route::get('/', function () {
  return view('welcome');
});

Route::middleware(['auth'])->group(function () {
  Route::get('/dashbord', [MainController::class, 'dashbordShowForm'])->name('dashbord');
  Route::get('/logout', [MainController::class, 'logout'])->name('logout');
  Route::post('/logout', [MainController::class, 'logout'])->name('logout.user');
});
// Route::middleware(['guest.redirect'])->group(function () {

// });

// Route::get('/dashbord', function () {
//   return view('auth.index'); // Create this file

// })->name('dashbord');


// Route::get('/users', [MainController::class, 'showUsers'])->middleware('auth');


