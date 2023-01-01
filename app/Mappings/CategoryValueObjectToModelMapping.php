<?php

namespace App\Mappings;

use App\Domains\Entities\Category;
use App\Domains\ValueObjects\CategoryValueObject;
use AutoMapperPlus\AutoMapperInterface;
use AutoMapperPlus\Configuration\AutoMapperConfig;
use Illuminate\Support\Carbon;

class CategoryValueObjectToModelMapping
{
    /**
     * @param AutoMapperConfig $config
     * @return AutoMapperConfig
     */
    public static function transform(AutoMapperConfig $config) : AutoMapperConfig
    {
        $config->registerMapping(CategoryValueObject::class, Category::class)
            ->beConstructedUsing(function (CategoryValueObject $source, AutoMapperInterface $mapper): Category {
                $destination = new Category();

                $destination->id = $source->id ?? null;
                $destination->name = $source->name ?? null;
                $destination->created_at = $source->created_at ?? Carbon::now();
                $destination->updated_at = $source->updated_at ?? Carbon::now();
                $destination->deleted_at = $source->deleted_at ?? null;

                return $destination;
            });

        return $config;
    }
}
