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

Route::get('/set_language/{lang}', 'Controller@setLanguage')->name('set_language');

Auth::routes([
    'register' => false,
]);
// Auth::routes();



Route::get('/', 'SumaController@index')->name('home');
Route::get('/servicios', 'SumaController@servicios')->name('suma.servicios');
Route::get('/equipo', 'SumaController@equipo')->name('suma.equipo');
Route::get('/clientes', 'SumaController@clientes')->name('suma.clientes');
Route::get('/contacto', 'SumaController@contacto')->name('suma.contacto');
Route::get('/politica', 'SumaController@politica')->name('suma.politica');

Route::group(['middleware' => ['auth'], 'prefix' => 'erp'], function () {
    Route::get('/', 'ErpController@index')->name('erp.index');

    Route::group(['prefix' => 'empresas'], function () {
        Route::get('/', 'EmpresaController@index')->name('empresas.index');
        Route::get('/create', 'EmpresaController@create')->name('empresas.create');
        Route::get('/{slug}', 'EmpresaController@show')->name('empresas.show');
        Route::get('/{slug}/edit', 'EmpresaController@edit')->name('empresas.edit');
        Route::get('/{slug}/destroy', 'EmpresaController@destroy')->name('empresas.destroy');
        Route::get('empresas/search', 'EmpresaController@search')->name('empresas.search');
    });

    Route::resource('user', 'UserController');
    Route::get('profile', 'UserController@profile')->name('user.profile');
    Route::post('profile', 'UserController@update_avatar')->name('user.updateavatar');

    Route::group(['prefix' => 'userEmpresa'], function () {
        Route::get('/empAsoc/{userid}', 'UserEmpresaController@empAsoc');
        Route::get('/empDisp/{userid}', 'UserEmpresaController@empDisp');
        Route::post('/asoc/{userid}/{empid}', 'UserEmpresaController@store');
        Route::delete('disp/{userid}/{userempid}', 'UserEmpresaController@destroy');
    });
    
    Route::resource('genero', 'GeneroController');
    Route::get('generos', 'GeneroController@listing');

});