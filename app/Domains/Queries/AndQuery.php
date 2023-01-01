<?php

namespace App\Domains\Queries;

class AndQuery
{
    public static function build(\Illuminate\Database\Eloquent\Builder $query, $field, $operator, $value)
    {
        return $query->where($field, $operator,$value);
    }
}
