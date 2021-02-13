<?php
header("Content-Type: application/json; charset=UTF-8");
;
$conn = new mysqli('localhost', 'amphibis_shiya', 'y]0bj!nN#CK]', 'amphibis_shiya'); //change this part to the db details

          $data = array();
          $sql = $conn->query("SELECT * FROM UV"); //i think can select from the same db as generateUV api that u sent
          while ($d = $sql->fetch_assoc()){
               $data[] = $d;
          }
     exit(json_encode($data));

if($_SERVER['REQUEST_METHOD'] === 'POST'){
     echo 'post';
     $data = json_decode(file_get_contents("php://input")); //change the INSERT INTO 'UV' here too
     $sql = $conn->query("INSERT INTO UV (userfirstname, userlastname, userid, useremail, userpassword) VALUES  
     ('".$data->userfirstname."', '".$data->userlastname."', '".$data->userid."', '".$data->useremail."', '".$data->userpassword."', '".$data->carid."', '".$data->vehicleid."')"); 
     if($sql){
          //$data->id = $conn->insert_id;
          exit(json_encode($data));
     }else{
          exit(json_encode(array('status' => 'error')));
     }
}

//UPDATE not done yet
// if($_SERVER['REQUEST_METHOD'] === 'PUT'){
//      echo 'update';
//      if (isset($_GET['useremail'])){
//           $userIdentity = $conn->real_escape_string($_GET['useremail']);
//           $data = json_decode(file_get_contents("php://input"));
//           $sql = $conn->query("UPDATE UV SET userfirstname = '".$data->userfirstname."', userlastname = '".$data->userlastname."', 
//           userid = '".$data->userid."', useremail = '".$data->useremail."', userpassword = '".$data->userpassword."' WHERE useremail = '$userIdentity'");
//      }
// }
?>