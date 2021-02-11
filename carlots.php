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
            $cpaddress = $cprow['carparkaddress'];
            $cpcontact = $cprow['carparkcontact'];
            $cpid=$cprow['carparkid'];
            //echo $cpcontact;
            
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
                
            <h1 class="display-2 text-white"><?php echo $carpark;?></h1>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="welcome.php"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="carpark.php">Carpark</a></li>
                  <li class="breadcrumb-item active" aria-current="page"><?php echo $carpark;?></li>
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
                  <h3 class="mb-0">Edit carpark </h3>
                </div>
                <div class="col-lg-6 text-right">
                <button type="submit" class="btn btn-warning editedbtn" id="deleteCP" name="deleteCarpark" value="<?php echo $cpid;?>">Delete</button>
                 </div>
              </div>
            </div>
            <div class="card-body">
                                      
                <h6 class="heading-small text-muted mb-4">Carpark information</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group editCarparkName">
                        <label class="form-control-label" for="input-cpname">Carpark name</label>
                        <input type="text" id="input-cpname" class="form-control editable" placeholder="Carpark name" name="ecpname" value="<?php echo $carpark;?>">
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group editCarparkContact">
                        <label class="form-control-label" for="input-cpcontact">Contact info</label>
                        <input type="text" id="input-cpcontact" class="form-control editable" placeholder="Contact information" name="ecpcontact" value="<?php echo $cpcontact;?>">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group editCarparkAddress">
                        <label class="form-control-label" for="input-cpaddress">Address</label>
                        <input type="text" id="input-cpaddress" class="form-control editable" placeholder="Carpark address" name="ecpaddress" value="<?php echo $cpaddress;?>">
                      </div>
                    </div>
                </div>
                <div class="col-4">
                <button type="submit" class="btn btn-success editedbtn" id="editSubmit" value="yes" name="cpSavebtn" disabled="">Save</button>
                </div>
                <div class="col-8">
                <?php 
                    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['cpSavebtn'])) {
                        //var_dump($_POST);
                            $newcpname=mysqli_real_escape_string($db,$_POST['ecpname']);
                            $newcpcontact=mysqli_real_escape_string($db,$_POST['ecpcontact']);
                            $newcpaddress=mysqli_real_escape_string($db,$_POST['ecpaddress']);
                            $error=false;

                        if($newcpname=="" || $newcpcontact=="" || $newcpaddress==""){
                            echo "<p class='text-red'>You got missing fields</p>";
                            $error=true;
                        }
                        else{
                            $error=false;
                        }

                        if($error==false){
                            $sql="UPDATE Carpark SET carparkcontact='$newcpcontact',carparkaddress='$newcpaddress',carparkname='$newcpname'
                            WHERE carparkname='$carpark'";
        
                            if (mysqli_query($db, $sql)) {
                                $carpark=$newcpname;
                                $cpcontact=$newcpcontact;
                                $cpaddress=$newcpaddress;
                                $_SESSION['carpark']=$carpark;
                                header("Location: carlots.php");
                                echo "<p class='text-success'>Updated. The changes might take awhile to update on your screen.</p>";
                                
                            }
                            else{
                                echo "Error updating record: " . mysqli_error($db);
                            }
                        }
                    }
                    elseif ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['deleteCarpark'])) {
                      $cpdelete= $_POST['deleteCarpark'];
                      $sql="DELETE FROM Carpark WHERE carparkid='$cpdelete'";
                      if ($db->query($sql) === TRUE) {
                        $deletestaff="DELETE FROM Staff WHERE carparkid=$cpdelete";
                        $db->query($deletestaff);
                        
                        $deletelots="DELETE FROM ParkingLot WHERE carparkid='$cpdelete'";
                        $db->query($deletelots);
                        
                        header("Location: carpark.php");
                      } 
                      else {
                        echo "Error deleting record: " . $conn->error;
                      }
                    }
                ?>
                </div>
                <hr class="my-4" />
                <h6 class="heading-small text-muted mb-4">Change picture</h6>
                <div class="pl-lg-4">
                <div class="row">
                <div class="col-md-4">
                      <div class="form-group editCarparkImage">
                        <label class="form-control-label" for="input-cpimg">Picture used</label>
                        <img src="CarparksPic/<?php echo $cppic;?>" alt="Image placeholder" class="card-img-top">
                      </div>
                </div>
                </div>
                </div>
                <div class="col-12">
                <button type="button" class="btn btn-success changebtn" id="changeCppic" onclick="openFormCarpark()">Change</button>
                </div>
        </div>
                
              <!--</form>-->
            </div>
          </div>
          </form>
          
        <!--</div>-->
    <!--carpark pic upload-->
    <form action="cpupload.php" method="post" enctype="multipart/form-data" class="uploadpropic" id="cpUpload">
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
    









      <!--startbootstrap's table-->
      <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <div class="row">
                            <h2 class="m-0 font-weight-bold text-primary col-6">Carpark Lots</h2>
                            <div class="text-right col-6">
                <a href="addLots.php" class="btn btn-success editedbtn" id="addLots">Add</a>
                </div>
                </div>
                        </div>
                        
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Slot number</th>
                                            <th>Type</th>
                                            <th>Zone</th>
                                            <th>Driver's contact</th>
                                            <th>Vehicle No.</th>
                                            <th>Status</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Slot number</th>
                                            <th>Type</th>
                                            <th>Zone</th>
                                            <th>Driver's contact</th>
                                            <th>Vehicle No.</th>
                                            <th>Status</th>
                                            <th></th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                         $sqllot = "SELECT * FROM ParkingLot LEFT OUTER JOIN User ON ParkingLot.vehicleid = User.carid WHERE carparkid='$cpid'";
                                         $result = $db->query($sqllot);
                                         if ($result->num_rows > 0) { 
                                             while($row = mysqli_fetch_assoc($result)) { 
                                                 if($row['lottype']=="Car"){
                                                     $typelot="<h4 class='text-primary'><i class='fas fa-car fa-lg'></i> Car</h4>";
                                                 }
                                                 elseif($row['lottype']=="Motorcycle"){
                                                    $typelot="<h4 class='text-primary'><i class='fas fa-motorcycle fa-lg'></i> Motorcycle</h4>";
                                                 }
                                                 elseif($row['lottype']=="Bus"){
                                                    $typelot="<h4 class='text-primary'><i class='fas fa-bus fa-lg'></i> Bus</h4>";
                                                 }
                                                 elseif($row['lottype']=="Truck"){
                                                    $typelot="<h4 class='text-primary'><i class='fas fa-truck fa-lg'></i> Truck</h4>";
                                                 }
                                                 
                                                 if(isset($row['vehicleid'])){
                                                     $status="<h4 class='text-danger'><i class='fas fa-parking fa-lg'></i> Occupied</h4>";
                                                 }
                                                 else{
                                                     $status="
                                                     <h4 class='text-success'><i class='fas fa-parking fa-lg'></i> Vacant</h4>";
                                                 }

                                                 if(isset($row['vehicleid'])){
                                                     $plate = "<form action='' method='post'><button type='submit' name='editVeh' value='".$row['vehicleid']."' class='metal linear'>".$row['vehicleid']."</button></form>";
                                                 }
                                                 else{
                                                     $plate="";
                                                 }

                                                 echo "<tr>
                                                 <td>". $row['parkinglotid'] ."</td>
                                                 <td>" .$typelot."</td>
                                                 <td>". $row['lotzone']. "</td>
                                                 <td>". $row['usercontactno'] ."</td>
                                                 <td>". $plate ."</td>
                                                 <td>". $status ."</td>
                                                 <td><form action='' method='post'>
                                                 <button type='submit' class='btn' name='editLot' value='".$row['parkinglotid']."'>
                                                 <i class='far fa-edit'></i>
                                                 </button>
                                                 </form></td>
                                               </tr>";
                                             }
                                         }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                




















      <!-- Dark table -->
      <div class="row">
        <div class="col">
          <div class="card bg-default shadow">
            <div class="card-header bg-transparent border-0">
                <div class="row">
                <div class="col-lg-6">
              <h3 class="text-white mb-0">Staff</h3>
                                        </div>
                                        <div class="col-lg-6 text-right">
                <a class="btn btn-success editedbtn" id="editSubmit" href="addstaff.php">Add</a>
                                        </div>
                                        </div>
            
            </div>

            <div class="table-responsive">
              <table class="table align-items-center table-dark table-flush">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col" class="sort" data-sort="name">Username</th>
                    <th scope="col" class="sort" data-sort="budget">Name</th>
                    <th scope="col" class="sort" data-sort="status">Contact number</th>
                    <th scope="col">Email</th>
                    <th scope="col" class="sort" data-sort="completion">Organisation</th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                <tbody class="list">
                    <?php
                    $sqllot = "SELECT * FROM Staff WHERE carparkid='$cpid'";
                    $result = $db->query($sqllot);
                    if ($result->num_rows > 0 && $user=="Admin") { 
                        while($row = mysqli_fetch_assoc($result)) { 

                            echo '<tr>
                            <th scope="row">
                              <div class="media align-items-center">
                                <a href="#" class="avatar rounded-circle mr-3">
                                  <img alt="Image placeholder" src="DisplayFolder/'.$row['staffpic'].'">
                                </a>
                                <div class="media-body">
                                  <span class="name mb-0 text-sm">'.$row['staffid'].'</span>
                                </div>
                              </div>
                            </th>
                            <td class="budget">
                            '.$row['stafffirstname']." ".$row['stafflastname'].'
                            </td>
                            <td>
                            '.$row['staffcontactno'].'
                            </td>
                            <td>
                            '.$row['staffemail'].'
                            </td>
                            <td>
                            '.$row['staffoffice'].'
                            </td>
                            <td class="text-right">
                              <div class="dropdown">
                                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  <i class="fas fa-ellipsis-v"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                <form action="" method="post">
                                <button type="submit" class="dropdown-item" href="#" value="'.$row['staffid'].'" name="eEdit">Edit</button>
                                <button type="submit" class="dropdown-item" href="#" value="'.$row['staffid'].'" name="eDelete">Delete</button>
                              </form>
                                </div>
                              </div>
                            </td>
                          </tr>';

                        }
                    }
                    elseif($result->num_rows > 0 && $user=="Staff") { 
                        while($row = mysqli_fetch_assoc($result)) { 

                            echo '<tr>
                            <th scope="row">
                              <div class="media align-items-center">
                                <a href="#" class="avatar rounded-circle mr-3">
                                  <img alt="Image placeholder" src="DisplayFolder/'.$row['staffpic'].'">
                                </a>
                                <div class="media-body">
                                  <span class="name mb-0 text-sm">'.$row['staffid'].'</span>
                                </div>
                              </div>
                            </th>
                            <td class="budget">
                            '.$row['stafffirstname']." ".$row['stafflastname'].'
                            </td>
                            <td>
                            '.$row['staffcontactno'].'
                            </td>
                            <td>
                            '.$row['staffemail'].'
                            </td>
                            <td>
                            '.$row['staffoffice'].'
                            </td>
                            <td class="text-right">
                            </td>
                          </tr>';

                        }
                    }
                    ?>

                  <!--<tr>
                    <th scope="row">
                      <div class="media align-items-center">
                        <a href="#" class="avatar rounded-circle mr-3">
                          <img alt="Image placeholder" src="argon-dashboard-master/assets/img/theme/bootstrap.jpg">
                        </a>
                        <div class="media-body">
                          <span class="name mb-0 text-sm">Argon Design System</span>
                        </div>
                      </div>
                    </th>
                    <td class="budget">
                      $2500 USD
                    </td>
                    <td>
                      <span class="badge badge-dot mr-4">
                        <i class="bg-warning"></i>
                        <span class="status">pending</span>
                      </span>
                    </td>
                    <td>
                      <div class="avatar-group">
                        <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Ryan Tompson">
                          <img alt="Image placeholder" src="argon-dashboard-master/assets/img/theme/team-1.jpg">
                        </a>
                        <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Romina Hadid">
                          <img alt="Image placeholder" src="argon-dashboard-master/assets/img/theme/team-2.jpg">
                        </a>
                        <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Alexander Smith">
                          <img alt="Image placeholder" src="argon-dashboard-master/assets/img/theme/team-3.jpg">
                        </a>
                        <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Jessica Doe">
                          <img alt="Image placeholder" src="argon-dashboard-master/assets/img/theme/team-4.jpg">
                        </a>
                      </div>
                    </td>
                    <td>
                      <div class="d-flex align-items-center">
                        <span class="completion mr-2">60%</span>
                        <div>
                          <div class="progress">
                            <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;"></div>
                          </div>
                        </div>
                      </div>
                    </td>
                    <td class="text-right">
                      <div class="dropdown">
                        <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <i class="fas fa-ellipsis-v"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                        <form action="" method="post">
                          <button type="button" class="dropdown-item" href="#" name="toEditStaff">Edit</button>
                          <button type="button" class="dropdown-item" href="#" name="toDeleteStaff">Delete</button>
                        </form>
                        </div>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <th scope="row">
                      <div class="media align-items-center">
                        <a href="#" class="avatar rounded-circle mr-3">
                          <img alt="Image placeholder" src="argon-dashboard-master/assets/img/theme/angular.jpg">
                        </a>
                        <div class="media-body">
                          <span class="name mb-0 text-sm">Angular Now UI Kit PRO</span>
                        </div>
                      </div>
                    </th>
                    <td class="budget">
                      $1800 USD
                    </td>
                    <td>
                      <span class="badge badge-dot mr-4">
                        <i class="bg-success"></i>
                        <span class="status">completed</span>
                      </span>
                    </td>
                    <td>
                      <div class="avatar-group">
                        <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Ryan Tompson">
                          <img alt="Image placeholder" src="argon-dashboard-master/assets/img/theme/team-1.jpg">
                        </a>
                        <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Romina Hadid">
                          <img alt="Image placeholder" src="argon-dashboard-master/assets/img/theme/team-2.jpg">
                        </a>
                        <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Alexander Smith">
                          <img alt="Image placeholder" src="argon-dashboard-master/assets/img/theme/team-3.jpg">
                        </a>
                        <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Jessica Doe">
                          <img alt="Image placeholder" src="argon-dashboard-master/assets/img/theme/team-4.jpg">
                        </a>
                      </div>
                    </td>
                    <td>
                      <div class="d-flex align-items-center">
                        <span class="completion mr-2">100%</span>
                        <div>
                          <div class="progress">
                            <div class="progress-bar bg-success" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>
                          </div>
                        </div>
                      </div>
                    </td>
                    <td class="text-right">
                      <div class="dropdown">
                        <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <i class="fas fa-ellipsis-v"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                          <a class="dropdown-item" href="#">Action</a>
                          <a class="dropdown-item" href="#">Another action</a>
                          <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <th scope="row">
                      <div class="media align-items-center">
                        <a href="#" class="avatar rounded-circle mr-3">
                          <img alt="Image placeholder" src="argon-dashboard-master/assets/img/theme/sketch.jpg">
                        </a>
                        <div class="media-body">
                          <span class="name mb-0 text-sm">Black Dashboard</span>
                        </div>
                      </div>
                    </th>
                    <td class="budget">
                      $3150 USD
                    </td>
                    <td>
                      <span class="badge badge-dot mr-4">
                        <i class="bg-danger"></i>
                        <span class="status">delayed</span>
                      </span>
                    </td>
                    <td>
                      <div class="avatar-group">
                        <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Ryan Tompson">
                          <img alt="Image placeholder" src="argon-dashboard-master/assets/img/theme/team-1.jpg">
                        </a>
                        <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Romina Hadid">
                          <img alt="Image placeholder" src="argon-dashboard-master/assets/img/theme/team-2.jpg">
                        </a>
                        <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Alexander Smith">
                          <img alt="Image placeholder" src="argon-dashboard-master/assets/img/theme/team-3.jpg">
                        </a>
                        <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Jessica Doe">
                          <img alt="Image placeholder" src="argon-dashboard-master/assets/img/theme/team-4.jpg">
                        </a>
                      </div>
                    </td>
                    <td>
                      <div class="d-flex align-items-center">
                        <span class="completion mr-2">72%</span>
                        <div>
                          <div class="progress">
                            <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="72" aria-valuemin="0" aria-valuemax="100" style="width: 72%;"></div>
                          </div>
                        </div>
                      </div>
                    </td>
                    <td class="text-right">
                      <div class="dropdown">
                        <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <i class="fas fa-ellipsis-v"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                          <a class="dropdown-item" href="#">Action</a>
                          <a class="dropdown-item" href="#">Another action</a>
                          <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <th scope="row">
                      <div class="media align-items-center">
                        <a href="#" class="avatar rounded-circle mr-3">
                          <img alt="Image placeholder" src="argon-dashboard-master/assets/img/theme/react.jpg">
                        </a>
                        <div class="media-body">
                          <span class="name mb-0 text-sm">React Material Dashboard</span>
                        </div>
                      </div>
                    </th>
                    <td class="budget">
                      $4400 USD
                    </td>
                    <td>
                      <span class="badge badge-dot mr-4">
                        <i class="bg-info"></i>
                        <span class="status">on schedule</span>
                      </span>
                    </td>
                    <td>
                      <div class="avatar-group">
                        <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Ryan Tompson">
                          <img alt="Image placeholder" src="argon-dashboard-master/assets/img/theme/team-1.jpg">
                        </a>
                        <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Romina Hadid">
                          <img alt="Image placeholder" src="argon-dashboard-master/assets/img/theme/team-2.jpg">
                        </a>
                        <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Alexander Smith">
                          <img alt="Image placeholder" src="argon-dashboard-master/assets/img/theme/team-3.jpg">
                        </a>
                        <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Jessica Doe">
                          <img alt="Image placeholder" src="argon-dashboard-master/assets/img/theme/team-4.jpg">
                        </a>
                      </div>
                    </td>
                    <td>
                      <div class="d-flex align-items-center">
                        <span class="completion mr-2">90%</span>
                        <div>
                          <div class="progress">
                            <div class="progress-bar bg-info" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width: 90%;"></div>
                          </div>
                        </div>
                      </div>
                    </td>
                    <td class="text-right">
                      <div class="dropdown">
                        <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <i class="fas fa-ellipsis-v"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                          <a class="dropdown-item" href="#">Action</a>
                          <a class="dropdown-item" href="#">Another action</a>
                          <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <th scope="row">
                      <div class="media align-items-center">
                        <a href="#" class="avatar rounded-circle mr-3">
                          <img alt="Image placeholder" src="argon-dashboard-master/assets/img/theme/vue.jpg">
                        </a>
                        <div class="media-body">
                          <span class="name mb-0 text-sm">Vue Paper UI Kit PRO</span>
                        </div>
                      </div>
                    </th>
                    <td class="budget">
                      $2200 USD
                    </td>
                    <td>
                      <span class="badge badge-dot mr-4">
                        <i class="bg-success"></i>
                        <span class="status">completed</span>
                      </span>
                    </td>
                    <td>
                      <div class="avatar-group">
                        <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Ryan Tompson">
                          <img alt="Image placeholder" src="argon-dashboard-master/assets/img/theme/team-1.jpg">
                        </a>
                        <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Romina Hadid">
                          <img alt="Image placeholder" src="argon-dashboard-master/assets/img/theme/team-2.jpg">
                        </a>
                        <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Alexander Smith">
                          <img alt="Image placeholder" src="argon-dashboard-master/assets/img/theme/team-3.jpg">
                        </a>
                        <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Jessica Doe">
                          <img alt="Image placeholder" src="argon-dashboard-master/assets/img/theme/team-4.jpg">
                        </a>
                      </div>
                    </td>
                    <td>
                      <div class="d-flex align-items-center">
                        <span class="completion mr-2">100%</span>
                        <div>
                          <div class="progress">
                            <div class="progress-bar bg-success" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>
                          </div>
                        </div>
                      </div>
                    </td>
                    <td class="text-right">
                      <div class="dropdown">
                        <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <i class="fas fa-ellipsis-v"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                          <a class="dropdown-item" href="#">Action</a>
                          <a class="dropdown-item" href="#">Another action</a>
                          <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                      </div>
                    </td>
                  </tr>
                                        -->

                <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    if(isset($_POST['eEdit']) || isset($_POST['eDelete'])){
                            $eStaff=mysqli_real_escape_string($db,$_POST['eEdit']);
                            $_SESSION['editingStaff']=$_POST['eEdit'];
                        if(isset($_POST['eDelete'])){
                            $eStaff=mysqli_real_escape_string($db,$_POST['eDelete']);
                            $sqldelete="DELETE FROM Staff WHERE staffid='$eStaff'";
                            if ($db->query($sqldelete) === TRUE) {
                                echo "<div class='col-12'><p class='text-success'> Deleted successfully. Might take awhile to be updated.</p></div>";
                                header("Location: carlots.php");
                              } 
                              else {
                                echo "Error deleting record: " . $conn->error;
                              }
                        }
                        elseif(isset($_POST['eEdit'])){
                            echo '<script language="javascript"> location.href="editstaff.php"; </script>';
                        }
                    }
                    if(isset($_POST['editVeh'])){
                        $_SESSION['eVehicle']=$_POST['editVeh'];
                        echo '<script language="JavaScript">document.location="editVehicle.php";</script>';

                    }
                    if(isset($_POST['editLot'])){
                      $_SESSION['eLot']=$_POST['editLot'];
                      echo '<script language="JavaScript">document.location="editLot.php";</script>';
                    }
                }
                ?>
                </tbody>
              </table>
            </div>

<!-- Card footer -->
<div class="card-footer py-4 bg-default">
              <nav aria-label="...">
              </nav>
            </div>
          </div>
        </div>
      </div>
      <!--card footer end-->

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