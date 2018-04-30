@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Is Emacs the greatest text editor? Answer correctly to become an organiser</div>

                <div class="card-body">
                    <a href="{{route('becomeorganiser')}}" class="btn btn-primary">Yes</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
