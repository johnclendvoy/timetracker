<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'nullable',
            'customer_id' => 'required',
            'date' => 'required'
        ]);
        $task = Task::create($request->all());
        return redirect('/');
    }
}
