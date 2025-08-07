<?php

   // app/Exports/ProductsExport.php
   namespace App\Exports;

   use Maatwebsite\Excel\Concerns\FromCollection;

   class ProductsExport implements FromCollection
   {
       public function collection()
       {
           // Aquí deberías obtener los productos desde WooCommerce
           return collect([]);
       }
   }



