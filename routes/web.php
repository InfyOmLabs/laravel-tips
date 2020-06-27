<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('direct-dump', 'TipsController@directDump');

Route::get('to-base', 'TipsController@toBase');

Route::get('eager-loading', 'TipsController@eagerLoading');

Route::get('combined-where', 'TipsController@combinedWhere');

Route::get('append-to-model', 'TipsController@appendToModel');

Route::get('with-view-data', 'TipsController@withViewData');

Route::get('custom-directive', 'TipsController@customDirective');

Route::get('sub-query', 'TipsController@subQuery');
