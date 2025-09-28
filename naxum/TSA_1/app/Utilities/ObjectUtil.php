<?php

namespace App\Utilities;

use Illuminate\Support\Fluent;

class ObjectUtil
{
    public static function arrayToFluentCollection(?array $arr = [])
    {
        return collect($arr)->mapInto(Fluent::class);
    }
}
