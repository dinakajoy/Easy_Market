<?php 
  // include database files
  require_once 'config/db_config.php';
  require_once 'config/db_conn.php';
  require_once 'models/User.php';



  // Instantiate products object
  $product = new Products($db);

  $product->user_email =$_POST['user_email'];
  $product->prod_name = $_POST['prod_name'];
  $product->prod_image = $_POST['prod_image'];
  $product->prod_desc = $_POST['prod_desc'];
  $product->prod_price = $_POST['prod_price'];

  // Create post
  if($product->create_product()) {
    echo json_encode(
      array('message' => 'Product Added')
    );
  } else {
    echo json_encode(
      array('message' => 'Product Not Added')
    );
  }
?>