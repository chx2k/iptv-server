<?php
error_reporting(0);
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

public function extControl($name) {
  if (!extension_loaded(''.strip_tags($name).'')) {
    die('The '.strip_tags($name).' extension is not loaded.');
}
}

public function funcControl($name) {
  if (!function_exists(''.strip_tags($name).'')) {
    die('The '.strip_tags($name).' function is not loaded.');
}
}

public function getIPAddress() {
$client  = @$_SERVER['HTTP_CLIENT_IP'];
$forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
$remote  = $_SERVER['REMOTE_ADDR'];

if(filter_var($client, FILTER_VALIDATE_IP))
{
    $ip = $client;
}
elseif(filter_var($forward, FILTER_VALIDATE_IP))
{
    $ip = $forward;
}
else
{
    $ip = $remote;
}

return $ip;
}

public function M3UVideo($url) {
echo "<script src='https://cdn.jsdelivr.net/npm/hls.js@latest'></script>
<!-- Or if you want a more recent alpha version -->
<!-- <script src='https://cdn.jsdelivr.net/npm/hls.js@alpha'></script> -->
<script>
  var video = document.getElementById('video');
  var videoSrc = '".strip_tags($url)."';
  if (Hls.isSupported()) {
    var hls = new Hls();
    hls.loadSource(videoSrc);
    hls.attachMedia(video);
    hls.on(Hls.Events.MANIFEST_PARSED, function() {
      video.play();
    });
  }

  else if (video.canPlayType('application/vnd.apple.mpegurl')) {
    video.src = videoSrc;
    video.addEventListener('loadedmetadata', function() {
      video.play();
    });
  }
</script>";
}

public function M3U8DebugStream($pubname, $tslinks, $config) {
  $filename = ''.strip_tags($pubname).'.m3u8';
  $tslink = ''.dirname(__FILE__).'/m3u/'.$filename.'';
  $logfilename = ''.strip_tags($pubname).'-mylog.log';
  $logfile = ''.dirname(__FILE__).'/log/'.$logfilename.'';
  $com = 'screen -mdS '.$pubname.' ffmpeg -y -i "'.$tslinks.'" '.$config.' "'.$tslink.'" >"'.$logfile.'" 2>&1';
  echo '<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdn.metroui.org.ua/v4/css/metro.min.css">
	<link rel="stylesheet" href="https://cdn.metroui.org.ua/v4/css/metro-colors.min.css">
	<link rel="stylesheet" href="https://cdn.metroui.org.ua/v4/css/metro-rtl.min.css">
	<link rel="stylesheet" href="https://cdn.metroui.org.ua/v4/css/metro-icons.min.css">
	<br><textarea class="container" data-role="textarea" style="width:100%;height:50%;">'.$com.'</textarea><br><br>';
  if(!$fp = @fopen(strip_tags($tslink), "r")) {
    echo '<br><b>Stream : (Can Stream) Online</b>';
  } else {
    echo '<br><b>Stream : (Cant Stream)Offline</b>';
  }
  die();
}

public function M3U8DebugStreamWin($pubname, $tslinks, $config) {
  $filename = ''.strip_tags($pubname).'.m3u8';
  $tslink = ''.dirname(__FILE__).'\m3u/'.$filename.'';
  $logfilename = ''.strip_tags($pubname).'-mylog.log';
  $logfile = ''.dirname(__FILE__).'\log/'.$logfilename.'';
  $com = ''.dirname(__FILE__).'\ffmpeg\ffmpeg -y -i "'.$tslinks.'" '.$config.' "'.$tslink.'" >"'.$logfile.'" 2>&1';
  echo '<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdn.metroui.org.ua/v4/css/metro.min.css">
	<link rel="stylesheet" href="https://cdn.metroui.org.ua/v4/css/metro-colors.min.css">
	<link rel="stylesheet" href="https://cdn.metroui.org.ua/v4/css/metro-rtl.min.css">
	<link rel="stylesheet" href="https://cdn.metroui.org.ua/v4/css/metro-icons.min.css">
	<br><textarea class="container" data-role="textarea" style="width:100%;height:50%;">'.$com.'</textarea><br><br>';
  if(!$fp = @fopen(strip_tags($tslink), "r")) {
    echo '<br><b>Stream : (Can Stream) Online</b>';
  } else {
    echo '<br><b>Stream : (Cant Stream)Offline</b>';
  }
  die();
}

