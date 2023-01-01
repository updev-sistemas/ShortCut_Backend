<?php

namespace App\Domains\Contracts\Mappings;


use AutoMapperPlus\AutoMapperInterface;

interface IInternalAutoMapper
{
    function build() : AutoMapperInterface;
}
