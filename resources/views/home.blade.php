@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Dashboard</div>
                <div class="card-body">
                    <p>My name: {{Auth::user()->name}}</p>
                    <p>My Email: {{Auth::user()->email}}</p>
                    <img alt="{{Auth::user()->name}}" src="{{Auth::user()->image}}"/>

                    <x-alert><strong>Whoops!</strong> Something went wrong!</x-alert>
                    <form action="/upload" enctype="multipart/form-data" method="post">
                        @csrf
                        <input type="file" name="avatar">
                        <button class="btn btn-success btn-sm float-right" type="submit">Upload</button>
                    </form>
                    <a href="{{ url('/login/google') }}" class="btn btn-google-plus"> Google</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
