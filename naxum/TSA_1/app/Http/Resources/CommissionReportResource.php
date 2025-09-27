<?php

declare(strict_types=1);

namespace App\Http\Resources;

use App\Utilities\MathUtil;
use App\Utilities\UserUtil;
use Illuminate\Http\Resources\Json\JsonResource;

class CommissionReportResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $purchaser_name = UserUtil::fullName($this->purchaser);
        $distributor_name = UserUtil::fullName($this->purchaser->distributor);
        $order_total = $this->getOrderSumUpPrice();
        $reffered_distributor_count = $this->purchaser->reffered_distributor_count;
        $commission_percentage = $this->getCommissionsPercentage();
        $distributor_commission = $this->getCommissions();

        return [
            'id' => $this->id,
            'invoice_number' => $this->invoice_number,
            'purchaser' => $purchaser_name,
            'distributor' => $distributor_name,
            'reffered_distributor' => $reffered_distributor_count,
            'order_date' => $this->order_date,
            'order_total' => $order_total,
            'percentage' => MathUtil::removeDecimalPoint($commission_percentage * 100),
            'distributors_commissions' => $distributor_commission,
        ];
    }
}
