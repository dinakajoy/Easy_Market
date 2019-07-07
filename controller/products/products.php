<?php 
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');

  include_once '../../config/Database.php';
  include_once '../../model/Products.php';

  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  // Instantiate product object
  $products = new Products($db);

  // Products query
  $result = $products->view_all_products();
  // Get row count
  $num = $result->rowCount();

  // Check if any posts
  if($num > 0) {
    // Products array
    $products_arr = array();
    // $posts_arr['data'] = array();

    while($row = $result->fetch(PDO::FETCH_ASSOC)) {
      extract($row);

      $products_item = array(
        'PID' => $PID,
        'user_email' => $user_email,
        'prod_name' => html_entity_decode($prod_name),
        'prod_image' => $prod_image,
        'prod_desc' => html_entity_decode($prod_desc),
        'prod_price' => $prod_price,
        'created' => $created
      );

      // Push to "data"
      array_push($products_arr, $products_item);
      // array_push($posts_arr['data'], $post_item);
    }

    // Turn to JSON & output
    echo json_encode($products_arr);

  } else {
    // No Products
    echo json_encode(
      array('message' => 'No Products Found')
    );
  }
