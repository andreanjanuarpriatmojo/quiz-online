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

Route::get('/', 'HomeController@dashboard')->name('home');
Route::get('/dashboard', 'HomeController@dashboard')->name('dashboard');
Route::resource('user', 'UserController')->middleware('checkRole:admin');
Route::resource('kelas', 'KelasController')->middleware('checkRole:admin');

Route::get('/peserta/{kelas_id}', 'PesertaController@index')->name('peserta.index')->middleware('checkRole:admin');
Route::delete('/peserta/destroy/{kelas_id}/{user_id}', 'PesertaController@destroy')->name('peserta.destroy')->middleware('checkRole:admin');
Route::post('/peserta', 'PesertaController@store')->name('peserta.store')->middleware('checkRole:admin');

Route::resource('pelajaran', 'PelajaranController')->middleware('checkRole:adminGuru');

// Route::resource('paket_soal', 'PaketSoalController')->middleware('checkRole:adminGuru');
Route::get('/paket_soal/{pelajaran_id}', 'PaketSoalController@index')->name('paket_soal.index')->middleware('checkRole:adminGuru');
Route::post('/paket_soal', 'PaketSoalController@store')->name('paket_soal.store')->middleware('checkRole:adminGuru');
Route::get('/paket_soal/{id}/edit', 'PaketSoalController@edit')->name('paket_soal.edit')->middleware('checkRole:adminGuru');
Route::patch('/paket_soal/{id}/update', 'PaketSoalController@update')->name('paket_soal.update')->middleware('checkRole:adminGuru');
Route::delete('/paket_soal/{id}/destroy', 'PaketSoalController@destroy')->name('paket_soal.destroy')->middleware('checkRole:adminGuru');

// Route::resource('soal', 'SoalController')->middleware('checkRole:adminGuru');
Route::get('/soal/{paket_soal_id}', 'SoalController@index')->name('soal.index')->middleware('checkRole:adminGuru');
Route::get('/soal/{paket_soal_id}/create', 'SoalController@create')->name('soal.create')->middleware('checkRole:adminGuru');
Route::post('/soal', 'SoalController@store')->name('soal.store')->middleware('checkRole:adminGuru');
Route::get('/soal/{id}/edit', 'SoalController@edit')->name('soal.edit')->middleware('checkRole:adminGuru');
Route::patch('/soal/{id}/update', 'SoalController@update')->name('soal.update')->middleware('checkRole:adminGuru');
Route::delete('/soal/{id}/destroy', 'SoalController@destroy')->name('soal.destroy')->middleware('checkRole:adminGuru');

Route::resource('jadwal_ujian', 'JadwalUjianController')->middleware('checkRole:adminGuru');
Route::get('/jadwal_ujian/{id}/peserta', 'JadwalUjianController@peserta')->middleware('checkRole:adminGuru');
Route::get('/jadwal_ujian/{id}/hasil', 'JadwalUjianController@hasil')->middleware('checkRole:adminGuru');
Route::get('/jadwal_ujian/{id}/koreksi', 'JadwalUjianController@koreksi')->middleware('checkRole:adminGuru');
Route::post('/jadwal_ujian/ganti_peserta', 'JadwalUjianController@ganti_peserta')->middleware('checkRole:adminGuru');
Route::get('/jadwal_ujian/ajax/get_paket', 'JadwalUjianController@getPaket')->middleware('checkRole:adminGuru');


Route::get('siswa/ujian', 'UjianController@index');
Route::get('siswa/ujian/{ujian_siswa_id}', 'UjianController@getUjian');
Route::post('siswa/ujian/submit_jawaban', 'UjianController@submitJawaban');
Route::get('siswa/ujian/{ujian_siswa_id}/finish', 'UjianController@finish');

Route::get('/logout', function () {
    Auth::logout();
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
