@extends('layouts.app')
@section('title', 'TSA-1 - Distributor')

@section('content')
    Distributor

    <table class="border border-gray-200">
        <thead>
            <tr>
                <th class="border border-gray-200 py-1 px-4">Top</th>
                <th class="border border-gray-200 py-1 px-4">Distributor Name</th>
                <th class="border border-gray-200 py-1 px-4">Total Sales</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
                <tr>
                    <td class="border border-gray-200 py-1 px-4">{{ $loop->iteration + ($page - 1) * 10 }}</td>
                    <td class="border border-gray-200 py-1 px-4">{{ $item->distributor }}</td>
                    <td class="border border-gray-200 py-1 px-4">
                        ${{ \App\Utilities\NumberUtil::currencyFormat($item->total_sales) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div>{!! $links !!}</div>

@endsection
