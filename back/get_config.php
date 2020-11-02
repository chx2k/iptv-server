<?php
include("../conn.php");
header('Content-Type: application/json');
$stmt = $db->prepare('SELECT * FROM iptv_config WHERE config_id = :getir');
$stmt->execute(array(':getir' => strip_tags("1")));
while($row = $stmt->fetch()) {
$json = json_encode($row, true);
echo $json;
}
?>