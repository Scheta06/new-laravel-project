<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CreateProductController;
use App\Http\Controllers\Auth\ChangePasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\ProfileController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\IndexController;
use Illuminate\Support\Facades\Route;

// Авторизация, регистрация, главная страница
Route::get('/', [IndexController::class, 'index'])->name('index');
Route::get('/login', [LoginController::class, 'index'])->name('loginForm');
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::get('/register', [RegisterController::class, 'index'])->name('registerForm');
Route::post('/register', [RegisterController::class, 'register'])->name('register');

Route::middleware(['auth'])->group(function () {
    Route::get('/catalog/{type}', [CatalogController::class, 'index'])->name('catalog');
    Route::get('/catalog/{type}/{id}', [CatalogController::class, 'show'])->name('cart');
    Route::post('/catalog/{type}/{id}', [CatalogController::class, 'store'])->name('addItem');

    // Профиль, смена пароля, выход из аккаунта
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('/profile/change-password', [ChangePasswordController::class, 'index'])->name('change-passwordForm');
    Route::post('/profile/change-password', [ChangePasswordController::class, 'update'])->name('change-password');
});

// Админ-панель

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin-panel', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/admin-panel/create', [CreateProductController::class, 'index'])->name('admin.createProduct.index');
    Route::get('/admin-panel/create/{type}', [CreateProductController::class, 'show'])->name('admin.createProduct.show');
    Route::post('/admin-panel/create/{type}', [CreateProductController::class, 'create'])->name('admin.createProduct.create');
    Route::get('/admin-panel/{type}/{id}/edit', [AdminController::class, 'edit'])->name('admin.createProduct.edit');
    Route::patch('/admin-panel/{type}/{id}/update', [AdminController::class, 'update'])->name('admin.createProduct.update');
    Route::delete('/admin-panel/destroy/{type}/{id}', [AdminController::class, 'destroy'])->name('admin.createProduct.destroy');
});
