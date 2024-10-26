<?php

namespace App\Models;

use App\Traits\Sortable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Task extends Model
{
    use HasFactory, Sortable;

    protected $fillable = [
        'project_id',
        'sort',
        'description',
    ];

    public function getSortableQuery()
    {
        return $this->group->tasks();
    }

    public function scopeForProject(Builder $query, $projectId)
    {
        $query->where('project_id', $projectId);
    }

    public function scopeFilter(Builder $query, string $search)
    {
        $query->where('description', 'like', "%$search%");
    }

    public function group(): BelongsTo
    {
        return $this->belongsTo(Group::class);
    }

    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }

    public function labels(): BelongsToMany
    {
        return $this->belongsToMany(Label::class);
    }
}
