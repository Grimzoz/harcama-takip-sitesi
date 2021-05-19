-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 04 Oca 2021, 20:14:21
-- Sunucu sürümü: 10.4.11-MariaDB
-- PHP Sürümü: 7.3.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `hesap`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `account`
--

CREATE TABLE `account` (
  `id` int(11) NOT NULL,
  `acc_type` int(11) NOT NULL,
  `mon_type` int(11) NOT NULL,
  `mon_value` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `account`
--

INSERT INTO `account` (`id`, `acc_type`, `mon_type`, `mon_value`, `user_id`) VALUES
(19, 2, 2, 250, 1),
(22, 1, 1, 1500, 1),
(27, 1, 2, 25, 1),
(28, 1, 1, 1500, NULL),
(31, 1, 1, 500, 2);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `account_type`
--

CREATE TABLE `account_type` (
  `id` int(11) NOT NULL,
  `acc_name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `account_type`
--

INSERT INTO `account_type` (`id`, `acc_name`) VALUES
(1, 'Nakit'),
(2, 'Kart');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `harcama`
--

CREATE TABLE `harcama` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `m_id` int(11) NOT NULL,
  `a_id` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `harc_deger` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `harcama`
--

INSERT INTO `harcama` (`id`, `user_id`, `m_id`, `a_id`, `type`, `harc_deger`) VALUES
(1, 2, 1, 1, 1, 10),
(2, 1, 2, 1, 1, 10),
(3, 1, 1, 1, 1, 5),
(4, 1, 1, 2, 1, 10),
(5, 1, 1, 2, 2, 10),
(6, 2, 2, 1, 1, 5),
(7, 2, 2, 1, 2, 5),
(8, 2, 1, 1, 1, 10),
(9, 2, 1, 1, 2, 10),
(10, 2, 1, 1, 1, 20),
(11, 2, 1, 1, 2, 20);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `hareket`
--

CREATE TABLE `hareket` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `genus` int(11) NOT NULL,
  `acc_type` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `value` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `money_type`
--

CREATE TABLE `money_type` (
  `id` int(11) NOT NULL,
  `money_name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `money_type`
--

INSERT INTO `money_type` (`id`, `money_name`) VALUES
(1, 'TL'),
(2, 'DOLAR'),
(3, 'EURO'),
(4, 'STERLIN');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `restoran`
--

CREATE TABLE `restoran` (
  `id` int(11) NOT NULL,
  `rest_miktar` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `restoran`
--

INSERT INTO `restoran` (`id`, `rest_miktar`) VALUES
(2, 50);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ulasim`
--

CREATE TABLE `ulasim` (
  `id` int(11) NOT NULL,
  `ulasim_miktar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `ulasim`
--

INSERT INTO `ulasim` (`id`, `ulasim_miktar`) VALUES
(1, 100);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `u_name` varchar(250) NOT NULL,
  `u_mail` varchar(250) NOT NULL,
  `u_pass` varchar(100) NOT NULL,
  `sys_log_time` timestamp NULL DEFAULT NULL,
  `sys_ext_time` timestamp NULL DEFAULT NULL,
  `t_gelir` int(11) DEFAULT 0,
  `t_gider` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `user`
--

INSERT INTO `user` (`id`, `u_name`, `u_mail`, `u_pass`, `sys_log_time`, `sys_ext_time`, `t_gelir`, `t_gider`) VALUES
(1, 'novil', 'kerim_oz_113@hotmail.com', '1234', '2021-01-02 15:19:58', '2021-01-02 15:20:01', 0, 0),
(2, 'kerim1', 'deneme@mail.com', '123456', '2021-01-02 15:19:59', '2021-01-02 15:20:00', 0, 0);

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mon_type` (`mon_type`),
  ADD KEY `acc_type` (`acc_type`);

--
-- Tablo için indeksler `account_type`
--
ALTER TABLE `account_type`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `harcama`
--
ALTER TABLE `harcama`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `hareket`
--
ALTER TABLE `hareket`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `money_type`
--
ALTER TABLE `money_type`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `restoran`
--
ALTER TABLE `restoran`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `ulasim`
--
ALTER TABLE `ulasim`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `account`
--
ALTER TABLE `account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- Tablo için AUTO_INCREMENT değeri `account_type`
--
ALTER TABLE `account_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `harcama`
--
ALTER TABLE `harcama`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Tablo için AUTO_INCREMENT değeri `money_type`
--
ALTER TABLE `money_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Tablo için AUTO_INCREMENT değeri `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
