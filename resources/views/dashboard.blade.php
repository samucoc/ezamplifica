@extends('layouts.app')

@section('content')
<div class="container-fluid mt-4">
    <div class="row mb-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">WooCommerce Dashboard</h5>
                </div>
                <div class="card-body">
                    <div class="row g-4 mb-4">
                        <div class="col-md-3">
                            <div class="card text-white bg-success">
                                <div class="card-body">
                                    <h5><i class="bi bi-box-seam"></i> Total Products</h5>
                                    <h2 class="mb-0">{{ $totalProducts }}</h2>
                                    <p class="mb-0 text-white-50 small">From all categories</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card text-white bg-info">
                                <div class="card-body">
                                    <h5><i class="bi bi-cart-check"></i> Total Orders</h5>
                                    <h2 class="mb-0">{{ $totalOrders }}</h2>
                                    <p class="mb-0 text-white-50 small">Last 30 days</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card text-white bg-warning">
                                <div class="card-body">
                                    <h5><i class="bi bi-currency-dollar"></i> Total Revenue</h5>
                                    <h2 class="mb-0">${{ number_format($totalRevenue, 2) }}</h2>
                                    <p class="mb-0 text-white-50 small">This month</p>
                                </div>
                            </div>
                        </div>
                        {{-- <div class="col-md-3">
                            <div class="card text-white bg-primary">
                                <div class="card-body">
                                    <h5><i class="bi bi-star"></i> Top Product</h5>
                                    <h2 class="mb-0">{{ $topProduct->name ?? 'N/A' }}</h2>
                                    <p class="mb-0 text-white-50 small">{{ $topProduct->quantity ?? 0 }} sold</p>
                                </div>
                            </div>
                        </div> --}}
                    </div>

                    <div class="card mb-4">
                        <div class="card-header bg-secondary text-white">
                            <h5 class="mb-0">Filters</h5>
                        </div>
                        <div class="card-body">
                            <form class="row g-3">
                                <div class="col-md-3">
                                    <label for="dateRange" class="form-label">Date Range</label>
                                    <select class="form-select" id="dateRange">
                                        <option>Last 7 days</option>
                                        <option selected>Last 30 days</option>
                                        <option>Last 90 days</option>
                                        <option>Custom range</option>
                                    </select>
                                </div>
                                {{-- <div class="col-md-3">
                                    <label for="customer" class="form-label">Customer</label>
                                    <select class="form-select" id="customer">
                                        <option selected>All Customers</option>
                                        @foreach($customers as $customer)
                                            <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                                        @endforeach
                                    </select>
                                </div> --}}
                                <div class="col-md-3">
                                    <label for="status" class="form-label">Status</label>
                                    <select class="form-select" id="status">
                                        <option selected>All Statuses</option>
                                        <option>Completed</option>
                                        <option>Processing</option>
                                        <option>Pending</option>
                                        <option>Cancelled</option>
                                    </select>
                                </div>
                                <div class="col-md-3 align-self-end">
                                    <button type="submit" class="btn btn-primary w-100">Apply Filters</button>
                                </div>
                            </form>
                        </div>
                    </div>

                    {{-- <div class="row mt-4">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header bg-primary text-white">
                                    <h5 class="mb-0">Top Selling Products</h5>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Product</th>
                                                    <th>Sales</th>
                                                    <th>Revenue</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($topProducts as $product)
                                                <tr>
                                                    <td>{{ $product->name }}</td>
                                                    <td>{{ $product->total_sold }}</td>
                                                    <td>${{ number_format($product->total_revenue, 2) }}</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header bg-primary text-white">
                                    <h5 class="mb-0">Recent Orders</h5>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Order #</th>
                                                    <th>Date</th>
                                                    <th>Customer</th>
                                                    <th>Status</th>
                                                    <th>Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($recentOrders as $order)
                                                <tr>
                                                    <td>{{ $order->id }}</td>
                                                    <td>{{ $order->date->format('m/d/Y') }}</td>
                                                    <td>{{ $order->customer_name }}</td>
                                                    <td><span class="badge bg-{{ $order->status_badge }}">{{ $order->status }}</span></td>
                                                    <td>${{ number_format($order->total, 2) }}</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
