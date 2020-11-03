<?php
error_reporting(0);
if(file_exists("yukle.lock")) {
die("<center><b>PHP IPTV Yüklenemedi / PHP IPTV was not Installed</b>
<hr></hr>
<p>yukle.lock dosyasını silip tekrar deneyin</b><br>
<a href='install.php'>Yükle</a></center>");
} else {
}
echo '<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script><meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>PHP IPTV Installer</title>
</head>
<style>
@fontName:  -apple-system,
            system-ui,
            BlinkMacSystemFont,
            "Segoe UI", "Roboto", "Ubuntu",
            "Helvetica Neue", sans-serif;
@media (max-width:800px) {
body {
  background-image: url("https://source.unsplash.com/1080x1920/?turkey,türkiye,atatürk,şehir,manzara,deniz");
  align-items: center;
  justify-content: center;
}
}
body {
  background-image: url("https://source.unsplash.com/1920x1080/?turkey,türkiye,atatürk,şehir,manzara,deniz");
  align-items: center;
  justify-content: center;
}
</style>';
if(!isset($_GET['git'])) {
$sayfa = 'index';
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

case 'index':
echo '<body class="container">
<br><br><br>
<div class="mx-auto card">
<div class="card-body">
<b>Merhabalar</b>
<hr></hr>
<p>PHP IPTV Yönetim Paneli kurulumuna hoşgeldiniz. Devam etmek için lütfen devam tuşuna tıklayın.</p><br>
<a type="button" href="install.php?git=first_install" class="btn btn-dark">Devam Et</a>
</div>
</div></body>';
break;

case 'first_install':
echo '<body class="container">
<br><br><br>
<div class="mx-auto card">
<div class="card-body">
<b>Kuruluma Başlıyoruz</b>
<hr></hr>
<p>PHP IPTV Yönetim Paneli kurulumu öncesi birkaç kontrol yapmalıyız.</p>

<table class="table">
<thead>
<tr>
<th scope="col">Fonksiyon</th>
<th scope="col">Durum</th>
</tr></thead>
<tbody>';
if(!extension_loaded('pdo_mysql')){
	echo '<tr>
	<td>PDO MySQL</td>
	<td><font color="red">No</font></td>
	</tr><br><br>';
} else {
	echo '<tr>
	<td>PDO MySQL</td>
	<td><font color="green">OK</font></td>
	</tr>';
}
if (!function_exists('shell_exec')) {
  echo '<tr>
  <td>Shell EXEC</td>
  <td><font color="red">No</font></td>
  </tr><br><br>';
} else {
  echo '<tr>
  <td>Shell EXEC</td>
  <td><font color="green">OK</font></td>
  </tr><br>';
}
echo '</tbody></table>
<a href="install.php?git=sql_install" class="btn btn-dark">Devam</a>
</div></div></body>';
break;

case 'sql_install':
echo '<body class="container">
<br><br><br>
<div class="mx-auto card">
<div class="card-body">
<b>SQL Bilgisi</b>
<hr></hr>
<p>Lütfen SQL bilgilerini giriniz.</p>
  
<form action="install.php?git=sqlpost" method="post">

<div class="form-group">
<label for="exampleInputEmail1">SQL Server</label>
<input type="text" class="form-control" name="sqlserver" placeholder="localhost">
</div>

<div class="form-group">
<label for="exampleInputEmail1">SQL Username</label>
<input type="text" class="form-control" name="sqlusr" placeholder="root">
</div>
	
<div class="form-group">
<label for="exampleInputEmail1">SQL Password</label>
<input type="password" class="form-control" name="sqlpasswd" placeholder="1234">
</div>

<div class="form-group">
<label for="exampleInputEmail1">SQL DB Name</label>
<input type="text" class="form-control" name="sqlname" placeholder="1234">
</div>
<button type="submit" class="btn btn-dark">İleri / Next</button>
</form></div></div></body>';
break;
	
case 'sqlpost':
$mysqlserv = $_POST["sqlserver"];
$mysqlusr = $_POST["sqlusr"];
$mysqlpass = $_POST["sqlpasswd"];
$mysqldbname = $_POST["sqlname"];

$conn = new mysqli($mysqlserv, $mysqlusr, $mysqlpass);
$conn->query("SET CHARACTER SET utf8");
$conn->query("SET NAMES utf8");
		
if ($conn->connect_error) {
die('<body class="container">
<br><br><br>
<div class="mx-auto card">
<div class="card-body">
<b>MySQL Kurulumu | HATA</b>
<hr></hr>
<code>
'.$conn->connect_error.'<br>
</code><br>
<div class="form-group">
<br><br><a href="install.php?git=sql_install" " class="btn btn-dark">Tekrar Dene</button><br>
</div></div></div></body>');
}
$sql = "CREATE DATABASE ".$mysqldbname."";

if ($conn->query($sql) === TRUE) {
} else {
die('<body class="container">
<br><br><br>
<div class="mx-auto card">
<div class="card-body">
<b>MySQL Kurulumu | HATA</b>
<hr></hr>
<code>
'.$conn->error.'<br>
</code><br>
<div class="form-group">
<br><br><a href="install.php?git=sql_install" " class="btn btn-dark">Tekrar Dene</button><br>
</div></div></div></body>');
}
$conn->close();
if(file_exists("libs/conn.php")) {
unlink("libs/conn.php");
touch("libs/conn.php");
} else {
touch("libs/conn.php");
}


$conn2 = new mysqli($mysqlserv, $mysqlusr, $mysqlpass, $mysqldbname);
$conn2->query("SET CHARACTER SET utf8");
$conn2->query("SET NAMES utf8");
if ($conn2->connect_error) {
die('<body class="container">
<br><br><br>
<div class="mx-auto card">
<div class="card-body">
<b>MySQL Kurulumu | HATA</b>
<hr></hr>
<code>
'.$conn->connect_error.'<br>
</code><br>
<div class="form-group">
<br><br><a href="install.php?git=sql_install" " class="btn btn-dark">Tekrar Dene</button><br>
</div></div></div></body>');
}

$tab1 = "CREATE TABLE `admin_list` (
  `admin_id` int(11) NOT NULL,
  `admin_email` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `admin_usrname` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `admin_passwd` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `admin_token` varchar(255) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;";

$tab2 = "CREATE TABLE `iptv_config` (
  `config_id` int(11) NOT NULL,
  `ffmpeg_m3u8cfg` text COLLATE utf8_turkish_ci NOT NULL,
  `ffmpeg_ts` text COLLATE utf8_turkish_ci NOT NULL,
  `twitter_tkn` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `facebook_tkn` varchar(255) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;";

$tab3 = "CREATE TABLE `ip_block` (
  `ip_id` int(11) NOT NULL,
  `ip_adress` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `ban_reason` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `ip_block_active` varchar(255) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;";

$tab4 = "CREATE TABLE `private_iptv` (
  `private_id` int(11) NOT NULL,
  `private_name` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `private_resim` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `private_iptv` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `private_active` varchar(255) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;";

$tab5 = "CREATE TABLE `public_iptv` (
  `public_id` int(11) NOT NULL,
  `public_name` varchar(255) NOT NULL,
  `public_tslink` varchar(255) NOT NULL,
  `video_stream` varchar(255) NOT NULL,
  `public_active` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;";

$insert1 = "INSERT INTO `admin_list` (`admin_id`, `admin_email`, `admin_usrname`, `admin_passwd`, `admin_token`) VALUES
(1, 'alicangonullu@yahoo.com', 'alicangonullu', '060323f33140b4a86b53d01d726a45c7584a3a2b', '060323f33140b4a86b53d01d726a45c7584a3a2b');";
$insert2 = "INSERT INTO `iptv_config` (`config_id`, `ffmpeg_m3u8cfg`, `ffmpeg_ts`, `twitter_tkn`, `facebook_tkn`) VALUES
(1, '-listen 1 -vcodec libx264 -profile:v high -level:v 4.1 -crf 23 -preset veryfast -vf \"yadif\" -s 1920x1080 -maxrate 3400k -bufsize 1600k -hls_wrap 8 -acodec libmp3lame -ac 2 -c:a aac -b:a 128k -strict experimental', '-c:v copy -c:a copy -t 00:05:00', '1234', '1234');";
$insert3 = "INSERT INTO `ip_block` (`ip_id`, `ip_adress`, `ban_reason`, `ip_block_active`) VALUES
(1, '::1', 'Nobody', '1');";

$alter1 = "ALTER TABLE `admin_list`
  ADD PRIMARY KEY (`admin_id`);";
$alter2 = "ALTER TABLE `iptv_config`
  ADD PRIMARY KEY (`config_id`);";
$alter3 = "ALTER TABLE `ip_block`
  ADD PRIMARY KEY (`ip_id`);";
$alter4 = "ALTER TABLE `private_iptv`
  ADD PRIMARY KEY (`private_id`);";
$alter5 = "ALTER TABLE `public_iptv`
  ADD PRIMARY KEY (`public_id`);";

$alters1 = "ALTER TABLE `admin_list`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;";
$alters2 = "ALTER TABLE `iptv_config`
  MODIFY `config_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;";
$alters3 = "ALTER TABLE `ip_block`
  MODIFY `ip_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;";
$alters4 = "ALTER TABLE `private_iptv`
  MODIFY `private_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;";
$alters5 = "ALTER TABLE `public_iptv`
  MODIFY `public_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;";
if ($conn2->query($tab1) === TRUE) {
} else {
die('<body class="container">
<br><br><br>
<div class="mx-auto card">
<div class="card-body">
<b>MySQL Kurulumu | HATA</b>
<hr></hr>
<code>
'.$conn2->error.'<br>
</code><br>
<div class="form-group">
<br><br><a href="install.php?git=sql_install" " class="btn btn-dark">Tekrar Dene</button><br>
</div></div></div></body>');
}

if ($conn2->query($tab2) === TRUE) {
} else {
die('<body class="container">
<br><br><br>
<div class="mx-auto card">
<div class="card-body">
<b>MySQL Kurulumu | HATA</b>
<hr></hr>
<code>
'.$conn2->error.'<br>
</code><br>
<div class="form-group">
<br><br><a href="install.php?git=sql_install" " class="btn btn-dark">Tekrar Dene</button><br>
</div></div></div></body>');
}

if ($conn2->query($tab3) === TRUE) {
} else {
die('<body class="container">
<br><br><br>
<div class="mx-auto card">
<div class="card-body">
<b>MySQL Kurulumu | HATA</b>
<hr></hr>
<code>
'.$conn2->error.'<br>
</code><br>
<div class="form-group">
<br><br><a href="install.php?git=sql_install" " class="btn btn-dark">Tekrar Dene</button><br>
</div></div></div></body>');
}

if ($conn2->query($tab4) === TRUE) {
} else {
die('<body class="container">
<br><br><br>
<div class="mx-auto card">
<div class="card-body">
<b>MySQL Kurulumu | HATA</b>
<hr></hr>
<code>
'.$conn2->error.'<br>
</code><br>
<div class="form-group">
<br><br><a href="install.php?git=sql_install" " class="btn btn-dark">Tekrar Dene</button><br>
</div></div></div></body>');
}

if ($conn2->query($tab5) === TRUE) {
} else {
die('<body class="container">
<br><br><br>
<div class="mx-auto card">
<div class="card-body">
<b>MySQL Kurulumu | HATA</b>
<hr></hr>
<code>
'.$conn2->error.'<br>
</code><br>
<div class="form-group">
<br><br><a href="install.php?git=sql_install" " class="btn btn-dark">Tekrar Dene</button><br>
</div></div></div></body>');
}

if ($conn2->query($insert1) === TRUE) {
} else {
die('<body class="container">
<br><br><br>
<div class="mx-auto card">
<div class="card-body">
<b>MySQL Kurulumu | HATA</b>
<hr></hr>
<code>
'.$conn2->error.'<br>
</code><br>
<div class="form-group">
<br><br><a href="install.php?git=sql_install" " class="btn btn-dark">Tekrar Dene</button><br>
</div></div></div></body>');
}

if ($conn2->query($insert2) === TRUE) {
} else {
die('<body class="container">
<br><br><br>
<div class="mx-auto card">
<div class="card-body">
<b>MySQL Kurulumu | HATA</b>
<hr></hr>
<code>
'.$conn2->error.'<br>
</code><br>
<div class="form-group">
<br><br><a href="install.php?git=sql_install" " class="btn btn-dark">Tekrar Dene</button><br>
</div></div></div></body>');
}

if ($conn2->query($insert3) === TRUE) {
} else {
die('<body class="container">
<br><br><br>
<div class="mx-auto card">
<div class="card-body">
<b>MySQL Kurulumu | HATA</b>
<hr></hr>
<code>
'.$conn2->error.'<br>
</code><br>
<div class="form-group">
<br><br><a href="install.php?git=sql_install" " class="btn btn-dark">Tekrar Dene</button><br>
</div></div></div></body>');
}

if ($conn2->query($alter1) === TRUE) {
} else {
die('<body class="container">
<br><br><br>
<div class="mx-auto card">
<div class="card-body">
<b>MySQL Kurulumu | HATA</b>
<hr></hr>
<code>
'.$conn2->error.'<br>
</code><br>
<div class="form-group">
<br><br><a href="install.php?git=sql_install" " class="btn btn-dark">Tekrar Dene</button><br>
</div></div></div></body>');
}
if ($conn2->query($alter2) === TRUE) {
} else {
die('<body class="container">
<br><br><br>
<div class="mx-auto card">
<div class="card-body">
<b>MySQL Kurulumu | HATA</b>
<hr></hr>
<code>
'.$conn2->error.'<br>
</code><br>
<div class="form-group">
<br><br><a href="install.php?git=sql_install" " class="btn btn-dark">Tekrar Dene</button><br>
</div></div></div></body>');
}
if ($conn2->query($alter3) === TRUE) {
} else {
die('<body class="container">
<br><br><br>
<div class="mx-auto card">
<div class="card-body">
<b>MySQL Kurulumu | HATA</b>
<hr></hr>
<code>
'.$conn2->error.'<br>
</code><br>
<div class="form-group">
<br><br><a href="install.php?git=sql_install" " class="btn btn-dark">Tekrar Dene</button><br>
</div></div></div></body>');
}
if ($conn2->query($alter4) === TRUE) {
} else {
die('<body class="container">
<br><br><br>
<div class="mx-auto card">
<div class="card-body">
<b>MySQL Kurulumu | HATA</b>
<hr></hr>
<code>
'.$conn2->error.'<br>
</code><br>
<div class="form-group">
<br><br><a href="install.php?git=sql_install" " class="btn btn-dark">Tekrar Dene</button><br>
</div></div></div></body>');
}
if ($conn2->query($alter5) === TRUE) {
} else {
die('<body class="container">
<br><br><br>
<div class="mx-auto card">
<div class="card-body">
<b>MySQL Kurulumu | HATA</b>
<hr></hr>
<code>
'.$conn2->error.'<br>
</code><br>
<div class="form-group">
<br><br><a href="install.php?git=sql_install" " class="btn btn-dark">Tekrar Dene</button><br>
</div></div></div></body>');
}

if ($conn2->query($alters1) === TRUE) {
} else {
die('<body class="container">
<br><br><br>
<div class="mx-auto card">
<div class="card-body">
<b>MySQL Kurulumu | HATA</b>
<hr></hr>
<code>
'.$conn2->error.'<br>
</code><br>
<div class="form-group">
<br><br><a href="install.php?git=sql_install" " class="btn btn-dark">Tekrar Dene</button><br>
</div></div></div></body>');
}
if ($conn2->query($alters2) === TRUE) {
} else {
die('<body class="container">
<br><br><br>
<div class="mx-auto card">
<div class="card-body">
<b>MySQL Kurulumu | HATA</b>
<hr></hr>
<code>
'.$conn2->error.'<br>
</code><br>
<div class="form-group">
<br><br><a href="install.php?git=sql_install" " class="btn btn-dark">Tekrar Dene</button><br>
</div></div></div></body>');
}
if ($conn2->query($alters3) === TRUE) {
} else {
die('<body class="container">
<br><br><br>
<div class="mx-auto card">
<div class="card-body">
<b>MySQL Kurulumu | HATA</b>
<hr></hr>
<code>
'.$conn2->error.'<br>
</code><br>
<div class="form-group">
<br><br><a href="install.php?git=sql_install" " class="btn btn-dark">Tekrar Dene</button><br>
</div></div></div></body>');
}
if ($conn2->query($alters4) === TRUE) {
} else {
die('<body class="container">
<br><br><br>
<div class="mx-auto card">
<div class="card-body">
<b>MySQL Kurulumu | HATA</b>
<hr></hr>
<code>
'.$conn2->error.'<br>
</code><br>
<div class="form-group">
<br><br><a href="install.php?git=sql_install" " class="btn btn-dark">Tekrar Dene</button><br>
</div></div></div></body>');
}
if ($conn2->query($alters5) === TRUE) {
} else {
die('<body class="container">
<br><br><br>
<div class="mx-auto card">
<div class="card-body">
<b>MySQL Kurulumu | HATA</b>
<hr></hr>
<code>
'.$conn2->error.'<br>
</code><br>
<div class="form-group">
<br><br><a href="install.php?git=sql_install" " class="btn btn-dark">Tekrar Dene</button><br>
</div></div></div></body>');
}
$conn2->close();

$txt2 = '$ip = "'.strip_tags($mysqlserv).'"; //host
$user = "'.strip_tags($mysqlusr).'";  // host id
$password = "'.strip_tags($mysqlpass).'";  // password local olduğu için varsayılan şifre
$ad = "'.strip_tags($mysqldbname).'"; // db adı ';

echo '<body class="container">
<br><br><br>
<div class="mx-auto card">
<div class="card-body">
<b>MySQL Kurulumu</b>
<hr></hr>
<p> MySQL Başarıyla Kuruldu </p><br>
<b>NOT : <i>conn.php DB Bağlantılarını</i> düzenlemeyi unutmayın</b><br><br>
<pre>
'.$txt2.'
</pre>
<div class="form-group">
<br><br><a href="install.php?git=install2" " class="btn btn-dark">İleri / Next</button><br>
</div></div></div></body>';
break;


case 'install2':
if(file_exists("yukle.lock")) {
unlink("yukle.lock");
$txt = md5(rand(5,15));
$fp = fopen("yukle.lock","a");
fwrite($fp,$txt);
fclose($fp);
} else {
$txt = md5(rand(5,15));
$fp = fopen("yukle.lock","a");
fwrite($fp,$txt);
fclose($fp);
}
if(file_exists("iptv_data.sql")) {
unlink("iptv_data.sql");
} else {
}
echo '<body class="container">
<br><br><br>
<div class="mx-auto card">
<div class="card-body">
<b>Yükleme Bildirimi</b>
<hr></hr>
<p>Yükleme Tamamlandı. Artık Server hazır durumdadır.</p><br>
<pre>
Default Username : alicangonullu
Default Password : 19742008
</pre>
<br>
<a type="button" href="index.php" class="btn btn-dark">Devam Et</a>
</div></div></body>';
break;

}
?>
