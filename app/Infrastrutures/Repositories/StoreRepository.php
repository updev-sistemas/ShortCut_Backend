<?php

namespace App\Infrastrutures\Repositories;

use App\Domains\Contracts\Mappings\IInternalAutoMapper;
use App\Domains\Contracts\Repositories\ISearchable;
use App\Domains\Contracts\Repositories\IStoreRepository;
use App\Domains\Contracts\ValueObjects\IValueObject;
use App\Domains\Entities\Category;
use App\Domains\Entities\Store;
use App\Domains\ValueObjects\CategoryValueObject;
use App\Domains\ValueObjects\StoreValueObject;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class StoreRepository extends DefaultRepository implements ISearchable, IStoreRepository
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
            $result = $this->mapper->mapMultiple($data->items(), StoreValueObject::class);
        }

        return $this->internal_wrapper_collection_with_paginate($currentPage, $perPage, $data->total(), $result);
    }

    /**
     * @param IValueObject $target
     * @return void
     * @throws \AutoMapperPlus\Exception\UnregisteredMappingException
     */
    public function save(IValueObject $target) : void
    {
        $source = $this->mapper->map($target, Store::class);
        $source->saveOrFail();
    }

    /**
     * @param $cid
     * @param IValueObject $target
     * @return void
     * @throws \Exception
     */
    public function patch($cid, IValueObject $target) : void
    {
        $id = decrypt($cid);
        $source = Store::find($id);

        if ($source == null)
        {
            throw new \Exception('Loja não foi localizada.');
        }

        $source->name = $target->name;
        $source->saveOrFail();
    }

    /**
     * @return Collection
     */
    public function getAll(): Collection
    {
        $target = Store::all();

        if ($target == null)
        {
            return $this->internal_wrapper_collection();
        }

        $data = $this->mapper->mapMultiple($target, StoreValueObject::class);
        return $this->internal_wrapper_collection($data);
    }

    /**
     * @param $cid
     * @return IValueObject|null
     */
    public function find($cid): ?IValueObject
    {
        $id = decrypt($cid);
        $target = Store::find($id);

        if ($target == null)
        {
            return null;
        }

        return $this->mapper->map($target, StoreValueObject::class);
    }

    /**
     * @return Collection
     */
    public function getBySelectList(): Collection
    {
        $q = $this->internal_query();

        $result = $q->orderBy('name')->get(['id','name']);

        return $this->internal_wrapper_collection($result);
    }


    private function internal_query()
    {
        return Store::query();
    }
}

