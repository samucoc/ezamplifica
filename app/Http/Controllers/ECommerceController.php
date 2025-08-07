<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\WooCommerceService;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ProductsExport;
use App\Exports\OrdersExport;

class ECommerceController extends Controller
{
    protected $woocommerceService;

    public function __construct()
    {
        // Configura tus credenciales de WooCommerce aquí
        $this->woocommerceService = new WooCommerceService(
            config('woocommerce.store_url'),
            config('woocommerce.consumer_key'),
            config('woocommerce.consumer_secret')
        );
    }

    public function index()
    {
        $products = $this->woocommerceService->getProducts();
        return view('products.index', compact('products'));
    }

    public function orders()
       {
           $orders = $this->woocommerceService->getOrders();
           return view('orders.index', compact('orders'));
       }

    public function exportProducts()
    {
        return Excel::download(new ProductsExport, 'products.xlsx');
    }

    public function exportOrders()
    {
        return Excel::download(new OrdersExport, 'orders.xlsx');
    }
}
