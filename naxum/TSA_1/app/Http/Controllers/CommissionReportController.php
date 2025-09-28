<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Resources\CommissionReportResource;
use App\Models\Order;
use App\Services\CommissionReportService;
use App\Utilities\ObjectUtil;
use Illuminate\Http\Request;

class CommissionReportController extends Controller
{
    public function __construct(private CommissionReportService $commissionReportService) {}

    public function index(Request $request)
    {
        $orders = $this->commissionReportService->getAllOrders($request->query());

        $commissions = CommissionReportResource::collection($orders)->resolve();

        return view('pages.commission-report', [
            'data' => ObjectUtil::arrayToFluentCollection($commissions),
            'links' => $orders->links(),
        ]);
    }

    public function show(?Order $order = null)
    {
        $order_details = $this->commissionReportService->showDetailOrder($order);

        return redirect()->back()
            ->with('invoice', $order->invoice_number)
            ->with('order_details', $order_details);
    }
}
