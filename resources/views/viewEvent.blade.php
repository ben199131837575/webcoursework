@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
          @if(Auth::User())
            @if ($organiser->id == Auth::User()->id && Auth::User()->organiser == 1)
              <a href="{{URL::to('/')}}/editevent/{{$event->id}}" >Edit </a>  or
              <a href="{{URL::to('/')}}/addimages/{{$event->id}}" > add extra event images </a><br><br>
            @endif
          @endif
          <div class="card bg-light text-dark border-dark">
              <div class="card-header">{{$event->name}}</div>

              <div class="card-body bg-light">
                <img class="bg-light card-img-top" src="data:image/*;base64,{{$event->picture}}" width="100">

              </div>

              <ul class="list-group list-group-flush">
               <li class="list-group-item ">
                 <p class="card-text">{{'Time and date?  '}}{{$event->dateandtime}}</p>
               </li>
               <li class="list-group-item" >
                 <p class="card-text">{{'Where?  '}}{{$event->location}}</p>
               </li>
               <li class="list-group-item ">
                 <p class="card-text">{{'What type of event?  '}}{{$event->type}}</p>
               </li>
             </ul>

              <div class="bg-light card-footer text-muted">
                <a href="{{route('likebutton', $event->id)}}" class="btn btn-primary">{{'Likes  '}} {{$event->likes}}</a>
                <a name="anchor{{$event->id}}"></a>
              </div>
          </div></a><br>

          <div class="card bg-light text-dark border-dark">
              <div class="card-header">Description</div>
              <div class="card-body bg-light">
                <p class="card-text">{{$event->description}}</p>
              </div>
          </div></a><br>

          <div class="card bg-light text-dark border-dark">
              <div class="card-header">Organiser contact details</div>
              <div class="card-body bg-light">
                <p class="card-text">{{$organiser->name}}</p>
                <p class="card-text">{{$organiser->phoneno}}</p>
                <a href="mailto:{{$organiser->email}}">{{$organiser->email}}</a><br>
                @if (Auth::user())
                  <a href="{{route('email', $organiser->id)}}">{{'Send email to ' . $organiser->name}}</a>
                @endif
              </div>
          </div></a><br>



          @if(count($images))
          <div class="card bg-light text-dark border-dark">
              <div class="card-header">Event Images</div>
              <ul class="list-group list-group-flush">
                @foreach($images as $image)
                  <li class="list-group-item ">
                    <img class="bg-light card-img-top" src="data:image/*;base64,{{$image->image}}" width="100">
                  </li>
                @endforeach
              </ul>
          </div>
          @endif
        </div>
    </div>
</div>
@endsection
