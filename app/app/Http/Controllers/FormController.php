<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Redirect;
use Lang;
use Config;
use App;
use Validator;
use DB;

class FormController extends Controller
{


    /**
     * Form submission example
     *
     * @return \Illuminate\Http\Response
     */
    public function submit(Request $request, $locale = '')
    {

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


    }
}
