<?php

namespace App\Domains\Queries;

class BetweenQuery
{
    public static function build(\Illuminate\Database\Eloquent\Builder $query, $field, $from, $to)
    {
        return $query->whereBetween($field, [$from, $to]);
    }
}
