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

        $all_results = User::search('Mike')->get(10);

        $all_emails = array();

        foreach($all_results as $result){

            // echo '<pre>';
            // var_dump($result->email);
            // echo '</pre>';

            array_push($all_emails, $result->email);

        }

        // echo '<pre>';
        // var_dump($all_emails);
        // echo '</pre>';

        return view('home')
                ->with('search_results', $all_emails);

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
     * Display the foundation test view
     *
     * @return \Illuminate\Http\Response
     */
    public function foundationtest(Request $request){

        return view('foundation-test');

    }

}
