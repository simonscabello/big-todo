<?php

namespace App\Http\Controllers;

use App\Http\Requests\TeamRequest;
use App\Models\Team;
use App\Services\TeamService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;


class TeamController extends Controller
{
    public function __construct(protected TeamService $teamService)
    {}

    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        return view('team/index', ['teams' => $this->teamService->getAllOrderedBy('created_at', 'DESC')]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        return view('team/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param TeamRequest $request
     * @return RedirectResponse
     */
    public function store(TeamRequest $request): RedirectResponse
    {
        $this->teamService->store($request->all());

        toast('Team registered', 'success');

        return redirect()->route('team.index');
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
     * @return RedirectResponse|View
     */
    public function edit(int $id): View|RedirectResponse
    {
        $team = $this->teamService->find($id);
        if (!$team) {
            toast('Team not found', 'error');
            return redirect()->route('team.index');
        }

        return view('team/edit', ['team' => $team]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param TeamRequest $request
     * @param int $id
     * @return RedirectResponse
     */
    public function update(TeamRequest $request, int $id): RedirectResponse
    {
        $team = $this->teamService->update($request->except(['_method', '_token']), $id);
        if (!$team) {
            toast('Error updating team', 'error');
            return back();
        }

        toast('Team updated', 'success');

        return redirect()->route('team.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return RedirectResponse
     */
    public function destroy(int $id): RedirectResponse
    {
        $this->teamService->destroy($id);

        toast('Team deleted', 'success');

        return redirect()->route('team.index');
    }
}
