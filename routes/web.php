<?php

use App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\InfosController;
use App\Http\Controllers\OrderController;









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

Auth::routes();

Route::redirect('/', '/home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('home', HomeController::class);
Route::get('/orders/confirm', [OrderController::class, 'confirm'])->middleware('prevent-back-history')->name('orders.confirm');
Route::resource('orders', OrderController::class);


//////////////////////// ROUTES ADMIN ///////////////////////////////
Route::get('conditions', [App\Http\Controllers\InfosController::class, 'conditions'])->name('conditions');
Route::get('livraisons', [App\Http\Controllers\InfosController::class, 'livraisons'])->name('livraisons');
Route::get('politiques', [App\Http\Controllers\InfosController::class, 'politiques'])->name('politiques');




Route::middleware(['auth', 'role:1,2'])->prefix('admin')->name('admin.')->group(function () {
    Route::redirect('/', '/home');
    Route::resource('meals', Admin\MealController::class);
});

Route::middleware(['auth', 'role:1,2'])->prefix('admin')->name('admin.')->group(function () {
    Route::resource('orders', Admin\OrderController::class);
});


Route::middleware(['auth', 'role:1,2'])->prefix('admin')->name('admin.')->group(function () {
    Route::resource('menus', Admin\MenuController::class);
});

Route::middleware(['auth', 'role:1,2'])->delete('/admin/menus',  [App\Http\Controllers\Admin\MenuController::class, 'destroyAll'])->name('admin.menus.destroyAll');

////////////////////// ROUTES ADMIN GESTION DE COMPTES //////////////////////////////////////////
Route::middleware(['auth', 'role:1'])->get('admin/users', [App\Http\Controllers\Admin\UserController::class, 'index'])->name('admin.users');

Route::middleware(['auth', 'role:1'])->get('admin/register', [App\Http\Controllers\Admin\UserController::class, 'register'])->name('admin.register');
Route::middleware(['auth', 'role:1'])->post('admin/store', [App\Http\Controllers\Admin\UserController::class, 'store'])->name('admin.store');
Route::middleware(['auth', 'role:1'])->get('admin/profile', [App\Http\Controllers\Admin\UserController::class, 'profile'])->name('admin.profile');

Route::middleware(['auth', 'role:1'])->post('admin/profile/update{id}', [App\Http\Controllers\Admin\UserController::class, 'update'])->name('admin.profile.update');
Route::middleware(['auth', 'role:1'])->get('admin/profile/edit{id}', [App\Http\Controllers\Admin\UserController::class, 'edit'])->name('admin.profile.edit');
Route::middleware(['auth', 'role:1'])->delete('/admin/profile{id}',  [App\Http\Controllers\Admin\UserController::class, 'destroy'])->name('admin.profile.destroy');

/////////////////////////////////////////////////////////////////////



/////////////////////// ROUTES COMPTES CLIENTS //////////////////////////////////////////

Route::get('/profile', [App\Http\Controllers\UserController::class, 'index'])->name('profile');
Route::Post('/profile', [App\Http\Controllers\UserController::class, 'update'])->name('profile.update');
Route::get('/profile/edit', [App\Http\Controllers\UserController::class, 'edit'])->name('profile.edit');
Route::get('/profile/order_history', [App\Http\Controllers\UserController::class, 'orderHistory'])->name('profile.history'); 


/////////////////////////////////////////////////////////////////////////////////////////
