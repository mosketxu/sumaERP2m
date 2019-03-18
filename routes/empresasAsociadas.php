<?php
Route::get('/empAsoc/{userid}', 'UserEmpresaController@empAsoc');
        Route::get('/empDisp/{userid}', 'UserEmpresaController@empDisp');
        Route::post('/asoc', 'UserEmpresaController@store')->name('empresa.asoc');
        Route::delete('/disp', 'UserEmpresaController@destroy');
