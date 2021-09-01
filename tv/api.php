<?php
include("tvcon.php");
$getir = new IPTVClass();
$getir->logincheck();

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header('Content-type: application/json');


$stmt = $db->prepare('SELECT * FROM ip_block WHERE ip_adress = :iddegeri');
$stmt->execute(array(':iddegeri' => $_SERVER['REMOTE_ADDR']));
while($row = $stmt->fetch()) {
if($row["ip_block_active"] == "1") {
die("Banned Your IP Adress (Reason : ".strip_tags($row["ban_reason"]).")");
} else {
}
}

$update = $db->prepare("INSERT INTO ip_logger(ip, browserinf, date) VALUES (:ipz, :browserz, :datez)");
$update->bindValue(':ipz', strip_tags("".$_SERVER['REMOTE_ADDR']."".$_SERVER["REQUEST_URI"].""));
$update->bindValue(':browserz', json_encode(getallheaders()));
$update->bindValue(':datez', date("Y-m-d H:i:s"));
$update->execute();
while($row = $update->fetch()) {
echo "<script LANGUAGE='JavaScript'>console.log('OK');</script>";
}

$update = $db->prepare("INSERT INTO ip_logger(ip, browserinf, date) VALUES (:ipz, :browserz, :datez)");
$update->bindValue(':ipz', strip_tags("".$_SERVER['REMOTE_ADDR']."".$_SERVER["REQUEST_URI"].""));
$update->bindValue(':browserz', json_encode(getallheaders()));
$update->bindValue(':datez', date("Y-m-d H:i:s"));
$update->execute();
while($row = $update->fetch()) {
echo "<script LANGUAGE='JavaScript'>console.log('OK');</script>";
}

if(isset($_POST["get"])) {
$stmt2 = $db->prepare('SELECT * FROM public_iptv WHERE public_name = :pubid');
$stmt2->execute(array(':pubid' => $_POST['get']));
$results = $stmt2->fetchAll(PDO::FETCH_ASSOC);
$json = json_encode($results);
echo $json;
} else {
$stmt2 = $db->prepare('SELECT * FROM public_iptv WHERE public_sahip = :pubid');
$stmt2->execute(array(':pubid' => $_COOKIE['login']));
$results = $stmt2->fetchAll(PDO::FETCH_ASSOC);
$json = json_encode($results);
echo $json;
}

?>