public function StopFFMPEG() {
  echo '<b>FFMpeg Killing...</b<br>';
  if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
	$winffmpeg = 'taskkill /F /IM "ffmpeg.exe"';
	shell_exec($winffmpeg);
	echo "<script LANGUAGE='JavaScript'>
    window.alert('Succesfully Exit | ".$winffmpeg."');
    window.location.href='index.php?git=iptv';
    </script>";
  } else {
  $linffmpeg = "pkill ffmpeg";
  shell_exec($linffmpeg);
  echo "<script LANGUAGE='JavaScript'>
  window.alert('Succesfully Exit | ".$linffmpeg."');
  window.location.href='index.php?git=iptv';
  </script>";
  }
}
public function TSDebugStream($pubname, $tslinks, $configts) {
  $filename = ''.strip_tags($pubname).'.ts';
  $tslink = ''.dirname(__FILE__).'/m3u/'.$filename.'';
  $logfilename = ''.strip_tags($pubname).'-mylog.log';
  $logfile = ''.dirname(__FILE__).'/log/'.$logfilename.'';
  $com = 'screen -mdS '.$pubname.' ffmpeg -y -i "'.$tslinks.'" '.$configts.' "'.$tslink.'" >"'.$logfile.'" 2>&1';
  echo '<b>'.$com.'</b><br>';
  if(!$fp = @fopen(strip_tags($tslink), "r")) {
    echo '<b>Online</b>';
  } else {
    echo '<b>Offline</b>';
  }
  die();
}

public function TSDebugStreamWin($pubname, $tslinks, $configts) {
  $filename = ''.strip_tags($pubname).'.ts';
  $tslink = ''.dirname(__FILE__).'\m3u/'.$filename.'';
  $logfilename = ''.strip_tags($pubname).'-mylog.log';
  $logfile = ''.dirname(__FILE__).'\log/'.$logfilename.'';
  $com = ''.dirname(__FILE__).'\ffmpeg\ffmpeg -y -i "'.$tslinks.'" '.$configts.' "'.$tslink.'" >"'.$logfile.'" 2>&1';
  echo '<b>'.$com.'</b><br>';
  if(!$fp = @fopen(strip_tags($tslink), "r")) {
    echo '<b>Online</b>';
  } else {
    echo '<b>Offline</b>';
  }
  die();
}

public function StartOtherStreamLin($pubname, $tslinks, $url, $config, $port) {
  set_time_limit(0);
  $filename = ''.strip_tags($pubname).'.m3u8';
  $tslink = 'udp://localhost:'.$port.'/'.strip_tags($pubname).'';
  $logfilename = ''.strip_tags($pubname).'-mylog.log';
  $logfile = ''.dirname(__FILE__).'/log/'.$logfilename.'';
  $com = 'ffmpeg -y -i "'.$tslinks.'" '.$config.' -f mpegts '.$tslink.' >"'.$logfile.'" 2>&1';
  shell_exec($com);
  echo '<br>Command : <br>
  <pre>
  '.$com.'
  </pre><br>';
  echo '<br><b>URL : '.$url.'</b><br>';
  echo('<pre>'.file_get_contents('log/'.$logfilename.'').'</pre><br>');
}

public function StartOtherStreamWin($pubname, $tslinks, $url, $config, $port) {
  set_time_limit(0);
  $filename = ''.strip_tags($pubname).'.m3u8';
  $tslink = 'udp://localhost:'.$port.'/'.strip_tags($pubname).'';
  $logfilename = ''.strip_tags($pubname).'-mylog.log';
  $logfile = ''.dirname(__FILE__).'/log/'.$logfilename.'';
  $com = ''.dirname(__FILE__).'\ffmpeg\ffmpeg -y -i "'.$tslinks.'" '.$config.' -f mpegts '.$tslink.' >"'.$logfile.'" 2>&1';
  shell_exec($com);
  echo '<br>Command : <br>
  <pre>
  '.$com.'
  </pre><br>';
  echo '<br><b>URL : '.$url.'</b><br>';
  echo('<pre>'.file_get_contents('log/'.$logfilename.'').'</pre><br>');
}

public function StartTwitchTSStreamLinux($pubname, $tslinks, $url, $config, $token) {
  set_time_limit(0);
  $logfilename = ''.strip_tags($pubname).'-mylog.log';
  $logfile = ''.dirname(__FILE__).'/log/'.$logfilename.'';
  $com = 'screen -mdS '.$pubname.' ffmpeg -y -i "'.$tslinks.'" '.$config.' -f flv "rtmp://live-cdg.twitch.tv/app/'.$token.'" >"'.$logfile.'" 2>&1';
  shell_exec($com);
  echo '<br>Command : <br><pre>'.$com.'</pre><br>';
  echo '<br><b>URL : '.$url.'</b><br>';
  echo('<pre>'.file_get_contents('log/'.$logfilename.'').'</pre><br>');
}

