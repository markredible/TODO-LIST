<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;

class TodoController extends Controller
{
    public function index(){
        $todos = Todo::all();
        return view('todo.index', ['todos'=>$todos]);
    }

    public function create(){
        return view('todo.index');
    }
    
    public function store(Request $request){
        // dd($request);
        $data = $request->validate([
            'task' => 'required',
        ]);
        $newTodo = Todo::create($data);
        return redirect(route('todo.index'));
    }

    public function destroy(Todo $todo){
        $todo->delete();
        return redirect(route('todo.index'))->with('success', 'Product Deleted Successfully!');
    }
}
