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
  <title>Edit lot - Park-a-lot</title>
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
            
            $carpark=$_SESSION['carpark'];
            $sqlcp = "SELECT * FROM Carpark WHERE carparkname='$carpark'";
            $cpdata = $db->query($sqlcp);
            $cprow = mysqli_fetch_array($cpdata,MYSQLI_BOTH);
            $cppic = $cprow['carparkpic'];
            $cpid=$cprow['carparkid'];

            $elot=$_SESSION['eLot'];
            $lotsql="SELECT * FROM ParkingLot WHERE parkinglotid='$elot'";
            $data = $db->query($lotsql);
            $lotrow = mysqli_fetch_array($data,MYSQLI_BOTH);
            $lotzone=$lotrow['lotzone'];
            $lottype=$lotrow['lottype'];
            $lotparked=$lotrow['vehicleid'];
            

            
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
                
            <h1 class="display-2 text-white">Edit lot</h1>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="welcome.php"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="carpark.php">Carpark</a></li>
                  <li class="breadcrumb-item"><a href="carlots.php"><?php echo $carpark;?></a></li>
                  <li class="breadcrumb-item active" aria-current="page">Edit lot</li>
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
            <div class="row">
                <div class="col-lg-6">
                  <h3 class="mb-0">Edit lot </h3>
                </div>
                <div class="col-lg-6 text-right">
                <button type="submit" class="btn btn-warning editedbtn" id="deleteCP" name="deleteLot" value="<?php echo $elot;?>">Delete</button>
                 </div>
              </div>
            </div>
            <div class="card-body">
                                      
                <h6 class="heading-small text-muted mb-4">Parking lot information</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-md-4">
                      <div class="form-group editCarparkName">
                        <label class="form-control-label" for="input-lotid">Parking ID</label>
                        <input type="text" id="input-lotid" class="form-control editable" placeholder="Parking Lot ID" name="lotid" value="<?php echo $elot;?>">
                      </div>
                    </div>
                    <div class="col-md-2"> </div>
                    <div class="col-md-4">
                      <div class="form-group editCarparkContact">
                        <label class="form-control-label" for="input-lottype">Lot type</label>
                        <select class="form-control" id="exampleFormControlSelect1" name="lottype">
                        <?php
                          $sql = "SELECT DISTINCT vehicletype FROM Vehicle";
                          $result = $db->query($sql);
                          if ($result->num_rows > 0) { 
                              while($row = mysqli_fetch_assoc($result)) { 
                                if($lottype == $row['vehicletype']){
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
                        <label class="form-control-label" for="input-lotzone">Lot zone</label>
                        <input type="text" id="input-lotzone" class="form-control editable" placeholder="e.g. Zone A" name="lotzone" value="<?php echo $lotzone;?>">
                      </div>
                    </div>
                    <div class="col-md-2"> </div>
                    <div class="col-md-4">
                      <div class="form-group editCarparkid">
                        <label class="form-control-label" for="input-lotparked">Parked vehicle plate</label>
                        <input type="text" id="input-lotparked" class="form-control editable" placeholder="Vehicle's license plate number" name="lotparked" value="<?php echo $lotparked;?>">
                      </div>
                    </div>
                </div>
        </div>
                
                <div class="col-8">
                <?php 
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        if(isset($_POST['cpSavebtn'])){
                        var_dump($_POST);
                            $addlotid=mysqli_real_escape_string($db,$_POST['lotid']);
                            $addlottype=mysqli_real_escape_string($db,$_POST['lottype']);
                            $addlotzone=mysqli_real_escape_string($db,$_POST['lotzone']);
                            $addlotparked=mysqli_real_escape_string($db,$_POST['lotparked']);
                            $error=false;
                            $takenid=false;
                            $alrparked=false;
                            

                        if($addlotid==""){
                            echo "<p class='text-red'>Parking ID is required</p>";
                            $error=true;
                        }
                        elseif($addlotid!=$elot){
                            $checkcpid="SELECT parkinglotid FROM ParkingLot";
                            $result = $db->query($checkcpid);
                            if($result->num_rows>0){
                                while($rowcp = mysqli_fetch_assoc($result)) { 
                                    if($rowcp['parkinglotid']==$addlotid){
                                        $takenid=true;
                                    }
                                }
                            }
                            if($takenid){
                                echo "<p class='text-red'>This lot already exist, please key in another lot id</p>";
                                $error=true;
                            }
                        }
                        elseif($addlottype==""){
                            echo "<p class='text-red'>Lot type is required</p>";
                            $error=true;
                        }
                        elseif($addlotparked!=$lotparked && $addlotparked!=null){
                            $sql ="SELECT vehicleid FROM ParkingLot";
                            $result = $db->query($sql);
                            if($result->num_rows>0){
                                while($rowcp = mysqli_fetch_assoc($result)) { 
                                    if($rowcp['vehicleid']==$addlotparked){
                                        $alrparked=true;
                                    }
                                }
                            }
                            $sql = "SELECT * FROM Vehicle where vehicleid='$addlotparked'";
                            $result = $db->query($sql);
                            $row = mysqli_fetch_array($result,MYSQLI_BOTH);

                            if($alrparked){
                                echo "<p class='text-red'>This vehicle already has a parking lot</p>";
                                $error=true;
                            }
                            if($row['vehicletype']!=$addlottype){
                                echo "<p class='text-red'>This lot type must be the same type as the vehicle currently parked.</p>";
                                $error=true;
                            }
                        }
                        else{
                            $error=false;
                        }

                        if($error==false){
                            if($addlotparked==""){
                                $sql = "UPDATE ParkingLot SET parkinglotid='$addlotid',vehicleid=null, lottype='$addlottype',lotzone='$addlotzone' WHERE parkinglotid='$elot'";
                            }
                            else{
                                $sql = "UPDATE ParkingLot SET parkinglotid='$addlotid',vehicleid='$addlotparked', lottype='$addlottype',lotzone='$addlotzone' WHERE parkinglotid='$elot'";
                            }
                            if (mysqli_query($db, $sql)) {
                              //echo "Record updated successfully";
                              echo "<p class='text-success'>Updated successfully, it might take awhile to be updated.</p>";
                              $elot=$addlotid;
                              $lotzone=$addlotzone;
                              $lotparked=$addlotparked;
                              $lottype=$addlottype;
                              header("Location: editLot.php");
                            } 
                        }
                    }
                        if(isset($_POST['deleteLot'])){
                            //var_dump($_POST);
                            $delLot=$_POST['deleteLot'];
                            //echo $delLot;
                            $sqldl="DELETE FROM ParkingLot WHERE parkinglotid='$delLot'";
                            $db->query($sqldl);
                            echo '<script language="javascript"> location.href="carlots.php"; </script>';
                            
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
    <!--carpark pic upload-->
    <form action="cpinsert.php" method="post" enctype="multipart/form-data" class="uploadpropic" id="cpUpload">
    <div class="alignpop">
      <div class="headerpop">
    <h4>Select image to upload:</h4> <button type="button" class="btncancel" onclick="closeFormCarpark()"><i class="fas fa-window-close text-red"></i></button>
          </div>
  <br>
  <input type="file" name="fileToUpload" id="cppicToUpload" class="fileupload">
  <br>
  <input type="submit" value="Upload Image" name="submit" class="uploadbtn">
          </div>
        </form>

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