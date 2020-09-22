@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card ">
                    <div class="card-header d-flex justify-content-between">
                       <h4> Update Your To-Do List</h4>
                        <a href="{{route('todo.index')}}"><i class="fa fa-arrow-left"></i></a>
                    </div>
                    <x-alert/>
                    <div class="card-body d-flex justify-content-center">
                        <form class="" action="{{route('todo.update',$todo->id)}}"
                              method="post" style="width: 300px">
                            @csrf
                            @method('PUT')
                            <input type="text"  name="title" value="{{$todo->title}}" class="form-control p-1 mr-2
                                ">
                            <textarea class="form-control my-2" rows="3" cols="5"
                                      name="description">{{$todo->description}}</textarea>

                            @livewire('edit-step',['steps'=>$todo->steps])
                            
                            <button class="btn btn-success " type="submit">Update</button>
                            @if($errors->has('title'))
                                <p class="text-danger">{{$errors->first('title')}}</p>
                            @endif
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
