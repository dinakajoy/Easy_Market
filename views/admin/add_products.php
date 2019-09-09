<?php require_once 'inc/sessions.php'; ?>
<?php
  // include database files
  require_once 'config/db_config.php';
  require_once 'config/db_conn.php';
  require_once 'models/User.php';
  require_once 'models/Product.php';
  // Instantiate Customer and Prepare insert query
  @$user = new Users();

  $uData = [
    'email' => $_SESSION['email']
  ];
  $res = $user->countUser($uData);

  // Initialize variables
   $prod_name = $prod_image = $prod_desc = $prod_price = '';
   $feedback = $name_err = $image_err = $desc_err = $price_err = '';

  if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    $email = stripslashes(trim($_SESSION['email']));
    $prod_name = stripslashes(trim($_POST['prod_name']));
    $prod_desc = stripslashes(trim($_POST['prod_desc']));
    $prod_price = stripslashes(trim($_POST['prod_price']));

    $photo = $_FILES["prod_image"]["name"];
      $temp = $_FILES["prod_image"]["tmp_name"];
      $size = $_FILES["prod_image"]["size"];
      $type = $_FILES["prod_image"]["type"]; //file name "txt_file" 
      $path = "../../assets/img/products/"; //set upload folder
      $imgExt = strtolower(pathinfo($photo, PATHINFO_EXTENSION));
      $pt = "../../assets/img/products/" .$photo;

    // Validate product name
    if(empty($prod_name)){
      $name_err = 'Please Enter Product Name';
    }
    // Validate Product Details
    if(empty($prod_desc)){
      $desc_err = 'Please Enter Product Details';
    }
    // Validate Product Price
    if(empty($prod_price)){
      $price_err = 'Please Enter Product Price';
    }
    // Validate photo
    if(empty($photo)) {
      $image_err = 'Please Upload Product Photo';
    } else if(!($type=="image/jpg" || $type=='image/jpeg' || $type=='image/png' || $type=='image/gif')) { 
      $image_err = 'Upload JPG , JPEG , PNG & GIF File Formate.....CHECK FILE EXTENSION';
    } else if(file_exists($pt)) {
      $image_err = 'File Already Exists...Check Upload Folder <br>'; //error message file not exists your upload folder path
    } else if($size > 5000000) {  //check file size 5MB
      $image_err = 'Your File Is To large Please Upload 5MB Size';
    } else {
      move_uploaded_file($temp, 'assets/img/products/'.$photo);
      $pic = $photo;
    }

    // Make sure errors are empty
    if(empty($name_err) && empty($image_err) && empty($desc_err) && empty($price_err)){
      // User Data
      $productData = [
        'user_email' => $email,
        'prod_name' => $prod_name,
        'prod_image' => $pic,
        'prod_desc' => $prod_desc,
        'prod_price' => $prod_price
      ];
      $product = new Products();
      // Attempt to execute
      if($product->addProduct($productData)) {
        // Redirect to login
        $feedback = 'Your Product Was Added Successfully';
      } else {
        $feedback = 'Your Product Was Not Added Successfully';
      }

    }
  }
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
            <h2>ADD NEW PRODUCT</h2>
            <form class="sign-up-htm" action="admin-addProduct" method="POST" enctype="multipart/form-data">
              <div class="form-group">
                <input id="user_email" name="user_email" type="hidden" class="form-control" value="<?php echo $email; ?>">
              </div>
              <div class="form-group">
                <label for="Product Name" class="label">Product Name</label>
                <input id="prod_name" name="prod_name" type="text" class="form-control <?php echo (!empty($name_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $prod_name; ?>">
                <span class="invalid-feedback"><?php echo $name_err; ?></span>
              </div>
              <div class="form-group">
                <label for="Product Image" class="label">Product Image</label>
                <input id="prod_image" name="prod_image" type="file" accept="image/*" class="form-control <?php echo (!empty($image_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $prod_image; ?>">
                <span class="invalid-feedback"><?php echo $image_err; ?></span>
              </div>
              <div class="form-group">
                <label for="Product Description" class="label">Product Details</label>
                <textarea id="prod_desc" name="prod_desc" type="text" class="form-control <?php echo (!empty($desc_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $prod_desc; ?>"></textarea>
                <span class="invalid-feedback"><?php echo $desc_err; ?></span>
              </div>
              <div class="form-group">
                <label for="Product Price" class="label">Product Price</label>
                <input id="prod_price" name="prod_price" type="text" class="form-control <?php echo (!empty($price_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $prod_price; ?>">
                <span class="invalid-feedback"><?php echo $price_err; ?></span>
              </div>
              <div class="form-group">
                <input type="submit" class="btn btn-primary form-control" value="Add Product">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
   </main>
   <?php require_once 'inc/footer.php'; ?>
  </body>
</html>