<?php require_once 'inc/sessions.php'; ?>
<?php
  require_once 'config/db_config.php';
  require_once 'config/db_conn.php';
  require_once 'models/User.php';
  @$user = new Users();
  $uData = [
    'email' => $_SESSION['email']
  ];
  $res = $user->countUser($uData);
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
      <label for="tab-1" class="tab">Edit Profile</label>
      <form class="sign-up-htm" action="edit-profile" method="POST" enctype="multipart/form-data">
        <div class="group">
          <label for="name" class="label">Name</label>
          <input id="name" name="name" type="text" class="input <?php echo (!empty($name_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $res->name; ?>">
        </div>
        <div class="group">
          <label for="phone" class="label">Phone</label>
          <input id="phone" name="phone" type="text" class="input <?php echo (!empty($phone_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $res->phone; ?>">
        </div>
        <div class="group">
          <label for="address" class="label">Location</label>
          <input id="address" name="address" type="address" class="input <?php echo (!empty($address_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $res->address; ?>">
        </div>
        <div class="group">
          <label for="photo" class="label">Cover Photo</label>
          <img src="../assets/img/users/<?php echo $res->photo; ?>" alt="" width="100px"><span>Change Photo</span>
          <input id="photo" name="photo" type="file" accept="image/*" class="input <?php echo (!empty($photo_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $res->photo; ?>">
        </div>
        <div class="group">
          <input type="submit" class="button" value="Update">
        </div>
      </form>
    </div>
  </body>
</html>