<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use Illuminate\Support\Facades\Auth;

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

Route:: delete('/delete/{id}', [EventController::class, 'destroy'])->name ('delete')->middleware('isadmin', 'auth');;

Route:: get('/create', [EventController::class, 'create'])->name('createEvent')->middleware('isadmin', 'auth');;
Route::post('/store', [EventController::class, 'store'])->name('storeEvent')->middleware('isadmin', 'auth');;

Route:: get('/edit/{id}', [EventController::class, 'edit'])->name('editEvent')->middleware('isadmin', 'auth');;

Route:: PATCH('/event/{id}', [EventController::class, 'update'])->name('updateEvent')->middleware('isadmin', 'auth');;

Route:: get('/show/{id}', [EventController::class, 'show'])->name('showEvent');

Route:: get('/inscribe/{id}', [EventController::class, 'inscribe'])->name('inscribeEvent')->middleware('auth');
Route:: get('/unscribe/{id}', [EventController::class, 'unscribe'])->name('unscribeEvent')->middleware('auth');

