<?php

namespace Support\DTOs;

use Support\Filters\BaseFilter;

abstract class BaseFilterDTO implements BaseDTO
{
    protected ?BaseFilter $filters = null;

    protected int $perPage = 10;

    protected int $page = 1;

    protected string $orderBy = 'id';

    protected string $direction = 'desc';

    protected array $columns = ['*'];

    protected string $pageName = 'page';

    protected string $search = '';

    /**
     * @return BaseFilter|null
     */
    public function getFilters(): ?BaseFilter
    {
        return $this->filters;
    }

    /**
     * @param BaseFilter $filters
     * @return BaseFilterDTO
     */
    public function setFilters(BaseFilter $filters): static
    {
        $this->filters = $filters;
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
     * @return BaseFilterDTO
     */
    public function setPerPage(int $perPage): static
    {
        $this->perPage = $perPage;
        return $this;
    }

    /**
     * @return int
     */
    public function getPage(): int
    {
        return $this->page;
    }

    /**
     * @param int $page
     * @return BaseFilterDTO
     */
    public function setPage(int $page): static
    {
        $this->page = $page;
        return $this;
    }

    /**
     * @return string
     */
    public function getOrderBy(): string
    {
        return $this->orderBy;
    }

    /**
     * @param string $orderBy
     * @return BaseFilterDTO
     */
    public function setOrderBy(string $orderBy): static
    {
        $this->orderBy = $orderBy;
        return $this;
    }

    /**
     * @return string
     */
    public function getDirection(): string
    {
        return $this->direction;
    }

    /**
     * @param string $direction
     * @return BaseFilterDTO
     */
    public function setDirection(string $direction): static
    {
        $this->direction = $direction;
        return $this;
    }

    /**
     * @return array
     */
    public function getColumns(): array
    {
        return $this->columns;
    }

    /**
     * @param array|string[] $columns
     * @return BaseFilterDTO
     */
    public function setColumns(array $columns): static
    {
        $this->columns = $columns;
        return $this;
    }

    /**
     * @return string
     */
    public function getPageName(): string
    {
        return $this->pageName;
    }

    /**
     * @param string $pageName
     * @return BaseFilterDTO
     */
    public function setPageName(string $pageName): static
    {
        $this->pageName = $pageName;
        return $this;
    }

    /**
     * @return string
     */
    public function getSearch(): string
    {
        return $this->search;
    }

    /**
     * @param string $search
     * @return BaseFilterDTO
     */
    public function setSearch(string $search): static
    {
        $this->search = $search;
        return $this;
    }

    public function fromArray(array $data): self
    {
        if (isset($data['filters'])) {
            $this->setFilters($data['filters']);
        }

        if (isset($data['perPage'])) {
            $this->setPerPage($data['perPage']);
        }

        if (isset($data['page'])) {
            $this->setPage($data['page']);
        }

        if (isset($data['orderBy'])) {
            $this->setOrderBy($data['orderBy']);
        }

        if (isset($data['direction'])) {
            $this->setDirection($data['direction']);
        }

        if (isset($data['columns'])) {
            $this->setColumns($data['columns']);
        }

        if (isset($data['pageName'])) {
            $this->setPageName($data['pageName']);
        }

        if (isset($data['search'])) {
            $this->setSearch($data['search']);
        }

        return $this;
    }

    public function toArray(): array
    {
        return [
            'filters' => $this->getFilters(),
            'perPage' => $this->getPerPage(),
            'page' => $this->getPage(),
            'orderBy' => $this->getOrderBy(),
            'direction' => $this->getDirection(),
            'columns' => $this->getColumns(),
            'pageName' => $this->getPageName(),
            'search' => $this->getSearch(),
        ];
    }
}
