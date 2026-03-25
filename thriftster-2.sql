-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 24, 2026 at 12:56 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `thriftster`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `order_number` varchar(20) NOT NULL,
  `buyer_id` int(11) NOT NULL,
  `status` enum('pending','paid','shipped','delivered','cancelled','refunded') NOT NULL DEFAULT 'pending',
  `subtotal` decimal(10,2) NOT NULL DEFAULT 0.00,
  `delivery_fee` decimal(10,2) NOT NULL DEFAULT 0.00,
  `total_amount` decimal(10,2) NOT NULL DEFAULT 0.00,
  `delivery_method` varchar(50) DEFAULT NULL,
  `payment_method` enum('cod','ewallet','card') NOT NULL DEFAULT 'cod',
  `estimated_delivery_at` varchar(50) DEFAULT NULL,
  `paid_at` datetime DEFAULT NULL,
  `shipping_first_name` varchar(75) DEFAULT NULL,
  `shipping_last_name` varchar(75) DEFAULT NULL,
  `shipping_email` varchar(100) DEFAULT NULL,
  `shipping_phone` varchar(20) DEFAULT NULL,
  `shipping_address` varchar(255) DEFAULT NULL,
  `shipping_barangay` varchar(100) DEFAULT NULL,
  `shipping_city` varchar(100) DEFAULT NULL,
  `shipping_region` varchar(100) DEFAULT NULL,
  `shipping_postal_code` varchar(10) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `order_number`, `buyer_id`, `status`, `subtotal`, `delivery_fee`, `total_amount`, `delivery_method`, `payment_method`, `estimated_delivery_at`, `paid_at`, `shipping_first_name`, `shipping_last_name`, `shipping_email`, `shipping_phone`, `shipping_address`, `shipping_barangay`, `shipping_city`, `shipping_region`, `shipping_postal_code`, `created_at`, `updated_at`) VALUES
