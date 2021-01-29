<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\MediasController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


// Front routes
Route::get('/', [WelcomeController::class, 'index'])->name('home');

Route::get('presentation', [WelcomeController::class, 'index'])->name('home');

Route::get('medias', [MediasController::class, 'medias'])->name('medias');

Route::get('contact', [ContactController::class, 'contact'])->name('contact');
// Route::get('contact', ['as' => 'contact', 'uses' => 'ContactController@contact'])->name('contact');

Route::post('contact', [ContactController::class, 'contact'])->name('contact.post');
// Route::post('contact', ['as' => 'contact_post', 'uses' => 'ContactController@contactPost']);

Route::get('mentions', [PagesController::class, 'mentions'])->name('mentions');
// Route::get('mentions', 'PagesController@mentions')->name('mentions');

Route::get('sitemap', [PagesController::class, 'sitemap'])->name('sitemap');
// Route::get('sitemap', 'PagesController@sitemap')->name('sitemap');

// Annule la route register
Auth::routes(['register' => true]);

// Route pour le CRUD de l'administration (contenu des pages)
Route::get('/admin', [AdminController::class, 'index'])->name('admin');

Route::get('/admin/{page}', [AdminController::class, 'show'])->name('page');

Route::get('/admin/{page}/edit-page', [AdminController::class, 'edit'])->name('edit-page');

Route::post('/admin/{page}/edit-page', [AdminController::class, 'update'])->name('update-page');


/* CRUD for medias */
Route::get('/admin/{page}/edit-media/{id}', [MediasController::class, 'edit'])->where('id', '[0-9]+')->name('edit-media');

Route::post('/admin/{page}/edit-media/{id}', [MediasController::class, 'update'])->where('id', '[0-9]+')->name('update-media');

Route::get('/admin/{page}/add/media/{cat}', [MediasController::class, 'form'])->name('add-media');

Route::post('/admin/{page}/add/media/{cat}', [MediasController::class, 'add'])->name('save-media');

Route::post('/admin/{page}/del/media/{id}', [MediasController::class, 'del'])->where('id', '[0-9]+')->name('del-media');


/* CRUD for categories */
Route::get('/admin/{page}/edit-cat/{id}', [CategoriesController::class, 'edit'])->where('id', '[0-9]+')->name('edit-cat');

Route::post('/admin/{page}/edit-cat/{id}', [CategoriesController::class, 'update'])->where('id', '[0-9]+')->name('update-cat');

Route::get('/admin/{page}/add/cat', [CategoriesController::class, 'form'])->name('add-cat');

Route::post('/admin/{page}/add/cat', [CategoriesController::class, 'add'])->name('save-cat');

Route::post('/admin/{page}/del/cat/{id}', [CategoriesController::class, 'del'])->where('id', '[0-9]+')->name('del-cat');


/* CRUD for users */
Route::get('/admin/{page}/edit-user/{id}', [UsersController::class, 'show'])->where('id', '[0-9]+')->name('edit-user');

Route::post('/admin/{page}/edit-user/{id}', [UsersController::class, 'update'])->where('id', '[0-9]+')->name('update-user');


Route::post('/admin/{page}/del/cat/{id}', [CategoriesController::class, 'del'])->where('id', '[0-9]+')->name('del-cat');

/* Catch upload file request */
Route::post('/admin/image/upload', [FileController::class, 'postEditorImage']);
