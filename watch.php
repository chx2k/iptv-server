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
while($row = $update->fetch()) {
echo "<script LANGUAGE='JavaScript'>console.log('OK');</script>";
}

$stmt = $db->prepare('SELECT * FROM ip_block WHERE ip_adress = :iddegeri');
$stmt->execute(array(':iddegeri' => $_SERVER['REMOTE_ADDR']));
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
$stmt = $db->prepare('SELECT * FROM public_iptv WHERE public_name = :iddegeri');
$stmt->execute(array(':iddegeri' => $streamlink));
while($row = $stmt->fetch()) {
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
while($row2 = $stmt->fetch()) {
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
while($row2 = $stmt->fetch()) {
$getir->M3U8DebugStreamWin(strip_tags($row["public_name"]), strip_tags($row["public_tslink"]), strip_tags($row2["ffmpeg_m3u8cfg"]));
}
//Windows M3U8 Debug End
} else {
//Linux M3U8 Debug
$stmt = $db->prepare('SELECT * FROM iptv_config WHERE config_id = :getir');
$stmt->execute(array(':getir' => strip_tags("1")));
while($row2 = $stmt->fetch()) {
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
//WatchPlayer Started
if($row["public_active"] == 0) {
die("<center><b>Channel Deactivated</b></center>");
} else {
}
if($row["video_stream"] == 1) {
echo '<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://unpkg.com/video.js/dist/video-js.css" rel="stylesheet">
<link href="https://unpkg.com/@videojs/themes@1/dist/city/index.css" rel="stylesheet"/>
<link rel="stylesheet" href="https://cdn.metroui.org.ua/v4/css/metro.min.css">
<link rel="stylesheet" href="https://cdn.metroui.org.ua/v4/css/metro-colors.min.css">
<link rel="stylesheet" href="https://cdn.metroui.org.ua/v4/css/metro-rtl.min.css">
<link rel="stylesheet" href="https://cdn.metroui.org.ua/v4/css/metro-icons.min.css">
<script charset="UTF-8" src="./selcuk_files/jquery.min.js"></script>
<script src="https://cdn.metroui.org.ua/v4/js/metro.min.js"></script>';
echo '<script charset="UTF-8">
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
</script>';
echo '<body class="container">
<center><video style="width:100%;height:100%;" id="video" class="video-js vjs-default-skin" data-logo="'.$logo.'" data-aspect-ratio="hd" controls autoplay></video>
</div></center></body>';	  
$getir->M3UVideo("m3u/".strip_tags($_GET["pubid"]).".ts");
echo '<center>Yayını paylaşmak için http://'.$_SERVER['HTTP_HOST'].'/m3u/'.strip_tags($_GET["pubid"]).'.m3u8</center>';

} else {
//M3U8 Player Started
if($row["public_active"] == 0) {
die("<center><b>Channel Deactivated</b></center>");
} else {
}
echo '<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://unpkg.com/video.js/dist/video-js.css" rel="stylesheet">
<link href="https://unpkg.com/@videojs/themes@1/dist/city/index.css" rel="stylesheet"/>
<link rel="stylesheet" href="https://cdn.metroui.org.ua/v4/css/metro.min.css">
<link rel="stylesheet" href="https://cdn.metroui.org.ua/v4/css/metro-colors.min.css">
<link rel="stylesheet" href="https://cdn.metroui.org.ua/v4/css/metro-rtl.min.css">
<link rel="stylesheet" href="https://cdn.metroui.org.ua/v4/css/metro-icons.min.css">
<script charset="UTF-8" src="./selcuk_files/jquery.min.js"></script>
<script src="https://cdn.metroui.org.ua/v4/js/metro.min.js"></script>';
echo '<script charset="UTF-8">
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
</script>';
echo '<body class="container">
<center><video style="width:100%;height:100%;" id="video" data-role="video-player" data-logo="'.$logo.'"  data-aspect-ratio="hd" controls autoplay></video>
</div></center></body>';
$getir->M3UVideo("m3u/".strip_tags($_GET["pubid"]).".m3u8");
echo '<center>Yayını paylaşmak için http://'.$_SERVER['HTTP_HOST'].'/m3u/'.strip_tags($_GET["pubid"]).'.m3u8</center>';

}
} else {
if($row["public_active"] == 0) {
die("<center><b>Channel Deactivated</b></center>");
} else {
}
if($row["video_stream"] == 1) {
$getir->TSStream(strip_tags($row["public_name"]));
} else {
$getir->M3U8Stream(strip_tags($row["public_name"]));
}
}

}
} else {
die("PUBID NOT FOUND");
}
?>