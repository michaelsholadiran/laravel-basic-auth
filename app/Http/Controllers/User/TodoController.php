<?php

namespace App\Http\Controllers\User;

use App\Models\Todo;


use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.todo.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'date' => ['required']
        ]);

        $todo = new Todo;
        $todo->title = $request->title;
        $todo->date = $request->date;
        $todo->user_id = auth()->user()->id;
        $todo->save();

        return back()->with(['status'=>1]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $todo=Todo::where(['user_id'=>auth()->user()->id,'id'=>$id])->first();
        return view('user.todo.edit',compact('todo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'date' => ['required']
        ]);

        $todo = Todo::find($id);
        $todo->title = $request->title;
        $todo->date = $request->date;
        $todo->save();

        return back()->with(['status'=>1]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
             Todo::find($id)->delete();
        

         return back()->with(['status'=>1]);
    }
}
