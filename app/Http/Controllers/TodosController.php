<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;
use Illuminate\Support\Facades\Validator;

class TodosController extends Controller
{
    function index(){
    $todos = Todo::all();
    return view('todos.index', ['todos' => $todos]);
    }

    // function create(Request $request){
    //     Todo::create([
    //         'content' => $request->content
    //     ]);
    //     return redirect('/');
    // }

    // function update(Request $request){
    //     $todo = $request->all();
    //     unset($todo['_token']);
    //     // Todo::where('id',$request->id)->update($todo);
    //     Todo::where('content',$request->content)->update($todo);

    //     return redirect('/');  
    //  }

    function update(Request $request){
        Todo::find($request->id)->update([
            'content'=> $request->content,
        ]);
        return redirect('/');
    }

     function delete(Request $request){
        Todo::find($request->id)->delete();
        return redirect('/');

     }

     function store(Request $request){
        $validator = Validator::make($request->all(), [
            'content' => 'required|min:0|max:20',
        ],
        [
        'content.required' =>'The content must not be greater than 20 characters.'
        ]);  
        if ($validator->fails()) {
            return redirect('/')
            ->withErrors($validator)
                ->withInput();

        } else{
            Todo::create([
                'content' => $request->content
            ]);
            return redirect('/');

        }
    }
}
