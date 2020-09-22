<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoCreateRequest;
use App\Step;
use App\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('index');
    }

    public function index(){
        $todos = auth()->user()->todos()->orderBy('completed')->get();
        return view('todo.index',compact('todos'));
    }

    public function create(){
        return view('todo.create');
    }

    public function store(TodoCreateRequest $request){

        $todo = auth()->user()->todos()->create($request->all());
       if($request->items)
       {
           foreach ($request->items as $item){
               $todo->steps()->create(['step'=>$item]);
           }
       }
        return redirect(route('todo.index'))->with('message','Todo Created Successfully');
    }

    public function show(Todo $todo){
        return view('todo.show',compact('todo'));
    }

    public function edit(Todo $todo){
        return view('todo.edit',compact('todo'));
    }

    public function update(Request $request,Todo $todo){
        $todo->update(['title'=>$request['title']]);

        if ($request->stepName) {
            foreach ($request->stepName as $key => $value) {
                $id = $request->stepID[$key];
                if (!$id) {
                    $todo->steps()->create(['step' => $value]);
                } else {
                    $step = Step::find($id);
                    $step->update(['step' => $value]);
                }
            }
        }
        return redirect()->back()->with('message','Todo List Updated Successfully');
    }

    public function destroy(Todo $todo){
        $todo->steps->each->delete();
        $todo->delete();
        return redirect()->back()->with('message','Todo List Deleted Successfully');
    }

    public function complete(Request $request,$id)
    {
        $todoID = Todo::findOrFail($id);
        $todoID->update(['completed' =>true]);
        return redirect(route('todo.index'))->with('message','Marked Success');
    }

    public function incomplete(Request $request,$id)
    {
        $todoId =Todo::findOrFail($id);
        $todoId->update(['completed' =>false]);
        return redirect(route('todo.index'))->with('message','Unmarked Success');
    }
}
