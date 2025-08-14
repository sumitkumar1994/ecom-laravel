<?php

use App\Http\Controllers\ForgotPassword;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ForgotPasswordController;



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
// Routes for Admin Auth (Login, Add User)
Route::prefix('admin')->group(function () {
  // Admin Login Routes
  Route::get('/login', [AdminController::class, 'showLoginForm'])->name('admin.login');
  Route::post('/login', [AdminController::class, 'adminLogin'])->name('admin.login.submit');

  // Protecting Admin Routes
  Route::middleware(['admin'])->group(function () {
    Route::get('/dashboard', function () {
      return view('admin.adminDashboard');
    })->name('admin.dashboard');

    // Admin user management routes
    Route::get('/users', [AdminController::class, 'users'])->name('admin.users');
    Route::get('/users/add', [AdminController::class, 'showAddUserForm'])->name('admin.users.add');
    Route::post('/users/add', [AdminController::class, 'cre ateUser'])->name('admin.users.create');
    Route::get('/users/{id}/edit', [AdminController::class, 'editUser'])->name('admin.users.edit');
    Route::post('/users/{id}/update', [AdminController::class, 'updateUser'])->name('admin.users.update');
    Route::delete('/users/{id}/delete', [AdminController::class, 'deleteUser'])->name('admin.users.delete');
    Route::post('/logout', [AdminController::class, 'adminlogout'])->name('admin.logout');

  });
  // Password Reset Routes
  Route::get('/forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
  Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');

  Route::get('/reset-password/{token}', [ForgotPasswordController::class, 'showResetForm'])->name('password.reset');
  Route::post('/reset-password', [ForgotPasswordController::class, 'resetPassword'])->name('password.update');
});




