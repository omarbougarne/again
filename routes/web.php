<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AttendingEventController;
use App\Http\Controllers\AttentingSystemController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\EventIndexController;
use App\Http\Controllers\EventShowController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;



Route::get('/', WelcomeController::class)->name('welcome');
Route::get('/e', EventIndexController::class)->name('eventIndex');
Route::get('/e/{id}', EventShowController::class)->name('eventShow');
Route::get('/events/filter', [EventController::class, 'filter'])->name('eventFilter');

Route::get('/dashboard', function () {return view('dashboard');})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::middleware('organiser')->resource('/events', EventController::class);


    Route::middleware('role:user')->group(function () {
        Route::get('/attending-events', AttendingEventController::class)->name('attendingEvents');
        Route::post('/events-attending/{id}', AttentingSystemController::class)->name('events.attending');
    });

    Route::middleware('role:admin')->group(function () {
        Route::get('/admin/users', [AdminController::class, 'index'])->name('admin.index');
        Route::delete('/admin/users/{id}', [AdminController::class, 'destroy'])->name('admin.destroy');
        Route::get('/admin/users/restore/{id}', [AdminController::class, 'restoreByUrl'])->name('admin.restore');
    });


});

require __DIR__ . '/auth.php';
