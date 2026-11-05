<?php

use App\Http\Controllers\Admin\AuthController as AdminAuthController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\HeroSlideController as AdminHeroSlideController;
use App\Http\Controllers\Admin\HomepageController as AdminHomepageController;
use App\Http\Controllers\Admin\InquiryController as AdminInquiryController;
use App\Http\Controllers\Admin\MediaController as AdminMediaController;
use App\Http\Controllers\Admin\NavigationController as AdminNavigationController;
use App\Http\Controllers\Admin\PageController as AdminPageController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Admin\ProfileController as AdminProfileController;
use App\Http\Controllers\Admin\SettingController as AdminSettingController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SeoController;
use Illuminate\Support\Facades\Route;

// ==========================================
// Main Informational & Corporate Public Pages
// ==========================================
Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/manufacturing', [PageController::class, 'manufacturing'])->name('manufacturing');
Route::get('/sustainability', [PageController::class, 'sustainability'])->name('sustainability');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');
Route::post('/contact', [PageController::class, 'submitContact'])->name('contact.submit');

// Product Showcase & Catalog (Purely for Viewing & Technical Specs)
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');

// Search Engine & AI Model Discovery Endpoints
Route::get('/sitemap.xml', [SeoController::class, 'sitemap'])->name('seo.sitemap');
Route::get('/robots.txt', [SeoController::class, 'robots'])->name('seo.robots');
Route::get('/llms.txt', [SeoController::class, 'llms'])->name('seo.llms');
Route::get('/llms-full.txt', [SeoController::class, 'llmsFull'])->name('seo.llms-full');

// ==========================================
// Admin Authentication Routes
// ==========================================
Route::prefix('admin')->name('admin.')->group(function () {
    Route::middleware('guest')->group(function () {
        Route::get('/login', [AdminAuthController::class, 'showLoginForm'])->name('login');
        Route::post('/login', [AdminAuthController::class, 'login'])->name('login.submit');
    });

    Route::post('/logout', [AdminAuthController::class, 'logout'])->name('logout')->middleware('auth');

    // ==========================================
    // Admin Protected Workspace
    // ==========================================
    Route::middleware('auth')->group(function () {
        Route::get('/', [AdminDashboardController::class, 'index'])->name('dashboard');

        // Products Catalog Management
        Route::resource('products', AdminProductController::class)->names('products');

        // Hero Slides Management
        Route::resource('hero-slides', AdminHeroSlideController::class)->parameters(['hero-slides' => 'heroSlide'])->names('hero-slides');

        // Homepage Editorial Content
        Route::get('/homepage', [AdminHomepageController::class, 'index'])->name('homepage.index');
        Route::put('/homepage/{section}', [AdminHomepageController::class, 'update'])->name('homepage.update');

        // Site Content Pages
        Route::get('/pages', [AdminPageController::class, 'index'])->name('pages.index');
        Route::get('/pages/{page}', [AdminPageController::class, 'edit'])->name('pages.edit');
        Route::put('/pages/{page}', [AdminPageController::class, 'update'])->name('pages.update');

        // Inquiries & Dispatch Management
        Route::get('/inquiries', [AdminInquiryController::class, 'index'])->name('inquiries.index');
        Route::get('/inquiries/{inquiry}', [AdminInquiryController::class, 'show'])->name('inquiries.show');
        Route::put('/inquiries/{inquiry}', [AdminInquiryController::class, 'update'])->name('inquiries.update');
        Route::delete('/inquiries/{inquiry}', [AdminInquiryController::class, 'destroy'])->name('inquiries.destroy');

        // Navigation Menus
        Route::get('/navigation', [AdminNavigationController::class, 'index'])->name('navigation.index');
        Route::post('/navigation', [AdminNavigationController::class, 'store'])->name('navigation.store');
        Route::put('/navigation/{menuItem}', [AdminNavigationController::class, 'update'])->name('navigation.update');
        Route::delete('/navigation/{menuItem}', [AdminNavigationController::class, 'destroy'])->name('navigation.destroy');

        // Media Library
        Route::get('/media', [AdminMediaController::class, 'index'])->name('media.index');
        Route::post('/media', [AdminMediaController::class, 'store'])->name('media.store');
        Route::delete('/media/{media}', [AdminMediaController::class, 'destroy'])->name('media.destroy');

        // Global Settings
        Route::get('/settings', [AdminSettingController::class, 'index'])->name('settings.index');
        Route::put('/settings', [AdminSettingController::class, 'update'])->name('settings.update');

        // Admin Profile
        Route::get('/profile', [AdminProfileController::class, 'edit'])->name('profile.edit');
        Route::put('/profile', [AdminProfileController::class, 'update'])->name('profile.update');

        // Users & Role Management
        Route::resource('users', AdminUserController::class)->names('users');
    });
});
