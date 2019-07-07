<?php
  // Init session
  session_start();
  // Include db config
  require_once '../api/config/db_config.php';
  // Validate login
  if(!isset($_SESSION['email']) || empty($_SESSION['email'])) {
    header('location: login.php');
    exit;
  }
  $email = $_SESSION['email'];

  // Prepare insert query
  $stmt = 'SELECT * FROM users WHERE email = :email';
  $stmt = $conn->prepare($stmt);
  $stmt->bindParam(':email', $email, PDO::PARAM_STR);
  $stmt->execute();
    // Check if email exists
    if($stmt->rowCount() === 1){
      if($row = $stmt->fetch()){
        $photo = $row['photo'];

    $query = 'SELECT p.PID, u.email as user_email, p.prod_name, p.prod_image, p.prod_desc, p.prod_price, p.created 
        FROM ' . $this->table . ' p
      LEFT JOIN
        users u ON u.email = p.user_email
      WHERE
        p.PID = ?
      LIMIT 0,1';
      
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sellers Dashboard | Easy Traders' App</title>

    <?php include('./inc/header.php'); ?>

<main role="main">

  <div class="album py-5 bg-light">
    <div class="container" style="margin-top:100px;margin-bottom:50px">
    <form class="sign-up-htm" action="../api/cont/products/create_product.php" method="POST">
        <div class="group">
            <label for="User Email" class="label">User Email</label>
            <input id="user_email" name="user_email" type="text" class="input" value="<?php echo $email; ?>">
        </div>
        <div class="group">
            <label for="Product Name" class="label">Product Name</label>
            <input id="prod_name" name="prod_name" type="text" class="input">
        </div>
        <div class="group">
            <label for="Product Image" class="label">Product Image</label>
            <input id="prod_image" name="prod_image" type="file" class="input">
        </div>
        <div class="group">
            <label for="Product Description" class="label">Product Details</label>
            <input id="prod_desc" name="prod_desc" type="text" class="input">
        </div>
        <div class="group">
            <label for="Product Price" class="label">Product Price</label>
            <input id="prod_price" name="prod_price" type="text" class="input">
        </div>
        <div class="group">
            <input type="submit" class="button" value="Add Product">
        </div>
    </form>
    </div>
   </div>
  </body>
</html>

<?php
        }
    }
?>