<?php require_once 'inc/sessions.php'; ?>
<?php
  // include database files and instantiate them
  require_once 'config/db_config.php';
  require_once 'config/db_conn.php';
  require_once 'models/User.php';
  require_once 'models/Product.php';
  require_once 'models/Comment.php';
  @$user = new Users();
  $products = new Products();
  $comments = new Comments();
  $uData = [
    'email' => $_SESSION['email']
  ];
    $res = $user->countUser($uData);
  $PID = $_GET['PID'];

  $pData = [
    'PID' => $_GET['PID']
  ];

  $data = $products->getProduct($pData);
  $com = $comments->getComments($PID);
  $like = $products->productLikes($PID);
  $dislike = $products->productDislikes($PID);
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
                <img src="../assets/img/products/<?php echo $data->prod_image; ?>" alt="<?php echo $data->prod_name; ?>" style="width:300px;height:300px; text-align:center; margin:0 auto;">
                <h2><?php echo $data->prod_name; ?></h2>
                <p class="price">NGN<?php echo sprintf('%.2f', $data->prod_price); ?></p>
                <p><?php echo $data->prod_desc; ?></p>
                <div>
                    <span class="lft"><strong><a class="btn btn-info" href="admin-updateProduct?PID=<?php echo $data->PID; ?>"> EDIT </a></strong></span>
                    <span class="rgt"><strong><a class="btn btn-danger" onclick="javascript: myFunction(this.id)" id="<?php echo $data->PID; ?>"> DELETE </a></strong></span>
                    <br><br><div class="sharethis-inline-share-buttons"></div>
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
                <div style="width: 100%; background:green; color:#fff;padding:5px">Likes: &nbsp; <?php echo $like->likes; ?></div>
                <div style="width: 100%; background:red; color:#fff;padding:5px">Dislikes: &nbsp; <?php echo $dislike->dislikes; ?></div>
              </div>
              
            </div>
          </div>
        </div>
      </article>
      <section class="comment-section">
        <h3 style="text-align:center;">Comment</h3>
        <hr style="color:#45643f" />
        <?php foreach($com as $comment): ?>
          <div class="comment user-comment">
            <div class="info">
                <a><?php echo $comment->name; ?></a>
                <span><?php echo $comment->created_at; ?></span>
            </div>
            <a class="avat" href="">
                <img src="../assets/img/users/<?php echo $comment->photo; ?>" width="45" height="45" alt="Profile Avatar" title="<?php echo $comment->name; ?>" />
            </a>
            <p><?php echo $comment->comment; ?></p>
          </div>
        <?php endforeach; ?>
        <div class="write-new">
          <form action="product" method="POST">
            <input type="hidden" name="PID" id="" value="<?php echo $data->PID; ?>">
            <textarea placeholder="Write your comment here" name="comment"></textarea>
            <div>
              <img src="../assets/img/users/<?php echo $res->photo; ?>" width="45" height="45" alt="Profile of Bradley Jones" title="<?php echo $res->name; ?>" />
              <button type="submit">Submit</button>
            </div>
          </form>
        </div>
        <br />
      </section>
    </main>
    <?php require_once 'inc/footer.php'; ?>
    <script>
      $(document).ready(function(){
        $(".comment:nth-child(odd)").addClass("user-comment");
        $(".comment:nth-child(even)").addClass("author-comment");
      });
    </script>
    </main>
    <?php require_once 'inc/footer.php'; ?>
    <script>
        // DELETE REQUEST FOR POST
      function myFunction(id) {
        var ask = window.confirm("Are you sure you want to delete this post?");
        if (ask) {
          window.alert("This post was successfully deleted.");
          window.location.href = 'admin-deleteProduct?PID=<?php echo $data->PID; ?>';
        } else {
          alert("You Cancelled!");
        }
      }
    </script>
  </body>
</html>