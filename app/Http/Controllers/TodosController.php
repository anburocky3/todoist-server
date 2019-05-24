<?php

namespace App\Http\Controllers;

use App\Todos;
use Illuminate\Http\Request;

class TodosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $todos = Todos::where('user_id', auth()->user()->id)->get();
        return $todos;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $data = $request->validate([
            'title' => 'required|string|min:4',
            'completed' => 'required|boolean',
        ]);

        $data['title'] = ucwords($request->title);
        $data['user_id'] = auth()->user()->id;
        
        // return $data;

        $todo = Todos::create($data);

        return response($todo, 201);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Todos  $todos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Todos $todo)
    {
        //
        $data = $request->validate([
            'title' => 'required|string|min:4',
            'completed' => 'required|boolean'
        ]);

        $data['title'] = ucwords($request->title);  
        $data['user_id'] = auth()->user()->id;

        $todo->update($data);

        return response($todo, 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Todos  $todos
     * @return \Illuminate\Http\Response
     */
    public function destroy(Todos $todo)
    {
        //
        $todo->delete();
        
        return response("Todo deleted", 200);
    }

    public function updateAll(Request $request)
    {
        //
        $data = $request->validate([
            'completed' => 'required|boolean',
        ]);

        Todos::query()->where('user_id', auth()->user()->id)->update($data);
        
        return response("Updated", 200);
    }

    public function destroyAll(Request $request)
    {
        //
        $request->validate([
            'todos' => 'required|array',
        ]);

        Todos::destroy($request->todos);
        
        return response("Deleted!", 200);
    }
}
