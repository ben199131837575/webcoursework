<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\User;
use Auth;

/**
* This controller handles request from the user to send emails to organiser
*
* @author Ben Owen
*/
class EmailClient extends Controller
{
    /**
    * Returns a form (view) for the user to fill in the email the organiser
    */
    public function emailOrganiser($organiserid){
      return view('emailForm', array('organiser'=>User::find($organiserid)), array('user'=>Auth::user()));
    }

    /**
    * This function can have email related data posted to it from an email form
    *
    * @return view - a message telling the user if their email was sent
    */
    public function sendEmail(){

      // collect all the posted data
      $to = Input::get('email');
      $from = Input::get('from');
      $emailMessage = wordwrap(Input::get('email'), 70);
      $subject = Input::get('subject');

      // attempt to send the message and store any errors/messages
      $mail = mail($to,$subject,$emailMessage,"From: " . $from);

      // display message to the user - pass/fail
      if($mail){
        $message['title'] = "success!";
        $message['message'] = "Your email has been sent to . $to";
        return view('message', array('message'=>$message));
      }
      $message['title'] = "Failure!";
      $message['message'] = "Your email was not sent";
      return view('message', array('message'=>$message));
    }
}
