<?php
header('Access-Control-Allow-Origin: *');
header("Content-Type: application/json; charset=UTF-8");
header('Access-Control-Allow-Methods: POST, GET, PUT');
header('Access-Control-Allow-Headers:
    Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods,
    Authorization, X-Requested-With');

$conn = new mysqli('localhost', 'amphibis_shiya', 'y]0bj!nN#CK]', 'amphibis_shiya'); 

if($_SERVER['REQUEST_METHOD'] === 'GET'){
    if (isset($_GET['userid'])){
        $userid = $conn->real_escape_string($_GET['userid']);
        $sql = $conn->query("SELECT * FROM User WHERE userid = '$userid'"); //i think can select from the same db as generateUV api that u sent : Users and VehicleIDs included
        $data = $sql->fetch_assoc();
    }else{
        $data = array();
        $sql = $conn->query("SELECT * FROM User LEFT OUTER JOIN Vehicle ON User.userid = Vehicle.userid");
        while ($d = $sql->fetch_assoc()){
            $data[] = $d;
        }
    }
    exit(json_encode($data));
}

if($_SERVER['REQUEST_METHOD'] === 'PUT'){
    //echo 'update';
    if (isset($_GET['userid'])){
         $userid = $conn->real_escape_string($_GET['userid']);
         $data = json_decode(file_get_contents("php://input"));
         $sql = $conn->query("UPDATE UV SET userlastname = '".$data->userlastname."' WHERE userid = '$userid'");
       if($sql){
       //$data->id = $conn->insert_id;
           exit(json_encode(array('status' => 'success')));
       }else{
           exit(json_encode(array('status' => 'error')));
   }
}
}
?>