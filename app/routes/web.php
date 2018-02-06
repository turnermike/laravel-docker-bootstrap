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

use Illuminate\Http\Request;

// home/landing page
Route::get('/', ['as' => 'index', 'uses' => 'StaticController@index']);
Route::get('/{locale}', ['as' => 'index', 'uses' => 'StaticController@index']);
Route::get('/{locale}/program-overview', ['as' => 'program-overview', 'uses' => 'StaticController@programOverview']);
Route::get('/{locale}/contact', ['as' => 'contact', 'uses' => 'StaticController@contact']);
Route::get('/{locale}/foundationtest', ['as' => 'foundationtest', 'uses' => 'StaticController@foundationtest']);
Route::get('/{locale}/submit', ['as' => 'submit', 'uses' => 'StaticController@submit']);

Route::post('/{locale}/submit', ['as' => 'submit', 'uses' => 'FormController@submit']);

Auth::routes();
