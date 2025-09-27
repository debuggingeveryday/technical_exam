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

    <table class="border-separate border-spacing-2">
        <thead>
            <tr>
                <th>Invoice</th>
                <th>Purchaser</th>
                <th>Distributor</th>
                <th>Reffered Distributor</th>
                <th>Order Date</th>
                <th>Order Total</th>
                <th>Percentage</th>
                <th>Distributor's Commission</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->purchaser }}</td>
                    <td>{{ $item->distributor }}</td>
                    <td>{{ $item->reffered_distributor }}</td>
                    <td>{{ $item->order_date }}</td>
                    <td>{{ $item->order_total }}</td>
                    <td>{{ $item->percentage }}</td>
                    <td>{{ $item->distributors_commissions }}</td>
                    <td>Action</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div>{!! $links !!}</div>
@endsection
