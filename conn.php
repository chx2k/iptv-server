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

public function SelcukTheme($url) {
?>
<!--
Script Author : Ali Can Gönüllü
Player Writer : SelcukSports
2020-2021
Respect !
-->
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta content="unsafe-url" name="referrer">
<meta content="initial-scale=1,width=device-width" name="viewport">
<script charset="UTF-8">
window.facePlay = 0;
window.faceStreams = [""];
window.mainSource = ["<?php echo htmlentities($url); ?>","<?php echo htmlentities($url); ?>"];
window.adsConfig = {enabled:0}
//window.adsConfig={enabled:!0,link:"",parentId:"div#m",skipOffset:8,source:"<?php echo htmlentities($url); ?>"}
</script>
<style>
            #reload,#unmute {
                position: fixed;
                z-index: 9999
            }

            #reload>div,#unmute>div {
                cursor: pointer;
                width: 100px
            }

            button,hr,input {
                overflow: visible
            }

            audio,canvas,progress,video {
                display: inline-block
            }

            progress,sub,sup {
                vertical-align: baseline
            }

            [type=checkbox],[type=radio],legend {
                box-sizing: border-box;
                padding: 0
            }

            #reload,#reload_disabled,#unmute,[hidden],template {
                display: none
            }

            html {
                line-height: 1.15;
                -ms-text-size-adjust: 100%;
                -webkit-text-size-adjust: 100%
            }

            body {
                margin: 0;
                background-color: #000;
                overflow: hidden;
            }


            article,aside,details,figcaption,figure,footer,header,main,menu,nav,section {
                display: block
            }

            h1 {
                font-size: 2em;
                margin: .67em 0
            }

            figure {
                margin: 1em 40px
            }

            hr {
                box-sizing: content-box;
                height: 0
            }

            code,kbd,pre,samp {
                font-family: monospace,monospace;
                font-size: 1em
            }

            a {
                background-color: transparent;
                -webkit-text-decoration-skip: objects
            }

            abbr[title] {
                border-bottom: none;
                text-decoration: underline;
                text-decoration: underline dotted
            }

            b,strong {
                font-weight: bolder
            }

            dfn {
                font-style: italic
            }

            mark {
                background-color: #ff0;
                color: #000
            }

            small {
                font-size: 80%
            }

            sub,sup {
                font-size: 75%;
                line-height: 0;
                position: relative
            }

            sub {
                bottom: -.25em
            }

            sup {
                top: -.5em
            }

            audio:not([controls]) {
                display: none;
                height: 0
            }

            img {
                border-style: none
            }

            svg:not(:root) {
                overflow: hidden
            }

            button,input,optgroup,select,textarea {
                font-family: sans-serif;
                font-size: 100%;
                line-height: 1.15;
                margin: 0
            }

            button,select {
                text-transform: none
            }

            [type=reset],[type=submit],button,html [type=button] {
                -webkit-appearance: button
            }

            [type=button]::-moz-focus-inner,[type=reset]::-moz-focus-inner,[type=submit]::-moz-focus-inner,button::-moz-focus-inner {
                border-style: none;
                padding: 0
            }

            [type=button]:-moz-focusring,[type=reset]:-moz-focusring,[type=submit]:-moz-focusring,button:-moz-focusring {
                outline: ButtonText dotted 1px
            }

            fieldset {
                padding: .35em .75em .625em
            }

            legend {
                color: inherit;
                display: table;
                max-width: 100%;
                white-space: normal
            }

            textarea {
                overflow: auto
            }

            [type=number]::-webkit-inner-spin-button,[type=number]::-webkit-outer-spin-button {
                height: auto
            }

            [type=search] {
                -webkit-appearance: textfield;
                outline-offset: -2px
            }

            [type=search]::-webkit-search-cancel-button,[type=search]::-webkit-search-decoration {
                -webkit-appearance: none
            }

            ::-webkit-file-upload-button {
                -webkit-appearance: button;
                font: inherit
            }

            summary {
                display: list-item
            }

            .player-poster[data-poster] .play-wrapper[data-poster] {
                height: 12.5%!important
            }

            #reload {
                left: 4px;
                top: 4px
            }

            #reload>div {
                background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAGQAAAAgCAMAAADT9S0cAAABklBMVEUAAAD////////////////////////////////////+/v7////////////////////Ny8ufn5+bm5uZmZmZmZmcnJzl5OTFxcWjo6OdnZ2cnJy5uLiampr08vLNzMyZmZn29PTNzMy3traZmZmampqbm5udnZ2fn5+fn5+joqL////b29vZ2dnc3Nza2tvf3t7a29vl4eDh393e3dwARW/g4OAIUXcAPWji4uLX2NkMUngBS3Lq5ePj4N/s5uQ/c5AAP2r57+nx6ebt5+Tn4+Hi397T1daCorE5b40AQ23/9e727ejg39+7xswsZoYMUXYDTXUASXEASHEAOWXr6uro6OjN09XI0NPS0tKwvseSq7hnjaNhiaBYhJwAR3Dt7Oz98evl5OTIyMiru8Wqu8SitsCWrrq3t7eMp7ZvlKhqkaVGeZQgXoAQVnsANWMAMWDv7u6+yc7MzMy0wcjDw8O/v7+asLy7u7uysrKurq57nK2rq6smXH8UV3v//vX/+fHEzdGmt8J1l6pRf5gLTHIAKltTqSULAAAAKnRSTlMAgEDAEODwUDAgoXCwYNCQBtewiGxE9fTvyL+koZiYl5COiHtdUzYsIhmFSwojAAADF0lEQVRIx+3WZ3OiQBgHcMAWE82lXu/9FKRGA/be+13splx67z3X73vfLuAhMc7kBe/u/jOMwD77/IbdQUX+5x/Oy/ujow8ejo09fjY+/mpi4vWbycm3795/GNHSeHEvVq3u7y8sHB4eHZ2crKysnJ6enV1cPNJSqfIEQbAsSWamQKbFgBNy4amGiAO33xTCUdUQwSWEAodDDEWJN3DHbTvYbLbbIWwUpwg6QtPeKMOQJERwjRGKDXm8OB/zQsXrjUYJ7RGK8a01gx77eaLVbKz9OI/HKyxAtN0TIlwPcKspT+3qtwumvPM9SkBkCEWHxCIrCs50UgbBtX4INcv3MQSMmTEUtcoNrZ06NRJa4kpFYTGVruTKyaTbWUguMiJiAisBFQx8oqhNjglBhm02ox4M6MB9uFwYGNTJDZW6bsR3IHCCk9uspNJ7P/0bOWeB+ywhiAU0MyN6g81m0MuTYfsB+GHphyh1CsIeuLcLguDeucz6fB42Vc8X/yJ6I5x8B7aBkw2oGBMmNsH6IEqdgtjXc4mrgnNr81eLoenI1+V8qYNICzYIjjtgstJHQgz6foiud+MJkvcH3ImZvVqMzfi+ACRZo0mAwFjkftJkFJoSYgD9b0KUOhXC0ozf5fan5zyEt7aaXcu728exmRhApAWDTZTJ0IMIPAb6IrBOhdhJyh8obszNhejwYj7gBNkSNrOMND4E91iZDDwJgTs13BeBdT2ICyzXTIX2herJpNMpcK7lKK680FhnshnDOnsiP6MaUdX1PomwlctdNrzBVLzkFtxcPOy4ARnGxAyICGK6hpilwa46NZIoF4oBV7ncnEoHG+1SYD3E4r1IJzKC6NSIVGBS6q4j20WuzbVdO61Y0LOx3fIw9v4IisiI2QibqhFLd536Wzi7tHRcX43H15tZMvitwdP2/ohB3hMQqxG8QCrEqO+qUyN2JhLx+MLhUDpM4XwkSFMQ0fyXkRDDsiQBLsChMcKLiDqaIxm+D8JriDyZdjjwrjhAKIDwGQ2RkcHd3dnZ2Y8gn0Dm5+fh/64Mefe5RsAfa73hcbvjfCwAAAAASUVORK5CYII=);
                height: 32px
            }

            #unmute {
                left: 90px;
                top: 10px
            }

            #unmute>div {
                background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAGQAAAAeCAMAAADthUvBAAAAeFBMVEUAAAD////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////GqOSsAAAAJ3RSTlMAUL8OBX74NUHUgN2uZSCPaiwlFO7q5lsx887In1ZJG7eohnKaeDk4fGwTAAAB80lEQVRIx+2U6bKiMBCFA8GQyCICgqKouNzz/m846RCVZQrGmvLPLU+VYFKdfHT3SdhXv0J1xP9zBxndy5/JiCNw703E1+NbiMwFKUgnYn6ApDcRAPIdiItWeTYRtO5n6gM4vMFwAHXk/gqI24nTulMV35Kzfp46GjvvOeR+PA25AhG9t1t6eotAL2/aNckGgKJm+BTU0QYKcOifXYK8nIGsXp+kYLSjbEq08k26i65TNGGDpmVUz7CeRuW9pK8yhOmJnnpQAQt5DPN4BDlAeDf9M+kC4nxZieI0AaGNaWtbhsBrvaBfAoUNGUC8HUJydWl947B51QUoG71tDKillgukxqZNkv0FUgMlkc7WzHrlvHgUtJZc46mMdiY1fAQJAW6flPxmnmAdIoATQQqXFDrGcLccgOIDCBcQOiYAojnIuDNHgjR9uKOAZACJ8JCrR8W/lMsJHQuRjAOFNzLfZQBxgSWpArLpxneX7B1Z70yFb0AopVwUiS6WqHwWH4CyDznpBcya92ryyi/L5V5lU5nAKqFy7+0gIgiMgkFPrsC9S3PnDiMpvQk6T7IdJYp6XZtzbYjnlBnbla+W5OmjCAf6sEMOIF/OXfbS73SCy3XnguTjW3jLnw17zAjXY58V95gS7MNyA4WKfVh1hXPMvvqK9Af7hDssGOdtrgAAAABJRU5ErkJggg==);
                height: 30px
            }

            [data-free-banner] {
                position: fixed;
                left: 25%;
                bottom: 2.5px;
                width: 50%;
                z-index: 99999
            }

            [data-free-banner] img {
                width: 100%;
                max-width: 468px
            }

            [data-free-close] {
                color: #fff;
                text-decoration: none
            }

            .fullscreen [data-free-banner] img {
                max-width: 50%
            }
            div#m {
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
            }
        </style>
