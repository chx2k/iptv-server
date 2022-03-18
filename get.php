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
header('Location: m3u.php?git=m3upub');
}

} else {
die('<center>
<b>For login get.php?git=lgn&usr=user_name&pwd=password</b><br>
</center>');
}