<?php   
  require_once 'config/db_config.php';
  require_once 'config/db_conn.php';
  require_once 'models/Rating.php';
  $rate = new Ratings();
  $PID = $_GET['PID'];
//   $stars = $_GET['stars'];
//   $data = [$PID, $stars];
  $r = $rate->addRatings($data);
  header("refresh:1;product?PID=$PID");
?>