public function StartTwitchTSStreamWin($pubname, $tslinks, $url, $config, $token) {
  set_time_limit(0);
  $logfilename = ''.strip_tags($pubname).'-mylog.log';
  $logfile = ''.dirname(__FILE__).'/log/'.$logfilename.'';
  $com = ''.dirname(__FILE__).'\ffmpeg\ffmpeg -y -i "'.$tslinks.'" '.$config.' -f flv "rtmp://live-cdg.twitch.tv/app/'.$token.'" >"'.$logfile.'" 2>&1';
  shell_exec($com);
  echo '<br>Command : <br><pre>'.$com.'</pre><br>';
  echo '<br><b>URL : '.$url.'</b><br>';
  echo('<pre>'.file_get_contents('log/'.$logfilename.'').'</pre><br>');
}

public function StartRestreamTSStreamLinux($pubname, $tslinks, $url, $config, $token) {
  set_time_limit(0);
  $logfilename = ''.strip_tags($pubname).'-mylog.log';
  $logfile = ''.dirname(__FILE__).'/log/'.$logfilename.'';
  if(substr($_SERVER['HTTP_ACCEPT_LANGUAGE'],0,2) == "tr") {
  $com = 'screen -mdS '.$pubname.' ffmpeg -y -i "'.$tslinks.'" '.$config.' -f flv "rtmp://istanbul.restream.io/live/'.$token.'" >"'.$logfile.'" 2>&1';
  } else {
  $com = 'screen -mdS '.$pubname.' ffmpeg -y -i "'.$tslinks.'" '.$config.' -f flv "rtmp://live.restream.io/live/'.$token.'" >"'.$logfile.'" 2>&1';
  }
  shell_exec($com);
  echo '<br>Command : <br><pre>'.$com.'</pre><br>';
  echo '<br><b>URL : '.$url.'</b><br>';
  echo('<pre>'.file_get_contents('log/'.$logfilename.'').'</pre><br>');
}

public function StartRestreamTSStreamWin($pubname, $tslinks, $url, $config, $token) {
  set_time_limit(0);
  $logfilename = ''.strip_tags($pubname).'-mylog.log';
  $logfile = ''.dirname(__FILE__).'/log/'.$logfilename.'';
  if(substr($_SERVER['HTTP_ACCEPT_LANGUAGE'],0,2) == "tr") {
  $com = ''.dirname(__FILE__).'\ffmpeg\ffmpeg -y -i "'.$tslinks.'" '.$config.' -f flv "rtmp://istanbul.restream.io/live/'.$token.'" >"'.$logfile.'" 2>&1';
  } else {
  $com = ''.dirname(__FILE__).'\ffmpeg\ffmpeg -y -i "'.$tslinks.'" '.$config.' -f flv "rtmp://live.restream.io/live/'.$token.'" >"'.$logfile.'" 2>&1';
  }
  shell_exec($com);
  echo '<br>Command : <br><pre>'.$com.'</pre><br>';
  echo '<br><b>URL : '.$url.'</b><br>';
  echo('<pre>'.file_get_contents('log/'.$logfilename.'').'</pre><br>');
}

public function StartFacebookTSStreamLinux($pubname, $tslinks, $url, $config, $token) {
  set_time_limit(0);
  $logfilename = ''.strip_tags($pubname).'-mylog.log';
  $logfile = ''.dirname(__FILE__).'/log/'.$logfilename.'';
  $com = 'screen -mdS '.$pubname.' ffmpeg -y -i "'.$tslinks.'" '.$config.' -f flv "rtmps://live-api-s.facebook.com:443/rtmp/'.$token.'" >"'.$logfile.'" 2>&1';
  shell_exec($com);
  echo '<br>Command : <br><pre>'.$com.'</pre><br>';
  echo '<br><b>URL : '.$url.'</b><br>';
  echo('<pre>'.file_get_contents('log/'.$logfilename.'').'</pre><br>');
}

