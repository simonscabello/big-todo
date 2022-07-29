<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProjectRequest;
use App\Models\Project;
use App\Services\ProjectService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ProjectController extends Controller
{
    public function __construct(protected ProjectService $projectService)
    {}

    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        return view('project/index', ['projects' => $this->projectService->getAllOrderedBy('created_at', 'DESC')]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        return view('project/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ProjectRequest $request
     * @return RedirectResponse
     */
    public function store(ProjectRequest $request): RedirectResponse
    {
        $this->projectService->store($request->all());

        toast('Project registered', 'success');

        return redirect()->route('project.index');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return RedirectResponse|View
     */
    public function edit(int $id): View|RedirectResponse
    {
        $project = $this->projectService->find($id);
        if (!$project) {
            toast('Project not found', 'error');
            return redirect()->route('project.index');
        }

        return view('project/edit', ['project' => $project]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ProjectRequest $request
     * @param int $id
     * @return RedirectResponse
     */
    public function update(ProjectRequest $request, int $id): RedirectResponse
    {
        $project = $this->projectService->update($request->except(['_method', '_token']), $id);
        if (!$project) {
            toast('Error updating project', 'error');
            return back();
        }

        toast('Project updated', 'success');

        return redirect()->route('project.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return RedirectResponse
     */
    public function destroy(int $id): RedirectResponse
    {
        $this->projectService->destroy($id);

        toast('Project deleted', 'success');

        return redirect()->route('project.index');
    }
}
