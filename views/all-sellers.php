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
      <section class="jumbotron">
        <div class="container">
          <h1 class="jumbotron-heading">Easy Traders' App</h1>
          <p class="lead">A platform for easy management of customers. Chat up any buyer to get their amazing products at your doorstep</p>
          <p>
            <a href="checkSeller" target="_BLANK" class="btn btn-primary my-2">Be A Seller</a>
            <a href="products" class="btn btn-info my-2">View All Products</a>
          </p>
        </div>
      </section>

      <article>
        <?php foreach($seller as $sellers): ?>
          <div class="container seller" style="background:#ddd; box-shadow: 0 3px 6px 0 rgba(0, 0, 0, 0.2); margin-bottom:15px;">
            <div class="row">
              <div class="col-sm-2" style="margin:auto;">
                <span class="avatar avatar-online"><img src="../assets/img/users/<?php echo $sellers->photo; ?>" alt="Avatar" class="avatar3"><i></i></span>
              </div>
              <div class="col-sm-7" style="margin:auto;">
                <h4><?php echo $sellers->name; ?></h4>
                <small><?php echo $sellers->address; ?></small>
              </div>
              <div class="col-sm-3" style="margin:auto;">
                <small><a style='color:#f00' href="chat?SID=<?php echo $sellers->UID; ?>">Chat Seller</a></small><br>
                <small><a style='color:#f00' href="tel: <?php echo $sellers->phone; ?>" title="Works Best For Mobile Devices">Call Seller</a></small>
              </div> 
            </div>
          </div>
        <?php endforeach; ?> 
      </article>
    </main>
    <?php require_once 'inc/footer.php'; ?>
  </body>
</html>