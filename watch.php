<?php
include("conn.php");
error_reporting(0);
$getir = new IPTVClass();
$getir->funcControl('shell_exec');
$getir->funcControl('exec');
$getir->funcControl('system');

$update = $db->prepare("INSERT INTO ip_logger(ip, browserinf, date) VALUES (:ipz, :browserz, :datez)");
$update->bindValue(':ipz', strip_tags($_SERVER['REMOTE_ADDR']));
$update->bindValue(':browserz', json_encode(getallheaders()));
$update->bindValue(':datez', date("Y-m-d H:i:s"));
$update->execute();
if($row = $update->fetch()) {
echo "<script LANGUAGE='JavaScript'>console.log('OK');</script>";
}

if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
    $ip = $_SERVER['HTTP_CLIENT_IP'];
} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
} else {
    $ip = $_SERVER['REMOTE_ADDR'];
}
$stmt = $db->prepare('SELECT * FROM ip_block WHERE ip_adress = :iddegeri');
$stmt->execute(array(':iddegeri' => $ip));
while($row = $stmt->fetch()) {
if($row["ip_block_active"] == "1") {
die("Banned Your IP Adress (Reason : ".strip_tags($row["ban_reason"]).")");
} else {
}
}

$stmt = $db->prepare('SELECT * FROM iptv_config WHERE config_id = :iddegeri');
$stmt->execute(array(':iddegeri' => strip_tags("1")));
if($stmt->rowCount()) {
if($row = $stmt->fetch()) {
$logo = $row["logo"];
}
} else {
die("Config Not Found | Please reload database");
}

$streamlink = strip_tags($_GET["pubid"]);
if(isset($streamlink)) {

$stmt = $db->prepare('SELECT * FROM public_iptv WHERE public_id = :iddegeri');
$stmt->execute(array(':iddegeri' => $streamlink));
if($row = $stmt->fetch()) {
//Control Permission
if($row["public_active"] == 0) {
die("<center><b>Channel Deactivated</b></center>");
} else {
}
if(isset($_GET["debug"])) {
//Video Debug Started
if($row["public_active"] == 0) {
die("<center><b>Channel Deactivated</b></center>");
} else {
}
if($row["video_stream"] == 1) {
if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
//Windows TS Debug
$stmt = $db->prepare('SELECT * FROM iptv_config WHERE config_id = :getir');
$stmt->execute(array(':getir' => strip_tags("1")));
if($row2 = $stmt->fetch()) {
$getir->TSDebugStreamWin(strip_tags($row["public_name"]), strip_tags($row["public_tslink"]), strip_tags($row2["ffmpeg_ts"]));
}
} else {
$stmt = $db->prepare('SELECT * FROM iptv_config WHERE config_id = :getir');
$stmt->execute(array(':getir' => strip_tags("1")));
if($row2 = $stmt->fetch()) {
$getir->TSDebugStream(strip_tags($row["public_name"]), strip_tags($row["public_tslink"]), strip_tags($row2["ffmpeg_ts"]));
}
}
//Video Debug End
} else {
//M3U8 Debug Started
if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
//Windows M3U8 Debug
$stmt = $db->prepare('SELECT * FROM iptv_config WHERE config_id = :getir');
$stmt->execute(array(':getir' => strip_tags("1")));
if($row2 = $stmt->fetch()) {
$getir->M3U8DebugStreamWin(strip_tags($row["public_name"]), strip_tags($row["public_tslink"]), strip_tags($row2["ffmpeg_m3u8cfg"]));
}
//Windows M3U8 Debug End
} else {
//Linux M3U8 Debug
$stmt = $db->prepare('SELECT * FROM iptv_config WHERE config_id = :getir');
$stmt->execute(array(':getir' => strip_tags("1")));
if($row2 = $stmt->fetch()) {
$getir->M3U8DebugStream(strip_tags($row["public_name"]), strip_tags($row["public_tslink"]), strip_tags($row2["ffmpeg_m3u8cfg"]));
}
//Linux M3U8 Debug End
}
//M3U8 Debug End
}
//Debug End
} else {

}

if(intval($_GET["selcuk"]) == "1") {
if($row["public_active"] == 0) {
die("<center><b>Channel Deactivated</b></center>");
} else {
}
$getir->SelcukTheme(strip_tags($row["public_tslink"]), strip_tags($_GET["pubid"]));
die();
} else {
}

