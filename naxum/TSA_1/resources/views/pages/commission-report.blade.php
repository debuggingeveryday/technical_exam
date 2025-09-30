@extends('layouts.app')
@section('title', 'TSA-1 - Commission')

@section('content')
    <h1 class="text-2xl">Filters</h1>

    <form class="flex gap-4 mb-5" method="GET" action="{{ route('commission.index') }}">
        <div class="flex flex-col">
            <label for="distributor">Distributor</label>
            <input type="text" class="input-text" placeholder="Enter ID or First Name or Last Name..."
                value="{{ request('distributor') }}" id="distributor" name="distributor" />
        </div>
        <div class="flex flex-col">
            <label for="date_from">Date From:</label>
            <input type="date" class="input-text" placeholder="Enter Date From..." value="{{ request('date_from') }}"
                id="date_from" name="date_from" />
        </div>
        <div class="flex flex-col">
            <label for="date_to">Date To:</label>
            <input type="date" class="input-text" placeholder="Enter Date To.." value="{{ request('date_to') }}"
                id="date_to" name="date_to" />
        </div>
        <div class="flex flex-col justify-center align-center pt-5">
            <button type="submit" class="submit-button">Filter</button>
        </div>
    </form>

    <table class="border border-gray-200">
        <thead>
            <tr>
                <th class="border border-gray-200 py-1 px-4">Invoice</th>
                <th class="border border-gray-200 py-1 px-4">Purchaser</th>
                <th class="border border-gray-200 py-1 px-4">Distributor</th>
                <th class="border border-gray-200 py-1 px-4">Reffered Distributor</th>
                <th class="border border-gray-200 py-1 px-4">Order Date</th>
                <th class="border border-gray-200 py-1 px-4">Order Total</th>
                <th class="border border-gray-200 py-1 px-4">Percentage</th>
                <th class="border border-gray-200 py-1 px-4">Distributor's Commission</th>
                <th class="border border-gray-200 py-2 px-4">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
                <tr>
                    <td class="border border-gray-200 py-1 px-4">{{ $item->invoice_number }}</td>
                    <td class="border border-gray-200 py-1 px-4">{{ $item->purchaser }}</td>
                    <td class="border border-gray-200 py-1 px-4">{{ $item->distributor }}</td>
                    <td class="border border-gray-200 py-1 px-4">{{ $item->reffered_distributor }}</td>
                    <td class="border border-gray-200 py-1 px-4">{{ $item->order_date }}</td>
                    <td class="border border-gray-200 py-1 px-4">{{ $item->order_total }}</td>
                    <td class="border border-gray-200 py-1 px-4">{{ $item->percentage }}%</td>
                    <td class="border border-gray-200 py-1 px-4">
                        {{ \App\Utilities\NumberUtil::withDecimals($item->distributors_commissions) }}</td>
                    <td class="border border-gray-200 py-2 px-4">
                        <form method="GET" action="{{ route('commission.show', $item->id) }}">
                            <button type="submit">Action</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div>{!! $links !!}</div>

    @if (session('order_details'))
        <div class="fixed inset-0 bg-opacity-50 flex items-center justify-center z-50">
            <div class="bg-white w-full max-w-lg rounded-2xl shadow-lg p-6 relative">
                <form method="GET" action="{{ route('commission.show', null) }}">
                    <button id="closeModal" class="absolute top-3 right-3 text-gray-500 hover:text-gray-700">X</button>
                </form>

                <h2 class="text-lg font-semibold text-gray-800 mb-4">{{ session('invoice') }}</h2>

                <table class="border border-gray-200">
                    <thead>
                        <tr>
                            <th class="border border-gray-200 py-1 px-4">SKU</th>
                            <th class="border border-gray-200 py-1 px-4">Product Name</th>
                            <th class="border border-gray-200 py-1 px-4">Price</th>
                            <th class="border border-gray-200 py-1 px-4">Quantity</th>
                            <th class="border border-gray-200 py-1 px-4">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach (session('order_details') as $item)
                            <tr>
                                <td class="border border-gray-200 py-1 px-4">{{ $item->sku }}
                                <td class="border border-gray-200 py-1 px-4">{{ $item->name }}</td>
                                <td class="border border-gray-200 py-1 px-4">
                                    ${{ \App\Utilities\NumberUtil::withDecimals($item->price) }}</td>
                                <td class="border border-gray-200 py-1 px-4">{{ $item->quantity }}</td>
                                <td class="border border-gray-200 py-1 px-4">
                                    ${{ \App\Utilities\NumberUtil::withDecimals($item->total) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="mt-6 flex justify-end gap-2">
                    <form method="GET" action="{{ route('commission.show', null) }}">
                        <button id="closeModal2" class="px-4 py-2 rounded-lg border border-gray-300 hover:bg-gray-100">
                            Close
                        </button>
                    </form>
                </div>
            </div>
        </div>
    @endif

@endsection
