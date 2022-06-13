<?php

namespace Support\Transportation\API;

use Illuminate\Routing\Controller as BaseController;
use Support\Transportation\API\Concerns\APIFoundationTrait;

class APIController extends BaseController
{
    use APIFoundationTrait;
}
