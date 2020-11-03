<?php
include("conn.php");
$getir = new IPTVClass();
$stmt = $db->prepare('SELECT * FROM iptv_config WHERE config_id = :iddegeri');
$stmt->execute(array(':iddegeri' => strip_tags("1")));
if($row = $stmt->fetch()) {
$configm3u8 = $row["ffmpeg_m3u8cfg"];
$configts = $row["ffmpeg_ts"];
}
if(isset($_GET["pubid"])) {

$streamlink = strip_tags($_GET["pubid"]);
$stmt = $db->prepare('SELECT * FROM public_iptv WHERE public_name = :iddegeri');
$stmt->execute(array(':iddegeri' => $streamlink));
while($row = $stmt->fetch()) {
  if(isset($_GET["debug"])) {
    $getir->logincheck();
    if($row["video_stream"] == 1) {
      if($row["public_active"] == 0) {
        die("Channel is Deactive");
      } else {
		if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
	$stmt = $db->prepare('SELECT * FROM iptv_config WHERE config_id = :getir');
	$stmt->execute(array(':getir' => strip_tags("1")));
	if($row2 = $stmt->fetch()) {
		$getir->TSDebugStreamWin(strip_tags($row["public_name"]), strip_tags($row["public_tslink"]), strip_tags($row2["ffmpeg_ts"]));
	}
        die();
		} else {
			$stmt = $db->prepare('SELECT * FROM iptv_config WHERE config_id = :getir');
	$stmt->execute(array(':getir' => strip_tags("1")));
	while($row2 = $stmt->fetch()) {
        $getir->TSDebugStream(strip_tags($row["public_name"]), strip_tags($row["public_tslink"]), strip_tags($row2["ffmpeg_ts"]));
	}
        die();
		}
      }
    } else {
      if($row["public_active"] == 0) {
        die("Channel is Deactive");
      } else {
		  if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
		if(intval($_GET["watchplayer"]) == "1") {
			  echo '<meta name="viewport" content="width=device-width, initial-scale=1">
			  <link href="https://unpkg.com/video.js/dist/video-js.css" rel="stylesheet">
			  <link href="https://unpkg.com/@videojs/themes@1/dist/city/index.css" rel="stylesheet"/>
			  
			  <link rel="stylesheet" href="https://cdn.metroui.org.ua/v4/css/metro.min.css">
			  <link rel="stylesheet" href="https://cdn.metroui.org.ua/v4/css/metro-colors.min.css">
			  <link rel="stylesheet" href="https://cdn.metroui.org.ua/v4/css/metro-rtl.min.css">
			  <link rel="stylesheet" href="https://cdn.metroui.org.ua/v4/css/metro-icons.min.css">
			  <script src="https://cdn.metroui.org.ua/v4/js/metro.min.js"></script>
			  
			  <script src="https://unpkg.com/video.js/dist/video.js"></script>
			  <script src="https://unpkg.com/videojs-flash/dist/videojs-flash.js"></script>
			  <script src="https://unpkg.com/videojs-contrib-hls/dist/videojs-contrib-hls.js"></script>
			  <body class="container mx-auto">
			  <video style="width:100%;height:100%;" id="example-video" class="video-js vjs-default-skin" controls>
			  <source src="'.strip_tags($row["iptv_adres"]).'" type="application/x-mpegURL"></video>
			  <script>var player = videojs("example-video");
			  player.play();
			  </script></div></body>';
			  die();
			  } else {}
			$stmt = $db->prepare('SELECT * FROM iptv_config WHERE config_id = :getir');
	$stmt->execute(array(':getir' => strip_tags("1")));
	while($row2 = $stmt->fetch()) {
		$getir->M3U8DebugStreamWin(strip_tags($row["public_name"]), strip_tags($row["public_tslink"]), strip_tags($row2["ffmpeg_m3u8cfg"]));
	}
        die();
		  } else {
		if(intval($_GET["watchplayer"]) == "1") {
			  echo '<meta name="viewport" content="width=device-width, initial-scale=1">
			  <link href="https://unpkg.com/video.js/dist/video-js.css" rel="stylesheet">
			  <link href="https://unpkg.com/@videojs/themes@1/dist/city/index.css" rel="stylesheet"/>
			  
			  <link rel="stylesheet" href="https://cdn.metroui.org.ua/v4/css/metro.min.css">
			  <link rel="stylesheet" href="https://cdn.metroui.org.ua/v4/css/metro-colors.min.css">
			  <link rel="stylesheet" href="https://cdn.metroui.org.ua/v4/css/metro-rtl.min.css">
			  <link rel="stylesheet" href="https://cdn.metroui.org.ua/v4/css/metro-icons.min.css">
			  <script src="https://cdn.metroui.org.ua/v4/js/metro.min.js"></script>
			  
			  <script src="https://unpkg.com/video.js/dist/video.js"></script>
			  <script src="https://unpkg.com/videojs-flash/dist/videojs-flash.js"></script>
			  <script src="https://unpkg.com/videojs-contrib-hls/dist/videojs-contrib-hls.js"></script>
			  <body class="container mx-auto">
			  <video style="width:100%;height:100%;" id="example-video" class="video-js vjs-default-skin" controls>
			  <source src="'.strip_tags($row["iptv_adres"]).'" type="application/x-mpegURL"></video>
			  <script>var player = videojs("example-video");
			  player.play();
			  </script></div></body>';
			  die();
			  } else {}
			$stmt = $db->prepare('SELECT * FROM iptv_config WHERE config_id = :getir');
	$stmt->execute(array(':getir' => strip_tags("1")));
	while($row2 = $stmt->fetch()) {
        $getir->M3U8DebugStream(strip_tags($row["public_name"]), strip_tags($row["public_tslink"]), strip_tags($row2["ffmpeg_m3u8cfg"]));
	}
        die();
		  }
      }
    }
  } else {

  }
  if($row["video_stream"] == 1) {
    if($row["public_active"] == 0) {
      die("Channel is Deactive");
    } else {
		if(intval($_GET["watchplayer"]) == "1") {
			  echo '<meta name="viewport" content="width=device-width, initial-scale=1">
			  <link href="https://unpkg.com/video.js/dist/video-js.css" rel="stylesheet">
			  <link href="https://unpkg.com/@videojs/themes@1/dist/city/index.css" rel="stylesheet"/>
			  
			  <link rel="stylesheet" href="https://cdn.metroui.org.ua/v4/css/metro.min.css">
			  <link rel="stylesheet" href="https://cdn.metroui.org.ua/v4/css/metro-colors.min.css">
			  <link rel="stylesheet" href="https://cdn.metroui.org.ua/v4/css/metro-rtl.min.css">
			  <link rel="stylesheet" href="https://cdn.metroui.org.ua/v4/css/metro-icons.min.css">
			  <script src="https://cdn.metroui.org.ua/v4/js/metro.min.js"></script>
			  
			  <script src="https://unpkg.com/video.js/dist/video.js"></script>
			  <script src="https://unpkg.com/videojs-flash/dist/videojs-flash.js"></script>
			  <script src="https://unpkg.com/videojs-contrib-hls/dist/videojs-contrib-hls.js"></script>
			  <body class="container mx-auto">
			  <center><video style="width:100%;height:100%;" id="example-video" class="video-js vjs-default-skin" controls>
			  <source src="m3u/'.strip_tags($_GET["pubid"]).'.ts" type="application/x-mpegURL"></video>
			  <script>  var player = videojs("example-video", {
				  html5: {
					  hls: {
						  overrideNative: true
						  }
						  }
						  });
			  </script></div></center></body>';
			  die();
			  } else {}
      $getir->TSStream(strip_tags($row["public_name"]));
      die();
    }

  } else {
    if($row["public_active"] == 0) {
      die("Channel is Deactive");
    } else {
		if(intval($_GET["watchplayer"]) == "1") {
			  echo '<meta name="viewport" content="width=device-width, initial-scale=1">
			  <link href="https://unpkg.com/video.js/dist/video-js.css" rel="stylesheet">
			  <link href="https://unpkg.com/@videojs/themes@1/dist/city/index.css" rel="stylesheet"/>
			  
			  <link rel="stylesheet" href="https://cdn.metroui.org.ua/v4/css/metro.min.css">
			  <link rel="stylesheet" href="https://cdn.metroui.org.ua/v4/css/metro-colors.min.css">
			  <link rel="stylesheet" href="https://cdn.metroui.org.ua/v4/css/metro-rtl.min.css">
			  <link rel="stylesheet" href="https://cdn.metroui.org.ua/v4/css/metro-icons.min.css">
			  <script src="https://cdn.metroui.org.ua/v4/js/metro.min.js"></script>
			  
			  <script src="https://unpkg.com/video.js/dist/video.js"></script>
			  <script src="https://unpkg.com/videojs-flash/dist/videojs-flash.js"></script>
			  <script src="https://unpkg.com/videojs-contrib-hls/dist/videojs-contrib-hls.js"></script>
			  <body class="container mx-auto">
			  <center><video style="width:100%;height:100%;" id="example-video" class="video-js vjs-theme-city" controls>
			  <source src="m3u/'.strip_tags($_GET["pubid"]).'.m3u8" type="application/x-mpegURL"></video>
			  <script>  var player = videojs("example-video", {
				  html5: {
					  hls: {
						  overrideNative: true
						  }
						  }
						  });
			  </script></div></center></body>';
			  die();
			  } else {}
      $getir->M3U8Stream(strip_tags($row["public_name"]));
      die();
    }
  }

}
} else {

}
$getir->funcControl('shell_exec');
$getir->funcControl('exec');
$getir->funcControl('system');


