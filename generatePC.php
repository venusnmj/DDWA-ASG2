<?php
header("Content-Type: application/json; charset=UTF-8");
include('session.php');

$obj2 = json_decode($_GET["y"], false);
$stmt2 = $db->prepare("SELECT * FROM ParkingLot LEFT OUTER JOIN Carpark ON Parkinglot.carparkid = Carpark.carparkid");
$stmt2->bind_param("s", $obj2->limit2);
$stmt2->execute();
$result2 = $stmt2->get_result();
$outp2 = $result2->fetch_all(MYSQLI_ASSOC);

echo json_encode($outp2);
?>