@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card ">
                    <div class="card-header d-flex justify-content-between">
                        <p>All To-Do List here</p>
                        <a href="{{route('todo.create')}}">
                            <i class=" fa fa-plus-circle"></i>
                        </a>

                    </div>
                    <x-alert/>
                    @forelse($todos as $todo)
                        <div class="card-body d-flex justify-content-between py-2">
                            @if($todo->completed>0)
                                <div>
                               <span style="cursor: pointer" onclick="event.preventDefault();document.getElementById
                                   ('todo-incomplete-{{$todo->id}}').submit()"
                                     class="text-success fa
                           fa-check-square"></span>
                                    <form id="todo-incomplete-{{$todo->id}}"
                                          action="{{route('todo.incomplete',$todo->id)}}"
                                          method="post">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </div>
                            @else
                                <div>
                                <span
                                    onclick="event.preventDefault();document.getElementById('todo-complete-{{$todo->id}}').submit();"
                                    class="text-dark fa fa-check-square" style="cursor: pointer"></span>
                                    <form class="display:none" action="{{route('todo.complete',$todo->id)}}"
                                          id="todo-complete-{{$todo->id}}" method="post">
                                        @csrf
                                        @method('PATCH')
                                    </form>
                                </div>
                            @endif
                            <div>
                                @if($todo->completed>0)
                                    <p style="text-decoration: line-through;">{{$todo->title}}</p>
                                @else
                                    <a href="{{route('todo.show',$todo->id)}}">
                                        <p>{{$todo->title}}</p>
                                    </a>
                                @endif
                            </div>
                            <div class="">
                                <a href="{{route('todo.edit',$todo->id)}}" class=" pr-3"><i class="text-black-50 fa
                                fa-pen"></i></a>
                                <span style="cursor: pointer" onclick="event.preventDefault();document.getElementById
                                    ('todo-destroy-{{$todo->id}}').submit()"
                                      class="text-danger fa
                                fa-trash"></span>

                                <form id="todo-destroy-{{$todo->id}}" action="{{route('todo.destroy',$todo->id)}}"
                                      method="post">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </div>
                        </div>
                    @empty
                        <p class="p-4">No Task Available Create One</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
@endsection
