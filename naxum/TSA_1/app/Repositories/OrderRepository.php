<?php

namespace App\Repositories;

use App\Constants\Category as CategoryConstants;
use App\Constants\Config;
use App\Models\Order;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\Relation;

class OrderRepository
{
    public function getOrders($filters)
    {
        extract($filters);

        $orders = Order::with(
            [
                'purchaser.distributor',
                'purchaser.referredBy',
                'purchaser' => function (Relation $query) {
                    $query->withCount('referredBy as reffered_distributor_count');
                },
                'orderItem.product',
            ])
            ->when(! empty($distributor), function (Builder $query) use (&$distributor) {
                if (is_numeric($distributor)) {
                    $id = (int) $distributor;
                    $query->where('id', $id);
                } elseif (is_string($distributor)) {
                    $name = (string) $distributor;
                    $query->where('first_name', 'like', $name)
                        ->orwhere('last_name', 'like', $name);
                }
            })
            ->whereHas('purchaser.userCategory.category', function (Builder $query) {
                $query->where('id', CategoryConstants::CUSTOMER);
            })
            ->whereHas('purchaser.distributor.userCategory.category', function (Builder $query) {
                $query->where('id', CategoryConstants::DISTRIBUTOR);
            })
            ->when(! empty($date_from) && ! empty($date_to), function (Builder $query) use (&$date_from, &$date_to) {
                $query->whereBetween('order_date', [$date_from, $date_to]);
            })
            ->paginate($limit ?? Config::PAGINATE_LIMIT);

        return $orders;
    }
}
