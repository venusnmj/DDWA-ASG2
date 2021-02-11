<?php
   define('DB_SERVER', 'localhost');
   define('DB_USERNAME', 'amphibis_venus');
   define('DB_PASSWORD', 'wy4iBowG.^t_');
   define('DB_DATABASE', 'amphibis_venus');
   $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);

   if(mysqli_connect_errno()) {
    die("Database connection failed: " . 
         mysqli_connect_error() . 
         " (" . mysqli_connect_errno() . ")"
    );
  }
?>