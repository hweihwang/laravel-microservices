<?php

declare(strict_types=1);

namespace Support\Repositories\FullTextSearchRepository;

use Illuminate\Support\Collection;
use Support\Filters\BaseFilter;
use Support\Models\BaseModel;

abstract class ElasticsearchRepository implements BaseFullTextSearchRepository
{
    /**
     * @var BaseModel
     */
    public BaseModel $model;

    public function setModel(BaseModel $model): static
    {
        $this->model = $model;

        return $this;
    }

    public function getModel(): BaseModel
    {
        return $this->model;
    }

    public function getModelClass(): string
    {
        return get_class($this->model);
    }

    public function getModelShortClass(): string
    {
        return class_basename($this->getModelClass());
    }

    public function getAll(array $columns = ['*'], ?string $orderBy = 'id', string $direction = 'desc'): Collection
    {
        return $this->getModel()->search()->orderBy($orderBy, $direction)->getData($columns);
    }

    public function getAllPaginated(
        int     $perPage = 10,
        int     $page = 1,
        ?string $orderBy = 'id',
        string  $direction = 'desc',
        array   $columns = ['*'],
        string  $pageName = 'page'
    )
    {
        return $this->getModel()->search()->orderBy($orderBy, $direction)->paginateData($columns, $perPage, $pageName, $page);
    }

    public function getById($id)
    {
        return $this->getModel()->search()->where('id', $id)->take(1)->getData()->first();
    }

    public function search($search)
    {
        return $this->getModel()->search($search)->getData();
    }

    public function filter(
        BaseFilter $filters,
        string     $orderBy = 'id',
        string     $direction = 'desc',
        array      $columns = ['*'],
        string     $search = ''
    ): Collection
    {
        return $this->getModel()
            ->search($search)
            ->applyFilters($filters)
            ->orderBy($orderBy, $direction)
            ->getData($columns);
    }

    public function filterPaginated(
        ?BaseFilter $filters = null,
        int         $perPage = 10,
        int         $page = 1,
        string      $orderBy = 'id',
        string      $direction = 'desc',
        array       $columns = ['*'],
        string      $pageName = 'page',
        string      $search = ''
    )
    {
        return $this->getModel()
            ->search($search)
            ->applyFilters($filters)
            ->orderBy($orderBy, $direction)
            ->paginateData($columns, $perPage, $pageName, $page);
    }

    public function add(array $attributes = [], bool $isBulk = false)
    {
        if($isBulk) {
            return $this->getModel()->bulkIndexData($attributes)->searchable();
        }

        return $this->getModel()->mapIndexableData($attributes)->searchable();
    }

    public function update(array $attributes = [], bool $isBulk = false)
    {
        if($isBulk) {
            return $this->getModel()->bulkIndexData($attributes)->searchable();
        }

        return $this->getModel()->mapIndexableData($attributes)->searchable();
    }

    public function destroy($model)
    {
        if ($model) return $model->unsearchable();

        return $this->getModel()->unsearchable();
    }
}
