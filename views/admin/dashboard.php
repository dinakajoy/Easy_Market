<?php require_once 'inc/sessions.php'; ?>
<?php
  // include database files
  require_once 'config/db_config.php';
  require_once 'config/db_conn.php';
  require_once 'models/User.php';
  require_once 'models/Product.php';
  // Instantiate Customer and Prepare insert query
  @$user = new Users();
  $product = new Products();
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
      <section class="showcase">
        <div class="container jumbotron">
          <h1 class="jumbotron-heading">Easy Traders' App</h1>
          <p class="lead">A platform for easy management of customers</p><br />
          <p>YOU DON'T HAVE ANY PRODECT YET. <a href="admin-addProduct">Click </a> TO ADD NEW PRODUCTS</p>
        </div>
      </section>
    <div class="album py-5 bg-light">
      <div class="container footer">
        <h4>Easy Traders' App: Online Shopping Blog in Nigeria - No. 1 Shopping Destination</h4>
        <p>
          Easy Traders' App is your number one online shopping site in Nigeria. We are an online Platform where you 
          can purchase all your electronics, as well as books, home appliances, kiddies items, fashion items for men, 
          women, and children; cool gadgets, computers, groceries, automobile parts, and more on the go. What more? 
          You can have them delivered directly to you.  Whatever it is you wish to buy, Easy Traders' App offers you 
          all and lots more at prices which you can trust.</p>
          
        <p>Step out in style with Easy Traders' App Fashion and Style as we bring you awesome fashion collections from 
          top brands such as Zara, Woodin, Fever London, St Genevieve, top quality shirts, vintage shirts and footwear 
          from Nigerian indigenous designers like David Wej. Moreover, you can look through our wide selection of Ankara 
          style and make your pick for that next event you have. Also, get classy women's shoes from top designers like 
          Plum, Qupid as well as watches from Casio, Titan and more. Beautify yourself with cosmetics and skin care 
          products from Mary Kay, House of Tara, Sleek, Maybelline and much more. </p>
          
        <p>Easy Traders' App makes online shopping fun with our new arrivals as well as huge discounts on a large 
          selection of fashion items and more. Easy Traders' App has the original New Look fashion brand online for 
          you to shop.</p>

        <p>Buy Mobile Phones, Fashion, Electronics, Appliances & more on Easy Traders' App
          Be in the loop this year with new products and offers from Easy Traders' App. Brand your home with 
          various electronics and home and office appliances from Binatone, Panasonic, Samsung, Toshiba, Sony, 
          and LG.
        </p>
      </div>
    </div>
  </main>
  <?php require_once 'inc/footer.php'; ?>
  </body>
</html>