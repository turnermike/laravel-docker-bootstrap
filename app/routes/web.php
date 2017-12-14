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
Route::get('/{locale}/foundationtest', ['as' => 'foundationtest', 'uses' => 'StaticController@foundationtest']);

// Route::get('/', function () {

//     $links = \App\Link::all();

//     return view('welcome', [ 'links' => $links ]);

// });

Route::get('/foundationtest/', ['as' => 'foundationtest', 'uses' => 'StaticController@foundationtest']);


Route::get('/submit', function () {

    return view('submit');

});

Route::post('/submit', function (Request $request) {

    $data = $request->validate([
        'title' => 'required|max:255',
        'url' => 'required|url|max:255',
        'description' => 'required|max:255'
    ]);

    // using tap method
    /*
    $link = tap(new App\Link($data))->save();
    return redirect('/');
    */

    // not using tap method
    /*
    $link = new App\Link($data);
    $link->save();
    // return $link;
    return redirect('/');
    */

    // prevent mass-assignment
    $link = new App\Link;
    $link->title = $data['title'];
    $link->url = $data['url'];
    $link->description = $data['description'];
    $link->save();
    return redirect('/');


});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
