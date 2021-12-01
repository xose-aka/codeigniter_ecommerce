-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 25, 2021 at 12:17 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecomerce_ci2`
--

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` int(11) NOT NULL,
  `main_text` varchar(200) NOT NULL,
  `second_text` varchar(200) NOT NULL,
  `banner_order` int(1) DEFAULT NULL,
  `img` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `main_text`, `second_text`, `banner_order`, `img`, `created_at`) VALUES
(5, 'Good', 'Excelent', NULL, '/assets/uploads/banner/256436194b95728930.png', '2021-11-17 08:12:07'),
(6, 'Jewelery', 'Jewelery', NULL, '/assets/uploads/banner/315456194bed57e046.png', '2021-11-17 08:35:33');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` int(11) NOT NULL,
  `title` varchar(40) NOT NULL,
  `slug` varchar(40) NOT NULL,
  `image` varchar(80) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `title`, `slug`, `image`, `created_at`) VALUES
(3, 'Rolex', 'rolex', '/assets/uploads/brand/316896191913a91439.png', '2021-11-14 22:44:10'),
(6, 'Casio', 'casio', '/assets/uploads/brand/111456194c74ff2cfapng.png', '2021-11-17 09:11:44'),
(7, 'Vida', 'vida', '/assets/uploads/brand/305336194c769a7f7cpng.png', '2021-11-17 09:12:09'),
(8, 'Sport', 'sport', '/assets/uploads/brand/170896194c77588d72png.png', '2021-11-17 09:12:21'),
(9, 'Rado', 'rado', '/assets/uploads/brand/189416194c786b19b9png.png', '2021-11-17 09:12:38'),
(10, 'Seiko', 'seiko', '/assets/uploads/brand/22976194c7987b396png.png', '2021-11-17 09:12:56');

-- --------------------------------------------------------

--
-- Table structure for table `cart_items`
--

CREATE TABLE `cart_items` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(5) NOT NULL,
  `total_price_dollar` int(11) NOT NULL,
  `total_price_euro` int(5) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart_items`
--

