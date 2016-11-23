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
        Route::get('flat/get', 'FlatController@get')->name('admin.building.flat.get');
    });
});