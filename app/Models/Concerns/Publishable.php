<?php

namespace App\Models\Concerns;

use Illuminate\Database\Eloquent\Builder;

trait Publishable
{

    public function scopePublished(Builder $query)
    {
        $query->where('active', '=', true);
    }

}
