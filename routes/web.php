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
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);
Route::get('/catalog', [App\Http\Controllers\CatalogController::class, 'index']);
Route::get('/author', [App\Http\Controllers\AuthorController::class, 'index']);
Route::get('/publisher', [App\Http\Controllers\PublisherController::class, 'index']);
Route::get('/member', [App\Http\Controllers\MemberController::class, 'index']);
Route::get('/transaction', [App\Http\Controllers\TransacationController::class, 'index']);
Route::get('/book', [App\Http\Controllers\BookController::class, 'index']);
Route::get('/test_spatie', [App\Http\Controllers\HomeController::class, 'test_spatie']);

// crud operasi - resource

Route::group(['prefix' => 'data'], function() {
    Route::resource('/catalog', App\Http\Controllers\CatalogController::class);
    Route::resource('/author', App\Http\Controllers\AuthorController::class);
    Route::resource('/publisher', App\Http\Controllers\PublisherController::class);
    Route::resource('/member', App\Http\Controllers\MemberController::class);
    Route::resource('/transaction', App\Http\Controllers\TransacationController::class);

    Route::resource('/book', App\Http\Controllers\BookController::class);
    Route::delete('/book/{id}', [App\Http\Controllers\BookController::class, 'destroy']);
    Route::get('/api/book', [App\Http\Controllers\BookController::class, 'api']);
    Route::get('/api/author', [App\Http\Controllers\AuthorController::class, 'api']);
    Route::get('/api/publisher', [App\Http\Controllers\PublisherController::class, 'api']);
    Route::get('/api/member', [App\Http\Controllers\MemberController::class, 'api']);
    Route::get('/api/catalog', [App\Http\Controllers\CatalogController::class, 'api']);
});
