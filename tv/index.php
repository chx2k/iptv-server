<?php
include("tvcon.php");
$getir = new IPTVClass();

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
echo '<script>function deleteAllCookies() {
    var cookies = document.cookie.split(";");

    for (var i = 0; i < cookies.length; i++) {
        var cookie = cookies[i];
        var eqPos = cookie.indexOf("=");
        var name = eqPos > -1 ? cookie.substr(0, eqPos) : cookie;
        document.cookie = name + "=;expires=Thu, 01 Jan 1970 00:00:00 GMT";
    }
}
deleteAllCookies();</script>';
echo '<link rel="stylesheet" href="./theme/css/metro.min.css">
<link rel="stylesheet" href="./theme/css/metro-colors.min.css">
<link rel="stylesheet" href="./theme/css/metro-rtl.min.css">
<link rel="stylesheet" href="./theme/css/metro-icons.min.css">
<link rel="stylesheet" href="./theme/css/bootstrap.min.css">

<script src="./theme/js/popper.js"></script>
<script src="./theme/js/metro.min.js"></script>
<script src="./theme/js/jquery-3.2.0.min.js"></script>
<script src="./theme/js/bootstrap.min.js"></script>
<style>
@media (max-width:800px) {
body {
  background-image: url("https://source.unsplash.com/1080x1920/?turkey,türkiye,atatürk,şehir,manzara,deniz");
  background-repeat: no-repeat;
}
.manzara {
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0, 0.4); /* Black w/opacity/see-through */
  color: white;
  font-weight: bold;
  text-align: center;
  padding: 15px;
}
.form-control {
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0, 0.4); /* Black w/opacity/see-through */
  width: 100%;
}
}
@media (min-width:800px) {
body {
  background-image: url("https://source.unsplash.com/1920x1080/?turkey,türkiye,atatürk,şehir,manzara,deniz");
  background-repeat: no-repeat;
}
.manzara {
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0, 0.4); /* Black w/opacity/see-through */
  color: white;
  box-shadow: 3px solid #f1f1f1;
  z-index: 2;
  position: absolute;
  text-align: center;
  top: 50%;
  font-weight: bold;
  left: 50%;
  transform: translate(-50%, -50%);
  width: 100%;
}
.form-control {
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0, 0.4); /* Black w/opacity/see-through */
  width: 100%;
}

.container  {
border-radius: 20px;
}

}
</style>

<body class="container mx-auto text-center">
<div class="manzara">
    <form class="container form-signin" action="index.php?git=postlgn" method="post">
	<br><br>
  <h1 class="h3 mb-3 font-weight-normal">IPTV Panel for TV</h1>
  <br>
  <label for="inputEmail" class="sr-only">Username</label>
  <input type="text" name="mail" class="form-control" placeholder="Username" required autofocus>
  <br>
  <label for="inputPassword" class="sr-only">Password</label>
  <input type="password" name="pass" class="form-control" placeholder="Password" required>
  <br>
  <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button><br>
  <p class="mt-5 mb-3 text-muted">&copy; 2019-2020</p>
</form></div>
</body>';
break;

case 'postlgn':
session_destroy();
session_start();
if($_POST) {

$name = strip_tags($_POST["mail"]);
$pass = sha1(md5($_POST['pass']));

$query  = $db->query("SELECT * FROM admin_list WHERE admin_usrname =" . $db->quote($name) . " AND admin_passwd = " . $db->quote($pass). "",PDO::FETCH_ASSOC);
if ( $say = $query -> rowCount() ){
if( $say > 0 ){
$_SESSION["logintv"] = $name;
setcookie("logintv", $name, time()+3600);
echo '<script>location.replace("index.php?git=control2");</script>';
}

} else {
echo('<script>location.replace("index.php")</script>');
}

} else {
  $getir->Error("Non-POST");
}
break;

