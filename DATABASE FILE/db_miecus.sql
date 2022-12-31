-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 31, 2022 at 09:31 AM
-- Server version: 10.5.16-MariaDB
-- PHP Version: 7.3.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id20050233_miesuh`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adm_id` int(222) NOT NULL,
  `username` varchar(222) NOT NULL,
  `password` varchar(222) NOT NULL,
  `email` varchar(222) NOT NULL,
  `code` varchar(222) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adm_id`, `username`, `password`, `email`, `code`, `date`) VALUES
(1, 'admin', '0192023a7bbd73250516f069df18b500', 'admin@gmail.com', '', '2022-11-26 13:20:25');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id_cart` int(50) NOT NULL,
  `u_id` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `title_product` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `note` text COLLATE utf8_unicode_ci NOT NULL,
  `price` mediumint(8) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dishes`
--

CREATE TABLE `dishes` (
  `d_id` int(222) NOT NULL,
  `rs_id` int(222) NOT NULL,
  `title` varchar(222) NOT NULL,
  `slogan` varchar(222) NOT NULL,
  `price` decimal(65,0) NOT NULL,
  `img` varchar(222) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dishes`
--

INSERT INTO `dishes` (`d_id`, `rs_id`, `title`, `slogan`, `price`, `img`) VALUES
(46, 1, 'Mie Modar Level 20', 'Mie Pedas Maximal di kategorinya ', 20000, '639c5de34ce87.png'),
(47, 6, 'Mie Custom', 'Racik Miemu Sendiri', 1000, '639c5e0b150f0.jpg'),
(48, 2, 'Mie Cupu Level 5', 'Mie cupu yang mengandung 7 cabe', 15000, '639c5ed8d93f0.png'),
(49, 5, 'Es Kobokan Jeruk', 'Es jeruk peras segar redamkan pedasmu', 5000, '639c635f85319.jpg'),
(50, 3, 'Mie Bocil Level 0', 'Mie tanpa cabai', 10000, '639c5f54281b1.png'),
(51, 4, 'Dimsum Cak', 'Dimsum dengan cabai didalamnya untuk cuci mulut ', 7000, '639c5f9f05885.png'),
(52, 6, 'Mie Putih (ori)', 'Mie ori', 7000, '639c5fd09e9a1.jpg'),
(53, 6, 'Mie Kecap', 'Mie Kecap', 8000, '639c5ff96c58a.jpg'),
(54, 6, 'Topping Sosis ', 'Sosis Panggang Sedang, ditabur diatas mie', 2000, '639c604b1bacc.jpg'),
(55, 6, 'Pangsit isi daging ayam', 'Pangsit goreng isi ayam', 1500, '639c608c41f9c.jpg'),
(56, 6, 'Telur Mata Sapi', 'Tambah Telur Mata Sapi Pedas', 3500, '639c60de451f3.jpg'),
(57, 6, 'Patty', 'Irisan Daging Sapi', 2000, '639c622e2d335.jpg'),
(58, 6, 'Level Pedas 1 - Sepuasnya', 'Custom level pedas. Satu level untuk 3 cabai (berlaku kelipatan tiap naik level)', 1000, '639c6bcd0a6f3.png'),
(59, 5, 'Es Celupan Cincau ', 'Es Cincau Segar', 5000, '639c630b147bd.jpg'),
(60, 5, 'Es Soda Genggem', 'Soda Gembira', 6000, '639c63cb89d16.jpg'),
(61, 1, 'Mie Modar Level 15', 'Mie Modar Level 15 hampir maksimal', 20000, '639c67f310251.png'),
(62, 1, 'Mie Modar Level 10', 'Mie Modar Level 10 Pedas ', 20000, '639c682117bb1.png'),
(63, 1, 'Mie Modar Level 5', 'Mie Modar Level 5 Pedas Tipis', 20000, '639c684cc1ed7.png'),
(64, 1, 'Mie Modar Level 3', 'Versi level 6 dari Mie Cupu', 20000, '639c68816b6b6.png'),
(65, 2, 'Mie Cupu Level 3', 'Mie cupu yang mengandung 5 cabe', 15000, '639c68c283c89.png'),
(66, 2, 'Mie Cupu Level 1', 'Mie cupu yang mengandung 3 cabe', 15000, '639c68f32b96d.png'),
(67, 4, 'Risol Timur Tengah', 'Risol dengan isian kebab', 7000, '639c6a0cbf4d6.jpg'),
(68, 4, 'Cireng Cak', 'Cireng dengan bumbu cuka pedas', 5000, '639c6a3e17fb4.jpg'),
(69, 3, 'Mie Bocil Level 1', 'Mie Bocil dengan 1 cabai', 10000, '639c6ac9a4c29.png');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id_product` int(11) NOT NULL,
  `title` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `rs_id` int(11) NOT NULL,
  `price` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(1000) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id_product`, `title`, `rs_id`, `price`, `description`, `image`) VALUES
