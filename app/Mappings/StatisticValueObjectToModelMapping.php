<?php

namespace App\Mappings;

use App\Domains\Entities\Statistic;
use App\Domains\ValueObjects\StatisticValueObject;
use AutoMapperPlus\AutoMapperInterface;
use AutoMapperPlus\Configuration\AutoMapperConfig;
use Illuminate\Support\Carbon;

class StatisticValueObjectToModelMapping
{
    /**
     * @param AutoMapperConfig $config
     * @return AutoMapperConfig
     */
    public static function transform(AutoMapperConfig $config) : AutoMapperConfig
    {
        $config->registerMapping(StatisticValueObject::class, Statistic::class)
            ->beConstructedUsing(function (StatisticValueObject $source, AutoMapperInterface $mapper): Statistic {
                $destination = new Statistic();

                $destination->id = $source->id ?? null;
                $destination->ip = $source->ip ?? null;
                $destination->link_id = $source->link_id ?? null;
                $destination->created_at = $source->created_at ?? Carbon::now();
                $destination->updated_at = $source->updated_at ?? Carbon::now();
                $destination->deleted_at = $source->deleted_at ?? null;

                return $destination;
            });

        return $config;
    }
}
