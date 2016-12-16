-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Anamakine: localhost
-- Üretim Zamanı: 01 Nis 2014, 07:45:55
-- Sunucu sürümü: 5.6.12-log
-- PHP Sürümü: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Veritabanı: `meksa-mys`
--
CREATE DATABASE IF NOT EXISTS `meksa-mys` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `meksa-mys`;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `members`
--

CREATE TABLE IF NOT EXISTS `members` (
  `member_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `login` varchar(100) NOT NULL,
  `passwd` varchar(32) NOT NULL,
  PRIMARY KEY (`member_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Tablo döküm verisi `members`
--

INSERT INTO `members` (`member_id`, `firstname`, `lastname`, `login`, `passwd`) VALUES
(1, 'Mehmet Can', 'YUMUŞTUTAN', 'mehmetcy01', '9ca8ebafa5e16da9ab95e26a655f7c3a');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tbl_hizmetler`
--

CREATE TABLE IF NOT EXISTS `tbl_hizmetler` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `HizmetAdi` varchar(100) NOT NULL,
  `HizmetOzet` char(255) NOT NULL,
  `HizmetDetay` varchar(1000) NOT NULL,
  `SistemeKayit` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- Tablo döküm verisi `tbl_hizmetler`
--

INSERT INTO `tbl_hizmetler` (`ID`, `HizmetAdi`, `HizmetOzet`, `HizmetDetay`, `SistemeKayit`) VALUES
(1, 'Alanadı Tescil', '.com, .net, .org...', '.com, .net, .org...', '2014-03-14 21:00:39'),
(2, '.tr Alanadı Tescil', '.com.tr, .net.tr, .org.tr...', '.com.tr, .net.tr, .org.tr...', '2014-03-14 21:01:10'),
(4, 'Hosting MidiPaket', '1 GB', '1 GB', '2014-03-14 21:01:43'),
(5, 'Hosting Mega Paket', '2 GB', '2 GB', '2014-03-14 21:01:58'),
(7, 'Broşür', 'Broşür', 'Broşür', '2014-03-15 21:11:04'),
(9, 'Katalog', 'Katalog', 'Katalog', '2014-03-15 21:14:28'),
(10, 'Kurumsal Web Sitesi', 'Kurumsal Web Sitesi', 'Kurumsal Web Sitesi', '2014-03-16 17:55:09'),
(14, 'Bilgisayar Kurulumu', 'Bilgisayar Kurulumu', 'Bilgisayar Kurulumu', '2014-03-28 15:59:59'),
(15, 'Kartvizit', 'Kartvizit', 'Kartvizit', '2014-03-28 16:01:46');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tbl_isler`
--

CREATE TABLE IF NOT EXISTS `tbl_isler` (
  `IsID` int(11) NOT NULL AUTO_INCREMENT,
  `MusteriID` int(11) NOT NULL,
  `HizmetID` int(11) NOT NULL,
  `IsMiktari` int(11) NOT NULL,
  `IsTutari` decimal(10,2) NOT NULL,
  `IsDetay` text NOT NULL,
  `IsTarihi` date NOT NULL,
  `SistemeEklendi` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`IsID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=42 ;

--
-- Tablo döküm verisi `tbl_isler`
--

INSERT INTO `tbl_isler` (`IsID`, `MusteriID`, `HizmetID`, `IsMiktari`, `IsTutari`, `IsDetay`, `IsTarihi`, `SistemeEklendi`) VALUES
(4, 15, 3, 1, '25.00', '55050sdasd asda', '2014-03-15', '2014-03-15 20:39:24'),
(9, 14, 3, 2, '50.00', '55050sdasd asda', '2014-03-16', '2014-03-16 14:14:00'),
(14, 17, 10, 1, '1400.00', 'asdas dasdas das', '2014-03-16', '2014-03-16 17:56:04'),
(16, 14, 10, 3, '728.00', '55050sdasd asda', '2014-03-16', '2014-03-16 18:44:43'),
(17, 17, 7, 1, '85.00', 'Bu bir broşür müş', '2014-03-16', '2014-03-16 18:47:05'),
(19, 17, 6, 1, '55.00', '55050sdasd asda', '2014-03-16', '2014-03-16 18:59:02'),
(20, 17, 4, 1, '55.00', '55050sdasd asda', '2014-03-16', '2014-03-16 19:07:35'),
(26, 20, 11, 1, '85.00', '55050sdasd asda', '2014-03-18', '2014-03-18 12:07:27'),
(27, 14, 9, 1, '2000.00', '55050sdasd asda', '2014-03-18', '2014-03-18 12:08:46'),
(28, 21, 11, 1, '45.00', '55050sdasd asda', '2014-03-19', '2014-03-19 08:49:55'),
(29, 21, 12, 1, '750.00', '55050sdasd asda', '2014-03-19', '2014-03-19 08:51:48'),
(30, 17, 12, 2, '85.00', '55050sdasd asda', '2014-03-25', '2014-03-25 08:48:43'),
(31, 17, 14, 1, '50.00', '55050sdasd asda', '2014-03-28', '2014-03-28 16:00:16'),
(33, 17, 15, 5, '175.00', '55050sdasd asda', '2014-03-28', '2014-03-28 16:03:19'),
(34, 23, 14, 1, '55.00', '55050sdasd asda', '2014-03-28', '2014-03-28 16:28:56'),
(35, 23, 15, 1, '50.00', '55050sdasd asda', '2014-03-28', '2014-03-28 17:03:32'),
(36, 22, 2, 1, '25.00', '55050sdasd asda', '2014-03-28', '2014-03-28 17:27:09'),
(37, 22, 14, 1, '1250.00', 'Nvidia Geforce 7560 2 GB Ekran kartı\r\nIntel i5 3230Q 2.5 GHz İşlemci\r\nBoost Dış kasa+450W Güç kaynağı\r\nMSI Anakart\r\n1 TB HDD\r\nDVD WRITER\r\nLogitech Fare+Klavye Seti', '2014-03-28', '2014-03-28 18:10:59'),
(38, 22, 10, 1, '285.00', '', '2014-03-28', '2014-03-28 21:56:05'),
(41, 23, 16, 1, '7.00', '', '2014-03-29', '2014-03-29 18:15:47');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tbl_musteriler`
--

CREATE TABLE IF NOT EXISTS `tbl_musteriler` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `SirketAdi` text,
  `SirketSorumlusu` varchar(50) DEFAULT NULL,
  `SirketWebAdresi` varchar(50) DEFAULT NULL,
  `SirketSorumluEposta` varchar(50) DEFAULT NULL,
  `SirketEposta` varchar(50) DEFAULT NULL,
  `SirketAdres` varchar(150) DEFAULT NULL,
  `SirketTel1` varchar(11) DEFAULT NULL,
  `SirketTel2` varchar(11) DEFAULT NULL,
  `SistemeEklendi` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=24 ;

--
-- Tablo döküm verisi `tbl_musteriler`
--

INSERT INTO `tbl_musteriler` (`ID`, `SirketAdi`, `SirketSorumlusu`, `SirketWebAdresi`, `SirketSorumluEposta`, `SirketEposta`, `SirketAdres`, `SirketTel1`, `SirketTel2`, `SistemeEklendi`) VALUES
(14, 'ASENKRON LTD', 'Mehmet Can YUMUŞTUTAN', '', 'mehmetcy01@gmail.com', 'bilgi@asenkron.com', 'adana', '322', '', '2014-03-15 20:31:42'),
(17, 'TEKTAŞ AHŞAP AŞ', 'Celil YUMUŞTUTAN', '-', 'celil@gmail.com', 'celil@gmail.com', '-', '322', '322', '2014-03-16 17:52:56'),
(22, 'ADANA DEMİRSPOR', 'ADANA DEMİRSPOR', 'ADANA DEMİRSPOR', 'adn@demirspor.com', 'adn@demirspor.com', 'Seyhan/ADANA', '52225', '54545', '2014-03-28 15:58:31'),
(23, 'Bu bir test işleminden geçen kayıtttır', 'Mehmet Can YUMUŞTUTAN', 'mcy.com', 'mehmetcy01@gmail.com', 'mehmetcy01@gmail.com', 'Seyhan adana', '5555', '5555', '2014-03-28 16:28:32');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
