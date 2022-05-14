<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\ContactsController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ImagesController;
use App\Http\Controllers\OrganizationsController;
use App\Http\Controllers\ReportsController;
use App\Http\Controllers\UsersController;
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

    Route::delete('users/{user}', [UsersController::class, 'destroy'])
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

    Route::delete('customers/{customer}', [CustomersController::class, 'destroy'])
        ->name('customers.destroy');

    Route::put('customers/{customer}/restore', [CustomersController::class, 'restore'])
        ->name('customers.restore');

    // Organizations

    Route::get('organizations', [OrganizationsController::class, 'index'])
        ->name('organizations');

    Route::get('organizations/create', [OrganizationsController::class, 'create'])
        ->name('organizations.create');

    Route::post('organizations', [OrganizationsController::class, 'store'])
        ->name('organizations.store');

    Route::get('organizations/{organization}/edit', [OrganizationsController::class, 'edit'])
        ->name('organizations.edit');

    Route::put('organizations/{organization}', [OrganizationsController::class, 'update'])
        ->name('organizations.update');

    Route::delete('organizations/{organization}', [OrganizationsController::class, 'destroy'])
        ->name('organizations.destroy');

    Route::put('organizations/{organization}/restore', [OrganizationsController::class, 'restore'])
        ->name('organizations.restore');

    // Contacts

    Route::get('contacts', [ContactsController::class, 'index'])
        ->name('contacts');

    Route::get('contacts/create', [ContactsController::class, 'create'])
        ->name('contacts.create');

    Route::post('contacts', [ContactsController::class, 'store'])
        ->name('contacts.store');

    Route::get('contacts/{contact}/edit', [ContactsController::class, 'edit'])
        ->name('contacts.edit');

    Route::put('contacts/{contact}', [ContactsController::class, 'update'])
        ->name('contacts.update');

    Route::delete('contacts/{contact}', [ContactsController::class, 'destroy'])
        ->name('contacts.destroy');

    Route::put('contacts/{contact}/restore', [ContactsController::class, 'restore'])
        ->name('contacts.restore');

    // Reports

    Route::get('reports', [ReportsController::class, 'index'])
        ->name('reports');
});


// Images

Route::get('/img/{path}', [ImagesController::class, 'show'])
    ->where('path', '.*')
    ->name('image');
