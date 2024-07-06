<?php

namespace App\Models;

use App\Traits\Sortable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Task extends Model
{
    use HasFactory, Sortable;

    protected $fillable = [
        'sort',
        'description',
    ];

    public function getSortableQuery()
    {
        return $this->group->tasks();
    }

    public function group(): BelongsTo
    {
        return $this->belongsTo(Group::class);
    }
}
