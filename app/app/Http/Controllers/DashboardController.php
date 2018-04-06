<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App;
use LaravelLocalization;


class DashboardController extends Controller
{

    /**
     * Constructor
     *
     * Set the current language using LaravelLocalization
     *
     */
    public function __construct(){

        $this->middleware(['auth', '2fa']);

        App::setLocale(LaravelLocalization::getCurrentLocale());
        // echo '<br>LaravelLocalization::getCurrentLocale(): ' . LaravelLocalization::getCurrentLocale();

    }

    /**
     * Display the dashboard view
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard(Request $request){

        return view('auth.dashboard');

    }

}
