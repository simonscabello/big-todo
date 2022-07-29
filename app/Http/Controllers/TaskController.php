<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Team;
use App\Services\EnumService;
use App\Services\ProjectService;
use App\Services\TaskService;
use App\Services\TeamService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TaskController extends Controller
{
    public function __construct(
        protected ProjectService $projectService,
        protected EnumService $enumService,
        protected TeamService $teamService,
        protected TaskService $taskService
    )
    {}

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
        $projects = $this->projectService->getAllOrderedBy();
        $teams = $this->teamService->getAllOrderedBy();
        $types = $this->enumService->taskTypes();
        $priorities = $this->enumService->taskPriorities();
        $statuses = $this->enumService->taskStates();

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
        $request['author_id'] = auth()->user()->id;

        $task = $this->taskService->store($request->except(['_token', '_method']));
        if (!$task) {
            toast('Error creating task', 'error');
            return back();
        }

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
     * @return RedirectResponse
     */
    public function edit(int $id): \Illuminate\View\View|RedirectResponse
    {
        $task = $this->taskService->find($id, ['project', 'team', 'historics']);
        if(!$task) {
            toast('Task not found', 'error');
            return redirect()->route('task.index');
        }

        $teams = $this->teamService->getAllOrderedBy();
        $projects = $this->projectService->getAllOrderedBy();
        $types = $this->enumService->taskTypes();
        $priorities = $this->enumService->taskPriorities();
        $statuses = $this->enumService->taskStates();

        return view('task.edit', [
            'task' => $task,
            'teams' => $teams,
            'projects' => $projects,
            'types' => $types,
            'priorities' => $priorities,
            'statuses' => $statuses,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return RedirectResponse
     */
    public function update(Request $request, int $id): RedirectResponse
    {
        $request['author_id'] = auth()->user()->id;

        $task = $this->taskService->update($request->except(['_token', '_method']), $id);
        if (!$task) {
            toast('Error updating task', 'error');
            return back();
        }

        toast('Task updated', 'success');

        return redirect()->route('task.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return RedirectResponse
     */
    public function destroy(int $id): RedirectResponse
    {
        $this->teamService->destroy($id);

        toast('Task deleted', 'success');

        return redirect()->route('task.index');
    }
}
