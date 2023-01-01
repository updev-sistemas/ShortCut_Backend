<?php

namespace App\Domains\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Link extends Model
{
    use SoftDeletes;

    protected $primaryKey = 'id';

    protected $table = 'links';

    protected $fillable = [
        'user_id',
        'category_id',
        'store_id',
        'slug',
        'url',
        'link_hash',
        'expires_at'
    ];

    protected $casts = [
        'expires_at' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime'
    ];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
    }

    public function registeredBy()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function store()
    {
        return $this->belongsTo(Store::class,'store_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class,'category_id');
    }
}
