<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\AdminController;


Route::middleware(['auth'])->group(function () {
  Route::get('/dashbord', [MainController::class, 'dashbordShowForm'])->name('dashbord');
  // Route::get('/logout', [MainController::class, 'logout'])->name('logout');
  Route::post('/logout', [MainController::class, 'logout'])->name('logout');
});
Route::middleware(['guest.redirect'])->group(function () {
  Route::get('/register', [MainController::class, 'showRegisterForm'])->name('register');
  Route::post('/register', [MainController::class, 'registerUser'])->name('register.submit');
  Route::get('/login', [MainController::class, 'showLoginForm'])->name('login');
  Route::post('/login', [MainController::class, 'loginUser'])->name('login.submit');
});
Route::get('/', function () {
  return view('welcome');
})->name('home');

// Public pages
Route::get('/shop', [MainController::class, 'showShop'])->name('shop');
Route::get('/categories', [MainController::class, 'showCategories'])->name('categories');
Route::get('/contact', [MainController::class, 'showContact'])->name('contact');
// admin route45
Route::prefix('/admin')->group(function () {
  Route::get('/login', [AdminController::class, 'showLoginForm'])->name('admin.login');
  Route::post('/login', [AdminController::class, 'login'])->name('admin.login.submit');

  Route::get('/dashboard', function () {
    return view('admin.adminDashboard');
  })->name('admin.dashboard');
  Route::get('/users', [AdminController::class, 'users'])->name('users');


});


