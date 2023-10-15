-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 14, 2023 at 07:07 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `company_profile`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `id` int(11) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `kategori` varchar(100) NOT NULL,
  `foto` varchar(225) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`id`, `judul`, `kategori`, `foto`, `tanggal`) VALUES
(32, '9 PCS', '20000', 'menu1.png', '2023-08-31'),
(34, 'WINGS BUCKET', '30000', 'menu2.png', '2023-08-31'),
(35, 'SNACK BUCKET 1 BBQ', '50000', 'menu4.png', '2023-08-31'),
(36, 'SNACK BUCKET 2 BBQ', '60000', 'menu4.png', '2023-08-30'),
(37, 'FISH FILLET COMBO', '70000', 'menu5.png', '2023-08-30'),
(38, 'KOLONEL YAKINIKU COMBO', '60000', 'menu6.png', '2023-08-30'),
(39, 'KOMBO KRISPY', '50000', 'menu7.png', '2023-08-30'),
(40, 'SUPER STAR 2', '100000', 'menu8.png', '2023-08-30'),
(41, 'SUPER STAR 1', '100000', 'menu9.png', '2023-08-30'),
(42, 'ORIENTAL DON', '45000', 'menu10.png', '2023-08-30'),
(43, 'COLONEL BURGER', '25000', 'menu11.png', '2023-08-30'),
(44, 'TWISTY', '27000', 'menu12.png', '2023-08-30'),
(45, 'DON SERIES W/ EGG', '47000', 'menu13.png', '2023-08-30'),
(46, 'O.R BURGER SINGLE', '29999', 'menu14.png', '2023-08-30'),
(47, 'YAKINIKU DON', '35000', 'menu15.png', '2023-08-30'),
(48, 'WINGERS', '15000', 'menu16.png', '2023-08-30'),
(49, 'SPAGHETTI SUPREME', '35000', 'menu17.png', '2023-08-30'),
(50, 'SPAGHETTI DELLUXE', '35000', 'menu18.png', '2023-09-02'),
(51, 'RICE', '15000', 'menu19.png', '2023-09-02'),
(52, 'Eskrim', '20000', 'menu22.png', '2023-09-18');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `usernamee` varchar(225) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `alamat` varchar(225) NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `foto` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `usernamee`, `email`, `password`, `alamat`, `no_hp`, `foto`) VALUES
(16, 'Nabila Maghfirah', 'nabila@gmail.com', '12345', 'kampung kramat rumah warna biru', '085655544321', 'Screenshot 2023-08-25 103158.png'),
(17, 'nadila', 'nana@gmail.com', '123', 'kandang', '08786756', ''),
(18, 'Al Faiz Akbar Thaib', 'al@gmail.com', '12345', 'panggoi dusun c', '08554443321', 'menu1.png'),
(19, 'liza kartika novita', 'liza@gmail.com', '111', 'panggoi', '081234543234', ''),
(20, '', '', '', '', '', 'asd3.png'),
(21, 'amir rullah', 'amirul@gmail.com', '1', 'punteut', '00', 'asd6.png'),
(22, 'al', 'xrpl@gmail.com', '1', 'lancang garam', '081234565432', '1'),
(23, 'amir', 'amirul@gmail.com', '1', 'Puenteut', '085655544321', '1');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `judul` varchar(225) NOT NULL,
  `kategori` int(50) NOT NULL,
  `jumlah_makanan` int(11) NOT NULL,
  `nama_pelanggan` varchar(225) NOT NULL,
  `tanggal_pembayaran` datetime NOT NULL DEFAULT current_timestamp(),
  `alamat` varchar(225) NOT NULL,
  `no_hp` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `id_pelanggan`, `judul`, `kategori`, `jumlah_makanan`, `nama_pelanggan`, `tanggal_pembayaran`, `alamat`, `no_hp`) VALUES
