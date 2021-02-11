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
  <title>Messages - Park-a-lot</title>
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


    <!-- Custom styles for this template -->
    <!--<link href="startbootstrap-sb-admin-2-gh-pages/css/sb-admin-2.min.css" rel="stylesheet">-->

    <!-- Custom styles for this page -->
    <link href="startbootstrap-sb-admin-2-gh-pages/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">







  <link href="stylesheet.css" rel="stylesheet">


</head>

<body>
<?php
$username=$_SESSION['id'];
            /*$carpark=$_SESSION['carpark'];
            $sqlcp = "SELECT * FROM Carpark WHERE carparkname='$carpark'";
            $cpdata = $db->query($sqlcp);
            $cprow = mysqli_fetch_array($cpdata,MYSQLI_BOTH);
            $cppic = $cprow['carparkpic'];
            $cpaddress = $cprow['carparkaddress'];
            $cpcontact = $cprow['carparkcontact'];
            $cpid=$cprow['carparkid'];*/
            
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
            <a class="nav-link" href="carpark.php">
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
              <a class="nav-link" href="addAdmin.php">
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
            <a class="nav-link" href="carpark.php">
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
                <a href="welcome.php" class="dropdown-item">
                  <i class="ni ni-single-02"></i>
                  <span>My profile</span>
                </a>
                <a href="messages.php" class="dropdown-item">
                <i class="fas fa-comments"></i>
                  <span>Messages</span>
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
              <h6 class="h2 text-white d-inline-block mb-0">Messages</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="welcome.php"><i class="fas fa-home"></i></a></li>
                  <!--
                    <li class="breadcrumb-item"><a href="#">Carpark</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Tables</li>
                -->
                <li class="breadcrumb-item active" aria-current="page">Messages</li>
                </ol>
              </nav>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--below header bg image-->
    <div class="container-fluid mt--6">
    <!-- Page content -->
      <!--startbootstrap's table-->
      <div class="card shadow mb-4">
                        <div class="card-header py-3">
                        <div class="row">
                            <h2 class="m-0 font-weight-bold text-primary col-6">Messages</h2>
                        </div>
                        <div class="card-body">







<div class="row">
<div class="col-lg-3">
<div class="list-group list-group-flush">
<?php
$allsender="SELECT DISTINCT sender FROM Message WHERE receiver='$username' OR sender='$username'";
$result = $db->query($allsender);
                          if ($result->num_rows > 0) { 
                              while($row = mysqli_fetch_assoc($result)) { 
                                  if($row['sender']!=$username){
                                      $partner=$row['sender'];
                                    $mess="SELECT * FROM Message WHERE sender='$partner' ORDER BY time DESC LIMIT 1";
                                    $recentmess = $db->query($mess);
                                     $onemess = mysqli_fetch_array($recentmess,MYSQLI_BOTH);

                                     $latest="SELECT * FROM Message WHERE sender='$partner' OR receiver='$partner' ORDER BY time DESC LIMIT 1";
                                     $lastmess = $db->query($latest);
                                     $final = mysqli_fetch_array($lastmess,MYSQLI_BOTH);

                                     $checkuser="SELECT * FROM User WHERE userid='$partner'";
                                     $users=$db->query($checkuser);
                                     if ($users->num_rows > 0) { 
                                        while($userimg = mysqli_fetch_assoc($users)) { 
                                         $partnerpic=$userimg['userpic'];
                                         //echo $userimg['userpic'].$partnerpic.$onemess['sender'];
                                        }
                                     }

                                     $checkstaff="SELECT * FROM Staff WHERE staffid='$partner'";
                                     $staffs=$db->query($checkstaff);
                                     if ($staffs->num_rows > 0) { 
                                        while($staffimg = mysqli_fetch_assoc($staffs)) { 
                                         $partnerpic=$staffimg['staffpic'];
                                         //echo $staffimg['staffpic'].$partnerpic.$onemess['sender'];
                                        }
                                     }

                                     $checkadmin="SELECT * FROM Admin WHERE adminid='$partner'";
                                     $admins=$db->query($checkadmin);
                                     if ($admins->num_rows > 0) { 
                                        while($adminimg = mysqli_fetch_assoc($admins)) { 
                                         $partnerpic=$adminimg['adminpic'];
                                         //echo $adminimg['staffpic'].$partnerpic.$onemess['sender'];
                                        }
                                     }

                                    echo '
                                    <form action="" method="post">
                                    <button type="submit" name="selectConvo" value="'.$onemess['sender'].'" class="list-group-item list-group-item-action">
                    <div class="row align-items-center">
                      <div class="col-auto">
                        <img alt="Image placeholder" src="DisplayFolder/'.$partnerpic.'" class="avatar rounded-circle">
                      </div>
                      <div class="col ml--2">
                        <div class="d-flex justify-content-between align-items-center">
                          <div>
                            <h4 class="mb-0 text-sm">'.$onemess['sender'].'</h4>
                          </div>
                          <div class="text-right text-muted">
                            <small>'.
                            date("H:i", strtotime($onemess['time']))
                            .'</small>
                          </div>
                        </div>
                        <p class="text-sm mb-0">'.substr($final['textmessage'], 0, 50).'...</p>
                      </div>
                    </div>
                  </button>
                  </form>
                                    '
                                    ;
                                  }
                              }
                            }

