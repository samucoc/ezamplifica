<?php

   // app/Exports/ProductsExport.php
   namespace App\Exports;

   use Maatwebsite\Excel\Concerns\FromCollection;
   use App\Services\WooCommerceService;

   class ProductsExport implements FromCollection
   {
       public function collection()
       {
           // Aquí deberías obtener los productos desde WooCommerce
           $woocommerceService = new WooCommerceService();
           $products = $woocommerceService->getProducts();
           return collect($products);
       }
   }



