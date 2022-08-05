-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 11, 2022 at 02:17 PM
-- Server version: 10.3.35-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id72416538_aion`
--
CREATE DATABASE IF NOT EXISTS `id72416538_aion` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `id72416538_aion`;

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

DROP TABLE IF EXISTS `articles`;
CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `paye` enum('0','1') NOT NULL DEFAULT '1',
  `uniqid` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `prix` int(11) NOT NULL,
  `cat` varchar(255) NOT NULL,
  `s_cat` varchar(255) NOT NULL,
  `marque` varchar(255) NOT NULL,
  `stock` int(11) NOT NULL,
  `livre` tinyint(1) NOT NULL DEFAULT 0,
  `descr` text NOT NULL,
  `img` varchar(255) NOT NULL,
  `img1` varchar(255) NOT NULL,
  `img2` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Truncate table before insert `articles`
--

TRUNCATE TABLE `articles`;
--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `paye`, `uniqid`, `nom`, `type`, `prix`, `cat`, `s_cat`, `marque`, `stock`, `livre`, `descr`, `img`, `img1`, `img2`, `country`, `created_at`) VALUES
(1, '1', '6287a0fe3d690', 'Polo orange bleu', 'S', 35000, 'Vetements', 'Polos', '', 1, 0, '', '0.jpg', '1.jpg', '2.jpg', '', '2022-08-07 20:02:30'),
(2, '1', '6287a0fe3d691', 'Toyota CHR 2019', '', 16900000, 'Cars', 'Toyota', '', 1, 0, '', '0.jpg', '1.jpg', '2.jpg', '', '2022-08-07 20:02:30'),
(3, '1', '6287a483ddc13', 'Polos blanc rouge', 'S', 35000, 'Vetements', 'Polos', '', 1, 0, '', '0.jpg', '1.jpg', '2.jpg', '', '2022-08-07 20:02:30'),
(4, '1', '6287c2e12935e', 'Pajero', '', 13000000, 'Cars', 'Pajero', '', 1, 0, 'Annee 2016; boite auto; essence V6; interieur en cuire; camera de recule; full option; clim d\'origine; papier a jour', '0.jpg', '1.jpg', '2.jpg', '', '2022-08-07 20:02:30'),
(5, '1', '687a483ddc12', 'L\'Or espresso', '', 3000, 'Cafes', 'Decaffeinato ristretto', '', 1, 0, 'Intensity |9', '0.jpg', '', '', '', '2022-08-07 20:02:30'),
(6, '1', '687a483ddc11', 'L\'Or espresso', '', 3000, 'Cafes', 'Ristretto', '', 1, 0, 'Intensity |11', '0.jpg', '', '', '', '2022-08-07 20:02:30'),
(7, '1', '687a483ddc10', 'L\'Or espresso', '', 3000, 'Cafes', 'Decaffeinato', '', 1, 0, 'Intensity |6', '0.jpg', '', '', '', '2022-08-07 20:02:30'),
(8, '1', '687a483ddc08', 'L\'Or espresso', '', 3000, 'Cafes', 'Or rose', '', 1, 0, 'Intensity |7', '0.jpg', '', '', '', '2022-08-07 20:02:31'),
(9, '1', '687a483ddc07', 'L\'Or espresso', '', 3000, 'Cafes', 'Lungo profondo', '', 1, 0, 'Intensity |8', '0.jpg', '', '', '', '2022-08-07 20:02:32'),
(10, '1', '687a483ddc06', 'L\'Or espresso', '', 3000, 'Cafes', 'Delizioso', '', 1, 0, 'Intensity |5', '0.jpg', '', '', '', '2022-08-07 20:02:33'),
(12, '1', '687a483ddc04', 'L\'Or espresso', '', 3000, 'Cafes', 'Forza', '', 1, 0, 'Intensity |9', '0.jpg', '', '', '', '2022-08-07 20:02:35'),
(13, '1', '687a483ddc01', 'L\'Or espresso', '', 3000, 'Cafes', 'Lungo elegante', '', 1, 0, 'Intensity |6', '0.jpg', '', '', '', '2022-08-07 20:02:36'),
(14, '1', '687a483ddc00', 'L\'Or espresso', '', 3000, 'Cafes', 'Arabica catuai', '', 1, 0, 'Single varietal brazil', '0.jpg', '', '', '', '2022-08-07 20:02:37'),
(15, '1', '687a483dda03', 'L\'Or espresso', '', 3000, 'Cafes', 'Or absolu', '', 1, 0, 'Intensity |9', '0.jpg', '', '', '', '2022-08-07 20:02:38'),
(16, '1', '687a483dda02', 'L\'Or espresso', '', 3000, 'Cafes', 'Arabica nyika', '', 1, 0, 'Handpicked in zambia', '0.jpg', '', '', '', '2022-08-07 20:02:39'),
(17, '1', '687a483dda01', 'L\'Or espresso', '', 3000, 'Cafes', 'Ristretto', '', 1, 0, 'Intensity |11', '0.jpg', '', '', '', '2022-08-07 20:02:40'),
(18, '1', '687a483dda00', 'L\'Or espresso', '', 3000, 'Cafes', 'Supremo', '', 1, 0, 'Intensity |10', '0.jpg', '', '', '', '2022-08-07 20:02:41'),
(19, '1', '687a483ddb00', 'Kia sportage', '', 12000000, 'Cars', 'Kia', '', 1, 0, 'Kia sportage 2016;\r\nClim d\'origine;\r\nEssence;\r\nDocuments a jour', '0.jpg', '1.jpg', '2.jpg', '', '2022-08-08 16:22:30'),
(20, '1', '687a483dda04', 'Boubou gris bleu', '', 45000, 'Vetements', 'Boubous', '', 1, 0, '', '0.jpg', '', '', '', '2022-08-08 17:50:38'),
(21, '1', '687a483dda05', 'Boubou', '', 45000, 'Vetements', 'Boubous', '', 1, 0, '', '0.jpg', '', '', '', '2022-08-08 17:50:39'),
(22, '1', '687a483dda06', 'Boubou marron', '', 45000, 'Vetements', 'Boubous', '', 1, 0, '', '0.jpg', '', '', '', '2022-08-08 17:50:40'),
(23, '1', '687a483dda07', 'Boubou blanc', '', 45000, 'Vetements', 'Boubous', '', 1, 0, '', '0.jpg', '', '', '', '2022-08-08 17:50:41'),
(24, '1', '687a483dda08', 'Machine a cafes Pixie', '', 125000, 'Divers', '', '', 1, 0, '', '0.jpg', '', '', '', '2022-08-08 17:50:43'),
(25, '1', '687a483dda09', 'Chaise', '', 120000, 'Divers', '', '', 1, 0, '', '0.jpg', '1.jpg', '2.jpg', '', '2022-08-08 17:50:44'),
(26, '1', '687a483dda10', 'Machine a cafes Inissia', '', 85000, 'Divers', '', '', 1, 0, '', '0.jpg', '', '', '', '2022-08-08 17:50:45'),
(27, '1', '687a483dda11', 'Mocassin Tommy Hilfiger noir', '', 50000, 'Vetements', 'Chaussures', '', 1, 0, '', '0.jpg', '', '', '', '2022-08-08 17:50:45'),
(28, '1', '687a483dda12', 'Mocassin Tommy Hilfiger noir', '', 50000, 'Vetements', 'Chaussures', '', 1, 0, '', '0.jpg', '', '', '', '2022-08-08 17:50:45'),
(29, '1', '687a483dda13', 'Mocassin Tommy Hilfiger noir', '', 50000, 'Vetements', 'Chaussures', '', 1, 0, '', '0.jpg', '', '', '', '2022-08-08 17:50:45'),
(30, '1', '687a483dda14', 'Mocassin Tommy Hilfiger noir', '', 50000, 'Vetements', 'Chaussures', '', 1, 0, '', '0.jpg', '', '', '', '2022-08-08 17:50:45'),
(31, '1', '687a483dda15', 'Hunday elantra', '', 8000000, 'Cars', 'Hunday', '', 1, 0, '', '0.jpg', '1.jpg', '2.jpg', '', '2022-08-08 17:50:45'),
(32, '1', '6287c2e12935a', 'Yves Saint Laurent ', '', 55000, 'Parfums', '', '', 1, 0, '', '0.jpg', '', '', '', '2022-08-10 12:02:30'),
(33, '1', '6287c2e12935b', 'Mont blanc', '', 65000, 'Parfums', '', '', 1, 0, '', '0.jpg', '', '', '', '2022-08-10 12:02:30');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `list_cat` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Truncate table before insert `categories`
--

TRUNCATE TABLE `categories`;
--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `list_cat`, `img`) VALUES
(1, 'Vetements', 'vetement.jpg'),
(2, 'Parfums', 'parfum.jpg'),
(3, 'Cafes', 'cafe.jpg'),
(4, 'Cars', 'car.jpg'),
(5, 'Divers', 'divers.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `commandes`
--

DROP TABLE IF EXISTS `commandes`;
CREATE TABLE `commandes` (
  `id` int(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `numero` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `msg` text NOT NULL,
  `service` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Truncate table before insert `commandes`
--

TRUNCATE TABLE `commandes`;
--
-- Dumping data for table `commandes`
--

INSERT INTO `commandes` (`id`, `nom`, `numero`, `email`, `msg`, `service`, `created_at`) VALUES
(1, 'Teste_nom', '4556345347', 'teste@gmail.com', 'teste', '', '2022-07-31 20:28:00'),
(2, 'Teste_nom', '4556345347', 'teste@gmail.com', 'teste', '', '2022-07-31 20:47:14'),
(3, 'Teste_nom', '4556345347', 'teste@gmail.com', 'teste', '', '2022-07-31 21:18:04'),
(4, 'Teste_nom', '4556345347', 'teste@gmail.com', 'teste', '', '2022-07-31 21:18:04'),
(5, 'Teste_nom', '4556345347', 'teste@gmail.com', 'teste', '', '2022-07-31 21:23:17'),
(6, 'teste', '434243243', 'teste@gmail.com', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.', 'btp', '2022-08-03 18:51:07');

-- --------------------------------------------------------

--
-- Table structure for table `sous_categories`
--

DROP TABLE IF EXISTS `sous_categories`;
CREATE TABLE `sous_categories` (
  `id` int(11) NOT NULL,
  `list_cat` varchar(255) NOT NULL,
  `id_categories` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Truncate table before insert `sous_categories`
--

TRUNCATE TABLE `sous_categories`;
--
-- Dumping data for table `sous_categories`
--

INSERT INTO `sous_categories` (`id`, `list_cat`, `id_categories`) VALUES
(1, 'Polos', 1),
(2, 'Jeans', 1),
(3, 'Chaussures', 1),
(4, 'Ceintures', 1),
(5, 'Sandales', 1),
(6, 'Chaussettes', 1),
(7, 'Sous vetements', 1),
(8, 'Montres', 1),
(9, 'Pull-overs', 1),
(10, 'Costumes', 1),
(11, 'Boubous', 1),
(12, 'Culottes', 1),
(13, 'Chemises', 1),
(14, 'Tee-short', 1),
(15, 'Pantalons', 1),
(16, 'Sur vetements', 1),
(17, 'Bracelets', 1),
(18, 'Porte-monnaies', 1),
(19, 'Lunettes', 1),
(20, 'Sacs', 1),
(21, 'Chapeaux', 1),
(22, 'Toyota', 4),
(23, 'Pajero', 4),
(24, 'Kia', 4),
(26, 'Hunday', 4);

-- --------------------------------------------------------

--
-- Table structure for table `teste`
--

DROP TABLE IF EXISTS `teste`;
CREATE TABLE `teste` (
  `id` int(11) NOT NULL,
  `list_cat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `teste`
