<?php
include("tvcon.php");
$getir = new IPTVClass();
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
<br>
<div id="panelip" class="tab-panel">
<nav class="dropdown">
<ul class="list-group list-group-flush display-3">
<?php
$stmt = $db->prepare('SELECT * FROM public_iptv WHERE public_sahip = :pubid');
$stmt->execute(array(':pubid' => $_COOKIE['user_id']));
while($row = $stmt->fetch()) {
?>
<li class='list-group-item'>
<a onclick="getiriptv('<?php echo strip_tags($row["public_name"]); ?>')"> <?php echo strip_tags($row["public_name"]); ?></a>
</li>
<?php
}
?>
</ul></nav></div>
</div></div></div></div>

<div class="col-12 right">
<iframe id="iptv"></iframe>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js" ></script>
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