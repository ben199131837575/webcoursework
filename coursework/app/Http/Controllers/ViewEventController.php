<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use App\User;
use App\EventImage;

/**
* The view event controller is responsible for collecting and passing the relevent data to
* the view - viewEvent so that the user can see all the data related to a event.
*
* @author     Ben Owen
*/
class ViewEventController extends Controller
{

/**
* Takes an event id and uses it to get its rown in the database. That row is then sent, with
* its corresponding images and organiser data.
*
* @param $eventid - the id of an event to be diplayed
* @return View - the view + data to display an event to the user
*/
  public function index($eventid){

    $event = Event::find($eventid);

    $organiser = User::find($event->organiserid);

    $imageQuery = EventImage::query();
    $imageQuery->where('eventid', '=', $eventid);
    $images = $imageQuery->get();

    if($organiser){
      return view('/viewEvent', array('images'=>$images, 'event' => $event, 'organiser'=>$organiser));
    }

  }
}
