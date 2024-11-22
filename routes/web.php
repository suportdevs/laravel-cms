<?php

use App\Helpers\ShortcodeParser;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\ImageUploadController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

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
    // Pages Resource Route
    Route::prefix('admin/blog/pages')->name('admin.blog.pages.')->group(function () {
        Route::post("/ckeditor/image/upload", [PagesController::class, "imageUpload"])->name("ckeditor.image.upload");
        Route::post('/delete', [PagesController::class, 'delete'])->name('delete');
        Route::resource('/', PagesController::class)->parameters(['' => 'key']);
    });
    // Blog Posts Resource Route
    Route::prefix('admin/blog/posts')->name('admin.blog.posts.')->group(function () {
        Route::post("/ckeditor/image/upload", [PostController::class, "imageUpload"])->name("ckeditor.image.upload");
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
    // Blog Galleries Resource Route
    Route::prefix('admin/blog/galleries')->name('admin.blog.galleries.')->group(function () {
        Route::post("/ckeditor/image/upload", [GalleryController::class, "imageUpload"])->name("ckeditor.image.upload");
        Route::post('/delete', [GalleryController::class, 'delete'])->name('delete');
        Route::resource('/', GalleryController::class)->parameters(['' => 'key']);
    });
    // Blog Members Resource Route
    Route::prefix('admin/blog/members')->name('admin.blog.members.')->group(function () {
        Route::post('/delete', [MemberController::class, 'delete'])->name('delete');
        Route::resource('/', MemberController::class)->parameters(['' => 'key']);
    });
    // Menues Resource Route
    Route::prefix('admin/blog/menus')->name('admin.blog.menus.')->group(function () {
        Route::post('/ajax/get_node', [MenuController::class, 'get_node'])->name('ajax.get_node');
        Route::post('/save_structure', [MenuController::class, 'save_structure'])->name('save_structure');
        Route::post('/delete', [MenuController::class, 'delete'])->name('delete');
        Route::resource('/', MenuController::class)->parameters(['' => 'key']);
    });
});


Route::get('/shortcode-demo', function () {
    $content = '[card title="Card Title" content="This is a card." color="#ffe0b2"]';
    $parsedContent = ShortcodeParser::parse($content, config('view.shortcodes'));

    return view('shortcode-demo', compact('parsedContent'));
});
