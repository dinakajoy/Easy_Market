<?php   
  require_once 'config/db_config.php';
  require_once 'config/db_conn.php';
  require_once 'models/Product.php';
  $product = new Products();
  $PID = $_GET['PID'];
  $prod = $product->updateLikes($PID);
  header("refresh:1;product?PID=$PID");
?>