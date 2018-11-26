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



Auth::routes();
Route::get('/{url}', 'HomeController@index')->where('url', '(/|home|)');;

Route::post('upload', 'UploadController@upload')->name('upload');
Route::get('/my-uploads','UploadController@show_all');
Route::get('/delete-file/{id}', 'UploadController@delete');
// Admin Route

Route::get('/admin/users', ['uses'=>'AdminController@index','as'=>'userinfo','middleware'=>'roles','roles'=>'admin']);
Route::get('/admin/uploads-info', ['uses'=>'AdminController@show_info','as'=>'uploadsinfo','middleware'=>'roles','roles'=>'admin']);
Route::get('/admin/forward-file/{id}', ['uses'=>'AdminController@forward_file','as'=>'forward','middleware'=>'roles','roles'=>'admin']);
Route::get('/admin/make-manger/{id}', ['uses'=>'AdminController@make_manger','as'=>'make-manger','middleware'=>'roles','roles'=>'admin']);

//manger
Route::get('/manger/files-list', ['uses'=>'MangerController@index','as'=>'files-list','middleware'=>'roles','roles'=>['admin','manger']]);





