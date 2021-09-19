<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
        Task::create([
            'task' => $request->task
        ]);

        return redirect('/');
    }

    public function editTask(Request $request)
    {
        $id = $request->input('id');
        $editedTask = $request->input('editedTask');
        
        DB::update('update tasks set task = ? where id = ?',[$editedTask,$id]);
        
        return redirect('/');
    }

    public static function deleteTask($id) 
    {
        DB::delete('delete from tasks where id = ?', [$id]);
        
        return redirect('/');
    }
}
