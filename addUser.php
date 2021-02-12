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
  <title>Add user - Park-a-lot</title>
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
              <a class="nav-link active" href="user.php">
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
              <h6 class="h2 text-white d-inline-block mb-0">Add user</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="welcome.php"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="user.php">User</a></li>
                  <!--
                    <li class="breadcrumb-item"><a href="#">Carpark</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Tables</li>
                -->
                <li class="breadcrumb-item active" aria-current="page">Add user</li>
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
                  <h3 class="mb-0">Add user </h3>
                </div>
        </div>
            </div>
            <div class="card-body">
            <h6 class="heading-small text-muted mb-4">User information</h6>
            <div class="pl-lg-4">
                  <div class="row">
                  <div class="col-md-3">
                      <div class="form-group editUsername">
                        <label class="form-control-label" for="input-eUsername">User's Username</label>
                        <input type="text" id="input-eUsername" class="form-control editable" placeholder="Username" name="eUsername" value="<?php echo $eCarUser;?>">
                      </div>
                    </div>
                    <div class="col-md-4"> </div>
                    <div class="col-md-5">
                      <div class="form-group editEmail">
                        <label class="form-control-label" for="input-eUseremail">User's email</label>
                        <input type="text" id="input-eUseremail" class="form-control editable" placeholder="Email address" name="eUseremail" value="<?php echo $useremail;?>">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                  <div class="col-md-3">
                      <div class="form-group editFirst">
                        <label class="form-control-label" for="input-eUserfirst">User's first name</label>
                        <input type="text" id="input-eUserfirst" class="form-control editable" placeholder="First name" name="eUserfirst" value="<?php echo $userfirst;?>">
                      </div>
                    </div>
                    <div class="col-md-4"></div>
                    <div class="col-md-3">
                      <div class="form-group editLast">
                        <label class="form-control-label" for="input-eUserlast">User's last name</label>
                        <input type="text" id="input-eUserlast" class="form-control editable" placeholder="Last name" name="eUserlast" value="<?php echo $userlast;?>">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                  <div class="col-md-4">
                      <div class="form-group editCarparkName">
                        <label class="form-control-label" for="input-plateno">License plate</label>
                        <input type="text" id="input-plateno" class="form-control editable" placeholder="License plate number" name="plateno" value="<?php echo $usercarplate;?>">
                      </div>
                    </div>
                    <div class="col-md-3"> </div>
                    <div class="col-md-4">
                      <div class="form-group editCarparkContact">
                        <label class="form-control-label" for="input-cartype">Car type</label>
                        <select class="form-control editable" id="input-cartype" name="cartype">
                        <?php
                          $sql = "SELECT DISTINCT vehicletype FROM Vehicle";
                          $result = $db->query($sql);
                          if ($result->num_rows > 0) { 
                              while($row = mysqli_fetch_assoc($result)) { 
                                if($usercartype == $row['vehicletype']){
                                  echo '<option value="'.$row['vehicletype'].'" selected>'.$row['vehicletype'].'</option>';
                                }
                                else{
                                  echo '<option value="'.$row['vehicletype'].'">'.$row['vehicletype'].'</option>';
                                }
                              }
                            }
                          
                          ?>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                <div class="col-md-6">
                      <div class="form-group editCarModel">
                        <label class="form-control-label" for="input-carmodel">Vehicle model</label>
                        <input type="text" id="input-carmodel" class="form-control editable" placeholder="Vehicle's model name" name="carmodel" value="<?php echo $usercarmodel;?>">
                      </div>
                </div>
                <div class="col-md-1"> </div>
                <div class="col-md-4">
                <div class="form-group editCarBrand">
                        <label class="form-control-label" for="input-carbrand">Vehicle Brand</label>
                        <select class="form-control editable" id="input-carbrand" name="carbrand">
                          <?php
                          $sql = "SELECT DISTINCT vehiclebrand FROM Vehicle ORDER BY vehiclebrand";
                          $result = $db->query($sql);
                          if ($result->num_rows > 0) { 
                              while($row = mysqli_fetch_assoc($result)) { 
                                if($usercarbrand == $row['vehiclebrand']){
                                  echo '<option value="'.$row['vehiclebrand'].'" selected>'.$row['vehiclebrand'].'</option>';
                                }
                                else{
                                  echo '<option value="'.$row['vehiclebrand'].'">'.$row['vehiclebrand'].'</option>';
                                }
                              }
                            }
                          
                          ?>
                            <!--<option value="Car">Car</option>
                            <option value="Motorcycle" selected >Motorcycle</option>
                            <option value="Bus">Bus</option>
                            <option value="Truck">Truck</option>-->
                        </select>
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
                        <label class="form-control-label" for="input-newsPwd">User's password</label>
                        <input type="password" id="input-newsPwd" class="form-control editable" placeholder="New password" name="eUsernew" value="">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-4">
                      <div class="form-group editContact">
                        <label class="form-control-label" for="input-retypesPwd">Re-type User's password</label>
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
                      <div class="form-group editContact">
                        <label class="form-control-label" for="input-sContact">Contact No.</label>
                        <input type="text" id="input-sContact" class="form-control editable" placeholder="Contact No" name="eUsercontact" value="<?php echo $usercontact;?>">
                      </div>
                    </div>
                  </div>
                  <?php 
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                            $euserusername=mysqli_real_escape_string($db,$_POST['eUsername']);
                            $euseremail=mysqli_real_escape_string($db,$_POST['eUseremail']);
                            $euserfirst=mysqli_real_escape_string($db,$_POST['eUserfirst']);
                            $euserlast=mysqli_real_escape_string($db,$_POST['eUserlast']);
                            $eusercarplate=mysqli_real_escape_string($db,$_POST['plateno']);
                            $eusercartype=mysqli_real_escape_string($db,$_POST['cartype']);
                            $eusercarmodel=mysqli_real_escape_string($db,$_POST['carmodel']);
                            $eusercarbrand=mysqli_real_escape_string($db,$_POST['carbrand']);

                            $checkpwd=mysqli_real_escape_string($db,$_POST['adminpwd']);
                            $eusernewpwd=mysqli_real_escape_string($db,$_POST['eUsernew']);
                            $eusernewrt=mysqli_real_escape_string($db,$_POST['eUserrt']);

                            $euseraddress=mysqli_real_escape_string($db,$_POST['eUseraddress']);
                            $eusercontact=mysqli_real_escape_string($db,$_POST['eUsercontact']);
                            $error=false;

                            $unExist=false;
                            $anotherowener=false;
                            $difftype=false;
                            

                            //validation
                            if($euserusername!=$eCarUser){
                                $sql="SELECT userid FROM User";
                                $result = $db->query($sql);
                                if ($result->num_rows > 0) { 
                                    while($row = mysqli_fetch_assoc($result)) { 
                                        if($euserusername==$row['userid']){
                                            $unExist=true;
                                        }
                                    }
                                }
                                if($unExist==true){
                                    echo "<p class='text-red'>This username already exist, please key in another username.</p>";
                                    $error=true;
                                }

                            }
                            elseif($euserusername==""){
                                echo "<p class='text-red'>User's username cannot be empty</p>";
                                $error=true;
                            }
                            elseif($euseremail==""){
                                echo "<p class='text-red'>User's email cannot be empty</p>";
                                $error=true;
                            }
                            elseif(!filter_var($euseremail, FILTER_VALIDATE_EMAIL)){
                                echo "<p class='text-red'>User's email is invalid</p>";
                                $error=true;
                            }
                            elseif($euserfirst==""){
                                echo "<p class='text-red'>User's first name cannot be empty</p>";
                                $error=true;
                            }
                            elseif($euserlast==""){
                                echo "<p class='text-red'>User's last name cannot be empty</p>";
                                $error=true;
                            }
                            elseif($eusercarplate!=$usercarplate){
                                $sql="SELECT carid FROM User";
                                $result = $db->query($sql);
                                if ($result->num_rows > 0) { 
                                    while($row = mysqli_fetch_assoc($result)) { 
                                        if($eusercarplate==$row['carid']){
                                            $anotherowener=true;
                                        }
                                    }
                                }
                                if($anotherowener){
                                    echo "<p class='text-red'>This license plate is already registered by another user, please key in another license plate.</p>";
                                    $error=true;
                                }
                            }
                            elseif($eusercarplate==""){
                                echo "<p class='text-red'>License plate cannot be empty</p>";
                                $error=true;
                            }
                            elseif($eusercartype!=$usercartype){
                                $sql="SELECT * FROM ParkingLot";
                                $result = $db->query($sql);
                                if ($result->num_rows > 0) { 
                                    while($row = mysqli_fetch_assoc($result)) { 
                                        if($eusercarplate==$row['vehicleid'] && $row['lottype']!=$eusercartype){
                                            $difftype=true;
                                        }
                                    }
                                }
                                if($difftype){
                                    echo "<p class='text-red'>Vehicle type must match the current parking space type.</p>";
                                    $error=true;
                                }
                            }
                            elseif($eusercarmodel==""){
                                echo "<p class='text-red'>Vehicle model cannot be empty</p>";
                                $error=true;
                            }
                            elseif($eusercarbrand==""){
                                echo "<p class='text-red'>Vehicle brand cannot be empty</p>";
                                $error=true;
                            }
                            elseif($euseraddress==""){
                                echo "<p class='text-red'>Address cannot be empty</p>";
                                $error=true;
                            }
                            elseif($eusercontact==""){
                                echo "<p class='text-red'>Contact number cannot be empty</p>";
                                $error=true;
                            }
                            elseif(preg_match("/^[0-9]{8}$/",$eusercontact)==0){
                                echo "<p class='text-red'>Contact number must have 8 digits</p>";
                                $error =true;
                              }
                            elseif($checkpwd!=$adminpwd && $checkpwd != ""){
                                echo "<p class='text-red'>Current password is entered wrong</p>";
                                $error=true;
                              }
                              elseif($eusernewpwd != $eusernewrt && $eusernewpwd){
                                echo "<p class='text-red'>Re-type password and new password does not match</p>";
                                $error=true;
                              }
                              elseif($checkpwd!="" && $eusernewpwd=="" || $checkpwd!="" && $eusernewrt==""){
                                echo "<p class='text-red'>There's no new password to be changed</p>";
                                $error=true;
                              }
                              elseif($eusernewpwd!="" && $eusernewrt==""){
                                echo "<p class='text-red'>Password was not retyped</p>";
                                $error=true;
                              }
                              elseif($checkpwd=="" && $eusernewpwd=="" && $eusernewrt==""){
                                echo "<p class='text-red'>Password is required</p>";
                                $error=true;
                              }
                              else{
                                $error=false;
                              }

                            //passed validation
                        if($error==false){
                            //var_dump($_POST);
                            $sql="INSERT INTO User 
                            VALUES('$euserusername','$eusercarplate','$euserfirst','$euserlast','$euseraddress','$eusercontact','$eusernewrt','$euseremail','default.jpg','bannerdefault.jpg')";
                            if (mysqli_query($db, $sql)) {
                                $carsql="INSERT INTO Vehicle 
                                VALUES('$eusercarplate','$euserusername','$eusercarbrand','$eusercarmodel','$eusercartype')";
                                if (mysqli_query($db, $carsql)) {
                                    $eCarUser=$euserusername;
                                            $useremail=$euseremail;
                                            $userfirst=$euserfirst;
                                            $userlast=$euserlast;
                                            $usercarplate=$eusercarplate;
                                            $usercartype=$eusercartype;
                                            $usercarmodel=$eusercarmodel;
                                            $usercarbrand=$eusercarbrand;
                                            $useraddress=$euseraddress;
                                            $usercontact=$eusercontact;
                                            echo "<p class='text-success'>User added. The changes might take awhile to update on your screen.</p>";
                                }
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