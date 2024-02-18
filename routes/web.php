<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RedirectController;
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
Route::prefix('api')->name('api.')->group(function () {
    Route::get('/redirects', [HomeController::class, 'index'])->name('index');
    Route::get('create', [HomeController::class, 'create'])->name('create');
    Route::get('edit/{redirect}', [HomeController::class, 'edit'])->name('edit');
    Route::post('store', [HomeController::class, 'store'])->name('store');
    Route::post('update', [HomeController::class, 'update'])->name('update');
    Route::get('delete/{redirect}', [HomeController::class, 'delete'])->name('delete');
    Route::get('/redirects/{redirect}/stats', [RedirectController::class, 'stats'])->name('stats');
    Route::get('/redirects/{redirect}/logs', [HomeController::class, 'logs']);
});


Route::prefix('r')->name('r.')->group(function () {
    Route::get('{redirect}', [RedirectController::class, 'redirect'])->name('redirect');
});
