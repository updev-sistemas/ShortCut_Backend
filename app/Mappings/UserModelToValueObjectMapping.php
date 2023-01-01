<?php

namespace App\Mappings;

use App\Domains\Entities\Link;
use App\Domains\Entities\User;
use App\Domains\ValueObjects\LinkValueObject;
use App\Domains\ValueObjects\UserValueObject;
use AutoMapperPlus\AutoMapperInterface;
use AutoMapperPlus\Configuration\AutoMapperConfig;
use AutoMapperPlus\MappingOperation\Operation;
use Illuminate\Support\Carbon;

class UserModelToValueObjectMapping
{
    /**
     * @param AutoMapperConfig $config
     * @return AutoMapperConfig
     */
    public static function transform(AutoMapperConfig $config) : AutoMapperConfig
    {
        $config->registerMapping(User::class, UserValueObject::class)
            ->beConstructedUsing(function (User $source, AutoMapperInterface $mapper): UserValueObject {
                $destination = new UserValueObject();

                $destination->id = $source->id ?? null;
                $destination->name = $source->name ?? null;
                $destination->email = $source->email ?? null;
                $destination->password = "########";
                $destination->remember_token = "########";
                $destination->created_at = $source->created_at ?? Carbon::now();
                $destination->updated_at = $source->updated_at ?? Carbon::now();
                $destination->deleted_at = $source->deleted_at ?? null;

                return $destination;
            });

        return $config;
    }
}
