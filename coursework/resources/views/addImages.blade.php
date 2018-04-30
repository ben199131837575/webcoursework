@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
          @if ($addedimage->added)
            <div class="card">
                <div class="card-header">{{'image added!'}}</div>

                <div class="card-body">
                    {{('You can now add another image!')}}
                </div>
            </div><br>
          @endif

            <div class="card">
                <div class="card-header">{{('Add a new image to this event')}}</div>

                <div class="card-body">

                    <form method="POST" action="{{URL::to('/') . '/addimages/' . $event->id}}" enctype="multipart/form-data">
                        @csrf


                        <div class="form-group row">
                            <label for="picture" class="col-sm-4 col-form-label text-md-right">{{ __('Picture') }}</label>
                            <div class="col-md-6">
                                <input id="picture" class="form-control" type="file" name="picture" accept="image/*" required autofocus/>
                            </div>
                        </div>



                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('submit') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
