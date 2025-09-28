<?php

namespace App\Utilities;

class NumberUtil
{
    public static function currencyFormat(int|float $amount, int $decimals = 0): string
    {
        return number_format($amount, $decimals, '.', ',');
    }

    public static function withDecimals(int|float $amount, int $decimals = 2): string
    {
        return number_format((float) $amount, $decimals, '.', ',');
    }
}
