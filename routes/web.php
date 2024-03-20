<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\UploadController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Route::get('/form', function () {
//     return view('form');
// })->middleware(['auth', 'verified'])->name('form');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


});

Route::get('/form', [FormController::class, 'index'])->name('form.index');
Route::get('/form/create', [FormController::class, 'create'])->name('form.create');
Route::post('/form', [FormController::class, 'store'])->name('form.store');
Route::get('/form/{id}', [FormController::class, 'show'])->name('form.show');
Route::get('/form/{id}/edit', [FormController::class, 'edit'])->name('form.edit');
Route::put('/form/{id}', [FormController::class, 'update'])->name('form.update');
Route::delete('/form/{id}', [FormController::class, 'destroy'])->name('form.destroy');

Route::get('/upload', [UploadController::class, 'create'])->name('upload.create');
Route::post('/upload', [UploadController::class, 'store'])->name('upload.store');

require __DIR__.'/auth.php';
