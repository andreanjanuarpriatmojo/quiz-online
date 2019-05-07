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
    return view('home');
});
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
