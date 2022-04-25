<?php

Route::get('personals', 'PersonalController@index')
    ->name('personals.index');

Route::post('personals', 'PersonalController@store')
    ->name('personals.store');

Route::get('personals/{personal}', 'PersonalController@show')
    ->name('personals.show');

Route::put('personals/{personal}', 'PersonalController@update')
    ->name('personals.update');

Route::delete('personals/{personal}', 'PersonalController@destroy')
    ->name('personals.delete');
