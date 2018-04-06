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

// Auth::routes();


Route::group(
    [
        'prefix'        => LaravelLocalization::setLocale(),
        'middleware'    => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ],
    function()
    {

        Auth::routes(); // /login, /logout, /register

        /* localized get requests */
        Route::get('/',                 ['as' => 'home',           'uses' => 'StaticController@index']);
        Route::get('/about',            ['as' => 'about',           'uses' => 'StaticController@about']);
        Route::get('/contact',          ['as' => 'contact',         'uses' => 'StaticController@contact']);
        Route::get('/foundationtest',   ['as' => 'foundationtest',  'uses' => 'StaticController@foundationtest']);

        // 2fa
        Route::get('/complete-registration', 'Auth\RegisterController@completeRegistration');

        // secure dashboard
        Route::get('/dashboard',        ['middleware' => ['auth'], 'uses' => 'StaticController@dashboard']);

    }

);


// // post requests
// Route::post('/{locale}/submit', ['as' => 'submit', 'uses' => 'FormController@submit']);


