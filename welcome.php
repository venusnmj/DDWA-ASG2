
<!DOCTYPE html>
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


 
<?php
include('session.php');
@ob_start();
/*
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);*/
?>
<html>

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title>Profile - Park-a-lot</title>  
  <!-- Favicon -->
  
  <link rel="icon" href="argon-dashboard-master/assets/img/brand/park-a-lot-logo.png" type="image/png">
  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <!-- Icons -->
  
  <link rel="stylesheet" href="argon-dashboard-master/assets/vendor/nucleo/css/nucleo.css" type="text/css">
  <link rel="stylesheet" href="argon-dashboard-master/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
  <!-- Argon CSS -->
  <!--<link rel="stylesheet" href="argon-dashboard-master/assets/css/argon.css?v=1.2.0" type="text/css">-->
  
  <link rel="stylesheet" href="argon-dashboard-master/assets/css/argon.css" type="text/css">
  <link href="stylesheet.css" rel="stylesheet">
</head>

<body>
<?php
/*
var_dump($E);
@ob_start();*/
$_SESSION['dino']="trex";
echo $_SESSION['dino'];
  
echo $_SESSION['id'].$_SESSION['user'];
print_r($_SESSION);


$username=$_SESSION['id'];
if($_SESSION['user']=="Admin"){
    $sql = "SELECT * FROM Admin WHERE adminid = '$username'";
    $result = $db->query($sql);
    $row = mysqli_fetch_array($result,MYSQLI_BOTH);
        
        $givenname= $row['adminfirstname'];
        $familyname=$row['adminlastname'];
        $user="Admin";
        $contact=$row['admincontactno'];
        $identification= $username;
        $company=$row['adminoffice'];
        $email = $row['adminemail'];
        $address = $row['adminaddress'];
        $postal = $row['adminpostalcode'];
        $pic = $row['adminpic'];
        $password = $row['adminpassword'];
        $bannerpic=$row['adminbanner'];
        //echo var_dump($row);
}
elseif($_SESSION['user']=="Staff"){
    $sql = "SELECT * FROM staff WHERE staffid = '$username'";
    $result = $db->query($sql);
    $row = mysqli_fetch_array($result,MYSQLI_BOTH);
        
        $givenname= $row['stafffirstname'];
        $familyname=$row['stafflastname'];
        $user = "Staff";
        $contact=$row['staffcontactno'];
        $identification= $username;
        $company=$row['staffoffice'];
        $email = $row['staffemail']; 
        $address = $row['staffaddress'];
        $postal = $row['staffpostalcode'];
        $password = $row['staffpassword'];
        $pic = $row['staffpic'];
        $bannerpic=$row['staffbanner'];
}
?>

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
        <ul class="navbar-nav">
        
          <?php if ($_SESSION['user']=="Admin"){?>
          
            <li class="nav-item">
              <a class="nav-link active" href="welcome.php">
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
          
          <?php    }
          elseif($_SESSION['user']=="Staff"){      ?>
          
            <li class="nav-item">
              <a class="nav-link active" href="welcome.php">
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
                    <img alt="Image placeholder" src="DisplayFolder/<?php //echo $pic;?>">
                  </span>
                  <div class="media-body  ml-2  d-none d-lg-block">
                    <span class="mb-0 text-sm  font-weight-bold"><?php //echo $username;?></span>
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
    <!-- Header -->
    
    <div class="header pb-6 d-flex align-items-center" style="min-height: 500px; background-image: url(argon-dashboard-master/assets/img/theme/profilecoverbg.jpg); background-size: cover; background-position: center top;">
      
      <!-- Mask -->
      
      <span class="mask bg-gradient-default opacity-8"></span>  
      <!-- Header container -->
      
      <div class="container-fluid d-flex align-items-center">
        <div class="row">
          <div class="col-lg-7 col-md-10">
            <h1 class="display-2 text-white">Hello <?php //echo $givenname; //echo var_dump($_GET); echo $_GET['editedUsername'];?></h1>
            <p class="text-white mt-0 mb-5">This is your profile page. You can see the progress you've made with your work and manage your projects or assigned tasks</p>
          </div>
        </div>
      </div>
    </div>

    <!--profilepic upload-->
    
    <form action="upload.php" method="post" enctype="multipart/form-data" class="uploadpropic" id="circleUpload">
    <div class="alignpop">
      <div class="headerpop">
    <h4>Select image to upload:</h4> <button type="button" class="btncancel" onclick="closeFormCircle()"><i class="fas fa-window-close text-red"></i></button>
          </div>
  <br>
  <input type="file" name="fileToUpload" id="propicToUpload" class="fileupload">
  <br>
  <input type="submit" value="Upload Image" name="submit" class="uploadbtn">
          </div>
        </form>  
<!--profile banner upload-->

<form action="banner.php" method="post" enctype="multipart/form-data" class="uploadpropic" id="bannerUpload">
    <div class="alignpop">
      <div class="headerpop">
    <h4>Select image to upload:</h4> <button type="button" class="btncancel" onclick="closeFormBanner()"><i class="fas fa-window-close text-red"></i></button>
          </div>
  <br>
  <input type="file" name="fileToUpload" id="bannerToUpload" class="fileupload">
  <br>
  <input type="submit" value="Upload Image" name="submit" class="uploadbtn">
          </div>
        </form>

    <!-- Page content -->
    
    <div class="container-fluid mt--6">
      <div class="row">
        <div class="col-xl-4 order-xl-2">
          <div class="card card-profile">
          <button class="open-button card-banner" onclick="openFormBanner()">
            <img src="BannerImg/<?php //echo $bannerpic;?>" alt="Image placeholder" class="card-img-top">
            <i class="far fa-edit text-primary editbanner"></i>
          </button>
            <div class="row justify-content-center">
              <div class="col-lg-3 order-lg-2">
                <div class="card-profile-image">
                
                  <!--<a href="#">-->
                  
                  <button class="open-button" onclick="openFormCircle()">
                    <img src="DisplayFolder/<?php //echo $pic;?>" class="rounded-circle">
                    <i class="fas fa-user-edit editpic text-primary"></i>
                  </button>  
                  <!--</a>-->
                  
                </div>
              </div>
            </div>
            <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
            </div>
            <div class="card-body pt-0">
              <div class="row">
                <div class="col">
                  <div class="card-profile-stats d-flex justify-content-center">
                    <div>
                      <span class="heading">200</span>
                      <span class="description">Partners</span>
                    </div>
                    <div>
                      <span class="heading">5</span>
                      <span class="description">Developers</span>
                    </div>
                    <div>
                      <span class="heading">2k</span>
                      <span class="description">Users</span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="text-center">
                <h5 class="h3">
                  <?php //echo $givenname ." ". $familyname; ?>
                </h5>
                <div class="h5 font-weight-300">
                  <i class="ni location_pin mr-2"></i><?php //echo $username; ?>
                </div>
                <div class="h5 mt-4">
                </div>
                <div>
                  <i class="ni education_hat mr-2"></i><?php //echo $company; ?>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-8 order-xl-1">
          <form action="" method="post">
          <div class="card">
            <div class="card-header">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0">Edit profile </h3>
                </div>
                <div class="col-4 text-right">
                <button type="submit" class="btn btn-success editedbtn" id="editSubmit" disabled>Save</button>
                </div>
              </div>
            </div>
            <div class="card-body">
            
              <!--<form>-->
              <?php 
                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                          $newusername = mysqli_real_escape_string($db,$_POST['eusername']);
                          $newemail = mysqli_real_escape_string($db,$_POST['eemail']); 
                          $newfirst = mysqli_real_escape_string($db,$_POST['efirst']); 
                          $newlast = mysqli_real_escape_string($db,$_POST['elast']); 
                          $newaddress = mysqli_real_escape_string($db,$_POST['eaddress']); 
                          $newpostal = mysqli_real_escape_string($db,$_POST['epostal']); 
                          $newcontact = mysqli_real_escape_string($db,$_POST['econtact']); 
                          $checkpwd = mysqli_real_escape_string($db,$_POST['eoldpwd']); 
                          $newpwd = mysqli_real_escape_string($db,$_POST['enewpwd']);
                          $rtpwd = mysqli_real_escape_string($db,$_POST['eretypepwd']);  
                          $error =false;
                          $changepwd = false;

                          if($newemail==""){
                            echo "<p class='text-red'>Email is required</p>";
                            $error =true;
                             
                          }
                          elseif(!filter_var($newemail, FILTER_VALIDATE_EMAIL)){
                            echo "<p class='text-red'>Email is invalid</p>";
                            $error =true;
                             
                          }
                          elseif($newfirst==""){
                            echo "<p class='text-red'>First name is required</p>";
                            $error =true;
                             
                          }
                            elseif($newlast==""){
                              echo "<p class='text-red'>Last name is required</p>";
                              $error =true;
                               
                            }
                              elseif($newaddress==""){
                                echo "<p class='text-red'>Address is required</p>";
                                $error =true;
                                 
                              }
                                elseif($newpostal==""){
                                  echo "<p class='text-red'>Postal code is required</p>";
                                  $error =true;
                                   
                                }
                                elseif(preg_match("/^[0-9]{6}$/",$newpostal)==0){
                                  echo "<p class='text-red'>Postal code must have 6 digits</p>";
                                  $error =true;
                                   
                                }
                                elseif($newcontact==""){
                                  echo "<p class='text-red'>Contact number is required</p>";
                                  $error =true;
                                   
                                }
                                elseif(preg_match("/^[0-9]{8}$/",$newcontact)==0){
                                  echo "<p class='text-red'>Phone numbers must have 8 digits</p>";
                                  $error =true;
                                   
                                }
                                  elseif($newusername==""){
                                    echo"<p class='text-red'>Username is required</p>";
                                    $error=true;
                                     
                                  }
                                  elseif(preg_match("/^[A-Za-z0-9'.,-]+(?:[ _-][A-Za-z0-9]+)*$/",$newusername)==0){
                                    echo "<p class='text-red'>Username cannot have spaces</p>";
                                    $error=true;
                                  }
                                  elseif($checkpwd!=$password && $checkpwd != ""){
                                    echo "<p class='text-red'>Current password is entered wrong</p>";
                                    $error=true;
                                    $changepwd = false;
                                  }
                                  elseif($newpwd != $rtpwd && $newpwd){
                                    echo "<p class='text-red'>Re-type password and new password does not match</p>";
                                    $error=true;
                                    $changepwd = false;
                                  }
                                  elseif($checkpwd!="" && $newpwd=="" || $checkpwd!="" && $rtpwd==""){
                                    echo "<p class='text-red'>There's no new password to be changed</p>";
                                    $error=true;
                                    $changepwd = false;
                                  }
                                  elseif($newpwd!="" && $rtpwd==""){
                                    echo "<p class='text-red'>Password was not retyped</p>";
                                    $error=true;
                                    $changepwd = false;
                                  }
                                  elseif($checkpwd!="" && $newpwd!="" && $rtpwd!=""){
                                    $changepwd = true;
                                  }
                                  else{
                                    $error=false;
                                  }

                          if ($error==false){
                            
                            $allsender="SELECT * FROM Message WHERE receiver='$username' OR sender='$username'";
                            $result = $db->query($allsender);
                            if ($result->num_rows > 0) { 
                              while($row = mysqli_fetch_assoc($result)) { 
                                if($row['sender']==$username){
                                  $updatesender="UPDATE Message SET sender='$newusername' WHERE sender='$username'";
                                  $done = $db->query($updatesender);
                                }
                                elseif($row['receiver']==$username){
                                  $updatereceiver="UPDATE Message SET receiver='$newusername' WHERE receiver='$username'";
                                  $donere = $db->query($updatereceiver);
                                }
                              }
                            }


                            if($user=="Admin"){
                            $sql = "UPDATE Admin SET adminemail='$newemail',adminfirstname='$newfirst',adminlastname='$newlast',
                             adminaddress='$newaddress',adminpostalcode='$newpostal',admincontactno='$newcontact',adminid='$newusername'
                              WHERE adminid='$username'";
                                      if (mysqli_query($db, $sql)) {
                                        if($changepwd==true){
                                          $sqlpwd="UPDATE Admin SET adminpassword='$rtpwd' WHERE adminid='$username'";
                                          if(mysqli_query($db, $sqlpwd)){
                                            echo "<p class='text-success'>Password changed</p>";
                                          }
                                        }
                                        
                                        $username=$newusername;
                                        $givenname=$newfirst;
                                        $familyname=$newlast;
                                        $contact=$newcontact;
                                        $email = $newemail;
                                        $address = $newaddress;
                                        $postal = $newpostal;
                                        $pic = $pic;
                                        $bannerpic = $bannerpic;
                                        $_SESSION['id']=$username;
                
                                        header("Location: welcome.php");
                                        echo "<p class='text-success'>Updated. The changes might take awhile to update on your screen.</p>";
                          }
                          else{
                            echo "Error updating record: " . mysqli_error($db);
                          }
                        }
                        elseif($user=="Staff"){
                          $sql = "UPDATE Staff SET staffemail='$newemail',stafffirstname='$newfirst',stafflastname='$newlast',
                             staffaddress='$newaddress',staffpostalcode='$newpostal',staffcontactno='$newcontact',staffid='$newusername'
                              WHERE staffid='$username'";
                                      if (mysqli_query($db, $sql)) {
                                        if($changepwd==true){
                                          $sqlpwd="UPDATE Staff SET staffpassword='$rtpwd' WHERE staffid='$username'";
                                          if(mysqli_query($db, $sqlpwd)){
                                            echo "<p class='text-success'>Password changed</p>";
                                          }
                                        }

                                        $username=$newusername;
                                        $givenname=$newfirst;
                                        $familyname=$newlast;
                                        $contact=$newcontact;
                                        $email = $newemail;
                                        $address = $newaddress;
                                        $postal = $newpostal;
                                        $pic = $pic;
                                        $bannerpic = $bannerpic;
                                        $_SESSION['id']=$username;
                
                                        header("Location: welcome.php");
                                        echo "<p class='text-success'>Updated. The changes might take awhile to update on your screen.</p>";
                          }
                          else{
                            echo "Error updating record: " . mysqli_error($db);
                          }
                        }
                        }
                  
                        }
                        
                         ?>
                        
                <h6 class="heading-small text-muted mb-4">User information</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group editUsername">
                        <label class="form-control-label" for="input-username">Username</label>
                        <input type="text" id="input-username" class="form-control editable" placeholder="Username" name="eusername" value="<?php //echo $username;?>">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group editEmail">
                        <label class="form-control-label" for="input-email">Email address</label>
                        <input type="email" id="input-email" class="form-control editable" placeholder="Email" name="eemail" value="<?php //echo $email;?>">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group editFirst">
                        <label class="form-control-label" for="input-first-name">First name</label>
                        <input type="text" id="input-first-name" class="form-control editable" placeholder="First name" name="efirst" value="<?php //echo $givenname;?>">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group editLast">
                        <label class="form-control-label" for="input-last-name">Last name</label>
                        <input type="text" id="input-last-name" class="form-control editable" placeholder="Last name" name="elast" value="<?php //echo $familyname;?>">
                      </div>
                    </div>
                  </div>
                </div>
                <hr class="my-4" />  
                <!-- Address -->
                
                <h6 class="heading-small text-muted mb-4">Change password</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-md-4">
                      <div class="form-group editAddress">
                        <label class="form-control-label" for="input-address">Current password</label>
                        <input type="password" id="input-old-password" class="form-control editable" placeholder="Password" name="eoldpwd" value="">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-4">
                      <div class="form-group editPostal">
                        <label class="form-control-label" for="input-country">New password</label>
                        <input type="password" id="input-new-password" class="form-control editable" placeholder="New password" name="enewpwd" value="">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-4">
                      <div class="form-group editContact">
                        <label class="form-control-label" for="input-country">Re-type password</label>
                        <input type="password" id="input-retype-password" class="form-control editable" placeholder="Re-type" name="eretypepwd" value="">
                      </div>
                    </div>
                  </div>
                </div>

                <hr class="my-4" />  
                <!-- Address -->

                
                <h6 class="heading-small text-muted mb-4">Contact information</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group editAddress">
                        <label class="form-control-label" for="input-address">Address</label>
                        <input type="text" id="input-address" class="form-control editable" placeholder="Home Address" name="eaddress" value="<?php //echo $address;?>">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-4">
                      <div class="form-group editPostal">
                        <label class="form-control-label" for="input-country">Postal code</label>
                        <input type="text" id="input-postal-code" class="form-control editable" placeholder="Postal code" name="epostal" value="<?php //echo $postal;?>">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-4">
                      <div class="form-group editContact">
                        <label class="form-control-label" for="input-country">Contact No.</label>
                        <input type="text" id="input-contact" class="form-control editable" placeholder="Contact No" name="econtact" value="<?php //echo $contact;?>">
                      </div>
                    </div>
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
