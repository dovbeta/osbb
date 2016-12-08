<?php

Route::group([
    'prefix'     => 'building',
    'namespace'  => 'Building',
], function() {

	/**
	 * Flats Management
	 */
    Route::group(['namespace' => 'Flat'], function() {
            Route::resource('flat', 'FlatController', ['except' => ['show']]);
        /**
         * For DataTables
         */
        Route::get('flat/{flat}/view', 'FlatController@view')->name('admin.building.flat.view');
        Route::get('flat/{flat}/users', 'FlatController@users')->name('admin.building.flat.users');
        Route::patch('flat/{flat}/users', 'FlatController@linkUsers')->name('admin.building.flat.link_users');
        Route::get('flat/get', 'FlatController@get')->name('admin.building.flat.get');
        Route::get('flats/export', 'FlatController@export')->name('admin.building.flats.export');
        Route::get('flats/import', 'FlatController@import')->name('admin.building.flats.import');
        Route::post('flats/import', 'FlatController@postImport');
    });
});