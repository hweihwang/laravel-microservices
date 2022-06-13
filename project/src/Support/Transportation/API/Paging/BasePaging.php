<?php

namespace Support\Transportation\API\Paging;

use Illuminate\Contracts\Pagination\Paginator;

interface BasePaging
{
    public function fromPaginator(Paginator $paginator): self;

    public function toArray(): array;
}
