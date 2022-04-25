<?php

Route::get('personals', 'PersonalController@index')
    ->name('personals.index');

Route::post('personals', 'PersonalController@store')
    ->name('personals.store');

Route::get('personals/{personal_id}', 'PersonalController@show')
    ->name('personals.show');

Route::put('personals/{personal_id}', 'PersonalController@update')
    ->name('personals.update');

Route::delete('personals/{personal_id}', 'PersonalController@destroy')
    ->name('personals.delete');