(0, 'ORD-69C09C526857F', 1, 'pending', 320.00, 0.00, 320.00, '', 'cod', NULL, NULL, 'chapi', 'chapichapi', 'manriquequervie1@gmail.com', '09475952428', 'quezon st', '', 'Valenzuela', 'NCR', '4222', '2026-03-23 01:50:10', '2026-03-23 01:50:10'),
(0, 'ORD-69C09C623BDE8', 1, 'pending', 320.00, 0.00, 320.00, '', 'cod', NULL, NULL, 'chapi', 'chapichapi', 'manriquequervie1@gmail.com', '+639475952428', 'quezon st', '', 'Valenzuela', 'NCR', '4222', '2026-03-23 01:50:26', '2026-03-23 01:50:26'),
(0, 'ORD-69C09C838F769', 1, 'pending', 450.00, 0.00, 450.00, '', '', NULL, NULL, 'chapi', 'chapichapi', 'manriquequervie1@gmail.com', '+639475952428', 'quezon st', '', 'Valenzuela', 'NCR', '4222', '2026-03-23 01:50:59', '2026-03-23 01:50:59'),
(0, 'ORD-69C0AA3846847', 1, 'pending', 320.00, 0.00, 320.00, '', 'cod', NULL, NULL, 'asdasd', 'asdasd', 'asdasd@gmail.com', '0912370415112', 'asdads', '', 'asd', 'asd', '123123', '2026-03-23 02:49:28', '2026-03-23 02:49:28'),
(0, 'ORD-69C0AA516BD28', 1, 'pending', 450.00, 0.00, 450.00, '', 'cod', NULL, NULL, 'asdasd', 'asd', 'ok@gmail.com', '1902-8301928730912', 'asdads', '', 'ughhh idk', 'asd', '123123', '2026-03-23 02:49:53', '2026-03-23 02:49:53'),
(0, 'ORD-69C0DED6C7F10', 1, 'pending', 320.00, 0.00, 320.00, '', 'cod', NULL, NULL, 'Quervie', 'Manrique', 'manriquequervie@gmail.com', '09123456789', 'qweqwe', '', 'asdasd', 'asdasdasd', '1231', '2026-03-23 06:33:58', '2026-03-23 06:33:58'),
(0, 'ORD-69C0DEF53DE7A', 1, 'pending', 770.00, 0.00, 770.00, '', '', NULL, NULL, 'Quervie', 'Manrique', 'manriquequervie@gmail.com', '+639123456789', 'qweqwe', '', 'asdasd', 'asdasdasd', '1231', '2026-03-23 06:34:29', '2026-03-23 06:34:29'),
(0, 'ORD-69C277CD94E22', 5, 'pending', 880.00, 100.00, 980.00, '', 'cod', '0000-00-00', NULL, 'Quervie', 'Manrique', 'manriquequervie@gmail.com', '09123456789', 'Quezon Street', 'Random', 'Pinamalayan', 'Oriental Mindoro', '5203', '2026-03-24 11:38:53', '2026-03-24 11:38:53'),
(0, 'ORD-69C2794D5942E', 5, 'pending', 580.00, 100.00, 680.00, '', 'cod', '2–4 days', NULL, 'Quervie', 'Manrique', 'manriquequervie@gmail.com', '09123456789', 'Quezon Street', 'Random', 'Pinamalayan', 'Oriental Mindoro', '5203', '2026-03-24 11:45:17', '2026-03-24 11:45:17'),
(0, 'ORD-69C27A9CE0632', 5, 'pending', 580.00, 120.00, 700.00, 'lbc', 'cod', '3–5 days', NULL, 'Quervie', 'Manrique', 'manriquequervie@gmail.com', '09123456789', 'Quezon Street', 'new', 'Pinamalayan', 'Oriental Mindoro', '5203', '2026-03-24 11:50:52', '2026-03-24 11:50:52'),
(0, 'ORD-69C27B002A94F', 5, 'pending', 580.00, 100.00, 680.00, 'jnt', 'cod', '2–3 days', '2026-03-24 11:52:32', 'Quervie', 'Manrique', 'manriquequervie@gmail.com', '09123456789', 'Quezon Street', 'yessir', 'Pinamalayan', 'Oriental Mindoro', '5203', '2026-03-24 11:52:32', '2026-03-24 11:52:32');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `variant_id` int(11) DEFAULT NULL,
  `quantity` int(11) NOT NULL DEFAULT 1,
  `unit_price` decimal(10,2) NOT NULL,
  `subtotal` decimal(10,2) NOT NULL,
  `snapshot_name` varchar(200) DEFAULT NULL,
  `snapshot_color` varchar(50) DEFAULT NULL,
  `snapshot_size` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `variant_id`, `quantity`, `unit_price`, `subtotal`, `snapshot_name`, `snapshot_color`, `snapshot_size`) VALUES
(0, 0, 101, NULL, 1, 320.00, 320.00, 'Primrose Ribbed Baby Tee', NULL, NULL),
(0, 0, 101, NULL, 1, 320.00, 320.00, 'Primrose Ribbed Baby Tee', NULL, NULL),
(0, 0, 201, NULL, 1, 450.00, 450.00, 'Lorem Ipsum 1', NULL, NULL),
(0, 0, 101, NULL, 1, 320.00, 320.00, 'Primrose Ribbed Baby Tee', NULL, NULL),
(0, 0, 201, NULL, 1, 450.00, 450.00, 'Lorem Ipsum 1', NULL, NULL),
(0, 0, 101, NULL, 1, 320.00, 320.00, 'Primrose Ribbed Baby Tee', NULL, NULL),
(0, 0, 101, NULL, 1, 320.00, 320.00, 'Primrose Ribbed Baby Tee', NULL, NULL),
(0, 0, 201, NULL, 1, 450.00, 450.00, 'Lorem Ipsum 1', NULL, NULL),
(0, 0, 204, NULL, 1, 520.00, 520.00, 'Lavender Gold-Waist Wide Culottes', NULL, NULL),
(0, 0, 301, NULL, 2, 180.00, 360.00, 'Porcelain Floral Hand Fan', NULL, NULL),
(0, 0, 401, NULL, 1, 580.00, 580.00, 'Stone Knotted Slouch Tote', NULL, NULL),
(0, 0, 401, NULL, 1, 580.00, 580.00, 'Stone Knotted Slouch Tote', NULL, NULL),
(0, 0, 401, NULL, 1, 580.00, 580.00, 'Stone Knotted Slouch Tote', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `seller_id` int(11) NOT NULL,
  `category` varchar(100) DEFAULT NULL,
  `name` varchar(200) NOT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `img` varchar(255) DEFAULT NULL,
  `badge` varchar(50) DEFAULT NULL,
  `condition` enum('new','like_new','good','fair','poor') NOT NULL DEFAULT 'good',
  `status` enum('active','sold','archived') NOT NULL DEFAULT 'active',
  `stock` int(11) NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `seller_id`, `category`, `name`, `description`, `price`, `img`, `badge`, `condition`, `status`, `stock`, `created_at`, `updated_at`) VALUES
