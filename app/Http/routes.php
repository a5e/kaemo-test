<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::group(['prefix' => 'api'], function () {
    Route::get(
        'videos',
        'VideosApiController@index',
        ['parameters' => [
            'date' => 'from',
            'date' => 'to',
            'realisator' => 'realisator'
            ]
        ]);

    Route::get('videos/{id}', 'VideosApiController@show')
        ->where('id', '[0-9]+');;
});