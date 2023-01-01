<?php

namespace App\Domains\Queries;

class OrQuery
{
    public static function build(\Illuminate\Database\Eloquent\Builder $query, $field, $operator, $value)
    {
        return $query->orWhere($field, $operator,$value);
    }
}
