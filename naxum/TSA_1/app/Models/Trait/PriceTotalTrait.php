<?php

declare(strict_types=1);

namespace App\Models\Trait;

trait PriceTotalTrait
{
    public function getOrderSumUpPrice()
    {
        return collect($this->orderItem)->reduce(function (?float $carry, $item) {
            return $carry + ($item->product->price * $item->quantity);
        });
    }
}
