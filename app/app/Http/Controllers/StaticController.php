<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App;
use LaravelLocalization;
use App\User;


class StaticController extends Controller
{

    /**
     * Constructor
     *
     * Set the current language using LaravelLocalization
     *
     */
    public function __construct(){

        App::setLocale(LaravelLocalization::getCurrentLocale());
        // echo '<br>LaravelLocalization::getCurrentLocale(): ' . LaravelLocalization::getCurrentLocale();

    }


    /**
     * Display the home page view
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){

        return view('home');

    }


    /**
     * Display the program overview view
     *
     * @return \Illuminate\Http\Response
     */
    public function about(Request $request){

        return view('about');

    }


    /**
     * Display the contact view
     *
     * @return \Illuminate\Http\Response
     */
    public function contact(Request $request){

        return view('contact');

    }


    /**
     * Display the dashboard view
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard(Request $request){

        return view('auth.dashboard');

    }

    /**
     * Generate an HTML table from database
     *
     * Laravel package: https://github.com/lloricode/laravel-html-table
     *
     * @return \Illuminate\Http\Response
     */
    public function html_table_demo(Request $request){

        $table_data = \App\User::getRepsPointsTransactions();

        $table_headers = [
            'ID', 'Name', 'Email', 'Created At', 'Updated At'
        ];

        $table_attributes = 'class="users-table"';

        return view('html-table')
                ->with('table_headers', $table_headers)
                ->with('table_attributes', $table_attributes)
                ->with('table_data', $table_data->items())
                ->with('all_table_data', $table_data);


    }

    /**
     * Display the foundation test view
     *
     * @return \Illuminate\Http\Response
     */
    public function foundationtest(Request $request){

        return view('foundation-test');

    }

}
