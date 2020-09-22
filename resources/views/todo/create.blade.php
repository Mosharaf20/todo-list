@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card ">
                    <div class="card-header d-flex justify-content-between">
                        <h4>Create Your To-Do List</h4>
                        <a href="{{route('todo.index')}}"><i class="fa fa-arrow-left"></i></a>
                    </div>
                    <div class="card-body d-flex justify-content-center">
                        <x-alert/>
                        <form  action="{{route('todo.store')}}" method="post" style="width: 300px">
                            @csrf
                            <input type="text" placeholder="Name" name="title" class="form-control p-1 my-2 ">

                            <textarea class="form-control " rows="3" cols="5"
                                      name="description">Description</textarea>

                            @livewire('step')
                            <button class="btn btn-success my-2" type="submit">Create</button>
                            @if($errors->has('title'))
                                <p class="text-danger ">{{$errors->first('title')}}</p>
                            @endif
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
