@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Productos</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>SKU</th>
                <th>Precio</th>
                <th>Imagen</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
                <tr>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->sku }}</td>
                    <td>{{ $product->price }}</td>
                    <td>
                        @if(!empty($product->images) && isset($product->images[0]->src))
                            <img src="{{ $product->images[0]->src }}" alt="{{ $product->name }}" width="100">
                        @else
                            <img src="/images/no-image.png" alt="No image" width="100">
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ route('export.products') }}" class="btn btn-primary">Exportar a Excel</a>
</div>
@endsection
