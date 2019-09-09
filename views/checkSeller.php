<?php require_once 'inc/sessions.php'; ?>
<?php
  // include database files
  require_once 'config/db_config.php';
  require_once 'config/db_conn.php';
  require_once 'models/User.php';
  require_once 'models/Product.php';
  @$user = new Users();
  $product = new Products();

  $uData = [
    'email' => $_SESSION['email']
  ];
  
    if($product->sellersProducts($uData)) {
      header('location: admin-viewProducts');
    } else {
        header("location:new-seller");
    }
?>
        