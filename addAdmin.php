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
  <title>Register - Park-a-lot</title>
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

//echo $eVeh;

/*
$carowner= $row['userid'];
$carbrand=$row['vehiclebrand'];
$carmodel=$row['vehiclemodel'];
$cartype=$row['vehicletype'];
$carlotparked=$row['parkinglotid'];*/

            if($_SESSION['user']=="Admin"){
                $sql = "SELECT * FROM Admin WHERE adminid = '$username'";
                $result = $db->query($sql);
                $row = mysqli_fetch_array($result,MYSQLI_BOTH);
                    $user="Admin";
                    $pic = $row['adminpic'];
                    $adminpwd=$row['adminpassword'];
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
              <a class="nav-link active" href="addAdmin.php">
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
              <h6 class="h2 text-white d-inline-block mb-0">Register</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="welcome.php"><i class="fas fa-home"></i></a></li>
                  <!--
                    <li class="breadcrumb-item"><a href="#">Carpark</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Tables</li>
                -->
                <li class="breadcrumb-item active" aria-current="page">Register</li>
                </ol>
              </nav>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--6">
    <form action="" method="post">
      <div class="row justify-content-center">
        <div class=" col ">
          <div class="card">
            <div class="card-header bg-transparent">
              <div class="row">
            <div class="col-8">
                  <h3 class="mb-0">Add admin </h3>
                </div>
        </div>
            </div>
            <div class="card-body">
            <h6 class="heading-small text-muted mb-4">New admin information</h6>
            <div class="pl-lg-4">
                  <div class="row">
                  <div class="col-md-3">
                      <div class="form-group editUsername">
                        <label class="form-control-label" for="input-eUsername">New admin's username</label>
                        <input type="text" id="input-eUsername" class="form-control editable" placeholder="Username" name="eUsername" value="<?php echo $eCarUser;?>">
                      </div>
                    </div>
                    <div class="col-md-4"> </div>
                    <div class="col-md-5">
                      <div class="form-group editEmail">
                        <label class="form-control-label" for="input-eUseremail">New admin's email</label>
                        <input type="text" id="input-eUseremail" class="form-control editable" placeholder="Email address" name="eUseremail" value="<?php echo $useremail;?>">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                  <div class="col-md-3">
                      <div class="form-group editFirst">
                        <label class="form-control-label" for="input-eUserfirst">New admin's first name</label>
                        <input type="text" id="input-eUserfirst" class="form-control editable" placeholder="First name" name="eUserfirst" value="<?php echo $userfirst;?>">
                      </div>
                    </div>
                    <div class="col-md-4"></div>
                    <div class="col-md-3">
                      <div class="form-group editLast">
                        <label class="form-control-label" for="input-eUserlast">New admin's last name</label>
                        <input type="text" id="input-eUserlast" class="form-control editable" placeholder="Last name" name="eUserlast" value="<?php echo $userlast;?>">
                      </div>
                    </div>
                  </div>
                  
                
                </div>
                
                <hr class="my-4" />
                <h6 class="heading-small text-muted mb-4">Password</h6>
                <div class="pl-lg-4">
                  <div class="row">
                  <div class="col-md-4">
                      <div class="form-group editAddress">
                        <label class="form-control-label" for="input-aPass">Admin password</label>
                        <input type="password" id="input-aPass" class="form-control editable" placeholder="Password" name="adminpwd" value="">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-4">
                      <div class="form-group editPostal">
                        <label class="form-control-label" for="input-newsPwd">New admin password</label>
                        <input type="password" id="input-newsPwd" class="form-control editable" placeholder="New password" name="eUsernew" value="">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-4">
                      <div class="form-group editContact">
                        <label class="form-control-label" for="input-retypesPwd">Re-type new admin password</label>
                        <input type="password" id="input-retypesPwd" class="form-control editable" placeholder="Re-type password" name="eUserrt" value="">
                      </div>
                    </div>
                  </div>
                  </div>
                  
                  <hr class="my-4" />
                <h6 class="heading-small text-muted mb-4">Contact information</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group editAddress">
                        <label class="form-control-label" for="input-address">Address</label>
                        <input type="text" id="input-address" class="form-control editable" placeholder="Home Address" name="eUseraddress" value="<?php echo $useraddress;?>">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-4">
                      <div class="form-group editPostal">
                        <label class="form-control-label" for="input-sPostal">Postal code</label>
                        <input type="text" id="input-sPostal" class="form-control editable" placeholder="Postal code" name="eUserpostal" value="<?php echo $userpostal?>">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-4">
                      <div class="form-group editContact">
                        <label class="form-control-label" for="input-sContact">Contact No.</label>
                        <input type="text" id="input-sContact" class="form-control editable" placeholder="Contact No" name="eUsercontact" value="<?php echo $usercontact;?>">
                      </div>
                    </div>
                  </div>
                  <?php 
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                            $eadminusername=mysqli_real_escape_string($db,$_POST['eUsername']);
                            $eadminemail=mysqli_real_escape_string($db,$_POST['eUseremail']);
                            $eadminfirst=mysqli_real_escape_string($db,$_POST['eUserfirst']);
                            $eadminlast=mysqli_real_escape_string($db,$_POST['eUserlast']);

                            $checkpwd=mysqli_real_escape_string($db,$_POST['adminpwd']);
                            $eadminnewpwd=mysqli_real_escape_string($db,$_POST['eUsernew']);
                            $eadminnewrt=mysqli_real_escape_string($db,$_POST['eUserrt']);

                            $eadminaddress=mysqli_real_escape_string($db,$_POST['eUseraddress']);
                            $eadminpostal=mysqli_real_escape_string($db,$_POST['eUserpostal']);
                            $eadmincontact=mysqli_real_escape_string($db,$_POST['eUsercontact']);
                            $error=false;

                            $unExist=false;
                            $anotherowener=false;
                            $difftype=false;
                            

                            //validation
                            if($eadminusername!=$eCarUser){
                                $sql="SELECT admind FROM Admin";
                                $result = $db->query($sql);
                                if ($result->num_rows > 0) { 
                                    while($row = mysqli_fetch_assoc($result)) { 
                                        if($eadminusername==$row['adminid']){
                                            $unExist=true;
                                        }
                                    }
                                }
                                if($unExist==true){
                                    echo "<p class='text-red'>This username already exist, please key in another username.</p>";
                                    $error=true;
                                }

                            }
                            elseif($eadminusername==""){
                                echo "<p class='text-red'>Admin's username cannot be empty</p>";
                                $error=true;
                            }
                            elseif($eadminemail==""){
                                echo "<p class='text-red'>Admin's email cannot be empty</p>";
                                $error=true;
                            }
                            elseif(!filter_var($eadminemail, FILTER_VALIDATE_EMAIL)){
                                echo "<p class='text-red'>Admin's email is invalid</p>";
                                $error=true;
                            }
                            elseif($eadminfirst==""){
                                echo "<p class='text-red'>Admin's first name cannot be empty</p>";
                                $error=true;
                            }
                            elseif($eadminlast==""){
                                echo "<p class='text-red'>Admin's last name cannot be empty</p>";
                                $error=true;
                            }
                            elseif($eadminaddress==""){
                                echo "<p class='text-red'>Address cannot be empty</p>";
                                $error=true;
                            }
                            elseif($eadminpostal==""){
                                echo "<p class='text-red'>Postal code cannot be empty</p>";
                                $error=true;
                            }
                            elseif($eadmincontact==""){
                                echo "<p class='text-red'>Contact number cannot be empty</p>";
                                $error=true;
                            }
                            elseif(preg_match("/^[0-9]{8}$/",$eadmincontact)==0){
                                echo "<p class='text-red'>Contact number must have 8 digits</p>";
                                $error =true;
                              }
                            elseif($checkpwd!=$adminpwd && $checkpwd != ""){
                                echo "<p class='text-red'>Current password is entered wrong</p>";
                                $error=true;
                              }
                              elseif($eadminnewpwd != $eadminnewrt && $eadminnewpwd){
                                echo "<p class='text-red'>Re-type password and new password does not match</p>";
                                $error=true;
                              }
                              elseif($checkpwd!="" && $eadminnewpwd=="" || $checkpwd!="" && $eadminnewrt==""){
                                echo "<p class='text-red'>There's no new password to be changed</p>";
                                $error=true;
                              }
                              elseif($eadminnewpwd!="" && $eadminnewrt==""){
                                echo "<p class='text-red'>Password was not retyped</p>";
                                $error=true;
                              }
                              elseif($checkpwd=="" && $eadminnewpwd=="" && $eadminnewrt==""){
                                echo "<p class='text-red'>Password is required</p>";
                                $error=true;
                              }
                              else{
                                $error=false;
                              }

                            //passed validation
                        if($error==false){
                            $sql="INSERT INTO Admin 
                            VALUES('$eadminusername','$eadminfirst','$eadminlast','$eadminnewrt','$eadmincontact','$eadminaddress','Ngee Ann Poly','$eadminemail','default.jpg','$eadminpostal','bannerdefault.jpg')";
                            if (mysqli_query($db, $sql)) {
                                    $eCarUser=$eadminusername;
                                            $useremail=$eadminemail;
                                            $userfirst=$eadminfirst;
                                            $userlast=$eadminlast;

                                            $useraddress=$eadminaddress;
                                            $userpostal=$eadminpostal;
                                            $usercontact=$eadmincontact;
                                            echo "<p class='text-success'>Admin added. The changes might take awhile to update on your screen.</p>";
                                
                              } 
                            //echo "false";
                            //code for updating the database
                        }
                    }

                ?>
                </div> 
                <div class="col-12">
                <button type="submit" class="btn btn-success changebtn editedbtn" id="changeCppic" name="cpSavebtn" value="yes" disabled>Add</button>
                </div>
        
                
</div>
</div>
</div>
</form>
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
  <script>
      $(document).ready(function(){
    $(".editable").on('input',function(){
      $(".editedbtn").prop("disabled", false);
    });
})
  </script>
</body>

</html>