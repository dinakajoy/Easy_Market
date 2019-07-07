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
  $seller = $user->getSellers();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Users | Easy Traders' App</title>
    <?php require_once 'inc/header.php'; ?>
    <main role="main">
      <section class="jumbotron text-center move-down">
        <div class="container">
          <h1 class="jumbotron-heading">Easy Traders' App</h1>
          <p class="lead">A platform for easy management of customers. Chat up any buyer to get their amazing products at your doorstep</p>
          <p>
            <a href="admin-dashboard" target="_BLANK" class="btn btn-primary my-2">Be A Seller</a>
            <a href="products" class="btn btn-info my-2">View All Products</a>
          </p>
        </div>
      </section>

      <article>
        <div class="container">
          <div class="row">
            <div class="col-10 size">  
              <div class="container">
                <div class="row">
                  <?php foreach($seller as $sellers): ?>
                    <div class="col-md-3" style="text-align:right">
                      <span class="avatar avatar-online"><img src="../img/users/<?php echo $sellers->photo; ?>" alt="Avatar" class="avatar3"><i></i></span>
                    </div>
                    <div class="col-md-5">
                      <h2 style="margin:0"><?php echo $sellers->name; ?></h2>
                      <p><?php echo $sellers->address; ?></p>
                    </div>
                    <div class="col-md-2" style="text-align:left">
                      <p><span>Chat Seller</span></p>
                      <p><span><a href="tel:<?php echo $sellers->phone; ?>" title="tel:<?php echo $sellers->phone; ?>">Call Seller</a></span></p>
                    </div>
                  <?php endforeach; ?>  
                </div>
              </div>
              <hr>
            </div>
          </div>
        </div>
      </article>
    </main>
    <?php require_once 'inc/footer.php'; ?>
  </body>
</html>