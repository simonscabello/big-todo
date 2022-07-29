<?php

namespace App\Services;

use App\Models\Team;
use Illuminate\Database\Eloquent\Collection;

class TeamService
{
    public function __construct(protected Team $team)
    {}

    public function getAllOrderedBy($order = 'created_at', $direction = 'ASC'): Collection
    {
        return $this->team->orderBy($order, $direction)->get();
    }

    public function store(array $data)
    {
        return $this->team->create($data);
    }

    public function find(int $id): Team|bool
    {
        $team = $this->team->find($id);
        if (!$team) {
            return false;
        }

        return $team;
    }

    public function update(array $data, int $id): bool
    {
        $response = $this->team->whereId($id)->update($data);
        if (!$response) {
            return false;
        }

        return true;
    }

    public function destroy(int $id): bool
    {
        $response = $this->team->find($id)->delete();
        if (!$response) {
            return false;
        }

        return true;
    }
}