$getir->Head("IPTV Player");
$getir->Style();

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

case 'postlgn':
if($_POST) {

$name = strip_tags($_POST["mail"]);
$pass = sha1(md5($_POST['pass']));

$query  = $db->query("SELECT * FROM admin_list WHERE admin_usrname =" . $db->quote($name) . " AND admin_passwd = " . $db->quote($pass). "",PDO::FETCH_ASSOC);
if ( $say = $query -> rowCount() ){
if( $say > 0 ){
echo('<script>document.cookie = "user_id='.strip_tags($_POST["mail"]).'";
location.replace("index.php?git=iptv")</script>');
}

} else {
echo('<script>location.replace("index.php")</script>');
}

} else {
  $getir->Error("Non-POST");
}
break;

case 'index':
echo '<body class="container mx-auto text-center">
    <form class="form-signin" action="index.php?git=postlgn" method="post">
  <h1 class="h3 mb-3 font-weight-normal">IPTV Panel By AliCan</h1>
  <label for="inputEmail" class="sr-only">Username</label>
  <input type="text" name="mail" class="form-control" placeholder="Username" required autofocus>
  <label for="inputPassword" class="sr-only">Password</label>
  <input type="password" name="pass" class="form-control" placeholder="Password" required>
  <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button><br>
  <a class="btn btn-lg btn-danger btn-block" href="index.php?git=resetpass">Reset Password</a>
  <p class="mt-5 mb-3 text-muted">&copy; 2019-2020</p>
</form>
</body>';
break;

case 'resetpass':
echo '<body class="container mx-auto text-center">
<br>
<div class="card-body">
<form data-role="validator" class="form-signin" action="index.php?git=preset" method="post">
<label for="inputPassword" class="sr-only">E-Mail</label>
<input type="text" name="email" class="form-control" placeholder="E-Mail" required><br>
<label for="inputEmail" class="sr-only">Token</label>
<input type="password" data-role="keypad" name="token" class="form-control" placeholder="Token" required><br>
<button class="btn btn-lg btn-primary btn-block" type="submit">Reset Password</button>
  <br>
</form>
</div>
</body>';
break;

case 'preset':
if(isset($_POST["token"]) && isset($_POST["email"])) {
$email = $_POST["email"];
$token = sha1(md5($_POST["token"]));
$stmt = $db->query("SELECT * FROM admin_list WHERE admin_email = ".$db->quote(strip_tags($email))." AND admin_token = ".$db->quote(strip_tags($token))."");
if ($stmt->rowCount() > 0) {
$str = "0123456789";
$str = str_shuffle($str);
$str = substr($str, 0, 5);
$password = sha1(md5($str));
$db->query("UPDATE admin_list SET admin_passwd = ".$db->quote(strip_tags($password))." WHERE admin_email = ".$db->quote(strip_tags($email))."");
echo '<body class="container">
<br>
<div class="card-body">
<h4>Yeni şifren: '.$str.'</h4>
<hr></hr>
<p>NOT : Şifrenizi Kopyalayın ve <b>BİR YERE KAYDEDİN!</b></p>
<br>
<a class="btn btn-lg btn-primary btn-block" href="index.php">Index</button>
</div></body>';
exit();
 } else {
echo '<body class="container">
<br>
<div class="card-body">
<b>Lütfen link yapınızı kontrol ediniz! / Please control link type</b>
<a class="btn btn-lg btn-primary btn-block" href="index.php">Index</button>
</div></body>';
exit();
}

} else {
echo '<body class="container">
<br>
<div class="card-body">
<b>Something a fault! / Bir şeyler hatalı!</b>
</div></body>';
exit();
    }

break;

case 'iptv':
$getir->logincheck();
$getir->NavBar("IPTV Site");
echo '<div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">';

echo '<li class="nav-item active">
<a class="nav-link" href="index.php?git=iptv">Home <span class="sr-only">(current)</span></a>
</li>';

echo '<li class="nav-item dropdown">
<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
Aktiviteler
</a>';

echo '<div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="index.php?git=iptv">IPTV Status</a>
          <a class="dropdown-item" href="index.php?git=m3ugenerate">M3U8 Generator</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="index.php?git=startstream">Add IPTV</a>
		  <a class="dropdown-item" href="index.php?git=addpriviptv">Add Private IPTV</a>
          <a class="dropdown-item" href="index.php?git=stopiptv">Stop All Stream</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="index.php?git=addban">Add Ban IP</a>
          <a class="dropdown-item" href="index.php?git=ipblock">IP Block</a>
          <div class="dropdown-divider"></div>

          
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="index.php?git=iptv&phpinfo=1">PHP Info</a>
        </div>
      </li>';

echo '<li class="nav-item text-nowrap" align="right">
<a class="nav-link" href="index.php?git=cikis">Log Out</a>
</li>';

echo '</ul></div></nav>';
if(isset($_GET["phpinfo"])) {
if(strip_tags($_GET["phpinfo"]) == "1") {
$getir->logincheck();
die('
<br><br>
<body class="container">
<table class="table" style="width:100%">
  <tr>
    <th>PHP Version:</th>
    <td>'.phpversion().'</td>
  </tr>
  <tr>
    <th>User-Agent:</th>
    <td>'.strip_tags($_SERVER['HTTP_USER_AGENT']).'</td>
  </tr>
  <tr>
    <th>Accept-Language:</th>
    <td><div class="kisalt">'.strip_tags($_SERVER['HTTP_ACCEPT_LANGUAGE']).'</div></td>
  </tr>
  <tr>
    <th>Cookie :</th>
    <td><div class="kisalt">'.strip_tags($_SERVER['HTTP_COOKIE']).'</div></td>
  </tr>
  <th>Server Software :</th>
  <td><div class="kisalt">'.strip_tags($_SERVER['SERVER_SOFTWARE']).'</div></td>
</tr>
<th>System Root :</th>
<td><div class="kisalt">'.strip_tags($_SERVER['SystemRoot']).'</div></td>
</tr>
  <tr>
  <th>Document Root :</th>
  <td><div class="kisalt">'.strip_tags($_SERVER['DOCUMENT_ROOT']).'</div></td>
</tr>
<tr>
  <th>Server Post:</th>
  <td><div class="kisalt">'.strip_tags($_SERVER['SERVER_PORT']).'</div></td>
</tr>
<tr>
<th>Request :</th>
<td><div class="kisalt">'.strip_tags($_SERVER['SERVER_PROTOCOL']).'</div></td>
</tr>
</table>
</body>');
} elseif(empty(strip_tags($_GET["phpinfo"]))) {

} else {
die("Anlamsız Istek");
}
} else {

}
?>
<script language="JavaScript" type="text/javascript">
function delpost(id)
{
  if (confirm("Silmek istediğinize emin misiniz ?\n" + "ID :" + id + ""))
  {
      window.location.href = 'index.php?git=deleteiptv&id=' + id;
  }
}
function delpost2(id)
{
  if (confirm("Silmek istediğinize emin misiniz ?\n" + "Name :" + id + ""))
  {
      window.location.href = 'index.php?git=dfile&name=' + id;
  }
}

$('.table-responsive').on('show.bs.dropdown', function () {
     $('.table-responsive').css( "overflow", "inherit" );
});

$('.table-responsive').on('hide.bs.dropdown', function () {
     $('.table-responsive').css( "overflow", "auto" );
})
</script>
<style>
.btn-group {  
    white-space: nowrap;              
}
.btn-group .btn {  
    float: none;
    display: inline-block;
}
 .btn + .dropdown-toggle { 
    margin-left: -4px;
}

@media screen and (max-width: 1400px) {
.table-responsive {
    border: 1px solid #ddd;
    margin-bottom: 10px;
    overflow-x: auto;
    overflow-y: hidden;
    width: 100%;
}
.table-responsive > .table {
    margin-bottom: 0;
}
.table-responsive > .table > thead > tr > th, .table-responsive > .table > tbody > tr > th, .table-responsive > .table > tfoot > tr > th, .table-responsive > .table > thead > tr > td, .table-responsive > .table > tbody > tr > td, .table-responsive > .table > tfoot > tr > td {
    white-space: nowrap;
}

}
</style>
<?php
echo '<body class="container">
<br><br><br>
<button onclick="javascript:location.reload();" type="submit" style="right: 0px;width: 100%;padding: 10px;" class="btn btn-warning">Refresh</button>';

echo '<div class="h-100 p-4">
<br><br>
<b>M3U8 File List</b>';
$_DIR = opendir("m3u");
$_DIR2 = opendir("log");
echo '<div class="text-light">
<table class="text-light table table-striped">
<thead>
<tr>
<th>Filename</th>
<th></th>
</tr></thead><tbody>
';
while (($_DIRFILE = readdir($_DIR)) !== false){
if(!is_dir($_DIRFILE)){
echo '<tr><td><div class="kisalt">'.strip_tags($_DIRFILE).'</td>';
echo '<td><a class="btn btn-danger"  href="index.php?git=dfile&name='.strip_tags($_DIRFILE).'">Delete</a></td></tr>';
}
}
closedir($_DIR);
closedir($_DIR2);

echo '
</tbody></table></div>

<br><br><b>Private IPTV List</b>
<div class="text-light">
<table class="text-light table table-striped">
<thead>
<tr>
<th>ID</th>
<th>Type</th>
<th>Name</th>
<th>Status</th>
<th></th>
<th></th>
</tr></thead><tbody>';
$stmt2 = $db->prepare('SELECT * FROM private_iptv');
$stmt2->execute();
while($row2 = $stmt2->fetch()) {
echo '<tr><td><div class=kisalt">'.strip_tags($row2["private_id"]).'</div></td>';
echo '<td><div class="kisalt">'.strip_tags($row2["private_name"]).'</div></td>';

if(!$fp = @fopen(strip_tags($row["private_iptv"]), "r")) {
  echo '<td><img src="img/iptv.png" width="60" height="30"></td>';
  echo '<td><div class="progress">
  <a data-text="Kapalı" class="progress-bar bg-danger" role="progressbar" data-text="Online" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></a>
</div></td>';
echo '<script>console.log("'.strip_tags($row["private_iptv"]).' address not open");</script>';
} elseif(strip_tags($row["private_active"]) == "0") {
  echo '<td><img src="img/iptv.png" width="60" height="30"></td>';
  echo '<td><div class="progress kisalt">
  <a data-text="Panelden Kapalı" class="progress-bar bg-warning" role="progressbar" data-text="Online" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></a>
</div></td>';
} else {
  echo '<td><img src="img/iptv.png" width="60" height="30"></td>';
  echo '<td>
  <div class="progress">
  <a data-text="Açık" class="progress-bar bg-success" role="progressbar" data-text="Offline" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></a>
</div></td>';
fclose($fp);
}
  echo '
  <td><a class="btn btn-danger" href="index.php?git=watch&id='.strip_tags($row2["private_id"]).'">Watch</a></td>
  <td><a class="btn btn-danger" href="index.php?git=deleteprivip&id='.strip_tags($row2["private_id"]).'">Delete</a></td>';
}

echo '
</tbody></table></div>
<br><br><b>IPTV List</b>
<div class="text-light">
<table class="text-light table table-striped">
<thead>
<tr>
<th>ID</th>
<th>Type</th>
<th>Name</th>
<th>Type</th>
<th>Status</th>
<th></th>
<th></th>
</tr></thead><tbody>';
$stmt2 = $db->prepare('SELECT * FROM public_iptv');
$stmt2->execute();
while($row2 = $stmt2->fetch()) {
echo '<tr><td><div class=kisalt">'.strip_tags($row2["public_id"]).'</div></td>';
if(strip_tags($row2["video_stream"]) == "0") {
  echo '<td>Stream</td>';
} else {
  echo '<td>Video</td>';
}
echo '<td><div class="kisalt">'.strip_tags($row2["public_tslink"]).'</div></td>';

if(!$fp = @fopen(strip_tags($row["public_tslink"]), "r")) {
  echo '<td><img src="img/iptv.png" width="60" height="30"></td>';
  echo '<td><div class="progress">
  <a data-text="Kapalı" class="progress-bar bg-danger" role="progressbar" data-text="Online" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></a>
</div></td>';
echo '<script>console.log("'.strip_tags($row["iptv_adres"]).' address not open");</script>';
} elseif(strip_tags($row["public_active"]) == "0") {
  echo '<td><img src="img/iptv.png" width="60" height="30"></td>';
  echo '<td><div class="progress kisalt">
  <a data-text="Panelden Kapalı" class="progress-bar bg-warning" role="progressbar" data-text="Online" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></a>
</div></td>';
} else {
  echo '<td><img src="img/iptv.png" width="60" height="30"></td>';
  echo '<td>
  <div class="progress">
  <a data-text="Açık" class="progress-bar bg-success" role="progressbar" data-text="Offline" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></a>
</div></td>';
fclose($fp);
}

  echo '
  <td><div class="btn-group">
  <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown">
    <span class="caret"></span>
    <span class="sr-only">Toggle Dropdown</span>
	IPTV Share
  </button>
  <ul class="dropdown-menu" role="menu">
    <li><a class="dropdown-item" href="index.php?pubid='.strip_tags($row2["public_name"]).'&live='.strip_tags($row2["video_stream"]).'">Public</a></li>
    <li><a class="dropdown-item" href="index.php?pubid='.strip_tags($row2["public_name"]).'&live='.strip_tags($row2["video_stream"]).'&watchplayer=1">Watch</a></li>
    <li><a class="dropdown-item" href="index.php?pubid='.strip_tags($row2["public_name"]).'&live='.strip_tags($row2["video_stream"]).'&debug">Debug</a></li>
  </ul>
</div></td>

  <td><div class="btn-group">
  <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown">
    <span class="caret"></span>
    <span class="sr-only">Toggle Dropdown</span>
	IPTV Editor
  </button>
  <ul class="dropdown-menu" role="menu">
   <li><a class="dropdown-item" href="index.php?git=getlog&id='.intval($row2["public_id"]).'">Logs</a></li>
    <li><a class="dropdown-item" href="index.php?git=startiptv&id='.intval($row2["public_id"]).'">Start</a></li>
    <li><a class="dropdown-item" href="index.php?git=stopiptv&id='.intval($row2["public_id"]).'">Stop</a></li>
    <li><a class="dropdown-item" href="index.php?git=editpubid&id='.strip_tags($row2["public_id"]).'">Edit</a></li>
	<li><a class="dropdown-item" href="index.php?git=deletepubid&id='.strip_tags($row2["public_id"]).'">Delete</a></li>
  </ul>
</div></td>';
}
echo '</tr>
</tbody></table></div>
<br><br>';

echo '
<br><b>IPTV Config</b>
<div class="text-light">
<table class="text-light table table-striped">
<thead>
<tr>
<th>ID</th>
<th>M3U8 Config</th>
<th>TS Config</th>
<th></th>
</tr></thead><tbody>';
$stmt3 = $db->prepare('SELECT * FROM iptv_config');
$stmt3->execute();
while($row2 = $stmt3->fetch()) {
echo '<tr><td><div class=kisalt">'.intval($row2["config_id"]).'</div></td>';
echo '<td><div class="kisalt">'.strip_tags($row2["ffmpeg_m3u8cfg"]).'</div></td>';
echo '<td><div class="kisalt">'.strip_tags($row2["ffmpeg_ts"]).'</div></td>';
echo '<td><a class="btn btn-danger" href="index.php?git=editcfg&id='.intval($row2["config_id"]).'">Edit</a></td>';
}
echo '</tr>
</tbody></table></div></div></body>';
  break;
  

  case 'editcfg':
  $getir->logincheck();
  $getir->NavBar("IPTV Site");
  $stmt = $db->prepare('SELECT * FROM iptv_config WHERE config_id = :iddegeri');
  $stmt->execute(array(':iddegeri' => intval($_GET["id"])));
  if($row = $stmt->fetch()) {
	  echo '</nav><body class="container mx-auto">
  <form action="index.php?git=peditcfg" method="post">
    <div class="form-group">
      <label for="exampleFormControlInput1">Config TS</label>
	  <textarea class="form-control" name="ffmpegts" placeholder="IPTV Config(M3U8)">'.$row["ffmpeg_ts"].'</textarea>
    </div>
    <div class="form-group">
      <label for="exampleFormControlInput1">Config M3U8</label>
	  <textarea class="form-control" name="ffmpegm3u8" placeholder="IPTV Config(M3U8)">'.$row["ffmpeg_m3u8cfg"].'</textarea>
    </div>
	    <div class="form-group">
      <label for="exampleFormControlInput1">Twitter Token</label>
	  <textarea class="form-control" name="twittertoken" placeholder="Twitter Token">'.$row["twitter_tkn"].'</textarea>
    </div>
	
		<div class="form-group">
      <label for="exampleFormControlInput1">Facebook Token</label>
	  <textarea class="form-control" name="facebooktkn" placeholder="Facebook Token">'.$row["facebook_tkn"].'</textarea>
    </div>
      <input type="hidden" name="ffmpegid" value="'.intval($row["config_id"]).'" class="form-control">
    <button type="submit" style="width: 100%;" class="btn btn-primary">Guncelle</button>
  </form>
  </body>';
  }
  break;
  
  case 'peditcfg':
  $getir->logincheck();
  $getir->NavBar("IPTV Site");
  $update = $db->prepare("UPDATE iptv_config SET ffmpeg_m3u8cfg = :m3u8, ffmpeg_ts = :tsadres, twitter_tkn = :twittertkn, facebook_tkn = :facebooktkn WHERE config_id = :gonderid");
  $update->bindValue(':gonderid', intval($_POST["ffmpegid"]));
  $update->bindValue(':m3u8', strip_tags($_POST["ffmpegm3u8"]));
  $update->bindValue(':tsadres', strip_tags($_POST["ffmpegts"]));
  $update->bindValue(':twittertkn', strip_tags($_POST["twittertoken"]));
  $update->bindValue(':facebooktkn', strip_tags($_POST["twittertoken"]));
  $update->execute();
  if($update){
	 echo "<script LANGUAGE='JavaScript'>
    window.alert('Updated');
    window.location.href='index.php?git=iptv';
    </script>";
	} else {
    echo "<script LANGUAGE='JavaScript'>
    window.alert('Not Updated');
    window.location.href='index.php?git=iptv';
    </script>";
  }
  break;
  
  case 'deleteprivip':
  $getir->logincheck();
  $stmt = $db->prepare('DELETE FROM private_iptv WHERE private_id = :iddegeri');
  $stmt->execute(array(':iddegeri' => intval($_GET["id"])));
  if($row = $stmt->rowCount()) {
    echo "<script LANGUAGE='JavaScript'>
    window.alert('Succesfully Updated');
    window.location.href='index.php?git=iptv';
    </script>";
  } else {
    echo "<script LANGUAGE='JavaScript'>
    window.alert('Not Updated');
    window.location.href='index.php?git=iptv';
    </script>";
  }
  break;
  

  case 'startiptv':
  $getir->logincheck();
  $stmt = $db->prepare('SELECT * FROM public_iptv WHERE public_id = :iddegeri');
  $stmt->execute(array(':iddegeri' => intval($_GET["id"])));
  if($row = $stmt->fetch()) {
  if($row["video_stream"] == "1") {
    echo '<button onclick="javascript:history.back();" type="submit" style="right: 0px;width: 100%;padding: 10px;" class="btn btn-warning">Back</button>
    <br>';
	if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
	$getir->StartTSStreamWin(strip_tags($row["public_name"]), strip_tags($row["public_tslink"]), strip_tags($row["public_tslink"]), $configts);
	} else {
    $getir->StartTSStream(strip_tags($row["public_name"]), strip_tags($row["public_tslink"]), strip_tags($row["public_tslink"]), $configts);
	}
  } else {
    echo '<button onclick="javascript:history.back();" type="submit" style="right: 0px;width: 100%;padding: 10px;" class="btn btn-warning">Back</button>
    <br>';
	if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
	$getir->StartM3U8StreamWin(strip_tags($row["public_name"]), strip_tags($row["public_tslink"]), strip_tags($row["public_tslink"]), $configm3u8);
	} else {
    $getir->StartM3U8Stream(strip_tags($row["public_name"]), strip_tags($row["public_tslink"]), strip_tags($row["public_tslink"]), $configm3u8);
	}
  }
}
  break;
  
   case 'startfacebook':
  $getir->logincheck();
  $stmt = $db->prepare('SELECT * FROM public_iptv WHERE public_id = :iddegeri');
  $stmt->execute(array(':iddegeri' => intval($_GET["id"])));
  if($row = $stmt->fetch()) {
  if($row["video_stream"] == "1") {
    echo '<button onclick="javascript:history.back();" type="submit" style="right: 0px;width: 100%;padding: 10px;" class="btn btn-warning">Back</button>
    <br>';
	if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
	$getir->StartTSStreamWin(strip_tags($row["public_name"]), strip_tags($row["public_tslink"]), strip_tags($row["public_tslink"]));
	} else {
	$getir->StartFaceookStreamLinux($pubname, $tslinks, $url, $config, $token);
    $getir->StartTSStream(strip_tags($row["public_name"]), strip_tags($row["public_tslink"]), strip_tags($row["public_tslink"]));
	}
  } else {
    echo '<button onclick="javascript:history.back();" type="submit" style="right: 0px;width: 100%;padding: 10px;" class="btn btn-warning">Back</button>
    <br>';
	if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
	$getir->StartM3U8StreamWin(strip_tags($row["public_name"]), strip_tags($row["public_tslink"]), strip_tags($row["public_tslink"]));
	} else {
    $getir->StartM3U8Stream(strip_tags($row["public_name"]), strip_tags($row["public_tslink"]), strip_tags($row["public_tslink"]));
	}
  }
}
  break;

  case 'getlog':
  echo '<script>
  function timedRefresh(timeoutPeriod) {
	setTimeout("location.reload(true);",timeoutPeriod);
	}
	window.onload = timedRefresh(5000);
