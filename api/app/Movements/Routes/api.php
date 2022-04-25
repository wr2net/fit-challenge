<?php

Route::get('movements', 'MovementController@index')
    ->name('movements.index');

Route::post('movements', 'MovementController@store')
    ->name('movements.store');

Route::get('movements/{movement}', 'MovementController@show')
    ->name('movements.show');

Route::put('movements/{movement}', 'MovementController@update')
    ->name('movements.update');

Route::delete('movements/{movement}', 'MovementController@destroy')
    ->name('movements.delete');
