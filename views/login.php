<?php
  // include database files
  require_once 'config/db_config.php';
  require_once 'config/db_conn.php';
  require_once 'models/Users.php';
  // Instantiate Customer and Prepare insert query
  $user = new Users();

  // Initialize variables
  $error = $email = $password = '';
  $email_err = $password_err = '';

  // Process form when POST submit
  if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    $email = stripslashes(trim($_POST['email']));
    $password = stripslashes(trim($_POST['password']));
    // Validate email
    if(empty($email)){
      $email_err = 'Please Enter Email';
    } 
    // Validate password
    if(empty($password)){
      $password_err = 'Please Enter Password';
    }

    // Make sure errors are empty
    if(empty($email_err) && empty($password_err)) {
      $uData = [
        'email' => $email
      ];
      // Check if email exists and extract password
      $res = $user->countUser($uData);
      if($res) {
        $hashed_password = $res->password;
        if($password = password_verify($password, $hashed_password)){
          $password = $hashed_password;
          // User Data
          $userData = [
            'email' => $email,
            'password' => $password
          ];
          if($user->getUser($userData)) {
            // SUCCESSFUL LOGIN
            session_start();
            $_SESSION['email'] = $email;
            $_SESSION['name'] = $res->name;
            //$sql2 = 'UPDATE users SET status WHERE email = :email';
            header('location: home');
          } else {
            // Display wrong password message
            $error = 'Your Login Was Not Successful. You Entered The Wrong Login Details';
          }
        } else {
          $password_err = 'The Password You Entered Is Not Valid';
        }
      } else {
        $email_err = 'No Account Found For That Email';
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
      <div class="wrap2"><div class="cover">
        <h5 class="valid-feedback"><?php echo $error; ?></h5>
        <label for="tab-1" class="tab">Sign In</label>
        <form class="sign-in-htm" action="signin" method="POST">
          <div class="group">
            <label for="email" class="label">Email Address</label>
            <input id="email" name="email" type="text" class="input form-control form-control-lg <?php echo (!empty($email_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $email; ?>">
            <span class="invalid-feedback"><?php echo $email_err; ?></span>
          </div>
          <div class="group">
            <label for="password" class="label">Password</label>
            <input id="password" name="password" type="password" class="input form-control form-control-lg <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $password; ?>" data-type="password">
            <span class="invalid-feedback"><?php echo $password_err; ?></span>
          </div>
          <div class="group">
            <input id="check" type="checkbox" class="check" checked>
            <label for="check"><span class="icon"></span> Keep me Signed in</label>
          </div>
          <div class="group">
            <input type="submit" class="button" value="Sign In">
          </div>
          <div class="hr"></div>
          <div class="foot-lnk">
            <a href="password-reset">Forgot Password?</a> 
            <p> Don't Have An Account? <a href="signup" style="color:#fff"> Sign Up </a></p>
          </div>
        </form>
      </div>
  </body>
</html>