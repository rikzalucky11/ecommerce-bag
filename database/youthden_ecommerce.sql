-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 15, 2023 at 11:52 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `youthden_ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_accounts`
--

CREATE TABLE `tbl_accounts` (
  `id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(200) NOT NULL,
  `last_name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_accounts`
--

INSERT INTO `tbl_accounts` (`id`, `first_name`, `last_name`, `email`, `password`) VALUES
(1, 'login', 'admin', 'admin@admin.com', 'admin123'),
(2, 'ichigo', 'kurosaki', 'ichigo.kurosaki@gmail.com', '12222'),
(3, 'mike', 'izuku', 'mike@gmail.com', '234'),
(4, 'rikza', 'lucky', 'rikzalucky.a@gmail.com', '123');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_custinfo`
--

CREATE TABLE `tbl_custinfo` (
  `id` int(10) UNSIGNED NOT NULL,
  `cust_name` varchar(255) NOT NULL,
  `cust_email` varchar(255) NOT NULL,
  `cust_address` varchar(255) NOT NULL,
  `cust_phone` varchar(20) NOT NULL,
  `cust_order` varchar(20) NOT NULL,
  `status_pesanan` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_custinfo`
--

INSERT INTO `tbl_custinfo` (`id`, `cust_name`, `cust_email`, `cust_address`, `cust_phone`, `cust_order`, `status_pesanan`) VALUES
(1, 'rosa', 'rosa@go.com', 'Jl. Raya ITS, Surabaya', '(+62)82162097585', 'tes', 1),
(2, 'abed', 'abed@go.com', 'bdjhcsdbfcghydejsbfnxic', '15324751541', 'tes2', 1),
(3, 'rikza', 'rikza@gmail.com', 'tuban', '0821', '', NULL),
(4, 'tes', 'bisa@com', 'tuban', '0821', 'arin 1', NULL),
(5, 'yes2', 'rikza@com', 'tuban', '08', 'arin1', NULL),
(6, 'tes status', 'rikza@gmail.com', 'tuban', '12', 'arin(1)', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_products`
--

CREATE TABLE `tbl_products` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_price` float NOT NULL,
  `description` longtext NOT NULL,
  `img_name` varchar(150) NOT NULL,
  `stock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_products`
--

INSERT INTO `tbl_products` (`id`, `product_name`, `product_price`, `description`, `img_name`, `stock`) VALUES
(1, 'Arin', 229500, 'Now you can wait for your morning coffee wearing this t-shirt! Don\'t wait! Oh, wait...\r\n\r\nMade of 100% combed cotton\r\n*Machine wash cold\r\n*Dry cleanable\r\n*Do not iron on print\r\n*Do not bleach\r\n*Do not wring\r\n*Do not tumble dry\r\n', 'catalog1.jpg', 20),
(2, 'Armywarrior', 243000, 'No Fear! No Worry! No Control!\r\n\r\nMade of 100% combed cotton\r\n*Machine wash cold\r\n*Dry cleanable\r\n*Do not iron on print\r\n*Do not bleach\r\n*Do not wring\r\n*Do not tumble dry\r\n', 'catalog2.jpg', 30),
(3, 'Chameleon', 292500, 'eu·pho·ri·a - a feeling or state of intense excitement and happiness.\r\n\r\n*Machine wash cold\r\n*Dry cleanable\r\n*Do not iron on print\r\n*Do not bleach\r\n*Do not wring\r\n*Do not tumble dry\r\n', 'catalog3.jpg', 50),
(4, 'Chocolut', 178500, 'I’m too high to sleep.\r\n\r\n100% Combed Cotton\r\nCOLD WASH ONLY\r\n*Machine wash cold\r\n*Dry cleanable\r\n*Do not iron on print\r\n*Do not bleach\r\n*Do not wring\r\n*Do not tumble dry\r\n', 'catalog4.jpg', 45),
(5, 'Circle', 229500, 'Plants thrive when they listen to music that sits between 115Hz and 250Hz.\r\n\r\nMade of 100% combed cotton\r\n*Machine wash cold\r\n*Dry cleanable\r\n*Do not iron on print\r\n*Do not bleach\r\n*Do not wring\r\n*Do not tumble dry\r\n', 'catalog5.jpg', 43),
(6, 'Gembolan', 238500, 'Manifestation - the action or fact of showing an abstract idea.\r\n*Machine wash cold\r\n*Dry cleanable\r\n*Do not iron on print\r\n*Do not bleach\r\n*Do not wring\r\n*Do not tumble dry\r\n', 'catalog6.jpg', 50),
(8, 'Grown', 238500, 'pla·ce·bo - a measure designed merely to calm or please someone.\r\n\r\n*Machine wash cold\r\n*Dry cleanable\r\n*Do not iron on print\r\n*Do not bleach\r\n*Do not wring\r\n*Do not tumble dry\r\n', 'catalog7.jpg', 70),
(9, 'Hilly', 238500, 'A cigarette a day keeps the doctor in pay.\r\n\r\nMade of 100% combed cotton\r\n*Machine wash cold\r\n*Dry cleanable\r\n*Do not iron on print\r\n*Do not bleach\r\n*Do not wring\r\n*Do not tumble dry\r\n', 'catalog8.jpg', 250),
(10, 'Impact', 229500, 'Nothing sounds sweeter than the crackle of vinyl.\r\n\r\n100% Combed Cotton\r\nCOLD WASH ONLY\r\n*Machine wash cold\r\n*Dry cleanable\r\n*Do not iron on print\r\n*Do not bleach\r\n*Do not wring\r\n*Do not tumble dry\r\n', 'catalog9.jpg', 155),
(11, 'Kagembang', 325000, 'Come join the hottest club in town!\r\n\r\nMade of 100% combed cotton\r\n*Machine wash cold\r\n*Dry cleanable\r\n*Do not iron on print\r\n*Do not bleach\r\n*Do not wring\r\n*Do not tumble dry\r\n', 'catalog10.jpg', 300),
(12, 'Kasampak', 395000, 'Is Hell real? Is Hell eternal?\r\n\r\nMade of 100% combed cotton\r\n*Machine wash cold\r\n*Dry cleanable\r\n*Do not iron on print\r\n*Do not bleach\r\n*Do not wring\r\n*Do not tumble dry\r\n', 'catalog11.jpg', 150);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_staff`
--

CREATE TABLE `tbl_staff` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_staff`
--

INSERT INTO `tbl_staff` (`id`, `name`, `email`, `date`, `role`) VALUES
(1, 'Moch. Rikza Lucky A', 'Rikzalucky.a@gmail.com', '2023-05-28', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_accounts`
--
ALTER TABLE `tbl_accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_custinfo`
--
ALTER TABLE `tbl_custinfo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_products`
--
ALTER TABLE `tbl_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_staff`
--
ALTER TABLE `tbl_staff`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_accounts`
--
ALTER TABLE `tbl_accounts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_custinfo`
--
ALTER TABLE `tbl_custinfo`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_products`
--
ALTER TABLE `tbl_products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_staff`
--
ALTER TABLE `tbl_staff`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
