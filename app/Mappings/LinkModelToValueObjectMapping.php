<?php

namespace App\Mappings;

use App\Domains\Entities\Link;
use App\Domains\ValueObjects\LinkValueObject;
use AutoMapperPlus\AutoMapperInterface;
use AutoMapperPlus\Configuration\AutoMapperConfig;
use Illuminate\Support\Carbon;

class LinkModelToValueObjectMapping
{
    /**
     * @param AutoMapperConfig $config
     * @return AutoMapperConfig
     */
    public static function transform(AutoMapperConfig $config) : AutoMapperConfig
    {
        $config->registerMapping(Link::class, LinkValueObject::class)
            ->beConstructedUsing(function (Link $source, AutoMapperInterface $mapper): LinkValueObject {
                $destination = new LinkValueObject();

                $destination->id = $source->id ?? null;
                $destination->user_id = $source->user_id ?? null;
                $destination->store_id = $source->store_id ?? null;
                $destination->category_id = $source->category_id ?? null;
                $destination->slug = $source->slug ?? null;
                $destination->url = $source->url ?? null;
                $destination->created_at = $source->created_at ?? Carbon::now();
                $destination->updated_at = $source->updated_at ?? Carbon::now();
                $destination->deleted_at = $source->deleted_at ?? null;

                $destination->shortcut = config('app.site') . '/' . $source->slug;
                $destination->category_name = $source->category->name ?? '';
                $destination->user_name = $source->registeredBy->name ?? '';
                $destination->store_name = $source->store->name ?? '';

                return $destination;
            });

        return $config;
    }
}
