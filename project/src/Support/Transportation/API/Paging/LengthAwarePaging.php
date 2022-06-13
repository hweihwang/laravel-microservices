<?php

namespace Support\Transportation\API\Paging;

use Exception;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Contracts\Pagination\Paginator;

class LengthAwarePaging implements BasePaging
{
    private int $currentPage;

    private int $perPage;

    private int $lastPage;

    private int $total;

    /**
     * @return int
     */
    public function getCurrentPage(): int
    {
        return $this->currentPage;
    }

    /**
     * @param int $currentPage
     * @return LengthAwarePaging
     */
    public function setCurrentPage(int $currentPage): self
    {
        $this->currentPage = $currentPage;
        return $this;
    }

    /**
     * @return int
     */
    public function getPerPage(): int
    {
        return $this->perPage;
    }

    /**
     * @param int $perPage
     * @return LengthAwarePaging
     */
    public function setPerPage(int $perPage): self
    {
        $this->perPage = $perPage;
        return $this;
    }

    /**
     * @return int
     */
    public function getLastPage(): int
    {
        return $this->lastPage;
    }

    /**
     * @param int $lastPage
     * @return LengthAwarePaging
     */
    public function setLastPage(int $lastPage): self
    {
        $this->lastPage = $lastPage;
        return $this;
    }

    /**
     * @return int
     */
    public function getTotal(): int
    {
        return $this->total;
    }

    /**
     * @param int $total
     * @return LengthAwarePaging
     */
    public function setTotal(int $total): self
    {
        $this->total = $total;
        return $this;
    }

    /**
     * @param Paginator $paginatedData
     * @return $this
     * @throws Exception
     */
    public function fromPaginator(Paginator $paginatedData): self
    {
        if (!$paginatedData instanceof LengthAwarePaginator) {
            throw new Exception('Paginator must be instance of LengthAwarePaginator');
        }

        $this->setCurrentPage($paginatedData->currentPage());
        $this->setPerPage($paginatedData->perPage());
        $this->setLastPage($paginatedData->lastPage());
        $this->setTotal($paginatedData->total());


        return $this;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'current_page' => $this->getCurrentPage(),
            'per_page' => $this->getPerPage(),
            'last_page' => $this->getLastPage(),
            'total' => $this->getTotal(),
        ];
    }
}
