<?php

namespace App\Services;

use App\Models\Task;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

class TaskService
{
    public function __construct(protected Task $task)
    {}

    public function getAllOrderedBy($order = 'created_at', $direction = 'ASC'): Collection
    {
        return $this->task->orderBy($order, $direction)->get();
    }

    public function store(array $data): bool
    {
        DB::beginTransaction();
        $task = $this->task->create($data);
        if (!$task) {
            DB::rollBack();
            return false;
        }

        $data = [
            'task_id' => $task->id,
            'user_id' => $data['author_id'],
            'current_status' => $task->status,
            'previous_status' => $this->getLastStatus($task),
        ];

        $taskHistoric = $task->historics()->create($data);
        if (!$taskHistoric) {
            DB::rollBack();
            return false;
        }

        DB::commit();
        return true;
    }

    public function find(int $id, $relations = []): Task|bool
    {
        /** @var Task $task */
        $task = $this->task->with($relations)->find($id);
        if (!$task) {
            return false;
        }

        return $task;
    }

    public function update(array $data, int $id): bool
    {
        DB::beginTransaction();
        $response = $this->task->whereId($id)->update($data);
        if (!$response) {
            DB::rollBack();
            return false;
        }

        /** @var Task $task */
        $task = $this->find($id);
        if (!$task) {
            DB::rollBack();
            return false;
        }

        $data = [
            'task_id' => $task->id,
            'user_id' => $data['author_id'],
            'current_status' => $task->status,
            'previous_status' => $this->getLastStatus($task),
        ];

        $taskHistoric = $task->historics()->create($data);
        if (!$taskHistoric) {
            DB::rollBack();
            return false;
        }

        DB::commit();
        return true;
    }

    public function destroy(int $id): bool
    {
        $response = $this->task->find($id)->delete();
        if (!$response) {
            return false;
        }

        return true;
    }

    private function getLastStatus($task)
    {
        $lastHistoric = $task->historics()->orderBy('created_at', 'desc')->first();
        if ($lastHistoric) {
            return $lastHistoric->previus_status;
        }

        return $task->status;
    }
}
