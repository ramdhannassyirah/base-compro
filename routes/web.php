<?php

// BE
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FrontendController;

// GE
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

// ADMIN
use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ContactController;



Route::get('welcome', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});


Route::get('/', [FrontendController::class, 'index']);
Route::get('/articles', [FrontendController::class, 'ArticleIndex'])->name('articles.index');
Route::get('/articles/{slug}', [FrontendController::class, 'ArticleShow'])->name('articles.show');
Route::get('dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');
Route::post('contact', [ContactController::class, 'store'])->name('contact.store');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {
    Route::resource('article', ArticleController::class);
    Route::resource('testimonial', TestimonialController::class);

    // Website Setting
    Route::get('setting', [SettingController::class, 'index'])->name('setting.index');
    Route::put('setting/{setting}', [SettingController::class, 'update'])->name('setting.update');
    Route::delete('setting/{setting}/logo', [SettingController::class, 'deleteLogo'])
    ->name('setting.deleteLogo');

    Route::resource('category', CategoryController::class);
    Route::resource('product', ProductController::class);
    Route::get('contact', [ContactController::class, 'index'])->name('contact.index');
    Route::delete('contact/{contact}', [ContactController::class, 'destroy'])->name('contact.destroy');

});

require __DIR__.'/auth.php';