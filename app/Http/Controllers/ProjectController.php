<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        return view('project/index', ['projects' => Project::orderBy('created_at', 'DESC')->get()]);
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
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        Project::create($request->all());

        toast('Project registered', 'success');

        return redirect()->route('project.index');
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return RedirectResponse|View
     */
    public function edit(int $id): View|RedirectResponse
    {
        $project = Project::find($id);
        if(!$project) {
            toast('Project not found', 'error');
            return redirect()->route('project.index');
        }

        return view('project/edit', ['project' => $project]);
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
        Project::find($id)->update($request->all());

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
        Project::find($id)->delete();

        toast('Project deleted', 'success');

        return redirect()->route('project.index');
    }
}