public function StartFacebookTSStreamWin($pubname, $tslinks, $url, $config, $token) {
  set_time_limit(0);
  $logfilename = ''.strip_tags($pubname).'-mylog.log';
  $logfile = ''.dirname(__FILE__).'/log/'.$logfilename.'';
  $com = ''.dirname(__FILE__).'\ffmpeg\ffmpeg -y -i "'.$tslinks.'" '.$config.' -f flv "rtmps://live-api-s.facebook.com:443/rtmp/'.$token.'" >"'.$logfile.'" 2>&1';
  shell_exec($com);
  echo '<br>Command : <br><pre>'.$com.'</pre><br>';
  echo '<br><b>URL : '.$url.'</b><br>';
  echo('<pre>'.file_get_contents('log/'.$logfilename.'').'</pre><br>');
}

public function StartM3U8Stream($pubname, $tslinks, $url, $config) {
  set_time_limit(0);
  $filename = ''.strip_tags($pubname).'.m3u8';
  $tslink = ''.dirname(__FILE__).'/m3u/'.$filename.'';
  $logfilename = ''.strip_tags($pubname).'-mylog.log';
  $logfile = ''.dirname(__FILE__).'/log/'.$logfilename.'';
  $com = 'screen -mdS '.$pubname.' ffmpeg -y -i "'.$tslinks.'" '.$config.' "'.$tslink.'" >"'.$logfile.'" 2>&1';
  shell_exec($com);
  echo '<br>Command : <br><pre>'.$com.'</pre><br>';
  echo '<br><b>URL : '.$url.'</b><br>';
  echo('<pre>'.file_get_contents('log/'.$logfilename.'').'</pre><br>');
}

public function StartM3U8StreamWin($pubname, $tslinks, $url, $config) {
  set_time_limit(0);
  $filename = ''.strip_tags($pubname).'.m3u8';
  $tslink = ''.dirname(__FILE__).'\m3u/'.$filename.'';
  $logfilename = ''.strip_tags($pubname).'-mylog.log';
  $logfile = ''.dirname(__FILE__).'\log/'.$logfilename.'';
  $com = ''.dirname(__FILE__).'\ffmpeg\ffmpeg -y -i "'.$tslinks.'" '.$config.' "'.$tslink.'" >"'.$logfile.'" 2>&1';
  shell_exec($com);
  echo '<br>Command : <br><pre>'.$com.'</pre><br>';
  echo '<br><b>URL : '.$url.'</b><br>';
  echo('<pre>'.file_get_contents('log/'.$logfilename.'').'</pre><br>');
}

public function StartTSStream($pubname, $tslinks, $url, $configts) {
  set_time_limit(0);
  $filename = ''.strip_tags($pubname).'.ts';
  $tslink = ''.dirname(__FILE__).'/m3u/'.$filename.'';
  $logfilename = ''.strip_tags($pubname).'-mylog.log';
  $logfile = ''.dirname(__FILE__).'/log/'.$logfilename.'';
  $com = 'screen -mdS '.$pubname.' ffmpeg -y -i "'.$tslinks.'" '.$configts.' "'.$tslink.'" >"'.$logfile.'" 2>&1';
  shell_exec($com);
  echo '<br>Command : <br><pre>'.$com.'</pre><br>';
  echo '<br><b>URL : '.$url.'</b><br>';
  echo('<pre>'.file_get_contents('log/'.$logfilename.'').'</pre><br>');
}

public function StartTSStreamWin($pubname, $tslinks, $url) {
  set_time_limit(0);
  $filename = ''.strip_tags($pubname).'.ts';
  $tslink = ''.dirname(__FILE__).'\m3u/'.$filename.'';
  $logfilename = ''.strip_tags($pubname).'-mylog.log';
  $logfile = ''.dirname(__FILE__).'\log/'.$logfilename.'';
  $com = ''.dirname(__FILE__).'\ffmpeg\ffmpeg -y -i "'.$tslinks.'" '.$configts.' "'.$tslink.'" >"'.$logfile.'" 2>&1';
  shell_exec($com);
  echo '<br>Command : <br><pre>'.$com.'</pre><br>';
  echo '<br><b>URL : '.$url.'</b><br>';
  echo('<pre>'.file_get_contents('log/'.$logfilename.'').'</pre><br>');
}

public function M3U8Stream($pubname) {
  $filename = ''.strip_tags($pubname).'.m3u8';
  $tslink = ''.dirname(__FILE__).''.$filename.'';
  $logfilename = ''.strip_tags($pubname).'-mylog.log';
  $logfile = ''.dirname(__FILE__).'/log/'.$logfilename.'';
  header('Content-type: application/x-mpegURL');
  header('Content-Disposition: attachment; filename="'.strip_tags($filename).'.m3u8"');
  echo '#EXTM3U
  #EXTINF:-1,### '.$pubname.' ###
  m3u/'.$pubname.'.m3u8';
}
public function TSStream($pubname) {
  $filename = ''.strip_tags($pubname).'.ts';
  $tslink = ''.dirname(__FILE__).''.$filename.'';
  $logfilename = ''.strip_tags($pubname).'-mylog.log';
  $logfile = ''.dirname(__FILE__).'/log/'.$logfilename.'';
  header('Content-type: video/MP2T');
  header('Content-Disposition: attachment; filename="'.strip_tags($filename).'.ts"');
  echo '<code>'.file_get_contents('m3u/'.strip_tags($pubname).'.ts').'</code><br>';
}

