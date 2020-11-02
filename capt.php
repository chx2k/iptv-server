<?php
  header("Cache-Control: no-cache, must-revalidate");
  $kod = rand(1000,9999);
  setcookie("capt", strip_tags($kod), time()+3600, TRUE);
  header('Content-type: image/jpg');
  $kod_uzunluk = strlen($kod);
  $genislik = imagefontwidth(45) * $kod_uzunluk;
  $yukseklik = imagefontheight(45);
  $resim = imagecreate($genislik, $yukseklik);
  $arka_renk = imagecolorallocate($resim, rand(0,155), rand(0,155), rand(0,155));
  $yazi_renk = imagecolorallocate($resim, 255, 255, 255);
  imagefill($resim, 0, 0, $arka_renk);
  imagestring($resim, 5, 0, 0, $kod, $yazi_renk);
  imagejpeg($resim);

?>
