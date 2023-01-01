<?php

namespace App\Mappings;

use App\Domains\Entities\Link;
use App\Domains\ValueObjects\LinkValueObject;
use AutoMapperPlus\AutoMapperInterface;
use AutoMapperPlus\Configuration\AutoMapperConfig;
use Illuminate\Support\Carbon;

class LinkValueObjectToModelMapping
{
    /**
     * @param AutoMapperConfig $config
     * @return AutoMapperConfig
     */
    public static function transform(AutoMapperConfig $config) : AutoMapperConfig
    {
        $config->registerMapping(LinkValueObject::class, Link::class)
            ->beConstructedUsing(function (LinkValueObject $source, AutoMapperInterface $mapper): Link {
                $destination = new Link();

                $destination->id = $source->id ?? null;
                $destination->user_id = $source->user_id ?? null;
                $destination->store_id = $source->store_id ?? null;
                $destination->category_id = $source->category_id ?? null;
                $destination->slug = $source->slug ?? null;
                $destination->url = $source->url ?? null;
                $destination->created_at = $source->created_at ?? Carbon::now();
                $destination->updated_at = $source->updated_at ?? Carbon::now();
                $destination->deleted_at = $source->deleted_at ?? null;

                return $destination;
            });

        return $config;
    }
}
