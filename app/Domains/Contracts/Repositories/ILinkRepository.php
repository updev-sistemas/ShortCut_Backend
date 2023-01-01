<?php

namespace App\Domains\Contracts\Repositories;

use App\Domains\Contracts\ValueObjects\IValueObject;

interface ILinkRepository
{
    function save(IValueObject $target) : void;
    function find(int $id) : ?IValueObject;
    function existsByHash(string $link) : ?IValueObject;
    function findByIdOrSlug(string $id, string $slug) : ?IValueObject;
    function generate_slug() : string;
}
