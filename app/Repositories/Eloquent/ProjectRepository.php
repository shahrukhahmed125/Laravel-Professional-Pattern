<?php

namespace App\Repositories\Eloquent;

use App\Models\Project;
use App\Repositories\Interfaces\ProjectRepositoryInterface;

class ProjectRepository implements ProjectRepositoryInterface
{
    public function all()
    {
        return Project::latest()->get();
    }

    public function find($id)
    {
        return Project::findOrFail($id);
    }

    public function store(array $data)
    {
        return Project::create($data);
    }

    public function update($id, array $data)
    {
        $project = Project::findOrFail($id);
        return $project->update($data);
    }

    public function delete($id)
    {
       return Project::destroy($id);
    }
}