--

TRUNCATE TABLE `teste`;
-- --------------------------------------------------------

--
-- Table structure for table `teste2`
--

DROP TABLE IF EXISTS `teste2`;
CREATE TABLE `teste2` (
  `id` int(11) NOT NULL,
  `list_cat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `teste2`
--

TRUNCATE TABLE `teste2`;
--
-- Dumping data for table `teste2`
--

INSERT INTO `teste2` (`id`, `list_cat`) VALUES
(1, 'TESTE'),
(2, 'er'),
(3, 'ra'),
(4, 'er');

-- --------------------------------------------------------

--
-- Table structure for table `types`
--

DROP TABLE IF EXISTS `types`;
CREATE TABLE `types` (
  `id` int(11) NOT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Truncate table before insert `types`
--

TRUNCATE TABLE `types`;
--
-- Dumping data for table `types`
--

INSERT INTO `types` (`id`, `type`) VALUES
(1, 'S'),
(2, 'M'),
(3, 'X'),
(4, 'L');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ind_id` (`id`);

--
-- Indexes for table `commandes`
--
ALTER TABLE `commandes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sous_categories`
--
ALTER TABLE `sous_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ind_id` (`id`),
  ADD KEY `id_categories` (`id_categories`);

--
-- Indexes for table `teste`
--
ALTER TABLE `teste`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teste2`
--
ALTER TABLE `teste2`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `commandes`
--
ALTER TABLE `commandes`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `sous_categories`
--
ALTER TABLE `sous_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `teste`
--
ALTER TABLE `teste`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `teste2`
--
ALTER TABLE `teste2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `types`
--
ALTER TABLE `types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
