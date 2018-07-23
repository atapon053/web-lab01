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

Route::get('/', [
    'as' => 'home',
    'uses' => 'TestRelationController@index'
]);

Route::group([
    'prefix' => 'users',
    'as' => 'user.'
], function () {
    Route::post('create', [
       'as' => 'create',
       'uses' => 'TestRelationController@create'
    ]);
});


