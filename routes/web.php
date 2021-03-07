<?php

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
    return view('auth.login');
});

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/post.pegawai','HomeController@post')->name('pegawai.post');
Route::get('/pegawai/cari','HomeController@cari');
Route::get('{pegawai:id}/edit','HomeController@edit')->name('pegawai.edit');
Route::put('{pegawai:id}/update','HomeController@update')->name('pegawai.update');
Route::delete('{pegawai:id}/delete','HomeController@destroy')->name('pegawai.delete');

