<?php

namespace Support\DTOs;

interface BaseDTO
{
    public function fromArray(array $data): self;

    public function toArray(): array;
}
