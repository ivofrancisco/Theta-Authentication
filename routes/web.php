<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\UserController;
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

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/home', function () {
//     return view('test');
// })->middleware(['auth', 'verified']);

// ---------------------------------
// ADMIN PANEL ROUTES
// ---------------------------------
Route::group(['namespace' => 'Admin', 'middleware' => ['auth', 'verified']], function () {
    Route::get('/home', [AdminController::class, 'home'])->name('admin.home');

    // User profile page
    Route::get('/admin/users/{id}/profile', [UserController::class, 'profile'])->name('admin.users.profile');
    Route::put('/admin/users/update', [UserController::class, 'update'])->name('admin.users.update');

    // Gallery
    Route::get('/admin/galleries', [GalleryController::class, 'index'])->name('admin.galleries');
    Route::get('/admin/galleries/create', [GalleryController::class, 'create'])->name('admin.galleries.create');
    Route::post('/admin/galleries/create', [GalleryController::class, 'store'])->name('admin.galleries.store');
    Route::get('/admin/galleries/{id}/show', [GalleryController::class, 'show'])->name('admin.galleries.show');
    Route::get('/admin/galleries/{id}/edit', [GalleryController::class, 'edit'])->name('admin.galleries.edit');
    Route::put('/admin/galleries/update', [GalleryController::class, 'update'])->name('admin.galleries.update');
    Route::delete('/admin/galleries/{id}/delete', [GalleryController::class, 'destroy'])->name('admin.galleries.delete');

});
