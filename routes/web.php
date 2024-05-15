<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SubmissionController;
use App\Http\Controllers\GradingController;

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

// In routes/web.php

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/guru', function () {
    return view('guru');
})->middleware(['auth'])->name('guru');

Route::get('/siswa', function () {
    return view('siswa');
})->middleware(['auth'])->name('siswa');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::POST('/siswa', [App\Http\Controllers\SubmissionController::class, 'submitForm'])->name('siswa');
Route::get('/guru', [GradingController::class, 'index'])->name('guru');

// Route to store grading data
Route::post('/guru/store', [GradingController::class, 'store'])->name('nilai.store');

require __DIR__ . '/auth.php';
