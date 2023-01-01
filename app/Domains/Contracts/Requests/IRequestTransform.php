<?php

namespace App\Domains\Contracts\Requests;

use App\Domains\Contracts\ValueObjects\IValueObject;

interface IRequestTransform
{
    function transform(): IValueObject;
}