(35, 16, 'SPAGHETTI DELLUXE', 35000, 1, 'Nabila Maghfirah', '2023-08-31 05:33:44', 'kampung kramat', '085655544321'),
(36, 16, 'WINGERS', 15000, 1, 'Nabila Maghfirah', '2023-08-31 05:34:31', 'kampung kramat', '085655544321'),
(37, 16, 'YAKINIKU DON', 35000, 1, 'Nabila Maghfirah', '2031-08-23 05:37:00', 'kampung kramat', '085655544321'),
(38, 16, 'YAKINIKU DON', 35000, 1, 'Nabila Maghfirah', '3131-08-23 05:39:00', 'kampung kramat', '085655544321'),
(39, 16, 'RICE', 15000, 1, 'Nabila Maghfirah', '2023-08-31 05:40:02', 'kampung kramat', '085655544321'),
(40, 16, 'SPAGHETTI DELLUXE', 35000, 1, 'Nabila Maghfirah', '2023-08-31 05:41:26', 'kampung kramat', '085655544321'),
(41, 16, 'SPAGHETTI SUPREME', 35000, 1, 'Nabila Maghfirah', '2023-08-31 05:42:37', 'kampung kramat', '085655544321'),
(42, 16, 'SPAGHETTI SUPREME', 35000, 1, 'Nabila Maghfirah', '2023-08-31 05:43:14', 'kampung kramat', '085655544321'),
(43, 16, 'WINGERS', 15000, 1, 'Nabila Maghfirah', '2023-08-31 05:00:00', 'kampung kramat', '085655544321'),
(44, 16, 'WINGERS', 15000, 1, 'Nabila Maghfirah', '2023-08-31 05:49:34', 'kampung kramat', '085655544321'),
(45, 16, 'SPAGHETTI SUPREME', 35000, 1, 'Nabila Maghfirah', '2023-08-31 05:51:31', 'kampung kramat', '085655544321'),
(46, 16, 'SPAGHETTI SUPREME', 35000, 1, 'Nabila Maghfirah', '0000-00-00 00:00:00', 'kampung kramat', '085655544321'),
(47, 16, 'YAKINIKU DON', 35000, 1, 'Nabila Maghfirah', '2023-08-31 05:55:48', 'kampung kramat', '085655544321'),
(48, 16, 'SPAGHETTI SUPREME', 35000, 1, 'Nabila Maghfirah', '2023-08-31 06:02:15', 'kampung kramat', '085655544321'),
(49, 16, 'SPAGHETTI DELLUXE', 35000, 1, 'Nabila Maghfirah', '2023-08-31 06:08:36', 'kampung kramat', '085655544321'),
(50, 16, 'WINGERS', 15000, 1, 'Nabila Maghfirah', '2023-08-31 06:12:21', 'kampung kramat', '085655544321'),
(51, 16, 'O.R BURGER SINGLE', 29999, 5, 'Nabila Maghfirah', '2023-08-31 06:17:48', 'kampung kramat', '085655544321'),
(52, 16, 'WINGERS', 15000, 1, 'Nabila Maghfirah', '2023-08-31 06:18:50', 'kampung kramat', '085655544321'),
(53, 16, 'SPAGHETTI SUPREME', 35000, 1, 'Nabila Maghfirah', '2023-08-31 11:21:23', 'kampung kramat', '085655544321'),
(56, 18, 'YAKINIKU DON', 35000, 1, 'Al Faiz Akbar T', '2023-08-31 06:42:14', 'panggoi', '08554443321'),
(57, 18, 'WINGERS', 15000, 6, 'Al Faiz Akbar Thaib', '2023-09-01 08:20:45', 'panggoi', '08554443321'),
(58, 18, 'SPAGHETTI SUPREME', 35000, 5, 'Al Faiz Akbar Thaib', '2023-09-01 09:57:42', 'panggoi dusun c', '08554443321'),
(59, 18, 'COLONEL BURGER', 25000, 1, 'Al Faiz Akbar Thaib', '2023-09-01 09:58:32', 'panggoi dusun c', '08554443321'),
(60, 19, 'ORIENTAL DON', 45000, 10, 'liza kartika novita', '2023-09-01 10:03:40', 'panggoi', '081234543234'),
(61, 18, 'WINGERS', 15000, 1, 'Al Faiz Akbar Thaib', '2023-09-02 08:26:21', 'panggoi dusun c', '08554443321'),
(62, 18, 'WINGERS', 15000, 1, 'Al Faiz Akbar Thaib', '2023-09-02 08:26:21', 'panggoi dusun c', '08554443321'),
(63, 18, 'SPAGHETTI SUPREME', 35000, 1, 'Al Faiz Akbar Thaib', '2023-09-02 08:31:06', 'panggoi dusun c', '08554443321'),
(64, 18, 'SPAGHETTI SUPREME', 35000, 1, 'Al Faiz Akbar Thaib', '2023-09-02 08:31:06', 'panggoi dusun c', '08554443321'),
(65, 16, 'SPAGHETTI SUPREME', 35000, 5, 'Nabila Maghfirah', '2023-09-03 10:37:11', 'kampung kramat rumah warna biru', '085655544321'),
(66, 16, 'SPAGHETTI SUPREME', 35000, 5, 'Nabila Maghfirah', '2023-09-03 10:37:11', 'kampung kramat rumah warna biru', '085655544321'),
(67, 18, 'WINGERS', 15000, 6, 'Al Faiz Akbar Thaib', '2023-09-05 08:27:12', 'panggoi dusun c', '08554443321'),
(68, 18, 'WINGERS', 15000, 6, 'Al Faiz Akbar Thaib', '2023-09-05 08:27:12', 'panggoi dusun c', '08554443321'),
(69, 18, 'WINGERS', 15000, 2, 'Al Faiz Akbar Thaib', '2023-09-05 07:47:21', 'panggoi dusun c', '08554443321'),
(70, 18, 'WINGERS', 15000, 2, 'Al Faiz Akbar Thaib', '2023-09-05 07:47:21', 'panggoi dusun c', '08554443321'),
(71, 18, 'YAKINIKU DON', 35000, 1, 'Al Faiz Akbar Thaib', '2023-09-05 07:48:36', 'panggoi dusun c', '08554443321'),
(72, 18, 'YAKINIKU DON', 35000, 1, 'Al Faiz Akbar Thaib', '2023-09-05 07:48:36', 'panggoi dusun c', '08554443321'),
(73, 18, 'SPAGHETTI SUPREME', 35000, 1, 'Al Faiz Akbar Thaib', '2023-09-05 07:49:15', 'panggoi dusun c', '08554443321'),
(75, 18, 'RICE', 15000, 2, 'Al Faiz Akbar Thaib', '2023-09-05 07:52:57', 'panggoi dusun c', '08554443321'),
(76, 18, 'RICE', 15000, 2, 'Al Faiz Akbar Thaib', '2023-09-05 07:52:57', 'panggoi dusun c', '08554443321'),
(80, 18, 'COLONEL BURGER', 25000, 1, 'Al Faiz Akbar Thaib', '2023-09-05 07:55:21', 'panggoi dusun c', '08554443321'),
(81, 22, 'WINGERS', 15000, 5, 'x rpl', '2023-09-18 09:33:55', 'lancang garam', '081234565432'),
(82, 22, 'Eskrim', 20000, 1, 'al', '2023-09-18 09:50:49', 'lancang garam', '081234565432'),
(83, 23, 'RICE', 15000, 6, 'amir', '2023-09-23 08:17:36', 'Puenteut', '085655544321'),
(84, 16, 'Eskrim', 20000, 5, 'Nabila Maghfirah', '2023-10-11 09:14:11', 'kampung kramat rumah warna biru', '085655544321'),
(85, 16, 'Eskrim', 20000, 10, 'Nabila Maghfirah', '2023-10-11 09:19:28', 'kampung kramat rumah warna biru', '085655544321'),
(86, 16, 'SPAGHETTI DELLUXE', 35000, 3, 'Nabila Maghfirah', '2023-10-11 04:29:29', 'kampung kramat rumah warna biru', '085655544321');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(225) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password`) VALUES
(1, 'alfaiz', 'al@gmail.com', '1234'),
(2, 'amir', 'amir@gmail.com', 'amir1111'),
(7, 'all', '', 'all'),
(9, 'qa', 'qa@gmail.com', 'qa'),
(10, 'zoro', 'zoro@gmail.com', 'xoro'),
(11, 'zoro', 'zoro@gmail.com', 'zoro'),
(12, 'rizky', 'rizky@gmail.com', '123'),
(13, 'mthaib', 'mthaib@gmail.com', '12345'),
(14, 'alfaiz', 'al@gmail.com', '1234'),
(16, 'al', 'al@gmail.com', '12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`),
  ADD KEY `id_pelanggan` (`id_pelanggan`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `pembayaran_ibfk_1` FOREIGN KEY (`id_pelanggan`) REFERENCES `pelanggan` (`id_pelanggan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
