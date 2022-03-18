<?php
include("conn.php");
$getir = new IPTVClass();
session_start();

if(!isset($_GET['git'])) {
$sayfa = 'lgn';
} elseif(empty($_GET['git'])) {

if(substr($_SERVER['HTTP_ACCEPT_LANGUAGE'],0,2) == "tr") {
$getir->Error("Sayfa Bulunamadı");
} else {
$getir->Error("Page Not Found");
}

} else {
$sayfa = strip_tags($_GET['git']);
}

switch ($sayfa) {

case 'lgn':
$name = strip_tags($_GET["usr"]);
$pass = sha1(md5($_GET['pwd']));

$query  = $db->query("SELECT * FROM admin_list WHERE admin_usrname =" . $db->quote($name) . " AND admin_passwd = " . $db->quote($pass). "",PDO::FETCH_ASSOC);
if ( $say = $query -> rowCount() ){
if( $say > 0 ){
$_SESSION["login"] = $name;
echo('<script>location.replace("m3u.php?git=select")</script>');
}

} else {
die('<center>
<b>For login m3u.php?git=lgn&usr=user_name&pwd=password</b><br>
</center>');
}
break;

case 'select':
if(isset($_SESSION["login"])) {
echo '<center>
<a href="m3u.php?git=m3u">Private M3U</a><br>
<a href="m3u.php?git=m3upub">Public M3U</a><br>';
if($_SESSION["yetki"] == md5("admin")) {
echo '<a href="m3u.php?git=m3ustream">M3U Streams</a>';
}
echo '</center>';
} else {
die('<center>
<b>For login m3u.php?git=lgn&usr=user_name&pwd=password</b><br>
</center>');
}
break;

case 'm3u':
if(isset($_SESSION["login"])) {
header("Content-Type: video/vnd.mpegurl");
header("Pragma: no-cache");
header("Expires: 0");

$stmt2 = $db->prepare('SELECT private_name FROM private_iptv WHERE private_sahip = :perm');
$stmt2->bindValue(':perm', strip_tags($_SESSION["login"]));
$stmt2->execute();
if($row2 = $stmt2->fetch()) {
header ("Content-Disposition: attachment;filename=".strip_tags($row2["private_name"]).".m3u");
}

} else {
die('<center>
<b>For login m3u.php?git=lgn&usr=user_name&pwd=password</b><br>
</center>');
}
echo '#EXTM3U';
$stmt2 = $db->prepare('SELECT * FROM private_iptv WHERE private_sahip = :perm');
$stmt2->bindValue(':perm', strip_tags($_SESSION["login"]));
$stmt2->execute();
while($row2 = $stmt2->fetch()) {
if(empty($row2["private_resim"])) {
echo '
#EXTINF:'.intval($row2["private_id"]).' tvg-logo="'.strip_tags($row2["private_resim"]).'", '.strip_tags($row2["private_name"]).'
'.strip_tags($row2["private_iptv"]).'';

} else {
echo '
#EXTINF:'.intval($row2["private_id"]).' tvg-logo="https://i.upimg.com/BJfzNUht7"  group-title="'.strip_tags($row2["private_name"]).'"
'.strip_tags($row2["private_iptv"]).'';
}
}
break;

case 'm3upub':
if(isset($_SESSION["login"])) {
header ("Content-Type: video/vnd.mpegurl");

$stmt2 = $db->prepare('SELECT stream_othname FROM public_iptv WHERE public_sahip = :perm');
$stmt2->bindValue(':perm', strip_tags($_SESSION["login"]));
$stmt2->execute();
if($row2 = $stmt2->fetch()) {
header ("Content-Disposition: attachment;filename=".strip_tags($row2["stream_othname"]).".m3u");
}

header ("Pragma: no-cache");
header ("Expires: 0");
} else {
die('<center>
<b>For login m3u.php?git=lgn&usr=user_name&pwd=password</b><br>
</center>');
}
echo '#EXTM3U';
$stmt2 = $db->prepare('SELECT * FROM public_iptv WHERE public_sahip = :perm');
$stmt2->bindValue(':perm', strip_tags($_SESSION["login"]));
$stmt2->execute();
while($row2 = $stmt2->fetch()) {
echo '
#EXTINF:'.intval($row2["public_id"]).', '.strip_tags($row2["stream_othname"]).'
'.strip_tags($row2["public_tslink"]).'';
}
break;


case 'm3ustream':
    if($_SESSION["yetki"] == md5("admin")) {
    } else {
        die("<center>You dont have a permission!</center>");
    }
    if(isset($_SESSION["login"])) {
    header ("Content-Type: video/vnd.mpegurl");
    
    $stmt2 = $db->prepare('SELECT stream_othname FROM public_iptv WHERE public_sahip = :perm');
    $stmt2->bindValue(':perm', strip_tags($_SESSION["login"]));
    $stmt2->execute();
    if($row2 = $stmt2->fetch()) {
    header ("Content-Disposition: attachment;filename=".strip_tags($row2["stream_othname"]).".m3u");
    }
    
    header ("Pragma: no-cache");
    header ("Expires: 0");
    } else {
    die('<center>
    <b>For login m3u.php?git=lgn&usr=user_name&pwd=password</b><br>
    </center>');
    }
    echo '#EXTM3U';
    $stmt2 = $db->prepare('SELECT * FROM public_iptv WHERE public_sahip = :perm');
    $stmt2->bindValue(':perm', strip_tags($_SESSION["login"]));
    $stmt2->execute();
    while($row2 = $stmt2->fetch()) {
    echo '
    #EXTINF:'.intval($row2["public_id"]).', '.strip_tags($row2["stream_othname"]).'
    http://'.$_SERVER["HTTP_HOST"].'/iptv/watch.php?pubid='.intval($row2["public_id"]).'&usr='.base64_encode($_SESSION["login"]).'';
    }
    break;

}
?>