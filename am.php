<?php
header("Content-Type: application/json; charset=UTF-8");
;
$conn = new mysqli('localhost', 'amphibis_venus', 'wy4iBowG.^t_', 'amphibis_venus');

// if ($_SERVER['REQUEST_METHOD'] === 'GET'){
     // if(isset($_GET['id'])){
     //      $id = $conn->real_escape_string($_GET['id']);
     //      $sql = $conn->query("SELECT * FROM UV");
     //      $data = $sql->fetch_assoc();
     // }else{
          $data = array();
          $sql = $conn->query("SELECT * FROM UV");
          while ($d = $sql->fetch_assoc()){
               $data[] = $d;
          }
     // }
     exit(json_encode($data));
// }

if($_SERVER['REQUEST_METHOD'] === 'POST'){
     echo 'post';
     $data = json_decode(file_get_contents("php://input"));
     $sql = $conn->query("INSERT INTO UV (userfirstname, userlastname, userid, useremail, userpassword) VALUES 
     ('".$data->userfirstname."', '".$data->userlastname."', '".$data->userid."', '".$data->useremail."', '".$data->userpassword."')");
     if($sql){
          //$data->id = $conn->insert_id;
          exit(json_encode($data));
     }else{
          exit(json_encode(array('status' => 'error')));
     }
}

if($_SERVER['REQUEST_METHOD'] === 'POST'){
     echo 'update';
     if (isset($_GET['id'])){
          $id = $conn->real_escape_string($_GET['id']);
          $data = json_decode(file_get_contents("php://input"));
          $sql = $conn->query("UPDATE UV SET userfirstname = '".$data->userfirstname."', userlastname = '".$data->userlastname."', 
          userid = '".$data->userid."', useremail = '".$data->useremail."', userpassword = '".$data->userpassword."' WHERE useremail = '$useremail'");
     }
     // $data = json_decode(file_get_contents("php://input"));
     // $sql = $conn->query("INSERT INTO UV (userfirstname, userlastname, userid, useremail, userpassword) VALUES 
     // ('".$data->userfirstname."', '".$data->userlastname."', '".$data->userid."', '".$data->useremail."', '".$data->userpassword."')");
     // if($sql){
     //      //$data->id = $conn->insert_id;
     //      exit(json_encode($data));
     // }else{
     //      exit(json_encode(array('status' => 'error')));
     // }
}
?>