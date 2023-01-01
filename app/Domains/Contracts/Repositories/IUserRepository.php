<?php

namespace App\Domains\Contracts\Repositories;

use App\Domains\Contracts\ValueObjects\IValueObject;
use Illuminate\Support\Collection;

interface IUserRepository
{
    function getAll() : Collection;
    function save(IValueObject $target) : void;
    function patch($cryptId, IValueObject $target) : void;
    function find($cryptId) : ?IValueObject;
}
