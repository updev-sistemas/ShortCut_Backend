<?php

namespace App\Domains\Contracts\Repositories;

use App\Domains\Contracts\ValueObjects\IValueObject;
use Illuminate\Support\Collection;

interface IStoreRepository
{
    function save(IValueObject $target) : void;
    function patch($cid, IValueObject $target) : void;
    function getAll() : Collection;
    function find($cid) : ?IValueObject;
    function getBySelectList() : Collection;
}
