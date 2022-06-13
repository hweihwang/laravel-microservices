<?php

namespace Support\Providers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\ServiceProvider;
use Support\Repositories\EventRepository;
use Support\Repositories\FullTextSearchRepository\ElasticsearchEventRepository;
use Support\Services\Session\QueryBuilderSession;
use Support\Services\Session\TransactionalSession;
use Support\Transportation\API\Paging\BasePaging;
use Support\Transportation\API\Paging\LengthAwarePaging;
use Support\Transportation\API\Response\ErrorResponse;
use Support\Transportation\API\Response\SuccessResponse;
use Support\Transportation\API\Response\SymphonyJsonErrorResponse;
use Support\Transportation\API\Response\SymphonyJsonSuccessResponse;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(TransactionalSession::class, QueryBuilderSession::class);

        $this->app->singleton(EventRepository::class, ElasticsearchEventRepository::class);

        $this->app->singleton(BasePaging::class, LengthAwarePaging::class);

        $this->app->singleton(SuccessResponse::class, SymphonyJsonSuccessResponse::class);

        $this->app->singleton(ErrorResponse::class, SymphonyJsonErrorResponse::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        DB::listen(function ($query) {
            File::append(
                storage_path('/logs/query.log'),
                '[' . date('Y-m-d H:i:s') . ']' . PHP_EOL . $query->sql . ' [' . implode(', ', $query->bindings) . ']' . PHP_EOL . PHP_EOL
            );
        });
    }
}
