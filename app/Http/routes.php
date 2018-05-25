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

//Route::get('/', ['as'   => 'home_root', 'uses' => 'HomeController@index']);
Route::get('/', function()
{
    return Redirect::route('home');
});

Route::get('/home', ['as'   => 'home', 'uses' => 'HomeController@index']);
Route::get('/home_ajax', ['as'   => 'home_ajax', 'uses' => 'HomeController@index_ajax']);

Route::get('/cine/', ['as'   => 'cinema', 'uses' => 'MainControllers\CinemaController@index']);

Route::get('/programacion/', ['as'   => 'pro', 'uses' => 'MainControllers\ProgrammationController@index']);
Route::get('/programacion_ajax/', ['as'   => 'pro_ajax', 'uses' => 'MainControllers\ProgrammationController@index_ajax']);

Route::get('/staff/', ['as'   => 'staff', 'uses' => 'MainControllers\StaffController@index']);
Route::get('/staff_ajax/', ['as'   => 'staff_ajax', 'uses' => 'MainControllers\StaffController@index_ajax']);

Route::get('/fotos/', ['as'   => 'photos', 'uses' => 'MainControllers\PhotosController@index']);

Route::get('/los20/', ['as'   => 'the20', 'uses' => 'MainControllers\The20Controller@index']);
Route::get('/los20_ajax/', ['as'   => 'the20_ajax', 'uses' => 'MainControllers\The20Controller@index_ajax']);

Route::get('/alfombrarosa/', ['as'   => 'pink_carpet', 'uses' => 'MainControllers\PinkCarpetController@index']);
Route::get('/alfombrarosa_ajax/', ['as'   => 'pink_carpet_ajax', 'uses' => 'MainControllers\PinkCarpetController@index_ajax']);

Route::get('/articulov/{articulo_id}', ['as'   => 'article_one', 'uses' => 'HomeController@article_one']);
Route::get('/articulo_ajax/{articulo_id}', ['as'   => 'article_one_ajax', 'uses' => 'HomeController@article_one_ajax']);

Route::get('/contenido/{category}/{subcategory}/articulo', ['as'   => 'content', 'uses' => 'MainControllers\ContentController@index']);
Route::get('/contenido/{category}/{subcategory}/ajax', ['as'   => 'content_ajax', 'uses' => 'MainControllers\ContentController@index_ajax']);
