# 🛒 Laravel WooCommerce Integration

Este proyecto es un **e-commerce amplifica** desarrollado en **Laravel**, que se integra directamente con **WooCommerce** mediante su **REST API**. Está diseñado para recuperar y mostrar datos de productos y órdenes desde una tienda WooCommerce conectada.


## 🚀 Características

- 🔄 Integración con **WooCommerce API**
- 🛍️ Consulta de **productos**
- 📦 Consulta de **órdenes**
- 🧩 Estructura modular y extensible


## 🔧 Requisitos

- PHP 8.1 o superior  
- Composer  
- Laravel 9 o superior  
- WooCommerce con API REST habilitada  
- Claves de API WooCommerce (Consumer Key y Consumer Secret)


## ⚙️ Instalación

    1. Clona este repositorio:

        git clone https://github.com/samucoc/ezamplifica.git
        cd ezamplifica
        git checkout dev

    2. Instala las dependencias:

        composer install

    3. Crea tu archivo .env:    

        cp .env.example .env

    4. Configura tu conexión con WooCommerce en el archivo .env:

        WOOCOMMERCE_STORE_URL=https://tu-tienda.com
        WOOCOMMERCE_CONSUMER_KEY=ck_****************
        WOOCOMMERCE_CONSUMER_SECRET=cs_****************

    5. Genera la clave de aplicación:

        php artisan key:generate

    6. Instala migraciones o datos locales:

        php artisan migrate --seed

    7. Ejecuta servidor
        
        npm install && npm run dev 
        php artisan serve


    usuario  : admin@example.com
    password : password


## 📚 Endpoints Disponibles
    🔹 /products
    Devuelve una lista de productos recuperados desde WooCommerce.

    🔹 /orders
    Devuelve las órdenes recientes realizadas en la tienda WooCommerce.

## 📦 Stack Tecnológico
    Laravel
    Bootstrap (para el dashboard)
    REST API WooCommerce

