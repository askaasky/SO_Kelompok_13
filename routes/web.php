<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\AdminLocationController;

/*
| PUBLIC
*/
Route::redirect('/', '/login');

/*
| AUTH
*/
Route::get('/login', [AuthController::class, 'showLogin'])
    ->middleware('guest')
    ->name('login');

Route::post('/login', [AuthController::class, 'login'])
    ->middleware('guest');

Route::post('/logout', [AuthController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');

/*
| USER (MAHASISWA)
*/
Route::middleware('auth')->group(function () {

    // DASHBOARD USER
    Route::get('/dashboard', [ItemController::class, 'dashboard'])
        ->name('dashboard');

    // ITEM CRUD
    Route::get('/items/create', [ItemController::class, 'create'])
        ->name('items.create');

    Route::post('/items', [ItemController::class, 'store'])
        ->name('items.store');

    Route::get('/items/{item}/edit', [ItemController::class, 'edit'])
        ->name('items.edit');

    Route::put('/items/{item}', [ItemController::class, 'update'])
        ->name('items.update');

    Route::delete('/items/{item}', [ItemController::class, 'destroy'])
        ->name('items.destroy');

    // PROFILE
    Route::get('/profile/{user}', [ProfileController::class, 'show'])
        ->name('profile.show');
});

/*
| ADMIN
*/
Route::middleware(['auth', 'role:admin'])
    ->prefix('admin')
    ->group(function () {

        Route::get('/dashboard', [AdminController::class, 'dashboard'])
            ->name('admin.dashboard');

        Route::get('/users', [AdminController::class, 'users'])
            ->name('admin.users.index');

        Route::delete('/items/{item}', [AdminController::class, 'destroy'])
            ->name('admin.items.destroy');

        Route::get('/items', [AdminController::class, 'items'])
            ->name('admin.items');

        // Categories
        Route::get('/categories', [AdminCategoryController::class, 'index'])
            ->name('admin.categories.index');

        Route::get('/categories/create', [AdminCategoryController::class, 'create'])
            ->name('admin.categories.create');

        Route::post('/categories', [AdminCategoryController::class, 'store'])
            ->name('admin.categories.store');

        Route::get('/categories/{category}/edit', [AdminCategoryController::class, 'edit'])
            ->name('admin.categories.edit');

        Route::put('/categories/{category}', [AdminCategoryController::class, 'update'])
            ->name('admin.categories.update');

        Route::delete('/categories/{category}', [AdminCategoryController::class, 'destroy'])
            ->name('admin.categories.destroy');

        // Locations
        Route::get('/locations', [AdminLocationController::class, 'index'])
            ->name('admin.locations.index');

        Route::get('/locations/create', [AdminLocationController::class, 'create'])
            ->name('admin.locations.create');

        Route::post('/locations', [AdminLocationController::class, 'store'])
            ->name('admin.locations.store');

        Route::get('/locations/{location}/edit', [AdminLocationController::class, 'edit'])
            ->name('admin.locations.edit');

        Route::put('/locations/{location}', [AdminLocationController::class, 'update'])
            ->name('admin.locations.update');

        Route::delete('/locations/{location}', [AdminLocationController::class, 'destroy'])
            ->name('admin.locations.destroy');
    });