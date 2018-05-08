<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;

class EmailController extends Controller
{
    
    public function send(Request $request){

      $title = $request->input('title');
      $content = $request->input('content');

      // Mail::send('emails.send', ['title' => $title, 'content' => $content], function ($message)
      Mail::send('emails.send', ['title' => 'Test Laravel Email', 'content' => 'Message body content here'], function ($message)
      {

          $message->from('noreply@hi-hatconsulting.com', 'Laravel Docker Bootstrap');
          $message->to('turner.mike@gmail.com');
          $message->subject('Test Message Subject');

      });

      return response()->json(['message' => 'Request completed']);      

    }

}
