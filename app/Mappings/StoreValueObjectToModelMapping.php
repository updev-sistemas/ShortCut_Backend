<?php

namespace App\Mappings;

use App\Domains\Entities\Store;
use App\Domains\ValueObjects\StoreValueObject;
use AutoMapperPlus\AutoMapperInterface;
use AutoMapperPlus\Configuration\AutoMapperConfig;
use Illuminate\Support\Carbon;

class StoreValueObjectToModelMapping
{
    /**
     * @param AutoMapperConfig $config
     * @return AutoMapperConfig
     */
    public static function transform(AutoMapperConfig $config) : AutoMapperConfig
    {
        $config->registerMapping(StoreValueObject::class, Store::class)
            ->beConstructedUsing(function (StoreValueObject $source, AutoMapperInterface $mapper): Store {
                $destination = new Store();

                $destination->id = $source->id ?? null;
                $destination->name = $source->name ?? null;
                $destination->icon = $source->icon ?? null;
                $destination->created_at = $source->created_at ?? Carbon::now();
                $destination->updated_at = $source->updated_at ?? Carbon::now();
                $destination->deleted_at = $source->deleted_at ?? null;

                return $destination;
            });

        return $config;
    }
}
