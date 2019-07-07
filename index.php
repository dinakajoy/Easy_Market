<?php
    require 'Router.php';
    $path = trim($_SERVER['REQUEST_URI'], '/');

    $path = parse_url($path, PHP_URL_PATH);

    Router::get('','views/index.php');
    Router::get('home','views/index.php');
    Router::get('products','views/view_products.php');
    Router::get('product','views/single_product.php');
    Router::get('sellers','views/all-sellers.php');

    Router::get('chat','views/chat_history.php');

    Router::get('signup','views/signup.php');
    Router::get('signin','views/login.php');
    Router::get('signout','views/logout.php');
    Router::get('password-reset','views/pssword.php');
    Router::get('NotFound','views/404.php');

    Router::get('admin-dashboard','views/admin/dashboard.php');
    Router::get('admin-addProduct','views/admin/add_products.php');
    Router::get('admin-updateProduct','views/admin/edit_products.php');
    Router::get('admin-viewProducts','views/admin/products.php');
    Router::get('admin-viewProduct','views/admin/product.php');

    require Router::run($path);
?>