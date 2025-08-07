<?php
// app/Services/WooCommerceService.php
namespace App\Services;

use Automattic\WooCommerce\Client;
use Automattic\WooCommerce\HttpClient\HttpClientException;

class WooCommerceService
{
    protected $woocommerce;

    public function __construct()
    {
        $this->woocommerce = new Client(
            config('woocommerce.store_url'),
            config('woocommerce.consumer_key'),
            config('woocommerce.consumer_secret'),
            [
                'version' => 'wc/v3',
                'verify_ssl' => false, // Solo para desarrollo
                'timeout' => 60
            ]
        );
    }

    public function getProducts($params = [])
    {
        try {
            return $this->woocommerce->get('products', $params);
        } catch (HttpClientException $e) {
            logger()->error('Error al obtener productos: ' . $e->getMessage());
            return [];
        }
    }

    public function getOrders($days = 30, $params = [])
    {
        try {
            $afterDate = date('Y-m-d', strtotime("-{$days} days"));
            $defaultParams = [
                'after' => $afterDate,
                'per_page' => 100,
                'orderby' => 'date',
                'order' => 'desc'
            ];

            return $this->woocommerce->get('orders', array_merge($defaultParams, $params));
        } catch (HttpClientException $e) {
            logger()->error('Error al obtener pedidos: ' . $e->getMessage());
            return [];
        }
    }
    public function getTopProducts($limit = 5)
    {
        try {
            return $this->woocommerce->get('products', [
                'orderby' => 'total_sales',
                'per_page' => $limit
            ]);
        } catch (\Automattic\WooCommerce\HttpClient\HttpClientException $e) {
            // Captura error de conexión o respuesta inválida
            echo "WooCommerce error: " . $e->getMessage();
            echo "\nResponse body: " . $e->getResponse(); // Muestra la respuesta completa
            die;
        }
    }


    public function getCustomers()
    {
        // Lógica para obtener la lista de clientes
        return $this->woocommerce->get('customers');
    }
}
