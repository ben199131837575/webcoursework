<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use App\User;

class becomeorganiser extends Controller
{
    public function becomeorganiser(){
      $user = Auth::user();
      $user->organiser = 1;
      $user->save();
      $message['title'] = "success!";
      $message['message'] = "You are now an event organiser. You now have access the oragnisers control panel in your navigation bar!";

      return view('message', array('message'=>$message));
    }
}
