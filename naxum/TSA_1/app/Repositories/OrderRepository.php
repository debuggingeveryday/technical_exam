<?php

namespace App\Repositories;

use App\Constants\Category as CategoryConstants;
use App\Constants\Config;
use App\Models\Order;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\Fluent;

class OrderRepository
{
    public function getOrders($filters)
    {
        extract($filters);

        $orders = Order::when(! empty($distributor) && ! is_numeric($distributor), function (builder $query) use (&$distributor) {
            $query->withwherehas('purchaser.distributor', function (builder|relation $query) use (&$distributor) {
                $query->where('first_name', 'like', $distributor)
                    ->orwhere('last_name', 'like', $distributor);
            });
        })
            ->when(! empty($distributor) && is_numeric($distributor), function (builder $query) use (&$distributor) {
                $query->withwherehas('purchaser.distributor', function (builder|relation $query) use (&$distributor) {
                    $query->where('id', '=', $distributor);
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

    public function getOrderDetails(Order $order)
    {
        $order_details = $order->orderItem->load('product')->map(fn ($item) => [
            'sku' => $item->product->sku,
            'name' => $item->product->name,
            'price' => $item->product->price,
            'quantity' => $item->quantity,
            'total' => $item->product->price * $item->quantity,
        ])->mapInto(Fluent::class);

        return $order_details;
    }

    public function getTopDistributors()
    {
        $top_distributors = User::whereHas('userCategory.category', function (Builder $query) {
            $query->where('id', CategoryConstants::DISTRIBUTOR);
        })->get()->toArray();

        return $top_distributors;
    }
}
