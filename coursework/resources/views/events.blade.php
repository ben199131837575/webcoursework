@extends('layouts.app')

@section('content')



    <div class="card-body bg-light">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

          <div class="card bg-light text-dark border-dark">
              <div class="card-header">Search filter</div>
            <div class="card-body bg-light">
    <form method="POST" action="{{ route('searchevents') }}">
        @csrf


        <div class="form-group row">
            <label for="type" class="col-sm-4 col-form-label text-md-right">{{ __('Event Type') }}</label>
            <div class="col-md-6">
                <select id="type" name="type" class="form-control">
                  <option value="" selected disabled hidden>{{'Pick option'}}</option>
                  <option value="other">{{ __('Other') }}</option>
                  <option value="sport">{{ __('Sport') }}</option>
                  <option value="culture">{{ __('Culture') }}</option>
                </select>
            </div>
        </div>

        <div class="form-group row">
            <label for="eventdate" class="col-sm-4 col-form-label text-md-right">{{ __('Order By') }}</label>
            <div class="col-md-6">
                <select id="orderby" name="date" class="form-control">
                  <option value="" selected disabled hidden>{{'Pick option'}}</option>
                  <option value="dateandtime">{{ __('Events happening soon') }}</option>
                  <option value="created_at">{{ __('Recently posted events') }}</option>
                  <option value="likes">{{ __('Most Liked') }}</option>
                </select>
            </div>
        </div>

        <div class="form-group row">
            <label for="eventname" class="col-sm-4 col-form-label text-md-right">{{ __('Event Name') }}</label>
            <div class="col-md-6">
                <input id="eventname" type="text" class="form-control" name="eventname" value="">
            </div>
        </div>

        <div class="form-group row">
            <label for="tag" class="col-sm-4 col-form-label text-md-right">{{ __('Search for a tag') }}</label>
            <div class="col-md-6">
                <input id="tag" type="text" class="form-control" name="tag" value="">
            </div>
        </div>

        <div class="form-group row mb-0">
            <div class="col-md-8 offset-md-4">
                <button type="submit" class="btn btn-primary">
                    {{ __('Search') }}
                </button>
            </div>
        </div>

    </form>

</div></div></div></div></div><br><br><br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">


            @foreach($events as $event)
            <a name="anchor{{$event->id}}" href="{{URL::to('/')}}/viewevent/{{$event->id}}" style="text-decoration:none !important; color: black; text-decoration:none;">

            <div class="card bg-light text-dark border-dark">
                <div class="card-header">{{$event->name}}</div>

                <div class="card-body bg-light">
                  <img class="bg-light card-img-top" src="data:image/*;base64,{{$event->picture}}" >

                </div>

                <ul class="list-group list-group-flush">
                 <li class="list-group-item ">
                   <p class="card-text">{{'Time and date?  '}}{{$event->dateandtime}}</p>
                 </li>
                 <li class="list-group-item " >
                   <p class="card-text">{{'Where?  '}}{{$event->location}}</p>
                 </li>
                 <li class="list-group-item ">
                   <p class="card-text">{{'What type of event?  '}}{{$event->type}}</p>
                 </li>
               </ul>

                <div class="bg-light card-footer text-muted">
                  <a href="{{route('likebutton', $event->id)}}" class="btn btn-primary">{{'Likes  '}} {{$event->likes}}</a>
                </div>
            </div></a><br><br>
            @endforeach
        </div>
    </div>
</div>
@endsection
