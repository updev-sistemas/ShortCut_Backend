<?php

namespace App\Infrastrutures\Repositories;

use App\Domains\Contracts\Mappings\IInternalAutoMapper;
use App\Domains\Contracts\Repositories\ISearchable;
use App\Domains\Contracts\Repositories\IUserRepository;
use App\Domains\Contracts\ValueObjects\IValueObject;
use App\Domains\Entities\User;
use App\Domains\ValueObjects\UserValueObject;
use Illuminate\Pagination\LengthAwarePaginator;

class UserRepository extends DefaultRepository implements ISearchable, IUserRepository
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
            $result = $this->mapper->mapMultiple($data->items(), UserValueObject::class);
        }

        return $this->internal_wrapper_collection_with_paginate($currentPage, $perPage, $data->total(), $result);
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function getAll(): \Illuminate\Support\Collection
    {
        $collection = $this->internal_query()->get();

        if ($collection == null) {
            return $this->internal_wrapper_collection();
        }

        $result = $this->mapper->mapMultiple($collection, UserValueObject::class);
        return $this->internal_wrapper_collection($result);
    }

    /**
     * @param IValueObject $target
     * @return void
     * @throws \AutoMapperPlus\Exception\UnregisteredMappingException
     */
    public function save(IValueObject $target) : void
    {
        $source = $this->mapper->map($target, User::class);
        $source->saveOrFail();
    }

    /**
     * @param $cryptId
     * @param IValueObject $target
     * @return void
     * @throws \Exception
     */
    public function patch($cryptId, IValueObject $target) : void
    {
        $id = decrypt($cryptId);
        $source = User::find($id);
        if ($source == null)
        {
            throw new \Exception("Usuário #{$cryptId} não foi localizado.");
        }

        if ($target->name != $source->name)
        {
            $source->name = $target->name;
        }

        if ($target->email != $source->email)
        {
            $source->email = $target->email;
        }

        $source->update();
    }

    /**
     * @param $cryptId
     * @return IValueObject|null
     * @throws \AutoMapperPlus\Exception\UnregisteredMappingException
     */
    public function find($cryptId): ?IValueObject
    {
        $id = decrypt($cryptId);

        $source = User::find($id);

        if ($source == null)
        {
            return $source;
        }

        return $this->mapper->map($source, UserValueObject::class);
    }

    private function internal_query()
    {
        return User::query();
    }
}


