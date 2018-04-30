@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{($event == null ? "Create Event" : "Update Event")}}</div>

                <div class="card-body">

                    <form method="POST" action="{{($event == null ? route('create_new_event')  : route('update_event', $event->id))}}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="event-name" class="col-sm-4 col-form-label text-md-right">{{ __('Event Name') }}</label>

                            <div class="col-md-6">
                                <input id="event-name" type="text" class="form-control" name="event-name" value="{{($event == null ? "" : $event->name)}}" required autofocus>

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>

                            <div class="col-md-6">
                                <textarea name="description"  cols="35" rows="4" required>{{($event == null ? "" : $event->description)}}</textarea>
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="date" class="col-sm-4 col-form-label text-md-right">{{ __('Event Date') }}</label>
                            <div class="col-md-6">
                                <input id="date" type="date" class="form-control" name="date" value="{{($event == null ? "" : substr($event->dateandtime, 0, 10))}}" max="2050-01-01" min="<?=date("Y-m-d")?>"required autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="time" class="col-sm-4 col-form-label text-md-right">{{ __('Event Time') }}</label>
                            <div class="col-md-6">
                                <input id="time" type="time" class="form-control" name="time" value="{{($event == null ? "" : substr($event->dateandtime, 11, 15))}}" required autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="location" class="col-sm-4 col-form-label text-md-right">{{ __('Location') }}</label>
                            <div class="col-md-6">
                                <input id="location" type="text" class="form-control" name="location" value="{{($event == null ? "" : $event->location)}}" required autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="type" class="col-sm-4 col-form-label text-md-right">{{ __('Event Type') }}</label>
                            <div class="col-md-6">
                                <select id="type" name="type" class="form-control"  required autofocus>
                                  <option value="" selected disabled hidden>{{'Pick option'}}</option>
                                  <option value="other">{{ __('Other') }}</option>
                                  <option value="sport">{{ __('Sport') }}</option>
                                  <option value="culture">{{ __('Culture') }}</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="picture" class="col-sm-4 col-form-label text-md-right">{{ __('Picture') }}</label>
                            <div class="col-md-6">
                                <input id="picture" class="form-control" type="file" name="picture" accept="image/*" required autofocus/>
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="tags" class="col-sm-4 col-form-label text-md-right">{{ __('Tags') }}</label>
                            <div class="col-md-6">
                                <input id="tags" type="text" class="form-control" name="tags" value="{{($event == null ? "" : $event->tag)}}" placeholder="i.e. swimming music ">
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
