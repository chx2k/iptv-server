-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost
-- Üretim Zamanı: 04 Kas 2020, 12:22:41
-- Sunucu sürümü: 10.3.17-MariaDB
-- PHP Sürümü: 7.2.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `iptv_data`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `admin_list`
--

CREATE TABLE `admin_list` (
  `admin_id` int(11) NOT NULL,
  `admin_email` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `admin_usrname` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `admin_passwd` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `admin_token` varchar(255) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `admin_list`
--

INSERT INTO `admin_list` (`admin_id`, `admin_email`, `admin_usrname`, `admin_passwd`, `admin_token`) VALUES
(1, 'alicangonullu@yahoo.com', 'alicangonullu', '060323f33140b4a86b53d01d726a45c7584a3a2b', '060323f33140b4a86b53d01d726a45c7584a3a2b');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `iptv_config`
--

CREATE TABLE `iptv_config` (
  `config_id` int(11) NOT NULL,
  `ffmpeg_m3u8cfg` text COLLATE utf8_turkish_ci NOT NULL,
  `ffmpeg_ts` text COLLATE utf8_turkish_ci NOT NULL,
  `ffmpeg_flv` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `twitter_tkn` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `facebook_tkn` varchar(255) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `iptv_config`
--

INSERT INTO `iptv_config` (`config_id`, `ffmpeg_m3u8cfg`, `ffmpeg_ts`, `ffmpeg_flv`, `twitter_tkn`, `facebook_tkn`) VALUES
(1, '-listen 1 -vcodec libx264 -profile:v high -level:v 4.1 -crf 23 -preset veryfast -vf \"yadif\" -s 1280x1024 -maxrate 3400k -bufsize 5000k -hls_wrap 8 -acodec libfdk_aac -ac 2 -c:a aac -b:a 128k -strict experimental', '-c:v copy -c:a copy -t 00:05:00', '-deinterlace -vcodec libx264 -pix_fmt yuv420p -preset veryfast -r 30 -g 60 -b:v 2500k -acodec libmp3lame -ar 44100 -threads 6 -qscale 3 -b:a 712000 -bufsize 512k', '1234', '1234');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ip_block`
--

CREATE TABLE `ip_block` (
  `ip_id` int(11) NOT NULL,
  `ip_adress` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `ban_reason` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `ip_block_active` varchar(255) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `ip_block`
--

INSERT INTO `ip_block` (`ip_id`, `ip_adress`, `ban_reason`, `ip_block_active`) VALUES
(1, '::1', 'Nobody', '1');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `private_iptv`
--

CREATE TABLE `private_iptv` (
  `private_id` int(11) NOT NULL,
  `private_name` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `private_resim` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `private_iptv` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `private_active` varchar(255) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `public_iptv`
--

CREATE TABLE `public_iptv` (
  `public_id` int(11) NOT NULL,
  `public_name` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `public_tslink` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `video_stream` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `public_active` varchar(255) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `public_iptv`
--

INSERT INTO `public_iptv` (`public_id`, `public_name`, `public_tslink`, `video_stream`, `public_active`) VALUES
(1, '53253027fef2ab5162a602f2acfed431', 'rtmp://win1.yayin.com.tr/bursatv/bursatv', '0', '1'),
(2, '9d684c589d67031a627ad33d59db65e5', 'https://tv-e-okul02.live.trt.com.tr/master.m3u8', '0', '1');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `admin_list`
--
ALTER TABLE `admin_list`
  ADD PRIMARY KEY (`admin_id`);

--
-- Tablo için indeksler `iptv_config`
--
ALTER TABLE `iptv_config`
  ADD PRIMARY KEY (`config_id`);

--
-- Tablo için indeksler `ip_block`
--
ALTER TABLE `ip_block`
  ADD PRIMARY KEY (`ip_id`);

--
-- Tablo için indeksler `private_iptv`
--
ALTER TABLE `private_iptv`
  ADD PRIMARY KEY (`private_id`);

--
-- Tablo için indeksler `public_iptv`
--
ALTER TABLE `public_iptv`
  ADD PRIMARY KEY (`public_id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `admin_list`
--
ALTER TABLE `admin_list`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `iptv_config`
--
ALTER TABLE `iptv_config`
  MODIFY `config_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `ip_block`
--
ALTER TABLE `ip_block`
  MODIFY `ip_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `private_iptv`
--
ALTER TABLE `private_iptv`
  MODIFY `private_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `public_iptv`
--
ALTER TABLE `public_iptv`
  MODIFY `public_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
