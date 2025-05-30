<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\TermsController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PrivacyController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\Admin\AdminBlogsController;

Route::get('/', [WelcomeController::class, 'index']);

// Blog routes
Route::get('/blogs', [BlogController::class, 'index'])->name('blogs.index'); // Display all blogs
Route::get('/blog/{slug}', [BlogController::class, 'show'])->name('blog.show'); // Display a single blog
Route::get('/search', [BlogController::class, 'search'])->name('search');

// Category routes
Route::get('/category/{slug}', [CategoryController::class, 'show'])->name('category.show'); // Display posts in a category


Route::post('/subscriber', [SubscriptionController::class, 'subscribe'])->name('subscribe');

// Pages routes
Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
Route::post('/savecontact', [ContactController::class, 'store'])->name('savecontact');
Route::get('/privacy', [PrivacyController::class, 'index'])->name('privacy.index');
Route::get('/terms', [TermsController::class, 'index'])->name('terms.index');

// Admin routes
Auth::routes(); //auth routes from laravel/ui

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/admin-blogs', [AdminBlogsController::class, 'index'])->name('admin.blogs.index');
Route::get('/admin-blog-create', [AdminBlogsController::class, 'create'])->name('admin.blog.create');
