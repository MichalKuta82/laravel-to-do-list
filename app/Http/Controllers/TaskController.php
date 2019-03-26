<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Task;
use App\Project;

class TaskController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $tasks = Task::paginate(5);
        return view('tasks.index', compact('tasks', 'project'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($project_id)
    {
        //
        return view('tasks.create')->with('project_id', $project_id);
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
        $request->validate([
            'task-title' => 'required|min:3',
            'task-content' => 'required|min:10',
        ]);

        Task::create([
            'title' => $request->get('task-title'),
            'content' => $request->get('task-content'),
            'project_id' => $request->get('project-id')
        ]);

        return  redirect()->to('/projects');
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
        $task = Task::findOrFail($id);
        return view('tasks.show')->with('task', $task);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $task = Task::findOrFail($id);
        return view('tasks.edit', compact('task'));
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
        //
        $task = Task::findOrFail($id);

        $request->validate([
            'task-title' => 'required|min:3',
            'task-content' => 'required|min:10',
        ]);

        $data = [
            'title' => $request->get('task-title'),
            'content' => $request->get('task-content'),
        ];

        $task->whereId($id)->first()->update($data);

        return redirect()->to('/projects/'. $task->project_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $task = Task::findOrFail($id);
        $tasks = Task::all()->count();

        // if ($tasks = 1) {
        //     $task->project()->delete();
        //     redirect('/projects/'. $task->project_id);
        // }else{
            $task->delete();
            return redirect()->back();
        // }
    }
}
