<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use Auth;
use Illuminate\Support\Facades\Input;


/**
* This controller handles request to fetch basic event data.
* Either gets all event, or a select few based on certian conditions (filers/owned)
*
* @author
*/
class EventsController extends Controller
{

    /**
    * Returns a view with the data to print all events in the database (limited)
    *
    * @return view
    */
    public function index(){
      return view('/events', array('events'=>Event::all()));
    }

    /**
    * Returns all events created by the requesting organiser
    *
    * @return view
    */
    public function myEvents(){
        return view('/events', array('events'=>Event::where('organiserid', '=', Auth::user()->id)->get()));
    }

    /**
    * Returns a list of events based on a search request.
    *
    * @return view
    */
    public function eventSearch(){

      // if the search button is pressed and no searches have been suggested
      if(!count(Input::all())){
        return index();
      }

      $eventQuery = Event::query();
      if(Input::get('type')){
        $eventQuery->where('type', '=', Input::get('type'));
      }
      if(Input::get('eventname')){
        $eventQuery->orWhere('name', 'like', '%'.Input::get('eventname').'%');
      }
      if(Input::get('tag')){
        $eventQuery->orWhere('tag', 'like', '%'.Input::get('tag').'%');
      }
      if(Input::has('orderby')){
        if(Input::get('orderby') == 'likes'){
          $eventQuery->orderBy('likes', 'desc');
        }else{
          $eventQuery->orderBy(Input::get('orderby'), 'asc');
        }
      }
      $event = $eventQuery->get();
      
      return view('/events', array('events'=>$event));
    }

















}
