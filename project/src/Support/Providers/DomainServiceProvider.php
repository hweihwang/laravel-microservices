<?php

namespace Support\Providers;

use Illuminate\Support\ServiceProvider;
use Module\Product\Providers\ProductServiceProvider;
use Module\Test\Providers\TestServiceProvider;

class DomainServiceProvider extends ServiceProvider
{
    private array $modules = [
        TestServiceProvider::class
    ];

    public function register()
    {
        foreach ($this->modules as $module) {
            $this->app->register($module);
        }
    }
}
