<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
include("conn.php");

header("Content-type: application/json; charset=utf-8");

$stmt = $db->prepare('SELECT * FROM ads_list ORDER BY RAND() LIMIT 1');
$stmt->execute();
while($row = $stmt->fetchAll()) {
echo json_encode($row);
}
?>