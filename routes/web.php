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
Route::resource('paket_soal', 'PaketSoalController')->middleware('checkRole:adminGuru');
Route::resource('soal', 'SoalController')->middleware('checkRole:adminGuru');
Route::resource('jadwal_ujian', 'JadwalUjianController')->middleware('checkRole:adminGuru');
Route::get('/jadwal_ujian/{id}/peserta', 'JadwalUjianController@peserta')->middleware('checkRole:adminGuru');
Route::post('/jadwal_ujian/ganti_peserta', 'JadwalUjianController@ganti_peserta')->middleware('checkRole:adminGuru');
Route::get('/jadwal_ujian/ajax/get_paket', 'JadwalUjianController@getPaket')->middleware('checkRole:adminGuru');


Route::get('/login', function () {
    return view('auth.login');
});
Route::get('/register', function () {
    return view('auth.register');
});
Route::get('/forgot', function () {
    return view('auth.forgotpassword');
});
Route::get('/student', function () {
    return view('student.index');
});
Route::get('/student-ce', function () {
    return view('student.create');
});
Route::get('/teacher', function () {
    return view('teacher.index');
});
Route::get('/teacher-ce', function () {
    return view('teacher.create');
});
Route::get('/class', function () {
    return view('class.index');
});
Route::get('/class-ce', function () {
    return view('class.create');
});
Route::get('/result', function () {
    return view('result.index');
});
Route::get('/result-view', function () {
    return view('result.view');
});
Route::get('/quiz', function () {
    return view('quiz.index');
});
Route::get('/setting', function () {
    return view('setting');
});
Route::get('/quiz-ce', function () {
    return view('quiz.create');
});

Route::get('/siswa/ujian/ambil', function () {
    return view('ujian.ujian');
});

Route::get('/siswa/ujian', 'UjianController@index');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
