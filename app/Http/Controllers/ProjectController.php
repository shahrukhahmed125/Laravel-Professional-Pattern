<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProjectRequest;
use App\Services\ProjectService;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    protected $projectService;

    public function __construct(ProjectService $projectService)
    {
        $this->projectService = $projectService;
    }

    public function index()
    {
        $projects = $this->projectService->getAllProjects();
        return view('projects.index', compact('projects'));
    }

    public function store(ProjectRequest $request)
    {
        $this->projectService->createProject($request->validated());
        return back()->with('success', 'Project created!');
    }

    public function update(ProjectRequest $request, $id)
    {
        $this->projectService->updateProject($id, $request->validated());
        return back()->with('success', 'Project updated!');
    }

    public function destroy($id)
    {
        $this->projectService->deleteProject($id);
        return back()->with('success', 'Project deleted!');
    }
}
