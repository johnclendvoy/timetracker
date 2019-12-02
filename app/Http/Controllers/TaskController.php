<?php

namespace App\Http\Controllers;

use App\Task;
use App\Client;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function create()
    {
        $clients = Client::all();
        return view('tasks.create')->with([
            'clients' => $clients
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'nullable',
            'client_id' => 'required|exists:clients,id',
            'date' => 'required',
            'hours' => 'required|numeric'
        ]);
        $task = Task::create($request->all());
        $request->session()->flash('id', $task->id);
        return redirect('/');
    }
}
