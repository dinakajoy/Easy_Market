<?php 
  //Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: POST');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

  include_once '../../config/Database.php';
  include_once '../../model/Products.php';

  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

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
 
