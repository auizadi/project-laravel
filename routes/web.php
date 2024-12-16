<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\ProfileController;
use App\Models\Mahasiswa;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('user.dashboard');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::post('post', [MahasiswaController::class, 'store'])->name('user.store');
Route::get('/pengumuman', [MahasiswaController::class, 'pengumuman'])->name('pengumuman');


Route::middleware(['auth', 'adminMiddleware'])->group(function (){
    Route::get('dashboard', [AdminController::class, 'index'])->name('dashboard');
    Route::get('/aksiAdmin/{id}', [AdminController::class, 'show'])->name('adminshow');
});