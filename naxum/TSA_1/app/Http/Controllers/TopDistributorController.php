<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Services\DistributorService;
use App\Utilities\ObjectUtil;
use Illuminate\Http\Request;

class TopDistributorController extends Controller
{
    public function __construct(private DistributorService $distributorService) {}

    public function index(Request $request)
    {
        $page = $request->query('page');
        [$top_distributor, $links] = $this->distributorService->getTopDistributors((int) $request->query('page'));

        return view('pages.top-distributor', [
            'data' => ObjectUtil::arrayToFluentCollection($top_distributor->toArray()),
            'links' => $links,
            'page' => $page ?? 1,
        ]);
    }
}
