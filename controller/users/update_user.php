<?php 
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: PUT');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

  include_once '../../config/Database.php';
  include_once '../../model/Products.php';

  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  // Instantiate blog post object
  $product = new Products($db);

  // Get raw posted data
  $data = json_decode(file_get_contents("php://input"));

  // Set ID to update
  $product->PID = $data->PID;

  $product->prod_name = $data->prod_name;
  $product->prod_image = $data->prod_image;
  $product->prod_desc = $data->prod_desc;
  $product->prod_price = $data->prod_price;

  // Update post
  if($product->update()) {
    echo json_encode(
      array('message' => 'Product Updated')
    );
  } else {
    echo json_encode(
      array('message' => 'Product Not Updated')
    );
  }

