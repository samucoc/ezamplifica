@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Pedidos Recientes</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Cliente</th>
                <th>Fecha</th>
                <th>Productos Comprados</th>
                <th>Estado</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $order)
                <tr>
                    <td>{{ $order->billing->first_name }} {{ $order->billing->last_name }}</td>
                    <td>{{ $order->date_created }}</td>
                    <td>
                        @foreach($order->line_items as $item)
                            {{ $item->name }} ({{ $item->quantity }})<br>
                        @endforeach
                    </td>
                    <td>{{ $order->status }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ route('export.orders') }}" class="btn btn-primary">Exportar a Excel</a>
</div>
@endsection
