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
  <title>Add carpark - Park-a-lot</title>
  <!-- Favicon -->
  <link rel="icon" href="argon-dashboard-master/assets/img/brand/park-a-lot-logo.png" type="image/png">
  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <!-- Icons -->
  <link rel="stylesheet" href="argon-dashboard-master/assets/vendor/nucleo/css/nucleo.css" type="text/css">
  <link rel="stylesheet" href="argon-dashboard-master/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">



    <!-- Custom styles for this template -->
    <!--<link href="startbootstrap-sb-admin-2-gh-pages/css/sb-admin-2.min.css" rel="stylesheet">-->

    <!-- Custom styles for this page -->
    <link href="startbootstrap-sb-admin-2-gh-pages/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

<!-- Argon CSS -->
    <link href="stylesheet.css" rel="stylesheet">
  <link rel="stylesheet" href="argon-dashboard-master/assets/css/argon.css" type="text/css">
  <link href="stylesheet.css" rel="stylesheet">


</head>

<body>
<?php

            $username=$_SESSION['id'];
            $eVeh= $_SESSION['eVehicle'];
            //echo $eVeh;

            $sql = "SELECT * FROM Vehicle LEFT OUTER JOIN ParkingLot ON ParkingLot.vehicleid = Vehicle.vehicleid WHERE Vehicle.vehicleid='$eVeh'";
            $result = $db->query($sql);
            $row = mysqli_fetch_array($result,MYSQLI_BOTH);
            $carowner= $row['userid'];
            $carbrand=$row['vehiclebrand'];
            $carmodel=$row['vehiclemodel'];
            $cartype=$row['vehicletype'];
            $carlotparked=$row['parkinglotid'];
            
            $carpark=$_SESSION['carpark'];
            $sqlcp = "SELECT * FROM Carpark WHERE carparkname='$carpark'";
            $cpdata = $db->query($sqlcp);
            $cprow = mysqli_fetch_array($cpdata,MYSQLI_BOTH);
            $cppic = $cprow['carparkpic'];
            $cpid=$cprow['carparkid'];
            
            if($_SESSION['user']=="Admin"){
                $sql = "SELECT * FROM Admin WHERE adminid = '$username'";
                $result = $db->query($sql);
                $row = mysqli_fetch_array($result,MYSQLI_BOTH);
                $user="Admin";
                $pic = $row['adminpic'];
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
                
            <h1 class="display-2 text-white">Edit vehicle</h1>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="welcome.php"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="carpark.php">Carpark</a></li>
                  <li class="breadcrumb-item"><a href="carlots.php"><?php echo $carpark;?></a></li>
                  <li class="breadcrumb-item active" aria-current="page">Edit vehicle</li>
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
                  <h3 class="mb-0">Edit vehicle</h3>
                </div>
              </div>
            </div>
            <div class="card-body">
                                      
                <h6 class="heading-small text-muted mb-4">Vehicle information</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-md-4">
                      <div class="form-group editCarparkName">
                        <label class="form-control-label" for="input-plateno">License plate</label>
                        <input type="text" id="input-plateno" class="form-control editable" placeholder="License plate number" name="plateno" value="<?php echo $eVeh;?>">
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
                                if($cartype == $row['vehicletype']){
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
                    <div class="col-md-4">
                      <div class="form-group editCarparkAddress">
                        <label class="form-control-label" for="input-caruser">Owner's username</label>
                        <input type="text" id="input-caruser" class="form-control editable" placeholder="Username of car owner" name="caruser" value="<?php echo $carowner;?>">
                      </div>
                    </div>
                </div>
                <div class="row">
                <div class="col-md-6">
                      <div class="form-group editCarModel">
                        <label class="form-control-label" for="input-carmodel">Vehicle model</label>
                        <input type="text" id="input-carmodel" class="form-control editable" placeholder="Vehicle's model name" name="carmodel" value="<?php echo $carmodel;?>">
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
                                if($carbrand == $row['vehiclebrand']){
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
                <h6 class="heading-small text-muted mb-4">Lot information (if parked)</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-md-4">
                    <div class="form-group editCarparkName">
                        <label class="form-control-label" for="input-carlotid">Lot ID</label>
                        <input type="text" id="input-carlotid" class="form-control editable" placeholder="Parking lot number" name="carlotid" value="<?php echo $carlotparked;?>">
                      </div>
                    </div>
                  </div>
                
                          

                    
                <?php 
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                            $ecarid=mysqli_real_escape_string($db,$_POST['plateno']);
                            $ecartype=mysqli_real_escape_string($db,$_POST['cartype']);
                            $ecarowner=mysqli_real_escape_string($db,$_POST['caruser']);
                            $ecarmodel=mysqli_real_escape_string($db,$_POST['carmodel']);
                            $ecarbrand=mysqli_real_escape_string($db,$_POST['carbrand']);
                            $ecarlotparked=mysqli_real_escape_string($db,$_POST['carlotid']);
                            $error=false;
                            $notregisted=false;
                            $takenuser=false;
                            $invalidlot=false;
                            $occupiedlot=false;
                            $notmatchtype=false;


                            //echo $ecarlotparked!="" && $ecarlotparked!=$carlotparked;

                            if($ecarlotparked!="" && $ecarlotparked!=$carlotparked){
                              //echo "accessed";
                            $checkid="SELECT * FROM ParkingLot WHERE carparkid='$cpid'";
                            $result = $db->query($checkid);
                            if($result->num_rows>0){
                                while($rowcp = mysqli_fetch_assoc($result)) { 
                                  if($rowcp['parkinglotid']==$ecarlotparked && $rowcp['vehicleid']!=null && $rowcp['vehicleid']!=$eVeh){
                                    $occupiedlot=true;
                                }
                                    elseif($rowcp['parkinglotid']!=$ecarlotparked){
                                        $invalidlot=true;
                                    }
                        
                                }
                            }
                            if($occupiedlot){
                              echo "<p class='text-red'>This lot is already occupied, please key in another lot id.</p>";
                            }
                            elseif($invalidlot){
                              echo "<p class='text-red'>This lot does not exist in this carpark, please key in another lot id.</p>";
                            }
                            $error=true;
                          }
                          
                          elseif($ecarowner!=$carowner){
                              $checkid="SELECT * FROM User";
                              $result = $db->query($checkid);
                              if($result->num_rows>0){
                                  while($rowcp = mysqli_fetch_assoc($result)) { 
                                      if($rowcp['userid']==$ecarowner){
                                        $notregisted=true;
                                      }
                                      else{
                                        $takenuser=true;
                                      }
                                  }
                              }
                              if($notregisted==true){
                                echo "<p class='text-red'>This username is taken, please key in another user.</p>";
                              }
                              elseif($takenuser==true){
                                echo "<p class='text-red'>This username is not registed, please key in another user.</p>";
                              }
                              $error=true;
                            }

                            elseif($ecarlotparked!=""){
                              $sql="SELECT * FROM ParkingLot WHERE parkinglotid='$ecarlotparked'";
                              $result = $db->query($sql);
                              $row = mysqli_fetch_array($result,MYSQLI_BOTH);
                              if($row['lottype']!=$ecartype){
                                echo "<p class='text-red'>This vehicle type cannot be parked in another type of lot</p>";
                                $error=true;
                              }
                            }
                        elseif($ecarid==""){
                            echo "<p class='text-red'>License plate is required</p>";
                            $error=true;
                        }
                        elseif($ecartype==""){
                            echo "<p class='text-red'>Car type is required</p>";
                            $error=true;
                        }
                        elseif($ecarowner==""){
                            echo "<p class='text-red'>Owner's username is required</p>";
                            $error=true;
                        }
                        elseif($ecarmodel==""){
                          echo "<p class='text-red'>Vehicle model is required</p>";
                          $error=true;
                      }
                      elseif($ecarbrand==""){
                        echo "<p class='text-red'>Vehicle brand is required</p>";
                        $error=true;
                    }
                        else{
                            $error=false;
                            $notregisted=false;
                            $takenuser=false;
                            $invalidlot=false;
                            $occupiedlot=false;
                            $notmatchtype=false;
                        }

                        if($error==false){
                                $sql = "UPDATE Vehicle SET vehicleid='$ecarid',userid='$ecarowner',vehiclebrand='$ecarbrand',vehiclemodel='$ecarmodel',vehicletype='$ecartype' WHERE vehicleid='$eVeh' ";
                                if (mysqli_query($db, $sql)) {
                                  //echo "Record updated successfully";
                                  //echo "<p class='text-success'>Vehicle edited successfully. It might take a while to update.</p>";
                        
                                } 
                                if($ecarlotparked!=""){
                                  $sql="UPDATE ParkingLot SET vehicleid='$ecarid' WHERE parkinglotid='$ecarlotparked'";
                                  if (mysqli_query($db, $sql)) {
                                    $carlotparked=$ecarlotparked;
                                    $carowner=$ecarowner;
                                  $carbrand=$ecarbrand;
                                  $carmodel=$ecarmodel;
                                  $cartype=$ecartype;
                                  $eVeh=$ecarid;
                                    header("Location: editVehicle.php");
                                    echo "<p class='text-success'>Vehicle edited successfully. It might take a while to update.</p>";
                                  }
                                }
                                elseif($ecarlotparked=="" && $carlotparked!=$ecarlotparked){
                                  $sql="UPDATE ParkingLot SET vehicleid=null WHERE vehicleid='$ecarid'";
                                  if (mysqli_query($db, $sql)) {
                                    $carlotparked=$ecarlotparked;
                                    $carowner=$ecarowner;
                                  $carbrand=$ecarbrand;
                                  $carmodel=$ecarmodel;
                                  $cartype=$ecartype;
                                  $eVeh=$ecarid;
                                    header("Location: editVehicle.php");
                                    echo "<p class='text-success'>Vehicle edited successfully. It might take a while to update.</p>";
                                  }
                                }
                            
      
                        }
                    }

                ?>
                </div>
                <div class="col-12">
                <button type="submit" class="btn btn-success changebtn editedbtn" id="changeCppic" name="cpSavebtn" value="yes" disabled>Add</button>
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