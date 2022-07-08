<?php

namespace App\Models;

use App\Enums\TaskState;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @method static create(array $data)
 */
class TaskHistoric extends Model
{
    protected $fillable = [
        'task_id',
        'user_id',
        'current_status',
        'previous_status',
    ];

    protected $casts = [
        'current_status' => TaskState::class,
        'previous_status' => TaskState::class,
    ];

    public function task(): BelongsTo
    {
        return $this->belongsTo(Task::class);
    }
}
