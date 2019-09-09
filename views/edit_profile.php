<?php require_once 'inc/sessions.php'; ?>
<?php
  require_once 'config/db_config.php';
  require_once 'config/db_conn.php';
  require_once 'models/User.php';
  $user = new Users();
  $email = [
    'email' => $_SESSION['email']
  ];
  // Process form when POST submit
    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        $name = stripslashes(trim($_POST['name']));
        $phone = stripslashes(trim($_POST['phone']));
        $address = stripslashes(trim($_POST['address']));

        // Validate email
        $email = ['email' => $email];
        // Validate name
        if(empty($name)){
            echo 'Please Enter Your Name';
        }
        // Validate phone
        if(empty($phone)){
            echo 'Please Enter Your Phone Number';
        }
        // Validate address
        if(empty($address)){
            echo 'Please Enter Your Address';
        }
        
        // User Data
        $userData = [
            'email' => $email,
            'name' => $name,
            'phone' => $phone,
            'address' => $address
        ];
        
        // Attempt to execute
        if($user->updateUser($userData)) {
            header("location:home");
        } else {
            echo 'Your Registration Was Not Successful.';
            header("refresh:3;edit_profile.php");
        }
    }
?>