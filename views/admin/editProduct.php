<?php require_once 'inc/sessions.php'; ?>
<?php
  // include database files
  require_once 'config/db_config.php';
  require_once 'config/db_conn.php';
  require_once 'models/Product.php';
  $prod = new Products();
  $PID = $_GET['PID'];
  $pho = $_GET['photo'];

  // Initialize variables
   $prod_name = $prod_image = $prod_desc = $prod_price = '';
   $feedback = $name_err = $image_err = $desc_err = $price_err = '';

  if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    $PID = $_POST['PID'];
    $prod_name = stripslashes(trim($_POST['prod_name']));
    $prod_desc = stripslashes(trim($_POST['prod_desc']));
    $prod_price = stripslashes(trim($_POST['prod_price']));

    if(empty($photo)) {
      $pic = $pho;
    } else {
      $photo = $_FILES["prod_image"]["name"];
      $temp = $_FILES["prod_image"]["tmp_name"];
      $size = $_FILES["prod_image"]["size"];
      $type = $_FILES["prod_image"]["type"]; //file name "txt_file" 
      $path = "../../img/products/"; //set upload folder
      $imgExt = strtolower(pathinfo($photo, PATHINFO_EXTENSION));
      $pt = "../../img/products/" .$photo;
      if(!($type=="image/jpg" || $type=='image/jpeg' || $type=='image/png' || $type=='image/gif')) { 
        $image_err = 'Upload JPG , JPEG , PNG & GIF File Formate.....CHECK FILE EXTENSION';
      } else if(file_exists($pt)) {
        $image_err = 'File Already Exists...Check Upload Folder <br>'; //error message file not exists your upload folder path
      } else if($size > 5000000) {  //check file size 5MB
        $image_err = 'Your File Is To large Please Upload 5MB Size';
      } else {
        move_uploaded_file($temp, 'img/products/'.$photo);

        $pic = $photo;
      }
    }

      $productData = [
        'PID' => $PID,
        'user_email' => $_SESSION['email'],
        'prod_name' => $prod_name,
        'prod_image' => $pic,
        'prod_desc' => $prod_desc,
        'prod_price' => $prod_price
      ];
      if($prod->updateProduct($productData)) {
        // Redirect to login
        $feedback = 'Your Product Was Updated Successfully';
        header("location:admin-viewProducts");
      } else {
        $feedback = 'Your Product Was Not Updaed Successfully';
      }
    }
?>