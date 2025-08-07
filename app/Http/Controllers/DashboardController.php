<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\WooCommerceService;

use DB;

class DashboardController extends Controller
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
    public function index(Request $request)
    {
        // Obtener filtros de la solicitud
        $dateRange = $request->input('dateRange', 'last_30_days');
        $customerId = $request->input('customer', null);
        $status = $request->input('status', null);

        // Obtener órdenes con filtros aplicados
        $orders = $this->woocommerceService->getOrders($dateRange, [
            'customer' => $customerId,
            'status' => $status,
        ]);

        // Obtener métricas para el dashboard
        $totalOrders = count($orders);
        $totalRevenue = array_sum(array_column($orders, 'total')); // Suponiendo que 'total' es el campo de total en la respuesta
        //$topProducts = $this->woocommerceService->getTopProducts(); // Método que debes implementar en WooCommerceService
        $recentOrders = array_slice($orders, 0, 5); // Obtener las 5 órdenes más recientes

        // Obtener clientes para el filtro
        //$customers = $this->woocommerceService->getCustomers(); // Método que debes implementar en WooCommerceService
        $totalProducts = count($this->woocommerceService->getProducts());

        return view('dashboard', compact(
            'totalProducts',
            'totalOrders',
            'totalRevenue',
            //'topProduct',
            //'customers',
            //'topProducts',
            'recentOrders'
        ));
    }
}