<title>SelcukWatch</title>
<style type="text/css">.container[data-container]{position:absolute;background-color:#000;height:100%;width:100%;max-width:100%}.container[data-container] .chromeless{cursor:default}[data-player]:not(.nocursor) .container[data-container]:not(.chromeless).pointer-enabled{cursor:pointer}[data-player]{-webkit-touch-callout:none;-webkit-user-select:none;-moz-user-select:none;-ms-user-select:none;-o-user-select:none;user-select:none;-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale;-webkit-transform:translateZ(0);transform:translateZ(0);position:relative;margin:0;padding:0;border:0;font-style:normal;font-weight:400;text-align:center;overflow:hidden;font-size:100%;font-family:Roboto,Open Sans,Arial,sans-serif;text-shadow:0 0 0;box-sizing:border-box}[data-player] a,[data-player] abbr,[data-player] acronym,[data-player] address,[data-player] applet,[data-player] article,[data-player] aside,[data-player] audio,[data-player] b,[data-player] big,[data-player] blockquote,[data-player] canvas,[data-player] caption,[data-player] center,[data-player] cite,[data-player] code,[data-player] dd,[data-player] del,[data-player] details,[data-player] dfn,[data-player] div,[data-player] dl,[data-player] dt,[data-player] em,[data-player] embed,[data-player] fieldset,[data-player] figcaption,[data-player] figure,[data-player] footer,[data-player] form,[data-player] h1,[data-player] h2,[data-player] h3,[data-player] h4,[data-player] h5,[data-player] h6,[data-player] header,[data-player] hgroup,[data-player] i,[data-player] iframe,[data-player] img,[data-player] ins,[data-player] kbd,[data-player] label,[data-player] legend,[data-player] li,[data-player] mark,[data-player] menu,[data-player] nav,[data-player] object,[data-player] ol,[data-player] output,[data-player] p,[data-player] pre,[data-player] q,[data-player] ruby,[data-player] s,[data-player] samp,[data-player] section,[data-player] small,[data-player] span,[data-player] strike,[data-player] strong,[data-player] sub,[data-player] summary,[data-player] sup,[data-player] table,[data-player] tbody,[data-player] td,[data-player] tfoot,[data-player] th,[data-player] thead,[data-player] time,[data-player] tr,[data-player] tt,[data-player] u,[data-player] ul,[data-player] var,[data-player] video{margin:0;padding:0;border:0;font:inherit;font-size:100%;vertical-align:baseline}[data-player] table{border-collapse:collapse;border-spacing:0}[data-player] caption,[data-player] td,[data-player] th{text-align:left;font-weight:400;vertical-align:middle}[data-player] blockquote,[data-player] q{quotes:none}[data-player] blockquote:after,[data-player] blockquote:before,[data-player] q:after,[data-player] q:before{content:"";content:none}[data-player] a img{border:none}[data-player]:focus{outline:0}[data-player] *{max-width:none;box-sizing:inherit;float:none}[data-player] div{display:block}[data-player].fullscreen{width:100%!important;height:100%!important;top:0;left:0}[data-player].nocursor{cursor:none}.clappr-style{display:none!important}[data-html5-video]{position:absolute;height:100%;width:100%;display:block}.clappr-flash-playback[data-flash-playback]{display:block;position:absolute;top:0;left:0;height:100%;width:100%;pointer-events:none}[data-html-img]{max-width:100%;max-height:100%}[data-no-op]{position:absolute;height:100%;width:100%;text-align:center}[data-no-op] p[data-no-op-msg]{position:absolute;text-align:center;font-size:25px;left:0;right:0;color:#fff;padding:10px;top:50%;-webkit-transform:translateY(-50%);transform:translateY(-50%);max-height:100%;overflow:auto}[data-no-op] canvas[data-no-op-canvas]{background-color:#777;height:100%;width:100%}.spinner-three-bounce[data-spinner]{position:absolute;margin:0 auto;width:70px;text-align:center;z-index:999;left:0;right:0;margin-left:auto;margin-right:auto;top:50%;-webkit-transform:translateY(-50%);transform:translateY(-50%)}.spinner-three-bounce[data-spinner]>div{width:18px;height:18px;background-color:#fff;border-radius:100%;display:inline-block;-webkit-animation:bouncedelay 1.4s infinite ease-in-out;animation:bouncedelay 1.4s infinite ease-in-out;-webkit-animation-fill-mode:both;animation-fill-mode:both}.spinner-three-bounce[data-spinner] [data-bounce1]{-webkit-animation-delay:-.32s;animation-delay:-.32s}.spinner-three-bounce[data-spinner] [data-bounce2]{-webkit-animation-delay:-.16s;animation-delay:-.16s}@-webkit-keyframes bouncedelay{0%,80%,to{-webkit-transform:scale(0);transform:scale(0)}40%{-webkit-transform:scale(1);transform:scale(1)}}@keyframes bouncedelay{0%,80%,to{-webkit-transform:scale(0);transform:scale(0)}40%{-webkit-transform:scale(1);transform:scale(1)}}.clappr-watermark[data-watermark]{position:absolute;min-width:70px;max-width:200px;width:12%;text-align:center;z-index:10}.clappr-watermark[data-watermark] a{outline:none;cursor:pointer}.clappr-watermark[data-watermark] img{max-width:100%}.clappr-watermark[data-watermark-bottom-left]{bottom:10px;left:10px}.clappr-watermark[data-watermark-bottom-right]{bottom:10px;right:42px}.clappr-watermark[data-watermark-top-left]{top:10px;left:10px}.clappr-watermark[data-watermark-top-right]{top:10px;right:37px}.player-poster[data-poster]{display:-webkit-box;display:-ms-flexbox;display:flex;-webkit-box-pack:center;-ms-flex-pack:center;justify-content:center;-webkit-box-align:center;-ms-flex-align:center;align-items:center;position:absolute;height:100%;width:100%;z-index:998;top:0;left:0;background-color:#000;background-size:cover;background-repeat:no-repeat;background-position:50% 50%}.player-poster[data-poster].clickable{cursor:pointer}.player-poster[data-poster]:hover .play-wrapper[data-poster]{opacity:1}.player-poster[data-poster] .play-wrapper[data-poster]{width:100%;height:25%;margin:0 auto;opacity:.75;transition:opacity .1s ease}.player-poster[data-poster] .play-wrapper[data-poster] svg{height:100%}.player-poster[data-poster] .play-wrapper[data-poster] svg path{fill:#fff}.media-control-notransition{transition:none!important}.media-control[data-media-control]{position:absolute;width:100%;height:100%;z-index:9999;pointer-events:none}.media-control[data-media-control].dragging{pointer-events:auto;cursor:-webkit-grabbing!important;cursor:grabbing!important;cursor:url(<%=baseUrl%>/a8c874b93b3d848f39a71260c57e3863.cur),move}.media-control[data-media-control].dragging *{cursor:-webkit-grabbing!important;cursor:grabbing!important;cursor:url(<%=baseUrl%>/a8c874b93b3d848f39a71260c57e3863.cur),move}.media-control[data-media-control] .media-control-background[data-background]{position:absolute;height:40%;width:100%;bottom:0;background:linear-gradient(transparent,rgba(0,0,0,.9));transition:opacity .6s ease-out}.media-control[data-media-control] .media-control-icon{line-height:0;letter-spacing:0;speak:none;color:#fff;opacity:.5;vertical-align:middle;text-align:left;transition:all .1s ease}.media-control[data-media-control] .media-control-icon:hover{color:#fff;opacity:.75;text-shadow:hsla(0,0%,100%,.8) 0 0 5px}.media-control[data-media-control].media-control-hide .media-control-background[data-background]{opacity:0}.media-control[data-media-control].media-control-hide .media-control-layer[data-controls]{bottom:-50px}.media-control[data-media-control].media-control-hide .media-control-layer[data-controls] .bar-container[data-seekbar] .bar-scrubber[data-seekbar]{opacity:0}.media-control[data-media-control] .media-control-layer[data-controls]{position:absolute;bottom:7px;width:100%;height:32px;font-size:0;vertical-align:middle;pointer-events:auto;transition:bottom .4s ease-out}.media-control[data-media-control] .media-control-layer[data-controls] .media-control-left-panel[data-media-control]{position:absolute;top:0;left:4px;height:100%}.media-control[data-media-control] .media-control-layer[data-controls] .media-control-center-panel[data-media-control]{height:100%;text-align:center;line-height:32px}.media-control[data-media-control] .media-control-layer[data-controls] .media-control-right-panel[data-media-control]{position:absolute;top:0;right:4px;height:100%}.media-control[data-media-control] .media-control-layer[data-controls] button.media-control-button{background-color:transparent;border:0;margin:0 6px;padding:0;cursor:pointer;display:inline-block;width:32px;height:100%}.media-control[data-media-control] .media-control-layer[data-controls] button.media-control-button svg{width:100%;height:22px}.media-control[data-media-control] .media-control-layer[data-controls] button.media-control-button svg path{fill:#fff}.media-control[data-media-control] .media-control-layer[data-controls] button.media-control-button:focus{outline:none}.media-control[data-media-control] .media-control-layer[data-controls] button.media-control-button[data-pause],.media-control[data-media-control] .media-control-layer[data-controls] button.media-control-button[data-play],.media-control[data-media-control] .media-control-layer[data-controls] button.media-control-button[data-stop]{float:left;height:100%}.media-control[data-media-control] .media-control-layer[data-controls] button.media-control-button[data-fullscreen]{float:right;background-color:transparent;border:0;height:100%}.media-control[data-media-control] .media-control-layer[data-controls] button.media-control-button[data-hd-indicator]{background-color:transparent;border:0;cursor:default;display:none;float:right;height:100%}.media-control[data-media-control] .media-control-layer[data-controls] button.media-control-button[data-hd-indicator].enabled{display:block;opacity:1}.media-control[data-media-control] .media-control-layer[data-controls] button.media-control-button[data-hd-indicator].enabled:hover{opacity:1;text-shadow:none}.media-control[data-media-control] .media-control-layer[data-controls] button.media-control-button[data-playpause],.media-control[data-media-control] .media-control-layer[data-controls] button.media-control-button[data-playstop]{float:left}.media-control[data-media-control] .media-control-layer[data-controls] .media-control-indicator[data-duration],.media-control[data-media-control] .media-control-layer[data-controls] .media-control-indicator[data-position]{display:inline-block;font-size:10px;color:#fff;cursor:default;line-height:32px;position:relative}.media-control[data-media-control] .media-control-layer[data-controls] .media-control-indicator[data-position]{margin:0 6px 0 7px}.media-control[data-media-control] .media-control-layer[data-controls] .media-control-indicator[data-duration]{color:hsla(0,0%,100%,.5);margin-right:6px}.media-control[data-media-control] .media-control-layer[data-controls] .media-control-indicator[data-duration]:before{content:"|";margin-right:7px}.media-control[data-media-control] .media-control-layer[data-controls] .bar-container[data-seekbar]{position:absolute;top:-20px;left:0;display:inline-block;vertical-align:middle;width:100%;height:25px;cursor:pointer}.media-control[data-media-control] .media-control-layer[data-controls] .bar-container[data-seekbar] .bar-background[data-seekbar]{width:100%;height:1px;position:relative;top:12px;background-color:#666}.media-control[data-media-control] .media-control-layer[data-controls] .bar-container[data-seekbar] .bar-background[data-seekbar] .bar-fill-1[data-seekbar]{position:absolute;top:0;left:0;width:0;height:100%;background-color:#c2c2c2;transition:all .1s ease-out}.media-control[data-media-control] .media-control-layer[data-controls] .bar-container[data-seekbar] .bar-background[data-seekbar] .bar-fill-2[data-seekbar]{position:absolute;top:0;left:0;width:0;height:100%;background-color:#005aff;transition:all .1s ease-out}.media-control[data-media-control] .media-control-layer[data-controls] .bar-container[data-seekbar] .bar-background[data-seekbar] .bar-hover[data-seekbar]{opacity:0;position:absolute;top:-3px;width:5px;height:7px;background-color:hsla(0,0%,100%,.5);transition:opacity .1s ease}.media-control[data-media-control] .media-control-layer[data-controls] .bar-container[data-seekbar]:hover .bar-background[data-seekbar] .bar-hover[data-seekbar]{opacity:1}.media-control[data-media-control] .media-control-layer[data-controls] .bar-container[data-seekbar].seek-disabled{cursor:default}.media-control[data-media-control] .media-control-layer[data-controls] .bar-container[data-seekbar].seek-disabled:hover .bar-background[data-seekbar] .bar-hover[data-seekbar]{opacity:0}.media-control[data-media-control] .media-control-layer[data-controls] .bar-container[data-seekbar] .bar-scrubber[data-seekbar]{position:absolute;-webkit-transform:translateX(-50%);transform:translateX(-50%);top:2px;left:0;width:20px;height:20px;opacity:1;transition:all .1s ease-out}.media-control[data-media-control] .media-control-layer[data-controls] .bar-container[data-seekbar] .bar-scrubber[data-seekbar] .bar-scrubber-icon[data-seekbar]{position:absolute;left:6px;top:6px;width:8px;height:8px;border-radius:10px;box-shadow:0 0 0 6px hsla(0,0%,100%,.2);background-color:#fff}.media-control[data-media-control] .media-control-layer[data-controls] .drawer-container[data-volume]{float:right;display:inline-block;height:32px;cursor:pointer;margin:0 6px;box-sizing:border-box}.media-control[data-media-control] .media-control-layer[data-controls] .drawer-container[data-volume] .drawer-icon-container[data-volume]{float:left;bottom:0}.media-control[data-media-control] .media-control-layer[data-controls] .drawer-container[data-volume] .drawer-icon-container[data-volume] .drawer-icon[data-volume]{background-color:transparent;border:0;box-sizing:content-box;width:32px;height:32px;opacity:.5}.media-control[data-media-control] .media-control-layer[data-controls] .drawer-container[data-volume] .drawer-icon-container[data-volume] .drawer-icon[data-volume]:hover{opacity:.75}.media-control[data-media-control] .media-control-layer[data-controls] .drawer-container[data-volume] .drawer-icon-container[data-volume] .drawer-icon[data-volume] svg{height:24px;position:relative;top:3px}.media-control[data-media-control] .media-control-layer[data-controls] .drawer-container[data-volume] .drawer-icon-container[data-volume] .drawer-icon[data-volume] svg path{fill:#fff}.media-control[data-media-control] .media-control-layer[data-controls] .drawer-container[data-volume] .drawer-icon-container[data-volume] .drawer-icon[data-volume].muted svg{margin-left:2px}.media-control[data-media-control] .media-control-layer[data-controls] .drawer-container[data-volume] .bar-container[data-volume]{float:left;position:relative;overflow:hidden;top:6px;width:42px;height:18px;padding:3px 0;transition:width .2s ease-out}.media-control[data-media-control] .media-control-layer[data-controls] .drawer-container[data-volume] .bar-container[data-volume] .bar-background[data-volume]{height:1px;position:relative;top:7px;margin:0 3px;background-color:#666}.media-control[data-media-control] .media-control-layer[data-controls] .drawer-container[data-volume] .bar-container[data-volume] .bar-background[data-volume] .bar-fill-1[data-volume]{position:absolute;top:0;left:0;width:0;height:100%;background-color:#c2c2c2;transition:all .1s ease-out}.media-control[data-media-control] .media-control-layer[data-controls] .drawer-container[data-volume] .bar-container[data-volume] .bar-background[data-volume] .bar-fill-2[data-volume]{position:absolute;top:0;left:0;width:0;height:100%;background-color:#005aff;transition:all .1s ease-out}.media-control[data-media-control] .media-control-layer[data-controls] .drawer-container[data-volume] .bar-container[data-volume] .bar-background[data-volume] .bar-hover[data-volume]{opacity:0;position:absolute;top:-3px;width:5px;height:7px;background-color:hsla(0,0%,100%,.5);transition:opacity .1s ease}.media-control[data-media-control] .media-control-layer[data-controls] .drawer-container[data-volume] .bar-container[data-volume] .bar-scrubber[data-volume]{position:absolute;-webkit-transform:translateX(-50%);transform:translateX(-50%);top:0;left:0;width:20px;height:20px;opacity:1;transition:all .1s ease-out}.media-control[data-media-control] .media-control-layer[data-controls] .drawer-container[data-volume] .bar-container[data-volume] .bar-scrubber[data-volume] .bar-scrubber-icon[data-volume]{position:absolute;left:6px;top:6px;width:8px;height:8px;border-radius:10px;box-shadow:0 0 0 6px hsla(0,0%,100%,.2);background-color:#fff}.media-control[data-media-control] .media-control-layer[data-controls] .drawer-container[data-volume] .bar-container[data-volume] .segmented-bar-element[data-volume]{float:left;width:4px;padding-left:2px;height:12px;opacity:.5;box-shadow:inset 2px 0 0 #fff;transition:-webkit-transform .2s ease-out;transition:transform .2s ease-out;transition:transform .2s ease-out,-webkit-transform .2s ease-out}.media-control[data-media-control] .media-control-layer[data-controls] .drawer-container[data-volume] .bar-container[data-volume] .segmented-bar-element[data-volume].fill{box-shadow:inset 2px 0 0 #fff;opacity:1}.media-control[data-media-control] .media-control-layer[data-controls] .drawer-container[data-volume] .bar-container[data-volume] .segmented-bar-element[data-volume]:first-of-type{padding-left:0}.media-control[data-media-control] .media-control-layer[data-controls] .drawer-container[data-volume] .bar-container[data-volume] .segmented-bar-element[data-volume]:hover{-webkit-transform:scaleY(1.5);transform:scaleY(1.5)}.media-control[data-media-control].w320 .media-control-layer[data-controls] .drawer-container[data-volume] .bar-container[data-volume].volume-bar-hide{width:0;height:12px;top:9px;padding:0}.dvr-controls[data-dvr-controls]{display:inline-block;float:left;color:#fff;line-height:32px;font-size:10px;font-weight:700;margin-left:6px}.dvr-controls[data-dvr-controls] .live-info{cursor:default;font-family:Roboto,Open Sans,Arial,sans-serif;text-transform:uppercase}.dvr-controls[data-dvr-controls] .live-info:before{content:"";display:inline-block;position:relative;width:7px;height:7px;border-radius:3.5px;margin-right:3.5px;background-color:#ff0101}.dvr-controls[data-dvr-controls] .live-info.disabled{opacity:.3}.dvr-controls[data-dvr-controls] .live-info.disabled:before{background-color:#fff}.dvr-controls[data-dvr-controls] .live-button{cursor:pointer;outline:none;display:none;border:0;color:#fff;background-color:transparent;height:32px;padding:0;opacity:.7;font-family:Roboto,Open Sans,Arial,sans-serif;text-transform:uppercase;transition:all .1s ease}.dvr-controls[data-dvr-controls] .live-button:before{content:"";display:inline-block;position:relative;width:7px;height:7px;border-radius:3.5px;margin-right:3.5px;background-color:#fff}.dvr-controls[data-dvr-controls] .live-button:hover{opacity:1;text-shadow:hsla(0,0%,100%,.75) 0 0 5px}.dvr .dvr-controls[data-dvr-controls] .live-info{display:none}.dvr .dvr-controls[data-dvr-controls] .live-button{display:block}.dvr.media-control.live[data-media-control] .media-control-layer[data-controls] .bar-container[data-seekbar] .bar-background[data-seekbar] .bar-fill-2[data-seekbar]{background-color:#005aff}.media-control.live[data-media-control] .media-control-layer[data-controls] .bar-container[data-seekbar] .bar-background[data-seekbar] .bar-fill-2[data-seekbar]{background-color:#ff0101}.cc-controls[data-cc-controls]{float:right;position:relative;display:none}.cc-controls[data-cc-controls].available{display:block}.cc-controls[data-cc-controls] .cc-button{padding:6px!important}.cc-controls[data-cc-controls] .cc-button.enabled{display:block;opacity:1}.cc-controls[data-cc-controls] .cc-button.enabled:hover{opacity:1;text-shadow:none}.cc-controls[data-cc-controls]>ul{list-style-type:none;position:absolute;bottom:25px;border:1px solid #000;display:none;background-color:#e6e6e6}.cc-controls[data-cc-controls] li{font-size:10px}.cc-controls[data-cc-controls] li[data-title]{background-color:#c3c2c2;padding:5px}.cc-controls[data-cc-controls] li a{color:#444;padding:2px 10px;display:block;text-decoration:none}.cc-controls[data-cc-controls] li a:hover{background-color:#555;color:#fff}.cc-controls[data-cc-controls] li a:hover a{color:#fff;text-decoration:none}.cc-controls[data-cc-controls] li.current a{color:red}.seek-time[data-seek-time]{position:absolute;white-space:nowrap;height:20px;line-height:20px;font-size:0;left:-100%;bottom:55px;background-color:rgba(2,2,2,.5);z-index:9999;transition:opacity .1s ease}.seek-time[data-seek-time].hidden[data-seek-time]{opacity:0}.seek-time[data-seek-time] [data-seek-time]{display:inline-block;color:#fff;font-size:10px;padding-left:7px;padding-right:7px;vertical-align:top}.seek-time[data-seek-time] [data-duration]{display:inline-block;color:hsla(0,0%,100%,.5);font-size:10px;padding-right:7px;vertical-align:top}.seek-time[data-seek-time] [data-duration]:before{content:"|";margin-right:7px}div.player-error-screen{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale;color:#cccaca;position:absolute;top:0;height:100%;width:100%;background-color:rgba(0,0,0,.7);z-index:2000;display:-webkit-box;display:-ms-flexbox;display:flex;-webkit-box-orient:vertical;-webkit-box-direction:normal;-ms-flex-direction:column;flex-direction:column;-webkit-box-pack:center;-ms-flex-pack:center;justify-content:center}div.player-error-screen__content[data-error-screen]{font-size:14px;color:#cccaca;margin-top:45px}div.player-error-screen__title[data-error-screen]{font-weight:700;line-height:30px;font-size:18px}div.player-error-screen__message[data-error-screen]{width:90%;margin:0 auto}div.player-error-screen__code[data-error-screen]{font-size:13px;margin-top:15px}div.player-error-screen__reload{cursor:pointer;width:30px;margin:15px auto 0}</style><style type="text/css">.level_selector[data-level-selector]{float:right;position:relative;height:100%}.level_selector[data-level-selector] button{background-color:transparent;color:#fff;font-family:Roboto,Open Sans,Arial,sans-serif;-webkit-font-smoothing:antialiased;border:none;font-size:12px;height:100%}.level_selector[data-level-selector] button:hover{color:#c9c9c9}.level_selector[data-level-selector] button.changing{-webkit-animation:pulse .5s infinite alternate}.level_selector[data-level-selector]>ul{list-style-type:none;position:absolute;bottom:100%;display:none;background-color:rgba(28,28,28,.9);white-space:nowrap}.level_selector[data-level-selector] li{font-size:12px;color:#eee}.level_selector[data-level-selector] li[data-title]{background-color:#333;padding:8px 25px}.level_selector[data-level-selector] li a{color:#eee;padding:5px 10px;display:block;text-decoration:none}.level_selector[data-level-selector] li a:hover{background-color:hsla(0,0%,100%,.1);color:#fff}.level_selector[data-level-selector] li a:hover a{color:#fff;text-decoration:none}.level_selector[data-level-selector] li.current a{color:#2ecc71}</style><style>body{background-color:transparent;font-family:"Roboto";overflow:hidden}@media screen and (orientation:landscape){video{object-fit:fill!important}}</style><style class="clappr-style">@font-face{}</style></head>
<body oncontextmenu="return !1" data-new-gr-c-s-check-loaded="14.997.0" data-gr-ext-installed=""><div id="m"><div data-player="" tabindex="9999" class="" style="height: 880px; width: 1920px;"><div class="container" data-container=""><div data-spinner="" class="spinner-three-bounce" style="display: none;"><div data-bounce1=""></div><div data-bounce2=""></div><div data-bounce3=""></div>
</div><div class="player-poster clickable" data-poster=""><div class="play-wrapper" data-poster=""><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" data-poster="" style="color: rgb(255, 255, 255);" class="poster-icon"><path fill="#010101" d="M1.425.35L14.575 8l-13.15 7.65V.35z" style="fill: rgb(255, 255, 255);"></path></svg></div>
</div><video data-html5-video="" preload="metadata" playsinline="playsinline"></video></div><div class="media-control media-control-hide" data-media-control="" style="display: none;"><div class="media-control-background" data-background=""></div>
<div class="media-control-layer" data-controls="">
  <div class="media-control-center-panel" data-media-control="">
      <div class="bar-container seek-disabled" data-seekbar="">
        <div class="bar-background" data-seekbar="">
          <div class="bar-fill-1" data-seekbar=""></div>
          <div class="bar-fill-2" data-seekbar="" style="width: 0%; background-color: rgb(255, 255, 255);"></div>
          <div class="bar-hover" data-seekbar=""></div>
        </div>
        <div class="bar-scrubber" data-seekbar="" style="left: 0%;">
          <div class="bar-scrubber-icon" data-seekbar=""></div>
        </div>
      </div>
  </div>
  
  <div class="media-control-left-panel" data-media-control="">
    <button type="button" class="media-control-button media-control-icon paused" data-playpause="" aria-label="playpause"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16"><path fill="#010101" d="M1.425.35L14.575 8l-13.15 7.65V.35z" style="fill: rgb(255, 255, 255);"></path></svg></button>
      <div class="media-control-indicator" data-position=""></div>
      <div class="media-control-indicator" data-duration=""></div>
  </div>
  
  <div class="media-control-right-panel" data-media-control="">
    <button type="button" class="media-control-button media-control-icon" data-fullscreen="" aria-label="fullscreen"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16"><path fill="#010101" d="M7.156 8L4 11.156V8.5H3V13h4.5v-1H4.844L8 8.844 7.156 8zM8.5 3v1h2.657L8 7.157 8.846 8 12 4.844V7.5h1V3H8.5z" style="fill: rgb(255, 255, 255);"></path></svg></button><div class="cc-controls" data-cc-controls=""><button type="button" class="cc-button media-control-button media-control-icon" data-cc-button="" aria-label="cc-button"><svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 49 41.8" style="enable-background:new 0 0 49 41.8;" xml:space="preserve"><path d="M47.1,0H3.2C1.6,0,0,1.2,0,2.8v31.5C0,35.9,1.6,37,3.2,37h11.9l3.2,1.9l4.7,2.7c0.9,0.5,2-0.1,2-1.1V37h22.1 c1.6,0,1.9-1.1,1.9-2.7V2.8C49,1.2,48.7,0,47.1,0z M7.2,18.6c0-4.8,3.5-9.3,9.9-9.3c4.8,0,7.1,2.7,7.1,2.7l-2.5,4 c0,0-1.7-1.7-4.2-1.7c-2.8,0-4.3,2.1-4.3,4.3c0,2.1,1.5,4.4,4.5,4.4c2.5,0,4.9-2.1,4.9-2.1l2.2,4.2c0,0-2.7,2.9-7.6,2.9 C10.8,27.9,7.2,23.5,7.2,18.6z M36.9,27.9c-6.4,0-9.9-4.4-9.9-9.3c0-4.8,3.5-9.3,9.9-9.3C41.7,9.3,44,12,44,12l-2.5,4 c0,0-1.7-1.7-4.2-1.7c-2.8,0-4.3,2.1-4.3,4.3c0,2.1,1.5,4.4,4.5,4.4c2.5,0,4.9-2.1,4.9-2.1l2.2,4.2C44.5,25,41.9,27.9,36.9,27.9z"></path></svg></button>
<ul style="display: none;">
  
  <li><a href="<?php echo strip_tags($url); ?>" data-cc-select="-1">Engelli</a></li>
  
</ul>
</div>
  
      <div class="drawer-container" data-volume="">
        <div class="drawer-icon-container" data-volume="">
          <div class="drawer-icon media-control-icon" data-volume=""><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16"><path fill-rule="evenodd" clip-rule="evenodd" fill="#010101" d="M11.5 11h-.002v1.502L7.798 10H4.5V6h3.297l3.7-2.502V4.5h.003V11zM11 4.49L7.953 6.5H5v3h2.953L11 11.51V4.49z" style="fill: rgb(255, 255, 255);"></path></svg></div>
          <span class="drawer-text" data-volume=""></span>
        </div>
        
    <div class="bar-container volume-bar-hide" data-volume="">
    
      <div class="segmented-bar-element fill" data-volume="" style="box-shadow: rgb(255, 255, 255) 2px 0px 0px inset;"></div>
    
      <div class="segmented-bar-element fill" data-volume="" style="box-shadow: rgb(255, 255, 255) 2px 0px 0px inset;"></div>
    
      <div class="segmented-bar-element fill" data-volume="" style="box-shadow: rgb(255, 255, 255) 2px 0px 0px inset;"></div>
    
      <div class="segmented-bar-element fill" data-volume="" style="box-shadow: rgb(255, 255, 255) 2px 0px 0px inset;"></div>
    
      <div class="segmented-bar-element" data-volume="" style="box-shadow: rgb(255, 255, 255) 2px 0px 0px inset;"></div>
    
      <div class="segmented-bar-element" data-volume="" style="box-shadow: rgb(255, 255, 255) 2px 0px 0px inset;"></div>
    
      <div class="segmented-bar-element" data-volume="" style="box-shadow: rgb(255, 255, 255) 2px 0px 0px inset;"></div>
    
      <div class="segmented-bar-element" data-volume="" style="box-shadow: rgb(255, 255, 255) 2px 0px 0px inset;"></div>
    
      <div class="segmented-bar-element" data-volume="" style="box-shadow: rgb(255, 255, 255) 2px 0px 0px inset;"></div>
    
      <div class="segmented-bar-element" data-volume="" style="box-shadow: rgb(255, 255, 255) 2px 0px 0px inset;"></div>
    
    </div>
  
      </div>
  
    <button type="button" class="media-control-button media-control-icon" data-hd-indicator="" aria-label="hd-indicator"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16"><path fill="#010101" d="M5.375 7.062H2.637V4.26H.502v7.488h2.135V8.9h2.738v2.848h2.133V4.26H5.375v2.802zm5.97-2.81h-2.84v7.496h2.798c2.65 0 4.195-1.607 4.195-3.77v-.022c0-2.162-1.523-3.704-4.154-3.704zm2.06 3.758c0 1.21-.81 1.896-2.03 1.896h-.83V6.093h.83c1.22 0 2.03.696 2.03 1.896v.02z" style="fill: rgb(255, 255, 255);"></path></svg></button>
  
  </div>
  
</div>
<div class="seek-time" data-seek-time="" style="display: none; left: -100%;"><span data-seek-time=""></span>
<span data-duration="" style="display: none;"></span>
</div></div></div></div>
<div id="reload_disabled">
<div onclick="window.document.location.reload()"></div>
</div>
<script charset="UTF-8" src="./selcuk_files/jquery.min.js"></script>
<script charset="UTF-8" src="./selcuk_files/clappr.min.js"></script>
<script charset="UTF-8" src="./selcuk_files/level-selector.min.js"></script>
<script charset="UTF-8" src="./selcuk_files/dashshakaplayback.js"></script>
<script>
            !function(n) {
                n(window.document).ready(function() {
                    var e, i, t, o, a = !Clappr.Browser.isiOS, r = Clappr.Browser.isiOS, p = "@media screen and (orientation:landscape){video{object-fit:fill!important}}", d = [], pllluuuggg = [LevelSelector], s = !1, l = {
                        back_to_live: "canlı yayına dön",
                        default_error_message: "Yayında sorun var.",
                        default_error_title: "Hassss!",
                        disabled: "Engelli",
                        live: "canlı",
                        playback_not_supported: "Tarayıcınız bu videoyu oynatma desteğine sahip değil. Lütfen farklı bir tarayıcı ile deneyin."
                    };
                    Clappr.Browser.isiOS && n("#reload").css("left", "56px"),
                    r && window.screen.height > window.screen.width && (p = ""),
                    s && (d = []),
                    n("#reload").show(),
                    window.app = {
                        log: function() {},
                        clappr: {
                            currentTime: function() {
                                return window.app.log("currentTime"),
                                window.Math.round(window.app.clappr.instance.getCurrentTime(), 0)
                            },
                            instance: new Clappr.Player({}),
                            isBuffering: function() {
                                return window.app.log("isBuffering"),
                                window.app.clappr.instance.core.mediaControl.container.buffering
                            },
                            resizeCallback: function() {
                                window.app.log("resizeCallback"),
                                window.app.clappr.instance.resize({
                                    height: n(window).innerHeight(),
                                    width: n(window).innerWidth()
                                })
                            },
                            options: {
                                autoPlay: false,
                                allowUserInteraction: r,
                                chromeless: r,
                                disableErrorScreen: s,
                                disableKeyboardShortcuts: !0,
                                disableVideoTagContextMenu: !1,
                                exitFullscreenOnEnd: !1,
                                height: "100%",
                                language: "tr-TR",
                                persistConfig: !1,
                                playback: {
                                    controls: r,
                                    playInline: !0,
                                    recycleVideo: Clappr.Browser.isMobile,
                                    hlsjsConfig: {
                                        debug: !1,
                                        liveSyncDurationCount: 2,
                                        maxBufferLength: 20,
                                        maxBufferSize: 0
                                    }
                                },
                                plugins: pllluuuggg,
                                mediacontrol: {
                                    buttons: "#fff",
                                    seekbar: "#fff"
                                },
                                mute: !1,
                                strings: {
                                    tr: l,
                                    "tr-TR": l
                                },
                                width: "100%"
                            }
                        },
                        bInterval: 0,
                        cInterval: 30,
                        extend: function(e, i) {
                            return window.app.log("extend"),
                            n.extend({}, e, i)
                        },
                        init: function() {
                            window.app.log("init"),
                            n(window.document.head).append('<style>body{background-color:transparent;font-family:"Roboto";overflow:hidden}' + p + "</style>"),
                            window.config = window.app.extend({
                                advertisement: window.adsConfig
                            }, window.config),
                            window.config.advertisement.enabled ? window.app.initAdvertisement() : window.app.initMain(),
                            n(window).on("resize", window.app.clappr.resizeCallback),
                            window.app.clappr.resizeCallback()
                        },
                        initAdvertisement: function() {
                            window.app.log("initAdvertisement"),
                            window.app.initContainer(window.config.advertisement.parentId),
                            window.config.advertisement = window.app.extend({
                                link: "//0x0.xyz",
                                skipOffset: 5,
                                skipText: "Reklamı geç",
                                skipTextN: "Reklamı geçmek için %d saniye kaldı"
                            }, window.config.advertisement),
                            window.app.clappr.instance = new Clappr.Player(window.app.extend(window.app.clappr.options, window.app.extend(window.config.advertisement, {
                                chromeless: r
                            }))),
                            window.app.initAdvertisementEvents()
                        },
                        initAdvertisementEvents: function() {
                            window.app.log("initAdvertisementEvents"),
                            window.app.clappr.instance.once(Clappr.Events.PLAYER_ENDED, window.app.skip),
                            window.app.clappr.instance.once(Clappr.Events.PLAYER_PLAY, window.app.initSkipButton),
                            window.app.clappr.instance.on(Clappr.Events.PLAYER_TIMEUPDATE, window.app.skipButton),
                            window.app.clappr.instance.setVolume(35)
                        },
                        initContainer: function(e) {
                            window.app.log("initContainer"),
                            n(e).length > 0 && n(e).remove(),
                            n(window.document.body).prepend(n("<div />").attr("id", e.match(/\#(.*)/)[1]))
                        },
                        initMain: function() {
                            window.app.log("initMain"),
                            window.app.initContainer(window.config.main.parentId),
                            window.app.clappr.instance = new Clappr.Player(window.app.extend(window.app.clappr.options, window.config.main)),
                            window.app.initMainEvents();
                            if (window.config.main.hasOwnProperty("reklamResim") && window.config.main.hasOwnProperty("reklamGidis")) {
                                n("#m .container").prepend("<div data-free-banner><div data-f-cl><a data-free-close href=\"javascript:void(0)\">&times;</a></div><a href=\"" + window.config.main.reklamGidis + "\" target=\"_blank\"><img src=\"" + window.config.main.reklamResim + "\"></a></div>");
                                n("[data-free-close]").on("click", function(ex) {
                                    ex.preventDefault();
                                    n("[data-free-banner]").hide();
                                    return false;
                                });
                            }
                        },
                        initMainCleanup: function() {
                            window.app.log("initMainCleanup"),
                            n(".bar-scrubber").css({
                                display: "none"
                            }),
                            n("[data-watermark-top-left]").css({
                                left: "37px",
                                top: "37px"
                            }),
                            n("[data-watermark-top-right]").css({
                                top: "37px"
                            })
                        },
                        initMainEvents: function() {
                            window.app.log("initMainEvents"),
                            window.app.clappr.instance.once(Clappr.Events.PLAYER_PLAY, window.app.initMainCleanup)
                        },
                        initMainOnErrorCallback: function() {
                            window.app.log("initMainOnErrorCallback")
                        },
                        initSkipButton: function() {
                            window.app.log("initSkipButton"),
                            t = window.config.advertisement.skipOffset,
                            Clappr.Browser.isMobile || n("[data-playpause]").css({
                                display: "none"
                            }),
                            n(window.document.body).prepend(n("<div data-advertisement-link />").css({
                                height: "100%",
                                left: 0,
                                position: "absolute",
                                top: 0,
                                "z-index": 9998,
                                width: "100%"
                            })),
                            n("[data-advertisement-link]").append(n("<a />").attr({
                                href: window.config.advertisement.link,
                                target: "_0"
                            }).css({
                                display: "inline-block",
                                height: "100%",
                                width: "100%"
                            })),
                            n(window.document.body).prepend(n("<div data-advertisement />").css({
                                bottom: "25%",
                                position: "absolute",
                                right: 0,
                                "z-index": 9999
                            })),
                            o = window.config.advertisement.skipTextN.replace("%d", window.config.advertisement.skipOffset).toUpperCase(),
                            n("[data-advertisement]").append(n("<button />").attr("type", "button").css({
                                "background-color": "#000",
                                border: "3px solid #333",
                                "border-right": 0,
                                color: "#f8f8f8",
                                "font-family": "Roboto",
                                "font-weight": "bold",
                                "font-size" : "68%",
                                padding: "10px 20px"
                            }).text(o))
                        },
                        skip: function() {
                            window.app.log("skip"),
                            n("[data-advertisement]").remove(),
                            n("[data-advertisement-link]").remove(),
                            window.app.initMain()
                        },
                        skipButton: function() {
                            window.app.log("skipButton"),
                            window.app.clappr.currentTime() > 0 && (e = 1,
                            i = setInterval(window.app.skipButtonHandler, 1e3),
                            window.app.clappr.instance.off(Clappr.Events.PLAYER_TIMEUPDATE, window.app.skipButton))
                        },
                        skipButtonHandler: function() {
                            if (window.app.log("skipButtonHandler"),
                            window.app.clappr.isBuffering())
                                return !1;
                            e == t ? (o = window.config.advertisement.skipText,
                            n("[data-advertisement] > button").css({
                                cursor: "pointer"
                            }),
                            n("[data-advertisement] > button").on("click", window.app.skip),
                            clearInterval(i)) : (o = window.config.advertisement.skipTextN.replace("%d", t - e),
                            e++),
                            n("[data-advertisement] > button").text(o.toUpperCase())
                        }
                    },
                    window.config = {
                        advertisement: window.adsConfig,
                        main: window.app.extend({
                            parentId: "div#m",
                            source: ""
                        }, function(n) {
                            var e, i = {}, t = /&/.test(n);
                            if (n.length > 1 && /=/.test(n))
                                if (t)
                                    for (var o = n.substring(1).split("&"), a = 0; a < o.length; a++)
                                        e = /^(.*?)=(.*?)$/.exec(o[a]),
                                        /^(?!.*posxtion).*$/i.test(e[1]) && (/^http\:.*/i.test(decodeURIComponent(e[2])) || (i[e[1]] = decodeURIComponent(e[2])));
                                else
                                    e = /^(.*?)=(.*?)$/.exec(n.substring(1)),
                                    /^(?!.*posxtion).*$/i.test(e[1]) && (/^http\:.*/i.test(decodeURIComponent(e[2])) || (i[e[1]] = decodeURIComponent(e[2])));
                            return i
                        }(window.location.hash))
                    };
                    var strrr = window.faceStreams[Math.floor(Math.random() * window.faceStreams.length)];
                     if (window.config.main.hasOwnProperty('poster')){
                          window.config.advertisement['poster']=window.config.main.poster;
                      }
                    if (window.facePlay && /steam/.test(strrr)) {
                        window.config.main.source = strrr;
                        window.app.init();
                    } else if (window.facePlay && !Clappr.Browser.isiOS && !Clappr.Browser.isSafari) {
                        window.config.main.source = strrr;
                        window.app.init();
                    } else {
                        window.hasOwnProperty("mainSource") && (window.config.main.source = window.mainSource[Math.floor(Math.random() * window.mainSource.length)]),
                        void 0 !== window.config.main.source && window.app.init()
                    }
                })
            }(jQuery);
        </script>


</body></html>
<?php
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
  $tslink = 'rtp://localhost:'.$port.'/'.strip_tags($pubname).'';
  $logfilename = ''.strip_tags($pubname).'-mylog.log';
  $logfile = ''.dirname(__FILE__).'/log/'.$logfilename.'';
  $com = 'ffmpeg -y -i "'.$tslinks.'" '.$config.' -f rtp '.$tslink.' >"'.$logfile.'" 2>&1';
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
  $tslink = 'rtp://localhost:'.$port.'/'.strip_tags($pubname).'';
  $logfilename = ''.strip_tags($pubname).'-mylog.log';
  $logfile = ''.dirname(__FILE__).'/log/'.$logfilename.'';
  $com = ''.dirname(__FILE__).'\ffmpeg\ffmpeg -y -i "'.$tslinks.'" '.$config.' -f rtp '.$tslink.' >"'.$logfile.'" 2>&1';
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

public function NavBar($logo) {

echo '<aside class="sidebar pos-absolute z-2"
       data-role="sidebar"
       data-toggle="#sidebar-toggle-3"
       id="sb3"
       data-shift=".shifted-content">';
date_default_timezone_set('Europe/Istanbul');
$tarih = date("d-m");
$saat = date("H:i");

if($tarih == date('29-10')) {
echo '<div class="sidebar-header" width="400" height="255" data-image="https://alicangonullu.info/veri/img/ata.gif">';
} elseif($tarih == date('10-11')) {
echo '<div class="sidebar-header" width="400" height="255" data-image="https://alicangonullu.info/veri/img/ata.gif">';

} elseif($tarih == date('30-08')) {
echo '<div class="sidebar-header" width="400" height="255" data-image="https://alicangonullu.info/veri/img/ata.gif">';
} else {
echo '<div class="sidebar-header" width="400" height="255" data-image="'.strip_tags($logo).'">';
}
echo '<div class="avatar"><img data-role="gravatar" data-email="sergey@pimenov.com.ua"></div>
        <span class="title fg-white">'.strip_tags($baslik).'</span>
    </div>
    <ul class="sidebar-menu">
        <li><a href="index.php?git=iptv"><span class="mif-home icon"></span>Home</a></li>
        <li><a href="index.php?git=m3ugenerate"><span class="mif-file-download icon"></span>M3U8 Generator</a></li>
		<li class="divider"></li>
        <li><a href="index.php?git=startstream"><span class="mif-add icon"></span>Add IPTV</a></li>
		<li><a href="index.php?git=addpriviptv"><span class="mif-add icon"></span>Add Private IPTV</a></li>
        <li><a href="index.php?git=addban"><span class="mif-add icon"></span>Add Ban IP</a></li>
		<li class="divider"></li>
        <li><a href="index.php?git=ipblock"><span class="mif-list icon"></span>IP Block</a></li>
		<li class="divider"></li>
		<li><a href="index.php?git=iptv&phpinfo=1"><span class="mif-info icon"></span>PHP Info</a></li>
		<li class="divider"></li>
		<li><a href="index.php?git=cikis"><span class="mif-exit icon"></span>Çıkış</a></li>
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
