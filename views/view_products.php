<?php require_once 'inc/sessions.php'; ?>
<?php
  // include database files
  require_once 'config/db_config.php';
  require_once 'config/db_conn.php';
  require_once 'models/Users.php';
  require_once 'models/Products.php';
  // Instantiate Customer and Prepare insert query
  $user = new Users();
  $products = new Products();

  $uData = [
    'email' => $_SESSION['email']
  ];

  $res = $user->countUser($uData);
  $prod = $products->getProducts();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Products | Easy Traders' App</title>
    <?php require_once 'inc/header.php'; ?>
    <main role="main">
      <section class="text-center move-down">
        <div class="slider">
          <div class="slide current">
            <div class="content"></div>
          </div>
          <div class="slide">
            <div class="content"></div>
          </div>
          <div class="slide">
            <div class="content"></div>
          </div>
          <div class="slide">
            <div class="content"></div>
          </div>
        </div>
        <div class="buttons">
          <button id="prev"><i class="fa fa-caret-left"></i></button>
          <button id="next"><i class="fa fa-caret-right"></i></button>
        </div>
      </section>

      <article>
        <div class="album py-5 bg-light">
          <div class="container">
            <div class="row">
              <?php foreach($prod as $product): ?>
                <div class="col-md-2"> 
                  <div class="card mb-4" style="text-align:center;">
                    <a href="product?PID=<?php echo $product->PID; ?>">
                      <img src="../img/products/<?php echo $product->prod_image; ?>" width="100px" height="100px">
                      <div class="card-body">
                        <h5><?php echo  $product->prod_name; ?></h5>
                        <p class="card-text">NGN <?php echo sprintf('%.2f', $product->prod_price); ?></p>
                      </div>
                    </a>
                  </div>
                </div>
              <?php endforeach; ?>
            </div>
          </div>
        </div>
      </article>
    </main>

    <?php require_once 'inc/footer.php'; ?>
  </body>
</html>