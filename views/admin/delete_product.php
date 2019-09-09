<?php
  // include database files and instantiate them
  require_once 'config/db_config.php';
  require_once 'config/db_conn.php';
  require_once 'models/Product.php';
  $products = new Products();
  
  $data = $_GET['PID'];
  // $data = $products->deleteProduct($PID);
  if($products->deleteProduct($data)) {
    header('location: admin-viewProducts');
    echo "Successful";
  } else {
    echo 'Post Not Deleted';
  }

?>