<?php

use App\Http\Controllers\Admin\{ReferenceController, BookController};
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();
    Route::get('/', [HomeController::class, 'index'])->name('index');

    /*Login*/
    Route::get('/login', [LoginController::class, 'login'])->name('login');
    Route::post('/login', [LoginController::class,'authenticate']);
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('/authenticateViaToken', [LoginController::class, 'authenticateViaToken'])->name('authenticateViaToken');
    Route::get('/saveToken', [LoginController::class, 'saveToken'])->name('saveToken');

    /*Books*/
    Route::get('/book_add', [BookController::class, 'book_add'])->name('book_add');

    /*References*/
    /*Author*/
    Route::get('/reference', [ReferenceController::class, 'author'])->name('author');
    Route::post('/author', [ReferenceController::class, 'add'])->name('add');
    Route::post('/author/delete/{id}', [ReferenceController::class, 'delete'])->name('delete');

    /*Place*/
    Route::get('/place', [ReferenceController::class, 'place'])->name('place');
    Route::post('/place', [ReferenceController::class, 'add_place'])->name('add_place');
    Route::post('/place/delete/{id}', [ReferenceController::class, 'delete_place'])->name('delete_place');

    /*Publishing*/
    Route::get('/publishing', [ReferenceController::class, 'publishing'])->name('publishing');
    Route::post('/publishing', [ReferenceController::class, 'add_publishing'])->name('add_publishing');
    Route::post('/publishing/delete/{id}', [ReferenceController::class, 'delete_publishing'])->name('delete_publishing');

    /*Literature*/
    Route::get('/literature', [ReferenceController::class, 'literature'])->name('literature');
    Route::post('/literature', [ReferenceController::class, 'add_literature'])->name('add_literature');
    Route::post('/literature/delete/{id}', [ReferenceController::class, 'delete_literature'])->name('delete_literature');

    /*Edition*/
    Route::get('/edition', [ReferenceController::class, 'edition'])->name('edition');
    Route::post('/edition', [ReferenceController::class, 'add_edition'])->name('add_edition');
    Route::post('/edition/delete/{id}', [ReferenceController::class, 'delete_edition'])->name('delete_edition');

    /*Language*/
    Route::get('/language', [ReferenceController::class, 'language'])->name('language');
    Route::post('/language', [ReferenceController::class, 'add_language'])->name('add_language');
    Route::post('/language/delete/{id}', [ReferenceController::class, 'delete_language'])->name('delete_language');


