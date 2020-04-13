<?php

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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Admin
Route::namespace('Admin')->prefix('admin')->middleware(['auth', 'admin'])->name('admin.')->group(function() {
    // Route::resource('/akun', 'UserController', ['except' => ['show', 'create', 'store']]);
    Route::get('/beranda', 'BerandaController@index')->name('beranda.index');
    Route::get('/pengaduan', 'BerandaController@indexPengaduan')->name('pengaduan.index');
    Route::get('/pengaduan/detail/{id}', 'BerandaController@showPengaduan')->name('pengaduan.show');
    Route::get('/profil', 'AuthController@index')->name('profil.index');
    Route::get('/profil/edit/{id}', 'AuthController@edit')->name('profil.edit');
    Route::patch('/profil/{id}/update', 'AuthController@updateAdmin')->name('profil.update');
    Route::get('/register', 'AuthController@showRegister')->name('register.index');
    Route::post('/register/petugas', 'AuthController@RegisterPetugas')->name('register.petugas');
});

// Petugas
Route::namespace('Petugas')->prefix('petugas')->middleware(['auth', 'petugas'])->name('petugas.')->group(function() {
    Route::get('/beranda', 'BerandaController@index')->name('beranda.index');
    Route::get('/pengaduan', 'BerandaController@indexPengaduan')->name('pengaduan.index');
    Route::get('/pengaduan/detail/{id}', 'BerandaController@showPengaduan')->name('pengaduan.show');
    Route::post('/pengaduan/detail/tanggapan', 'BerandaController@tanggapan')->name('pengaduan.tanggapan');
});

// Masyarakat
Route::namespace('Masyarakat')->prefix('masyarakat')->middleware(['auth', 'masyarakat'])->name('masyarakat.')->group(function() {
    Route::resource('/beranda', 'BerandaController');
    Route::get('/pengaduan/detail/{id}', 'PengaduanController@showPengaduan')->name('pengaduan.show');
});

