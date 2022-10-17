<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProductController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SellerController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\WishlistController;


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
    Route::resource('user', UserController::class);
    Route::resource('sellers', SellerController::class);
    Route::get('seeReviews/{product}', [ProductController::class, 'seeReviews'])->name('seeReviews');
    Route::resource('wishlist', WishlistController::class);
    Route::get('seeReviews/{product}', [ProductController::class, 'seeReviews'])->name('seeReviews');
    Route::get('addProductToWishlist', [WishlistController::class, 'addProductToWishlist'])->name('addProductToWishlist');
    Route::get('detachProduct/{product_id}/{wishlist_id}', [WishlistController::class, 'detachProduct'])->name('detachProduct');
    Route::get('detachWishlist/{product_id}/{wishlist_id}', [ProductController::class, 'detachWishlist'])->name('detachWishlist');
    Route::resource('roles', RoleController::class);
    Route::resource('permissions', PermissionController::class);
    // Route::get('createSuperAdmin', [RoleController::class, 'createSuperAdmin'])->name('createSuperAdmin');
    Route::get('deleteRole/{id}/{role}', [RoleController::class, 'deleteRole'])->name('deleteRole');
    Route::get('assignRole/{id}', [RoleController::class, 'assignRole'])->name('assignRole');
    Route::get('deleteAllRoles/{id}', [RoleController::class, 'deleteAllRoles'])->name('deleteAllRoles');
    Route::get('deletePermission/{id}/{role}', [PermissionController::class, 'deletePermission'])->name('deletePermission');
    Route::get('assignPermission/{id}', [PermissionController::class, 'assignPermission'])->name('assignPermission');
    Route::get('deleteAllPermissions/{id}', [PermissionController::class, 'deleteAllPermissions'])->name('deleteAllPermissions');
});

require __DIR__ . '/auth.php';
