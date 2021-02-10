<!--
=========================================================
* Argon Dashboard - v1.2.0
=========================================================
* Product Page: https://www.creative-tim.com/product/argon-dashboard


* Copyright  Creative Tim (http://www.creative-tim.com)
* Coded by www.creative-tim.com



=========================================================
* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<?php include('session.php');?>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title>Carpark - Park-a-lot</title>
  <!-- Favicon -->
  <link rel="icon" href="argon-dashboard-master/assets/img/brand/park-a-lot-logo.png" type="image/png">
  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <!-- Icons -->
  <link rel="stylesheet" href="argon-dashboard-master/assets/vendor/nucleo/css/nucleo.css" type="text/css">
  <link rel="stylesheet" href="argon-dashboard-master/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
  <!-- Argon CSS -->
  <link href="stylesheet.css" rel="stylesheet">
  <link rel="stylesheet" href="argon-dashboard-master/assets/css/argon.css" type="text/css">
  <link href="stylesheet.css" rel="stylesheet">
</head>

<body>
<?php
            $username=$_SESSION['id'];
            if($_SESSION['user']=="Admin"){
                $sql = "SELECT * FROM Admin WHERE adminid = '$username'";
                $result = $db->query($sql);
                $row = mysqli_fetch_array($result,MYSQLI_BOTH);
                    $user="Admin";
                    $pic = $row['adminpic'];
            }
            elseif($_SESSION['user']=="Staff"){
                $sql = "SELECT * FROM staff WHERE staffid = '$username'";
                $result = $db->query($sql);
                $row = mysqli_fetch_array($result,MYSQLI_BOTH);
                    $user = "Staff";
                    $pic = $row['staffpic'];
                    $staffcp = $row['carparkid'];
            }
            ?>
            
  <!-- Sidenav -->
  <nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
      <!-- Brand -->
      <div class="sidenav-header  align-items-center">
        <a class="navbar-brand" href="javascript:void(0)">
          <img src="argon-dashboard-master/assets/img/brand/park-a-lot-brand.png" class="navbar-brand-img" alt="...">
        </a>
      </div>
      <div class="navbar-inner">
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
          <!-- Nav items -->
          <ul class="navbar-nav">
          <?php if ($_SESSION['user']=="Admin"){?>
          
          <li class="nav-item">
            <a class="nav-link" href="welcome.php">
              <i class="ni ni-single-02 text-yellow"></i>
              <span class="nav-link-text">Profile</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link active" href="carpark.php">
              <i class="fas fa-parking text-orange"></i>
              <span class="nav-link-text">Carpark</span>
            </a>
          </li>
          
          <li class="nav-item">
            <a class="nav-link" href="car.php">
              <i class="fas fa-car text-primary"></i>
              <span class="nav-link-text">Car</span>
            </a>
          </li>

          <li class="nav-item">
              <a class="nav-link" href="user.php">
                <i class="fas fa-users text-default"></i>
                <span class="nav-link-text">User</span>
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="#">
                <i class="ni ni-circle-08 text-info"></i>
                <span class="nav-link-text">Register</span>
              </a>
            </li>
        <?php }
        elseif($_SESSION['user']=="Staff"){?>
          <li class="nav-item">
            <a class="nav-link" href="welcome.php">
              <i class="ni ni-single-02 text-yellow"></i>
              <span class="nav-link-text">Profile</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link active" href="carpark.php">
              <i class="fas fa-parking text-orange"></i>
              <span class="nav-link-text">Carpark</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="#">
              <i class="far fa-life-ring text-default"></i>
              <span class="nav-link-text">Assist</span>
            </a>
          </li>
        <?php } ?>
          </ul>
        </div>
      </div>
    </div>
  </nav>
  <!-- Main content -->
  <div class="main-content" id="panel">
    <!-- Topnav -->
    <nav class="navbar navbar-top navbar-expand navbar-dark bg-default border-bottom">
      <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <!-- Search form -->
          <!--
          <form class="navbar-search navbar-search-light form-inline mr-sm-3" id="navbar-search-main">
            <div class="form-group mb-0">
              <div class="input-group input-group-alternative input-group-merge">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-search"></i></span>
                </div>
                <input class="form-control" placeholder="Search" type="text">
              </div>
            </div>
            <button type="button" class="close" data-action="search-close" data-target="#navbar-search-main" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </form>
        -->
          <!-- Navbar links -->
          <ul class="navbar-nav align-items-center  ml-md-auto ">
            <li class="nav-item d-xl-none">
              <!-- Sidenav toggler -->
              <div class="pr-3 sidenav-toggler sidenav-toggler-dark" data-action="sidenav-pin" data-target="#sidenav-main">
                <div class="sidenav-toggler-inner">
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                </div>
              </div>
            </li>
            <li class="nav-item d-sm-none">
              <a class="nav-link" href="#" data-action="search-show" data-target="#navbar-search-main">
                <i class="ni ni-zoom-split-in"></i>
              </a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="ni ni-bell-55"></i>
              </a>
              <div class="dropdown-menu dropdown-menu-xl  dropdown-menu-right  py-0 overflow-hidden">
                <!-- Dropdown header -->
                <div class="px-3 py-3">
                  <h6 class="text-sm text-muted m-0">You have <strong class="text-primary">13</strong> notifications.</h6>
                </div>
                <!-- List group -->
                <div class="list-group list-group-flush">
                  <a href="#!" class="list-group-item list-group-item-action">
                    <div class="row align-items-center">
                      <div class="col-auto">
                        <!-- Avatar -->
                        <img alt="Image placeholder" src="argon-dashboard-master/assets/img/theme/team-1.jpg" class="avatar rounded-circle">
                      </div>
                      <div class="col ml--2">
                        <div class="d-flex justify-content-between align-items-center">
                          <div>
                            <h4 class="mb-0 text-sm"><?php echo $username; ?></h4>
                          </div>
                          <div class="text-right text-muted">
                            <small>2 hrs ago</small>
                          </div>
                        </div>
                        <p class="text-sm mb-0">Let's meet at Starbucks at 11:30. Wdyt?</p>
                      </div>
                    </div>
                  </a>
                  <a href="#!" class="list-group-item list-group-item-action">
                    <div class="row align-items-center">
                      <div class="col-auto">
                        <!-- Avatar -->
                        <img alt="Image placeholder" src="argon-dashboard-master/assets/img/theme/team-2.jpg" class="avatar rounded-circle">
                      </div>
                      <div class="col ml--2">
                        <div class="d-flex justify-content-between align-items-center">
                          <div>
                            <h4 class="mb-0 text-sm"><?php echo $username;?></h4>
                          </div>
                          <div class="text-right text-muted">
                            <small>3 hrs ago</small>
                          </div>
                        </div>
                        <p class="text-sm mb-0">A new issue has been reported for Argon.</p>
                      </div>
                    </div>
                  </a>
                  <a href="#!" class="list-group-item list-group-item-action">
                    <div class="row align-items-center">
                      <div class="col-auto">
                        <!-- Avatar -->
                        <img alt="Image placeholder" src="argon-dashboard-master/assets/img/theme/team-3.jpg" class="avatar rounded-circle">
                      </div>
                      <div class="col ml--2">
                        <div class="d-flex justify-content-between align-items-center">
                          <div>
                            <h4 class="mb-0 text-sm"><?php echo $username;?></h4>
                          </div>
                          <div class="text-right text-muted">
                            <small>5 hrs ago</small>
                          </div>
                        </div>
                        <p class="text-sm mb-0">Your posts have been liked a lot.</p>
                      </div>
                    </div>
                  </a>
                  <a href="#!" class="list-group-item list-group-item-action">
                    <div class="row align-items-center">
                      <div class="col-auto">
                        <!-- Avatar -->
                        <img alt="Image placeholder" src="argon-dashboard-master/assets/img/theme/team-4.jpg" class="avatar rounded-circle">
                      </div>
                      <div class="col ml--2">
                        <div class="d-flex justify-content-between align-items-center">
                          <div>
                            <h4 class="mb-0 text-sm"><?php echo $username;?></h4>
                          </div>
                          <div class="text-right text-muted">
                            <small>2 hrs ago</small>
                          </div>
                        </div>
                        <p class="text-sm mb-0">Let's meet at Starbucks at 11:30. Wdyt?</p>
                      </div>
                    </div>
                  </a>
                  <a href="#!" class="list-group-item list-group-item-action">
                    <div class="row align-items-center">
                      <div class="col-auto">
                        <!-- Avatar -->
                        <img alt="Image placeholder" src="argon-dashboard-master/assets/img/theme/team-5.jpg" class="avatar rounded-circle">
                      </div>
                      <div class="col ml--2">
                        <div class="d-flex justify-content-between align-items-center">
                          <div>
                            <h4 class="mb-0 text-sm"><?php echo $username;?></h4>
                          </div>
                          <div class="text-right text-muted">
                            <small>3 hrs ago</small>
                          </div>
                        </div>
                        <p class="text-sm mb-0">A new issue has been reported for Argon.</p>
                      </div>
                    </div>
                  </a>
                </div>
                <!-- View all -->
                
                <a href="#!" class="dropdown-item text-center text-primary font-weight-bold py-3">View all</a>
              </div>
            </li>
          </ul>
          <ul class="navbar-nav align-items-center  ml-auto ml-md-0 ">
            <li class="nav-item dropdown">
              <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <div class="media align-items-center">
                  <span class="avatar avatar-sm rounded-circle">
                    <img alt="Image placeholder" src="DisplayFolder/<?php echo $pic;?>">
                  </span>
                  <div class="media-body  ml-2  d-none d-lg-block">
                    <span class="mb-0 text-sm  font-weight-bold"><?php echo $username; ?></span>
                  </div>
                </div>
              </a>
              <div class="dropdown-menu  dropdown-menu-right ">
                <div class="dropdown-header noti-title">
                  <h6 class="text-overflow m-0">Welcome!</h6>
                </div>
                <a href="#!" class="dropdown-item">
                  <i class="ni ni-single-02"></i>
                  <span>My profile</span>
                </a>
                <a href="#!" class="dropdown-item">
                  <i class="ni ni-settings-gear-65"></i>
                  <span>Settings</span>
                </a>
                <a href="#!" class="dropdown-item">
                  <i class="ni ni-calendar-grid-58"></i>
                  <span>Activity</span>
                </a>
                <a href="#!" class="dropdown-item">
                  <i class="ni ni-support-16"></i>
                  <span>Support</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="index.php" class="dropdown-item">
                  <i class="ni ni-user-run"></i>
                  <span>Logout</span>
                </a>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- Header -->
    <div class="header bg-default pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">Carpark</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="welcome.php"><i class="fas fa-home"></i></a></li>
                  <!--
                    <li class="breadcrumb-item"><a href="#">Carpark</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Tables</li>
                -->
                <li class="breadcrumb-item active" aria-current="page">Carpark</li>
                </ol>
              </nav>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--6">
      <div class="row justify-content-center">
        <div class=" col ">
          <div class="card">
            <div class="card-header bg-transparent">
              <div class="row">
            <div class="col-8">
                  <h3 class="mb-0">Carpark </h3>
                </div>
                <?php if($user=="Admin"){?>
                <div class="col-4 text-right">
                <a href="addCarpark.php" class="btn btn-success editedbtn" id="addCarpark">Add</a>
                </div>
                <?php }?>
        </div>
            </div>
            <div class="card-body">

    <div class="container-fluid">
    <div class="row">
      <?php
      if($user=="Admin"){
        $sqlcp = "SELECT * FROM Carpark ORDER BY carparkid";
        $resultcp = $db->query($sqlcp);
        if($resultcp->num_rows>0){
          while($rowcp = mysqli_fetch_assoc($resultcp)) { 
            echo '
            <form action="" method="post">
            <div class="col-md-4">
            <div class="card" style="width: 18rem;">
          <img class="card-img-top" src="CarparksPic/'.$rowcp['carparkpic'].'" alt="Card image carpark">
          <div class="card-body">
            <h5 class="card-title">'.$rowcp['carparkname'].'</h5>
            <p class="card-text">'.$rowcp['carparkaddress'].'</p>
            <button type="submit" value="'.$rowcp['carparkname'].'" class="btn btn-primary" name="submittedCarpark">Car lots</a>
          </div>
                </div>
              </div>
              </form>';
        }
      }
    }
    elseif($user=="Staff"){
      $sqlcp = "SELECT * FROM Carpark WHERE carparkid='$staffcp'";
      $resultcp = $db->query($sqlcp);
        if($resultcp->num_rows>0){
          while($rowcp = mysqli_fetch_assoc($resultcp)) { 
            echo '
            <form action="" method="post">
            <div class="col-4">
            <div class="card" style="width: 18rem;">
          <img class="card-img-top" src="CarparksPic/'.$rowcp['carparkpic'].'" alt="Card image carpark">
          <div class="card-body">
            <h5 class="card-title">'.$rowcp['carparkname'].'</h5>
            <p class="card-text">'.$rowcp['carparkaddress'].'</p>
            <button type="submit" value="'.$rowcp['carparkname'].'" class="btn btn-primary" name="submittedCarpark">Car lots</a>
          </div>
                </div>
              </div>
              </form>';
        }
      }
    }
      
      ?>
<!--
<div class="col-4">
            <div class="card" style="width: 18rem;">
          <img class="card-img-top" src="CarparksPic/'.$rowcp['carparkpic'].'" alt="Card image carpark">
          <div class="card-body">
            <h5 class="card-title">'.$rowcp['carparkname'].'</h5>
            <p class="card-text">'.$rowcp['carparkaddress'].'</p>
            <a href="#" class="btn btn-primary">Car lots</a>
          </div>
                </div>
              </div>-->
</div>
</div>
</div>
</div>
</div>
</div>
        </div>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $cpChoosen = $_POST['submittedCarpark'];
  $_SESSION['carpark']=$cpChoosen;
  echo $_SESSION['carpark'];
  echo '<script language="JavaScript">
  document.location="carlots.php";
</script>';
  
}
?>
            








      <!-- Footer -->
      <footer class="footer pt-0">
        <div class="row align-items-center justify-content-lg-between">
          <div class="col-lg-6">
            <div class="copyright text-center  text-lg-left  text-muted">
              &copy; 2020 <a href="https://www.creative-tim.com" class="font-weight-bold ml-1" target="_blank">Creative Tim</a>
            </div>
          </div>
          <div class="col-lg-6">
            <ul class="nav nav-footer justify-content-center justify-content-lg-end">
              <li class="nav-item">
                <a href="https://www.creative-tim.com" class="nav-link" target="_blank">Creative Tim</a>
              </li>
              <li class="nav-item">
                <a href="https://www.creative-tim.com/presentation" class="nav-link" target="_blank">About Us</a>
              </li>
              <li class="nav-item">
                <a href="http://blog.creative-tim.com" class="nav-link" target="_blank">Blog</a>
              </li>
              <li class="nav-item">
                <a href="https://github.com/creativetimofficial/argon-dashboard/blob/master/LICENSE.md" class="nav-link" target="_blank">MIT License</a>
              </li>
            </ul>
          </div>
        </div>
      </footer>
    </div>
  </div>
  <!-- Argon Scripts -->
  <!-- Core -->
  <script src="argon-dashboard-master/assets/vendor/jquery/dist/jquery.min.js"></script>
  <script src="argon-dashboard-master/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="argon-dashboard-master/assets/vendor/js-cookie/js.cookie.js"></script>
  <script src="argon-dashboard-master/assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
  <script src="argon-dashboard-master/assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
  <!-- Argon JS -->
  <script src="argon-dashboard-master/assets/js/argon.js?v=1.2.0"></script>



  <script src="script.js"></script>
</body>

</html>