(1, 'Custom Mie', 6, '12500', 'Mie Putih (ori)=7000, Patty  Telur Mata Sapi =5500,Level : 1', 'https://mieesuh.000webhostapp.com/mobileapps/image/custom/mie.png'),
(2, 'Custom Mie', 6, '12500', 'Mie Putih (ori)=7000, Patty  Telur Mata Sapi =5500,Level : 1', 'https://mieesuh.000webhostapp.com/mobileapps/image/custom/mie.png'),
(3, 'Custom Mie', 6, '16000', 'Mie Putih (ori)=7000, Patty  Telur Mata Sapi  Pangsit isi daging ayam  Topping Sosis  =9000,Level : 2', 'https://mieesuh.000webhostapp.com/mobileapps/image/custom/mie.png'),
(4, 'Custom Mie', 6, '14000', 'Mie Putih (ori)=7000, Patty  Telur Mata Sapi  Pangsit isi daging ayam =7000,Level : 1', 'https://mieesuh.000webhostapp.com/mobileapps/image/custom/mie.png'),
(5, 'Custom Mie', 6, '12500', 'Mie Putih (ori)=7000, Patty  Telur Mata Sapi =5500,Level : 1', 'https://mieesuh.000webhostapp.com/mobileapps/image/custom/mie.png'),
(6, 'Custom Mie', 6, '12500', 'Mie Putih (ori)=7000, Patty  Telur Mata Sapi =5500,Level : 1', 'https://mieesuh.000webhostapp.com/mobileapps/image/custom/mie.png'),
(7, 'Custom Mie', 6, '13500', 'Mie Kecap=8000, Patty  Telur Mata Sapi =5500,Level : 1', 'https://mieesuh.000webhostapp.com/mobileapps/image/custom/mie.png'),
(8, 'Custom Mie', 6, '14000', 'Mie Putih (ori)=7000, Patty  Telur Mata Sapi  Pangsit isi daging ayam =7000,Level : 2', 'https://mieesuh.000webhostapp.com/mobileapps/image/custom/mie.png'),
(9, 'Custom Mie', 6, '13500', 'Mie Kecap=8000, Patty  Telur Mata Sapi =5500,Level : 1', 'https://mieesuh.000webhostapp.com/mobileapps/image/custom/mie.png'),
(10, 'Custom Mie', 6, '13500', 'Mie Kecap=8000, Patty  Telur Mata Sapi =5500,Level : 1', 'https://mieesuh.000webhostapp.com/mobileapps/image/custom/mie.png'),
(11, 'Custom Mie', 6, '12500', 'Mie Putih (ori)=7000, Patty  Telur Mata Sapi =5500,Level : 1', 'https://mieesuh.000webhostapp.com/mobileapps/image/custom/mie.png'),
(12, 'Custom Mie', 6, '12500', 'Mie Putih (ori)=7000, Patty  Telur Mata Sapi =5500,Level : 1', 'https://mieesuh.000webhostapp.com/mobileapps/image/custom/mie.png'),
(13, 'Custom Mie', 6, '12500', 'Mie Putih (ori)=7000, Patty  Telur Mata Sapi =5500,Level : 1', 'https://mieesuh.000webhostapp.com/mobileapps/image/custom/mie.png'),
(14, 'Custom Mie', 6, '14000', 'Mie Putih (ori)=7000, Patty  Telur Mata Sapi  Pangsit isi daging ayam =7000,Level : 1', 'https://mieesuh.000webhostapp.com/mobileapps/image/custom/mie.png'),
(15, 'Custom Mie', 6, '14000', 'Mie Putih (ori)=7000, Patty  Telur Mata Sapi  Pangsit isi daging ayam =7000,Level : 1', 'https://mieesuh.000webhostapp.com/mobileapps/image/custom/mie.png'),
(16, 'Custom Mie', 6, '14000', 'Mie Putih (ori)=7000, Patty  Telur Mata Sapi  Pangsit isi daging ayam =7000,Level : 1', 'https://mieesuh.000webhostapp.com/mobileapps/image/custom/mie.png'),
(17, 'Custom Mie', 6, '14000', 'Mie Putih (ori)=7000, Patty  Telur Mata Sapi  Pangsit isi daging ayam =7000,Level : 1', 'https://mieesuh.000webhostapp.com/mobileapps/image/custom/mie.png'),
(18, 'Custom Mie', 6, '12000', 'Mie Putih (ori)=7000, Telur Mata Sapi  Pangsit isi daging ayam =5000,Level : 1', 'https://mieesuh.000webhostapp.com/mobileapps/image/custom/mie.png'),
(19, 'Custom Mie', 6, '12000', 'Mie Putih (ori)=7000, Telur Mata Sapi  Pangsit isi daging ayam =5000,Level : 1', 'https://mieesuh.000webhostapp.com/mobileapps/image/custom/mie.png'),
(20, 'Custom Mie', 6, '12000', 'Mie Putih (ori)=7000, Telur Mata Sapi  Pangsit isi daging ayam =5000,Level : 1', 'https://mieesuh.000webhostapp.com/mobileapps/image/custom/mie.png');

