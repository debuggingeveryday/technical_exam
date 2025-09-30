<?php

declare(strict_types=1);

namespace App\Models\Trait;

use App\Constants\CommissionPercentage;

trait CommissionTrait
{
    public function getCommissionsPercentage()
    {
        $referred_count = $this->purchaser->reffered_distributor_count;

        if ($referred_count >= 30) {
            return CommissionPercentage::THIRTY_PERCENT;
        } elseif ($referred_count >= 21 && $referred_count <= 29) {
            return CommissionPercentage::TWENTY_PERCENT;
        } elseif ($referred_count >= 11 && $referred_count <= 20) {
            return CommissionPercentage::FIFTEEN_PERCENT;
        } elseif ($referred_count >= 5 && $referred_count <= 10) {
            return CommissionPercentage::TEN_PERCENT;
        } elseif ($referred_count >= 4) {
            return CommissionPercentage::FIVE_PERCENT;
        }

        return 0;
    }

    public function getCommissions()
    {
        return $this->getCommissionsPercentage() * $this->getOrderSumUpPrice();
    }
}
