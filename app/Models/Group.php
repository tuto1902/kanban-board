<?php

namespace App\Models;

use App\Traits\Sortable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Group extends Model
{
    use HasFactory, Sortable;

    protected $fillable = [
        'name',
        'sort'
    ];

    public function tasks(): HasMany
    {
        return $this->hasMany(Task::class);
    }
}
