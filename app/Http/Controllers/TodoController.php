<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;

class TodoController extends Controller
{
    public function index(){
        $todo = Todo::all();
        return view('todoview.index', ['todo'=>$todo]);
    }

    public function create(){
        return view('todoview.create');
    }
    
    public function store(Request $request){
        // dd($request);
        $data = $request->validate([
            'task' => 'required',
        ]);
        $newTodo = Todo::create($data);
        return redirect(route('todoview.index'));
    }
}
