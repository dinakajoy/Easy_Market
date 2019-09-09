<?php require_once 'inc/sessions.php'; ?>
<?php
 require_once 'config/db_config.php';
 require_once 'config/db_conn.php';
 require_once 'models/Comment.php';
 $comm = new Comments();
   $comment = '';
   $comment_err = '';
  if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    $email = stripslashes(trim($_SESSION['email']));
    $PID = stripslashes(trim($_POST['PID']));
    $comment = stripslashes(trim($_POST['comment']));
    if(empty($comment)){
      $comment_err = 'Please Write Your Comment';
    }
    if(empty($comment_err)){
      $data = [
        'user_email' => $email,
        'PID' => $PID,
        'comment' => $comment
      ];
      if($comm->addComment($data)) {
        $feedback = 'Your Product Was Added Successfully';
        header("refresh:0;product?PID=$PID");
      } else {
        $feedback = 'Your Product Was Not Added Successfully';
      }
    }
  }
?>
<?php
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
  $PID = $_GET['PID'];
  $res = $user->countUser($uData);
  $prod = $products->relatedProducts();
  $data = $products->getProduct($PID);
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
            <div class="col-md-6 col-sm-12">
              <div class="card-prod" style="text-align:center">
                <img src="../assets/img/products/<?php echo $data->prod_image; ?>" alt="<?php echo $data->prod_name; ?>" style="width:70%;margin:0 auto;">
                <h4><?php echo $data->prod_name; ?></h4>
                <small class="price">NGN<?php echo sprintf('%.2f', $data->prod_price); ?></small>
                <p style="background: #ccc;padding:10px"><?php echo $data->prod_desc; ?></p>
                <p>
                  <button type="submit" style='font-size:18px' id="like"><i class="fas fa-thumbs-up"></i>&nbsp;&nbsp;<span id="like_counter"><?php echo $like->likes; ?></span></button>
                  <button style='font-size:18px' id="dislike" type="submit"><i class="fas fa-thumbs-down"></i>&nbsp;&nbsp;<span id="dislike_counter"><?php echo $dislike->dislikes; ?></span></button>
                  <button style='font-size:18px; color:#fff'><a href="tel: <?php echo $data->phone; ?>" style='color:#fff' title="Works Best For Mobile Devices"><i class="fas fa-phone"></i></a></button>
                  <button style='font-size:18px'><a href="chat?SID=<?php echo $data->UID; ?>" style='color:#fff' ><i class='fas fa-comment-dots'></i></a></button>
                  <!-- <br><br><div class="sharethis-inline-share-buttons"></div> -->
                </p>  
              </div>
            </div>
            <div class="col-md-6 col-sm-12" style="padding:10px"> 
                <h3 class="heading">Users Reviews</h3>
                <span class="fas fa-star checked"></span>
                <span class="fas fa-star checked"></span>
                <span class="fas fa-star checked"></span>
                <span class="fas fa-star checked"></span>
                <span class="fas fa-star"></span>
                <p>4.1 average based on 254 reviews.</p>
                <hr style="border:3px solid #f1f1f1">
              <section style="padding:10px">
                <div class="side">5 star</div>
                <div class="middle"><div class="bar-container"><div class="bar-5"></div></div></div>
                <div class="side right">150</div>

                <div class="side">4 star</div>
                <div class="middle"><div class="bar-container"><div class="bar-4"></div></div></div>
                <div class="side right">63</div>

                <div class="side">3 star</div>
                <div class="middle"><div class="bar-container"><div class="bar-3"></div></div></div>
                <div class="side right">15</div>

                <div class="side">2 star</div>
                <div class="middle"><div class="bar-container"><div class="bar-2"></div></div></div>
                <div class="side right">6</div>

                <div class="side">1 star</div>
                <div class="middle"><div class="bar-container"><div class="bar-1"></div></div></div>
                <div class="side right">20</div>
                <div class="clr"></div>
              </section>
              <div style="padding-top:20px;text-align:center;margin: 10px auto">
                <h6 class="heading1">Rate Product</h6>
                <div class="rating">
                  <input id="rating-5" type="radio" name="rating" value="5" onclick="myFunc(id)"/><label for="rating-5"><i class="fas fa-2x fa-star"></i></label>
                  <input id="rating-4" type="radio" name="rating" value="4" onclick="myFunc(id)"/><label for="rating-4"><i class="fas fa-2x fa-star"></i></label>
                  <input id="rating-3" type="radio" name="rating" value="3" onclick="myFunc(id)"/><label for="rating-3"><i class="fas fa-2x fa-star"></i></label>
                  <input id="rating-2" type="radio" name="rating" value="2" onclick="myFunc(id)"/><label for="rating-2"><i class="fas fa-2x fa-star"></i></label>
                  <input id="rating-1" type="radio" name="rating" value="1" onclick="myFunc(id)"/><label for="rating-1"><i class="fas fa-2x fa-star"></i></label>
                </div>
              </div>
            </div>
          </div>
        </div>
      </article> <br> <br>
      <h2 style="text-align:center;margin: 10px auto;">Related Products</h2>
      <div class="scrollmenu">
        <?php foreach($prod as $product): ?>
        <a href="product?PID=<?php echo $product->PID; ?> ">
          <img src="../assets/img/products/<?php echo $product->prod_image; ?>" width="200px" height="200px" />
          <h5> <?php echo $product->prod_name; ?></h5>
        </a>
        <?php endforeach; ?>
      </div>

      <section class="comment-section">
        <h3 style="text-align:center;">Comment</h3>
        <hr style="color:#45643f" />
        <?php foreach($com as $comment): ?>
          <div class="comment">
            <div class="info">
                <a><?php echo $comment->name; ?></a>
                <span><?php echo $comment->created_at; ?></span>
            </div>
            <a class="avat" href="#">
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
              <img src="../assets/img/users/<?php echo $res->photo; ?>" width="45" height="45" alt="<?php echo $res->name; ?>" title="<?php echo $res->name; ?>" />
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

      document.querySelector("#like").addEventListener("click", function(e){
        // document.querySelector("#like").attribute = disabled;
        // document.querySelector("#dislike").attribute = disabled;
        let xhr1;
        if(window.XMLHttpRequest) {
            xhr1 = new XMLHttpRequest();
        } else {
            xhr1 = new ActiveXObject('Microsoft.XMLHTTP');
        }
        xhr1.open('GET', 'like_product?PID=<?php echo $data->PID; ?>', true);
        xhr1.onload = function() {
            if (this.status === 200) {
              location.reload();                       
            }
        }
        xhr1.onerror = function() {
            console.log('Request Error');
        }
        xhr1.send();
      });

      document.querySelector("#dislike").addEventListener("click", function(e){
        let xhr2;
        if(window.XMLHttpRequest) {
            xhr2 = new XMLHttpRequest();
        } else {
            xhr2 = new ActiveXObject('Microsoft.XMLHTTP');
        }
        xhr2.open('GET', 'dislike_product?PID=<?php echo $data->PID; ?>', true);
        xhr2.onload = function() {
            if (this.status === 200) {
              location.reload();                     
            }
        }
        xhr2.onerror = function() {
            console.log('Request Error');
        }
        xhr2.send();
      });

      // function myFunc($this) {
      //   var val = document.getElementById($this).value;
        
        // e.preventDefault();
        // var stars = val;
        // var UID = <?php echo $res->UID; ?>;
        // var PID = <?php echo $data->PID; ?>;
        // console.log(val,stars,PID,UID);
            // $.ajax( {
            //     url: "rate_product<?php echo $data->PID; ?>",
            //     method: "POST",
            //     data: [UID, PID, stars],
            //     dataType: "text",
            //     success: function() {
            //         alert("Successfully Added");
            //         window.location.reload(true);
            //     }
            // });

      //   $data = [UID, PID, stars];
      //   let xhr;
      //   if(window.XMLHttpRequest) {
      //       xhr = new XMLHttpRequest();
      //   } else {
      //       xhr = new ActiveXObject('Microsoft.XMLHTTP');
      //   }
      //   xhr.open('GET', 'rate_product?PID=<?php echo $data->PID; ?>', true);
      //   xhr.onload = function() {
      //       if (this.status === 200) {
      //         location.reload();                     
      //       }
      //   }
      //   xhr.onerror = function() {
      //       console.log('Request Error');
      //   }
      //   xhr.send($data);
      // }
    </script>
  </body>
</html>