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
                <p>
                  <button style='font-size:12px'>&nbsp;&nbsp;Like &nbsp;&nbsp;<i onclick="myFunction1(this)" style="font-size:14px" class="fa fa-thumbs-up" title="Like"></i></button>
                  <button style='font-size:12px'>Dislike &nbsp;&nbsp;<i onclick="myFunction2(this)" style="font-size:14px" class="fa fa-thumbs-down" title="Dislike"></i></button>
                  <button style='font-size:12px'>Share &nbsp;&nbsp;<i class="fa fa-share-alt" style="font-size:14px"></i></button>
                  <button style='font-size:12px' title="<?php echo $phone; ?>">Call &nbsp;&nbsp;<i style='font-size:14px' class='fa fa-phone'></i></button>
                  <button style='font-size:12px'>Chat &nbsp;&nbsp;<i style='font-size:14px' class='fa fa-comment-dots'></i></button>
                </p>   
                <div style="padding-top:10px;text-align:center;width:100%;margin:0 auto;">
                  <h3 class="heading">Rate Product</h3>
                  <fieldset class="rating">
                    <input type="radio" id="star5" name="rating" value="5" /><label class = "full" for="star5" title="Awesome - 5 stars"></label>
                    <input type="radio" id="star4" name="rating" value="4" /><label class = "full" for="star4" title="Pretty Good - 4 stars"></label>
                    <input type="radio" id="star3" name="rating" value="3" /><label class = "full" for="star3" title="Good - 3 stars"></label>
                    <input type="radio" id="star2" name="rating" value="2" /><label class = "full" for="star2" title="Bad - 2 stars"></label>
                    <input type="radio" id="star1" name="rating" value="1" /><label class = "full" for="star1" title="Sucks Big Time - 1 star"></label>
                  </fieldset>
                              
                  <button type="button" data-toggle="modal" data-target="#myModal">Write Review</button>
                  <div class="modal fade" id="myModal" role="dialog" style="z-index:1">
                    <div class="modal-dialog modal-sm">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <h4 class="modal-title">Modal Header</h4>
                        </div>
                        <div class="modal-body">
                          <p>This is a small modal.</p>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                      </div>
                    </div>
                  </div>
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
      <h2 style="text-align:center">Related Products</h2>
      <div class="scrollmenu">
        <?php foreach($prod as $product): ?>
        <a href="product?PID=<?php echo $product->PID; ?> ">
          <img src="../img/products/<?php echo $product->prod_image; ?>" width="200px" height="200px" />
          <h5> <?php echo $product->prod_name; ?></h5>
        </a>
        <?php endforeach; ?>
      </div>
    </main>
    <?php require_once 'inc/footer.php'; ?>
  </body>
</html>