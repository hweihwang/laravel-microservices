<?php

namespace Support\Models;

use Illuminate\Support\Collection;
use JeroenG\Explorer\Application\Explored;
use JeroenG\Explorer\Application\ManuallyIndexable;
use Laravel\Scout\Builder;
use Laravel\Scout\Searchable;
use Support\Models\ManuallyIndexable as ManuallyIndexableTrait;

abstract class SearchableModel implements Explored, BaseModel, ManuallyIndexable
{
    use ManuallyIndexableTrait, Searchable {
        ManuallyIndexableTrait::getScoutKey insteadof Searchable;
    }

    public function newCollection(array $models = []): Collection
    {
        $models = new Collection($models);

        Collection::macro('searchable', function () use ($models) {
            if ($models->isEmpty()) {
                return;
            }

            return $models->first()->searchableUsing()->update($models);
        });

        return $models;
    }

    public static function makeAllSearchable($chunk = null)
    {

    }

    public function getScoutModelsByIds(Builder $builder, array $ids)
    {
        return collect([]);
    }

    public function getScoutKeyName()
    {
        return '';
    }

    public function toJson($options = 0)
    {
        return json_encode($this);
    }
}
