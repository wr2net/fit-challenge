<?php

Route::get('movements', 'MovementController@index')
    ->name('movements.index');

Route::post('movements', 'MovementController@store')
    ->name('movements.store');

Route::get('movements/{movement_id}', 'MovementController@show')
    ->name('movements.show');

Route::put('movements/{movement_id}', 'MovementController@update')
    ->name('movements.update');

Route::delete('movements/{movement_id}', 'MovementController@destroy')
    ->name('movements.delete');
