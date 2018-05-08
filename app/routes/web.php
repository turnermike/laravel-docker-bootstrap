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
        Route::get('/',                 ['as' => 'home',                'uses' => 'StaticController@index']);
        Route::get('/home',             ['as' => 'home',                'uses' => 'StaticController@index']);
        Route::get('/about',            ['as' => 'about',               'uses' => 'StaticController@about']);
        Route::get('/contact',          ['as' => 'contact',             'uses' => 'StaticController@contact']);
        Route::get('/foundationtest',   ['as' => 'foundationtest',      'uses' => 'StaticController@foundationtest']);

        // 2fa - registration
        Route::get('/complete-registration', 'Auth\RegisterController@completeRegistration');
        // 2fa - login
        Route::post('/2fa', function () {
            return redirect(URL()->previous());
        })->name('2fa')->middleware('2fa');
        // 2fa - successful auth redirects to /2fa, need to add a route for get requests
        Route::get('/2fa',              ['as' => 'dashboard',           'uses' => 'DashboardController@dashboard']);
        // 2fa - reauthentication
        Route::get('/re-authentication', ['as' => 're-authentication',   'uses' => 'DashboardController@reauthenticate']);

        // secure dashboard
        Route::get('/dashboard',        ['middleware' => ['auth'], 'uses' => 'DashboardController@dashboard']);

        // send email
        Route::get('/send', 'EmailController@send');

    }

);


// // post requests
// Route::post('/{locale}/submit', ['as' => 'submit', 'uses' => 'FormController@submit']);


