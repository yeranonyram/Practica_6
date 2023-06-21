<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TrackController;
use App\Models\Track;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});  

require __DIR__.'/auth.php';

Route::resource('tracks',TrackController::class)->middleware(['auth']);
Route::get('/tracks/{track}/edit', [TrackController::class, 'edit'])->name('tracks.edit');
Route::delete('/music/{track}', [TrackController::class, 'destroy'])->name('music.destroy');
Route::patch('/tracks/{track}', [TrackController::class, 'update'])->name('tracks.update');

