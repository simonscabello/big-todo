<?php

namespace App\Models;

use App\Enums\TaskPriority;
use App\Enums\TaskState;
use App\Enums\TaskType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @method static orderBy(string $string, string $string1)
 * @method static create(array $all)
 * @method find(int $id)
 * @method whereId(int $id)
 * @property TaskState $status
 */
class Task extends Model
{
    protected $fillable = [
        'project_id',
        'team_id',
        'author_id',
        'deadline',
        'description',
        'priority',
        'status',
        'title',
        'type',
    ];

    protected $casts = [
        'status' => TaskState::class,
        'type' => TaskType::class,
        'priority' => TaskPriority::class,
    ];

    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }

    public function historics(): HasMany
    {
        return $this->hasMany(TaskHistoric::class);
    }

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }

    public function team(): BelongsTo
    {
        return $this->belongsTo(Team::class);
    }
}
