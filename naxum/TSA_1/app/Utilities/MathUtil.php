<?php

declare(strict_types=1);

namespace App\Utilities;

class MathUtil
{
    public static function removeDecimalPoint(float|int $number = 0): int
    {
        return (int) round($number, 0);
    }
}
