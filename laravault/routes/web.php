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



Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index');
Route::get('/about', 'HomeController@about');
Route::get('/contact', 'HomeController@contact');

Auth::routes();

Route::get('/mylaravault', [
    'as'=> 'mylaravault',
    'uses' => 'MyLaravaultController@index'
]);

Route::get('/mylaravault/fileuploadform', [
    'as'=> 'fileUploadForm',
    'uses' => 'MyLaravaultController@showFileUploadForm'
]);

Route::get('/mylaravault/folderuploadform', [
    'as'=> 'folderUploadForm',
    'uses' => 'MyLaravaultController@showFolderUploadForm'
]);


Route::post('/mylaravault/fileupload', [
    'as'=> 'fileUpload',
    'uses' => 'FilesController@Upload'
]);
