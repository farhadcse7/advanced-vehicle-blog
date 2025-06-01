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
use App\Http\Controllers\Admin\AdminTermsController;
use App\Http\Controllers\Admin\AdminPrivacyController;
use App\Http\Controllers\Admin\AdminProfileController;
use App\Http\Controllers\Admin\AdminSettingsController;
use App\Http\Controllers\Admin\AdminCategoriesController;

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

Route::get('/admin/blogs', [AdminBlogsController::class, 'index'])->name('admin.blogs.index');
Route::get('/admin/blog/create', [AdminBlogsController::class, 'create'])->name('admin.blog.create');
Route::get('/admin/blog/edit/{id}', [AdminBlogsController::class, 'edit'])->name('admin.blog.edit');
Route::put('/admin/blog/update/{id}', [AdminBlogsController::class, 'update'])->name('admin.blog.update');
Route::get('/admin/blog/delete/{id}', [AdminBlogsController::class, 'delete'])->name('admin.blog.delete');
Route::post('/admin/blog/store', [AdminBlogsController::class, 'store'])->name('admin.blog.store');
Route::get('/admin/blog/show/{id}', [AdminBlogsController::class, 'show'])->name('admin.blog.show');

Route::get('/admin/categories', [AdminCategoriesController::class, 'index'])->name('admin.categories.index');
Route::get('/admin/category/create', [AdminCategoriesController::class, 'create'])->name('admin.category.create');
Route::get('/admin/category/show/{id}', [AdminCategoriesController::class, 'show'])->name('admin.category.show');

Route::get('/admin/pages/privacy', [AdminPrivacyController::class, 'index'])->name('admin.pages.privacy');
Route::get('/admin/pages/terms', [AdminTermsController::class, 'index'])->name('admin.pages.terms');
Route::get('/admin/settings', [AdminSettingsController::class, 'index'])->name('admin.settings.index');
Route::get('/admin/profile', [AdminProfileController::class, 'index'])->name('admin.profile.index');


