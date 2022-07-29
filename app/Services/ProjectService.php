<?php

namespace App\Services;

use App\Models\Project;
use Illuminate\Database\Eloquent\Collection;

class ProjectService
{
    public function __construct(protected Project $project)
    {}

    public function getAllOrderedBy($order = 'created_at', $direction = 'ASC'): Collection
    {
        return $this->project->orderBy($order, $direction)->get();
    }

    public function store(array $data)
    {
        return $this->project->create($data);
    }

    public function find(int $id): Project|bool
    {
        $project = $this->project->find($id);
        if (!$project) {
            return false;
        }

        return $project;
    }

    public function update(array $data, $id): bool
    {
        $response = $this->project->whereId($id)->update($data);
        if (!$response) {
            return false;
        }

        return true;
    }

    public function destroy(int $id): bool
    {
        $response = $this->project->find($id)->delete();
        if (!$response) {
            return false;
        }

        return true;
    }
}