(102, 1, 'tops', 'Ivory Whisper Dress', 'A delicate ivory dress.', 240.00, 'public/assets/tops/top2_A.png', 'New', 'good', 'active', 1, '2025-06-08 00:00:00', '2026-03-23 13:41:05'),
(103, 1, 'tops', 'Mauve Bow-Lace Bodice', 'A mauve bodice with bow-lace detail.', 380.00, 'public/assets/tops/top3_A.png', 'New', 'good', 'active', 1, '2025-06-05 00:00:00', '2026-03-23 13:41:05'),
(104, 1, 'tops', 'Bluebell Reverie Dress', 'A dreamy bluebell dress.', 290.00, 'public/assets/tops/top4_A.png', 'New', '', 'active', 1, '2025-06-01 00:00:00', '2026-03-23 13:41:05'),
(105, 1, 'tops', 'Sage Tie-Front Cardigan', 'A sage green tie-front cardigan.', 410.00, 'public/assets/tops/top5_A.png', 'New', '', 'active', 1, '2025-06-12 00:00:00', '2026-03-23 13:41:05'),
(106, 1, 'tops', 'Cornflower Blue Velour Crop', 'A velour crop top in cornflower blue.', 350.00, 'public/assets/tops/top6_A.png', 'New', 'good', 'active', 1, '2025-05-28 00:00:00', '2026-03-23 13:41:05'),
(107, 1, 'tops', 'Rosé Petaline Dress', 'A flowy rosé petal dress.', 460.00, 'public/assets/tops/top7_A.png', 'New', '', 'active', 1, '2025-05-25 00:00:00', '2026-03-23 13:41:05'),
(108, 1, 'tops', 'Cream Pointelle Knit Polo', 'A cream knit polo with pointelle detail.', 270.00, 'public/assets/tops/top8_A.png', 'New', 'fair', 'active', 1, '2025-05-20 00:00:00', '2026-03-23 13:41:05'),
(109, 1, 'tops', 'Emerald Corset Dress', 'An emerald green corset dress.', 300.00, 'public/assets/tops/top9_A.png', 'New', 'good', 'active', 1, '2025-05-18 00:00:00', '2026-03-23 13:41:05'),
(110, 1, 'tops', 'Rosé Satin Lace Dress', 'A satin lace dress in rosé.', 330.00, 'public/assets/tops/top10_A.png', 'New', '', 'active', 1, '2025-06-13 00:00:00', '2026-03-23 13:41:05'),
(111, 1, 'tops', 'Milkmaid Chiffon Bustier', 'A chiffon milkmaid bustier top.', 390.00, 'public/assets/tops/top11_A.png', 'New', 'good', 'active', 1, '2025-05-15 00:00:00', '2026-03-23 13:41:05'),
(112, 1, 'tops', 'Midnight Bloom Dress', 'A dark floral midnight dress.', 250.00, 'public/assets/tops/top12_A.png', 'New', 'good', 'active', 1, '2025-05-10 00:00:00', '2026-03-23 13:41:05'),
(201, 1, 'bottoms', 'Champagne Baroque Embroidered Skirt', 'A full A-line skirt in warm champagne satin with ornate gold baroque embroidery across the hem.', 450.00, 'public/assets/bottoms/bottoms1_A.png', NULL, '', 'active', 1, '2025-06-14 00:00:00', '2026-03-24 19:25:26'),
(202, 1, 'bottoms', 'Sage Lace-Panel Pencil Skirt', 'A structured sage green pencil skirt adorned with gold lace side panels and a delicate front slit.', 380.00, 'public/assets/bottoms/bottoms2_A.png', NULL, 'good', 'active', 1, '2025-06-10 00:00:00', '2026-03-24 19:25:26'),
(203, 1, 'bottoms', 'Blush Bow-Embroidered Wrap Mini', 'A soft blush satin wrap mini skirt with dainty gold bow embroidery scattered across the hem.', 290.00, 'public/assets/bottoms/bottoms3_A.png', NULL, 'good', 'active', 1, '2025-06-07 00:00:00', '2026-03-24 19:25:26'),
(204, 1, 'bottoms', 'Lavender Gold-Waist Wide Culottes', 'Flowy lavender culottes with a statement gold embroidered waistband and elegant pleated front.', 520.00, 'public/assets/bottoms/bottoms4_A.png', NULL, '', 'active', 1, '2025-06-13 00:00:00', '2026-03-24 19:25:26'),
(205, 1, 'bottoms', 'Lavender Tiered Lace Ruffle Skirt', 'A whimsical triple-tiered lace mini skirt in soft lavender with delicate scalloped edges.', 340.00, 'public/assets/bottoms/bottoms5_A.png', NULL, 'fair', 'active', 1, '2025-06-02 00:00:00', '2026-03-24 19:25:26'),
(206, 1, 'bottoms', 'Sage Plaid Pleated Mini Skirt', 'A preppy sage green plaid pleated mini with charming gold bow embroidery along the hem.', 480.00, 'public/assets/bottoms/bottoms6_A.png', NULL, '', 'active', 1, '2025-05-29 00:00:00', '2026-03-24 19:25:26'),
(207, 1, 'bottoms', 'Olive Tulle Floral Embroidered Maxi', 'A dreamy olive tulle maxi skirt with cascading gold floral embroidery and an embellished waistband.', 360.00, 'public/assets/bottoms/bottoms7_A.png', NULL, 'good', 'active', 1, '2025-05-24 00:00:00', '2026-03-24 19:25:26'),
(208, 1, 'bottoms', 'Steel Blue Embroidered Hem Trousers', 'Sleek steel blue tailored trousers with intricate gold embroidery detailing at the cuffs.', 410.00, 'public/assets/bottoms/bottoms8_A.png', NULL, '', 'active', 1, '2025-05-20 00:00:00', '2026-03-24 19:25:26'),
(209, 1, 'bottoms', 'Cream Botanical Pleated Midi Skirt', 'An elegant cream pleated midi skirt with tall vertical gold botanical embroidery panels.', 550.00, 'public/assets/bottoms/bottoms9_A.png', NULL, 'good', 'active', 1, '2025-06-11 00:00:00', '2026-03-24 19:25:26'),
(210, 1, 'bottoms', 'Terracotta Baroque Circle Skirt', 'A rich terracotta full circle skirt featuring layered gold baroque embroidery across the front.', 320.00, 'public/assets/bottoms/bottoms10_A.png', NULL, 'good', 'active', 1, '2025-05-16 00:00:00', '2026-03-24 19:25:26'),
(211, 1, 'bottoms', 'Lavender Lace-Trim Bow Pencil Skirt', 'A fitted lavender pencil skirt with ivory lace trim paneling and a sweet bow accent at the waist.', 300.00, 'public/assets/bottoms/bottoms11_A.png', NULL, 'fair', 'active', 1, '2025-05-12 00:00:00', '2026-03-24 19:25:26'),
(212, 1, 'bottoms', 'Camel Peplum Pencil Skirt', 'A structured camel-toned pencil skirt with a flattering ruffled peplum waist detail.', 490.00, 'public/assets/bottoms/bottoms12_A.png', NULL, '', 'active', 1, '2025-05-08 00:00:00', '2026-03-24 19:25:26'),
(301, 1, 'accessories', 'Porcelain Floral Hand Fan', 'A vintage porcelain fan adorned with delicate painted florals and gold trim.', 180.00, 'public/assets/accessories/accessories1_A.png', NULL, '', 'active', 1, '2025-06-14 00:00:00', '2026-03-24 19:25:26'),
(302, 1, 'accessories', 'Gold Heart Chain Bracelet', 'A dainty gold chain bracelet with a sweet heart charm clasp.', 120.00, 'public/assets/accessories/accessories2_A.png', NULL, 'good', 'active', 1, '2025-06-10 00:00:00', '2026-03-24 19:25:26'),
(303, 1, 'accessories', 'Antique Gold Pocket Watch', 'A classic Roman numeral pocket watch in warm antique gold.', 95.00, 'public/assets/accessories/accessories3_A.png', NULL, 'good', 'active', 1, '2025-06-07 00:00:00', '2026-03-24 19:25:26'),
(304, 1, 'accessories', 'Gilded Floral Hair Comb', 'An ornate gold hair comb crowned with intricate floral detailing.', 220.00, 'public/assets/accessories/accessories4_A.png', NULL, '', 'active', 1, '2025-06-13 00:00:00', '2026-03-24 19:25:26'),
(305, 1, 'accessories', 'Noir Round Sunglasses', 'Sleek round black lenses with a slim gold wire frame.', 150.00, 'public/assets/accessories/accessories5_A.png', NULL, 'fair', 'active', 1, '2025-06-02 00:00:00', '2026-03-24 19:25:26'),
(306, 1, 'accessories', 'Baroque Gold Hair Comb', 'A grand baroque-style gold comb perfect for elegant updos.', 175.00, 'public/assets/accessories/accessories6_A.png', NULL, '', 'active', 1, '2025-05-29 00:00:00', '2026-03-24 19:25:26'),
(307, 1, 'accessories', 'Silver Filigree Drop Earrings', 'Intricate silver filigree earrings with a vintage chandelier silhouette.', 130.00, 'public/assets/accessories/accessories7_A.png', NULL, 'good', 'active', 1, '2025-05-24 00:00:00', '2026-03-24 19:25:26'),
(308, 1, 'accessories', 'Cognac Leather Chronograph Watch', 'A sophisticated chronograph watch with a warm cognac leather strap.', 200.00, 'public/assets/accessories/accessories8_A.png', NULL, '', 'active', 1, '2025-05-20 00:00:00', '2026-03-24 19:25:26'),
(309, 1, 'accessories', 'Silver Heart Locket Necklace', 'A dainty engraved heart locket on a delicate silver chain.', 90.00, 'public/assets/accessories/accessories9_A.png', NULL, 'good', 'active', 1, '2025-06-11 00:00:00', '2026-03-24 19:25:26'),
(310, 1, 'accessories', 'Rococo Vanity Hand Mirror', 'An ornate silver hand mirror with a blush ribbon bow handle.', 160.00, 'public/assets/accessories/accessories10_A.png', NULL, 'good', 'active', 1, '2025-05-16 00:00:00', '2026-03-24 19:25:26'),
(311, 1, 'accessories', 'Gold Leaf Chandelier Earrings', 'Statement gold earrings with layered leaf and feather detailing.', 110.00, 'public/assets/accessories/accessories11_A.png', NULL, 'fair', 'active', 1, '2025-05-12 00:00:00', '2026-03-24 19:25:26'),
(312, 1, 'accessories', 'Tortoiseshell Floral Hair Comb', 'A dark tortoiseshell comb accented with a dainty gold floral pin.', 195.00, 'public/assets/accessories/accessories12_A.png', NULL, '', 'active', 1, '2025-05-08 00:00:00', '2026-03-24 19:25:26'),
(401, 1, 'bags', 'Stone Knotted Slouch Tote', 'A relaxed stone-toned tote with signature knotted strap detail.', 580.00, 'public/assets/bags/bags1_A.png', NULL, '', 'active', 1, '2025-06-14 00:00:00', '2026-03-24 19:25:26'),
(402, 1, 'bags', 'Caramel Quilted Crossbody', 'A chic quilted crossbody in warm caramel with gold hardware.', 420.00, 'public/assets/bags/bags2_A.png', NULL, 'good', 'active', 1, '2025-06-10 00:00:00', '2026-03-24 19:25:26'),
(403, 1, 'bags', 'Riviera Straw Beach Tote', 'A breezy rattan tote with a teal woven stripe and leather handles.', 350.00, 'public/assets/bags/bags3_A.png', NULL, 'good', 'active', 1, '2025-06-07 00:00:00', '2026-03-24 19:25:26'),
(404, 1, 'bags', 'Cognac Structured Doctor Bag', 'A vintage-inspired structured doctor bag in warm cognac leather.', 720.00, 'public/assets/bags/bags4_A.png', NULL, '', 'active', 1, '2025-06-13 00:00:00', '2026-03-24 19:25:26'),
(405, 1, 'bags', 'Monogram Canvas Shopper', 'A large monogram canvas shopper tote with red lining.', 490.00, 'public/assets/bags/bags5_A.png', NULL, 'fair', 'active', 1, '2025-06-02 00:00:00', '2026-03-24 19:25:26'),
(406, 1, 'bags', 'Crimson Leather Satchel', 'A bold crimson structured satchel with double top handles.', 610.00, 'public/assets/bags/bags6_A.png', NULL, '', 'active', 1, '2025-05-29 00:00:00', '2026-03-24 19:25:26'),
(407, 1, 'bags', 'Violet Structured Handbag', 'A statement violet handbag with sleek gold-tone hardware.', 380.00, 'public/assets/bags/bags7_A.png', NULL, 'good', 'active', 1, '2025-05-24 00:00:00', '2026-03-24 19:25:26'),
(408, 1, 'bags', 'Midnight Studded Lady Bag', 'A navy structured handbag with pearl stud trim and tassel charm.', 540.00, 'public/assets/bags/bags8_A.png', NULL, '', 'active', 1, '2025-05-20 00:00:00', '2026-03-24 19:25:26'),
(409, 1, 'bags', 'Azure Minimalist Shoulder Bag', 'A clean azure blue shoulder bag with a slim silhouette.', 660.00, 'public/assets/bags/bags9_A.png', NULL, 'good', 'active', 1, '2025-06-11 00:00:00', '2026-03-24 19:25:26'),
(410, 1, 'bags', 'Cherry Red Clasp Satchel', 'A retro cherry red bag with a gold kiss-lock clasp closure.', 310.00, 'public/assets/bags/bags10_A.png', NULL, 'good', 'active', 1, '2025-05-16 00:00:00', '2026-03-24 19:25:26'),
(411, 1, 'bags', 'Burgundy Top-Handle Bag', 'A refined burgundy structured bag with silver turn-lock detail.', 290.00, 'public/assets/bags/bags11_A.png', NULL, 'fair', 'active', 1, '2025-05-12 00:00:00', '2026-03-24 19:25:27'),
(412, 1, 'bags', 'Pewter Leather Boxy Bag', 'A sleek boxy bag in muted pewter with minimalist hardware.', 750.00, 'public/assets/bags/bags12_A.png', NULL, '', 'active', 1, '2025-05-08 00:00:00', '2026-03-24 19:25:27'),
(501, 1, 'last', 'Crimson Bow Satin Blouse', 'A dramatic crimson blouse with voluminous sleeves and a neck bow.', 150.00, 'public/assets/last/last1_A.png', NULL, 'fair', 'active', 1, '2025-05-01 00:00:00', '2026-03-24 19:25:27'),
(502, 1, 'last', 'Obsidian Faux Leather Mini Skirt', 'A sleek faux leather mini skirt with a flared pleated silhouette.', 120.00, 'public/assets/last/last2_A.png', NULL, 'fair', 'active', 1, '2025-04-28 00:00:00', '2026-03-24 19:25:27'),
(503, 1, 'last', 'Gothic Heart Scepter Pin', 'An ornate black scepter brooch with a purple crystal heart centerpiece.', 90.00, 'public/assets/last/last3_A.png', NULL, 'good', 'active', 1, '2025-04-25 00:00:00', '2026-03-24 19:25:27'),
(504, 1, 'last', 'Blush Structured Top-Handle Bag', 'A soft blush bag with gold frame hardware and dual top handles.', 200.00, 'public/assets/last/last4_A.png', NULL, 'fair', 'active', 1, '2025-04-22 00:00:00', '2026-03-24 19:25:27'),
(505, 1, 'last', 'Cherry Polka Dot Swing Dress', 'A vintage-inspired cherry red polka dot dress with a full circle skirt.', 180.00, 'public/assets/last/last5_A.png', NULL, 'good', 'active', 1, '2025-04-19 00:00:00', '2026-03-24 19:25:27'),
(506, 1, 'last', 'Distressed Denim Mini Shorts', 'Classic frayed denim cutoffs with a lived-in vintage wash.', 75.00, 'public/assets/last/last6_A.png', NULL, 'fair', 'active', 1, '2025-04-16 00:00:00', '2026-03-24 19:25:27'),
(507, 1, 'last', 'Gold Floral Bangle Bracelet', 'A delicate gold bangle adorned with sparkling floral crystal clusters.', 230.00, 'public/assets/last/last7_A.png', NULL, 'good', 'active', 1, '2025-04-13 00:00:00', '2026-03-24 19:25:27'),
(508, 1, 'last', 'Chestnut Leather Briefcase Bag', 'A rich chestnut leather satchel with buckle straps and structured frame.', 110.00, 'public/assets/last/last8_A.png', NULL, 'fair', 'active', 1, '2025-04-10 00:00:00', '2026-03-24 19:25:27'),
(509, 1, 'last', 'Gold Embroidered Bridal Crop Top', 'An opulent embroidered crop top with floral gold threadwork and jewel trim.', 165.00, 'public/assets/last/last9_A.png', NULL, 'good', 'active', 1, '2025-04-07 00:00:00', '2026-03-24 19:25:27'),
(510, 1, 'last', 'Noir Quilted Chain Frame Bag', 'A bold black quilted bag with gold chain handles and frame closure.', 95.00, 'public/assets/last/last10_A.png', NULL, 'fair', 'active', 1, '2025-04-04 00:00:00', '2026-03-24 19:25:27'),
(511, 1, 'last', 'Tan Leather Classic Belt', 'A timeless tan leather belt with a brushed silver buckle.', 140.00, 'public/assets/last/last11_A.png', NULL, 'fair', 'active', 1, '2025-04-01 00:00:00', '2026-03-24 19:25:27'),
(512, 1, 'last', 'Celestial Blue Tiered Ball Gown', 'A dreamy sky blue tulle ball gown with cascading lace-trimmed tiers.', 85.00, 'public/assets/last/last12_A.png', NULL, 'good', 'active', 1, '2025-03-29 00:00:00', '2026-03-24 19:25:27');

