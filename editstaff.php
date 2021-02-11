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
  <title>Edit staff - Park-a-lot</title>
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
               $carpark=$_SESSION['carpark'];
               $eStaff=$_SESSION['editingStaff'];
               $sqlcp = "SELECT * FROM Carpark WHERE carparkname='$carpark'";
               $cpdata = $db->query($sqlcp);
               $cprow = mysqli_fetch_array($cpdata,MYSQLI_BOTH);
               $cppic = $cprow['carparkpic'];

               $sqles="SELECT * FROM Staff WHERE staffid='$eStaff'";
               $staffdata = $db->query($sqles);
               $staffrow = mysqli_fetch_array($staffdata,MYSQLI_BOTH);
               $staffFirst=$staffrow['stafffirstname'];
               $staffLast=$staffrow['stafflastname'];
               $staffEmail=$staffrow['staffemail'];
               $staffAdd = $staffrow['staffaddress'];
               $staffPostal = $staffrow['staffpostalcode'];
               $staffContact = $staffrow['staffcontactno'];
               $staffCompany=$staffrow['staffoffice'];

               
               if($_SESSION['user']=="Admin"){
                $sql = "SELECT * FROM Admin WHERE adminid = '$username'";
                $result = $db->query($sql);
                $row = mysqli_fetch_array($result,MYSQLI_BOTH);
                $user="Admin";
                $pic = $row['adminpic'];
                $password=$row['adminpassword'];
            }
            elseif($_SESSION['user']=="Staff"){
                $sql = "SELECT * FROM Staff WHERE staffid = '$username'";
                $result = $db->query($sql);
                $row = mysqli_fetch_array($result,MYSQLI_BOTH);
                $user = "Staff";
                $pic = $row['staffpic'];
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
    <!--<div class="header bg-default pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0"></h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="welcome.php"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="carpark.php">Carpark</a></li>
                  <li class="breadcrumb-item active" aria-current="page"></li>
                </ol>
              </nav>
            </div>
          </div>
        </div>
      </div>
    </div>-->
    <!--bg carpark-->
    <div class="header pb-6 d-flex align-items-center" style="min-height: 500px; background-image: url('CarparksPic/<?php echo $cppic;?>'); background-size: cover; background-position: center top;">
      <!-- Mask -->
      <span class="mask bg-gradient-default opacity-8"></span>
      <!-- Header container -->
      <div class="container-fluid">
          

      <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
                
            <h1 class="display-2 text-white"><?php echo $eStaff;?></h1>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="welcome.php"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="carpark.php">Carpark</a></li>
                  <li class="breadcrumb-item"><a href="carlots.php"><?php echo $carpark; ?></a></li>
                  <li class="breadcrumb-item active" aria-current="page"><?php echo $eStaff;?></li>
                </ol>
              </nav>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--below header bg image-->
    <div class="container-fluid mt--6">
          <form action="" method="post">
          <div class="card">
            <div class="card-header">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0">Edit staff </h3>
                </div>
                <div class="col-4 text-right">
                <button type="submit" class="btn btn-success editedbtn" id="editSubmit" disabled>Save</button>
                </div>
              </div>
            </div>
            <div class="card-body">
            <?php 
                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                          $newusername = mysqli_real_escape_string($db,$_POST['esUsername']);
                          $newemail = mysqli_real_escape_string($db,$_POST['esEmail']); 
                          $newfirst = mysqli_real_escape_string($db,$_POST['esFname']); 
                          $newlast = mysqli_real_escape_string($db,$_POST['esLname']); 
                          $newaddress = mysqli_real_escape_string($db,$_POST['esaddress']); 
                          $newpostal = mysqli_real_escape_string($db,$_POST['espostal']); 
                          $newcontact = mysqli_real_escape_string($db,$_POST['escontact']); 
                          $checkpwd = mysqli_real_escape_string($db,$_POST['apwd']); 
                          $newpwd = mysqli_real_escape_string($db,$_POST['ensewpwd']);
                          $rtpwd = mysqli_real_escape_string($db,$_POST['esretypepwd']);  
                          $newoffice=mysqli_real_escape_string($db,$_POST['esCompany']);  
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
                                  elseif($newoffice==""){
                                    echo"<p class='text-red'>Organisation is required</p>";
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
                            $sql = "UPDATE Staff SET staffemail='$newemail',stafffirstname='$newfirst',stafflastname='$newlast',
                            staffaddress='$newaddress',staffpostalcode='$newpostal',staffcontactno='$newcontact',staffid='$newusername',staffoffice='$newoffice'
                             WHERE staffid='$eStaff'";
                                      if (mysqli_query($db, $sql)) {
                                        if($changepwd==true){
                                            $sqlpwd="UPDATE Staff SET staffpassword='$rtpwd' WHERE staffid='$eStaff'";
                                          if(mysqli_query($db, $sqlpwd)){
                                            echo "<p class='text-success'>Password changed</p>";
                                          }
                                        }
                                        $eStaff=$newusername;
                                        $staffFirst=$newfirst;
                                        $staffLast=$newlast;
                                        $staffContact=$newcontact;
                                        $staffEmail = $newemail;
                                        $staffAdd = $newaddress;
                                        $staffPostal = $newpostal;
                                        $staffCompany = $newoffice;
                                        header("Location: editstaff.php");
                                        echo "<p class='text-success'>Updated. The changes might take awhile to update on your screen.</p>";
                          }
                          else{
                            echo "Error updating record: " . mysqli_error($db);
                          }
                        }
                          
                        }
                        
                        ?>
                                      
                <h6 class="heading-small text-muted mb-4">Personal information</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-md-3">
                      <div class="form-group editsUsername">
                        <label class="form-control-label" for="input-sUsername">Staff's username</label>
                        <input type="text" id="input-sUsername" class="form-control editable" placeholder="Username" name="esUsername" value="<?php echo $eStaff;?>">
                      </div>
                    </div>
                    <div class="col-md-4"></div>
                    <div class="col-md-4">
                      <div class="form-group editsEmail">
                        <label class="form-control-label" for="input-sEmail">Staff's email</label>
                        <input type="text" id="input-sEmail" class="form-control editable" placeholder="Email" name="esEmail" value="<?php echo $staffEmail;?>">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                  <div class="col-md-3">
                      <div class="form-group editsUsername">
                        <label class="form-control-label" for="input-sFname">Staff's first name</label>
                        <input type="text" id="input-sFname" class="form-control editable" placeholder="First name" name="esFname" value="<?php echo $staffFirst;?>">
                      </div>
                    </div>
                    <div class="col-md-4"></div>
                    <div class="col-md-3">
                      <div class="form-group editsUsername">
                        <label class="form-control-label" for="input-sLname">Staff's last name</label>
                        <input type="text" id="input-sLname" class="form-control editable" placeholder="Username" name="esLname" value="<?php echo $staffLast;?>">
                      </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group editsCompany">
                        <label class="form-control-label" for="input-sCompany">Staff's Organisation</label>
                        <input type="text" id="input-sCompany" class="form-control editable" placeholder="Organisation name" name="esCompany" value="<?php echo $staffCompany;?>">
                      </div>
                    </div>
                </div>
                </div>
                
                <hr class="my-4" />
                <!-- Password -->
                <h6 class="heading-small text-muted mb-4">Change password</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-md-4">
                      <div class="form-group editAddress">
                        <label class="form-control-label" for="input-aPass">Admin password</label>
                        <input type="password" id="input-aPass" class="form-control editable" placeholder="Password" name="apwd" value="">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-4">
                      <div class="form-group editPostal">
                        <label class="form-control-label" for="input-newsPwd">New staff's password</label>
                        <input type="password" id="input-newsPwd" class="form-control editable" placeholder="New password" name="esnewpwd" value="">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-4">
                      <div class="form-group editContact">
                        <label class="form-control-label" for="input-retypesPwd">Re-type staff's password</label>
                        <input type="password" id="input-retypesPwd" class="form-control editable" placeholder="Re-type password" name="esretypepwd" value="">
                      </div>
                    </div>
                  </div>
                </div>
                <!--contact information-->
                <hr class="my-4" />
                <h6 class="heading-small text-muted mb-4">Contact information</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group editAddress">
                        <label class="form-control-label" for="input-address">Address</label>
                        <input type="text" id="input-address" class="form-control editable" placeholder="Home Address" name="esaddress" value="<?php echo $staffAdd;?>">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-4">
                      <div class="form-group editPostal">
                        <label class="form-control-label" for="input-sPostal">Postal code</label>
                        <input type="text" id="input-sPostal" class="form-control editable" placeholder="Postal code" name="espostal" value="<?php echo $staffPostal;?>">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-4">
                      <div class="form-group editContact">
                        <label class="form-control-label" for="input-sContact">Contact No.</label>
                        <input type="text" id="input-sContact" class="form-control editable" placeholder="Contact No" name="escontact" value="<?php echo $staffContact;?>">
                      </div>
                    </div>
                  </div>
                </div>


        </div>
                
              <!--</form>-->
            </div>
          </div>
          </form>
          
        <!--</div>-->
  

    <!-- Page content -->
    


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

  <script>
    
  $(document).ready(function(){
    $(".editable").on('input',function(){
      $(".editedbtn").prop("disabled", false);
    });
  })
</script>


      
</body>

</html>