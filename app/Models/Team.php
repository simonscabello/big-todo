<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * @method static orderBy(string $string, string $string1)
 * @method static create(array $all)
 * @method static find(int $id)
 * @method whereId(int $id)
 */
class Team extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description'
    ];

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }
}
