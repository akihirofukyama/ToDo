<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;

class TodosController extends Controller
{
    function index(){
    $todos = Todo::all();
    return view('todos.index', ['todos' => $todos]);
    }

    function create(Request $request){
        Todo::create([
            'content' => $request->content
        ]);
        return redirect('/');
    }

    function update(Request $request,$id){
       $todo = $request->all();
       unset($todo['_token']);
       Todo::where('id',$request->id)->update($todo);
        return redirect('/');   
     }
}
