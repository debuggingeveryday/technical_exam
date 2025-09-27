<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\DistributorFilterRequest;
use App\Http\Resources\CommissionReportResource;
use App\Services\CommissionReportService;
use App\Utilities\ObjectUtil;

class CommissionReportController extends Controller
{
    public function __construct(private CommissionReportService $commissionReportService) {}

    public function index(DistributorFilterRequest $request)
    {
        $orders = $this->commissionReportService->getAllOrders($request->validated());

        $commissions = CommissionReportResource::collection($orders)->resolve();

        return view('pages.commission-report', [
            'data' => ObjectUtil::arrayToFluentCollection($commissions),
            'links' => [
                'paginator' => $orders->links()->paginator,
                'element' => $orders->links()->element,
            ],
        ]);

    }
}
