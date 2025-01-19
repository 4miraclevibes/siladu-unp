<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Frontend\ToolController;
use App\Http\Controllers\Frontend\AnnouncementController;
use App\Http\Controllers\Backend\AnnouncementController as BackendAnnouncementController;
use App\Http\Controllers\Backend\ArticleController as BackendArticleController;
use App\Http\Controllers\Frontend\ArticleController;
use App\Http\Controllers\Frontend\GalleryController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\GalleryController as BackendGalleryController;
use App\Http\Controllers\Backend\ToolController as BackendToolController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.frontend.beranda');
})->name('beranda');

Route::get('/profiles', function () {
    return view('pages.frontend.profile');
})->name('profiles');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/tool', [ToolController::class, 'index'])->name('tool');
Route::get('/announcement', [AnnouncementController::class, 'index'])->name('announcement');
Route::get('/announcement/{id}', [AnnouncementController::class, 'show'])->name('announcement.show');
Route::get('/article', [ArticleController::class, 'index'])->name('article');
Route::get('/article/{id}', [ArticleController::class, 'show'])->name('article.show');
Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    //Users
    Route::get('users', [UserController::class, 'index'])->name('users.index');
    Route::get('users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('users', [UserController::class, 'store'])->name('users.store');
    Route::get('users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::put('users/{user}', [UserController::class, 'update'])->name('users.update');
    Route::delete('users/{user}', [UserController::class, 'destroy'])->name('users.destroy');
    //Announcements
    Route::get('announcements', [BackendAnnouncementController::class, 'index'])->name('announcements.index');
    Route::get('announcements/create', [BackendAnnouncementController::class, 'create'])->name('announcements.create');
    Route::post('announcements', [BackendAnnouncementController::class, 'store'])->name('announcements.store');
    Route::get('announcements/{announcement}/edit', [BackendAnnouncementController::class, 'edit'])->name('announcements.edit');
    Route::put('announcements/{announcement}', [BackendAnnouncementController::class, 'update'])->name('announcements.update');
    Route::delete('announcements/{announcement}', [BackendAnnouncementController::class, 'destroy'])->name('announcements.destroy');
    Route::get('announcements/{announcement}', [BackendAnnouncementController::class, 'show'])->name('announcements.show');
    //Articles
    Route::get('articles', [BackendArticleController::class, 'index'])->name('articles.index');
    Route::get('articles/create', [BackendArticleController::class, 'create'])->name('articles.create');
    Route::post('articles', [BackendArticleController::class, 'store'])->name('articles.store');
    Route::get('articles/{article}/edit', [BackendArticleController::class, 'edit'])->name('articles.edit');
    Route::put('articles/{article}', [BackendArticleController::class, 'update'])->name('articles.update');
    Route::delete('articles/{article}', [BackendArticleController::class, 'destroy'])->name('articles.destroy');
    Route::get('articles/{article}', [BackendArticleController::class, 'show'])->name('articles.show');
    //Galleries
    Route::get('galleries', [BackendGalleryController::class, 'index'])->name('galleries.index');
    Route::post('galleries', [BackendGalleryController::class, 'store'])->name('galleries.store');
    Route::put('galleries/{gallery}', [BackendGalleryController::class, 'update'])->name('galleries.update');
    Route::delete('galleries/{gallery}', [BackendGalleryController::class, 'destroy'])->name('galleries.destroy');
    Route::delete('gallery-details/{galleryDetail}', [BackendGalleryController::class, 'deleteImage'])->name('galleries.deleteImage');
    //Tools
    Route::get('tools', [BackendToolController::class, 'index'])->name('tools.index');
    Route::post('tools', [BackendToolController::class, 'store'])->name('tools.store');
    Route::put('tools/{tool}', [BackendToolController::class, 'update'])->name('tools.update');
    Route::delete('tools/{tool}', [BackendToolController::class, 'destroy'])->name('tools.destroy');
    Route::delete('tool-images/{toolImage}', [BackendToolController::class, 'deleteImage'])->name('tools.deleteImage');
});

require __DIR__.'/auth.php';
