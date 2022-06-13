<?php

namespace Support\Models;

use Illuminate\Support\Collection;

trait ManuallyIndexable
{
    public string $scoutKeyName = 'id';

    public array $indexArr = [];

    public function mapIndexableData(array $attributes): static
    {
        $mappableAs = $this->mappableAs();

        $indexable = [];

        foreach ($attributes as $key => $value) {
            if (isset($mappableAs[$key])) {
                $indexable[$key] = $value;
            }
        }

        $this->indexArr = $indexable;

        return $this;
    }

    public function getIndexableData(): array
    {
        return $this->indexArr;
    }

    public function getScoutKey()
    {
        return $this->indexArr[$this->scoutKeyName];
    }

    public function bulkIndexData(array $items): Collection
    {
        $arrayModels = [];

        foreach ($items as $item) {
            $model = new static();

            $model->mapIndexableData($item);

            $arrayModels[] = $model;
        }

        return $this->newCollection($arrayModels);
    }
}
