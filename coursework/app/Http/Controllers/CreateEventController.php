<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gate;
use App\Event;
use App\User;
use App\EventImage;
use Illuminate\Support\Facades\Input;
use Auth;

/*
* This class handles requests to not only create events, but also to update/edit
* existing ones.
*
*/
class CreateEventController extends Controller
{

    /**
    * Returns the a form to the user allowing them to create an event.
    */
    public function index(){
      if(Gate::denies('create_event')){
        return view('/notOrganiser');
      }
      $event = null;
      return view('/createEvent', array('event'=>$event));
    }

    /**
    * Uses posted data to build a new event from a request sent from
    * the create event form. A message will be returned telling the user
    * that their event has been saved.
    */
    public function createNewEvent(){
      if(Gate::denies('create_event')){
        return view('/notOrganiser');
      }

        $Event = new Event;
        $Event->name = Input::get('event-name');
        $Event->description = Input::get('description');
        $Event->dateandtime = Input::get('date') . " " . Input::get('time');
        $Event->likes = 0;
        $Event->type = Input::get('type');
        $Event->tag = Input::get('tags');

        $Event->picture = base64_encode(file_get_contents(Input::file('picture')->getRealPath()));

        $Event->location = Input::get('location');
        $Event->organiserid = Auth::user()->id;
        $Event->save();
        return view('eventsubmitted');
    }

    /*
    * This function takes an event id as a parameter and uses it to fetch all
    * all the data related to that id. It will send it to the create new event
    * form where it will be used to populate some of the different fields
    */
    public function editEvent($eventid){
      if(Gate::denies('create_event')){
        return view('/notOrganiser');
      }else if(Auth::user()->id != Event::find($eventid)->organiserid){
        echo "this is not your event. You cannot edit it.";
      }else{
        $event = Event::find($eventid);
        return view('/createEvent', array('event'=>$event));
      }


    }

    public function addImages($eventid){
      $addedimage = (object) array('added'=>0);
      $event = Event::find($eventid);
      if(!count(Input::all())){
        return view('/addImages', array('event'=>$event, 'addedimage'=>$addedimage));
      }

      if(Gate::denies('create_event')){
        return view('/notOrganiser');
      }else if(Auth::user()->id != $event->organiserid){
        echo "this is not your event. You cannot edit it.";
      }

      $eventImage = new EventImage;

      $eventImage->eventid=$eventid;
      $eventImage->image = base64_encode(file_get_contents(Input::file('picture')->getRealPath()));
      $eventImage->save();
      $addedimage->added = 1;
      return view('/addImages', array('event'=>$event, 'addedimage'=>$addedimage));

    }



    public function updateEvent($eventid){

      if(Gate::denies('create_event')){
        return view('/notOrganiser');
      }else if(Auth::user()->id != Event::find($eventid)->organiserid){
        echo "this is not your event. You cannot edit it.";
      }else{
        $Event = Event::find($eventid);
        $user = User::find($Event->organiserid);
        $Event->name = Input::get('event-name');
        $Event->description = Input::get('description');
        $Event->dateandtime = Input::get('date') . " " . Input::get('time');
        $Event->type = Input::get('type');
        $Event->tag = Input::get('tags');

        $Event->picture = base64_encode(file_get_contents(Input::file('picture')->getRealPath()));

        $Event->location = Input::get('location');
        $Event->save();

        return view('/viewEvent', array('event'=>$Event),array('organiser'=>$user) );

      }


    }

}
