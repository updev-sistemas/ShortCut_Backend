<?php

namespace App\Domains\ValueObjects;

use App\Domains\Contracts\ValueObjects\IValueObject;

/**
 * @class StatisticValueObject
 *
 * @property int id
 * @property int link_id
 * @property string ip
 * @property \DateTime created_at
 * @property \DateTime updated_at
 * @property \DateTime deleted_at
 *
 * @package App\Domains\ValueObjects
 */
class StatisticValueObject implements IValueObject
{
    public function getData()
    {
        return [
            'id' => $this->id ?? null,
            'link_id' => $this->link_id ?? null,
            'ip' => $this->ip ?? null,
            'created_at' => $this->created_at ?? null,
            'updated_at' => $this->updated_at ?? null,
            'deleted_at' => $this->deleted_at ?? null
        ];
    }
}
