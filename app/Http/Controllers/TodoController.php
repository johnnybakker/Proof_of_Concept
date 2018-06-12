<?php

namespace App\Http\Controllers;

use App\Todo;
use \Auth;
use Illuminate\Http\Request;

class TodoController extends Controller
{

    public function __construct(Request $request)
    {
       $this->middleware('auth');
       $this->middleware('role:admin');
    }

    public function index()
    {
        $todos = Todo::where('user_id', Auth::id())->get();
        return view("todos.index")->with('todos', $todos);
    }
    public function create()
    {
        return view("todos.create");
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        $name = $request->get('name');
        $description = $request->get('description');
        
        $todo = new Todo();
        $todo->user_id = Auth::id();
        $todo->name = $name;
        $todo->description = $description;
        $todo->save();

        return redirect(route('todos.index'));
    }

    public function show(Todo $todo)
    {
        return view("todos.show")->with('todo', $todo);
    }

    public function edit(Todo $todo)
    {
        return view("todos.edit")->with('todo', $todo);
    }

    public function update(Request $request, Todo $todo)
    {

        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        $name = $request->get('name');
        $description = $request->get('description');
        
        $todo->name = $name;
        $todo->description = $description;
        $todo->save();
        return redirect(route('todos.index'));
    }

    public function destroy(Todo $todo)
    {
        $todo->delete();
        return redirect(route('todos.index'));
    }
}
