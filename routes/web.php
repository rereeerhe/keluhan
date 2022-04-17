<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\KeluhanController;

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

Route::get('beranda',[BerandaController::class, 'index']);
Route::get('data',[PenggunaController::class, 'index']);
Route::get('create',[PenggunaController::class, 'create']);
Route::post('simpan',[PenggunaController::class, 'store']);
Route::get('edit/{id}',[PenggunaController::class, 'edit']);
Route::post('update/{id}',[PenggunaController::class, 'update']);
Route::get('delete/{id}',[PenggunaController::class, 'destroy']);

//Route::resource('/pengguna', PenggunaController::class);
Route::resource('pengguna', PenggunaController::class);

Route::get('dataAdmin',[AdminController::class, 'index']);
Route::get('createAdmin',[AdminController::class, 'create']);
Route::post('simpanAdmin',[AdminController::class, 'store']);
Route::get('editAdmin/{id}',[AdminController::class, 'edit']);
Route::post('updateAdmin/{id}',[AdminController::class, 'update']);
Route::get('deleteAdmin/{id}',[AdminController::class, 'destroy']);
Route::resource('admin', AdminController::class);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('dataKeluhan',[KeluhanController::class, 'index']);
Route::get('createKeluhan',[KeluhanController::class, 'create']);
Route::post('simpanKeluhan',[KeluhanController::class, 'store']);
Route::get('editKeluhan/{id}',[KeluhanController::class, 'edit']);
Route::post('updateKeluhan/{id}',[KeluhanController::class, 'update']);
Route::get('deleteKeluhan/{id}',[KeluhanController::class, 'destroy']);
Route::resource('keluhan', KeluhanController::class);