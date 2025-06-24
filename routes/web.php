<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
Route::get('/login', [MainController::class, 'login'])->name('login');


