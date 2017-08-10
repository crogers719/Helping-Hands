<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <title>Helping|Hands</title>

    <link rel="stylesheet" type="text/css" href="/~CR1501/project_2/_assets/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="/~CR1501/project_2/_assets/css/local.css" />

    <script type="text/javascript" src="/~CR1501/project_2/_assets/js/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="/~CR1501/project_2/_assets/bootstrap/js/bootstrap.min.js"></script>

</head>
<body>
  

<div class="wrapper">
    <div class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <a href="/~CR1501/project_2/index.php" class="navbar-brand"><img src="/~CR1501/project_2/_assets/images/helping-hands-logo.jpg" alt=""></a>
          <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
        <div class="navbar-collapse collapse" id="navbar-main">
          <ul class="nav navbar-nav">
          <li>
              <a href="/~CR1501/project_2/index.php">Home</a>
            </li>
            <?php if(isset($_SESSION['user'])&& $_SESSION['security_level'] == 'G') { ?>
              <li>
                <a href="/~CR1501/project_2/logout.php">Log Out</a>
              </li>
               <li>
                <a href="/~CR1501/project_2/user/index.php">Hi, <?php echo $_SESSION['user'] ?></a>
              </li>
              <?php }else if(isset($_SESSION['user'])&& $_SESSION['security_level'] == 'A') { ?>
              <li>
                <a href="/~CR1501/project_2/logout.php">Log Out</a>
              </li>
               <li>
                <a href="/~CR1501/project_2/admin/index.php">Hi, <?php echo $_SESSION['user'] ?></a>
              </li>
        
              <?php   } ?>
          </ul>

        </div>
        <!-- end of navbar-collapse collapse -->
      </div>
      <!-- end of container -->
    </div>
    <!-- end of navbar -->
