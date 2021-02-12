<?php
header("Content-Type: application/json; charset=UTF-8");

include('config.php');

$obj = json_decode($_GET["x"], false);
$stmt = $db->prepare("SELECT * FROM ParkingLot LEFT OUTER JOIN Carpark ON ParkingLot.carparkid = Carpark.carparkid");

$stmt->execute();
$result = $stmt->get_result();
$outp = $result->fetch_all(MYSQLI_ASSOC);

echo json_encode($outp);

?>