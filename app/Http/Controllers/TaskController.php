<?php

namespace App\Http\Controllers;

use App\Enums\TaskPriority;
use App\Enums\TaskState;
use App\Enums\TaskType;
use App\Models\Project;
use App\Models\Task;
use App\Models\TaskHistoric;
use App\Models\Team;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        return view('task.index', ['tasks' => Task::orderBy('created_at', 'DESC')->get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        $projects = Project::all();
        $teams = Team::all();
        $types = TaskType::cases();
        $priorities = TaskPriority::cases();
        $statuses = TaskState::cases();

        return view('task.create', [
            'projects' => $projects,
            'teams' => $teams,
            'types' => $types,
            'priorities' => $priorities,
            'statuses' => $statuses,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $author = auth()->user()->id;
        $request['author_id'] = $author;

        $task = Task::create($request->all());

        $data = [
            'task_id' => $task->id,
            'user_id' => $author,
            'current_status' => $task->status,
            'previous_status' => $task->getLastStatus(),
        ];

        TaskHistoric::create($data);

        toast('Task registered', 'success');

        return redirect()->route('task.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
