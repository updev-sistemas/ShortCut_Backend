<?php

Auth::routes(['register'=>false]);

Route::group(['prefix' => 'dashboard','middleware' => ['auth']], function(){

    Route::resource('user', Dashboard\UserController::class);
    Route::resource('store', Dashboard\StoreController::class);
    Route::resource('link', Dashboard\LinkController::class);
    Route::resource('statistic', Dashboard\StatisticController::class);
    Route::resource('category', Dashboard\CategoryController::class);

    Route::any('/', 'Dashboard\DashboardController@home')->name('dash.start');
});

Route::get('/home', 'Dashboard\DashboardController@home')->name('home');
Route::get('/', 'Dashboard\DashboardController@home');

