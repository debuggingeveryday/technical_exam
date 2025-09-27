<?php

namespace App\Utilities;

use Illuminate\Support\Collection;
use Illuminate\Support\Fluent;

class ObjectUtil
{
    public static function arrayToFluentCollection(?array $arr = []): Collection
    {
        return collect($arr)->mapInto(Fluent::class);
    }
}
