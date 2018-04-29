@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{('Email organiser')}}</div>

                <div class="card-body">

                    <form method="POST" action="{{route('sendEmail')}}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-sm-4 col-form-label text-md-right">{{ ('Send to ' . $organiser->name) }}</label>
                            <div class="col-md-6">
                                <input id="email" type="text" class="form-control" name="email" value="{{$organiser->email}}" required autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="from" class="col-sm-4 col-form-label text-md-right">{{ ('From') }}</label>
                            <div class="col-md-6">
                                <input id="from" type="text" class="form-control" name="from" value="{{$user->email}}" required autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="subject" class="col-sm-4 col-form-label text-md-right">{{ 'Subject' }}</label>
                            <div class="col-md-6">
                                <input id="subject" type="text" class="form-control" name="email"  required autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="message" class="col-sm-4 col-form-label text-md-right">{{ 'Message' }}</label>
                            <div class="col-md-6">
                                <textarea cols="35" rows="6" id="message" type="text" class="form-control" name="message" value="" required autofocus>
                                </textarea>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Send') }}
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
