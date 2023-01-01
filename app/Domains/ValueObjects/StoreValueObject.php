<?php

namespace App\Domains\ValueObjects;

use App\Domains\Contracts\ValueObjects\IValueObject;

/**
 * @class StoreValueObject
 *
 * @property int id
 * @property string name
 * @property string icon
 * @property \DateTime created_at
 * @property \DateTime updated_at
 * @property \DateTime deleted_at
 *
 * @package App\Domains\ValueObjects
 */
class StoreValueObject implements IValueObject
{
    public function getData()
    {
        return [
            'id' => $this->id ?? null,
            'name' => $this->name ?? null,
            'icon' => $this->icon ?? null,
            'created_at' => $this->created_at ?? null,
            'updated_at' => $this->updated_at ?? null,
            'deleted_at' => $this->deleted_at ?? null
        ];
    }
}
