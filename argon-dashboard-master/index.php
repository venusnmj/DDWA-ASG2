<!DOCTYPE html>
<?php session_start();?>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Login</title>

    <!-- Custom fonts for this template-->
    <link href="startbootstrap-sb-admin-2-gh-pages/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="startbootstrap-sb-admin-2-gh-pages/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Park-a-lot Administrator</h1>
                                    </div>
                                    <form class="user" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user"
                                                id="username" aria-describedby="emailHelp"
                                                placeholder="Enter Username..." name="username">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                                id="password" placeholder="Password" name="password">
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label" for="customCheck">Remember
                                                    Me</label>
                                            </div>
                                        </div>
                                        <button class="btn btn-primary btn-user btn-block" type="submit" value="login">
                                            Login
                                        </button>
                                        <!--
                                        <hr>
                                        <a href="index.html" class="btn btn-google btn-user btn-block">
                                            <i class="fab fa-google fa-fw"></i> Login with Google
                                        </a>
                                        <a href="index.html" class="btn btn-facebook btn-user btn-block">
                                            <i class="fab fa-facebook-f fa-fw"></i> Login with Facebook
                                        </a>-->
                                    </form>

                                    <?php
    // Emulate register_globals off
    function unregister_GLOBALS()
    {
        if (!ini_get('register_globals')) {
            return;
        }
    
        // Might want to change this perhaps to a nicer error
        if (isset($_REQUEST['GLOBALS']) || isset($_FILES['GLOBALS'])) {
            die('GLOBALS overwrite attempt detected');
        }
    
        // Variables that shouldn't be unset
        $noUnset = array('GLOBALS',  '_GET',
                         '_POST',    '_COOKIE',
                         '_REQUEST', '_SERVER',
                         '_ENV',     '_FILES');
    
        $input = array_merge($_GET,    $_POST,
                             $_COOKIE, $_SERVER,
                             $_ENV,    $_FILES,
                             isset($_SESSION) && is_array($_SESSION) ? $_SESSION : array());
        
        foreach ($input as $k => $v) {
            if (!in_array($k, $noUnset) && isset($GLOBALS[$k])) {
                unset($GLOBALS[$k]);
            }
        }
    }
    
    unregister_GLOBALS();


    include("config.php");
    

    //if(isset($_GET['submit'])){
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $myusername = mysqli_real_escape_string($db,$_POST['username']);
        $mypassword = mysqli_real_escape_string($db,$_POST['password']); 

        if($myusername=="" || $mypassword==""){
            ?>
            <h6 class="validAlert">
            <?php //echo "you got missing fields"." user: ".$myusername."pass: ".$mypassword; 
            echo "you got missing fields";?>
        </h6>
            <?php
        }
        else{
        $sql = "SELECT adminid FROM Admin WHERE adminid = '$myusername' and adminpassword = '$mypassword'";

        $user = "Admin";
        $result = $db->query($sql);
        $row = mysqli_fetch_array($result,MYSQLI_BOTH);
        $active = $row['adminid'];
        $count = mysqli_num_rows($result);

        if ($count==1) {
            ?>
            <h6 class="validAlert">
            <?php echo "succeed"; ?>
        </h6>
            <?php
            $_SESSION['user'] = "Admin";
            $_SESSION['id'] = $myusername;
            ?>
            <script language="JavaScript">
            document.location='welcome.php';
        </script>
        <?php
         exit();
        }
        else{
            $sql = "SELECT * FROM staff WHERE staffid = '$myusername' and staffpassword = '$mypassword'";
            $user = "Staff";
            $result = $db->query($sql);
            $row = mysqli_fetch_array($result,MYSQLI_BOTH);
            $active = $row['staffid'];
            $count = mysqli_num_rows($result);
            if ($count==1) {

                $_SESSION['user'] = "Staff";
                $_SESSION['id'] = $myusername;
                ?>
                
                <script language="JavaScript">
                document.location='welcome.php';
            </script>
            <?php
             exit();
            }
            else{
                ?>
                <h6 class="validAlert">
                <?php
               echo "invalid ID or password";
               ?>
               </h6>
               <?php
            }
        }
        

        /*

        else{
            $sql = "SELECT * FROM lecturer WHERE staffid = '$myusername' and staffpassword = '$mypassword'";

        $user = "Staff";
        $result = $db->query($sql);
        $row = mysqli_fetch_array($result,MYSQLI_BOTH);
        $active = $row['staffid'];
        $count = mysqli_num_rows($result);

        if ($count==1 && $row['admin']==0) {

            $_SESSION['user'] = "Staff";
            $_SESSION['id'] = $myusername;
            ?>
            
            <script language="JavaScript">
            document.location='welcome.php';
        </script>
        <?php
         exit();
        }
        elseif($count==1 && $row['admin']==1){
            $_SESSION['user'] = "Admin";
            $_SESSION['id'] = $myusername;
            ?>
            <script language="JavaScript">
            document.location='welcome.php';
        </script>
        <?php
         exit();
        }
        else{
            ?>
            <h6 class="validAlert">
            <?php
           echo "invalid ID or password";
           ?>
           </h6>
           <?php
        }

            
        }*/
        
        
        

    }
    }

    ?>

                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="startbootstrap-sb-admin-2-gh-pages/forgot-password.html">Forgot Password?</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="startbootstrap-sb-admin-2-gh-pages/register.html">Create an Account!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="startbootstrap-sb-admin-2-gh-pages/vendor/jquery/jquery.min.js"></script>
    <script src="startbootstrap-sb-admin-2-gh-pages/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="startbootstrap-sb-admin-2-gh-pages/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="startbootstrap-sb-admin-2-gh-pages/js/sb-admin-2.min.js"></script>

</body>

</html>