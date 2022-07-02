<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @method static create(array $all)
 * @method static find(int $id)
 * @method static orderBy(string $string, string $string1)
 */
class Project extends Model
{
    protected $fillable = [
        'name',
        'description',
        'color',
    ];

    public function tasks(): HasMany
    {
        return $this->hasMany(Task::class);
    }
}
