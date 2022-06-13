<?php

declare(strict_types=1);

namespace Support\Models;

use Illuminate\Database\Eloquent\Model;
use JeroenG\Explorer\Application\Explored;
use JeroenG\Explorer\Application\ManuallyIndexable;
use Laravel\Scout\Searchable;
use Support\Models\ManuallyIndexable as ManuallyIndexableTrait;

abstract class SearchableEloquentModel extends Model implements Explored, BaseModel, ManuallyIndexable
{
    use ManuallyIndexableTrait, Searchable {
        ManuallyIndexableTrait::getScoutKey insteadof Searchable;
    }
}
