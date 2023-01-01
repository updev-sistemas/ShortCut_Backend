<?php

namespace App\Infrastrutures\Repositories;

use App\Domains\Contracts\Mappings\IInternalAutoMapper;
use App\Domains\Contracts\Repositories\ISearchable;
use App\Domains\Contracts\Repositories\IStatisticRepository;
use App\Domains\Entities\Statistic;
use App\Domains\ValueObjects\StatisticValueObject;
use Illuminate\Pagination\LengthAwarePaginator;

class StatisticRepository extends DefaultRepository implements ISearchable, IStatisticRepository
{
    public function __construct(IInternalAutoMapper $mapper)
    {
        parent::__construct($mapper);
    }

    /**
     * @param int $currentPage
     * @param int $perPage
     * @param array $params
     * @return LengthAwarePaginator
     */
    public function query(int $currentPage, int $perPage, array $params) : LengthAwarePaginator
    {
        $query = $this->internal_query();

        $data = $query->paginate($perPage, ['*'], 'page', $currentPage);

        $result = [];
        if ($data != null)
        {
            $result = $this->mapper->mapMultiple($data->items(), StatisticValueObject::class);
        }

        return $this->internal_wrapper_collection_with_paginate($currentPage, $perPage, $data->total(), $result);
    }


    private function internal_query()
    {
        return Statistic::query();
    }
}

