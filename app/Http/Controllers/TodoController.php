<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use App\Http\Controllers\View;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $todos = Todo::all();
        return view("todos.index", compact("todos"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("todos.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:20',
            'description' => 'required|string|min:5|max:500',
        ]);
        Todo::create($request->all());
        return redirect('todos')->with('success', 'Todos Create Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $todos = Todo::find($id);
        return view('todos.show')->with('todos', $todos);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $todos = Todo::find($id);
        return view('todos.edit')->with('todos', $todos);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required|max:20',
            'description' => 'required|string|min:5|max:500',
        ]);
        $todos = Todo::find($id);
        $input = $request->all();
        $todos->update($input);
        return redirect('todos')->with('success', 'Todos Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Todo::destroy($id);
        return redirect('todos')->with('sussess','Todos Deleted');
    }
}
