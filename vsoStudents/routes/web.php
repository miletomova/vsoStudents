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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'HomeController@index');
Route::get('/lectures', 'LecturesController@index')->name('lectures');
Route::get('/profile', 'ProfileController@index')->name('profile');
Route::get('/contacts', 'ContactsController@index');
//Route::get('/user', 'UserController@index');

Route::resource('user', 'UserController');
//Route::resource('course', 'CoursesController');

// Route::get('user/create', 'UserController@create')->name('add_new_user');
// Route::get('user', 'UserController@index')->name('get_all_users');
// Route::get('user/{$id}/edit', 'UserController@edit')->name('edit_user_info');
//Route::get('user/{$id}/edit', 'UserController@edit')->name('edit_user_info');
// Route::get('/user/{user_id}/delete', [
// 			'uses'	=> 'UserController@destroy',
// 			'as'	=> 'delete_user'
// 			]);



//Separated
// Route::group(['middleware' => 'auth'], function () {
// 	Route::get('/home', 'HomeController@index')->name('home');
// 	Route::resource('course', 'CoursesController');
// 	Route::get('user/{user}', 'UserController@show')->name('user_info');	
// 	});

// Route::group(['middleware' => 'admin'], function () {	
// 		Route::get('/home', 'HomeController@index')->name('home');
// 		Route::get('user/create', 'UserController@create')->name('add_new_user');
// 		Route::get('user', 'UserController@index')->name('get_all_users');
// 		Route::get('user/{$id}/edit', 'UserController@edit')->name('edit_user_info');
// 		Route::get('user/{user}', 'UserController@show')->name('user_info');

// 		});
// nested
Route::group(['middleware' => 'auth'], function () {
	Route::get('/home', 'HomeController@index')->name('home');
	Route::resource('course', 'CoursesController');
	Route::get('user/{user}', 'UserController@show')->name('user_info');	
	Route::group(['middleware' => 'admin'], function () {	
		
		Route::get('user/create', 'UserController@create')->name('add_new_user');
		Route::get('user', 'UserController@index')->name('get_all_users');
		Route::get('user/{$id}/edit', 'UserController@edit')->name('edit_user_info');
		
		});
	});


// Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

