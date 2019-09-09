<?php require_once 'inc/sessions.php'; ?>
<?php
  require_once 'config/db_config.php';
  require_once 'config/db_conn.php';
  require_once 'models/User.php';
  @$user = new Users();
  $uData = [
    'email' => $_SESSION['email']
  ];
  $res = $user->countUser($uData);
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Chat | Easy Traders' App</title>
  <link rel="stylesheet" href="../assets/css/chat.css">
  <?php require_once 'inc/header.php'; ?>
  <main>
<div class="container">
  <div class="row no-gutters">
    <div class="col-md-4 border-right">
      <div class="settings-tray">
        <img src="../assets/img/users/<?php echo $res->photo; ?>" width="45" height="45" alt="<?php echo $res->name; ?>" title="<?php echo $res->name; ?>" style="border-radius:50%"/>
        <span><?php echo $res->name; ?></span>
      </div>
      <div class="friend-drawer friend-drawer--onhover">
        <img class="profile-image" src="http://www.allmyfriends.it/robocop.jpg" alt="">
        <div class="text">
          <h6>Robo Cop</h6>
          <p class="text-muted">Hey, you're arrested!</p>
        </div>
        <span class="time text-muted small">13:21</span>
      </div>
      <hr>
      <div class="friend-drawer friend-drawer--onhover">
        <img class="profile-image" src="https://www.popcultureshocktoys.com/content/images/thumbs/0006453_optimus-prime-classic-series_600.jpeg" alt="">
        <div class="text">
          <h6>Optimus</h6>
          <p class="text-muted">Wanna grab a beer?</p>
        </div>
        <span class="time text-muted small">00:32</span>
      </div>
      <hr>
      <div class="friend-drawer friend-drawer--onhover ">
        <img class="profile-image" src="https://thumbor.forbes.com/thumbor/960x0/https%3A%2F%2Fblogs-images.forbes.com%2Fmarkhughes%2Ffiles%2F2016%2F01%2FTerminator-2-1200x873.jpg" alt="">
        <div class="text">
          <h6>Skynet</h6>
          <p class="text-muted">Seen that canned piece of s?</p>
        </div>
        <span class="time text-muted small">13:21</span>
      </div>
      <hr>
      <div class="friend-drawer friend-drawer--onhover">
        <img class="profile-image" src="http://i66.tinypic.com/2qtbqxe.jpg" alt="">
        <div class="text">
          <h6>Termy</h6>
          <p class="text-muted">Im studying spanish...</p>
        </div>
        <span class="time text-muted small">13:21</span>
      </div>
      <hr>
      <div class="friend-drawer friend-drawer--onhover">
        <img class="profile-image" src="http://i66.tinypic.com/2qtbqxe.jpg" alt="">
        <div class="text">
          <h6>Termy</h6>
          <p class="text-muted">Im studying spanish...</p>
        </div>
        <span class="time text-muted small">13:21</span>
      </div>
      <hr>
      <div class="friend-drawer friend-drawer--onhover">
        <img class="profile-image" src="http://i66.tinypic.com/2qtbqxe.jpg" alt="">
        <div class="text">
          <h6>Termy</h6>
          <p class="text-muted">Im studying spanish...</p>
        </div>
        <span class="time text-muted small">13:21</span>
      </div>
      <hr>
      <div class="friend-drawer friend-drawer--onhover">
        <img class="profile-image" src="http://i66.tinypic.com/2qtbqxe.jpg" alt="">
        <div class="text">
          <h6>Termy</h6>
          <p class="text-muted">Im studying spanish...</p>
        </div>
        <span class="time text-muted small">13:21</span>
      </div>
      <hr>
      <div class="friend-drawer friend-drawer--onhover">
        <img class="profile-image" src="http://i66.tinypic.com/2qtbqxe.jpg" alt="">
        <div class="text">
          <h6>Termy</h6>
          <p class="text-muted">Im studying spanish...</p>
        </div>
        <span class="time text-muted small">13:21</span>
      </div>
      <hr>
      <div class="friend-drawer friend-drawer--onhover">
        <img class="profile-image" src="http://i66.tinypic.com/2qtbqxe.jpg" alt="">
        <div class="text">
          <h6>Termy</h6>
          <p class="text-muted">Im studying spanish...</p>
        </div>
        <span class="time text-muted small">13:21</span>
      </div>
      <hr>
      <div class="friend-drawer friend-drawer--onhover">
        <img class="profile-image" src="https://cdn.vox-cdn.com/thumbor/AYUayCXcqYxHDkR4a1N9azY5c_8=/1400x1400/filters:format(jpeg)/cdn.vox-cdn.com/uploads/chorus_asset/file/9375391/MV5BYjg1Yjk1MTktYzE5Mi00ODkwLWFkZTQtNTYxYTY3ZDVmMWUxXkEyXkFqcGdeQXVyNjUwNzk3NDc_._V1_.jpg" alt="">
        <div class="text">
          <h6>Richard</h6>
          <p class="text-muted">I'm not sure...</p>
        </div>
        <span class="time text-muted small">13:21</span>
      </div>
      <hr>
      <div class="friend-drawer friend-drawer--onhover">
        <img class="profile-image" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQXzQ3HEvJBpgptB48mdCwRt_BHrmNrDwQiIlrjgJbDKihAV_NI" alt="">
        <div class="text">
          <h6>XXXXX</h6>
          <p class="text-muted">Hi, wanna see something?</p>
        </div>
        <span class="time text-muted small">13:21</span>
      </div>
    </div>
    <div class="col-md-8">
      <div class="settings-tray">
        <div class="friend-drawer no-gutters friend-drawer--grey">
          <img src="../assets/img/users/<?php echo $res->photo; ?>" width="45" height="45" alt="<?php echo $res->name; ?>" title="<?php echo $res->name; ?>" />
          <div class="text">
            <h6><?php echo $res->name; ?></h6>
          </div>
        </div>
      </div>
      <div class="chat-panel">
        <div class="row no-gutters">
          <div class="col-md-3">
            <div class="chat-bubble chat-bubble--left">
              Hello dude!
            </div>
          </div>
        </div>
        <div class="row no-gutters">
          <div class="col-md-3 offset-md-9">
            <div class="chat-bubble chat-bubble--right">
              Hello dude!
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <div class="chat-box-tray">
              <i class="material-icons">satisfied</i>
              <input type="text" placeholder="Type your message here...">
              <i class="material-icons">mic</i>
              <i class="material-icons">send</i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
    </main>
    <?php require_once 'inc/footer.php'; ?> 
    <script>
    $( '.friend-drawer--onhover' ).on( 'click',  function() {
      $( '.chat-bubble' ).hide('slow').show('slow');
    })
    </script>
  </body>
</html>
