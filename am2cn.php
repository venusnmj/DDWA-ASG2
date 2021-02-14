<?php
header('Access-Control-Allow-Origin: *');
header("Content-Type: application/json; charset=UTF-8");
header('Access-Control-Allow-Methods: POST, GET, PUT');
header('Access-Control-Allow-Headers:
    Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods,
    Authorization, X-Requested-With');

    $conn = new mysqli('localhost', 'amphibis_venus', 'wy4iBowG.^t_', 'amphibis_venus');

if($_SERVER['REQUEST_METHOD'] === 'GET'){
    if (isset($_GET['userid'])){
        $userid = $conn->real_escape_string($_GET['userid']);
        $sql = $conn->query("SELECT * FROM User WHERE userid = '$userid'"); 
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
         $sql = $conn->query("UPDATE User SET usercontactno = '".$data->usercontactno."' WHERE userid = '$userid'");
       if($sql){
       //$data->id = $conn->insert_id;
           exit(json_encode(array('status' => 'success')));
       }else{
           exit(json_encode(array('status' => 'error')));
   }
}
}
?>