<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Services\DistributorService;

class TopDistributorController extends Controller
{
    public function __construct(private DistributorService $distributorService) {}

    public function index()
    {
        $top_distributor = $this->distributorService->getTopDistributors();

        dd($top_distributor);

        return view('pages.top-distributor');
    }
}
