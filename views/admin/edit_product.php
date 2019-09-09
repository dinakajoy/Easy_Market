<?php require_once 'inc/sessions.php'; ?>
<?php
  require_once 'config/db_config.php';
  require_once 'config/db_conn.php';
  require_once 'models/User.php';
  require_once 'models/Product.php';
  @$user = new Users();
  $products = new Products();

  @$res = $user->countUser($uData);
  $PID = $_GET['PID'];
  $data = $products->getProduct($PID);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sellers Dashboard | Easy Traders' App</title>
    <?php require_once 'inc/header.php'; ?>
  <main role="main">
    <div class="album py-5 bg-light">
      <div class="container">
        <div class="row">
          <div class="col-6" style="width: 60%;margin: 40px auto 30px auto; padding: 5px 0;">
            <h3 style="color:green"><?php echo $feedback; ?></h3>
            <h2>UPDATE PRODUCT</h2>
            <form class="sign-up-htm" action="admin-editProduct?PID=<?php echo $data->PID; ?>&&photo=<?php echo $data->prod_image; ?>" method="POST" enctype="multipart/form-data">
              <div class="form-group">
                <input id="prod_name" name="PID" type="text" value="<?php echo $data->PID; ?>">
              </div>  
            <div class="form-group">
                <label for="Product Name" class="label">Product Name</label>
                <input id="prod_name" name="prod_name" type="text" class="form-control <?php echo (!empty($name_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $data->prod_name; ?>">
                <span class="invalid-feedback"><?php echo $name_err; ?></span>
              </div>
              <div class="form-group">
                <label for="Product Image" class="label">Current Product Image</label>
                <p><img src="../../assets/img/products/<?php echo $data->prod_image; ?>" alt= "<?php echo $data->prod_image; ?>" width="150" height="150" /></p>
                <input id="prod_image" name="prod_image" type="file" accept="image/*" class="form-control <?php echo (!empty($image_err)) ? 'is-invalid' : ''; ?>">
                <span class="invalid-feedback"><?php echo $image_err; ?></span>
              </div>
              <div class="form-group">
                <label for="Product Description" class="label">Product Details</label>
                <textarea id="prod_desc" name="prod_desc" type="text" class="form-control <?php echo (!empty($desc_err)) ? 'is-invalid' : ''; ?>"><?php echo $data->prod_desc; ?></textarea>
                <span class="invalid-feedback"><?php echo $desc_err; ?></span>
              </div>
              <div class="form-group">
                <label for="Product Price" class="label">Product Price</label>
                <input id="prod_price" name="prod_price" type="text" class="form-control <?php echo (!empty($price_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $data->prod_price; ?>">
                <span class="invalid-feedback"><?php echo $price_err; ?></span>
              </div>
              <div class="form-group">
                <input type="submit" class="btn btn-primary form-control" id="update" value="Update Product">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
   </main>
   <?php require_once 'inc/footer.php'; ?>
   <script>
   </script>
  </body>
</html>