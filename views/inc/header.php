  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>
  <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
<button onclick="topFunction()" id="myBtn" title="Go to top"><i class='fas fa-angle-up'></i></button>
<header>
  <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top justify-content-center">
    <a class="navbar-brand" href="/">Easy Traders' App</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExample04">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="/">Home <span class="sr-only"></span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="products">Products</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="sellers">Sellers</a>
        </li>
      </ul>

      <!-- <form class="form-inline my-2 my-md-0">
        <input class="form-control" type="text" placeholder="Search">
      </form> -->

      <ul class="navbar-nav mr-auto navbar-right">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Welcome, <?php echo $res->name; ?>
            <span class="avatar avatar-online">
              <img src="../img/users/<?php echo $res->photo; ?>" alt="Avatar" class="avatar" /><i></i>
              <span class="caret"></span>
            </span>
          </a>
          <div class="dropdown-menu" aria-labelledby="dropdown04">
            <a class="dropdown-item" href="profile.php"><i class="fa fa-user"></i> Edit Profile</a>
            <a class="dropdown-item"  href="signout"><i class="fa fa-power-off"></i> Logout</a>
          </div>
        </li>

        <li class="nav-item dropdown" style="margin: 0 20px;">
          <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class='far fa-bell'></i><span class="badge badge-pill badge-default badge-danger badge-default badge-up badge-glow">5</span>
          </a>
          <div class="dropdown-menu" aria-labelledby="dropdown04">
            <h4 class="dropdown-header m-0"><span class="grey darken-2">NOTIFICATIONS</span></h4><span class="notification-tag badge badge-default badge-danger float-right2 m-0">5 New</span> 
            <a class="dropdown-item" href="#">
              <div class="media">
                <div class="media-left align-self-center"><i class='far fa-bell'></i></div>
                <div class="media-body">
                  <h6 class="media-heading">You have new order!</h6>
                  <p class="notification-text font-small-3">Lorem ipsum dolor sit amet, consectetuer elit.</p>
                  <small><time class="media-meta" datetime="2015-06-11T18:29:20+08:00">30 minutes ago</time></small>
                </div>
              </div>
            </a>
          </div>
          <div class="dropdown-menu" aria-labelledby="dropdown04">
            <a class="dropdown-item" href="#"><i class="fa fa-power-off"></i> View All Notifications</a>
          </div>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class='far fa-bell'></i><span class="badge badge-pill badge-default badge-danger badge-default badge-up badge-glow">5</span>
          </a>
          <div class="dropdown-menu" aria-labelledby="dropdown04">
            <h6 class="dropdown-header m-0"><span class="grey darken-2">Messages</span></h6><span class="notification-tag badge badge-default badge-warning float-right2 m-0">4 New</span>  
            <a class="dropdown-item" href="#">
              <div class="media">
                <div class="media-left align-self-center"><i class='far fa-bell'></i></div>
                <div class="media-body">
                  <h6 class="media-heading">You have new order!</h6>
                  <p class="notification-text font-small-3">Lorem ipsum dolor sit amet, consectetuer elit.</p>
                  <small><time class="media-meta" datetime="2015-06-11T18:29:20+08:00">30 minutes ago</time></small>
                </div>
              </div>
            </a>
          </div>
          <div class="dropdown-menu" aria-labelledby="dropdown04">
            <a class="dropdown-item" href="#"><i class="fa fa-power-off"></i> View All Notifications</a>
          </div>
        </li>
      </ul>
    </div>
  </nav>
</header>