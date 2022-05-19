<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TaskHistoric extends Model
{
    protected $fillable = [
        'task_id',
        'current_status',
        'previous_status',
    ];

    public function task(): BelongsTo
    {
        return $this->belongsTo(Task::class);
    }
}
