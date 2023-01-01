<?php

namespace App\Infrastrutures\Repositories;

use App\Domains\Contracts\Mappings\IInternalAutoMapper;
use AutoMapperPlus\AutoMapperInterface;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\URL;

abstract class DefaultRepository
{
    protected AutoMapperInterface $mapper;

    public function __construct(IInternalAutoMapper $mapper)
    {
        $this->mapper = $mapper->build();
    }

    /**
     * @param $collection
     * @return Collection
     */
    protected function internal_wrapper_collection($collection = null)
    {
        if ($collection == null) {
            return new Collection([]);
        } else {
            return new Collection($collection);
        }
    }

    /**
     * @param int $currentPage
     * @param int $perPage
     * @param $collection
     * @return LengthAwarePaginator
     */
    protected function internal_wrapper_collection_with_paginate(int $currentPage, int $perPage, int $total, $collection = null)
    {
        $data = $this->internal_wrapper_collection($collection);
        return new LengthAwarePaginator($data, $total, $perPage, $currentPage, [
            'path' =>  URL::current(),
            'pageName' => 'page'
        ]);
    }
}
