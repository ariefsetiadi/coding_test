<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\VisitorController;

use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\ReceptionistController;

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

Route::middleware(['guest'])->group(function () {
    // Route Index
    Route::get('/', [VisitorController::class, 'index'])->name('index');

    // Route CheckIn
    Route::post('/postCheckIn', [VisitorController::class, 'postCheckIn'])->name('visitor.postCheckIn');

    // Route Login
    Route::get('/login', [AuthController::class, 'formLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'postLogin'])->name('postLogin');
});

Route::middleware(['auth'])->group(function () {
    // Route Logout
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

    // Route Home
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    // Route Receptionist
    Route::prefix('receptionist')->group(function () {
        Route::get('/', [ReceptionistController::class, 'index'])->name('receptionist.index');
        Route::post('/store', [ReceptionistController::class, 'store'])->name('receptionist.store');
        Route::get('/edit/{id}', [ReceptionistController::class, 'edit'])->name('receptionist.edit');
        Route::post('/update', [ReceptionistController::class, 'update'])->name('receptionist.update');
        Route::get('/reset/{id}', [ReceptionistController::class, 'reset'])->name('receptionist.reset');
    });
});
