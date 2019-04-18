<?php

Route::group(['prefix' => 'reports', 'namespace' => 'Api'], function () {
    Route::get('months', 'ReportsApiController@months');
    // Route::get('years', 'ReportsApiController@years');
});
// http://virtualhost/api/reports/months