</script>';
  $getir->logincheck();
  $stmt = $db->prepare('SELECT * FROM public_iptv WHERE public_id = :iddegeri');
  $stmt->execute(array(':iddegeri' => intval($_GET["id"])));
  if($row = $stmt->fetch()) {
  if($row["video_stream"] == "1") {
    echo '<button onclick="javascript:history.back();" type="submit" style="right: 0px;width: 100%;padding: 10px;" class="btn btn-warning">Back</button>
    <br><br>';
	$getlog = shell_exec('cat '.dirname(__FILE__).'/log/'.strip_tags($row["public_name"]).'-mylog.log');
	echo '<textarea style="width:100%;height:100%" class="container form-control">'.strip_tags($getlog).'</textarea>';
  } else {
	echo '<button onclick="javascript:history.back();" type="submit" style="right: 0px;width: 100%;padding: 10px;" class="btn btn-warning">Back</button>
	<br><br>';
	$getlog = shell_exec('cat '.dirname(__FILE__).'/log/'.strip_tags($row["public_name"]).'-mylog.log');
	echo '<textarea style="width:100%;height:100%" class="container form-control">'.strip_tags($getlog).'</textarea>';
  }
}
  break;
  
  case 'stopiptv':
  $getir->logincheck();
  $stmt = $db->prepare('SELECT * FROM public_iptv WHERE public_id = :iddegeri');
  $stmt->execute(array(':iddegeri' => intval($_GET["id"])));
  if($row = $stmt->fetch()) {
  if($row["video_stream"] == "1") {
    echo '<button onclick="javascript:history.back();" type="submit" style="right: 0px;width: 100%;padding: 10px;" class="btn btn-warning">Back</button>
    <br>';
	unlink('log/'.strip_tags($row["public_name"]).'-mylog.log');
    $getir->StopFFMPEG();
    } else {
    echo '<button onclick="javascript:history.back();" type="submit" style="right: 0px;width: 100%;padding: 10px;" class="btn btn-warning">Back</button>
    <br>';
	unlink('log/'.strip_tags($row["public_name"]).'-mylog.log');
    $getir->StopFFMPEG();
  }
}
  break;

  case 'editpubid':
  $getir->logincheck();
  $getir->NavBar("IPTV Site");
  echo '<div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">';

  echo '<li class="nav-item active">
  <a class="nav-link" href="index.php?git=iptv">Home <span class="sr-only">(current)</span></a>
  </li>';

  echo '<li class="nav-item dropdown">
  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
  Aktiviteler
  </a>';

  echo '<div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="index.php?git=iptv">IPTV Status</a>
            <a class="dropdown-item" href="index.php?git=m3ugenerate">M3U8 Generator</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="index.php?git=addban">Add Ban IP</a>
            <a class="dropdown-item" href="index.php?git=ipblock">IP Block</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="index.php?git=startstream">Add IPTV</a>
			<a class="dropdown-item" href="index.php?git=addpriviptv">Add Private IPTV</a>
            <a class="dropdown-item" href="index.php?git=stopiptv">Stop All Stream</a>
            <div class="dropdown-divider"></div>
            
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="index.php?git=iptv&phpinfo=1">PHP Info</a>
          </div>
        </li>';

  echo '<li class="nav-item text-nowrap" align="right">
  <a class="nav-link" href="index.php?git=cikis">Log Out</a>
  </li>';

  echo '</ul></div></nav>';
  $stmt = $db->prepare('SELECT * FROM public_iptv WHERE public_id = :iddegeri');
  $stmt->execute(array(':iddegeri' => intval($_GET["id"])));
  if($row = $stmt->fetch()) {
  echo '<body class="container mx-auto">
  <form action="index.php?git=peditpubid" method="post">
    <div class="form-group">
      <label for="exampleFormControlInput1">IPTV Name</label>
      <input type="text" name="iptvname" value="'.strip_tags($row["public_name"]).'" class="form-control" placeholder="IPTV Name">
    </div>
		  <div class="form-group">
    <label for="exampleFormControlSelect1">IPTV Type | '.strip_tags($row["video_stream"]).'</label>
    <select class="form-control" name="iptvstrorvid" id="exampleFormControlSelect1">
      <option value="0">Stream</option>
      <option value="1">Video</option>
    </select>
  </div>
  
  		  <div class="form-group">
    <label for="exampleFormControlSelect1">IPTV Status | '.strip_tags($row["public_active"]).'</label>
    <select class="form-control" name="iptvclsopn" id="exampleFormControlSelect1">
      <option value="0">Close</option>
      <option value="1">Open</option>
    </select>
  </div>

    <div class="form-group">
      <label for="exampleFormControlInput1">IPTV Link</label>
      <input type="text" name="iptvlink" value="'.strip_tags($row["public_tslink"]).'" class="form-control" placeholder="IPTV Link">
    </div>
      <input type="hidden" name="iptvid" value="'.strip_tags($row["public_id"]).'" class="form-control">
    <button type="submit" style="width: 100%;" class="btn btn-primary">Guncelle</button>
  </form>
  </body>';
}
  break;

  case 'peditpubid':
  $getir->logincheck();
  $update = $db->prepare("UPDATE public_iptv SET public_name = :iptvadi, video_stream = :iptvtype, public_active = :iptvactive, public_tslink = :iptvlink WHERE public_id = :iptvid");
  $update->bindValue(':iptvid',  intval($_POST["iptvid"]));

  $update->bindValue(':iptvadi', strip_tags($_POST["iptvname"]));
  $update->bindValue(':iptvtype', strip_tags($_POST["iptvstrorvid"]));
  $update->bindValue(':iptvactive', strip_tags($_POST["iptvclsopn"]));
  $update->bindValue(':iptvlink', strip_tags($_POST["iptvlink"]));
  $update->execute();
  if($row = $update->rowCount()) {
    echo "<script LANGUAGE='JavaScript'>
    window.alert('Succesfully Updated');
    window.location.href='index.php?git=iptv';
    </script>";
  } else {
    echo "<script LANGUAGE='JavaScript'>
    window.alert('Unsuccesfully Updated');
    window.location.href='index.php?git=iptv';
    </script>";
  }
  break;

  case 'deletepubid':
  $getir->logincheck();
  $stmt = $db->prepare('DELETE FROM public_iptv WHERE public_id = :iddegeri');
  $stmt->execute(array(':iddegeri' => intval($_GET["id"])));
  if($row = $stmt->rowCount()) {
	  if($row["video_stream"] == "0") {
	$dosyaadi = "".dirname(__FILE__)."/m3u/".base64_decode(strip_tags($row["public_name"])).".m3u8";
	  } else {
	$dosyaadi = "".dirname(__FILE__)."/m3u/".base64_decode(strip_tags($row["public_name"])).".ts";
	  }
if (!unlink($dosyaadi)) {
    echo "<script LANGUAGE='JavaScript'>
    window.alert('".strip_tags($dosyaadi)." File Unsuccesfully Deleted');
    window.location.href='index.php?git=iptv';
    </script>";
  } else {
  }
  
    echo "<script LANGUAGE='JavaScript'>
    window.alert('Succesfully Updated');
    window.location.href='index.php?git=iptv';
    </script>";
  } else {
    echo "<script LANGUAGE='JavaScript'>
    window.alert('Not Updated');
    window.location.href='index.php?git=iptv';
    </script>";
  }
  break;
  
  case 'dfile':
  $getir->logincheck();
  $dosyaadi = "".dirname(__FILE__)."/m3u/".strip_tags($_GET["name"])."";
  if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
  if (!unlink($dosyaadi)) {
    echo "<script LANGUAGE='JavaScript'>
    window.alert('".strip_tags($_GET["name"])." Unsuccesfully Deleted');
    window.location.href='index.php?git=iptv';
    </script>";
  } else {
    echo "<script LANGUAGE='JavaScript'>
    window.alert('".strip_tags($_GET["name"])." Succesfully Deleted');
    window.location.href='index.php?git=iptv';
    </script>";
  }
  } else {
    if (!unlink($dosyaadi)) {
    echo "<script LANGUAGE='JavaScript'>
    window.alert('".strip_tags($_GET["name"])." Unsuccesfully Deleted');
    window.location.href='index.php?git=iptv';
    </script>";
  } else {
    echo "<script LANGUAGE='JavaScript'>
    window.alert('".strip_tags($_GET["name"])." Succesfully Deleted');
    window.location.href='index.php?git=iptv';
    </script>";
  }
  }
  break;


  case 'watch':
  $getir->logincheck();
  $getir->NavBar("IPTV Site");
  echo '
    <link href="https://unpkg.com/video.js/dist/video-js.css" rel="stylesheet">
    <script src="https://unpkg.com/video.js/dist/video.js"></script>
    <script src="https://unpkg.com/videojs-flash/dist/videojs-flash.js"></script>
    <script src="https://unpkg.com/videojs-contrib-hls/dist/videojs-contrib-hls.js"></script>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">';

  echo '<li class="nav-item active">
  <a class="nav-link" href="index.php?git=iptv">Home <span class="sr-only">(current)</span></a>
  </li>';

  echo '<li class="nav-item dropdown">
  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
  Aktiviteler
  </a>';

  echo '<div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="index.php?git=iptv">IPTV Status</a>
            
            <a class="dropdown-item" href="index.php?git=m3ugenerate">M3U8 Generator</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="index.php?git=addban">Add Ban IP</a>
            <a class="dropdown-item" href="index.php?git=ipblock">IP Block</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="index.php?git=startstream">Add IPTV</a>
			<a class="dropdown-item" href="index.php?git=addpriviptv">Add Private IPTV</a>
            <a class="dropdown-item" href="index.php?git=stopiptv">Stop All Stream</a>
            <div class="dropdown-divider"></div>
            
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="index.php?git=iptv&phpinfo=1">PHP Info</a>
          </div>
        </li>';

  echo '<li class="nav-item text-nowrap" align="right">
  <a class="nav-link" href="index.php?git=cikis">Log Out</a>
  </li>';

  echo '</ul></div></nav>
  <div class="">';
  $stmt = $db->prepare('SELECT * FROM private_iptv WHERE private_id = :iddegeri');
  $stmt->execute(array(':iddegeri' => intval($_GET["id"])));
  while($row = $stmt->fetch()) {
    if(strip_tags($row["private_active"]) == "0") {
      echo '<div class="alert alert-warning" role="alert">This channel suspended by admin!</div>';
    } else {
      echo '<div class="alert alert-success" role="alert">This channel is online!</div>';
    }
if(!$fp = @fopen(strip_tags($row["private_iptv"]), "r")) {
  echo '<body class="container mx-auto">
  <div class="alert alert-danger" role="alert">This channel is not running!</div>
  </body>';
} else {
  echo '<body class="container mx-auto">
    <video id="example-video" class="video-js vjs-default-skin" controls>
    <source src="'.strip_tags($row["private_iptv"]).'" type="application/x-mpegURL"></video>
  <script>
  var player = videojs("example-video");
  player.play();
  </script>
  </div>
  </body>';
}
if (!$fp = fopen(strip_tags($row["private_iptv"]), 'r')) {
echo '<script>console.log("'.strip_tags($row["private_iptv"]).' address not open");</script>';
}
$meta = stream_get_meta_data($fp);
$json = array_values($meta);
$json2 = json_encode($meta, true);
$data = json_decode($json2);
echo '
<br>
<div class="card bg-light">
<code>
<b>Coding Info</b><br>
Wrapper Type : '.$data->wrapper_type.'<br>
Stream Type : '.$data->stream_type.'<br>
URI : '.$data->uri.'<br><br><br>
<b>JSON Data Query</b><br>
'.$json2.'<br>
</code>
<br><br><br>

</div>';
fclose($fp);
}
  break;

  case 'deleteiptv':
  $getir->logincheck();
  $stmt = $db->prepare('DELETE FROM iptv_list WHERE iptv_id = :iddegeri');
  $stmt->execute(array(':iddegeri' => intval($_GET["id"])));
  if($row = $stmt->rowCount()) {
    echo "<script LANGUAGE='JavaScript'>
    window.alert('Succesfully Updated');
    window.location.href='index.php?git=iptv';
    </script>";
    $data = "m3u/".strip_tags($row["iptv_adi"]).".m3u8";
    unlink($data);
  } else {
    echo "<script LANGUAGE='JavaScript'>
    window.alert('Not Updated');
    window.location.href='index.php?git=iptv';
    </script>";
  }
  break;


  case 'editiptv':
  $getir->NavBar("IPTV Site");
  echo '<div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">';

  echo '<li class="nav-item active">
  <a class="nav-link" href="index.php?git=iptv">Home <span class="sr-only">(current)</span></a>
  </li>';

  echo '<li class="nav-item dropdown">
  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
  Aktiviteler
  </a>';

  echo '<div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="index.php?git=iptv">IPTV Status</a>
            
            <a class="dropdown-item" href="index.php?git=m3ugenerate">M3U8 Generator</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="index.php?git=addban">Add Ban IP</a>
            <a class="dropdown-item" href="index.php?git=ipblock">IP Block</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="index.php?git=startstream">Add IPTV</a>
			<a class="dropdown-item" href="index.php?git=addpriviptv">Add Private IPTV</a>
            <a class="dropdown-item" href="index.php?git=stopiptv">Stop All Stream</a>
            <div class="dropdown-divider"></div>
            
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="index.php?git=iptv&phpinfo=1">PHP Info</a>
          </div>
        </li>';

  echo '<li class="nav-item text-nowrap" align="right">
  <a class="nav-link" href="index.php?git=cikis">Log Out</a>
  </li>';

  echo '</ul></div></nav>';
  $stmt = $db->prepare('SELECT * FROM iptv_list WHERE iptv_id = :iddegeri');
  $stmt->execute(array(':iddegeri' => intval($_GET["id"])));
  if($row = $stmt->fetch()) {
  echo '<body class="container mx-auto">
  <form action="index.php?git=pupdateiptv" method="post">
    <div class="form-group">
      <label for="exampleFormControlInput1">IPTV Adı</label>
      <input type="text" name="iptvname" value="'.strip_tags($row["iptv_adi"]).'" class="form-control" placeholder="IPTV Name">
    </div>
    <div class="form-group">
      <label for="exampleFormControlInput1">IPTV Resmi</label>
      <input type="text" name="iptvpic" value="'.strip_tags($row["iptv_pic"]).'" class="form-control" placeholder="IPTV Picture">
    </div>
    <div class="form-group">
      <label for="exampleFormControlInput1">IPTV Adresi</label>
      <input type="text" name="iptvadres" value="'.strip_tags($row["iptv_adres"]).'" class="form-control" placeholder="IPTV URL">
    </div>
    <div class="form-group">
      <label for="exampleFormControlInput1">IPTV Stream</label>
      <input type="text" name="iptvstr" value="'.strip_tags($row["iptv_acik"]).'" class="form-control" placeholder="IPTV (1 = ON / 0 = OFF)">
    </div>
      <input type="hidden" name="iptvid" value="'.strip_tags($_GET["id"]).'" class="form-control">
    <button type="submit" style="width: 100%;" class="btn btn-primary">Guncelle</button>
  </form>
  </body>';
}
  break;

  case 'pupdateiptv':
  $getir->logincheck();
  $update = $db->prepare("UPDATE iptv_list SET iptv_adi = :iptvadi, iptv_pic = :iptvpic, iptv_adres = :iptvadres, iptv_acik = :iptvacik WHERE iptv_id = :iptvid");
  $update->bindValue(':iptvid',  intval($_POST["iptvid"]));
  $update->bindValue(':iptvadi', strip_tags($_POST["iptvname"]));
  $update->bindValue(':iptvadres', strip_tags($_POST["iptvadres"]));
  $update->bindValue(':iptvpic', strip_tags($_POST["iptvpic"]));
  $update->bindValue(':iptvacik', strip_tags($_POST["iptvstr"]));
  $update->execute();
  if($row = $update->rowCount()) {
    echo "<script LANGUAGE='JavaScript'>
    window.alert('Succesfully Updated');
    window.location.href='index.php?git=iptv';
    </script>";
  } else {
    echo "<script LANGUAGE='JavaScript'>
    window.alert('Unsuccesfully Updated');
    window.location.href='index.php?git=iptv';
    </script>";
  }
  break;

  case 'm3ugenerate':
  $getir->logincheck();
  $getir->NavBar("IPTV Site");
  echo '<div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">';

  echo '<li class="nav-item active">
  <a class="nav-link" href="index.php?git=iptv">Home <span class="sr-only">(current)</span></a>
  </li>';

  echo '<li class="nav-item dropdown">
  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
  Aktiviteler
  </a>';

  echo '<div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="index.php?git=iptv">IPTV Status</a>
            
            <a class="dropdown-item" href="index.php?git=m3ugenerate">M3U8 Generator</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="index.php?git=addban">Add Ban IP</a>
            <a class="dropdown-item" href="index.php?git=ipblock">IP Block</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="index.php?git=startstream">Add IPTV</a>
			<a class="dropdown-item" href="index.php?git=addpriviptv">Add Private IPTV</a>
            <a class="dropdown-item" href="index.php?git=stopiptv">Stop All Stream</a>
            <div class="dropdown-divider"></div>
            
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="index.php?git=iptv&phpinfo=1">PHP Info</a>
          </div>
        </li>';

  echo '<li class="nav-item text-nowrap" align="right">
  <a class="nav-link" href="index.php?git=cikis">Log Out</a>
  </li>';

  echo '</ul></div></nav>';
  if(empty($_GET["s"])) {

  } else {
    echo '<div class="alert alert-info" role="alert">File Location : <a href="http://'.$_SERVER['SERVER_NAME'].'/iptv/'.strip_tags(base64_decode($_GET["s"])).'">http://'.$_SERVER['SERVER_NAME'].'/iptv/'.strip_tags(base64_decode($_GET["s"])).'</a></div>';
  }
  echo '<body class="container mx-auto">
  <form action="index.php?git=pm3ugenerate" method="post">
    <div class="form-group">
      <label for="exampleFormControlInput1">IPTV Dosya Adı</label>
      <input type="text" name="iptvfln" class="form-control" placeholder="Filename">
    </div>
    <div class="form-group">
    <label for="exampleFormControlTextarea1">IPTV Adresi</label>
    <input type="text" name="iptvname" class="form-control" placeholder="IPTV Adresi">
    </div>
    <div class="form-group">
    <label for="exampleFormControlTextarea1">IPTV Resmi</label>
    <input type="text" name="iptvpic" class="form-control" placeholder="IPTV Picture">
    </div>
    <button type="submit" style="width: 100%;" class="btn btn-primary">Ekle</button>
  </form>
  </body>';
  break;

  case 'pm3ugenerate':
  $getir->logincheck();
  $data = "m3u/".strip_tags($_POST["iptvfln"]).".m3u8";
  $fp = fopen($data, 'w');
  fwrite($fp, "#EXTM3U\n");
  fwrite($fp, "#EXTINF:-1,".strip_tags($_POST["iptvfln"])."\n");
  fwrite($fp, strip_tags($_POST["iptvname"]));
  fclose($fp);
  $update = $db->prepare("INSERT INTO iptv_list(iptv_adi, iptv_pic, iptv_adres, iptv_acik) VALUES (:iptvadi, :iptvpic, :iptvadres, :iptvacik) ");
  $update->bindValue(':iptvadi', strip_tags($_POST["iptvfln"]));
  $update->bindValue(':iptvadres', "http://".strip_tags($_SERVER['SERVER_NAME'])."/".strip_tags($data)."");
  $update->bindValue(':iptvpic',  strip_tags($_POST["iptvpic"]));
  $update->bindValue(':iptvacik', "1");
  $update->execute();
  if($row = $update->rowCount()) {
    echo "<script LANGUAGE='JavaScript'>
    window.alert('Succesfully Updated');
    window.location.href='index.php?git=m3ugenerate&s=".strip_tags(base64_encode($data))."';
    </script>";
  } else {
    echo "<script LANGUAGE='JavaScript'>
    window.alert('Unsuccesfully Updated');
    window.location.href='index.php?git=m3ugenerate';
    </script>";
    unlink($data);
  }
  break;

  case 'ipblock':
  $getir->logincheck();
  $getir->NavBar("IPTV Site");
  echo '<div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">';

  echo '<li class="nav-item active">
  <a class="nav-link" href="index.php?git=iptv">Home <span class="sr-only">(current)</span></a>
  </li>';

  echo '<li class="nav-item dropdown">
  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
  Aktiviteler
  </a>';

  echo '<div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="index.php?git=iptv">IPTV Status</a>
            
            <a class="dropdown-item" href="index.php?git=m3ugenerate">M3U8 Generator</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="index.php?git=addban">Add Ban IP</a>
            <a class="dropdown-item" href="index.php?git=ipblock">IP Block</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="index.php?git=startstream">Add IPTV</a>
			<a class="dropdown-item" href="index.php?git=addpriviptv">Add Private IPTV</a>
            <a class="dropdown-item" href="index.php?git=stopiptv">Stop All Stream</a>
            <div class="dropdown-divider"></div>
            
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="index.php?git=iptv&phpinfo=1">PHP Info</a>
          </div>
        </li>';

  echo '<li class="nav-item text-nowrap" align="right">
  <a class="nav-link" href="index.php?git=cikis">Log Out</a>
  </li>';
  echo '</ul></div></nav>';
  echo '<body class="container mx-auto">';
  echo '<button onclick="javascript:location.reload();" type="submit" style="right: 0px;width: 100%;padding: 10px;" class="btn btn-warning">Refresh</button>
  <br><b>Your IP Address : '.strip_tags($getir->getIPAddress()).'
  <br><body class="container mx-auto">
  <br><b>Channel List</b>
  <table class="table">
  <thead>
  <tr>
  <th>ID</th>
  <th>Ülke</th>
  <th>Durum</th>
  <th>Reason</th>
  <th>IP Adresi</th>
  <th></th>
  </tr></head><tbody>';
  $sayfa = intval($_GET['page']);
  $sayfa_limiti  = 10;
  if($sayfa == '' || $sayfa == 1){
   $sayfa1 = 0;
  }else{
   $sayfa1 = ($sayfa * $sayfa_limiti) - $sayfa_limiti;
  }
  $satir_sayisi = $db->query("SELECT * FROM ip_block WHERE 1")->rowCount();
  $sql = "SELECT * FROM iptv_list LIMIT " . $sayfa1 . "," . $sayfa_limiti;
  $query = $db->prepare($sql);
  $query->execute();
  $stmt = $db->prepare('SELECT * FROM ip_block LIMIT '.$sayfa1.','.$sayfa_limiti);
  $stmt->execute();
  while($row = $stmt->fetch()) {
    $getirtr = file_get_contents("http://api.wipmania.com/".strip_tags($row["ip_adress"])."");
  echo '<tr>
  <th scope="row">'.intval($row["ip_id"]).'</th>';
  if(strip_tags($row["ip_block_active"]) == "0") {
    if (!$getirtr)
    {
      echo '<td><img src="img/loc/xx.png" width="24" height="24"></td>';
    } else {
      $location = "img/loc/".strip_tags(mb_strtolower($getirtr)).".png";
      echo '<td><img src="'.strip_tags($location).'" width="25" height="15"></td>';
    }
    echo '<td><div class="progress kisalt">
    <a data-text="Panelden Kapalı" class="progress-bar bg-warning" role="progressbar" data-text="Online" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></a>
  </div></td>';
    echo '<td>'.strip_tags("No Reason").'</td>';
  echo '<td>'.strip_tags($row["ip_adress"]).'</td>
  <td><a href="index.php?git=remipblok&ip='.intval($row["ip_id"]).'">Ban</a></td>
  </tr>';
  } else {
    if (!$getirtr)
    {
      echo '<td><img src="img/loc/xx.png" width="24" height="24"></td>';
    } else {
      $location = "img/loc/".strip_tags(mb_strtolower($getirtr)).".png";
      echo '<td><img src="'.strip_tags($location).'" width="25" height="15"></td>';
    }
    echo '<td>
    <div class="progress">
    <a data-text="Açık" class="progress-bar bg-success" role="progressbar" data-text="Offline" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></a>
  </div></td>';
    echo '<td>'.strip_tags($row["ban_reason"]).'</td>';
  echo '<td>'.strip_tags($row["ip_adress"]).'</td>
  <td><a href="index.php?git=banip&ip='.intval($row["ip_id"]).'">Remove Ban</a></td>
  </tr>';
  }
  foreach($row as $row2){
  }
  $a = ceil($satir_sayisi / $sayfa_limiti);
  }
  echo '</tbody></table>';
  echo '<nav class="bg-dark text-white" aria-label="Page navigation example">
  <ul class="pagination justify-content-center">';
  for($b = 1 ; $b <= $a ; $b++){
  echo '<li class="page-item"><a class="page-link" href="index.php?git=ipblock&ip='.$b.'">'.$b.'</a></li>';
  }
  echo '</ul></nav></body>';
  break;

  case 'remipblok';
  $getir->logincheck();
  $update = $db->prepare("UPDATE ip_block SET ip_block_active = :iptvdrm WHERE ip_id = :iptvid");
  $update->bindValue(':iptvid', intval($_GET["ip"]));
  $update->bindValue(':iptvdrm', "1");
  $update->execute();
  if($row = $update->rowCount()) {
    echo "<script LANGUAGE='JavaScript'>
    window.alert('Succesfully Updated');
    window.location.href='index.php?git=ipblock';
    </script>";
  } else {
    echo "<script LANGUAGE='JavaScript'>
    window.alert('Unsuccesfully Updated');
    window.location.href='index.php?git=ipblock';
    </script>";
  }
  break;

  case 'banip';
  $getir->logincheck();
  $update = $db->prepare("UPDATE ip_block SET ip_block_active = :iptvdrm WHERE ip_id = :iptvid");
  $update->bindValue(':iptvid', intval($_GET["ip"]));
  $update->bindValue(':iptvdrm', "0");
  $update->execute();
  if($row = $update->rowCount()) {
    echo "<script LANGUAGE='JavaScript'>
    window.alert('Succesfully Updated');
    window.location.href='index.php?git=ipblock';
    </script>";
  } else {
    echo "<script LANGUAGE='JavaScript'>
    window.alert('Unsuccesfully Updated');
    window.location.href='index.php?git=ipblock';
    </script>";
  }
  break;

  case 'addban':
  $getir->logincheck();
  $getir->NavBar("IPTV Site");
  echo '<div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">';

  echo '<li class="nav-item active">
  <a class="nav-link" href="index.php?git=iptv">Home <span class="sr-only">(current)</span></a>
  </li>';

  echo '<li class="nav-item dropdown">
  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
  Aktiviteler
  </a>';

  echo '<div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="index.php?git=iptv">IPTV Status</a>
            
            <a class="dropdown-item" href="index.php?git=m3ugenerate">M3U8 Generator</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="index.php?git=addban">Add Ban IP</a>
            <a class="dropdown-item" href="index.php?git=ipblock">IP Block</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="index.php?git=startstream">Add IPTV</a>
			<a class="dropdown-item" href="index.php?git=addpriviptv">Add Private IPTV</a>
            <a class="dropdown-item" href="index.php?git=stopiptv">Stop All Stream</a>
            <div class="dropdown-divider"></div>
            
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="index.php?git=iptv&phpinfo=1">PHP Info</a>
          </div>
        </li>';

  echo '<li class="nav-item text-nowrap" align="right">
  <a class="nav-link" href="index.php?git=cikis">Log Out</a>
  </li>';

  echo '</ul></div></nav>';
  echo '<body class="container mx-auto">
  <b>Your IP : '.strip_tags($getir->getIPAddress()).'</b><br>
  <form action="index.php?git=paddban" method="post">
    <div class="form-group">
      <label for="exampleFormControlInput1">IP Adress</label>
      <input type="text" name="ipadres" class="form-control" placeholder="IP Adress">
    </div>
    <div class="form-group">
      <label for="exampleFormControlInput1">Reason</label>
      <input type="text" name="resn" class="form-control" placeholder="Your IP '.strip_tags($getir->getIPAddress()).'">
    </div>
    <button type="submit" style="width: 100%;" class="btn btn-primary">Add</button>
  </form>
  </body>';
  break;

  case 'startstream':
  $getir->logincheck();
  $getir->NavBar("IPTV Site");
  echo '<div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">';

  echo '<li class="nav-item active">
  <a class="nav-link" href="index.php?git=iptv">Home <span class="sr-only">(current)</span></a>
  </li>';

  echo '<li class="nav-item dropdown">
  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
  Aktiviteler
  </a>';

  echo '<div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="index.php?git=iptv">IPTV Status</a>
            
            <a class="dropdown-item" href="index.php?git=m3ugenerate">M3U8 Generator</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="index.php?git=addban">Add Ban IP</a>
            <a class="dropdown-item" href="index.php?git=ipblock">IP Block</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="index.php?git=startstream">Add IPTV</a>
			<a class="dropdown-item" href="index.php?git=addpriviptv">Add Private IPTV</a>
            <a class="dropdown-item" href="index.php?git=stopiptv">Stop All Stream</a>
            <div class="dropdown-divider"></div>
            
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="index.php?git=iptv&phpinfo=1">PHP Info</a>
          </div>
        </li>';

  echo '<li class="nav-item text-nowrap" align="right">
  <a class="nav-link" href="index.php?git=cikis">Log Out</a>
  </li>';

  echo '</ul></div></nav>';
  echo '<body class="container mx-auto">
  <b>Your IP : '.strip_tags($getir->getIPAddress()).'</b><br>
  <form action="index.php?git=pstartstream" method="post">
    <div class="form-group">
      <label for="exampleFormControlInput1">Stream Link</label>
      <input type="text" name="streamlink" class="form-control" placeholder="M3U8 Link">
    </div>
	  <div class="form-group">
    <label for="exampleFormControlSelect1">Type</label>
    <select class="form-control" name="streamorvid" id="exampleFormControlSelect1">
      <option value="0">Stream</option>
      <option value="1">Video</option>
    </select>
  </div>
    <button type="submit" style="width: 100%;" class="btn btn-primary">Add</button>
  </form>
  </body>';
  break;
  
  case 'addpriviptv':
  $getir->logincheck();
  $getir->NavBar("IPTV Site");
  echo '<div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">';

  echo '<li class="nav-item active">
  <a class="nav-link" href="index.php?git=iptv">Home <span class="sr-only">(current)</span></a>
  </li>';

  echo '<li class="nav-item dropdown">
  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
  Aktiviteler
  </a>';

  echo '<div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="index.php?git=iptv">IPTV Status</a>
            
            <a class="dropdown-item" href="index.php?git=m3ugenerate">M3U8 Generator</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="index.php?git=addban">Add Ban IP</a>
            <a class="dropdown-item" href="index.php?git=ipblock">IP Block</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="index.php?git=startstream">Add IPTV</a>
			<a class="dropdown-item" href="index.php?git=addpriviptv">Add Private IPTV</a>
            <a class="dropdown-item" href="index.php?git=stopiptv">Stop All Stream</a>
            <div class="dropdown-divider"></div>
            
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="index.php?git=iptv&phpinfo=1">PHP Info</a>
          </div>
        </li>';

  echo '<li class="nav-item text-nowrap" align="right">
  <a class="nav-link" href="index.php?git=cikis">Log Out</a>
  </li>';

  echo '</ul></div></nav>';
  echo '<body class="container mx-auto">
  <b>Private Stream IPTV</b>
  <hr></hr>
  <form action="index.php?git=paddpriviptv" method="post">
    <div class="form-group">
      <label for="exampleFormControlInput1">Private Name</label>
      <input type="text" name="privname" class="form-control" placeholder="Private Name">
    </div>
    <div class="form-group">
      <label for="exampleFormControlInput1">Private Picture</label>
      <input type="text" name="privpics" class="form-control" placeholder="Private Picture">
    </div>
	    <div class="form-group">
      <label for="exampleFormControlInput1">Private IPTV</label>
      <input type="text" name="priviptv" class="form-control" placeholder="Private IPTV">
    </div>
    <button type="submit" style="width: 100%;" class="btn btn-primary">Add</button>
  </form>
  </body>';
  break;
  
  case 'paddpriviptv':
  $getir->logincheck();
  $update = $db->prepare("INSERT INTO private_iptv(private_name, private_resim, private_iptv, private_active) VALUES (:streamname, :streampics, :streamiptv, :streamactive)");
  $update->bindValue(':streamname', strip_tags($_POST["privname"]));
  $update->bindValue(':streampics', strip_tags($_POST["privpics"]));
  $update->bindValue(':streamiptv', strip_tags($_POST["priviptv"]));
  $update->bindValue(':streamactive', "1");
  $update->execute();
  if($row = $update->rowCount()) {
    echo "<script LANGUAGE='JavaScript'>
    window.alert('Succesfully Added');
    window.location.href='index.php?git=startstream';
    </script>";
  } else {
    echo "<script LANGUAGE='JavaScript'>
    window.alert('Unsuccesfully Added');
    window.location.href='index.php?git=startstream';
    </script>";
  }
  break;
  
  case 'pstartstream':
  $getir->logincheck();
  $getdata = strip_tags(md5(rand(1000,9999)));
  $update = $db->prepare("INSERT INTO public_iptv(public_name, public_tslink, public_active, video_stream) VALUES (:streamname, :streamadress, :streamactive, :streamorvideo)");
  $update->bindValue(':streamname', $getdata);
  $update->bindValue(':streamadress', strip_tags($_POST["streamlink"]));
  $update->bindValue(':streamactive', "1");
  $update->bindValue(':streamorvideo',  strip_tags($_POST["streamorvid"]));
  $update->execute();
  if($row = $update->rowCount()) {
    echo "<script LANGUAGE='JavaScript'>
    window.alert('Succesfully Added');
    window.location.href='index.php?git=startstream';
    </script>";
  } else {
    echo "<script LANGUAGE='JavaScript'>
    window.alert('Unsuccesfully Added');
    window.location.href='index.php?git=startstream';
    </script>";
  }
  break;

  case 'paddban':
  $getir->logincheck();
  $update = $db->prepare("INSERT INTO ip_block(ip_adress, ban_reason, ip_block_active) VALUES (:ipadress, :resns, :acceptban)");
  $update->bindValue(':ipadress', strip_tags($_POST["ipadres"]));
  $update->bindValue(':resns', strip_tags($_POST["resn"]));
  $update->bindValue(':acceptban', "1");
  $update->execute();
  if($row = $update->rowCount()) {
    echo "<script LANGUAGE='JavaScript'>
    window.alert('Succesfully Added');
    window.location.href='index.php?git=ipblock';
    </script>";
  } else {
    echo "<script LANGUAGE='JavaScript'>
    window.alert('Unsuccesfully Added');
    window.location.href='index.php?git=ipblock';
    </script>";
  }
  break;

  case 'cikis':
  $getir->logincheck();
  die('<script>document.cookie = "user_id= ; expires = Thu, 01 Jan 1970 00:00:00 GMT"
  document.cookie = "capt= ; expires = Thu, 01 Jan 1970 00:00:00 GMT"
  location.replace("index.php")</script>');
  break;
}
?>
