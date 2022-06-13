<?php

namespace Support\Repositories;

use Illuminate\Database\Eloquent\Model;
use Support\Filters\BaseFilter;
use Support\Models\BaseModel;

interface BaseRepository
{
    /**
     * @param $id
     */
    public function getById($id);

    /**
     * @param string[] $columns
     * @param string|null $orderBy
     * @param string $direction
     */
    public function getAll(array $columns = ['*'], ?string $orderBy = 'id', string $direction = 'desc');

    /**
     * @param int $perPage
     * @param int $page
     * @param string|null $orderBy
     * @param string $direction
     * @param string[] $columns
     * @param string $pageName
     */
    public function getAllPaginated(
        int     $perPage = 10,
        int     $page = 1,
        ?string $orderBy = 'id',
        string  $direction = 'desc',
        array   $columns = ['*'],
        string  $pageName = 'page'
    );

    /**
     * @param $search
     */
    public function search($search);

    /**
     * @param BaseFilter $filters
     * @param string $orderBy
     * @param string $direction
     * @param string[] $columns
     * @param string $search
     */
    public function filter(
        BaseFilter $filters,
        string     $orderBy = 'id',
        string     $direction = 'desc',
        array      $columns = ['*'],
        string     $search = ''
    );

    /**
     * @param BaseFilter|null $filters
     * @param int $perPage
     * @param int $page
     * @param string $orderBy
     * @param string $direction
     * @param string[] $columns
     * @param string $pageName
     * @param string $search
     */
    public function filterPaginated(
        ?BaseFilter $filters = null,
        int         $perPage = 10,
        int         $page = 1,
        string      $orderBy = 'id',
        string      $direction = 'desc',
        array       $columns = ['*'],
        string      $pageName = 'page',
        string      $search = ''
    );

    /**
     * @param BaseModel $model
     */
    public function setModel(BaseModel $model);

    /**
     */
    public function getModel();

    /**
     */
    public function getModelClass();

    /**
     */
    public function getModelShortClass();

    /**
     * @param array $attributes
     */
    public function add(array $attributes = []);

    /**
     * @param array $attributes
     */
    public function update(array $attributes = []);

    /**
     * @param $model
     */
    public function destroy($model);
//
//    /**
//     * @param Carbon|null $from
//     * @param Carbon|null $to
//     * @param string $ts
//     * @param string[] $columns
//     * @param null $orderBy
//     * @param string $direction
//     */
//    public function getDateBetween(
//        Carbon $from = null,
//        Carbon $to = null,
//        string $ts = 'created_at',
//        array  $columns = ['*'],
//               $orderBy = null,
//        string $direction = 'asc'
//    );
//
//    /**
//     * @param Carbon|null $from
//     * @param Carbon|null $to
//     * @param string $ts
//     * @param int $rows
//     * @param null $orderBy
//     * @param string $direction
//     * @param string[] $columns
//     * @param string $pageName
//     */
//    public function getDateBetweenPaginated(
//        Carbon $from = null,
//        Carbon $to = null,
//        string $ts = 'created_at',
//        int    $rows = 15,
//               $orderBy = null,
//        string $direction = 'asc',
//        array  $columns = ['*'],
//        string $pageName = 'page'
//    );
}
