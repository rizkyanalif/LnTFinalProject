<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FakturController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Models\Category;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [BarangController::class, 'show'])->middleware('auth');
Route::get('/add-barang', [BarangController::class, 'create'])->middleware('isAdmin');
Route::post('/store-barang', [BarangController::class, 'store'])->middleware('isAdmin');
Route::get('/edit-barang/{id}', [BarangController::class, 'edit'])->middleware('isAdmin');
Route::patch('/update-barang/{id}', [BarangController::class, 'update'])->middleware('isAdmin');
Route::delete('/delete-barang/{id}', [BarangController::class, 'destroy'])->middleware('isAdmin');

Route::get('/edit-category', [CategoryController::class, 'create'])->middleware('isAdmin');
Route::post('/store-category', [CategoryController::class, 'store'])->middleware('isAdmin');
Route::get('/rename-category/{id}', [CategoryController::class, 'rename'])->middleware('isAdmin');
Route::patch('/update-category/{id}', [CategoryController::class, 'update'])->middleware('isAdmin');
Route::delete('/delete-category/{id}', [CategoryController::class, 'destroy'])->middleware('isAdmin');

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'register'])->middleware('guest');

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate'])->middleware('guest');
Route::post('/logout', [LoginController::class, 'logout'])->middleware('auth');

Route::get('/view-order', [FakturController::class, 'show'])->middleware('auth');
Route::get('/add-order/{id}', [FakturController::class, 'create'])->middleware('auth');
Route::post('/place-order/{id}', [FakturController::class, 'store'])->middleware('auth');