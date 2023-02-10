<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/modal', function(){
    return view('modal');
});

Auth::routes([
    'register' => false,
    'reset' => false
]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/kategori', [HomeController::class,'kategori']);
Route::get('/kategori/tambah', [HomeController::class,'kategori_tambah']);
Route::post('/kategori/aksi', [HomeController::class,'kategori_aksi']);
Route::get('/kategori/edit/{id}', [HomeController::class, 'kategori_edit']);
Route::put('/kategori/update/{id}', [HomeController::class, 'kategori_update']);
Route::get('/kategori/hapus/{id}', [HomeController::class, 'kategori_hapus']);

Route::get('/transaksi', [HomeController::class, 'transaksi']);
Route::get('/transaksi/tambah', [HomeController::class,'transaksi_tambah']);
Route::post('/transaksi/aksi', [HomeController::class, 'transaksi_aksi']);