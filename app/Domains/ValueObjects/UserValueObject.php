<?php

namespace App\Domains\ValueObjects;

use App\Domains\Contracts\ValueObjects\IValueObject;
use Illuminate\Support\Collection;

/**
 * @class UserValueObject
 *
 * @property int id
 * @property string name
 * @property string email
 * @property string password
 * @property string remember_token
 * @property \DateTime email_verified_at
 * @property \DateTime created_at
 * @property \DateTime updated_at
 * @property \DateTime deleted_at
 *
 * @package App\Domains\ValueObjects
 */
class UserValueObject implements IValueObject
{
    public function getData()
    {
        return [
            'id' => $this->id ?? null,
            'name' => $this->name ?? null,
            'email' => $this->email ?? null,
            'password' => $this->password ?? null,
            'remember_token' => $this->remember_token ?? null,
            'email_verified_at' => $this->email_verified_at ?? null,
            'created_at' => $this->created_at ?? null,
            'updated_at' => $this->updated_at ?? null,
            'deleted_at' => $this->deleted_at ?? null
        ];
    }
}
