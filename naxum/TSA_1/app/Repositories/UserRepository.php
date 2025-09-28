<?php

namespace App\Repositories;

use App\Constants\Category as CategoryConstants;
use App\Models\User;
use App\Utilities\CommissionUtil;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class UserRepository
{
    public function getTopDistributors()
    {
        $top_distributors = User::select('referred_by as distributor', DB::raw('COUNT(*) as referred_count'))
            ->whereHas('userCategory.category', function (Builder $query) {
                $query->where('id', CategoryConstants::DISTRIBUTOR);
            })
            ->groupBy('referred_by')
            ->get()
            ->map(function ($item, $index) {
                $referred_count = $item->referred_count;
                $distributor = User::where('id', $item->distributor)->first();

                if (! empty($distributor)) {
                    [$total_quantity, $total_price] = $distributor->load('purchaser.order.orderItem.product')->purchaser
                        ->reduceSpread(function ($total_quantity, $total_price, $item) {

                            $item->order->each(function ($item) use (&$total_quantity, &$total_price) {
                                $item->orderItem->each(function ($item) use (&$total_quantity, &$total_price) {
                                    $total_quantity += $item->quantity;
                                    $total_price += $item->product->price;
                                });
                            });

                            return [$total_quantity, $total_price];

                        }, 0, 0);

                    $distributor = $distributor->only('first_name', 'last_name');
                    $commission_percentage = CommissionUtil::getCommissionsPercentage($referred_count);
                    $sales = $total_quantity * $total_price;
                    $commission = $commission_percentage * $sales;
                    $total_sales = $commission + $sales;

                    return [
                        'distributor' => Arr::join($distributor, ' '),
                        'referred_count' => $referred_count,
                        'commision_percentage' => $commission_percentage,
                        'sales' => $sales,
                        'total_sales' => $total_sales,
                    ];
                }
            })
            ->sortByDesc('total_sales')
            ->values();

        return $top_distributors;
    }
}