?>
<!--
                        <a href="#!" class="list-group-item list-group-item-action">
                    <div class="row align-items-center">
                      <div class="col-auto">
                        <img alt="Image placeholder" src="argon-dashboard-master/assets/img/theme/team-1.jpg" class="avatar rounded-circle">
                      </div>
                      <div class="col ml--2">
                        <div class="d-flex justify-content-between align-items-center">
                          <div>
                            <h4 class="mb-0 text-sm">username</h4>
                          </div>
                          <div class="text-right text-muted">
                            <small>2 hrs ago</small>
                          </div>
                        </div>
                        <p class="text-sm mb-0">Let's meet at Starbucks at 11:30. Wdyt?</p>
                      </div>
                    </div>
                  </a>
                  -->
                  
</div>
</div>

<div class="col-lg-9">
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST['selectConvo'])){
        $convodude=$_POST['selectConvo'];
        echo '
        <div class="row">
        <div class="col-lg-12">
        <div class="alert alert-default">
        '
        .$convodude.
        '
        </div>
        </div>
        </div>';

        $checkuser="SELECT * FROM User WHERE userid='$convodude'";
                                     $users=$db->query($checkuser);
                                     if ($users->num_rows > 0) { 
                                        while($userimg = mysqli_fetch_assoc($users)) { 
                                         $convopic=$userimg['userpic'];
                                         //echo $userimg['userpic'].$partnerpic.$onemess['sender'];
                                        }
                                     }

                                     $checkstaff="SELECT * FROM Staff WHERE staffid='$convodude'";
                                     $staffs=$db->query($checkstaff);
                                     if ($staffs->num_rows > 0) { 
                                        while($staffimg = mysqli_fetch_assoc($staffs)) { 
                                         $convopic=$staffimg['staffpic'];
                                         //echo $staffimg['staffpic'].$partnerpic.$onemess['sender'];
                                        }
                                     }

                                     $checkadmin="SELECT * FROM Admin WHERE adminid='$convodude'";
                                     $admins=$db->query($checkadmin);
                                     if ($admins->num_rows > 0) { 
                                        while($adminimg = mysqli_fetch_assoc($admins)) { 
                                         $convopic=$adminimg['adminpic'];
                                         //echo $adminimg['staffpic'].$partnerpic.$onemess['sender'];
                                        }
                                     }


        $fullmess="SELECT * FROM Message WHERE receiver='$convodude' AND sender='$username' OR receiver='$username' AND sender='$convodude' ORDER BY time";
        $full=$db->query($fullmess);
        if ($full->num_rows > 0) { 
        while($convo = mysqli_fetch_assoc($full)) { 
            if($convo['receiver']==$username){
            echo '<div class="row">
            <div class="col-lg-1">
            <div class="col-auto">
            <img alt="Image placeholder" src="DisplayFolder/'.$convopic.'" class="avatar rounded-circle">
          </div>
          </div>
            <div class="col-lg-9 text-left alert alert-secondary">'
            .$convo['textmessage'].
            '</div>
            <div class="col-lg-2">
            </div>
            </div>';
            }
            elseif($convo['receiver']==$convodude){
                echo '<div class="row">
            <div class="col-lg-2">
            </div>
            <div class="col-lg-9 text-right alert alert-primary">'
            .$convo['textmessage'].
            '</div>
            <div class="col-lg-1">
            <div class="col-auto">
            <img alt="Image placeholder" src="DisplayFolder/'.$pic.'" class="avatar rounded-circle">
          </div>
            </div>
            </div>';
            }
        }
    }
        


        
    }
    echo '
    <form action="" method="post">
    <div row="row">
    <div class="input-group mb-3">
    <form action="" method="post">
      <input type="text" class="form-control" placeholder="Text message" aria-label="Text message" aria-describedby="button-addon2" name="sentMess">
      <div class="input-group-append">
        <button class="btn btn-outline-primary" type="submit" id="button-addon2" name="sendText" value="'.$convodude.'">Send</button>
      </div>
    </div>
    </div>
    </form>';
}
?>


</div>




</div>





                        </div>
                    </div>

                    <?php
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                      if(isset($_POST['sendText'])){
                          $sentMessage=$_POST['sentMess'];
                          $convoparty=$_POST['sendText'];
                          //echo $sentMessage.$convoparty;
                          $addMess="INSERT INTO Message VALUES(null,'$sentMessage','$convoparty','$username',now())";
                          $db->query($addMess);
                      }
                    }
                    ?>
                




















     

          </div>
        </div>
      </div>
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


    <!-- Core plugin JavaScript-->
    <script src="startbootstrap-sb-admin-2-gh-pages/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="startbootstrap-sb-admin-2-gh-pages/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="startbootstrap-sb-admin-2-gh-pages/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="startbootstrap-sb-admin-2-gh-pages/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    

    <!-- Page level custom scripts -->
    <script src="startbootstrap-sb-admin-2-gh-pages/js/demo/datatables-demo.js"></script>


  <script>
      $(document).ready(function(){
    $(".editable").on('input',function(){
      $(".editedbtn").prop("disabled", false);
    });
})
  </script>
      
</body>

</html>