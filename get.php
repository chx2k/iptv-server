<?php
include("conn.php");
$getir = new IPTVClass();
session_start();

$name = strip_tags($_GET["username"]);
$pass = sha1(md5($_GET['password']));

$query  = $db->query("SELECT * FROM admin_list WHERE admin_usrname =" . $db->quote($name) . " AND admin_passwd = " . $db->quote($pass). "",PDO::FETCH_ASSOC);
if ( $say = $query -> rowCount() ){
if( $say > 0 ){
$_SESSION["login"] = $name;
header ("Content-Type: video/vnd.mpegurl");

$stmt2 = $db->prepare('SELECT stream_othname FROM public_iptv WHERE public_sahip = :perm');
$stmt2->bindValue(':perm', strip_tags($_SESSION["login"]));
$stmt2->execute();
if($row2 = $stmt2->fetch()) {
    if(empty($row2["stream_othname"])) {
header ("Content-Disposition: attachment;filename=".strip_tags($row2["stream_othname"]).".m3u");
    } else {
        header ("Content-Disposition: attachment;filename=empty.m3u");
    }
}
header ("Pragma: no-cache");
header ("Expires: 0");
}

} else {
die('<center>
<b>For login get.php?git=lgn&usr=user_name&pwd=password</b><br>
</center>');
}