<?php

namespace App\Domains\Contracts\Repositories;

use Illuminate\Pagination\LengthAwarePaginator;

interface ISearchable
{
    function query(int $currentPage, int $perPage, array $params) : LengthAwarePaginator;
}
