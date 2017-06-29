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
Route::get('Mail','TestController@SendMail')->name('user.mail');
Route::get('/inside','AuthController@index')->name('user');
Route::post('/inside','AuthController@login')->name('user.login');

Route::get('/outside','AuthController@logout')->name('user.logout');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/tests', 'TestController@index')->name('tests');
Route::get('/tests/show', 'TestController@AllIndex')->name('tests.all');
Route::post('/tests/add', 'TestController@add')->name('test.add');
Route::post('/tests/delete', 'TestController@delete')->name('test.delete');
Route::post('/tests/update', 'TestController@update')->name('test.update');
Route::post('/tests/saveUpdate', 'TestController@saveUpdate')->name('test.saveUpdate');
