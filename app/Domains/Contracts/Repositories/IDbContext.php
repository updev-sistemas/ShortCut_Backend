<?php

namespace App\Domains\Contracts\Repositories;

interface IDbContext
{
    function inTransaction() : IDbContext;
    function commit() : IDbContext;
    function rollback() : IDbContext;
    function category() : ICategoryRepository;
    function link() : ILinkRepository;
    function statistic() : IStatisticRepository;
    function store() : IStoreRepository;
    function user() : IUserRepository;
}
