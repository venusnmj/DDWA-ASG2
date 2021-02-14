<?php
header('Access-Control-Allow-Origin: *');
header("Content-Type: application/json; charset=UTF-8");
header('Access-Control-Allow-Methods: POST, GET, PUT');
header('Access-Control-Allow-Headers:
    Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods,
    Authorization, X-Requested-With');

    $conn = new mysqli('localhost', 'amphibis_venus', 'wy4iBowG.^t_', 'amphibis_venus');

    //       $data = array();//"SELECT * FROM Parkinglot LEFT OUTER JOIN Carpark ON Parkinglot.carparkid = Carpark.carparkid");
    //       $sql = $conn->query("SELECT * FROM UV LEFT OUTER JOIN VU ON UV.userid = VU.userid"); 
    //       while ($d = $sql->fetch_assoc()){
    //            $data[] = $d;
    //       }
    //  echo json_encode($data); 


    if($_SERVER['REQUEST_METHOD'] === 'GET'){
     if (isset($_GET['userid'])){
         $userid = $conn->real_escape_string($_GET['userid']);
         $sql = $conn->query("SELECT * FROM User WHERE userid = '$userid'"); 
         $data = $sql->fetch_assoc();
     }else{
         $data = array();
         $sql = $conn->query("SELECT * FROM User");
         while ($d = $sql->fetch_assoc()){
             $data[] = $d;
         }
     }
     exit(json_encode($data));
 }

// if($_SERVER['REQUEST_METHOD'] === 'POST'){
//      //echo 'post';
//     //  $pass = $data->userpassword;
//     //  $hashedpw = password_hash($pass, PASSWORD_DEFAULT);

//      $data = json_decode(file_get_contents("php://input")); 
//      $sql = $conn->query("INSERT INTO User (userfirstname, userlastname, userid, useremail, userpassword) VALUES  
//      ('".$data->userfirstname."', '".$data->userlastname."', '".$data->userid."', '".$data->useremail."', '".$data->userpassword."')"); 
//      $sql2 = $conn->query("INSERT INTO Vehicle (vehicleid, userid) VALUES ('0' ,'".$data->userid."')");

//      if($sql&&$sql2){
//           //$data->id = $conn->insert_id;
//           exit(json_encode($data));
//      }else{
//           exit(json_encode(array('status' => 'error')));
//      }
// }
?>