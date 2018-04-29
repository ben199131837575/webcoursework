<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use App\Like;
use Auth;
use DB;
use App\User;

/**
* This class represents the controller for the like buttons on the site.
* It will handle the request of a like button being clicked on the site.
*
* @author Ben Owen
*/
class LikeButton extends Controller
{

      /*
      * This function, when called will add a entry to the like table.
      * The entry will include the eventid of the liked event and the user id
      * of the user that liked the event
      */
      public function addLike($eventid){
        //Check that as user is logged in
        if(!Auth::user()){
          return redirect(url()->previous().'#anchor' . $eventid);
        }

        // make sure the event has not been liked prevously by the user.
        $like = DB::table('likes')
          ->where('userid', '=', Auth::user()->id)
          ->where('eventid', '=', $eventid)->get();

        // did the above query return anything
        if(count($like)){
          // if so, go back to the previous page
          return redirect(url()->previous().'#anchor' . $eventid);
        }

        // create and save the new like
        $like = new Like;
        $like->userid = Auth::user()->id;
        $like->eventid = $eventid;
        $like->save();

        // increment the number of likes in the
        $event = Event::find($eventid);
        $event->likes = $event->likes + 1;
        $event->save();
        return redirect(url()->previous().'#anchor' . $eventid);
      }
}
