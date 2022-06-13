<?php

namespace Module\Test\Models;

use Laravel\Scout\Searchable;
use Support\Models\SearchableEloquentModel;

class Test extends SearchableEloquentModel
{
    protected $fillable = [
        'name',
        'description',
        'status',
    ];

    public function toSearchableArray(): array
    {
        return [
            'id' => $this->getAttribute('id'),
            'name' => $this->getAttribute('name'),
            'description' => $this->getAttribute('description'),
            'status' => $this->getAttribute('status'),
        ];
    }

    public function mappableAs(): array
    {
        return [
            'id' => 'keyword',
            'name' => 'text',
            'description' => 'text',
            'status' => 'long',
        ];
    }
}
