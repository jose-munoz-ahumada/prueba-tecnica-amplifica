<?php

namespace App\Models\Concerns;

use Illuminate\Database\Eloquent\Builder;

trait DateSortable
{
    public function scopeNewest(Builder $query, $limit = 8)
    {
        $query
            ->orderBy('created_at', 'DESC')
            ->limit($limit);
    }
}
