<?php

namespace App\Domains\Queries;

class ContainsQuery
{
    public static function build(\Illuminate\Database\Eloquent\Builder $query, $field, $operator, $value)
    {
        $const1 = "%{$value}%";
        $const2 = "%{$value}";
        $const3 = "{$value}%";

        return $query->orWhere($field, 'like',$const1)
                     ->orWhere($field, 'like',$const2)
                     ->orWhere($field, 'like',$const3);
    }
}
