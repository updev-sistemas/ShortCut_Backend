<?php

namespace App\Mappings;

use App\Domains\Contracts\Mappings\IInternalAutoMapper;
use App\Domains\Entities\Category;
use App\Domains\Entities\Link;
use App\Domains\Entities\Statistic;
use App\Domains\Entities\Store;
use App\Domains\Entities\User;
use App\Domains\ValueObjects\LinkValueObject;
use App\Domains\ValueObjects\StatisticValueObject;
use App\Domains\ValueObjects\StoreValueObject;
use App\Domains\ValueObjects\UserValueObject;
use AutoMapperPlus\AutoMapper;
use AutoMapperPlus\AutoMapperInterface;
use AutoMapperPlus\Configuration\AutoMapperConfig;

class InternalAutoMapper implements IInternalAutoMapper
{
    public function build() : AutoMapperInterface
    {
        $config = new AutoMapperConfig();

        $config = CategoryModelToValueObjectMapping::transform($config);
        $config = CategoryValueObjectToModelMapping::transform($config);

        $config = LinkModelToValueObjectMapping::transform($config);
        $config = LinkValueObjectToModelMapping::transform($config);

        $config = StatisticModelToValueObjectMapping::transform($config);
        $config = StatisticValueObjectToModelMapping::transform($config);

        $config = StoreModelToValueObjectMapping::transform($config);
        $config = StoreValueObjectToModelMapping::transform($config);

        $config = UserModelToValueObjectMapping::transform($config);
        $config = UserValueObjectToModelMapping::transform($config);

        return new AutoMapper($config);
    }
}
