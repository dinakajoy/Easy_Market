<?php 
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');

  include_once '../../config/Database.php';
  include_once '../../model/Products.php';

  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  // Instantiate Products Object
  $product = new Products($db);

  // Get ID
  $product->PID = isset($_GET['PID']) ? $_GET['PID'] : die();

  // Get post
  $product->view_single_product();

  // Create array
  $product_arr = array(
    'PID' => $product->PID,
    'prod_name' => $product->prod_name,
    'prod_image' => $product->prod_image,
    'prod_desc' => $product->prod_desc,
    'prod_price' => $product->prod_price,
    'created' => $product->created
  );

  // Make JSON
  print_r(json_encode($product_arr));