<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);
Route::get('/book', [App\Http\Controllers\BookController::class, 'index']);

// crud operasi - resource
Route::resource('/catalog', App\Http\Controllers\CatalogController::class);
Route::resource('/author', App\Http\Controllers\AuthorController::class);
Route::resource('/publisher', App\Http\Controllers\PublisherController::class);
Route::resource('/member', App\Http\Controllers\MemberController::class);
