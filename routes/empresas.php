<?php
    Route::get('/', 'EmpresaController@index')->name('empresas.index');
    Route::get('/create', 'EmpresaController@create')->name('empresas.create');
    Route::get('/{slug}', 'EmpresaController@show')->name('empresas.show');
    Route::get('/{slug}/edit', 'EmpresaController@edit')->name('empresas.edit');
    Route::get('/{slug}/destroy', 'EmpresaController@destroy')->name('empresas.destroy');
    Route::get('empresas/search', 'EmpresaController@search')->name('empresas.search');
