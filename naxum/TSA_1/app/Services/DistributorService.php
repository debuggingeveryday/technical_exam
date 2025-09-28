<?php

namespace App\Services;

use App\Repositories\UserRepository;
use Illuminate\Pagination\LengthAwarePaginator;

class DistributorService
{
    public function __construct(private UserRepository $userRepository) {}

    public function getTopDistributors(int $page = 1)
    {
        $per_page = 9;
        $top_distributors = $this->userRepository->getTopDistributors();

        $total = $top_distributors->count();
        $items = $top_distributors->forPage($page, $per_page);

        $paginated = new LengthAwarePaginator(
            $items,
            $total,
            $per_page,
            $page,
            ['path' => request()->url(), 'query' => request()->query()]
        );

        return [$items, $paginated->links()];
    }
}
