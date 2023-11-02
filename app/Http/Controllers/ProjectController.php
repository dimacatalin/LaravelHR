<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Models\Project;
use Exception;
use Illuminate\Support\Facades\Redirect;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::orderBy('created_at', 'DESC')->paginate(50);
        return view('projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $project = null;
        $route = 'projects.store';

        return view('projects.create', compact('project', 'route'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request)
    {
        try {
            Project::create($request->input());
            $request->session()->flash('alert-success', 'Data saved successfully!');
            return Redirect::route('projects.index');
        } catch (Exception $e) {
            $request->session()->flash('alert-error', 'Could not save data! ' . $e->getMessage());
        }
        return Redirect::back()->withInput();
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        return view('projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        $route = 'projects.update';

        return view('projects.create', compact('project', 'route'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        try {
            $project->update($request->input());

            $request->session()->flash('alert-success', 'Data saved successfully!');
            return Redirect::route('projects.edit', [$project]);
        } catch (Exception $e) {
            $request->session()->flash('alert-error', 'Could not save data! ' . $e->getMessage());
        }
        return Redirect::back()->withInput();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->delete();
        return Redirect::back();
    }
}
