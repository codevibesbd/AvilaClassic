<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SeoController;
use Illuminate\Support\Facades\Route;

// Main Informational & Corporate Pages
Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/manufacturing', [PageController::class, 'manufacturing'])->name('manufacturing');
Route::get('/sustainability', [PageController::class, 'sustainability'])->name('sustainability');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');

// Product Showcase & Catalog (Purely for Viewing & Technical Specs)
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');

// Search Engine & AI Model Discovery Endpoints
Route::get('/sitemap.xml', [SeoController::class, 'sitemap'])->name('seo.sitemap');
Route::get('/robots.txt', [SeoController::class, 'robots'])->name('seo.robots');
Route::get('/llms.txt', [SeoController::class, 'llms'])->name('seo.llms');
Route::get('/llms-full.txt', [SeoController::class, 'llmsFull'])->name('seo.llms-full');
