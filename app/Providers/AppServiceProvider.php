<?php

namespace App\Providers;

use App\Domains\Contracts\Mappings\IInternalAutoMapper;
use App\Domains\Contracts\Repositories\ICategoryRepository;
use App\Domains\Contracts\Repositories\IDbContext;
use App\Domains\Contracts\Repositories\ILinkRepository;
use App\Domains\Contracts\Repositories\IStatisticRepository;
use App\Domains\Contracts\Repositories\IStoreRepository;
use App\Domains\Contracts\Repositories\IUserRepository;
use App\Domains\Entities\Category;
use App\Domains\Entities\Link;
use App\Domains\Entities\Statistic;
use App\Domains\Entities\Store;
use App\Domains\Entities\User;
use App\Domains\ValueObjects\CategoryValueObject;
use App\Domains\ValueObjects\LinkValueObject;
use App\Domains\ValueObjects\StatisticValueObject;
use App\Domains\ValueObjects\StoreValueObject;
use App\Domains\ValueObjects\UserValueObject;
use App\Infrastrutures\Repositories\CategoryRepository;
use App\Infrastrutures\Repositories\DbContext;
use App\Infrastrutures\Repositories\LinkRepository;
use App\Infrastrutures\Repositories\StatisticRepository;
use App\Infrastrutures\Repositories\StoreRepository;
use App\Infrastrutures\Repositories\UserRepository;
use App\Mappings\InternalAutoMapper;
use AutoMapperPlus\AutoMapper;
use AutoMapperPlus\AutoMapperInterface;
use AutoMapperPlus\Configuration\AutoMapperConfig;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(IInternalAutoMapper::class, InternalAutoMapper::class);
        $this->app->singleton(ICategoryRepository::class, CategoryRepository::class);
        $this->app->singleton(ILinkRepository::class, LinkRepository::class);
        $this->app->singleton(IStatisticRepository::class, StatisticRepository::class);
        $this->app->singleton(IStoreRepository::class, StoreRepository::class);
        $this->app->singleton(IUserRepository::class, UserRepository::class);

        $this->app->singleton(IDbContext::class, DbContext::class);
        //
    }



    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
