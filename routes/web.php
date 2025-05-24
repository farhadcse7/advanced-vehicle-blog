<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\TermsController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PrivacyController;
use App\Http\Controllers\WelcomeController;

Route::get('/', [WelcomeController::class, 'index']);

// Blog routes
Route::get('/blogs', [BlogController::class, 'index'])->name('blogs.index'); // Display all blogs
Route::get('/blog/{slug}', [BlogController::class, 'show'])->name('blog.show'); // Display a single blog

// Route::get('/blogs/create', [BlogController::class, 'create'])->name('blogs.create'); // Show create form
// Route::post('/blogs', [BlogController::class, 'store'])->name('blogs.store'); // Store new blog
// Route::get('/blogs/{id}', [BlogController::class, 'show'])->name('blogs.show'); // Display a single blog
// Route::get('/blogs/{id}/edit', [BlogController::class, 'edit'])->name('blogs.edit'); // Show edit form
// Route::put('/blogs/{id}', [BlogController::class, 'update'])->name('blogs.update'); // Update blog
// Route::delete('/blogs/{id}', [BlogController::class, 'destroy'])->name('blogs.destroy'); // Delete blog

// Pages routes
Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
Route::get('/privacy', [PrivacyController::class, 'index'])->name('privacy.index');
Route::get('/terms', [TermsController::class, 'index'])->name('terms.index');
