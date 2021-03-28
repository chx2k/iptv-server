<?php
if(file_exists("yukle.lock")) {
} else {
die("<center><b>PHP IPTV Yüklenemedi / PHP IPTV was not Installed</b>
<hr></hr>
<p>yukle.lock dosyasını silip tekrar deneyin</b><br>
<a href='install.php'>Yükle</a></center>");
}

try {
$ip = "localhost"; //host
$user = "root";  // host id
$password = "19742008";  // password local olduğu için varsayılan şifre
$ad = "iptv_data"; // db adı 
$db = new PDO("mysql:host=$ip;dbname=$ad", "$user", "$password");
$db->query("SET CHARACTER SET 'utf8'");
$db->query("SET NAMES 'utf8'");
} catch ( PDOException $e ){
die('<table>
<center><img src="veri/sql.png" alt="Örnek Resim"/></center>
<center>No MySQL Connection</center>
<center>Bunun Sebebi Bir DDoS Saldırısı Olabilir</center>
<center>Sistem Yöneticinizle Irtibata Geçin</center>
</table>');
}
include("libs.php");
?>