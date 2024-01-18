<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\ManhwaController;

##use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index']);
Route::get('/authors', [AuthorController::class, 'list']);
Route::get('/authors/create', [AuthorController::class, 'create']);
Route::post('/authors/put', [AuthorController::class, 'put']);
Route::get('/authors/update/{author}', [AuthorController::class, 'update']);
Route::post('/authors/patch/{author}', [AuthorController::class, 'patch']);
Route::post('/authors/delete/{author}', [AuthorController::class, 'delete']);

// Manhwa routes
Route::get('/manhwa', [ManhwaController::class, 'list']);
Route::get('/manhwa/create', [ManhwaController::class, 'create']);
Route::post('/manhwa/put', [ManhwaController::class, 'put']);
Route::get('/manhwa/update/{manhwa}', [ManhwaController::class, 'update']);
Route::post('/manhwa/patch/{manhwa}', [ManhwaController::class, 'patch']);
Route::post('/manhwa/delete/{manhwa}', [ManhwaController::class, 'delete']);