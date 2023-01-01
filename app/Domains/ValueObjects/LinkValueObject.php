<?php

namespace App\Domains\ValueObjects;

use App\Domains\Contracts\ValueObjects\IValueObject;

/**
 * @class LinkValueObject
 *
 * @property int id
 * @property int user_id
 * @property int category_id
 * @property int store_id
 * @property string slug
 * @property string url
 * @property string shortcut
 * @property string category_name
 * @property string user_name
 * @property string store_name
 * @property \DateTime expires_at
 * @property \DateTime created_at
 * @property \DateTime updated_at
 * @property \DateTime deleted_at
 *
 * @package App\Domains\ValueObjects
 */
class LinkValueObject implements IValueObject
{
    public function getData()
    {
        return [
            'id' => $this->id ?? null,
            'user_id' => $this->user_id ?? null,
            'category_id' => $this->category_id ?? null,
            'store_id' => $this->store_id ?? null,
            'slug' => $this->slug ?? null,
            'url' => $this->url ?? null,
            'shortcut' => $this->shortcut ?? null,
            'category_name' => $this->category_name ?? null,
            'user_name' => $this->user_name ?? null,
            'store_name' => $this->store_name ?? null,
            'created_at' => $this->created_at ?? null,
            'updated_at' => $this->updated_at ?? null,
            'deleted_at' => $this->deleted_at ?? null
        ];
    }
}
