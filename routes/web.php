<?php

declare(strict_types=1);

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes — Trivant Apparel Sourcing Public Website
|--------------------------------------------------------------------------
| Clean, named routes connecting to Controllers without dead links.
*/

// 1. Homepage
Route::get('/', HomeController::class)->name('home');

// 2. Public Sections & Stubs
Route::get('/about', [PageController::class, 'show'])->defaults('page', 'about')->name('about');
Route::get('/services', [PageController::class, 'show'])->defaults('page', 'services')->name('services');
Route::get('/products', [PageController::class, 'show'])->defaults('page', 'products')->name('products');
Route::get('/process', [PageController::class, 'show'])->defaults('page', 'process')->name('process');
Route::get('/compliance', [PageController::class, 'show'])->defaults('page', 'compliance')->name('compliance');
Route::get('/sustainability', [PageController::class, 'show'])->defaults('page', 'sustainability')->name('sustainability');
Route::get('/contact', [PageController::class, 'show'])->defaults('page', 'contact')->name('contact');
