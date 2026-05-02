@extends('layouts.admin')

@section('content')

<div style="background:#0d0d0d; min-height:100vh; padding:30px; color:white;">

    <h2 style="color:gold; margin-bottom:20px;">📦 Orders</h2>

    @if(session('success'))
        <div style="background:green; padding:10px; margin-bottom:15px;">
            {{ session('success') }}
        </div>
    @endif

    <table style="width:100%; border-collapse:collapse;">

        <tr style="background:gold; color:black;">
            <th style="padding:10px;">ID</th>
            <th>Name</th>
            <th>Total</th>
            <th>Status</th>
            <th>Update</th>
        </tr>

        @foreach($orders as $order)
        <tr style="border-bottom:1px solid #444; text-align:center;">

            <td style="padding:10px;">{{ $order->id }}</td>

            <td>
                {{ $order->user->name ?? $order->name ?? 'Guest' }}
            </td>

            <td>Rs {{ $order->total }}</td>

            <td style="color:gold; font-weight:bold;">
                {{ ucfirst($order->status) }}
            </td>

            <td>
                <form method="POST" action="{{ route('admin.order.status', $order->id) }}">
                    @csrf

                    <select name="status" style="padding:5px; background:black; color:gold; border:1px solid gold;">
                        <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="delivered" {{ $order->status == 'delivered' ? 'selected' : '' }}>Delivered</option>
                    </select>

                    <button style="background:gold; color:black; padding:5px 10px; border:none; margin-left:5px;">
                        Update
                    </button>
                </form>
            </td>

        </tr>
        @endforeach

    </table>

</div>

@endsection