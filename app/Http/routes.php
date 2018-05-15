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

Route::get('/', ['as'   => 'home', 'uses' => 'HomeController@index']);

Route::get('/cine/', ['as'   => 'cinema', 'uses' => 'MainControllers\CinemaController@index']);
Route::get('/programacion/', ['as'   => 'pro', 'uses' => 'MainControllers\ProgrammationController@index']);
Route::get('/staff/', ['as'   => 'staff', 'uses' => 'MainControllers\StaffController@index']);
Route::get('/fotos/', ['as'   => 'photos', 'uses' => 'MainControllers\PhotosController@index']);
Route::get('/los20/', ['as'   => 'the20', 'uses' => 'MainControllers\The20Controller@index']);

Route::get('/articulo/{articulo_id}', ['as'   => 'article_one', 'uses' => 'HomeController@article_one']);
