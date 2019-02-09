<?php

$this->group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => 'auth'], function () {
    $this->any('products/search', 'ProductController@search')->name('products.search');
    $this->resource('products', 'ProductController');

    $this->any('categories/search', 'CategoryController@search')->name('categories.search');
    $this->resource('categories', 'CategoryController');

    $this->get('/', 'DashboardController@index')->name('admin');
});

Auth::routes(['register' => false]);

Route::get('/', 'SiteController@index');
