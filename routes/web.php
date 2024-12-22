<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});




Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::middleware(['auth'])->group(function () {
    Route::resource('books', BookController::class)->except('show');
    Route::get('books/cards', [BookController::class, 'cards'])->name('books.cards');
    Route::get('books/{book}/export-pdf', [BookController::class, 'exportPdf'])->name('books.export-pdf');
});



require __DIR__ . '/auth.php';
