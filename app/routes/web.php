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

// use Illuminate\Http\Request;

Auth::routes();

// get requests
Route::get('/', ['as' => 'index', 'uses' => 'StaticController@index']);
// Route::get('/{locale}', ['as' => 'index', 'uses' => 'StaticController@index']);
Route::get('/{locale}/about', ['as' => 'about', 'uses' => 'StaticController@about']);
// Route::get('/{locale}/contact', ['as' => 'contact', 'uses' => 'StaticController@contact']);
// Route::get('/{locale}/foundationtest', ['as' => 'foundationtest', 'uses' => 'StaticController@foundationtest']);
// Route::get('/{locale}/submit', ['as' => 'submit', 'uses' => 'StaticController@submit']);

// secure pages
Route::get('/dashboard', [
    'middleware'    => ['auth'],
    'uses'          => function(){
        return view('auth.dashboard');
        // echo 'authenticated';
    }
]);

// post requests
Route::post('/{locale}/submit', ['as' => 'submit', 'uses' => 'FormController@submit']);


