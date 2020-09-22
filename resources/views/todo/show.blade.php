@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card ">
                    <div class="card-header d-flex justify-content-between">
                        <h4>Todo Details</h4>
                        <a href="{{route('todo.index')}}"><i class="fa fa-arrow-left"></i></a>
                    </div>
                    <div class="card-body ">
                        <h3>{{$todo->title}}</h3>
                        <p>{{$todo->description}}</p>
                        <h6>Your Follow Below The step</h6>
                        @foreach($todo->steps as $step)
                           <strong>Step {{$loop->index}}:</strong>
                            <h4>{{$step->step}}</h4>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
