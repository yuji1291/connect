<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Task;

class TasksController extends Controller
{
    public function index()
    {
        $data = [];
        if (\Auth::check()) {
            $user = \Auth::user();
            $tasks = $user->tasks()->orderBy('id', 'desc')->get();
            $data = [
                'user' => $user,
                'tasks' => $tasks,
            ];
        }
        return view('welcome', $data);
    }
    
    public function create()
    {
        $task = new Task;

        return view('tasks.create', [
            'task' => $task,
        ]);
    }
    
      public function store(Request $request)
    {
        $this->validate($request, [
            'title' =>'required|max:20',
            'start_date' => 'required',
            'start_time' => 'required',
            'end_date' =>'required',
            'end_time' =>'required',
            'place' => 'required|max:20',
            'content' => 'required|max:191',
        ]);

        $request->user()->tasks()->create([
            'title' => $request->title,
            'start_date' =>$request->start_date,
            'start_time' =>$request->start_time,
            'end_date' =>$request->end_date,
            'end_time' =>$request->end_time,
            'place' =>$request->place,
            'content'=>$request->content,
        ]);

        return redirect('/');
    }
    public function show($id)
    {
        $task = Task::find($id);
        
        
        

        return view('tasks.show', [
            'task' => $task,
        ]);
    }
    public function edit($id)
    {
        $task = Task::find($id);
        if (\Auth::id() !== $task->user_id) {
            return redirect('/');
        }

        return view('tasks.edit', [
            'task' => $task,
        ]);
    }
    
     public function update(Request $request, $id)
     {
        $this->validate($request, [
            'title' =>'required|max:20',
            'start_date' => 'required',
            'start_time' => 'required',
            'end_date' =>'required',
            'end_time' =>'required',
            'place' => 'required|max:20',
            'content' => 'required|max:191',
            
        ]);
        $task = Task::find($id);
        if (\Auth::id() !== $task->user_id) {
            return redirect('/');
        }
        
        $task->title = $request->title;
        $task->start_date = $request->start_date;
        $task->start_time = $request->start_time;
        $task->end_date = $request->end_date;
        $task->end_time = $request->end_time;
        $task->place = $request->place;
        $task->content = $request->content;
        $task->save();

        return redirect('/');
    }

    public function destroy($id)
    {
        $task = \App\Task::find($id);

        if (\Auth::id() === $task->user_id) {
            $task->delete();
        }

        return redirect('/');
    }

}
