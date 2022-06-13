<?php

namespace Support\Repositories\ORMRepository;

use Carbon\Carbon;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;
use Support\Repositories\BaseRepository;

interface BaseORMRepository extends BaseRepository
{
    /**
     * @param string $query
     * @param string $orderBy
     * @param string $direction
     */
    public function sort(mixed &$query, string $orderBy = 'id', string $direction = 'desc');

    /**
     * @param $attributes
     * @param $model
     */
    public function onlyFillable($attributes, $model);

    /**
     * @param $attributes
     * @param null $model
     */
    public function save($attributes, $model = null);

    /**
     * @param $attributes
     */
    public function firstOrCreate($attributes);

    /**
     * @param $query
     */
    public function setQuery($query);

    /**
     */
    public function getQuery();

    /**
     * @param $orderBy
     * @param $direction
     */
    public function applySort($orderBy = null, $direction = null);

    /**
     * @param array $ids
     */
    public function deleteByIds(array $ids);

    /**
     * @param $relationshipOrderBy
     */
    public function getRelation($relationshipOrderBy);

    /**
     * @param $relationshipOrderBy
     */
    public function getRelatedTable($relationshipOrderBy);

    /**
     * @param $relationshipOrderBy
     */
    public function getRelatedForeignKey($relationshipOrderBy);

    /**
     * @param $relationshipOrderBy
     */
    public function getRelatedSortColumn($relationshipOrderBy);

    /**
     * @param $filters
     */
    public function applyFilters($filters);

    /**
     */
    public function getModelFilters();

    /**
     */
    public function getTableColumns();

    /**
     */
    public function getSearchableTableColumns();

    /**
     * @param $filters
     * @param $orderBy
     * @param $direction
     * @param $search
     */
    public function buildFilteredQuery($filters, $orderBy, $direction, $search);

    /**
     * @param Carbon|null $from
     * @param Carbon|null $to
     * @param string $ts
     * @param string[] $columns
     * @param string|null $orderBy
     * @param string $direction
     * @return Collection|array
     */
    public function getDateBetween(
        Carbon  $from = null,
        Carbon  $to = null,
        string  $ts = 'created_at',
        array   $columns = ['*'],
        ?string $orderBy = 'id',
        string  $direction = 'desc'
    ): Collection|array;

    /**
     * @param Carbon|null $from
     * @param Carbon|null $to
     * @param string $ts
     * @param int $perPage
     * @param int $page
     * @param string|null $orderBy
     * @param string $direction
     * @param string[] $columns
     * @param string $pageName
     * @return LengthAwarePaginator
     */
    public function getDateBetweenPaginated(
        Carbon  $from = null,
        Carbon  $to = null,
        string  $ts = 'created_at',
        int     $perPage = 15,
        int     $page = 1,
        ?string $orderBy = 'id',
        string  $direction = 'desc',
        array   $columns = ['*'],
        string  $pageName = 'page'
    ): LengthAwarePaginator;
}
