<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']], function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('about', [HomeController::class, 'about'])->name('about');
    Route::get('products/{category_id?}', [HomeController::class, 'products'])->name('products');
    Route::get('product/{slug}', [HomeController::class, 'product'])->name('product');
    Route::get('blog', [HomeController::class, 'blog'])->name('blog');
    Route::get('blog_details/{slug}', [HomeController::class, 'blog_details'])->name('blog_details');
    Route::get('certifications', [HomeController::class, 'certifications'])->name('certifications');
    Route::get('contact_us', [HomeController::class, 'contact_us'])->name('contact_us');
});
