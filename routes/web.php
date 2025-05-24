<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactController;

Route::get('/', function () {
    return view('welcome');
});

// Blog routes
Route::get('/blogs', [BlogController::class, 'index'])->name('blogs.index'); // Display all blogs

// Route::get('/blogs/create', [BlogController::class, 'create'])->name('blogs.create'); // Show create form
// Route::post('/blogs', [BlogController::class, 'store'])->name('blogs.store'); // Store new blog
// Route::get('/blogs/{id}', [BlogController::class, 'show'])->name('blogs.show'); // Display a single blog
// Route::get('/blogs/{id}/edit', [BlogController::class, 'edit'])->name('blogs.edit'); // Show edit form
// Route::put('/blogs/{id}', [BlogController::class, 'update'])->name('blogs.update'); // Update blog
// Route::delete('/blogs/{id}', [BlogController::class, 'destroy'])->name('blogs.destroy'); // Delete blog

// Contact routes
Route::get('/contact', [ContactController::class, 'index'])->name('contact.index'); // Display all contacts
