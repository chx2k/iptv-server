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
<a type="button" href="install.php?git=hukuki" class="btn btn-dark">Devam Et</a>
</div>
</div></body>';
break;

case 'hukuki':
echo '<body class="container">
<br><br><br>
<div class="mx-auto card">
<div class="card-body">
<b>Anlaşmalar</b>
<hr></hr>
<b>Bu programda kullanacağım tüm yasa dışı aktiviteler sadece benim sorumluluğumdadır. <br>Programı yazan kişi ile herhangi ilişkisinin olmadığını beyan ederim.</b>
<br><br>
<form action="install.php?git=first_install" method="post">
<input type="checkbox" id="onay" name="onay" checked>
<label for="onay">Okudum ve onaylıyorum</label>
<br>
<button type="submit" class="btn btn-dark">Devam Et</button>
</form>
</div></div>';
break;

case 'first_install':
  if(isset($_POST["onay"])) {

  } else {
    die("You must accept terms!");
  }
$cd = "
sudo yum -y install --nogpgcheck https://dl.fedoraproject.org/pub/epel/epel-release-latest-8.noarch.rpm
sudo yum -y install --nogpgcheck https://download1.rpmfusion.org/free/el/rpmfusion-free-release-8.noarch.rpm 
sudo rpm -ivh https://download1.rpmfusion.org/nonfree/el/rpmfusion-nonfree-release-8.noarch.rpm
sudo yum -y install nginx epel-release screen php-fpm php-common php-cli mariadb mariadb-server 
sudo dnf config-manager --enable powertools
sudo yum -y install ffmpeg ffmpeg-devel
chown -R apache:apache ".dirname(__FILE__)."
chmod 777 -R ".dirname(__FILE__)."
setenforce 0 && sed -i 's/SELINUX=enforcing/SELINUX=permissive/g' /etc/sysconfig/selinux";
echo '<body class="container">
<br><br><br>
<div class="mx-auto card">
<div class="card-body">
<b>Kuruluma Başlıyoruz</b>
<hr></hr>
<p>PHP IPTV Yönetim Paneli kurulumu öncesi birkaç kontrol yapmalıyız. Siz de root olarak su komutları girin</p>
<pre>'.$cd.'</pre>
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
<input type="text" class="form-control" name="sqlname" value="iptv_data" placeholder="iptv_data" readonly>
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

$sql2 = "CREATE DATABASE ".$mysqldbname."";
if ($conn->query($sql2) === TRUE) {
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

$txt2 = '$ip = "'.strip_tags($mysqlserv).'"; //host
$user = "'.strip_tags($mysqlusr).'";  // host id
$password = "'.strip_tags($mysqlpass).'";  // password local olduğu için varsayılan şifre
$ad = "'.strip_tags($mysqldbname).'"; // db adı ';



$sql = mysqli_connect($mysqlserv, $mysqlusr, $mysqlpass, $mysqldbname);
$sqlSource = file_get_contents(''.dirname(__FILE__).'/iptv.sql');
mysqli_multi_query($sql,$sqlSource);
echo '<body class="container">
<br><br><br>
<div class="mx-auto card">
<div class="card-body">
<b>MySQL Kurulumu</b>
<hr></hr>
<p> MySQL Başarıyla Kuruldu </p><br>
<b>NOT : <i>conn.php DB Bağlantılarını</i> düzenlemeyi unutmayın</b><br><br>
<pre>
'.$txt2.'<br>
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
if(file_exists("iptv.sql")) {
unlink("iptv.sql");
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
Default Password : 19654
</pre>
<br>
<a type="button" href="index.php" class="btn btn-dark">Devam Et</a>
</div></div></body>';
break;

}
?>
