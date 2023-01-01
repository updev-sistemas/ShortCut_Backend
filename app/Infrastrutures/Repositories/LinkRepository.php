<?php

namespace App\Infrastrutures\Repositories;

use App\Domains\Contracts\Mappings\IInternalAutoMapper;
use App\Domains\Contracts\Repositories\ISearchable;
use App\Domains\Contracts\Repositories\ILinkRepository;
use App\Domains\Contracts\ValueObjects\IValueObject;
use App\Domains\Entities\Link;
use App\Domains\ValueObjects\LinkValueObject;
use Illuminate\Pagination\LengthAwarePaginator;

class LinkRepository extends DefaultRepository implements ISearchable, ILinkRepository
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
            $result = $this->mapper->mapMultiple($data->items(), LinkValueObject::class);
        }

        return $this->internal_wrapper_collection_with_paginate($currentPage, $perPage, $data->total(), $result);
    }

    /**
     * @param int $id
     * @return LinkValueObject|null
     */
    public function find(int $id) : ?IValueObject
    {
        $target = Link::query()->where('id','=', $id)->first();

        if ($target == null)
            return $target;

        return $this->mapper->map($target, LinkValueObject::class);
    }

    /**
     * @param IValueObject $target
     * @return void
     * @throws \AutoMapperPlus\Exception\UnregisteredMappingException
     */
    public function save(IValueObject $target) : void
    {
        $targetToSave = $this->mapper->map($target, Link::class);
        $targetToSave->saveOrFail();
    }

    /**
     * @return string
     */
    public function generate_slug(): string
    {

    }

    /**
     * @return \Illuminate\Database\Eloquent\Builder
     */
    private function internal_query()
    {
        return Link::query();
    }
}
