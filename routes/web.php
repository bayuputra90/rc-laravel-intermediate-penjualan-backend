<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Administrator\UserController;

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

Route::middleware('auth')->group(function(){
    // Route Dashboard

    // Route Dashboard Home
    Route::get('/', [HomeController::class, 'index']);

    // Route Dashboard Product
    Route::get('product', [ProductController::class, 'index']);
    Route::get('product/create', [ProductController::class, 'create']);
    Route::post('product', [ProductController::class, 'store']);
    Route::get('product/{id}', [ProductController::class, 'show']);
    Route::get('product/{id}/edit', [ProductController::class, 'edit']);
    Route::put('product/{id}', [ProductController::class, 'update']);
    Route::delete('product/{id}', [ProductController::class, 'destroy']);

    // Route Dashboard User
    Route::resource('user', UserController::class);

    // Route dashboard Sales
    Route::get('sales', [SalesController::class, 'index'])->name('sales.index');
    Route::get('sales/{checkout}', [SalesController::class, 'show'])->name('sales.show');
    Route::put('sales/{checkout}', [SalesController::class, 'update'])->name('sales.update');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
