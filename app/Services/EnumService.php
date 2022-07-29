<?php

namespace App\Services;

use App\Enums\TaskPriority;
use App\Enums\TaskState;
use App\Enums\TaskType;

class EnumService
{
    public function taskTypes(): array
    {
        return TaskType::cases();
    }

    public function taskPriorities(): array
    {
        return TaskPriority::cases();
    }

    public function taskStates(): array
    {
        return TaskState::cases();
    }
}
