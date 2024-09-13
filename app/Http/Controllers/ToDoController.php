<?php

namespace App\Http\Controllers;

use App\Models\ToDo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ToDoController extends Controller
{
    public function index() {
        $todos = Todo::where('user_id', Auth::id())->get()->groupBy('status');

        // If no data, return collect() = []
        $todos_ip = $todos['In-Progress'] ?? collect();
        $todos_c = $todos['Completed'] ?? collect();

        return view('home.index', [
            'todos_ip' => $todos_ip,
            'todos_c' => $todos_c
        ]);
    }

    public function create() {
        return view('home.create');
    }

    public function store(Request $request) {
        $validatedAttr = $request->validate([
            'description' => ['required', 'min:10'],
        ]);

        $validatedAttr["user_id"] = Auth::id();

        ToDo::create($validatedAttr);

        return redirect('/home')->with('success', 'To Do Created Successfully!');
    }

    public function edit(ToDo $todo) {
        return view('home.edit', ['todo' => $todo]);
    }

    public function update(Request $request, ToDo $todo) {
        $validatedAttr = $request->validate([
            'description' => ['required', 'min:10'],
        ]);

        $todo->update($validatedAttr);

        return redirect('/home')->with('success', 'To Do Updated Successfully');
    }

    public function destroy(ToDo $todo) {
        $todo->delete();

        return redirect('/home')->with('success', 'To Do Deleted Successfully');
    }

    public function complete(ToDo $todo) {
        if ($todo->status == "In-Progress") {
            $todo->update([
                'status' => 'Completed'
            ]);

            return redirect('/home')->with('success', "Completed To Do Successfully");
        }
        else {
            return redirect('/home')->with('fail', "Fail to Complete To Do");
        }
    }

    public function unfinish(ToDo $todo) {
        if ($todo->status == "Completed") {
            $todo->update([
                'status' => 'In-Progress'
            ]);

            return redirect('/home')->with('success', "Unfinished To Do Successfully");
        }
        else {
            return redirect('/home')->with('fail', "Fail to Unfinish To Do");
        }
    }
}
