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
  $PID = $_GET['PID'];

  $pData = [
    'PID' => $_GET['PID']
  ];

  $res = $user->countUser($uData);
  $prod = $products->getProducts();
  $data = $products->getProduct($pData);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Products | Easy Traders' App</title>
    <?php require_once 'inc/header.php'; ?>
    <main role="main" style="margin: 80px auto;">
      <article>
        <div class="container">
          <div class="row">
            <div class="col-md-7">
              <div class="card">
                <img src="../img/products/<?php echo $data->prod_image; ?>" alt="<?php echo $data->prod_name; ?>" style="width:300px;height:300px">
                <h2><?php echo $data->prod_name; ?></h2>
                <p class="price">NGN<?php echo sprintf('%.2f', $data->prod_price); ?></p>
                <p><?php echo $data->prod_desc; ?></p>
                <div>
                    <span class="lft"><strong><a class="btn btn-info" href="admin-updateProduct?PID="> EDIT </a></strong></span>
                    <span class="rgt"><strong><button class="btn btn-danger" onclick="myFunction(this.id)" id='+resp[i].id+'> DELETE </button></strong></span>
                </div>
              </div>
            </div>
            <div class="col-md-5">
              <h3 class="heading">Users Reviews</h3>
              <span class="fa fa-star checked"></span>
              <span class="fa fa-star checked"></span>
              <span class="fa fa-star checked"></span>
              <span class="fa fa-star checked"></span>
              <span class="fa fa-star"></span>
              <p>4.1 average based on 254 reviews.</p>
              <hr style="border:3px solid #f1f1f1">
              <div class="row">
                <div class="side"><div>5 star</div></div>
                <div class="middle"><div class="bar-container"><div class="bar-5"></div></div></div>
                <div class="side right"><div>150</div></div>

                <div class="side"><div>4 star</div></div>
                <div class="middle"><div class="bar-container"><div class="bar-4"></div></div></div>
                <div class="side right"><div>63</div></div>

                <div class="side"><div>3 star</div></div>
                <div class="middle"><div class="bar-container"><div class="bar-3"></div></div></div>
                <div class="side right"><div>15</div></div>

                <div class="side"><div>2 star</div></div>
                <div class="middle"><div class="bar-container"><div class="bar-2"></div></div></div>
                <div class="side right"><div>6</div></div>

                <div class="side"><div>1 star</div></div>
                <div class="middle"><div class="bar-container"><div class="bar-1"></div></div></div>
                <div class="side right"><div>20</div></div>
              </div>
              <div style="margin: 50px auto">
                <div style="width:40%;float:left">
                  <h4>name</h4>
                  <p>created</p>
                </div>
                <div style="width:60%;float:right">
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star"></span>
                  <p>review</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </article>
    </main>
    <?php require_once 'inc/footer.php'; ?>
    <script>
        // DELETE REQUEST FOR POST
        function myFunction(id) {
        if (confirm("Are You Sure You Want To Delete Me?")) {
          
            
        } else {
          alert("You Cancelled!");
        }
    }
    </script>
  </body>
</html>