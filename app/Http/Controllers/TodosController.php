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

    function update(Request $request){
        $todo = $request->all();
        unset($todo['_token']);
        Todo::where('id',$request->id)->update($todo);
        Todo::where('content',$request->content)->update($todo);

        return redirect('/');   
     }

     function delete(Request $request){
        $todo = Todo::find($request->id);
        Todo::find($request->id)->delete();
        return redirect('/');

     }

     function store(Request $request){
         $request->validate([
        'content' => 'required|min:0|max:20',
         ],
         [
         'content.required' =>'The content must not be greater than 20 characters.'
         ]); 
         return redirect('/');   

    }
}
