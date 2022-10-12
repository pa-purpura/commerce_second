<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ReviewController;


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

Route::prefix('admin')->name('admin.')->group(function () {
    
    Route::view('home', 'admin.dashboard.index')->name('dashboard');

    Route::resource('reviews', ReviewController::class);
    Route::resource('products', ProductController::class);
    Route::resource('order', OrderController::class);

    

});


require __DIR__ . '/auth.php';
