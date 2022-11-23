<?php

use App\Http\Controllers\RedirectController;
use App\Http\Controllers\addcarController;
use App\Http\Controllers\bookingcarController;
use Illuminate\Support\Facades\Redirect;
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

Route::get('/redirect', [RedirectController::class,'index'])->name('redirect');

Route::middleware(['auth:sanctum', 'verified'])->group(function () {

    Route::get('/addcar', [addcarController::class,'index'])->name('addcar');
    Route::post('/addcar/add', [addcarController::class,'store'])->name('storecar');
    Route::get('/addcar/delete/{id}', [addcarController::class,'delete']);
    Route::get('/addcar/edit/{id}', [addcarController::class, 'edit'])->name('editcar');
    Route::post('/addcar/update/{id}', [addcarController::class, 'update']);
    Route::get('/booking', [bookingcarController::class,'index'])->name('booking');

});

