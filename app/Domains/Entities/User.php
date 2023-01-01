<?php

namespace App\Domains\Entities;

use Illuminate\Database\Eloquent\SoftDeletes;

class User extends \App\User
{
    use SoftDeletes;

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
    }

    public function links()
    {
        return $this->hasMany(Link::class, 'user_id');
    }
}
