<?php

$this->group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => 'auth'], function () {

    // Reports
    $this->get('reports/vue', 'ReportsController@vue')->name('reports.vue');
    $this->get('reports/years', 'ReportsController@year')->name('reports.year');
    // $this->get('reports/months', 'ReportsController@months')->name('reports.months');
    $this->get('reports/months', 'ReportsController@months2')->name('reports.months');

    $this->any('users/search', 'UserController@search')->name('users.search');
    $this->resource('users', 'UserController');

    $this->any('products/search', 'ProductController@search')->name('products.search');
    $this->resource('products', 'ProductController');

    $this->any('categories/search', 'CategoryController@search')->name('categories.search');
    $this->resource('categories', 'CategoryController');

    $this->get('/', 'DashboardController@index')->name('admin');
});

Auth::routes(['register' => false]);

Route::get('/', 'SiteController@index');
