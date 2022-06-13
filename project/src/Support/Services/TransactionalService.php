<?php

namespace Support\Services;

use Support\DTOs\BaseDTO;
use Support\Services\Session\TransactionalSession;

class TransactionalService implements BaseService
{
    public function __construct(private readonly BaseService $service, private readonly TransactionalSession $session)
    {
    }

    public function execute(BaseDTO $dto)
    {
        $operation = fn() => $this->service->execute($dto);

        return $this->session->executeAtomically($operation);
    }
}
