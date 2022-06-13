<?php

namespace Support\Services\Session;

interface TransactionalSession
{
    public function executeAtomically(callable $callback);
}
