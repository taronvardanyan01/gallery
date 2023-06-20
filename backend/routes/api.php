<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('login', [AuthController::class, 'login'])->name('login');

//Route::prefix('gallery')->group(function () {
//   Route::get('/', [GalleryController::class, 'index']);
//   Route::post('/', [GalleryController::class, 'store']);
//});
//
//Route::prefix('image')->group(function () {
//   Route::post('/upload', [ImageController::class, 'upload']);
//});
