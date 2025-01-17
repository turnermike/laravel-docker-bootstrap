<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;

class EmailController extends Controller
{
    
    public function sendTestMessage(Request $request){

      $title = $request->input('title');
      $content = $request->input('content');

      // Mail::send('emails.send', ['title' => $title, 'content' => $content], function ($message)
      Mail::send('emails.test-message', ['title' => 'Test Laravel Email', 'content' => 'Message body content here'], function ($message)
      {

          $message->from('noreply@hi-hatconsulting.com', 'Laravel Docker Bootstrap');
          $message->to('turner.mike@gmail.com');
          $message->subject('Test Message Subject');

          // // additional properties
          // $message->sender($address, $name = null);
          // $message->cc($address, $name = null);
          // $message->bcc($address, $name = null);
          // $message->replyTo($address, $name = null);
          // $message->priority($level);
          // $message->attach($pathToFile, array $options = []);          

      });

      return response()->json(['message' => 'Request completed']);      

    }

}
