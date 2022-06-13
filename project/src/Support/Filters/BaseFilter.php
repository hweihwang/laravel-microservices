<?php

namespace Support\Filters;

interface BaseFilter
{
    public function fromArray(array $data): self;

    public function toArray(): array;
}
