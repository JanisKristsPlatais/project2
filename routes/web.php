<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\ManhwaController;
use App\Http\Controllers\AuthController;


##use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index']);

Route::get('/authors', [AuthorController::class, 'list']);
Route::get('/authors/create', [AuthorController::class, 'create']);
Route::post('/authors/put', [AuthorController::class, 'put']);
Route::get('/authors/update/{author}', [AuthorController::class, 'update']);
Route::post('/authors/patch/{author}', [AuthorController::class, 'patch']);
Route::post('/authors/delete/{author}', [AuthorController::class, 'delete']);

// Manhwa routes
Route::get('/manhwas', [ManhwaController::class, 'list']);
Route::get('/manhwas/create', [ManhwaController::class, 'create']);
Route::post('/manhwas/put', [ManhwaController::class, 'put']);
Route::get('/manhwas/update/{manhwa}', [ManhwaController::class, 'update']);
Route::post('/manhwas/patch/{manhwa}', [ManhwaController::class, 'patch']);
Route::post('/manhwas/delete/{manhwa}', [ManhwaController::class, 'delete']);

// Auth routes
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/auth', [AuthController::class, 'authenticate']);
Route::get('/logout', [AuthController::class, 'logout']);