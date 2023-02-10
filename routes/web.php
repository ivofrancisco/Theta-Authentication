<?php

use App\Http\Controllers\Admin\AdminController;
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

    Route::get('/admin/users/{id}/profile', [UserController::class, 'profile'])->name('admin.users.profile');
    Route::put('/admin/users/update', [UserController::class, 'update'])->name('admin.users.update');

});
