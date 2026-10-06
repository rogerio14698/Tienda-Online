<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\BrandsController;
use App\Http\Middleware\AdminMiddleware;

Route::prefix('admin')->middleware(['auth',AdminMiddleware::class])->group(function () {
    // Admin dashboard route
    Route::get('/dashboard', [DashboardController::class, 'index']);
    // Categories routes
        // Route is /admin/categories
    Route::resource('categories', CategoryController::class);
    Route::get('categories/{id}/delete', [CategoryController::class, 'destroy'])->name('categories.delete');

    Route::resource('brands', BrandsController::class);
    Route::get('brands/{id}/delete', [BrandsController::class, 'destroy'])->name('brands.delete');
    

    
});
