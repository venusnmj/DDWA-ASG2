<?php
   include('config.php');
   session_start();
   
   //$user_check = $_SESSION['id'];
   
   //$ses_sql = mysqli_query($db,"select username from admin where username = '$user_check' ");
   
   //$row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   
   //$login_session = $row['studentid'];
   
   if(!isset($_SESSION['id'])){
      header("location:index.php");
      die();
   }
?>