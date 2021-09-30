<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;


class TasksController extends Controller
{
    public function showTasks()
    {
        return view('tasks', [
            'tasks' => Task::all()
        ]);
    }

    public function addTask (Request $request)
    {
        $input = $request->all();

        $request->validate([
            'task' => ['required', 'max:100'],
        ]);

        Task::create($input);

        return redirect('/')->with('success','Added new Task!');
    }

    public function editTask(Request $request)
    {

        //Sollte eher ueber livewire gehen

        $request->validate([
            'editedTask' => ['required', 'max:100'],
        ]);

        $id = $request->input('id');
        $editedTask = $request->input('editedTask');

        $task = Task::find($id);
        $task->task = $editedTask;
        $task->save();

        return redirect('/')->with('success', 'Updated Task!');
    }

    public function deleteTask(Request $request)
    {
        $id = $request->input('id');
        Task::find($id)->delete();

        return redirect('/')->with('success', 'Deleted Task!');
    }
}
