<?php

namespace App\Domains\Queries;

class InQuery
{
    public static function build(\Illuminate\Database\Eloquent\Builder $query, $field, $values, $notIn = false)
    {
        return $query->whereIn($field, $values, true, $notIn);
    }
}