-- --------------------------------------------------------

--
-- Table structure for table `product_variants`
--

CREATE TABLE `product_variants` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `color` varchar(50) DEFAULT NULL,
  `size` varchar(30) DEFAULT NULL,
  `stock` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `role` varchar(20) DEFAULT 'user',
  `first_name` varchar(100) DEFAULT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `bio` text DEFAULT NULL,
  `profile_picture` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `created_at`, `updated_at`, `role`, `first_name`, `last_name`, `phone`, `city`, `bio`, `profile_picture`) VALUES
(1, 'sixseven', 'manriquequervie1@gmail.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2026-03-19 13:01:48', '2026-03-23 14:35:02', 'user', 'Quervie', 'Manrique', '0912370415112', 'ughhh idk', 'asdasdasd', '1774247702_cef10e34874e05a3b1a5.webp'),
(2, 'admin', 'admin@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2026-03-22 15:23:30', '2026-03-22 15:23:30', 'admin', NULL, NULL, NULL, NULL, NULL, NULL),
(5, 'sixseven123', 'manriquequervie@gmail.com', '$2y$10$ID/YN.aX/o.DRmDasGwgNeppJFcfJpsmFdifbfP68db9ovW2BtsiW', '2026-03-24 11:26:52', '2026-03-24 11:26:52', 'user', NULL, NULL, NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=515;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
