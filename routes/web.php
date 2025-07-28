<?php

use App\Http\Controllers\Admin\ReferenceController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();
Route::get('/', [HomeController::class, 'index'])->name('index');

Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/login', [LoginController::class,'authenticate']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/authenticateViaToken', [LoginController::class, 'authenticateViaToken'])->name('authenticateViaToken');
Route::get('/saveToken', [LoginController::class, 'saveToken'])->name('saveToken');

/*References*/
Route::get('/reference', [ReferenceController::class, 'author'])->name('author');
Route::post('/author', [ReferenceController::class, 'add'])->name('add');
Route::post('/author/{id}/delete', [ReferenceController::class, 'delete'])->name('delete');


