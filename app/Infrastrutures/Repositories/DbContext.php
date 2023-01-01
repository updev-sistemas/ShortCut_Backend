<?php

namespace App\Infrastrutures\Repositories;

use App\Domains\Contracts\Repositories\ICategoryRepository;
use App\Domains\Contracts\Repositories\IDbContext;
use App\Domains\Contracts\Repositories\ILinkRepository;
use App\Domains\Contracts\Repositories\IStatisticRepository;
use App\Domains\Contracts\Repositories\IStoreRepository;
use App\Domains\Contracts\Repositories\IUserRepository;
use Illuminate\Support\Facades\DB;

class DbContext implements IDbContext
{
    private ICategoryRepository $category;
    private ILinkRepository $link;
    private IStatisticRepository $statistic;
    private IStoreRepository $store;
    private IUserRepository $user;

    public function __construct(ICategoryRepository $obj1, ILinkRepository $obj2, IStatisticRepository $obj3, IStoreRepository $obj4, IUserRepository $obj5)
    {
        $this->category = $obj1;
        $this->link = $obj2;
        $this->statistic = $obj3;
        $this->store = $obj4;
        $this->user = $obj5;
    }

    public function category() : ICategoryRepository
    {
        return $this->category;
    }

    public function link() : ILinkRepository
    {
        return $this->link;
    }

    public function statistic() : IStatisticRepository
    {
        return $this->statistic;
    }

    public function store() : IStoreRepository
    {
        return $this->store;
    }

    public function user() : IUserRepository
    {
        return $this->user;
    }

    public function inTransaction() : IDbContext
    {
        DB::beginTransaction();
        return $this;
    }

    public function commit() : IDbContext
    {
        DB::commit();
        return $this;
    }

    public function rollback() : IDbContext
    {
        DB::rollBack();
        return $this;
    }
}
