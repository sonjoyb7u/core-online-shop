-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 12, 2020 at 08:51 AM
-- Server version: 5.7.24
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_online_shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cart`
--

CREATE TABLE IF NOT EXISTS `tbl_cart` (
  `p_id` int(11) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `qty` int(11) NOT NULL,
  `size` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_categories`
--

CREATE TABLE IF NOT EXISTS `tbl_categories` (
  `cat_id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_title` varchar(255) NOT NULL,
  `cat_description` text NOT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_categories`
--

INSERT INTO `tbl_categories` (`cat_id`, `cat_title`, `cat_description`) VALUES
(1, 'Men', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur sit amet malesuada lacus. Vivamus magna nisl, egestas vel odio sit amet, lobortis pulvinar ante. Donec gravida mi nec vestibulum mollis. Pellentesque non elementum velit.'),
(2, 'Women', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur sit amet malesuada lacus. Vivamus magna nisl, egestas vel odio sit amet, lobortis pulvinar ante. Donec gravida mi nec vestibulum mollis. Pellentesque non elementum velit.'),
(3, 'Boys', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur sit amet malesuada lacus. Vivamus magna nisl, egestas vel odio sit amet, lobortis pulvinar ante. Donec gravida mi nec vestibulum mollis. Pellentesque non elementum velit.'),
(4, 'Girls', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur sit amet malesuada lacus. Vivamus magna nisl, egestas vel odio sit amet, lobortis pulvinar ante. Donec gravida mi nec vestibulum mollis. Pellentesque non elementum velit.'),
(5, 'Kids', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur sit amet malesuada lacus. Vivamus magna nisl, egestas vel odio sit amet, lobortis pulvinar ante. Donec gravida mi nec vestibulum mollis. Pellentesque non elementum velit.'),
(6, 'Others', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur sit amet malesuada lacus. Vivamus magna nisl, egestas vel odio sit amet, lobortis pulvinar ante. Donec gravida mi nec vestibulum mollis. Pellentesque non elementum velit.');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customers`
--

CREATE TABLE IF NOT EXISTS `tbl_customers` (
  `customer_id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_name` varchar(255) NOT NULL,
  `customer_email` varchar(255) NOT NULL,
  `customer_pass` varchar(100) NOT NULL,
  `customer_country` varchar(100) NOT NULL,
  `customer_city` varchar(100) NOT NULL,
  `customer_contact` varchar(255) NOT NULL,
  `customer_address` varchar(255) NOT NULL,
  `customer_image` varchar(255) DEFAULT NULL,
  `customer_ip` varchar(255) NOT NULL,
  PRIMARY KEY (`customer_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_customers`
--

INSERT INTO `tbl_customers` (`customer_id`, `customer_name`, `customer_email`, `customer_pass`, `customer_country`, `customer_city`, `customer_contact`, `customer_address`, `customer_image`, `customer_ip`) VALUES
(1, 'Mr. John Barua', 'john@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Bangladesh', 'Chittagong', '01811591944', '99/A, Chawttashawri road, Ctg.', '394.Mr. John Barua.jpg', '::1'),
(2, 'Piyal Barua', 'piyal@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Bangladesh', 'Dhaka', '01673787900', '91/A-South-Khali, Airport, Dhaka.', '809.Piyal Barua.jpg', '::1'),
(3, 'Peow Barua', 'peow@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Bangladesh', 'Chittagong', '01673787900', '99/A, Chawttashawri road, Mehadibagh Lane, Ctg.', '831.Peow Barua.png', '::1'),
(4, 'Payel Barua', 'payel@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Bangladesh', 'Chittagong', '01811591944', '99/A, Chawttashawri road, Mehadibagh Lane, Ctg.', '550.Payel Barua.jpeg', '::1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer_orders`
--

CREATE TABLE IF NOT EXISTS `tbl_customer_orders` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(10) NOT NULL,
  `due_amount` float NOT NULL,
  `invoice_no` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `size` varchar(100) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `order_status` varchar(100) NOT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_customer_orders`
--

INSERT INTO `tbl_customer_orders` (`order_id`, `customer_id`, `due_amount`, `invoice_no`, `qty`, `size`, `order_date`, `order_status`) VALUES
(1, 1, 299.99, 25868327, 1, 'Medium', '2019-10-04 18:25:56', 'pending'),
(2, 2, 199.99, 1364670539, 1, 'Medium', '2019-10-05 08:04:42', 'Completed'),
(3, 2, 125.99, 1364670539, 1, 'Medium', '2019-10-04 18:34:39', 'pending'),
(4, 1, 299.99, 2104138426, 1, 'Medium', '2019-10-05 07:51:55', 'Completed');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_payments`
--

CREATE TABLE IF NOT EXISTS `tbl_payments` (
  `payment_id` int(11) NOT NULL AUTO_INCREMENT,
  `invoice_no` int(11) NOT NULL,
  `amount` float NOT NULL,
  `payment_mode` varchar(255) NOT NULL,
  `reference_no` int(11) DEFAULT NULL,
  `code` int(11) DEFAULT NULL,
  `payment_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`payment_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_payments`
--

INSERT INTO `tbl_payments` (`payment_id`, `invoice_no`, `amount`, `payment_mode`, `reference_no`, `code`, `payment_date`) VALUES
(1, 1364670539, 199.99, 'DBBL-Rocket', 789123456, 1, '2019-10-05 08:04:42');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pending_orders`
--

CREATE TABLE IF NOT EXISTS `tbl_pending_orders` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NOT NULL,
  `invoice_no` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `size` varchar(100) NOT NULL,
  `order_status` varchar(100) NOT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_pending_orders`
--

INSERT INTO `tbl_pending_orders` (`order_id`, `customer_id`, `invoice_no`, `product_id`, `qty`, `size`, `order_status`) VALUES
(1, 1, 25868327, 6, 1, 'Medium', 'pending'),
(2, 2, 1364670539, 5, 1, 'Medium', 'Completed'),
(3, 2, 1364670539, 1, 1, 'Medium', 'pending'),
(4, 1, 2104138426, 6, 1, 'Medium', 'Completed');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_products`
--

CREATE TABLE IF NOT EXISTS `tbl_products` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `p_cat_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `product_title` varchar(255) NOT NULL,
  `product_img_1` text NOT NULL,
  `product_img_2` text NOT NULL,
  `product_img_3` text NOT NULL,
  `product_price` float NOT NULL,
  `product_description` text NOT NULL,
  `product_keywords` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_products`
--

INSERT INTO `tbl_products` (`product_id`, `p_cat_id`, `cat_id`, `product_title`, `product_img_1`, `product_img_2`, `product_img_3`, `product_price`, `product_description`, `product_keywords`, `created_at`, `modified_at`) VALUES
(1, 2, 1, 'Men color Step Shirt', '86.Shirts.jpg', '1595.Shirts.jpg', '2601.Shirts.jpg', 125.99, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur eget felis sit amet nulla bibendum mattis eget vehicula lacus. Donec pharetra dignissim tortor et viverra. Suspendisse scelerisque, massa a sagittis fermentum, elit sem interdum nunc, sit amet pretium mi lacus in ante. Pellentesque sit amet mollis tellus. Maecenas placerat lorem sit amet enim rutrum, eu malesuada purus cursus. Nunc dictum blandit augue convallis hendrerit. Donec consequat ac massa in fermentum.', 'Shirts', '2019-10-02 05:44:45', '2019-10-02 05:44:45'),
(2, 2, 2, 'Women color Step Shirt', '740.Shirts.jpg', '1416.Shirts.jpg', '2625.Shirts.jpg', 129.99, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur eget felis sit amet nulla bibendum mattis eget vehicula lacus. Donec pharetra dignissim tortor et viverra. Suspendisse scelerisque, massa a sagittis fermentum, elit sem interdum nunc, sit amet pretium mi lacus in ante. Pellentesque sit amet mollis tellus. Maecenas placerat lorem sit amet enim rutrum, eu malesuada purus cursus. Nunc dictum blandit augue convallis hendrerit. Donec consequat ac massa in fermentum.', 'Shirts', '2019-10-02 05:46:25', '2019-10-02 05:46:25'),
(3, 5, 1, 'Men color T-shirt', '385.T-Shirts.jpg', '1490.T-Shirts.jpg', '2445.T-Shirts.jpg', 75.99, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur eget felis sit amet nulla bibendum mattis eget vehicula lacus. Donec pharetra dignissim tortor et viverra. Suspendisse scelerisque, massa a sagittis fermentum, elit sem interdum nunc, sit amet pretium mi lacus in ante. Pellentesque sit amet mollis tellus.', 'T-Shirts', '2019-10-02 05:48:17', '2019-10-02 05:48:17'),
(4, 5, 5, 'Kids color T-shirt', '951.T-Shirts.jpeg', '1292.T-Shirts.jpeg', '2244.T-Shirts.jpeg', 99.99, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur eget felis sit amet nulla bibendum mattis eget vehicula lacus. Donec pharetra dignissim tortor et viverra. Suspendisse scelerisque, massa a sagittis fermentum, elit sem interdum nunc, sit amet pretium mi lacus in ante. Pellentesque sit amet mollis tellus.', 'T-Shirts', '2019-10-02 06:28:24', '2019-10-02 06:28:24'),
(5, 4, 1, 'Men Shoes', '395.Shoes.jpeg', '1852.Shoes.jpeg', '2076.Shoes.jpeg', 199.99, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur eget felis sit amet nulla bibendum mattis eget vehicula lacus. Donec pharetra dignissim tortor et viverra. Suspendisse scelerisque, massa a sagittis fermentum, elit sem interdum nunc, sit amet pretium mi lacus in ante. Pellentesque sit amet mollis tellus.', 'Shoes', '2019-10-02 06:32:00', '2019-10-02 06:32:00'),
(6, 1, 1, 'Men Lethar Jacket', '215.Jacket.jpg', '1698.Jacket.jpg', '2560.Jacket.jpg', 299.99, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur eget felis sit amet nulla bibendum mattis eget vehicula lacus. Donec pharetra dignissim tortor et viverra. Suspendisse scelerisque, massa a sagittis fermentum, elit sem interdum nunc, sit amet pretium mi lacus in ante. Pellentesque sit amet mollis tellus.', 'Jacket', '2019-10-02 06:35:28', '2019-10-02 06:35:28'),
(7, 1, 2, 'Womens Jacket', '37.Jacket.jpg', '1065.Jacket.jpg', '2471.Jacket.jpg', 399.99, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur eget felis sit amet nulla bibendum mattis eget vehicula lacus. Donec pharetra dignissim tortor et viverra. Suspendisse scelerisque, massa a sagittis fermentum, elit sem interdum nunc, sit amet pretium mi lacus in ante. Pellentesque sit amet mollis tellus.', 'Jacket', '2019-10-02 06:36:50', '2019-10-03 09:11:17'),
(8, 6, 5, 'Kids Accessories', '832.Accessories.jpeg', '1849.Accessories.jpeg', '2323.Accessories.jpeg', 39.99, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur eget felis sit amet nulla bibendum mattis eget vehicula lacus. Donec pharetra dignissim tortor et viverra. Suspendisse scelerisque, massa a sagittis fermentum, elit sem interdum nunc, sit amet pretium mi lacus in ante. Pellentesque sit amet mollis tellus.', 'Accessories', '2019-10-02 06:39:25', '2019-10-02 06:39:25'),
(9, 6, 1, 'Men Accessories', '398.Accessories.jpg', '1844.Accessories.jpg', '2040.Accessories.jpg', 499.99, '\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur eget felis sit amet nulla bibendum mattis eget vehicula lacus. Donec pharetra dignissim tortor et viverra. Suspendisse scelerisque, massa a sagittis fermentum, elit sem interdum nunc, sit amet pretium mi lacus in ante. Pellentesque sit amet mollis tellus. Maecenas placerat lorem sit amet enim rutrum, eu malesuada purus cursus. Nunc dictum blandit augue convallis hendrerit. Donec consequat ac massa in fermentum. Morbi fringilla sapien in dolor fermentum placerat. Nunc maximus sapien ligula, eget bibendum neque facilisis a.', 'Accessories', '2019-10-02 07:32:10', '2019-10-02 07:32:10');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product_categories`
--

CREATE TABLE IF NOT EXISTS `tbl_product_categories` (
  `p_cat_id` int(11) NOT NULL AUTO_INCREMENT,
  `p_cat_title` varchar(255) NOT NULL,
  `p_cat_description` text NOT NULL,
  PRIMARY KEY (`p_cat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_product_categories`
--

INSERT INTO `tbl_product_categories` (`p_cat_id`, `p_cat_title`, `p_cat_description`) VALUES
(1, 'Jackets', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo deleniti accusamus, consequuntur illum quasi ut. Voluptate a, ipsam repellendus ut fugiat minima? Id facilis itaque autem, officiis veritatis perferendis, quaerat!'),
(2, 'Shirts', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo deleniti accusamus, consequuntur illum quasi ut. Voluptate a, ipsam repellendus ut fugiat minima? Id facilis itaque autem, officiis veritatis perferendis, quaerat!'),
(3, 'Pants', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo deleniti accusamus, consequuntur illum quasi ut. Voluptate a, ipsam repellendus ut fugiat minima? Id facilis itaque autem, officiis veritatis perferendis, quaerat!'),
(4, 'Shoes', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo deleniti accusamus, consequuntur illum quasi ut. Voluptate a, ipsam repellendus ut fugiat minima? Id facilis itaque autem, officiis veritatis perferendis, quaerat!'),
(5, 'T-shirt', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo deleniti accusamus, consequuntur illum quasi ut. Voluptate a, ipsam repellendus ut fugiat minima? Id facilis itaque autem, officiis veritatis perferendis, quaerat!'),
(6, ' 	Accessories', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo deleniti accusamus, consequuntur illum quasi ut. Voluptate a, ipsam repellendus ut fugiat minima? Id facilis itaque autem, officiis veritatis perferendis, quaerat!');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_slider`
--

CREATE TABLE IF NOT EXISTS `tbl_slider` (
  `slider_id` int(11) NOT NULL AUTO_INCREMENT,
  `slider_name` varchar(255) NOT NULL,
  `slider_title` varchar(255) NOT NULL,
  `slider_image` text NOT NULL,
  `slider_description` text NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`slider_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_slider`
--

INSERT INTO `tbl_slider` (`slider_id`, `slider_name`, `slider_title`, `slider_image`, `slider_description`, `is_active`, `created_at`, `modified_at`) VALUES
(1, 'Slider Number-1', 'Great Deal Offer\'s', 'slider-5.jpeg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, Lorem ipsum dolor sit amet. consectetur.', 1, '2019-10-01 13:41:25', '2019-10-01 14:49:11'),
(2, 'Slider Number-2', 'Get Discount Offer\'s', 'slider-6.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, Lorem ipsum dolor sit amet. consectetur.', 1, '2019-10-01 13:41:25', '2019-10-01 14:49:21'),
(3, 'Slider Number-3', 'Exclusive Collecttion\'s', 'slider-7.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, Lorem ipsum dolor sit amet. consectuter.', 1, '2019-10-01 13:41:25', '2019-10-01 13:42:42');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
