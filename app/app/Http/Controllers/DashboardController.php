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

    /**
     * Display the 2FA re-authentication view.
     *
     * @return \Illuminate\Http\Response
     */
    public function reauthenticate(Request $request)
    {

        // get the logged in user
        $user = \Auth::user();

        // initialise the 2FA class
        $google2fa = app('pragmarx.google2fa');

        // generate a new secret key for the user
        $user->google2fa_secret = $google2fa->generateSecretKey();

        // save the user
        $user->save();

        // generate the QR image
        $QR_Image = $google2fa->getQRCodeInline(
            config('app.name'),
            $user->email,
            $user->google2fa_secret
        );

        // Pass the QR barcode image to our view.
        return view('google2fa.register', ['QR_Image' => $QR_Image,
                                            'secret' => $user->google2fa_secret,
                                            'reauthenticating' => true
        ]);

    }


}
