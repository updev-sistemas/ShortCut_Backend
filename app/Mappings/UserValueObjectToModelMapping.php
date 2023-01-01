<?php

namespace App\Mappings;

use App\Domains\Entities\User;
use App\Domains\ValueObjects\LinkValueObject;
use App\Domains\ValueObjects\UserValueObject;
use AutoMapperPlus\AutoMapperInterface;
use AutoMapperPlus\Configuration\AutoMapperConfig;
use AutoMapperPlus\MappingOperation\Operation;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;

class UserValueObjectToModelMapping
{
    /**
     * @param AutoMapperConfig $config
     * @return AutoMapperConfig
     */
    public static function transform(AutoMapperConfig $config) : AutoMapperConfig
    {
        $config->registerMapping(UserValueObject::class, User::class)
            ->beConstructedUsing(function (UserValueObject $source, AutoMapperInterface $mapper): User {
                $destination = new User();

                $destination->id = $source->id ?? null;
                $destination->name = $source->name ?? null;
                $destination->email = $source->email ?? null;
                $destination->password = Hash::make($source->password ?? null);
                $destination->remember_token = $source->remember_token ?? null;
                $destination->email_verified_at = $source->email_verified_at ?? null;
                $destination->created_at = $source->created_at ?? Carbon::now();
                $destination->updated_at = $source->updated_at ?? Carbon::now();
                $destination->deleted_at = $source->deleted_at ?? null;

                return $destination;
            });

        return $config;
    }
}
