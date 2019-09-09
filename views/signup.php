<?php
  // include database files and Instantiate User
  require_once 'config/db_config.php';
  require_once 'config/db_conn.php';
  require_once 'models/User.php';
  @$user = new Users();

  // Initialize variables
  $success = $email = $name = $phone = $address = $photo = $password = $confirm_password = '';
  $email_err = $name_err = $phone_err = $address_err = $photo_err = $password_err = $confirm_password_err = '';

  // Process form when POST submit
  if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    $email = stripslashes(trim($_POST['email']));
    $name = stripslashes(trim($_POST['name']));
    $phone = stripslashes(trim($_POST['phone']));
    $address = stripslashes(trim($_POST['address']));

    $photo = $_FILES["photo"]["name"];
      $temp = $_FILES["photo"]["tmp_name"];
      $size = $_FILES["photo"]["size"];
      $type = $_FILES["photo"]["type"]; //file name "txt_file" 
      $path = "../assets/img/users/"; //set upload folder
      $imgExt = strtolower(pathinfo($photo, PATHINFO_EXTENSION));
      $pt = "../assets/img/users/" .$photo;

    $password = stripslashes(trim($_POST['password']));
    $confirm_password = stripslashes(trim($_POST['confirm_password']));
    // Validate email
    if(empty($email)){
      $email_err = 'Please Enter Email';
    } else {
      $uData = ['email' => $email];
      if($user->countUser($uData)){
        $email_err = 'Email Is Already Taken';
      }
    } 
    // Validate name
    if(empty($name)){
      $name_err = 'Please Enter Your Name';
    }
    // Validate phone
    if(empty($phone)){
      $phone_err = 'Please Enter Your Phone Number';
    }
    // Validate address
    if(empty($address)){
      $address_err = 'Please Enter Your Address';
    }
    // Validate photo
    if(empty($photo)) {
      $photo_err = 'Please Upload Your Photo';
    } else if(!($type=="image/jpg" || $type=='image/jpeg' || $type=='image/png' || $type=='image/gif')) { 
      $photo_err = 'Upload JPG , JPEG , PNG & GIF File Formate... CHECK FILE EXTENSION';
    } else if(file_exists('../assets/img/users/'.$photo)) {
      $photo_err = 'File Already Exists... Check Upload Folder <br>'; //error message file not exists your upload folder path
    } else if($size > 5000000) {  //check file size 5MB
      $photo_err = 'Your File Is To large Please Upload 5MB Size';
    } else {
      if(move_uploaded_file($temp, "assets/img/users/".$photo)) {
         $pic = $photo;
      } else {
        $photo_err = 'Could Not Move File... Check Upload Folder <br>';
      }
    }
    // Validate password
    if(empty($password)){
      $password_err = 'Please enter password';
    } elseif(strlen($password) < 6){
      $password_err = 'Password Must Be At Least Six(6) Characters ';
    }
    // Validate Confirm password
    if(empty($confirm_password)){
      $confirm_password_err = 'Please Confirm Password';
    } else {
      if($password !== $confirm_password){
        $confirm_password_err = 'Passwords Do Not Match';
      }
    }

    // Make sure errors are empty
    if(empty($email_err) && empty($name_err) && empty($phone_err) && empty($address_err) && empty($bio_err) && empty($photo_err) && empty($password_err) && empty($confirm_password_err)){
      // Hash password
      $password = password_hash($password, PASSWORD_DEFAULT);
      
      // User Data
      $userData = [
        'email' => $email,
        'name' => $name,
        'phone' => $phone,
        'address' => $address,
        'photo' => $pic,
        'password' => $password
      ];
      
      // Attempt to execute
      if($user->addUser($userData)) {
        $success = 'Your Registration was successful ' .$name. '.<br> <br> Please Login.';
        header("refresh:3;home"); //refresh 3 second and redirect to index.php page
      } else {
        $success = 'Your Registration Was Not Successful.';
        header("refresh:3;signup.php"); //refresh page after 3 seconds
      }
    }
  }
?>

<!DOCTYPE html>
<html lang="en" >
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome To Easy Traders' App</title>
    <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Open+Sans:600'>
    <link rel="stylesheet" href="../assets/css/style2.css">
  </head>
  <body>
    <div class="wrap"><div class="cover">
      <h5 class="valid-feedback"><?php echo $success; ?></h5>
      <label for="tab-1" class="tab">Sign Up</label>
      <form class="sign-up-htm" action="signup" method="POST" enctype="multipart/form-data">
        <div class="group">
          <label for="email" class="label">Email Address</label>
          <input id="email" name="email" type="text" class="input <?php echo (!empty($email_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $email; ?>">
          <span class="invalid-feedback"><?php echo $email_err; ?></span>
        </div>
        <div class="group">
          <label for="name" class="label">Name</label>
          <input id="name" name="name" type="text" class="input <?php echo (!empty($name_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $name; ?>">
          <span class="invalid-feedback"><?php echo $name_err; ?></span>
        </div>
        <div class="group">
          <label for="phone" class="label">Phone</label>
          <input id="phone" name="phone" type="text" class="input <?php echo (!empty($phone_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $phone; ?>">
          <span class="invalid-feedback"><?php echo $phone_err; ?></span>
        </div>
        <div class="group">
          <label for="address" class="label">Location</label>
          <input id="address" name="address" type="address" class="input <?php echo (!empty($address_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $address; ?>">
          <span class="invalid-feedback"><?php echo $address_err; ?></span>
        </div>
        <div class="group">
          <label for="photo" class="label">Cover Photo</label>
          <input id="photo" name="photo" type="file" accept="image/*" class="input <?php echo (!empty($photo_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $photo; ?>">
          <span class="invalid-feedback"><?php echo $photo_err; ?></span>
        </div>
        <div class="group">
          <label for="pass" class="label">Password</label>
          <input id="password" name="password" type="password" class="input form-control form-control-lg <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $password; ?>" data-type="password">
          <span class="invalid-feedback"><?php echo $password_err; ?></span>
        </div>
        <div class="group">
          <label for="pass" class="label">Confirm Password</label>
          <input id="pass" type="password" name="confirm_password" class="input form-control form-control-lg <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $password; ?>" data-type="password">
          <span class="invalid-feedback"><?php echo $confirm_password_err ; ?></span>
        </div>
        <div class="group">
          <input type="submit" class="button" value="Sign Up">
        </div>
        <div class="hr"></div>
        <div class="foot-lnk">
          <label for="tab-1">Already Member? <a href="signin" style="color:#fff">Sign In</a>
        </div>
      </form>
    </div>
  </body>
</html>