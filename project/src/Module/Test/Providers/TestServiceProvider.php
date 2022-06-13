<?php

namespace Module\Test\Providers;

use Illuminate\Support\ServiceProvider;
use Module\Test\DTOs\BaseTestFilterDTO;
use Module\Test\DTOs\BaseTestStoreDTO;
use Module\Test\DTOs\TestFilterDTO;
use Module\Test\DTOs\TestStoreDTO;
use Module\Test\Filters\BaseTestFilter;
use Module\Test\Filters\ElasticsearchTestFilter;
use Module\Test\Listeners\External\TestCreatedIndex;
use Module\Test\Repositories\FullTextSearchRepository\ElasticsearchTestRepository;
use Module\Test\Repositories\ORMRepository\EloquentTestRepository;
use Module\Test\Repositories\TestRepository;
use Module\Test\Services\BaseTestFilterService;
use Module\Test\Services\BaseTestStoreService;
use Module\Test\Services\TestFilterService;
use Module\Test\Services\TestStoreService;
use Module\Test\Services\TransactionalTestFilterService;
use Module\Test\Services\TransactionalTestStoreService;
use Support\Repositories\FullTextSearchRepository\BaseFullTextSearchRepository;
use Support\Services\BaseService;

class TestServiceProvider extends ServiceProvider
{
    public function register()
    {
        //Test filter
        $this->app->singleton(BaseTestFilterService::class, TransactionalTestFilterService::class);

        $this->app->when(TestFilterService::class)
            ->needs(TestRepository::class)
            ->give(ElasticsearchTestRepository::class);

        $this->app->when(TransactionalTestFilterService::class)
            ->needs(BaseService::class)
            ->give(TestFilterService::class);

        $this->app->singleton(BaseTestFilterDTO::class, TestFilterDTO::class);

        $this->app->singleton(BaseTestFilter::class, ElasticsearchTestFilter::class);

        //Test store
        $this->app->singleton(BaseTestStoreService::class, TransactionalTestStoreService::class);

        $this->app->when(TestStoreService::class)
            ->needs(TestRepository::class)
            ->give(EloquentTestRepository::class);

        $this->app->when(TransactionalTestStoreService::class)
            ->needs(BaseService::class)
            ->give(TestStoreService::class);

        $this->app->singleton(BaseTestStoreDTO::class, TestStoreDTO::class);

        //Test event
        $this->app->when(TestCreatedIndex::class)
            ->needs(BaseFullTextSearchRepository::class)
            ->give(ElasticsearchTestRepository::class);

    }
}
