<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ThreadController;
use App\Livewire\ShowThreads;
use App\Livewire\ShowThread;
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



Route::get('/', ShowThreads::class)
    ->middleware(['auth'])
    ->name('dashboard');


    Route::get('/thread/{thread}', ShowThread::class)
    ->middleware(['auth'])
    ->name('thread');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // trabajar con todas las rutas del crud excepto 
    Route::resource('threads', ThreadController::class)->except([
        'show', 'index', 'destroy'
    ]);
});

require __DIR__.'/auth.php';
