<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

trait Sortable
{
    protected static function bootSortable()
    {
        static::creating(function (Model $record) {
            if ($record->sort === null) {
                $lastSortPosition = $record->getSortableQuery()->max('sort');
                $record->sort = $lastSortPosition === null ? 0 : $lastSortPosition + 1;
            }
        });
    }

    public function getSortableQuery()
    {
       return $this->query();
    }

    public function scopeInOrder(Builder $query)
    {
        $query->orderBy('sort');
    }

    public function moveToPosition($targetSortPosition)
    {
        $currentSortPosition = $this->sort;

        if ($currentSortPosition == $targetSortPosition) {
            return;
        }

        DB::transaction(function () use ($currentSortPosition, $targetSortPosition) {
            $this->update(['sort' => -1]);

            $sortableItems = $this->getSortableQuery()->whereBetween('sort', [
                min($currentSortPosition, $targetSortPosition),
                max($currentSortPosition, $targetSortPosition),
            ]);

            if($currentSortPosition < $targetSortPosition) {
                // Dragging down, shift up
                $sortableItems->decrement('sort');
            } else {
                // Dragging up, shift down
                $sortableItems->increment('sort');
            }

            $this->update(['sort' => $targetSortPosition]);
        });
    }
}
