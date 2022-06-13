<?php

namespace Support\Filters;

use JeroenG\Explorer\Domain\Syntax\Term;

abstract class ElasticSearchFilter implements FullTextSearchFilter
{
    public function __construct(public array $must = [], public array $should = [], public array $filter = [])
    {
    }

    public function fromArray(array $data): BaseFilter
    {
        $must = [];

        foreach ($data as $key => $value) {
            $must[] = new Term($key, $value, 1);
        }

        return new static(
            must: $must
        );
    }

    public function toArray(): array
    {
        return [
            'must' => $this->must,
            'should' => $this->should,
            'filter' => $this->filter,
        ];
    }
}
