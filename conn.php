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
	shell_exec('taskkill /F /IM "ffmpeg.exe"');
  } else {
  shell_exec('pkill ffmpeg');
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

public function StartOtherStream($pubname, $tslinks, $url, $config) {
  set_time_limit(0);
  $filename = ''.strip_tags($pubname).'.m3u8';
  $tslink = ''.dirname(__FILE__).''.$filename.'';
  $logfilename = ''.strip_tags($pubname).'-mylog.log';
  $logfile = ''.dirname(__FILE__).'/log/'.$logfilename.'';
  $com = 'ffmpeg -y -i "'.$tslinks.'" '.$config.' "'.$tslink.'" >"'.$logfile.'" 2>&1';
  shell_exec($com);
  echo '<br>Command : <br><code>'.$com.'</code><br>';
  echo '<br>URL : '.$url.'<br>';
  echo('<code>'.file_get_contents('log/'.$logfilename.'').'</code><br>');
}

public function StartFacebookTSStreamLinux($pubname, $tslinks, $url, $config, $token) {
  set_time_limit(0);
  $logfilename = ''.strip_tags($pubname).'-mylog.log';
  $logfile = ''.dirname(__FILE__).'/log/'.$logfilename.'';
  $com = 'ffmpeg -y -i "'.$tslinks.'" '.$config.' -f flv "rtmps://live-api-s.facebook.com:443/rtmp/'.$token.'" >"'.$logfile.'" 2>&1';
  shell_exec($com);
  echo '<br>Command : <br><code>'.$com.'</code><br>';
  echo '<br>URL : '.$url.'<br>';
  echo('<code>'.file_get_contents('log/'.$logfilename.'').'</code><br>');
}

public function StartFacebookTSStreamWin($pubname, $tslinks, $url, $config, $token) {
  set_time_limit(0);
  $logfilename = ''.strip_tags($pubname).'-mylog.log';
  $logfile = ''.dirname(__FILE__).'/log/'.$logfilename.'';
  $com = ''.dirname(__FILE__).'\ffmpeg\ffmpeg -y -i "'.$tslinks.'" '.$config.' -f flv "rtmps://live-api-s.facebook.com:443/rtmp/'.$token.'" >"'.$logfile.'" 2>&1';
  shell_exec($com);
  echo '<br>Command : <br><code>'.$com.'</code><br>';
  echo '<br>URL : '.$url.'<br>';
  echo('<code>'.file_get_contents('log/'.$logfilename.'').'</code><br>');
}

public function StartM3U8Stream($pubname, $tslinks, $url, $config) {
  set_time_limit(0);
  $filename = ''.strip_tags($pubname).'.m3u8';
  $tslink = ''.dirname(__FILE__).''.$filename.'';
  $logfilename = ''.strip_tags($pubname).'-mylog.log';
  $logfile = ''.dirname(__FILE__).'/log/'.$logfilename.'';
  $com = 'screen -mdS '.$pubname.' ffmpeg -y -i "'.$tslinks.'" '.$config.' "'.$tslink.'" >"'.$logfile.'" 2>&1';
  shell_exec($com);
  echo '<br>Command : <br><code>'.$com.'</code><br>';
  echo '<br>URL : '.$url.'<br>';
  echo('<code>'.file_get_contents('log/'.$logfilename.'').'</code><br>');
}

public function StartM3U8StreamWin($pubname, $tslinks, $url, $config) {
  set_time_limit(0);
  $filename = ''.strip_tags($pubname).'.m3u8';
  $tslink = ''.dirname(__FILE__).'\m3u/'.$filename.'';
  $logfilename = ''.strip_tags($pubname).'-mylog.log';
  $logfile = ''.dirname(__FILE__).'\log/'.$logfilename.'';
  $com = ''.dirname(__FILE__).'\ffmpeg\ffmpeg -y -i "'.$tslinks.'" '.$config.' "'.$tslink.'" >"'.$logfile.'" 2>&1';
  shell_exec($com);
  echo '<br>Command : <br><code>'.$com.'</code><br>';
  echo '<br>URL : '.$url.'<br>';
  echo('<code>'.file_get_contents('log/'.$logfilename.'').'</code><br>');
}

public function StartTSStream($pubname, $tslinks, $url, $configts) {
  set_time_limit(0);
  $filename = ''.strip_tags($pubname).'.ts';
  $tslink = ''.dirname(__FILE__).''.$filename.'';
  $logfilename = ''.strip_tags($pubname).'-mylog.log';
  $logfile = ''.dirname(__FILE__).'/log/'.$logfilename.'';
  $com = 'screen -mdS '.$pubname.' ffmpeg -y -i "'.$tslinks.'" '.$configts.' "'.$tslink.'" >"'.$logfile.'" 2>&1';
  shell_exec($com);
  echo '<br>Command : <br><code>'.$com.'</code><br>';
  echo '<br>URL : '.$url.'<br>';
  echo('<code>'.file_get_contents('log/'.$logfilename.'').'</code><br>');
}

public function StartTSStreamWin($pubname, $tslinks, $url) {
  set_time_limit(0);
  $filename = ''.strip_tags($pubname).'.ts';
  $tslink = ''.dirname(__FILE__).'\m3u/'.$filename.'';
  $logfilename = ''.strip_tags($pubname).'-mylog.log';
  $logfile = ''.dirname(__FILE__).'\log/'.$logfilename.'';
  $com = ''.dirname(__FILE__).'\ffmpeg\ffmpeg -y -i "'.$tslinks.'" '.$configts.' "'.$tslink.'" >"'.$logfile.'" 2>&1';
  shell_exec($com);
  echo '<br>Command : '.$com.'<br>';
  echo '<br>URL : '.$url.'<br>';
  echo('<code>'.file_get_contents('log/'.$logfilename.'').'</code><br>');
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
  public function NavBar($baslik) {
    echo '<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">'.strip_tags($baslik).'</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>';
  }
  public function Head($baslik) {
    echo '<head>
    <link href="https://getbootstrap.com/docs/4.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:700,900" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://getbootstrap.com/docs/4.0/assets/js/vendor/holder.min.js"></script>
    <script>
      Holder.addTheme("thumb", {
        bg: "#55595c",
        fg: "#eceeef",
        text: "Thumbnail"
      });
    </script>

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
  color: red;
}
@media (min-width:768px) {
div.kisalt {
  width: 250px;
  overflow: hidden; /* taşanları gizle */
  white-space: nowrap; /* alt satıra hiç inme */
  text-overflow: ellipsis; /* eğer uzunsa üç nokta koy */
}
}
@media (max-width:768px) {
div.kisalt {
  width: 10px;
  overflow: hidden; /* taşanları gizle */
  white-space: nowrap; /* alt satıra hiç inme */
  text-overflow: ellipsis; /* eğer uzunsa üç nokta koy */
}
}

html {
background-color: #343a40;
}
body {
  align-items: center;
  height: 100%;
  background-color: #343a40;
  color: white;
}
.video-js {
width: 100%;
height: 50%;
}
.form-signin {
  width: 100%;
  max-width: 330px;
  padding: 15px;
  margin: auto;
}
.form-signin .checkbox {
  font-weight: 400;
}
.form-signin .form-control {
  position: relative;
  box-sizing: border-box;
  height: auto;
  padding: 10px;
  font-size: 16px;
}
.form-signin .form-control:focus {
  z-index: 2;
}
.form-signin input[type="email"] {
  margin-bottom: -1px;
  border-bottom-right-radius: 0;
  border-bottom-left-radius: 0;
}
.form-signin input[type="password"] {
  margin-bottom: 10px;
  border-top-left-radius: 0;
  border-top-right-radius: 0;
}
body {
  cursor: url("https://ionicframework.com/img/finger.png"), auto;
}
.numpad-input {
  border: 1px solid black;
  height: 2em;
  width: 25vw;
}
.numpad-popover {
  height: auto !important;
  width: auto !important;
}

.numpad-popover ion-header-bar {
  position: relative;
}

.numpad-popover ion-content {
  top: 0;
  position: relative;
}

.numpad-popover div.col {
  padding: 0;
}

.numpad-popover .button.button-light, .button.button-light.button-icon {
  border-right: 1px solid lightgray;
  border-bottom: 1px solid lightgray;
  box-sizing: border-box;
}

.clear-btn > .button-light {
  height: 10vh;
  padding: 0;
}

.border-input {
  border: 1px solid black !important;
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
