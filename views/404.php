<?php require_once 'inc/sessions.php'; ?>
<?php
  // include database files
  require_once 'config/db_config.php';
  require_once 'config/db_conn.php';
  require_once 'models/User.php';
  // Instantiate Customer and Prepare insert query
  @$user = new Users();

  $uData = [
    'email' => $_SESSION['email']
  ];

  $res = $user->countUser($uData);
?><!DOCTYPE html>
<html lang="en">
    <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <title>Home | Easy Traders' App</title>
      <?php require_once 'inc/header.php'; ?>
    <main role="main">
      <section class="text-center move-down" style="margin: 100px auto;">
        <h1 class="center">Page Error</h1>
        <h3>The Requested Page Was Not Found On This Server.<br/>
          Please Ensure You Entered The Correct URL.
        </h3><br />
        <a class="btn btn-dark" href="/">Back To Home</a>
      </section>
      <?php require_once 'inc/footer.php'; ?>
    </body>
</html>