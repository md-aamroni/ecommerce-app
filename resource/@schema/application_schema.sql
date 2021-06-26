/*
 *
 * Content	: Database Schema
 * Date		: April 21, 2021
 * Developer: md.aamroni
 * Version	: 1.0
 * License	:
 * PHP Version: 7.4+
 */

CREATE DATABASE 'ecommerce_app_rdb' CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;


CREATE TABLE IF NOT EXISTS `countries` (
	`id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`iso` varchar(255) NOT NULL,
	`name` varchar(255) NOT NULL,
	`code` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE utf8mb4_general_ci AUTO_INCREMENT=1;


CREATE TABLE IF NOT EXISTS `admins` (
	`id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`full_name` varchar(255) NOT NULL,
	`email` varchar(255) NOT NULL,
	`password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
	`roles` enum('Root Admin','Administrator','Manager','Accountant') NOT NULL DEFAULT 'Administrator',
	`is_active` enum('Active','Inactive') NOT NULL DEFAULT 'Inactive',
	`created_at` datetime NULL,
	`updated_at` datetime NULL,
	`deleted_at` datetime NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE utf8mb4_general_ci AUTO_INCREMENT=1;


CREATE TABLE IF NOT EXISTS `customers` (
	`id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`first_name` varchar(255) NULL,
	`last_name` varchar(255) NULL,
	`email` varchar(128) NULL,
	`mobile` varchar(64) NULL,
	`password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
	`is_active` enum('Active','Inactive') NOT NULL DEFAULT 'Active',
	`latitude` varchar(255) NULL,
	`longitude` varchar(255) NULL,
	`ip_address` varchar(255) NULL,
	`platform` varchar(255) NULL,
	`os_device` varchar(255) NULL,
	`user_agent` varchar(255) NULL,
	`created_at` datetime NULL,
	`updated_at` datetime NULL,
	`deleted_at` datetime NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE utf8mb4_general_ci AUTO_INCREMENT=1;


CREATE TABLE IF NOT EXISTS `customer_profiles` (
	`id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`customer_id` int(11) NOT NULL,
	`avatar` varchar(255) NULL,
	`birth_date` date NULL,
	`address` varchar(255) NULL,
	`city` varchar(128) NULL,
	`post_code` varchar(64) NULL,
	`state` varchar(64) NULL,
	`country_id` int(11) NOT NULL,
	`profession` enum('Active','Inactive') NOT NULL DEFAULT 'Active',
	`organization` varchar(255) NULL,
	`created_at` datetime NULL,
	`updated_at` datetime NULL,
	`deleted_at` datetime NULL,
	FOREIGN KEY(`customer_id`) REFERENCES `customers` (`id`)
	ON DELETE RESTRICT
	ON UPDATE CASCADE,
	FOREIGN KEY(`country_id`) REFERENCES `countries` (`id`)
	ON DELETE RESTRICT
	ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE utf8mb4_general_ci AUTO_INCREMENT=1;


CREATE TABLE IF NOT EXISTS `billing_addresses` (
	`id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`customer_id` int(11) NOT NULL,
	`full_name` varchar(255) NULL,
	`email` varchar(255) NULL,
	`mobile` varchar(64) NULL,
	`address` varchar(255) NULL,
	`city` varchar(128) NULL,
	`post_code` varchar(64) NULL,
	`state` varchar(64) NULL,
	`country_id` int(11) NOT NULL,
	`created_at` datetime NULL,
	`updated_at` datetime NULL,
	`deleted_at` datetime NULL,
	FOREIGN KEY(`customer_id`) REFERENCES `customers` (`id`)
	ON DELETE RESTRICT
	ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE utf8mb4_general_ci AUTO_INCREMENT=1;


CREATE TABLE IF NOT EXISTS `shipping_addresses` (
	`id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`customer_id` int(11) NOT NULL,
	`full_name` varchar(255) NULL,
	`mobile` varchar(64) NULL,
	`address` varchar(255) NULL,
	`city` varchar(128) NULL,
	`post_code` varchar(64) NULL,
	`state` varchar(64) NULL,
	`country_id` int(11) NOT NULL,
	`created_at` datetime NULL,
	`updated_at` datetime NULL,
	`deleted_at` datetime NULL,
	FOREIGN KEY(`customer_id`) REFERENCES `customers` (`id`)
	ON DELETE RESTRICT
	ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE utf8mb4_general_ci AUTO_INCREMENT=1;


CREATE TABLE IF NOT EXISTS `sliders` (
	`id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`title` varchar(255) NOT NULL,
	`sub_title` varchar(255) NULL,
	`images` varchar(255) NOT NULL,
	`alt_text` varchar(255) NOT NULL,
	`sequence` int(11) NULL,
	`is_active` enum('Active','Inactive') NOT NULL DEFAULT 'Active',
	`created_at` datetime NULL,
	`updated_at` datetime NULL,
	`deleted_at` datetime NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE utf8mb4_general_ci AUTO_INCREMENT=1;


CREATE TABLE IF NOT EXISTS `categories` (
	`id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`title` varchar(255) NULL,
	`is_stock` enum('Stock In','Stock Out') NOT NULL DEFAULT 'Stock Out',
	`created_at` datetime NULL,
	`updated_at` datetime NULL,
	`deleted_at` datetime NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE utf8mb4_general_ci AUTO_INCREMENT=1;


CREATE TABLE IF NOT EXISTS `sub_categories` (
	`id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`category_id` int(11) NOT NULL,
	`title` varchar(255) NULL,
	`is_stock` enum('Stock In','Stock Out') NOT NULL DEFAULT 'Stock Out',
	`banner` text DEFAULT NULL,
	`created_at` datetime NULL,
	`updated_at` datetime NULL,
	`deleted_at` datetime NULL,
	FOREIGN KEY(`category_id`) REFERENCES `categories` (`id`)
	ON DELETE RESTRICT
	ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE utf8mb4_general_ci AUTO_INCREMENT=1;


CREATE TABLE IF NOT EXISTS `products` (
	`id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`category_id` int(11) NOT NULL,
	`subcategory_id` int(11) NOT NULL,
	`title` varchar(255) NULL,
	`excerpt` varchar(255) NULL,
	`images` varchar(255) NOT NULL,
	`price` double NOT NULL,
	`is_featured` enum('Yes','No') NOT NULL DEFAULT 'No',
	`is_sale` enum('Yes','No') NOT NULL DEFAULT 'No',
	`sale_off` double NULL,
	`sale_start` datetime NULL,
	`sale_end` datetime NULL,
	`is_stock` enum('Stock In','Stock Out') NOT NULL DEFAULT 'Stock Out',
	`total_stock` int(11) NULL,
	`total_click` int(11) NULL,
	`reviews` double NULL,
	`ratings` int(11) NULL,
	`created_at` datetime NULL,
	`updated_at` datetime NULL,
	`deleted_at` datetime NULL,
	FOREIGN KEY(`category_id`) REFERENCES `categories` (`id`)
	ON DELETE RESTRICT
	ON UPDATE CASCADE,
	FOREIGN KEY(`subcategory_id`) REFERENCES `sub_categories` (`id`)
	ON DELETE RESTRICT
	ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE utf8mb4_general_ci AUTO_INCREMENT=1;


CREATE TABLE IF NOT EXISTS `product_images` (
	`id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`product_id` int(11) NOT NULL,
	`title` varchar(255) NULL,
	`alt_text` varchar(255) NULL,
	`images` varchar(255) NOT NULL,
	`is_active` enum('Active','Inactive') NOT NULL DEFAULT 'Active',
	`created_at` datetime NULL,
	`updated_at` datetime NULL,
	`deleted_at` datetime NULL,
	FOREIGN KEY(`product_id`) REFERENCES `products` (`id`)
	ON DELETE RESTRICT
	ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE utf8mb4_general_ci AUTO_INCREMENT=1;


CREATE TABLE IF NOT EXISTS `product_stocks` (
	`id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`product_id` int(11) NOT NULL,
	`color` varchar(255) NULL,
	`size` varchar(255) NULL,
	`quantity` varchar(255) NOT NULL,
	`created_at` datetime NULL,
	`updated_at` datetime NULL,
	`deleted_at` datetime NULL,
	FOREIGN KEY(`product_id`) REFERENCES `products` (`id`)
	ON DELETE RESTRICT
	ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE utf8mb4_general_ci AUTO_INCREMENT=1;


CREATE TABLE IF NOT EXISTS `product_details` (
	`id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`product_id` int(11) NOT NULL,
	`sku` varchar(255) NULL,
	`description` text NULL,
	`materials` varchar(255) NULL,
	`care_instruction` text NULL,
	`tags` text NULL,
	`created_at` datetime NULL,
	`updated_at` datetime NULL,
	`deleted_at` datetime NULL,
	FOREIGN KEY(`product_id`) REFERENCES `products` (`id`)
	ON DELETE RESTRICT
	ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE utf8mb4_general_ci AUTO_INCREMENT=1;


CREATE TABLE IF NOT EXISTS `coupons` (
	`id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`code` varchar(255) NOT NULL,
	`price` double NOT NULL,
	`percentage` double NOT NULL,
	`max_total_amount` double NOT NULL,
	`start_date` datetime NOT NULL,
	`end_date` datetime NOT NULL,
	`is_premium_user` enum('Premium','Regular') NOT NULL DEFAULT 'Regular',
	`user_limit` int(11) NULL,
	`total_usage` int(11) NULL,
	`is_expired` enum('Inactive','OnGoing','Expired') NOT NULL DEFAULT 'Inactive',
	`created_at` datetime NULL,
	`updated_at` datetime NULL,
	`deleted_at` datetime NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE utf8mb4_general_ci AUTO_INCREMENT=1;


CREATE TABLE IF NOT EXISTS `contacts` (
	`id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`full_name` varchar(128) NULL,
	`email` varchar(128) NULL,
	`mobile` varchar(64) NULL,
	`messages` text NULL,
	`latitude` varchar(255) NULL,
	`longitude` varchar(255) NULL,
	`ip_address` varchar(255) NULL,
	`platform` varchar(255) NULL,
	`os_device` varchar(255) NULL,
	`user_agent` varchar(255) NULL,
	`created_at` datetime NULL,
	`updated_at` datetime NULL,
	`deleted_at` datetime NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE utf8mb4_general_ci AUTO_INCREMENT=1;


CREATE TABLE IF NOT EXISTS `subscribers` (
	`id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`email` varchar(128) NOT NULL,
	`latitude` varchar(255) NULL,
	`longitude` varchar(255) NULL,
	`ip_address` varchar(255) NULL,
	`platform` varchar(255) NULL,
	`os_device` varchar(255) NULL,
	`user_agent` varchar(255) NULL,
	`created_at` datetime NULL,
	`updated_at` datetime NULL,
	`deleted_at` datetime NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE utf8mb4_general_ci AUTO_INCREMENT=1;


CREATE TABLE IF NOT EXISTS `shopcarts` (
	`id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`customer_id` int(11) NOT NULL,
	`product_id` int(11) NOT NULL,
	`cart_color` varchar(128) NOT NULL,
	`cart_size` varchar(128) NOT NULL,
	`cart_qunatity` int(11) NOT NULL,
	`created_at` datetime NULL,
	`updated_at` datetime NULL,
	`deleted_at` datetime NULL,
	FOREIGN KEY(`customer_id`) REFERENCES `customers` (`id`)
	ON DELETE RESTRICT
	ON UPDATE CASCADE,
	FOREIGN KEY(`product_id`) REFERENCES `products` (`id`)
	ON DELETE RESTRICT
	ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE utf8mb4_general_ci AUTO_INCREMENT=1;


CREATE TABLE IF NOT EXISTS `orders` (
	`id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`customer_id` int(11) NOT NULL,
	`order_no` varchar(128) NOT NULL,
	`subtotal_amount` double NOT NULL,
	`vat_amount` double NULL,
	`delivery_charge` double NOT NULL,
	`coupon_id` int(11) NULL,
	`coupon_amount` double NULL,
	`discount_amount` double NULL,
	`total_amount` double NOT NULL,
	`payment_method` enum('SSLCommerz','PayPal','Stripe','Bank Transfer','Cash On Delivery') NOT NULL DEFAULT 'Cash On Delivery',
	`transaction_no` varchar(255) NULL,
	`transaction_status` enum('Paid','Unpaid') NOT NULL DEFAULT 'Unpaid',
	`created_at` datetime NULL,
	`updated_at` datetime NULL,
	`deleted_at` datetime NULL,
	FOREIGN KEY(`customer_id`) REFERENCES `customers` (`id`)
	ON DELETE RESTRICT
	ON UPDATE CASCADE,
	FOREIGN KEY(`coupon_id`) REFERENCES `coupons` (`id`)
	ON DELETE RESTRICT
	ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE utf8mb4_general_ci AUTO_INCREMENT=1;


CREATE TABLE IF NOT EXISTS `order_details` (
	`id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`customer_id` int(11) NOT NULL,
	`order_id` int(11) NOT NULL,
	`product_id` int(11) NOT NULL,
	`item_color` int(11) NOT NULL,
	`item_size` datetime NULL,
	`item_quantity` datetime NULL,
	`net_amount` datetime NULL,
	`created_at` datetime NULL,
	`updated_at` datetime NULL,
	`deleted_at` datetime NULL,
	FOREIGN KEY(`customer_id`) REFERENCES `customers` (`id`)
	ON DELETE RESTRICT
	ON UPDATE CASCADE,
	FOREIGN KEY(`order_id`) REFERENCES `orders` (`id`)
	ON DELETE RESTRICT
	ON UPDATE CASCADE,
	FOREIGN KEY(`product_id`) REFERENCES `products` (`id`)
	ON DELETE RESTRICT
	ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE utf8mb4_general_ci AUTO_INCREMENT=1;


CREATE TABLE IF NOT EXISTS `shipping_details` (
	`id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`customer_id` int(11) NOT NULL,
	`order_id` int(11) NOT NULL,
	`billing_id` int(11) NOT NULL,
	`shipping_id` int(11) NOT NULL,
	`track_order` enum('Pending','Received','Processing','In Transit','Delivered','Cancelled') NOT NULL DEFAULT 'Pending',
	`received_date` datetime NULL,
	`processing_date` datetime NULL,
	`transit_date` datetime NULL,
	`devlivered_date` datetime NULL,
	`cancelled_date` datetime NULL,
	`cancelled_reason` varchar(255) NULL,
	`created_at` datetime NULL,
	`updated_at` datetime NULL,
	`deleted_at` datetime NULL,
	FOREIGN KEY(`customer_id`) REFERENCES `customers` (`id`)
	ON DELETE RESTRICT
	ON UPDATE CASCADE,
	FOREIGN KEY(`order_id`) REFERENCES `orders` (`id`)
	ON DELETE RESTRICT
	ON UPDATE CASCADE,
	FOREIGN KEY(`billing_id`) REFERENCES `billing_addresses` (`id`)
	ON DELETE RESTRICT
	ON UPDATE CASCADE,
	FOREIGN KEY(`shipping_id`) REFERENCES `shipping_addresses` (`id`)
	ON DELETE RESTRICT
	ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE utf8mb4_general_ci AUTO_INCREMENT=1;


CREATE TABLE IF NOT EXISTS `invoices` (
	`id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`customer_id` int(11) NOT NULL,
	`order_id` int(11) NOT NULL,
	`product_id` int(11) NOT NULL,
	`billing_id` int(11) NOT NULL,
	`shipping_id` int(11) NOT NULL,
	`invoice_id` varchar(255) NOT NULL,
	`created_at` datetime NULL,
	`updated_at` datetime NULL,
	`deleted_at` datetime NULL,
	FOREIGN KEY(`customer_id`) REFERENCES `customers` (`id`)
	ON DELETE RESTRICT
	ON UPDATE CASCADE,
	FOREIGN KEY(`order_id`) REFERENCES `orders` (`id`)
	ON DELETE RESTRICT
	ON UPDATE CASCADE,
	FOREIGN KEY(`product_id`) REFERENCES `products` (`id`)
	ON DELETE RESTRICT
	ON UPDATE CASCADE,
	FOREIGN KEY(`billing_id`) REFERENCES `billing_addresses` (`id`)
	ON DELETE RESTRICT
	ON UPDATE CASCADE,
	FOREIGN KEY(`shipping_id`) REFERENCES `shipping_addresses` (`id`)
	ON DELETE RESTRICT
	ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE utf8mb4_general_ci AUTO_INCREMENT=1;


CREATE TABLE IF NOT EXISTS `customer_wishlists` (
	`id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`customer_id` int(11) NOT NULL,
	`product_id` int(11) NOT NULL,
	`created_at` datetime NULL,
	`updated_at` datetime NULL,
	`deleted_at` datetime NULL,
	FOREIGN KEY(`customer_id`) REFERENCES `customers` (`id`)
	ON DELETE RESTRICT
	ON UPDATE CASCADE,
	FOREIGN KEY(`product_id`) REFERENCES `products` (`id`)
	ON DELETE RESTRICT
	ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE utf8mb4_general_ci AUTO_INCREMENT=1;


CREATE TABLE IF NOT EXISTS `customer_feedback` (
	`id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`customer_id` int(11) NOT NULL,
	`product_id` int(11) NOT NULL,
	`rating` double NULL,
	`reviews` text NULL,
	`created_at` datetime NULL,
	`updated_at` datetime NULL,
	`deleted_at` datetime NULL,
	FOREIGN KEY(`customer_id`) REFERENCES `customers` (`id`)
	ON DELETE RESTRICT
	ON UPDATE CASCADE,
	FOREIGN KEY(`product_id`) REFERENCES `products` (`id`)
	ON DELETE RESTRICT
	ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE utf8mb4_general_ci AUTO_INCREMENT=1;









-- Insert Countries Table Data
INSERT INTO `countries`
	(`id`, `iso`, `name`, `code`)
VALUES
	(1, 'AD', 'ANDORRA', '376'),
	(2, 'AE', 'UNITED ARAB EMIRATES', '971'),
	(3, 'AF', 'AFGHANISTAN', '93'),
	(4, 'AG', 'ANTIGUA AND BARBUDA', '1268'),
	(5, 'AI', 'ANGUILLA', '1264'),
	(6, 'AL', 'ALBANIA', '355'),
	(7, 'AM', 'ARMENIA', '374'),
	(8, 'AN', 'NETHERLANDS ANTILLES', '599'),
	(9, 'AO', 'ANGOLA', '244'),
	(10, 'AQ', 'ANTARCTICA', '672'),
	(11, 'AR', 'ARGENTINA', '54'),
	(12, 'AS', 'AMERICAN SAMOA', '1684'),
	(13, 'AT', 'AUSTRIA', '43'),
	(14, 'AU', 'AUSTRALIA', '61'),
	(15, 'AW', 'ARUBA', '297'),
	(16, 'AZ', 'AZERBAIJAN', '994'),
	(17, 'BA', 'BOSNIA AND HERZEGOVINA', '387'),
	(18, 'BB', 'BARBADOS', '1246'),
	(19, 'BD', 'BANGLADESH', '88'),
	(20, 'BE', 'BELGIUM', '32'),
	(21, 'BF', 'BURKINA FASO', '226'),
	(22, 'BG', 'BULGARIA', '359'),
	(23, 'BH', 'BAHRAIN', '973'),
	(24, 'BI', 'BURUNDI', '257'),
	(25, 'BJ', 'BENIN', '229'),
	(26, 'BL', 'SAINT BARTHELEMY', '590'),
	(27, 'BM', 'BERMUDA', '1441'),
	(28, 'BN', 'BRUNEI DARUSSALAM', '673'),
	(29, 'BO', 'BOLIVIA', '591'),
	(30, 'BR', 'BRAZIL', '55'),
	(31, 'BS', 'BAHAMAS', '1242'),
	(32, 'BT', 'BHUTAN', '975'),
	(33, 'BW', 'BOTSWANA', '267'),
	(34, 'BY', 'BELARUS', '375'),
	(35, 'BZ', 'BELIZE', '501'),
	(36, 'CA', 'CANADA', '1'),
	(37, 'CC', 'COCOS (KEELING) ISLANDS', '61'),
	(38, 'CD', 'CONGO, THE DEMOCRATIC REPUBLIC OF THE', '243'),
	(39, 'CF', 'CENTRAL AFRICAN REPUBLIC', '236'),
	(40, 'CG', 'CONGO', '242'),
	(41, 'CH', 'SWITZERLAND', '41'),
	(42, 'CI', 'COTE D IVOIRE', '225'),
	(43, 'CK', 'COOK ISLANDS', '682'),
	(44, 'CL', 'CHILE', '56'),
	(45, 'CM', 'CAMEROON', '237'),
	(46, 'CN', 'CHINA', '86'),
	(47, 'CO', 'COLOMBIA', '57'),
	(48, 'CR', 'COSTA RICA', '506'),
	(49, 'CU', 'CUBA', '53'),
	(50, 'CV', 'CAPE VERDE', '238'),
	(51, 'CX', 'CHRISTMAS ISLAND', '61'),
	(52, 'CY', 'CYPRUS', '357'),
	(53, 'CZ', 'CZECH REPUBLIC', '420'),
	(54, 'DE', 'GERMANY', '49'),
	(55, 'DJ', 'DJIBOUTI', '253'),
	(56, 'DK', 'DENMARK', '45'),
	(57, 'DM', 'DOMINICA', '1767'),
	(58, 'DO', 'DOMINICAN REPUBLIC', '1809'),
	(59, 'DZ', 'ALGERIA', '213'),
	(60, 'EC', 'ECUADOR', '593'),
	(61, 'EE', 'ESTONIA', '372'),
	(62, 'EG', 'EGYPT', '20'),
	(63, 'ER', 'ERITREA', '291'),
	(64, 'ES', 'SPAIN', '34'),
	(65, 'ET', 'ETHIOPIA', '251'),
	(66, 'FI', 'FINLAND', '358'),
	(67, 'FJ', 'FIJI', '679'),
	(68, 'FK', 'FALKLAND ISLANDS (MALVINAS)', '500'),
	(69, 'FM', 'MICRONESIA, FEDERATED STATES OF', '691'),
	(70, 'FO', 'FAROE ISLANDS', '298'),
	(71, 'FR', 'FRANCE', '33'),
	(72, 'GA', 'GABON', '241'),
	(73, 'GB', 'UNITED KINGDOM', '44'),
	(74, 'GD', 'GRENADA', '1473'),
	(75, 'GE', 'GEORGIA', '995'),
	(76, 'GH', 'GHANA', '233'),
	(77, 'GI', 'GIBRALTAR', '350'),
	(78, 'GL', 'GREENLAND', '299'),
	(79, 'GM', 'GAMBIA', '220'),
	(80, 'GN', 'GUINEA', '224'),
	(81, 'GQ', 'EQUATORIAL GUINEA', '240'),
	(82, 'GR', 'GREECE', '30'),
	(83, 'GT', 'GUATEMALA', '502'),
	(84, 'GU', 'GUAM', '1671'),
	(85, 'GW', 'GUINEA-BISSAU', '245'),
	(86, 'GY', 'GUYANA', '592'),
	(87, 'HK', 'HONG KONG', '852'),
	(88, 'HN', 'HONDURAS', '504'),
	(89, 'HR', 'CROATIA', '385'),
	(90, 'HT', 'HAITI', '509'),
	(91, 'HU', 'HUNGARY', '36'),
	(92, 'ID', 'INDONESIA', '62'),
	(93, 'IE', 'IRELAND', '353'),
	(94, 'IL', 'ISRAEL', '972'),
	(95, 'IM', 'ISLE OF MAN', '44'),
	(96, 'IN', 'INDIA', '91'),
	(97, 'IQ', 'IRAQ', '964'),
	(98, 'IR', 'IRAN, ISLAMIC REPUBLIC OF', '98'),
	(99, 'IS', 'ICELAND', '354'),
	(100, 'IT', 'ITALY', '39'),
	(101, 'JM', 'JAMAICA', '1876'),
	(102, 'JO', 'JORDAN', '962'),
	(103, 'JP', 'JAPAN', '81'),
	(104, 'KE', 'KENYA', '254'),
	(105, 'KG', 'KYRGYZSTAN', '996'),
	(106, 'KH', 'CAMBODIA', '855'),
	(107, 'KI', 'KIRIBATI', '686'),
	(108, 'KM', 'COMOROS', '269'),
	(109, 'KN', 'SAINT KITTS AND NEVIS', '1869'),
	(110, 'KP', 'KOREA DEMOCRATIC PEOPLES REPUBLIC OF', '850'),
	(111, 'KR', 'KOREA REPUBLIC OF', '82'),
	(112, 'KW', 'KUWAIT', '965'),
	(113, 'KY', 'CAYMAN ISLANDS', '1345'),
	(114, 'KZ', 'KAZAKSTAN', '7'),
	(115, 'LA', 'LAO PEOPLES DEMOCRATIC REPUBLIC', '856'),
	(116, 'LB', 'LEBANON', '961'),
	(117, 'LC', 'SAINT LUCIA', '1758'),
	(118, 'LI', 'LIECHTENSTEIN', '423'),
	(119, 'LK', 'SRI LANKA', '94'),
	(120, 'LR', 'LIBERIA', '231'),
	(121, 'LS', 'LESOTHO', '266'),
	(122, 'LT', 'LITHUANIA', '370'),
	(123, 'LU', 'LUXEMBOURG', '352'),
	(124, 'LV', 'LATVIA', '371'),
	(125, 'LY', 'LIBYAN ARAB JAMAHIRIYA', '218'),
	(126, 'MA', 'MOROCCO', '212'),
	(127, 'MC', 'MONACO', '377'),
	(128, 'MD', 'MOLDOVA, REPUBLIC OF', '373'),
	(129, 'ME', 'MONTENEGRO', '382'),
	(130, 'MF', 'SAINT MARTIN', '1599'),
	(131, 'MG', 'MADAGASCAR', '261'),
	(132, 'MH', 'MARSHALL ISLANDS', '692'),
	(133, 'MK', 'MACEDONIA, THE FORMER YUGOSLAV REPUBLIC OF', '389'),
	(134, 'ML', 'MALI', '223'),
	(135, 'MM', 'MYANMAR', '95'),
	(136, 'MN', 'MONGOLIA', '976'),
	(137, 'MO', 'MACAU', '853'),
	(138, 'MP', 'NORTHERN MARIANA ISLANDS', '1670'),
	(139, 'MR', 'MAURITANIA', '222'),
	(140, 'MS', 'MONTSERRAT', '1664'),
	(141, 'MT', 'MALTA', '356'),
	(142, 'MU', 'MAURITIUS', '230'),
	(143, 'MV', 'MALDIVES', '960'),
	(144, 'MW', 'MALAWI', '265'),
	(145, 'MX', 'MEXICO', '52'),
	(146, 'MY', 'MALAYSIA', '60'),
	(147, 'MZ', 'MOZAMBIQUE', '258'),
	(148, 'NA', 'NAMIBIA', '264'),
	(149, 'NC', 'NEW CALEDONIA', '687'),
	(150, 'NE', 'NIGER', '227'),
	(151, 'NG', 'NIGERIA', '234'),
	(152, 'NI', 'NICARAGUA', '505'),
	(153, 'NL', 'NETHERLANDS', '31'),
	(154, 'NO', 'NORWAY', '47'),
	(155, 'NP', 'NEPAL', '977'),
	(156, 'NR', 'NAURU', '674'),
	(157, 'NU', 'NIUE', '683'),
	(158, 'NZ', 'NEW ZEALAND', '64'),
	(159, 'OM', 'OMAN', '968'),
	(160, 'PA', 'PANAMA', '507'),
	(161, 'PE', 'PERU', '51'),
	(162, 'PF', 'FRENCH POLYNESIA', '689'),
	(163, 'PG', 'PAPUA NEW GUINEA', '675'),
	(164, 'PH', 'PHILIPPINES', '63'),
	(165, 'PK', 'PAKISTAN', '92'),
	(166, 'PL', 'POLAND', '48'),
	(167, 'PM', 'SAINT PIERRE AND MIQUELON', '508'),
	(168, 'PN', 'PITCAIRN', '870'),
	(169, 'PR', 'PUERTO RICO', '1'),
	(170, 'PT', 'PORTUGAL', '351'),
	(171, 'PW', 'PALAU', '680'),
	(172, 'PY', 'PARAGUAY', '595'),
	(173, 'QA', 'QATAR', '974'),
	(174, 'RO', 'ROMANIA', '40'),
	(175, 'RS', 'SERBIA', '381'),
	(176, 'RU', 'RUSSIAN FEDERATION', '7'),
	(177, 'RW', 'RWANDA', '250'),
	(178, 'SA', 'SAUDI ARABIA', '966'),
	(179, 'SB', 'SOLOMON ISLANDS', '677'),
	(180, 'SC', 'SEYCHELLES', '248'),
	(181, 'SD', 'SUDAN', '249'),
	(182, 'SE', 'SWEDEN', '46'),
	(183, 'SG', 'SINGAPORE', '65'),
	(184, 'SH', 'SAINT HELENA', '290'),
	(185, 'SI', 'SLOVENIA', '386'),
	(186, 'SK', 'SLOVAKIA', '421'),
	(187, 'SL', 'SIERRA LEONE', '232'),
	(188, 'SM', 'SAN MARINO', '378'),
	(189, 'SN', 'SENEGAL', '221'),
	(190, 'SO', 'SOMALIA', '252'),
	(191, 'SR', 'SURINAME', '597'),
	(192, 'ST', 'SAO TOME AND PRINCIPE', '239'),
	(193, 'SV', 'EL SALVADOR', '503'),
	(194, 'SY', 'SYRIAN ARAB REPUBLIC', '963'),
	(195, 'SZ', 'SWAZILAND', '268'),
	(196, 'TC', 'TURKS AND CAICOS ISLANDS', '1649'),
	(197, 'TD', 'CHAD', '235'),
	(198, 'TG', 'TOGO', '228'),
	(199, 'TH', 'THAILAND', '66'),
	(200, 'TJ', 'TAJIKISTAN', '992'),
	(201, 'TK', 'TOKELAU', '690'),
	(202, 'TL', 'TIMOR-LESTE', '670'),
	(203, 'TM', 'TURKMENISTAN', '993'),
	(204, 'TN', 'TUNISIA', '216'),
	(205, 'TO', 'TONGA', '676'),
	(206, 'TR', 'TURKEY', '90'),
	(207, 'TT', 'TRINIDAD AND TOBAGO', '1868'),
	(208, 'TV', 'TUVALU', '688'),
	(209, 'TW', 'TAIWAN, PROVINCE OF CHINA', '886'),
	(210, 'TZ', 'TANZANIA, UNITED REPUBLIC OF', '255'),
	(211, 'UA', 'UKRAINE', '380'),
	(212, 'UG', 'UGANDA', '256'),
	(213, 'US', 'UNITED STATES', '1'),
	(214, 'UY', 'URUGUAY', '598'),
	(215, 'UZ', 'UZBEKISTAN', '998'),
	(216, 'VA', 'HOLY SEE (VATICAN CITY STATE)', '39'),
	(217, 'VC', 'SAINT VINCENT AND THE GRENADINES', '1784'),
	(218, 'VE', 'VENEZUELA', '58'),
	(219, 'VG', 'VIRGIN ISLANDS, BRITISH', '1284'),
	(220, 'VI', 'VIRGIN ISLANDS, U.S.', '1340'),
	(221, 'VN', 'VIET NAM', '84'),
	(222, 'VU', 'VANUATU', '678'),
	(223, 'WF', 'WALLIS AND FUTUNA', '681'),
	(224, 'WS', 'SAMOA', '685'),
	(225, 'XK', 'KOSOVO', '381'),
	(226, 'YE', 'YEMEN', '967'),
	(227, 'YT', 'MAYOTTE', '262'),
	(228, 'ZA', 'SOUTH AFRICA', '27'),
	(229, 'ZM', 'ZAMBIA', '260'),
	(230, 'ZW', 'ZIMBABWE', '263');
