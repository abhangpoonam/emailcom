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

Route::get('/login',function(){

    return view('login');
});

Route::post('/login','LoginController@validateForm');
Route::get('/dashboard','DashboardController@index');
Route::get('addemailtemplate','DashboardController@addemailtemplate');
Route::get('/logout','DashboardController@logout');

//task route
Route::get('/addemailtask','TaskController@addemailtask')->name('addemailtask');
Route::get('/SearchEmailTask','TaskController@SearchEmailTask')->name('SearchEmailTask');
Route::post( '/get/categories', 'TaskController@loadcategory' )->name( 'loadcategory' );
Route::post( '/get/subcategories', 'TaskController@loadsubcategory' )->name( 'loadsubcategory' );
Route::post( '/get/templates', 'TaskController@loadtemplate' )->name('loadtemplate' );
Route::post( '/get/userselection', 'TaskController@load_userselection' )->name('load_userselection' );
Route::post( '/get/upload_task_csv', 'TaskController@upload_task_csv' )->name('upload_task_csv' );
Route::post( '/store_task', 'TaskController@store_task' );
Route::get( '/SearchEmailTask_Result', 'TaskController@SearchEmailTask_Result' );
Route::POST('/popup', 'TaskController@getPopup');