public function NavBar() {

echo '<aside class="sidebar pos-absolute z-2"
       data-role="sidebar"
       data-toggle="#sidebar-toggle-3"
       id="sb3"
       data-shift=".shifted-content">
    <div class="sidebar-header" data-image="https://metroui.org.ua/images/sb-bg-1.jpg">
        <div class="avatar">
            <img data-role="gravatar" data-email="sergey@pimenov.com.ua">
        </div>
        <span class="title fg-white">'.strip_tags($baslik).'</span>
    </div>
    <ul class="sidebar-menu">
        <li><a href="index.php?git=iptv"><span class="mif-home icon"></span>Home</a></li>
        <li><a href="index.php?git=m3ugenerate"><span class="mif-books icon"></span>M3U8 Generator</a></li>
		<li class="divider"></li>
        <li><a href="index.php?git=startstream"><span class="mif-add icon"></span>Add IPTV</a></li>
		<li><a href="index.php?git=addpriviptv"><span class="mif-add icon"></span>Add Private IPTV</a></li>
        <li><a href="index.php?git=addban"><span class="mif-add icon"></span>Add Ban IP</a></li>
		<li class="divider"></li>
        <li><a href="index.php?git=ipblock"><span class="mif-images icon"></span>IP Block</a></li>
		<li class="divider"></li>
		<li><a href="index.php?git=iptv&phpinfo=1"><span class="mif-images icon"></span>PHP Info</a></li>
	</ul>
</aside>

<div class="shifted-content h-100 p-ab">
    <div class="app-bar pos-absolute bg-red z-1" data-role="appbar">
        <button class="app-bar-item c-pointer" id="sidebar-toggle-3">
            <span class="mif-menu fg-white"></span>
        </button>
    </div><br>';
}

public function Head($baslik) {
echo '<head>
<link rel="stylesheet" href="https://cdn.metroui.org.ua/v4/css/metro.min.css">
<link rel="stylesheet" href="https://cdn.metroui.org.ua/v4/css/metro-colors.min.css">
<link rel="stylesheet" href="https://cdn.metroui.org.ua/v4/css/metro-rtl.min.css">
<link rel="stylesheet" href="https://cdn.metroui.org.ua/v4/css/metro-icons.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css">

<script src="https://unpkg.com/popper.js@1.11.1"></script>
<script src="https://cdn.metroui.org.ua/v4/js/metro.min.js"></script>
<script src="https://code.jquery.com/jquery-3.2.0.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>'.strip_tags($baslik).'</title>
</head>';
}

public function logincheck() {
if(isset($_COOKIE['user_id'])) {
} elseif($_COOKIE['user_id'] == "1") {
die('<script>location.replace("index.php")</script>');
} else {
die('<script>location.replace("index.php")</script>');
}
}

public function check_yt($url)
{
$data = file_get_contents("https://www.youtube.com/oembed?url=http://www.youtube.com/watch?v=".strip_tags($url)."&format=json");
echo $data;
}

public function Style() {
echo '<style>
a {
  color: black;
}
@media (min-width:768px) {
div.kisalt {
  color: black;
  width: 350px;
  overflow: hidden; /* taşanları gizle */
  white-space: nowrap; /* alt satıra hiç inme */
  text-overflow: ellipsis; /* eğer uzunsa üç nokta koy */
}
}
@media (max-width:768px) {
div.kisalt {
  width: 100px;
  color: black;
  overflow: hidden; /* taşanları gizle */
  white-space: nowrap; /* alt satıra hiç inme */
  text-overflow: ellipsis; /* eğer uzunsa üç nokta koy */
}
}


.video-js {
width: 100%;
height: 50%;
}
</style>';
  }
  public function Error($errorname) {
    die('<td align="center" width="90" height="90">
    <br></br>
    <b><u>'.strip_tags($errorname).'</u></b>
    <hr></hr>
    <p>'.strip_tags($errorname).'</p></td>');
  }
}
?>
