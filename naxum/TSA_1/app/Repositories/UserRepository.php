<?php

namespace App\Repositories;

use App\Constants\Category as CategoryConstants;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;

class UserRepository
{
    public function getTopDistributors()
    {
        $top_distributors = User::select('referred_by as distributor')
            ->where('referred_by', 33598) // Test only delete soon
            ->whereHas('userCategory.category', function (Builder $query) {
                $query->where('id', CategoryConstants::DISTRIBUTOR);
            })
            ->groupBy('referred_by')
            ->take(5) // Test only delete soon
            ->get() // Test only delete soon
            ->map(function ($item) {
                return [
                    'distributor' => $item->distributor,
                    'customers' => User::findOrFail($item->distributor)->customer,
                ];
            });

        dd($top_distributors);
    }
}
