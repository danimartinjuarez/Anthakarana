<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;

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

Route::get('/', [EventController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\EventController::class, 'index'])->name('home');

Route:: delete('/delete/{id}', [EventController::class, 'destroy'])->name ('delete');

Route:: get('/create', [EventController::class, 'create'])->name('createEvent');
Route::post('/store', [EventController::class, 'store'])->name('storeEvent');