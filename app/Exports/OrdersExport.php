<?php

   // app/Exports/OrdersExport.php
   namespace App\Exports;

   use Maatwebsite\Excel\Concerns\FromCollection;
   use App\Services\WooCommerceService;

   class OrdersExport implements FromCollection
   {
       public function collection()
       {
           // Aquí deberías obtener los pedidos desde WooCommerce
           $woocommerceService = new WooCommerceService();
           $orders = $woocommerceService->getOrders();
           return collect($orders);
       }
   }
