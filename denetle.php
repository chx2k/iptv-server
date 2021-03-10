<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Expires: Mon, 26 Jul 2003 05:00:00 GMT");
header("Last-Modified:".gmdate("D, d M Y H:İ:s")."GMT");
header("Cache-Control: no-store , no-cahce, must-revalidate");
header("Cache-Control: post-check=0 , pre-check=0", false);
header("Pragma: no-cache");

include("conn.php");
$getir = new IPTVClass();
$streamlink = strip_tags($_POST["cont"]);
header("Content-type: application/json; charset=utf-8");

$stmt = $db->prepare('SELECT * FROM public_iptv WHERE public_name = :iddegeri');
$stmt->execute(array(':iddegeri' => $streamlink));
if($row = $stmt->fetch()) {
  
if($row["public_active"] == 1) {
$age = array("status"=> true);
echo json_encode($age);
} else {
$age = array("status"=> false);
echo json_encode($age);
}

}
?>