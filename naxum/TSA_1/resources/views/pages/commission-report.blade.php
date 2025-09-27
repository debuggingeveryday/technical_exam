@extends('layouts.app')
@section('title', 'TSA-1 - Commission')

@section('header')
    @include('partials.header')
@endsection

@section('content')
    <h1>Filters</h1>

    <div class="flex flex-column">
        <label for="distributor">Distributor</label>
        <input type="text" value="" id="distributor" />
    </div>

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
@endsection