if(isset($_GET["watchplayer"])) {
if(isset($_COOKIE['login'])) {
} else {
if(session_status() == "2") {
die('<center><b>ERROR : Cannot login<br>Session Status : WORKING</b></center>');
} else {
die('<center><b>ERROR : Cannot login<br>Session Status : NOT WORKING</b></center>');
}
}
echo '<meta name="viewport" content="width=device-width, initial-scale=1">
<script charset="UTF-8" src="./selcuk_files/jquery.min.js"></script>
<link href="https://unpkg.com/video.js/dist/video-js.css" rel="stylesheet">
<script src="https://unpkg.com/video.js/dist/video.js"></script>
<script src="https://unpkg.com/videojs-flash/dist/videojs-flash.js"></script>
<script src="https://unpkg.com/videojs-contrib-hls/dist/videojs-contrib-hls.js"></script>';

echo '<br>'.strlen(decbin(~0)).'<br><br>';
//WatchPlayer Started
if($row["public_active"] == 0) {
die("<center><b>Channel Deactivated</b></center>");
} else {
}

if($row["video_stream"] == 1) {

echo '<title>'.strip_tags($row["video_stream"]).'</title>
<script charset="UTF-8">
var player = videojs("example-video");
player.play();
jQuery(document).ready(function($){
function kontrol(data){
$.post( "denetle.php", {cont: data}, function(result) {
var obj = JSON.parse(JSON.stringify(result));
if(obj.status == true) {
} else {
document.body.innerHTML = "<center><h1>Lütfen 2-3 Saniye Bekleyin Sayfayı Yenileyin</h1><img src=selcuk_files/necef.jpg width=100% height=90%></center>";
}
});
}
setInterval(function(){kontrol("'.strip_tags($_GET["pubid"]).'");}, 3000);
});
</script>
<body class="container">
<br><br>
<center>
<video id="example-video" width="%100" height="800" class="video-js vjs-default-skin" controls>
<source src="./m3u/'.strip_tags($_GET["pubid"]).'.m3u8" type="application/x-mpegURL">
</video>
</div></center></body>';	
  
} elseif($row["video_stream"] == 0) {

echo '<script charset="UTF-8">
var player = videojs("example-video");
player.play();

jQuery(document).ready(function($){
function kontrol(data){
$.post( "denetle.php", {cont: data}, function(result) {
var obj = JSON.parse(JSON.stringify(result));
if(obj.status == true) {
} else {
document.body.innerHTML = "<center><h1>Lütfen 2-3 Saniye Bekleyin Sayfayı Yenileyin</h1><img src=selcuk_files/necef.jpg width=100% height=90%></center>";
}
});
}
setInterval(function(){kontrol("'.strip_tags($_GET["pubid"]).'");}, 3000);
});
</script>
<body class="container">
<br><br>
<center>
<video id="example-video" width="%100" height="800" class="video-js vjs-default-skin" controls>
<source src="./m3u/'.strip_tags($_GET["pubid"]).'.m3u8" type="application/x-mpegURL">
</video>
</div></center></body>';
} else {
$getir->ScreenShow(strip_tags($_GET["pubid"]), strip_tags($row["public_name"]));
//ScreenShare Soon...
}

} else {

if($row["public_active"] == 0) {
die("<center><b>Channel Deactivated</b></center>");
} else {
}

$stmt = $db->prepare('SELECT * FROM admin_list WHERE admin_usrname = :iddegeri');
$stmt->execute(array(':iddegeri' => strip_tags($_SESSION["login"])));
if($stmt->rowCount()) {
if($rowg = $stmt->fetch()) {
if($rowg["admin_yetki"] == "admin") {

} elseif($rowg["admin_yetki"] == "uye") {

} else {
    die("You have been banned or not login");
}
}
} else {
    die("You have been banned or not login");
}

if($row["video_stream"] == 1) {
$getir->TSStream(strip_tags($row["public_name"]));
} elseif($row["video_stream"] == 0) {
$getir->M3U8Stream(strip_tags($row["public_name"]));
} else {
die("ScreenShare has not this choose");
}

}


}
} else {
die("PUBID NOT FOUND");
}
?>