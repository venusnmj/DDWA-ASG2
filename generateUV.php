<?php 
header("Content-Type: application/json; charset=UTF-8");
include('session.php');

$obj = json_decode($_GET["x"], false);
$stmt = $db->prepare("SELECT * FROM Vehicle LEFT OUTER JOIN User ON Vehicle.vehicleid = User.carid");
$stmt->bind_param("s", $obj->limit);
$stmt->execute();
$result = $stmt->get_result();
$outp = $result->fetch_all(MYSQLI_ASSOC);

echo json_encode($outp);

?>