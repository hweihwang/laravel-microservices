<?php

declare(strict_types=1);

namespace Support\Mixins;

interface BaseScoutBuilderMacros
{
    public function getData();

    public function paginateData();

    public function applyFilters();
}
