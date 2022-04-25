<?php

Route::get('personalRecords', 'PersonalRecordController@index')
    ->name('personalRecords.index');

Route::post('personalRecords', 'PersonalRecordController@store')
    ->name('personalRecords.store');

Route::get('personalRecords/{personalRecord}', 'PersonalRecordController@show')
    ->name('personalRecords.show');

Route::put('personalRecords/{personalRecord}', 'PersonalRecordController@update')
    ->name('personalRecords.update');

Route::delete('personalRecords/{personalRecord}', 'PersonalRecordController@destroy')
    ->name('personalRecords.delete');
