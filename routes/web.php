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
})->name('/');

Route::get('create/password/{token}', 'UsersController@createPassword')->name('create.password');
Route::post('set/password', 'UsersController@setPassword')->name('set.password');

Auth::routes();
Route::group(['middleware'=>'auth'], function(){
	Route::get('/home', 'HomeController@index')->name('home');

	/*
	|--------------------------------------------------------------------
	|Roles Routes
	|--------------------------------------------------------------------
	*/
	Route::resource('roles', 'RolesController');

	/*
	|--------------------------------------------------------------------
	|Permissions Routes
	|--------------------------------------------------------------------
	*/
	Route::resource('permissions', 'PermissionsController');

	/*
	|--------------------------------------------------------------------
	|Users Routes
	|--------------------------------------------------------------------
	*/
	Route::resource('users', 'UsersController');

});

