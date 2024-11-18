<?php

use App\Helpers\ShortcodeParser;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ImageUploadController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.layouts.app');
    })->name('admin.dashboard');
});
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/home', function () {
        return view('admin.home');
    })->name('admin.home');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    // Blog Posts Resource Route
    Route::prefix('admin/blog/posts')->name('admin.blog.posts.')->group(function () {
        Route::post('/delete', [PostController::class, 'delete'])->name('delete');
        Route::resource('/', PostController::class)->parameters(['' => 'key']);
    });

    // Blog Categories Resource Route
    Route::prefix('admin/blog/categories')->name('admin.blog.categories.')->group(function () {
        Route::post('/delete', [CategoryController::class, 'delete'])->name('delete');
        Route::resource('/', CategoryController::class)->parameters(['' => 'key']);
    });

    // Blog Tags Resource Route
    Route::prefix('admin/blog/tags')->name('admin.blog.tags.')->group(function () {
        Route::post('/delete', [TagController::class, 'delete'])->name('delete');
        Route::resource('/', TagController::class)->parameters(['' => 'key']);
    });
    Route::post('/admin/upload-image', [ImageUploadController::class, 'upload'])->name('admin.upload.image');

});


Route::get('/shortcode-demo', function () {
    $content = '[card title="Card Title" content="This is a card." color="#ffe0b2"]';
    $parsedContent = ShortcodeParser::parse($content, config('view.shortcodes'));

    return view('shortcode-demo', compact('parsedContent'));
});