INSERT INTO `cart_items` (`id`, `user_id`, `product_id`, `quantity`, `total_price_dollar`, `total_price_euro`, `created_at`, `updated_at`) VALUES
(11, 1, 30, 2, 700, 600, '2021-11-18 13:36:01', '2021-11-18 13:36:01');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `slug` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `title`, `slug`, `created_at`, `updated_at`, `deleted_at`) VALUES
(8, 'Fashion', 'fashion', '2021-11-12 14:08:32', '2021-11-12 14:08:32', NULL),
(10, 'Watches', 'watches', '2021-11-12 14:20:35', '2021-11-12 14:20:35', NULL),
(11, 'Jewelery', 'jewelery', '2021-11-12 14:21:12', '2021-11-12 14:21:12', NULL),
(12, 'Shoes', 'shoes', '2021-11-12 14:26:46', '2021-11-12 14:26:46', NULL),
(15, 'Fine Jewelery', 'fine_jewelery', '2021-11-17 09:14:00', '2021-11-17 09:14:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `discounts`
--

CREATE TABLE `discounts` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `percent` int(4) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `discounts`
--

INSERT INTO `discounts` (`id`, `title`, `percent`, `description`, `image`, `created_at`, `updated_at`, `deleted_at`) VALUES
(4, 'ttt', 1, 'dwad', '/assets/uploads/discount/156196195a27e20e19.png', '2021-11-18 00:46:54', '2021-11-18 00:46:54', NULL),
(5, '[value-2]', 0, '[value-4]', '[value-5]', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `inventories`
--

CREATE TABLE `inventories` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `inventory_items`
--

CREATE TABLE `inventory_items` (
  `id` int(11) NOT NULL,
  `inventory_id` int(11) NOT NULL,
  `product_variant_id` int(11) NOT NULL,
  `quantity` int(6) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `payment_id` int(11) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `product_variant_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `discount_id` int(11) DEFAULT NULL,
  `quantity` int(5) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `description` text DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `category_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `discount_id` int(11) DEFAULT NULL,
  `price_dollar` int(10) NOT NULL,
  `price_euro` int(5) NOT NULL,
  `color` varchar(20) NOT NULL,
  `weight` int(10) NOT NULL,
  `material` varchar(200) NOT NULL,
  `style` varchar(200) DEFAULT NULL,
  `quantity` int(10) NOT NULL,
  `description` text NOT NULL,
  `view` int(5) NOT NULL DEFAULT 0,
  `sold` int(5) NOT NULL DEFAULT 0,
  `recommended` tinyint(1) NOT NULL DEFAULT 0,
  `status` enum('public','upcoming','hidden') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `category_id`, `brand_id`, `discount_id`, `price_dollar`, `price_euro`, `color`, `weight`, `material`, `style`, `quantity`, `description`, `view`, `sold`, `recommended`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(29, 'Rolex pro', 10, 3, 4, 130, 120, 'white', 1, 'Silver', 'Sport', 6, 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like)', 0, 0, 0, 'public', '2021-11-18 08:28:06', '2021-11-24 09:02:08', NULL),
(30, 'Green ring', 11, 6, 0, 350, 300, 'yellow', 1, 'Gold', 'Wedding', 2, 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like)', 0, 0, 1, 'public', '2021-11-18 09:23:40', '2021-11-18 09:23:40', NULL),
(31, 'Round brace', 11, 6, 0, 150, 120, 'yellow', 1, 'gold', 'Wedding', 3, 'Многие думают, что Lorem Ipsum - взятый с потолка псевдо-латинский набор слов, но это не совсем так. Его корни уходят в один фрагмент классической латыни 45 года н.э., то есть более двух тысячелетий назад. Ричард МакКлинток, профессор латыни из колледжа Hampden-Sydney, штат Вирджиния, взял одно из самых странных слов в Lorem Ipsum, \"consectetur\", и занялся его поисками в классической латинской литературе. В результате он нашёл неоспоримый первоисточник Lorem Ipsum в разделах 1.10.32 и 1.10.33 книги \"de Finibus Bonorum et Malorum\" (\"О пределах добра и зла\"), написанной Цицероном в 45 году н.э. Этот трактат по теории этики был очень популярен в эпоху Возрождения. Первая строка Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", происходит от одной из строк в разделе 1.10.32', 0, 0, 1, 'public', '2021-11-24 09:04:09', '2021-11-24 09:04:09', NULL),
(32, 'Plastic brace', 12, 9, 0, 8, 5, 'black', 1, 'rubber', 'sport', 50, 'Developers often desire different system behavior depending on whether an application is running in a development or production environment. For example, verbose error output is something that would be useful while developing an application, but it may also pose a security issue when \"live\".', 0, 0, 0, 'public', '2021-11-24 09:05:58', '2021-11-24 09:05:58', NULL),
(33, 'Throat jew', 11, 10, 0, 380, 300, 'yellow', 1, 'gold', 'wedding', 1, 'Developers often desire different system behavior depending on whether an application is running in a development or production environment. For example, verbose error output is something that would be useful while developing an application, but it may also pose a security issue when \"live\".', 0, 0, 0, 'upcoming', '2021-11-24 09:08:07', '2021-11-24 09:08:07', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `path` varchar(255) NOT NULL,
  `main` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `title`, `path`, `main`, `created_at`) VALUES
(25, 29, '3127661960e96a3b0a.jpg', '/assets/uploads/product/', 1, '2021-11-18 08:28:06'),
(26, 30, '2120961961b9c71f18.png', '/assets/uploads/product/', 1, '2021-11-18 09:23:40'),
(27, 31, '1637744649_30101619e00094f73a.jpg', '/assets/uploads/product/', 1, '2021-11-24 09:04:09'),
(28, 31, '1637744649_9898619e000974794.jpg', '/assets/uploads/product/', 0, '2021-11-24 09:04:09'),
(29, 32, '1637744759_13897619e00773b761.jpg', '/assets/uploads/product/', 1, '2021-11-24 09:05:59'),
(30, 33, '1637744887_3674619e00f7aee86.jpg', '/assets/uploads/product/', 1, '2021-11-24 09:08:07');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(25) NOT NULL,
  `surname` varchar(25) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(20) NOT NULL,
  `type` enum('admin','user') NOT NULL DEFAULT 'user',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `surname`, `username`, `password`, `type`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'User', 'Userovic', 'admin', '123', 'admin', '2021-11-11 11:59:12', '2021-11-11 11:59:12', NULL),
(2, 'xose', 'xose', 'xose', '123', 'user', '2021-11-11 15:50:34', '2021-11-11 15:50:34', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart_items`
--
ALTER TABLE `cart_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `discounts`
--
ALTER TABLE `discounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inventories`
--
ALTER TABLE `inventories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inventory_items`
--
ALTER TABLE `inventory_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `cart_items`
--
ALTER TABLE `cart_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `discounts`
--
ALTER TABLE `discounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `inventories`
--
ALTER TABLE `inventories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `inventory_items`
--
ALTER TABLE `inventory_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
