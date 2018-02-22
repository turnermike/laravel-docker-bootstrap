<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App;
use Lang;
// use App\Recipient;
// use App\Codes;
// use DB;


class StaticController extends Controller
{

    /**
     * Display the home/landing page view
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $locale = null)
    {
        App::setLocale($locale);

        // if(empty($locale)){
        //     return redirect('en-CA');
        // }

        $links = \App\Link::all();

        return view('home', [ 'links' => $links ])
            ->with('locale', $locale);

    }


    /**
     * Display the program overview view
     *
     * @return \Illuminate\Http\Response
     */
    public function about(Request $request, $locale = null)
    {

        App::setLocale($locale);

        return view('about')
            ->with('locale', $locale);

    }


    /**
     * Display the contact view
     *
     * @return \Illuminate\Http\Response
     */
    public function contact(Request $request, $locale = null)
    {

        App::setLocale($locale);

        return view('contact')
            ->with('locale', $locale);

    }


    /**
     * Display the foundation test view
     *
     * @return \Illuminate\Http\Response
     */
    public function foundationtest(Request $request, $locale = null)
    {

        App::setLocale($locale);

        return view('foundation-test')
            ->with('locale', $locale);

    }


    /**
     * Display the submit view
     *
     * @return \Illuminate\Http\Response
     */
    public function submit(Request $request, $locale = null)
    {

        App::setLocale($locale);

        return view('submit')
            ->with('locale', $locale);

    }


}