-- --------------------------------------------------------

--
-- Table structure for table `remark`
--

CREATE TABLE `remark` (
  `id` int(11) NOT NULL,
  `frm_id` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `remark` mediumtext NOT NULL,
  `remarkDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `remark`
--

INSERT INTO `remark` (`id`, `frm_id`, `status`, `remark`, `remarkDate`) VALUES
(1, 2, 'in process', 'none', '2022-05-01 05:17:49'),
(2, 3, 'in process', 'none', '2022-05-27 11:01:30'),
(3, 2, 'closed', 'thank you for your order!', '2022-05-27 11:11:41'),
(4, 3, 'closed', 'none', '2022-05-27 11:42:35'),
(5, 4, 'in process', 'none', '2022-05-27 11:42:55'),
(6, 1, 'rejected', 'none', '2022-05-27 11:43:26'),
(7, 7, 'in process', 'none', '2022-05-27 13:03:24'),
(8, 8, 'in process', 'none', '2022-05-27 13:03:38'),
(9, 9, 'rejected', 'thank you', '2022-05-27 13:03:53'),
(10, 7, 'closed', 'thank you for your ordering with us', '2022-05-27 13:04:33'),
(11, 8, 'closed', 'thanks ', '2022-05-27 13:05:24'),
(12, 5, 'closed', 'none', '2022-05-27 13:18:03'),
(13, 10, 'in process', 'bentar ya', '2022-11-29 10:42:46'),
(14, 11, 'closed', 'Pesanan diterima oleh pembeli', '2022-12-16 00:27:53'),
(15, 15, 'closed', 'Diterima oleh ybs', '2022-12-16 01:26:05'),
(16, 16, 'in process', '', '2022-12-18 13:16:18'),
(17, 16, 'closed', '', '2022-12-19 11:01:51'),
(18, 16, 'closed', 'Diterima oleh pak ahnaf', '2022-12-19 11:40:56'),
(19, 16, 'closed', 'Diterima ybs', '2022-12-19 11:49:35'),
(20, 18, 'in process', 'otw', '2022-12-19 12:14:30'),
(21, 19, 'in process', 'Lagi otw', '2022-12-19 12:23:59'),
(22, 16, 'closed', 'Diterima bapak ahnaf', '2022-12-19 12:24:39'),
(23, 19, 'rejected', '', '2022-12-19 12:25:03'),
(24, 18, 'in process', 'Kurir sedang menuju ke tempatmu', '2022-12-19 12:25:36'),
(26, 21, 'cook', 'dimasak', '2022-12-20 11:30:18'),
(27, 22, 'in process', 'Pesanan sedang diantar', '2022-12-20 11:34:04'),
(28, 22, 'closed', 'Diterima ybs\r\n', '2022-12-21 07:13:13'),
(29, 28, 'in process', 'Sedang diantar oleh kurir\r\n', '2022-12-28 02:55:08');

-- --------------------------------------------------------

--
-- Table structure for table `restaurant`
--

CREATE TABLE `restaurant` (
  `rs_id` int(222) NOT NULL,
  `c_id` int(222) NOT NULL,
  `title` varchar(222) NOT NULL,
  `email` varchar(222) NOT NULL,
  `phone` varchar(222) NOT NULL,
  `url` varchar(222) NOT NULL,
  `o_hr` varchar(222) NOT NULL,
  `c_hr` varchar(222) NOT NULL,
  `o_days` varchar(222) NOT NULL,
  `deskripsi` text NOT NULL,
  `image` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `restaurant`
--

INSERT INTO `restaurant` (`rs_id`, `c_id`, `title`, `email`, `phone`, `url`, `o_hr`, `c_hr`, `o_days`, `deskripsi`, `image`, `date`) VALUES
(1, 1, 'Mie Modar Level 3-20', 'Miesuh@mail.com', '+628935478547', 'www.miesuh.com', '7am', '8pm', 'sen-sab', '     Mie dengan tingkat pedas lanjutan   ', '639f0f6da4ad8.png', '2022-12-18 13:02:37'),
(2, 2, 'Mie Cupu Level 1-5', 'miesuh@gmail.com', '+628935478547	', 'www.miesuh.com', '7am', '8pm', 'sen-sab', '  Mie dengan tingkat pedas pada umumnya  ', '639f0f85b05e0.png', '2022-12-18 13:03:01'),
(3, 3, 'Mie Bocil Level 0-1', 'miesuh@mail.com', '+628935478547	', 'www.miesuh.com', '7am', '8pm', 'sen-sab', ' Mie tidak pedas ', '639f104e985c9.png', '2022-12-18 13:06:22'),
(4, 4, 'Snack Cak', 'miesuh@gmail.com', '+628935478547	', 'www.miesuh.com', '6am', '8pm', 'sen-sab', ' Hidangan pembuka ', '639f106dcb622.png', '2022-12-18 13:06:53'),
(5, 5, 'Mienum Kobokan', 'miesuh@gmail.com', '+628935478547	', 'www.miesuh.com', '6am', '8pm', 'sen-sab', ' Mienuman segar pereda pedas ', '639f10a66cdbf.jpg', '2022-12-18 13:07:50'),
(6, 6, 'Mie Custom', 'miesuh@gmail.com', '+628935478547	', 'www.miesuh.com', '9am', '8pm', 'sen-jum', '  Mie racikan sesuai keinginan pelanggan  ', '639f10fe8142a.png', '2022-12-18 13:09:18');

-- --------------------------------------------------------

--
-- Table structure for table `res_category`
--

CREATE TABLE `res_category` (
  `c_id` int(222) NOT NULL,
  `c_name` varchar(222) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `res_category`
--

INSERT INTO `res_category` (`c_id`, `c_name`, `date`) VALUES
(1, 'Modar', '2022-11-20 03:24:30'),
(2, 'Cupu', '2022-11-20 03:24:42'),
(3, 'Bocil', '2022-11-20 03:24:50'),
(4, 'Snack', '2022-11-20 03:24:59'),
(5, 'Minum', '2022-11-20 03:25:07'),
(6, 'Custom', '2022-12-14 17:10:49');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `u_id` int(222) NOT NULL,
  `username` varchar(222) NOT NULL,
  `f_name` varchar(222) NOT NULL,
  `l_name` varchar(222) NOT NULL,
  `email` varchar(222) NOT NULL,
  `phone` varchar(222) NOT NULL,
  `password` varchar(222) NOT NULL,
  `address` text NOT NULL,
  `status` int(222) NOT NULL DEFAULT 1,
  `apiKey` varchar(50) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`u_id`, `username`, `f_name`, `l_name`, `email`, `phone`, `password`, `address`, `status`, `apiKey`, `date`) VALUES
(10, 'ahnaf', 'ahnaf', 'naf', 'ahnaf@gmail.com', '089616669028', '25d55ad283aa400af464c76d713c07ad', 'darjo', 1, '2b97b938a6339b70ee6464a3efddd2b991443421e7c645', '2022-12-31 07:46:37'),
(12, 'ell19', 'fenca', 'ell', 'ellyaszero@gmail.com', '089616603042', '25d55ad283aa400af464c76d713c07ad', 'pandaan, Pasuruan', 1, '', '2022-12-19 12:52:54'),
(13, 'goje', 'goje', 'ghifar', 'goje@gmail.com', '+6291217951902', '5e1ca63daf2a7f8f92a96cb7af8d8ee7', 'gadingfajar,sidoarjo', 1, '', '2022-12-19 12:57:12'),
(14, 'nentiyen50', 'nentiyen', 'nentiyen', 'nentiyen@nentiyen.com', '06125633453', 'd754b0d382fd8e6d9bb79841270bd522', 'jl nentiyen', 1, '', '2022-12-24 08:35:44'),
(15, 'asmi', 'asmi', 'ranti', 'asmi@gmail.com', '089574332111', '165283a20bac664724260c6731d08693', 'kediri', 1, '', '2022-12-27 14:26:34'),
(16, 'ZenScythe', 'Muhammad', 'Andra', 'andrakr@gmail.com', '081934342238', 'e10adc3949ba59abbe56e057f20f883e', 'Perum Gading Fajar 1 BlokB7/11, RT 19, RW 05, Desa Siwalan Panji, Buduran, Sidoarjo, Jawa Timur', 1, '', '2022-12-30 17:11:31'),
(17, 'usere', 'usere', 'name', 'userename@gmail.com', '0888767297762', '25d55ad283aa400af464c76d713c07ad', 'Sidoarjo, Jawa timur Indonesia ', 1, '', '2022-12-31 07:46:12');

-- --------------------------------------------------------

--
-- Table structure for table `users_orders`
--

CREATE TABLE `users_orders` (
  `o_id` int(222) NOT NULL,
  `u_id` int(222) NOT NULL,
  `title` varchar(222) NOT NULL,
  `quantity` int(222) NOT NULL,
  `price` decimal(65,0) NOT NULL,
  `status` varchar(222) DEFAULT NULL,
  `remark` mediumtext DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_orders`
--

INSERT INTO `users_orders` (`o_id`, `u_id`, `title`, `quantity`, `price`, `status`, `remark`, `date`) VALUES
(16, 10, 'Es Soda Genggem', 1, 6000, 'closed', 'Diterima bapak ahnaf', '2022-12-19 12:24:39'),
(18, 10, 'Mie Modar Level 20', 1, 20000, 'in process', 'Kurir sedang menuju ke tempatmu', '2022-12-19 12:25:36'),
(22, 12, 'Es Celupan Cincau ', 1, 5000, 'closed', 'Diterima ybs\r\n', '2022-12-21 07:13:13'),
(23, 10, 'Mie Modar Level 5', 1, 20000, '', NULL, '2022-12-21 07:12:45'),
(28, 15, 'Risol Timur Tengah', 1, 7000, 'in process', 'Sedang diantar oleh kurir\r\n', '2022-12-28 02:55:08'),
(30, 10, 'Mie Modar Level 20', 3, 20000, NULL, NULL, '2022-12-29 07:47:54'),
(32, 17, 'Custom Mie', 1, 12500, '', NULL, '2022-12-31 07:04:25'),
(33, 17, 'Custom Mie', 1, 14500, '', NULL, '2022-12-31 07:04:25'),
(34, 17, 'Mie Modar Level 20', 1, 20000, '', NULL, '2022-12-31 07:04:25');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adm_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id_cart`);

--
-- Indexes for table `dishes`
--
ALTER TABLE `dishes`
  ADD PRIMARY KEY (`d_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id_product`);

--
-- Indexes for table `remark`
--
ALTER TABLE `remark`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `restaurant`
--
ALTER TABLE `restaurant`
  ADD PRIMARY KEY (`rs_id`);

--
-- Indexes for table `res_category`
--
ALTER TABLE `res_category`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`u_id`);

--
-- Indexes for table `users_orders`
--
ALTER TABLE `users_orders`
  ADD PRIMARY KEY (`o_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adm_id` int(222) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id_cart` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `dishes`
--
ALTER TABLE `dishes`
  MODIFY `d_id` int(222) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id_product` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `remark`
--
ALTER TABLE `remark`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `restaurant`
--
ALTER TABLE `restaurant`
  MODIFY `rs_id` int(222) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `res_category`
--
ALTER TABLE `res_category`
  MODIFY `c_id` int(222) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `u_id` int(222) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `users_orders`
--
ALTER TABLE `users_orders`
  MODIFY `o_id` int(222) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
