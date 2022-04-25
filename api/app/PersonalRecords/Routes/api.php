<?php

Route::get('personalRecords', 'PersonalRecordController@index')
    ->name('personalRecords.index');

Route::post('personalRecords', 'PersonalRecordController@store')
    ->name('personalRecords.store');

Route::get('personalRecords/{personalRecord_id}', 'PersonalRecordController@show')
    ->name('personalRecords.show');

Route::put('personalRecords/{personalRecord_id}', 'PersonalRecordController@update')
    ->name('personalRecords.update');

Route::delete('personalRecords/{personalRecord_id}', 'PersonalRecordController@destroy')
    ->name('personalRecords.delete');
