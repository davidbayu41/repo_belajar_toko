<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::post('/register', 'UserController@register');
Route::post('/login', 'UserController@login');

Route::group(['middleware' => ['jwt.verify']], function ()
{
	Route::group(['middleware' => ['api.superadmin']], function ()
	{
		Route::delete('/siswa/{id}', 'SiswaController@destroy');
	}};	

	Route::group(['middleware' => ['api.admin']], function ()
	{	
		Route::post('/kelas', 'KelasController@store');

		Route::post('/siswa', 'SiswaController@store');
		Route::put('/siswa/{id}', 'SiswaController@update');
	}};	

	Route::get('/kelas', 'KelasController@show');
	
	Route::get('/siswa', 'KelasController@show');
	Route::get('/siswa/{id}', 'KelasController@detail');
	
	
});