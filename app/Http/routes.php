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

use App\Http\Requests;
use Illuminate\Http\Request;

//Route::get('/', ['as'   => 'home_root', 'uses' => 'HomeController@index']);
Route::get('/', function()
{
    return Redirect::route('home');
});

Route::get('/home', function()
{
    return Redirect::route('home');
});

Route::get('/', ['as'   => 'home', 'uses' => 'HomeController@index']);

Route::get('/cine/', ['as'   => 'cinema', 'uses' => 'MainControllers\CinemaController@index']);

Route::get('/programacion/', ['as'   => 'pro', 'uses' => 'MainControllers\ProgrammationController@index']);

Route::get('/staff/', ['as'   => 'staff', 'uses' => 'MainControllers\StaffController@index']);

Route::get('/fotos/', ['as'   => 'photos', 'uses' => 'MainControllers\PhotosController@index']);

Route::get('/los20/', ['as'   => 'the20', 'uses' => 'MainControllers\The20Controller@index']);

Route::get('/alfombrarosa/', ['as'   => 'pink_carpet', 'uses' => 'MainControllers\PinkCarpetController@index']);

Route::get('/articulo/{articulo_id}', ['as'   => 'article_one', 'uses' => 'HomeController@article_one']);

Route::get('/contenido/{category}/{subcategory}', ['as'   => 'content', 'uses' => 'MainControllers\ContentController@index']);

Route::get('/videos/', ['as'   => 'videos', 'uses' => 'MainControllers\VideosController@index']);
//Route::get('/videos_ajax/', ['as'   => 'pink_carpet_ajax', 'uses' => 'MainControllers\PinkCarpetController@index_ajax']);
Route::post('/formulario/{categorya}', 'MainControllers\FormularioController@store');
Route::get('/response/{category}/{subcategory}/{mensaje}', ['as'   => 'content', 'uses' => 'MainControllers\ContentController@indexmns']);
