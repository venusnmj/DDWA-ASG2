<?php
// header('Access-Control-Allow-Origin: *');
// header("Content-Type: application/json; charset=UTF-8");
// header('Access-Control-Allow-Methods: POST, GET, PUT');
// header('Access-Control-Allow-Headers:
//     Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods,
//     Authorization, X-Requested-With');

    $conn = new mysqli('localhost', 'amphibis_venus', 'wy4iBowG.^t_', 'amphibis_venus');

if($_SERVER['REQUEST_METHOD'] === 'GET'){
    $data = array();//"SELECT * FROM Parkinglot LEFT OUTER JOIN Carpark ON Parkinglot.carparkid = Carpark.carparkid");
    $sql = $conn->query("SELECT * FROM User LEFT OUTER JOIN Vehicle ON User.userid = Vehicle.userid"); 
    while ($d = $sql->fetch_assoc()){
        $data[] = $d;
    }
        echo json_encode($data); 
}

// $data = array();//"SELECT * FROM Parkinglot LEFT OUTER JOIN Carpark ON Parkinglot.carparkid = Carpark.carparkid");
// $sql = $conn->query("SELECT * FROM User LEFT OUTER JOIN Vehicle ON User.userid = Vehicle.userid"); 
// while ($d = $sql->fetch_assoc()){
//     $data[] = $d;
// }
//     echo json_encode($data); 

if($_SERVER['REQUEST_METHOD'] === 'POST'){

    $data = json_decode(file_get_contents("php://input")); 
    $sql = $conn->query("INSERT INTO User (userfirstname, userlastname, userid, useremail, userpassword) VALUES  ('".$data->userfirstname."', '".$data->userlastname."', '".$data->userid."', '".$data->useremail."', '".$data->userpassword."')"); 
    //$sql = $conn->query("INSERT INTO Vehicle (vehicleid, userid) VALUES ('0' ,'".$data->userid."')");

     if($sql){
          //$data->id = $conn->insert_id;
          exit(json_encode($data));
     }else{
          exit(json_encode(array('status' => 'error')));
     }
}
?>