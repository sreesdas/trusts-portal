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

Route::resource('/user', 'UserController')->middleware('auth');
Route::resource('/cpf/disha', 'CpfDishaController')->middleware('access:cpf');

Route::post('/cpf/action/{id}/{action}', 'CpfMeetingController@action')->middleware('access:cpf');
Route::resource('/cpf/agenda', 'CpfAgendaController')->middleware('access:cpf');

Route::get('/cpf/meeting/{meeting}/mom', 'CpfMeetingController@mom')->middleware('access:cpf');
Route::get('/cpf/meeting/admin', 'CpfMeetingController@admin')->middleware('access:cpf');
Route::resource('/cpf/meeting', 'CpfMeetingController')->middleware('access:cpf');
Route::resource('/cpf/archive', 'CpfArchiveController')->middleware('access:cpf');

Route::resource('/csss/agenda', 'CsssAgendaController')->middleware('access:csss');
Route::resource('/csss/meeting', 'CsssMeetingController')->middleware('access:csss');

Route::resource('/webviewer', 'WebviewerController')->middleware('auth');