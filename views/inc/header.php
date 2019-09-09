  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>
  <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="../assets/css/style.css">
  <link rel="stylesheet" href="../assets/css/comment.css">
</head>
<body>
<button onclick="topFunction()" id="myBtn" title="Go to top"><i class='fas fa-angle-up'></i></button>
<header>
  <nav class="navbar navbar-expand-md bg-nav fixed-top">
    <a class="navbar-brand" href="/">Easy Mkt</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExample04">
      <ul class="navbar-nav navbar-left">
        <li class="nav-item">
          <a class="nav-link" href="/">Home <span class="sr-only"></span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="products">Products</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="sellers">Sellers</a>
        </li>
         <!-- <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>
            <div class="dropdown-menu" aria-labelledby="dropdown01">
              <a class="dropdown-item" href="#">Action</a>
              <a class="dropdown-item" href="#">Another action</a>
              <a class="dropdown-item" href="#">Something else here</a>
            </div>
          </li> -->
      </ul>

      <ul class="navbar-nav navbar-right">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span class="avatar avatar-online">
              <img src="../assets/img/users/<?php echo $res->photo; ?> " alt="Avatar" class="avatar"><i class="offline"></i>
              <span class="caret"></span>
            </span>
          </a>
          <div class="dropdown-menu" aria-labelledby="dropdown04">
            <a class="dropdown-item" href="profile"><i class="fas fa-user-edit"></i> Edit Profile</a>
            
            <a class="dropdown-item" href="signout"><i class="fas fa-power-off"></i> Logout</a>
          </div>
        </li>
       

        <li class="nav-item dropdown" style="margin: 0 20px;">
          <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-bell"></i><span class="badge badge-pill badge-default badge-danger badge-default badge-up badge-glow">5</span>
          </a>
          <div class="dropdown-menu" aria-labelledby="dropdown04">
            <h4 class="dropdown-header m-0"><span class="grey darken-2">NOTIFICATIONS</span></h4><span class="notification-tag badge badge-default badge-danger float-right2 m-0">5 New</span> 
            <a class="dropdown-item" href="#">
              <div class="media">
                <div class="media-left align-self-center"><i class="far fa-bell"></i></div>
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
            <i class="fas fa-envelope"></i><span class="badge badge-pill badge-default badge-danger badge-default badge-up badge-glow">5</span>
          </a>
          <div class="dropdown-menu" aria-labelledby="dropdown04">
            <h6 class="dropdown-header m-0"><span class="grey darken-2">Messages</span></h6><span class="notification-tag badge badge-default badge-warning float-right2 m-0">4 New</span>  
            <a class="dropdown-item" href="#">
              <div class="media">
                <div class="media-left align-self-center"><i class="far fa-bell"></i></div>
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