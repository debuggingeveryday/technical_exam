<?php

namespace App\Repositories;

use App\Constants\Category as CategoryConstants;
use App\Constants\Config;
use App\Models\Order;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\Relation;

class OrderRepository
{
    public function getOrders($filters)
    {
        extract($filters);

        $orders = Order::when(! empty($distributor), function (Builder $query) use (&$distributor) {
            $query->withWhereHas('purchaser.distributor', function (Builder|Relation $query) use (&$distributor) {
                if (is_numeric($distributor)) {
                    $id = $distributor;
                    $query->where('id', $id);
                } elseif (is_string($distributor)) {
                    $name = $distributor;
                    $query->where('first_name', 'like', $name)
                        ->orWhere('last_name', 'like', $name);
                }
            });
        })
            ->with(
                [
                    'purchaser.distributor',
                    'purchaser.referredBy',
                    'purchaser' => function (Relation $query) {
                        $query->withCount('referredBy as reffered_distributor_count');
                    },
                    'orderItem.product',
            ])
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

    public function getTopDistributors()
    {
        $top_distributors = User::whereHas('userCategory.category', function (Builder $query) {
            $query->where('id', CategoryConstants::DISTRIBUTOR);
        })->get()->toArray();

        return $top_distributors;
    }
}
