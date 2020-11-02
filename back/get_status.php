<?php
include("../conn.php");
header('Content-Type: application/json');
if(empty(strip_tags($_GET["gor"]))) {
} else {
$stmt = $db->prepare('SELECT * FROM public_iptv WHERE public_name = :getir');
$stmt->execute(array(':getir' => strip_tags($_GET["gor"])));
while($row = $stmt->fetch()) {


if($row["video_stream"] == "0") {
$m3u8 = "m3u/".strip_tags($row["public_name"]).".m3u8";
$get = str_replace($row["public_tslink"], $m3u8, $row);
} else {
$ts = "m3u/".strip_tags($row["public_name"]).".m3u8";
$get = str_replace($row["public_tslink"], $ts, $row);
}

$json = json_encode($get, true);
echo $json;
}

}
?>