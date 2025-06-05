<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\TermsController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PrivacyController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\Admin\AdminBlogsController;
use App\Http\Controllers\Admin\AdminPagesController;
use App\Http\Controllers\Admin\AdminRolesController;
use App\Http\Controllers\Admin\AdminTermsController;
use App\Http\Controllers\Admin\AdminPrivacyController;
use App\Http\Controllers\Admin\AdminProfileController;
use App\Http\Controllers\Admin\AdminSettingsController;
use App\Http\Controllers\Admin\AdminCategoriesController;
use App\Http\Controllers\Admin\AdminAdvertisementController;
use App\Http\Controllers\Admin\AdminAuthenticationController;

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
Route::get('/about', [PagesController::class, 'about'])->name('about.index');
Route::get('/disclaimer', [PagesController::class, 'disclaimer'])->name('disclaimer.index');
Route::get('/admin/advertisement/clicks/{id}', [PagesController::class, 'clickCount'])->name('advertisement.clicks');
Route::get('/sitemap', [PagesController::class, 'sitemap'])->name('sitemap.index');
Route::get('/sitemap.xml', [PagesController::class, 'xmlsitemap'])->name('sitemap.xml');

// Admin routes
Auth::routes(); //auth routes from laravel/ui

Route::get('/home', [HomeController::class, 'index'])->name('home');

//blogs
Route::get('/admin/blogs', [AdminBlogsController::class, 'index'])->name('admin.blogs.index');
Route::get('/admin/blog/create', [AdminBlogsController::class, 'create'])->name('admin.blog.create');
Route::get('/admin/blog/edit/{id}', [AdminBlogsController::class, 'edit'])->name('admin.blog.edit');
Route::put('/admin/blog/update/{id}', [AdminBlogsController::class, 'update'])->name('admin.blog.update');
Route::get('/admin/blog/delete/{id}', [AdminBlogsController::class, 'delete'])->name('admin.blog.delete');
Route::post('/admin/blog/store', [AdminBlogsController::class, 'store'])->name('admin.blog.store');
Route::get('/admin/blog/show/{id}', [AdminBlogsController::class, 'show'])->name('admin.blog.show');


//categories
Route::get('/admin/categories', [AdminCategoriesController::class, 'index'])->name('admin.categories.index');
Route::get('/admin/category/create', [AdminCategoriesController::class, 'create'])->name('admin.category.create');
Route::get('/admin/category/show/{id}', [AdminCategoriesController::class, 'show'])->name('admin.category.show');
Route::post('/admin/category/store', [AdminCategoriesController::class, 'store'])->name('admin.category.store');
Route::get('/admin/category/edit/{id}', [AdminCategoriesController::class, 'edit'])->name('admin.category.edit');
Route::put('/admin/category/update/{id}', [AdminCategoriesController::class, 'update'])->name('admin.category.update');
Route::get('/admin/category/delete/{id}', [AdminCategoriesController::class, 'delete'])->name('admin.category.delete');

//advertisements routes
Route::get('/admin/advertisements', [AdminAdvertisementController::class, 'index'])->name('admin.advertisements.index');
Route::get('/admin/advertisement/create', [AdminAdvertisementController::class, 'create'])->name('admin.advertisement.create');
Route::post('/admin/advertisement/store', [AdminAdvertisementController::class, 'store'])->name('admin.advertisement.store');
Route::get('/admin/advertisement/edit/{id}', [AdminAdvertisementController::class, 'edit'])->name('admin.advertisement.edit');
Route::get('/admin/advertisement/delete/{id}', [AdminAdvertisementController::class, 'delete'])->name('admin.advertisement.delete');

//authentication rotues
Route::get('/admin/users', [AdminAuthenticationController::class, 'index'])->name('admin.users.index');
Route::get('/admin/user/create', [AdminAuthenticationController::class, 'create'])->name('admin.user.create');
Route::post('/admin/user/store', [AdminAuthenticationController::class, 'store'])->name('admin.user.store');
Route::get('/admin/user/edit/{id}', [AdminAuthenticationController::class, 'edit'])->name('admin.user.edit');
Route::put('/admin/user/update/{id}', [AdminAuthenticationController::class, 'update'])->name('admin.user.update');
Route::get('/admin/user/delete/{id}', [AdminAuthenticationController::class, 'delete'])->name('admin.user.delete');

//roles & permissions routes
Route::get('/admin/user/roles', [AdminRolesController::class, 'index'])->name('admin.users.roles');
Route::get('/admin/user/role/create', [AdminRolesController::class, 'create'])->name('admin.users.role.create');

//other pages
Route::get('/admin/pages/privacy', [AdminPrivacyController::class, 'index'])->name('admin.pages.privacy');
Route::put('/admin/pages/privacy/{id}', [AdminPrivacyController::class, 'update'])->name('admin.privacy.update');
Route::get('/admin/pages/terms', [AdminTermsController::class, 'index'])->name('admin.pages.terms');
Route::put('/admin/pages/terms/{id}', [AdminTermsController::class, 'update'])->name('admin.terms.update');
Route::get('/admin/pages/about', [AdminPagesController::class, 'about'])->name('admin.pages.about');
Route::put('/admin/pages/about/{id}', [AdminPagesController::class, 'aboutUpdate'])->name('admin.about.update');
Route::get('/admin/pages/disclaimer', [AdminPagesController::class, 'disclaimer'])->name('admin.pages.disclaimer');
Route::put('/admin/pages/disclaimer/{id}', [AdminPagesController::class, 'disclaimerUpdate'])->name('admin.disclaimer.update');

//contact messages
Route::get('/admin/contact', [AdminPagesController::class, 'contact'])->name('admin.contact.index');

// Admin profile and settings
Route::get('/admin/settings', [AdminSettingsController::class, 'index'])->name('admin.settings.index');
Route::put('/admin/settings/update/{id}', [AdminSettingsController::class, 'update'])->name('admin.settings.update');
Route::get('/admin/profile', [AdminProfileController::class, 'index'])->name('admin.profile.index');
