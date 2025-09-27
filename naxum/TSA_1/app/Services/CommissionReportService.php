<?php

declare(strict_types=1);

namespace App\Services;

use App\Repositories\OrderRepository;

class CommissionReportService
{
    public function __construct(private OrderRepository $orderRepository) {}

    public function getAllOrders($params)
    {
        $orders = $this->orderRepository->getOrders($params);

        return $orders;
    }
}