case 'control2':
$stmt = $db->prepare('SELECT * FROM admin_list WHERE admin_usrname = :iddegeri');
$stmt->execute(array(':iddegeri' => $_COOKIE["logintv"]));
while($row = $stmt->fetch()) {
if(strip_tags($row["admin_yetki"]) == "admin") {
$_SESSION["yetki"] = md5("admin");
setcookie("reklam", md5("admin"), time()+3600);
echo('<script>location.replace("index.php?git=tv")</script>');
} elseif(strip_tags($row["admin_yetki"]) == "sus") {
setcookie("reklam", md5("sus"), time()+3600);
die("Hesabınız Bloklanmıştır");
session_destroy();
} elseif(strip_tags($row["admin_yetki"]) == "gold") { 
$_SESSION["yetki"] = md5("gold");
setcookie("reklam", md5("gold"), time()+3600);
echo('<script>location.replace("index.php?git=tv")</script>');
} else {
$_SESSION["yetki"] = md5("uye");
setcookie("reklam", md5("uye"), time()+3600);
echo('<script>location.replace("index.php?git=tv")</script>');
}
if(isset($_SESSION["yetki"])) {
} else {
echo '<script>location.reload();</script>';
}

}
break;

case 'tv':
$getir->logincheck();
?>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<style>
.left {
width: 30%;
float: left;
}
.list-group-item {
font-size: 25px;
}
.right {
width: 70%;
float: right;
}
iframe {
width: 100%;
height: 100%;
background-image: url("broke.gif");
background-repeat: no-repeat;
background-size: 100% 100%;
color:white;
}
</style>

<div onmouseover="gizleGoster('panelip')" id="panelip" class="col-12 left">
<div class="row">
<div class="np col-12">
<div class="tab-content mt-3">
<center><h2>Yayın Listesi</h2></center>
<hr></hr>
<button onclick="javascript:location.reload();" type="submit" style="right: 0px;width: 100%;padding: 10px;" class="btn btn-warning">Refresh</button>
<br><br>
<a href="index.php?git=cikis" style="right: 0px;width: 100%;padding: 10px;" class="btn btn-danger">Çıkış</a>
<br><br>
<div id="panelip" class="tab-panel">
<nav class="dropdown">
<ul class="list-group list-group-flush display-3">
<?php
$stmt = $db->prepare('SELECT * FROM public_iptv WHERE public_sahip = :pubid');
$stmt->execute(array(':pubid' => $_COOKIE['login']));
while($row = $stmt->fetch()) {
?>
<li class='list-group-item'>
<a onclick="getiriptv('<?php echo strip_tags($row["public_name"]); ?>')"> <?php echo strip_tags($row["stream_othname"]); ?></a>
</li>
<?php
}
?>
</ul></nav></div>
</div></div></div></div>

<div class="col-12 right">
<iframe id="iptv"></iframe>
</div>

<script src="theme/js/jquery.min.js"></script>
<script src="theme/js/jquery-3.5.1.min.js" ></script>
<script>

function gizleGoster(ID) {
  var secilenID = document.getElementById(ID);
  if (secilenID.style.display == "none") {
  } else {
    secilenID.style.display = "";
  }
}

function getiriptv(sayd) {
$.post("api.php", {get: sayd}, function(result) {
var stringified = JSON.stringify(result);
var obj = JSON.parse(stringified);
if(obj[0].public_active == "1") {
document.getElementById('iptv').src = "http://<?php echo $_SERVER['HTTP_HOST']; ?>/watch.php?pubid=" + obj[0].public_name + "&live=0&selcuk=1";
document.title = "Yayın / " + obj[0].public_name;
} else {
document.getElementById('iptv').src = "http://<?php echo $_SERVER['HTTP_HOST']; ?>/404.php";
document.title = "Not Found / " + obj[0].public_name;
}

});
}
</script>
<?php
break;

case 'cikis':
$getir->logincheck();
session_destroy();
die('<script>function deleteAllCookies() {
var cookies = document.cookie.split(";");
for (var i = 0; i < cookies.length; i++) {
var cookie = cookies[i];
var eqPos = cookie.indexOf("=");
var name = eqPos > -1 ? cookie.substr(0, eqPos) : cookie;
document.cookie = name + "=;expires=Thu, 01 Jan 1970 00:00:00 GMT";
}
}
deleteAllCookies();
location.replace("index.php")</script>');
break;
}
?>