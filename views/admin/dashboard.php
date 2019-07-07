<?php require_once 'inc/sessions.php'; ?>
<?php
  // include database files
  require_once 'config/db_config.php';
  require_once 'config/db_conn.php';
  require_once 'models/Users.php';
  // Instantiate Customer and Prepare insert query
  $user = new Users();

  $uData = [
    'email' => $_SESSION['email']
  ];

  $res = $user->countUser($uData);
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
          <div class="col-md-10" style="margin-top:100px;margin-bottom:50px">

          </div>
        </div>
      </div>
    </div>
  </main>
  <?php require_once 'inc/footer.php'; ?>
  </body>
</html>