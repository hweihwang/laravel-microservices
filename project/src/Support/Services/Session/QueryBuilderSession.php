<?php

namespace Support\Services\Session;

use Illuminate\Support\Facades\DB;

class QueryBuilderSession implements TransactionalSession
{
    public function executeAtomically(callable $callback)
    {
        return DB::transaction($callback);
    }
}
