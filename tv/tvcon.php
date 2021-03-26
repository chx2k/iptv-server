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
$password = "";  // password local olduğu için varsayılan şifre
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

class IPTVClass {

public function logincheck() {
if(isset($_COOKIE['login'])) {
} elseif($_COOKIE['login'] == "1") {
die('<script>location.replace("../index.php")</script>');
} else {
die('<script>location.replace("../index.php")</script>');
}
if($_COOKIE["yetki"] == md5("sus")) {
die("<center class='mt-5'>Sayfayı Görme Yetkiniz Yok</center>");
} else {
}
}

}
?>