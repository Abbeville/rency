<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ImagesController;
use App\Http\Controllers\ReportsController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\CustomersController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\OrdersController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Auth

Route::get('login', [AuthenticatedSessionController::class, 'create'])
    ->name('login')
    ->middleware('guest');

Route::post('login', [AuthenticatedSessionController::class, 'store'])
    ->name('login.store')
    ->middleware('guest');

Route::delete('logout', [AuthenticatedSessionController::class, 'destroy'])
    ->name('logout');


Route::middleware('auth')->group(function () {

    // Dashboard

    Route::get('/', [DashboardController::class, 'index'])
        ->name('dashboard');

    // Users

    Route::get('users', [UsersController::class, 'index'])
        ->name('users');

    Route::get('users/create', [UsersController::class, 'create'])
        ->name('users.create');

    Route::post('users', [UsersController::class, 'store'])
        ->name('users.store');

    Route::get('users/{user}/edit', [UsersController::class, 'edit'])
        ->name('users.edit');

    Route::put('users/{user}', [UsersController::class, 'update'])
        ->name('users.update');

    Route::get('users/{user}', [UsersController::class, 'destroy'])
        ->name('users.destroy');

    Route::put('users/{user}/restore', [UsersController::class, 'restore'])
        ->name('users.restore');

    // Customers 

    Route::get('customers', [CustomersController::class, 'index'])
        ->name('customers');

    Route::get('customers/create', [CustomersController::class, 'create'])
        ->name('customers.create');

    Route::post('customers', [CustomersController::class, 'store'])
        ->name('customers.store');

    Route::get('customers/{customer}/edit', [CustomersController::class, 'edit'])
        ->name('customers.edit');

    Route::put('customers/{customer}', [CustomersController::class, 'update'])
        ->name('customers.update');

    Route::get('customers/{customer}', [CustomersController::class, 'destroy'])
        ->name('customers.destroy');

    Route::put('customers/{customer}/restore', [CustomersController::class, 'restore'])
        ->name('customers.restore');

    // Products

    Route::get('products', [ProductsController::class, 'index'])
        ->name('products');

    Route::get('products/create', [ProductsController::class, 'create'])
        ->name('products.create');

    Route::post('products', [ProductsController::class, 'store'])
        ->name('products.store');

    Route::get('products/{product}/edit', [ProductsController::class, 'edit'])
        ->name('products.edit');

    Route::put('products/{product}/update', [ProductsController::class, 'update'])
        ->name('products.update');

    Route::get('products/{product}', [ProductsController::class, 'destroy'])
        ->name('products.destroy');

    Route::get('products/{product}/restore', [ProductsController::class, 'restore'])
        ->name('products.restore');

    // Services

    Route::get('services', [ServicesController::class, 'index'])
        ->name('services');

    Route::get('services/create', [ServicesController::class, 'create'])
        ->name('services.create');

    Route::post('services', [ServicesController::class, 'store'])
        ->name('services.store');

    Route::get('services/{product}/edit', [ServicesController::class, 'edit'])
        ->name('services.edit');

    Route::put('services/{product}/update', [ServicesController::class, 'update'])
        ->name('services.update');

    Route::get('services/{product}', [ServicesController::class, 'destroy'])
        ->name('services.destroy');

    Route::get('services/{product}/restore', [ServicesController::class, 'restore'])
        ->name('services.restore');

    // Categories

    Route::get('categories', [CategoriesController::class, 'index'])
        ->name('categories');

    Route::get('categories/create', [CategoriesController::class, 'create'])
        ->name('categories.create');

    Route::post('categories', [CategoriesController::class, 'store'])
        ->name('categories.store');

    Route::get('categories/{category}/edit', [CategoriesController::class, 'edit'])
        ->name('categories.edit');

    Route::put('categories/{category}/update', [CategoriesController::class, 'update'])
        ->name('categories.update');

    Route::get('categories/{category}', [CategoriesController::class, 'destroy'])
        ->name('categories.destroy');

    Route::get('categories/{category}/restore', [CategoriesController::class, 'restore'])
        ->name('categories.restore');

    // Reports

    Route::get('reports', [ReportsController::class, 'index'])
        ->name('reports');
});


// Images

Route::get('/img/{path}', [ImagesController::class, 'show'])
    ->where('path', '.*')
    ->name('image');

// Invoice

Route::get('invoice', [InvoiceController::class, 'index'])
    ->name('invoice');

// Orders

Route::get('orders', [OrdersController::class, 'index'])
    ->name('orders');

Route::get('orders/create', [OrdersController::class, 'create'])
    ->name('orders.create');

Route::post('orders', [OrdersController::class, 'store'])
    ->name('orders.store');
