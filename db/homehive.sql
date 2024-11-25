-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 10.123.0.54:3307
-- Generation Time: Aug 19, 2023 at 06:35 PM
-- Server version: 8.0.22
-- PHP Version: 7.0.33-0+deb9u12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `logicempower_homehive`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `address_id` int NOT NULL,
  `street` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `state` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `postal_code` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci TABLESPACE `logicempower_homehive`;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`address_id`, `street`, `city`, `state`, `postal_code`, `country`) VALUES
(1, '123 Main St', 'Cityville', 'Stateville', '12345', 'United States'),
(2, '456 Elm St', 'Townsville', 'Stateville', '67890', 'United States'),
(3, '940 Welch Place', 'Zouérat', NULL, NULL, 'Mauritania'),
(4, '7381 Thierer Avenue', 'Sepanjang', NULL, NULL, 'Indonesia'),
(5, '9071 Delaware Place', 'Situbondo', NULL, NULL, 'Indonesia'),
(6, '39707 Prentice Drive', 'Catarina', NULL, NULL, 'Nicaragua'),
(7, '33 Shasta Drive', 'Totoral', NULL, NULL, 'Peru'),
(8, '2 Maryland Lane', 'Caicó', NULL, NULL, 'Brazil'),
(9, '2 Delaware Point', 'Wenchi', NULL, NULL, 'Ghana'),
(10, '038 Green Ridge Place', 'Vsetín', NULL, NULL, 'Czech Republic'),
(11, '41 Pearson Way', 'Muchkapskiy', NULL, NULL, 'Russia'),
(12, '0277 Kedzie Plaza', 'Mella', NULL, '10510', 'Dominican Republic'),
(13, '506 Dawn Plaza', 'Jönköping', NULL, '554 52', 'Sweden'),
(14, '0 International Drive', 'Sylvan Lake', NULL, 'T4S', 'Canada'),
(15, '0 Canary Point', 'Şaḩam', NULL, NULL, 'Oman'),
(16, '0 Oakridge Parkway', 'Huangli', NULL, NULL, 'China'),
(17, '02 Westport Terrace', 'Sobeok', NULL, NULL, 'Indonesia'),
(18, '8 Cottonwood Alley', 'Sandouping', NULL, NULL, 'China'),
(19, '34 Melby Terrace', 'Löddeköpinge', NULL, NULL, 'Sweden'),
(20, '6 Springview Street', 'Chiguayante', NULL, NULL, 'Chile'),
(21, '33 Del Sol Hill', 'Quebracho', NULL, NULL, 'Uruguay'),
(22, '1376 Red Cloud Court', 'Longotea', NULL, NULL, 'Peru'),
(23, '50630 Maryland Lane', 'Kuiyong', NULL, NULL, 'China'),
(24, '585 Bultman Court', 'Bungalaleng', NULL, NULL, 'Indonesia'),
(25, '378 Nevada Way', 'La Breita', NULL, NULL, 'Peru'),
(26, '32269 Meadow Ridge Plaza', 'Vabalninkas', NULL, NULL, 'Lithuania'),
(27, '5 Forster Circle', 'Azor', NULL, NULL, 'Israel'),
(28, '0 Anzinger Hill', 'Henglishan', NULL, NULL, 'China'),
(29, '137 Iowa Plaza', 'Carvoeira', 'Lisboa', '2655-034', 'Portugal'),
(30, '206 Caliangt Drive', 'Helmsange', NULL, NULL, 'Luxembourg'),
(31, '52903 Fairfield Alley', 'Saint-Pierre-Montlimart', 'Pays de la Loire', NULL, 'France'),
(32, '9632 Rutledge Alley', 'Gushi', NULL, NULL, 'China');

-- --------------------------------------------------------

--
-- Table structure for table `amenity`
--

CREATE TABLE `amenity` (
  `amenity_id` int NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci TABLESPACE `logicempower_homehive`;

--
-- Dumping data for table `amenity`
--

INSERT INTO `amenity` (`amenity_id`, `description`) VALUES
(1, 'Swimming Pool'),
(2, 'Gym'),
(3, 'Parking Lot'),
(4, 'Garden');

-- --------------------------------------------------------

--
-- Table structure for table `favorites`
--

CREATE TABLE `favorites` (
  `property_id` int NOT NULL,
  `user_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci TABLESPACE `logicempower_homehive`;

--
-- Dumping data for table `favorites`
--

INSERT INTO `favorites` (`property_id`, `user_id`) VALUES
(1, 51),
(32, 24),
(33, 40),
(34, 65),
(35, 88),
(36, 51),
(37, 70),
(38, 95),
(39, 30),
(40, 45),
(41, 75),
(42, 50),
(43, 100),
(44, 60),
(45, 80),
(46, 105);

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `media_id` int NOT NULL,
  `media_type` enum('image','video') COLLATE utf8_unicode_ci NOT NULL,
  `file_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci TABLESPACE `logicempower_homehive`;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`media_id`, `media_type`, `file_name`, `description`) VALUES
(1, 'image', 'property1.jpg', 'Beautiful house with a garden'),
(2, 'image', 'property2.jpg', 'Modern apartment with city view'),
(3, 'image', 'property3.jpg', 'Spacious villa with a swimming pool'),
(4, 'video', 'property4.mp4', 'Virtual tour of the property'),
(5, 'image', 'apartment-thumb.jpg', 'Apartment Featured Image'),
(6, 'image', 'bungalow-thumb.jpg', 'Bungalow Featured Image'),
(7, 'image', 'condo-thumb.jpg', 'Condo Featured Image'),
(8, 'image', 'house-thumb.jpg', 'House Featured Image'),
(9, 'image', 'studio-thumb.jpg', 'Studio Featured Image'),
(10, 'image', 'townhouse-thumb.jpg', 'Townhouse Featured Image'),
(11, 'image', 'villa-thumb.jpg', 'Villa Featured Image'),
(12, 'image', 'perla.jpg', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `property`
--

CREATE TABLE `property` (
  `property_id` int NOT NULL,
  `address_id` int NOT NULL,
  `user_id` int NOT NULL COMMENT 'User ID as an owner',
  `property_type_id` int NOT NULL,
  `media_id` int DEFAULT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `num_bedrooms` int DEFAULT NULL,
  `num_bathrooms` int DEFAULT NULL,
  `size` int DEFAULT NULL,
  `max_occupancy` int DEFAULT NULL,
  `price_per_night` int DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `listed_on` date NOT NULL,
  `status` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci TABLESPACE `logicempower_homehive`;

--
-- Dumping data for table `property`
--

INSERT INTO `property` (`property_id`, `address_id`, `user_id`, `property_type_id`, `media_id`, `title`, `slug`, `num_bedrooms`, `num_bathrooms`, `size`, `max_occupancy`, `price_per_night`, `description`, `listed_on`, `status`) VALUES
(1, 1, 24, 1, 1, 'Cozy House with Garden', 'cozy-house-garden', 3, 2, 1500, 6, 200, 'A cozy house with a beautiful garden, perfect for a family getaway.', '2023-05-01', 'Occupied'),
(2, 2, 24, 2, NULL, 'Modern City Apartment', 'modern-city-apartment', 2, 1, 800, 4, 150, 'A modern apartment located in the heart of the city with stunning views.', '2023-05-02', 'Occupied'),
(32, 11, 25, 3, NULL, 'Luxurious Villa with Pool', 'luxurious-villa-with-pool', 4, 3, 300, 8, 250, 'Spacious villa with a private pool.', '2023-08-07', 'Occupied'),
(33, 14, 36, 4, NULL, 'Cozy Bungalow in the Woods', 'cozy-bungalow-in-the-woods', 2, 1, 120, 4, 80, NULL, '2023-08-07', 'Available'),
(34, 3, 51, 2, NULL, 'Modern Studio Apartment', 'modern-studio-apartment-1-1-1', 1, 1, 60, 2, 120, 'Centrally located modern apartment.', '2023-08-07', 'Occupied'),
(35, 8, 32, 5, NULL, 'Rustic Townhouse Getaway', 'rustic-townhouse-getaway', 3, 2, 180, 6, 150, NULL, '2023-08-07', 'Available'),
(36, 9, 47, 3, NULL, 'Charming Villa', 'charming-villa', 2, 1, 100, 4, 180, NULL, '2023-08-07', 'Available'),
(37, 6, 25, 3, NULL, 'Secluded Villa Retreat', 'secluded-villa-retreat', 3, 2, 200, 6, 200, 'Escape to the mountains and relax.', '2023-08-07', 'Occupied'),
(38, 15, 30, 1, NULL, 'Spacious House', 'spacious-house', 5, 3, 350, 10, 300, 'Perfect for large families.', '2023-08-07', 'Available'),
(39, 5, 41, 5, NULL, 'Quaint Townhouse', 'quaint-townhouse', 2, 1, 100, 4, 90, NULL, '2023-08-07', 'Available'),
(40, 7, 29, 2, NULL, 'Chic Apartment', 'chic-apartment', 1, 1, 80, 2, 140, 'Stylish loft in the heart of the city.', '2023-08-07', 'Available'),
(41, 1, 33, 3, NULL, 'Seaview Villa', 'seaview-villa', 3, 2, 250, 6, 350, 'Stunning penthouse with ocean views.', '2023-08-07', 'Occupied'),
(42, 4, 26, 5, NULL, 'Historic Townhouse', 'historic-townhouse', 4, 2, 220, 8, 200, NULL, '2023-08-07', 'Available'),
(43, 10, 51, 3, NULL, 'Countryside Villa', 'countryside-villa', 3, 2, 180, 6, 160, NULL, '2023-08-07', 'Available'),
(44, 2, 40, 3, NULL, 'Lakefront Villa', 'lakefront-villa', 2, 1, 120, 4, 120, 'Cozy villa by the lake.', '2023-08-07', 'Occupied'),
(45, 13, 27, 2, NULL, 'City Center Apartment', 'city-center-apartment', 1, 1, 60, 2, 100, NULL, '2023-08-07', 'Available'),
(46, 12, 51, 1, NULL, 'Country Estate', 'country-estate', 6, 4, 500, 12, 400, NULL, '2023-08-07', 'Available'),
(47, 11, 29, 4, NULL, 'Riverside Bungalow', 'riverside-bungalow', 1, 1, 80, 2, 80, 'Peaceful bungalow by the river.', '2023-08-07', 'Occupied'),
(48, 14, 35, 3, NULL, 'Mountain View Villa', 'mountain-view-villa', 4, 3, 300, 8, 280, NULL, '2023-08-07', 'Available'),
(49, 3, 26, 1, NULL, 'Beachfront House', 'beachfront-house', 5, 4, 400, 10, 500, NULL, '2023-08-07', 'Available'),
(50, 8, 30, 7, NULL, 'Urban Studio Apartment', 'urban-studio-apartment', 1, 1, 50, 2, 80, 'Compact studio in the city.', '2023-08-07', 'Available'),
(51, 9, 51, 5, NULL, 'Charming Townhouse', 'charming-townhouse', 2, 1, 100, 4, 110, 'Cozy house with a fireplace.', '2023-08-07', 'Occupied'),
(52, 6, 27, 3, NULL, 'Elegant Mansion', 'elegant-mansion', 8, 6, 800, 16, 800, NULL, '2023-08-07', 'Available'),
(53, 15, 39, 1, NULL, 'Lake House Retreat', 'lake-house-retreat', 3, 2, 200, 6, 220, NULL, '2023-08-07', 'Available'),
(54, 5, 51, 5, NULL, 'Hillside Townhouse', 'hillside-townhouse', 4, 3, 250, 8, 260, NULL, '2023-08-07', 'Available'),
(55, 7, 32, 6, NULL, 'Country Condo', 'country-condo', 2, 1, 120, 4, 120, NULL, '2023-08-07', 'Available'),
(56, 1, 42, 1, NULL, 'Countryside House', 'countryside-house', 3, 2, 180, 6, 150, 'Tranquil retreat in nature.', '2023-08-07', 'Occupied'),
(57, 4, 40, 2, NULL, 'Luxury Penthouse', 'luxury-penthouse', 4, 3, 300, 8, 400, NULL, '2023-08-07', 'Available'),
(58, 10, 35, 2, NULL, 'City View Apartment', 'city-view-apartment', 1, 1, 60, 2, 90, NULL, '2023-08-07', 'Available'),
(59, 2, 44, 4, NULL, 'Secluded Bungalow', 'secluded-bungalow', 2, 1, 100, 4, 130, 'Hidden gem for a peaceful getaway.', '2023-08-07', 'Occupied'),
(60, 13, 30, 1, NULL, 'Mountain House', 'mountain-house', 3, 2, 200, 6, 240, NULL, '2023-08-07', 'Available');

-- --------------------------------------------------------

--
-- Table structure for table `property_amenity`
--

CREATE TABLE `property_amenity` (
  `property_id` int NOT NULL,
  `amenity_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci TABLESPACE `logicempower_homehive`;

--
-- Dumping data for table `property_amenity`
--

INSERT INTO `property_amenity` (`property_id`, `amenity_id`) VALUES
(1, 1),
(32, 1),
(34, 1),
(36, 1),
(40, 1),
(2, 2),
(34, 2),
(39, 2),
(1, 3),
(2, 3),
(35, 3),
(37, 3),
(41, 3),
(2, 4),
(33, 4),
(38, 4);

-- --------------------------------------------------------

--
-- Table structure for table `property_type`
--

CREATE TABLE `property_type` (
  `property_type_id` int NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `featured_image` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci TABLESPACE `logicempower_homehive`;

--
-- Dumping data for table `property_type`
--

INSERT INTO `property_type` (`property_type_id`, `description`, `featured_image`) VALUES
(1, 'House', 8),
(2, 'Apartment', 5),
(3, 'Villa', 11),
(4, 'Bungalow', 6),
(5, 'Townhouse', 10),
(6, 'Condo', 7),
(7, 'Studio', 9);

-- --------------------------------------------------------

--
-- Table structure for table `rent_agreement`
--

CREATE TABLE `rent_agreement` (
  `rent_agreement_id` int NOT NULL,
  `property_id` int NOT NULL,
  `user_id` int NOT NULL COMMENT 'User ID as a tenant',
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `total_amount` int NOT NULL,
  `amount_paid` int NOT NULL,
  `amount_due` int NOT NULL,
  `checked_in` tinyint(1) NOT NULL,
  `checked_in_time` datetime NOT NULL,
  `checked_out` tinyint(1) NOT NULL,
  `checked_out_time` datetime NOT NULL,
  `status` varchar(32) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci TABLESPACE `logicempower_homehive`;

--
-- Dumping data for table `rent_agreement`
--

INSERT INTO `rent_agreement` (`rent_agreement_id`, `property_id`, `user_id`, `start_date`, `end_date`, `total_amount`, `amount_paid`, `amount_due`, `checked_in`, `checked_in_time`, `checked_out`, `checked_out_time`, `status`) VALUES
(1, 1, 51, '2023-06-01', '2023-06-10', 1500, 1000, 500, 1, '2023-06-01 12:00:00', 0, '0000-00-00 00:00:00', 'active'),
(2, 2, 51, '2023-06-03', '2023-06-08', 750, 500, 250, 1, '2023-06-03 14:00:00', 1, '2023-06-08 10:00:00', 'completed'),
(3, 32, 71, '2023-08-07', '2023-08-12', 1000, 500, 500, 1, '2023-08-07 12:00:00', 0, '0000-00-00 00:00:00', 'active'),
(4, 34, 92, '2023-08-10', '2023-08-15', 600, 200, 400, 1, '2023-08-10 14:00:00', 0, '0000-00-00 00:00:00', 'active'),
(5, 37, 88, '2023-08-12', '2023-08-18', 1000, 800, 200, 1, '2023-08-12 11:00:00', 0, '0000-00-00 00:00:00', 'active'),
(6, 41, 76, '2023-08-15', '2023-08-20', 1400, 1400, 0, 1, '2023-08-15 10:00:00', 0, '0000-00-00 00:00:00', 'active'),
(7, 44, 52, '2023-08-18', '2023-08-23', 600, 600, 0, 1, '2023-08-18 16:00:00', 0, '0000-00-00 00:00:00', 'active'),
(8, 47, 87, '2023-08-20', '2023-08-26', 480, 480, 0, 1, '2023-08-20 13:00:00', 0, '0000-00-00 00:00:00', 'active'),
(9, 51, 66, '2023-08-22', '2023-08-28', 660, 330, 330, 1, '2023-08-22 12:30:00', 0, '0000-00-00 00:00:00', 'active'),
(10, 56, 68, '2023-08-25', '2023-08-30', 900, 450, 450, 1, '2023-08-25 14:45:00', 0, '0000-00-00 00:00:00', 'active'),
(11, 59, 77, '2023-08-28', '2023-09-02', 780, 780, 0, 1, '2023-08-28 11:15:00', 0, '0000-00-00 00:00:00', 'completed');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `review_id` int NOT NULL,
  `user_id` int NOT NULL COMMENT 'User ID as a tenant',
  `rent_agreement_id` int DEFAULT NULL,
  `rating` int DEFAULT NULL,
  `comment` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci TABLESPACE `logicempower_homehive`;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`review_id`, `user_id`, `rent_agreement_id`, `rating`, `comment`) VALUES
(1, 51, 1, 4, 'Nice views. Comfortable Furniture.'),
(3, 71, 3, 4, 'Enjoyed my stay. The property was clean and well-maintained.'),
(4, 92, 4, 5, 'Had an amazing experience. The property exceeded my expectations.'),
(5, 88, 5, 3, 'Decent property, but could use some improvements.'),
(6, 76, 6, 2, 'Not satisfied with the property. It needs better amenities.'),
(7, 52, 7, 1, 'Terrible experience. The property was in bad condition.'),
(8, 87, 8, 5, 'Highly recommended. The property was perfect for our needs.'),
(9, 66, 9, 4, 'Great property with beautiful surroundings.'),
(10, 68, 10, 5, 'Excellent stay. The property was clean and well-furnished.'),
(13, 51, 2, 5, '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int NOT NULL,
  `media_id` int DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT '0',
  `phone` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `remember_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci TABLESPACE `logicempower_homehive`;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `media_id`, `name`, `email`, `password`, `is_admin`, `phone`, `remember_token`) VALUES
(1, 12, 'Perla Kozhaya', 'kozhaya.perla@gmail.com', 'e68dc0f0290ca60345a042a0884887be', 1, '70220877', '9fd7b52827ec7349c6e53e53d00c4a0553fce856bd764253341c1ee5b83ff60e'),
(2, NULL, 'John Doe', 'johndoe@example.com', '5e8dc0b2cf1969e0db7e95284c8e601d', 0, '123456789', NULL),
(24, NULL, 'Abdel Gidney', 'agidney0@yandex.ru', '85190eae2d8d2342e8ca25b110bff7a3', 0, '1981861729', NULL),
(25, NULL, 'Carlina Sirette', 'csirette1@nyu.edu', 'c3cd805c1585990a04909cea9249d27e', 0, NULL, '81ebd26277e042d15d1601d610467f5bbfd29a0457cfe497525d426f2f987783'),
(26, NULL, 'Nyssa Cudworth', 'ncudworth2@hp.com', '690dac77b6b1260db48f255cd3cbec59', 0, '9147152265', NULL),
(27, NULL, 'Hersch Winkless', 'hwinkless3@japanpost.jp', 'a3a6785bbbec3f80b41d8fc8ab86a3ab', 0, '1459614215', NULL),
(28, NULL, 'Trip Smullin', 'tsmullin4@nymag.com', '402c80b6e41907e0e63565fc945a4b1a', 0, NULL, NULL),
(29, NULL, 'Hermon Goodered', 'hgoodered5@latimes.com', '23589dc1b890d490cd97eb46abe05fa2', 0, '7109405258', NULL),
(30, NULL, 'Vonny Heller', 'vheller6@ucoz.ru', 'd824867a2d243e631b53bd712ad86cbd', 0, '8595651018', NULL),
(31, NULL, 'April Goranov', 'agoranov7@google.it', 'f5beb40ea2ce8588c802d55a3275362a', 0, '6839262318', NULL),
(32, NULL, 'Juditha Knyvett', 'jknyvett0@aboutads.info', 'a73e22238f1c345056640da1d47ca6b0', 0, '5342397033', NULL),
(33, NULL, 'Ferrell MacDermand', 'fmacdermand1@odnoklassniki.ru', 'cb8bcec8e16b4e7f911df5b66ac39467', 0, '5537613381', NULL),
(34, NULL, 'Thelma Vannar', 'tvannar2@ox.ac.uk', '3707456f727b3e0bf3478b6e3399fc7d', 0, NULL, NULL),
(35, NULL, 'Kaitlin Stendall', 'kstendall3@census.gov', '09eccf3533e74da3876512e167902448', 0, NULL, NULL),
(36, NULL, 'Syd Gong', 'sgong4@devhub.com', '96103d409ed0aab32c5a80414f0afd01', 0, NULL, NULL),
(37, NULL, 'Brandon Gennrich', 'bgennrich5@posterous.com', '28ba1dc7a2730d383f5708f5cb00b13f', 0, '6533599857', NULL),
(38, NULL, 'Pacorro Horsell', 'phorsell6@blinklist.com', '40405549b5859cc2ae8ed92877bbe444', 0, NULL, NULL),
(39, NULL, 'Alister Busain', 'abusain7@sciencedirect.com', '9fe9b493e72bdbf4dd586c5f6f6f51e6', 0, NULL, NULL),
(40, NULL, 'Liane Attrill', 'lattrill8@example.com', '421d5c85db997d215758edb7232ffd60', 0, '9052396976', NULL),
(41, NULL, 'Jakie O\'Cahey', 'jocahey9@youtu.be', '70f0d34f80c89f0781ad0de8873f0d38', 0, '7616036589', NULL),
(42, NULL, 'Betteanne Paish', 'bpaisha@shinystat.com', '725f6e95a5afe8393cb8ed932534fa2d', 0, NULL, NULL),
(43, NULL, 'Jessalin Garnul', 'jgarnulb@acquirethisname.com', 'c6ca7178051548372d445bdb4d232eea', 0, NULL, NULL),
(44, NULL, 'Dniren Finn', 'dfinnc@gov.uk', 'b63761afd70446024a0a87b6282c9fd1', 0, NULL, NULL),
(45, NULL, 'Pen Swanston', 'pswanstond@cpanel.net', '064cab1bb90c0e0dc1947b899c2f0cee', 0, '1033457376', NULL),
(46, NULL, 'Dinnie Pietz', 'dpietze@upenn.edu', 'c2db5e6270cbdbe17b9af5facca58774', 0, '4274440404', NULL),
(47, NULL, 'Pepi Pitfield', 'ppitfieldf@home.pl', '7db31b9728bea76389071094ef9e7128', 0, '9741816266', NULL),
(48, NULL, 'Demetris MacKniely', 'dmacknielyg@opera.com', '10f6dbf427f68f51e4423ced1c6a9c4c', 0, NULL, NULL),
(49, NULL, 'Cacilie Golby', 'cgolbyh@addthis.com', '682708e2443266731e70a0f2a9848a47', 0, NULL, NULL),
(50, NULL, 'Kareem Fairhurst', 'kfairhursti@rambler.ru', 'dcf89b419526a80334056fbf49a09a55', 0, NULL, NULL),
(51, NULL, 'Gill Stoves', 'gstovesj@cornell.edu', '9e3480c2c721577bf72cacafa799a5a9', 0, '03123123', '2c8c31dca6c86a1289ad653ae3299d09da9003401dccb87e6d2cc262dcf2c48a'),
(52, NULL, 'Kaiser Surgison', 'ksurgisonk@smh.com.au', '2ce5a06f72be9b948e6b3c3b17274ee1', 0, NULL, NULL),
(53, NULL, 'Gracia O\'Reilly', 'goreillyl@ifeng.com', '55813f11b47ece0547d9b1bdc08c7ec2', 0, '8254074811', NULL),
(54, NULL, 'Emmanuel Bau', 'ebaum@epa.gov', '5ec1568027ff59d98ffb40fa27055e11', 0, '9552431419', NULL),
(55, NULL, 'Kevin Penni', 'kpennin@ebay.com', 'd6fd4f9f6d052a6a870716d90354d21d', 0, NULL, NULL),
(56, NULL, 'Gilbert Lydden', 'glyddeno@storify.com', '68ead1019c4d6d94d76d469e2264d597', 0, '3821577331', NULL),
(57, NULL, 'Gaultiero Chastand', 'gchastandp@friendfeed.com', '0a443da325b72d7b9861b996a8cbec07', 0, '6431491014', NULL),
(58, NULL, 'Danny Belfitt', 'dbelfittq@goo.gl', '01b9c331dfd3d362f6c033836b6b8f9c', 0, '3428128521', NULL),
(59, NULL, 'Allissa Iori', 'aiorir@odnoklassniki.ru', '92bc7596cf20d7b5211b547df7a01e88', 0, '2812768024', NULL),
(60, NULL, 'Jobi Saiger', 'jsaigers@goodreads.com', 'de7d752726d279c2536a380e6f61f6f0', 0, '1334202454', NULL),
(61, NULL, 'Elinore Pasquale', 'epasqualet@nymag.com', 'ad954920a77779c01cae6899436f0663', 0, '2599884478', NULL),
(62, NULL, 'Corliss Clipson', 'cclipsonu@miitbeian.gov.cn', '87146bf43bc61bd1bc53486f438d267a', 0, '4766292111', NULL),
(63, NULL, 'Dora Kernley', 'dkernleyv@blogtalkradio.com', '5527d8fde169a0b4c1f47af1ff792ec1', 0, '2405883944', NULL),
(64, NULL, 'Natalya Wharf', 'nwharfw@icq.com', '6093c48a4127be448ec45a0182ef7c7f', 0, NULL, NULL),
(65, NULL, 'Peta Kippin', 'pkippinx@springer.com', 'ffa97cc455661b43eaa5597f719c852a', 0, '6769879604', NULL),
(66, NULL, 'Pebrook Mandrey', 'pmandreyy@amazon.co.uk', 'ab2a651771ece50db4d894af424d30e8', 0, NULL, NULL),
(67, NULL, 'Glennie Warricker', 'gwarrickerz@jugem.jp', 'bb9d0be4fe30f20e5f0a6c071823b4f6', 0, '3959181862', NULL),
(68, NULL, 'Moore Procter', 'mprocter10@eventbrite.com', '0dcbc007b63e120d81adf84c2ea6ad81', 0, NULL, NULL),
(69, NULL, 'Emelina de Cullip', 'ede11@wordpress.com', 'd8c20b6c3d343940d91ca35fa2b64b1d', 0, NULL, NULL),
(70, NULL, 'Jock Oleszczak', 'joleszczak12@freewebs.com', '2a9ffcc67a8426d1f334a079dd73e5e1', 0, NULL, NULL),
(71, NULL, 'Michaella Grummitt', 'mgrummitt13@cornell.edu', '6c0e2c7d369c98b834497292e07f1548', 0, NULL, NULL),
(72, NULL, 'Marty Frill', 'mfrill14@archive.org', '1cf4d89c97b7f739840333917ddf42d1', 0, NULL, NULL),
(73, NULL, 'Novelia Pickless', 'npickless15@businesswire.com', 'f1408a76c3bfe0326ecc50e2a6aafb0f', 0, '1491472494', NULL),
(74, NULL, 'Wynny Joddens', 'wjoddens16@themeforest.net', '7d1a138e891ddf342d992327d7eb21ae', 0, '2006155800', NULL),
(75, NULL, 'Harri Gadie', 'hgadie17@mac.com', 'b92cf6968f23456206d7b9f91378ed96', 0, NULL, NULL),
(76, NULL, 'Paddy Greenroad', 'pgreenroad18@hhs.gov', '4a913e45a43090938e47c4e02f13321d', 0, NULL, NULL),
(77, NULL, 'Nahum Fitzsimon', 'nfitzsimon19@t.co', 'efa395fb9ba0bf78b02587850887d2db', 0, NULL, NULL),
(78, NULL, 'Janna MacRorie', 'jmacrorie1a@irs.gov', '4f6a6a4df7869f6be53f4668766f1fd5', 0, '2316088753', NULL),
(79, NULL, 'Kordula McGhie', 'kmcghie1b@123-reg.co.uk', 'de9e6a96dee63f3f9433c26f5cbe49ef', 0, NULL, NULL),
(80, NULL, 'Jacynth Hyndman', 'jhyndman1c@seesaa.net', '79dde5bd2dbddf76441bf67bdfbbc47d', 0, NULL, NULL),
(81, NULL, 'Fairlie Lates', 'flates1d@wiley.com', '23fc3ef97e4271c5bb2e17d2f1c8ea03', 0, NULL, NULL),
(82, NULL, 'Morgan Tilzey', 'mtilzey1e@discuz.net', 'ea9dda0d86760574935badd9db3b51ca', 0, NULL, NULL),
(83, NULL, 'Phillipp Loseke', 'ploseke1f@t-online.de', '47157ed7a0d5aac9973bdf0e4130bdf1', 0, '3485300242', NULL),
(84, NULL, 'Lisetta Songist', 'lsongist1g@ca.gov', '2a25e29d6578ced9b0cee32a81614c1b', 0, NULL, NULL),
(85, NULL, 'Chiquia Squirrell', 'csquirrell1h@cisco.com', '16f39f6ef64af8e3203fb9b373f2bc5e', 0, NULL, NULL),
(86, NULL, 'Arda Coley', 'acoley1i@earthlink.net', '336b6f1ebbeffbee9065391bf362a9d7', 0, NULL, NULL),
(87, NULL, 'Thatch Mapowder', 'tmapowder1j@loc.gov', 'f4e71cb30c6cf9f3a0ab90363375d22d', 0, NULL, NULL),
(88, NULL, 'Egan Chiddy', 'echiddy1k@tripod.com', '1d5814a2ea126462816ede75a9312a56', 0, NULL, NULL),
(89, NULL, 'Rudolf Keasy', 'rkeasy1l@toplist.cz', '93701b90e36023eb6073bde256d51ead', 0, '7807487092', NULL),
(90, NULL, 'Octavia Kingsmill', 'okingsmill1m@wix.com', '21fbb8aa5e876669abe3b22af62163e2', 0, '6226580185', NULL),
(91, NULL, 'Gabriela Wafer', 'gwafer1n@4shared.com', 'd6ffe1c763826fb66a4f1fce06db3376', 0, '1139098208', NULL),
(92, NULL, 'Ethelin Haigh', 'ehaigh1o@cloudflare.com', '57985d7ed2cf432de5f6a1efa68f1eaf', 0, '78362736', NULL),
(93, NULL, 'Kenn Bingham', 'kbingham1p@eventbrite.com', '07c940a8600d8e811b111e632812d1f5', 0, '1725070505', NULL),
(94, NULL, 'Vergil Jaze', 'vjaze1q@godaddy.com', 'eb076aa0d5e827de95d9f364fd93e1f5', 0, NULL, NULL),
(95, NULL, 'Sharl Cullon', 'scullon1r@fda.gov', 'e4991c3bb69932063b4fed2ea9ed0364', 0, '8665016252', NULL),
(96, NULL, 'Terrie Philipot', 'tphilipot1s@shareasale.com', '5faa0fcdb4f393ec321525a3397a49dd', 0, '8294381448', NULL),
(97, NULL, 'Garvy McCardle', 'gmccardle1t@newyorker.com', 'b5f3de8c41aea769c29ef3912074a482', 0, NULL, NULL),
(98, NULL, 'Cara Drezzer', 'cdrezzer1u@constantcontact.com', '7d013fdb4378042a37fc55e17b338d85', 0, '6809485028', NULL),
(99, NULL, 'Lonee Peeke-Vout', 'lpeekevout1v@wordpress.org', '1c5f56951be44484b8cb2f6a6949288b', 0, '6143939749', NULL),
(100, NULL, 'Othelia Caddies', 'ocaddies1w@123-reg.co.uk', '185cdf870e4f12fb61fb99ad72bfe417', 0, '1075389336', NULL),
(101, NULL, 'Levon Challens', 'lchallens1x@theatlantic.com', '4ca56f34f81f4a2561742fd45c334fa3', 0, '1586605829', NULL),
(102, NULL, 'marc labaky', 'marclabaky2022@gmail.com', '3e8d6f080baaeffc07069dcb8cd2b450', 1, '79148627', '993a33e9568086cdeac63139c13a1408d4d30a47027c02cabb61fa2516c81e5c'),
(103, NULL, 'theresia sfeir', 'theresia.sfr@outlook.com', 'e10adc3949ba59abbe56e057f20f883e', 1, '70525293', NULL),
(105, NULL, 'Theresia Kassis', 'theresiakassis6@gmail.com', '0683b18bcee5667a5a47685ecff760bb', 0, '76 368 769', NULL),
(106, NULL, 'marc', 'marc@gmail.com', '05305cf99539bf875c50003bf6c17eb9', 0, '79148627', 'a332fb6cd9a9a1b6682f6d22dcc823a3277c2e5596febd6f24d0bf1daf80040a'),
(107, NULL, 'Abdel Gidney', 'agidney0@yandex.ru', '85190eae2d8d2342e8ca25b110bff7a3', 0, '1981861729', NULL),
(108, NULL, 'Carlina Sirette', 'csirette1@nyu.edu', 'c3cd805c1585990a04909cea9249d27e', 0, NULL, NULL),
(109, NULL, 'Nyssa Cudworth', 'ncudworth2@hp.com', '690dac77b6b1260db48f255cd3cbec59', 0, '9147152265', NULL),
(110, NULL, 'Hersch Winkless', 'hwinkless3@japanpost.jp', 'a3a6785bbbec3f80b41d8fc8ab86a3ab', 0, '1459614215', NULL),
(111, NULL, 'Trip Smullin', 'tsmullin4@nymag.com', '402c80b6e41907e0e63565fc945a4b1a', 0, NULL, NULL),
(112, NULL, 'Hermon Goodered', 'hgoodered5@latimes.com', '23589dc1b890d490cd97eb46abe05fa2', 0, '7109405258', NULL),
(113, NULL, 'Vonny Heller', 'vheller6@ucoz.ru', 'd824867a2d243e631b53bd712ad86cbd', 0, '8595651018', NULL),
(114, NULL, 'April Goranov', 'agoranov7@google.it', 'f5beb40ea2ce8588c802d55a3275362a', 0, '6839262318', NULL),
(115, NULL, 'Juditha Knyvett', 'jknyvett0@aboutads.info', 'a73e22238f1c345056640da1d47ca6b0', 0, '5342397033', NULL),
(116, NULL, 'Ferrell MacDermand', 'fmacdermand1@odnoklassniki.ru', 'cb8bcec8e16b4e7f911df5b66ac39467', 0, '5537613381', NULL),
(117, NULL, 'Thelma Vannar', 'tvannar2@ox.ac.uk', '3707456f727b3e0bf3478b6e3399fc7d', 0, NULL, NULL),
(118, NULL, 'Kaitlin Stendall', 'kstendall3@census.gov', '09eccf3533e74da3876512e167902448', 0, NULL, NULL),
(119, NULL, 'Syd Gong', 'sgong4@devhub.com', '96103d409ed0aab32c5a80414f0afd01', 0, NULL, NULL),
(120, NULL, 'Brandon Gennrich', 'bgennrich5@posterous.com', '28ba1dc7a2730d383f5708f5cb00b13f', 0, '6533599857', NULL),
(121, NULL, 'Pacorro Horsell', 'phorsell6@blinklist.com', '40405549b5859cc2ae8ed92877bbe444', 0, NULL, NULL),
(122, NULL, 'Alister Busain', 'abusain7@sciencedirect.com', '9fe9b493e72bdbf4dd586c5f6f6f51e6', 0, NULL, NULL),
(123, NULL, 'Liane Attrill', 'lattrill8@example.com', '421d5c85db997d215758edb7232ffd60', 0, '9052396976', NULL),
(124, NULL, 'Jakie O\'Cahey', 'jocahey9@youtu.be', '70f0d34f80c89f0781ad0de8873f0d38', 0, '7616036589', NULL),
(125, NULL, 'Betteanne Paish', 'bpaisha@shinystat.com', '725f6e95a5afe8393cb8ed932534fa2d', 0, NULL, NULL),
(126, NULL, 'Jessalin Garnul', 'jgarnulb@acquirethisname.com', 'c6ca7178051548372d445bdb4d232eea', 0, NULL, NULL),
(127, NULL, 'Dniren Finn', 'dfinnc@gov.uk', 'b63761afd70446024a0a87b6282c9fd1', 0, NULL, NULL),
(128, NULL, 'Pen Swanston', 'pswanstond@cpanel.net', '064cab1bb90c0e0dc1947b899c2f0cee', 0, '1033457376', NULL),
(129, NULL, 'Dinnie Pietz', 'dpietze@upenn.edu', 'c2db5e6270cbdbe17b9af5facca58774', 0, '4274440404', NULL),
(130, NULL, 'Pepi Pitfield', 'ppitfieldf@home.pl', '7db31b9728bea76389071094ef9e7128', 0, '9741816266', NULL),
(131, NULL, 'Demetris MacKniely', 'dmacknielyg@opera.com', '10f6dbf427f68f51e4423ced1c6a9c4c', 0, NULL, NULL),
(132, NULL, 'Cacilie Golby', 'cgolbyh@addthis.com', '682708e2443266731e70a0f2a9848a47', 0, NULL, NULL),
(133, NULL, 'Kareem Fairhurst', 'kfairhursti@rambler.ru', 'dcf89b419526a80334056fbf49a09a55', 0, NULL, NULL),
(134, NULL, 'Gill Stoves', 'gstovesj@cornell.edu', '9e3480c2c721577bf72cacafa799a5a9', 0, NULL, NULL),
(135, NULL, 'Kaiser Surgison', 'ksurgisonk@smh.com.au', '2ce5a06f72be9b948e6b3c3b17274ee1', 0, NULL, NULL),
(136, NULL, 'Gracia O\'Reilly', 'goreillyl@ifeng.com', '55813f11b47ece0547d9b1bdc08c7ec2', 0, '8254074811', NULL),
(137, NULL, 'Emmanuel Bau', 'ebaum@epa.gov', '5ec1568027ff59d98ffb40fa27055e11', 0, '9552431419', NULL),
(138, NULL, 'Kevin Penni', 'kpennin@ebay.com', 'd6fd4f9f6d052a6a870716d90354d21d', 0, NULL, NULL),
(139, NULL, 'Gilbert Lydden', 'glyddeno@storify.com', '68ead1019c4d6d94d76d469e2264d597', 0, '3821577331', NULL),
(140, NULL, 'Gaultiero Chastand', 'gchastandp@friendfeed.com', '0a443da325b72d7b9861b996a8cbec07', 0, '6431491014', NULL),
(141, NULL, 'Danny Belfitt', 'dbelfittq@goo.gl', '01b9c331dfd3d362f6c033836b6b8f9c', 0, '3428128521', NULL),
(142, NULL, 'Allissa Iori', 'aiorir@odnoklassniki.ru', '92bc7596cf20d7b5211b547df7a01e88', 0, '2812768024', NULL),
(143, NULL, 'Jobi Saiger', 'jsaigers@goodreads.com', 'de7d752726d279c2536a380e6f61f6f0', 0, '1334202454', NULL),
(144, NULL, 'Elinore Pasquale', 'epasqualet@nymag.com', 'ad954920a77779c01cae6899436f0663', 0, '2599884478', NULL),
(145, NULL, 'Corliss Clipson', 'cclipsonu@miitbeian.gov.cn', '87146bf43bc61bd1bc53486f438d267a', 0, '4766292111', NULL),
(146, NULL, 'Dora Kernley', 'dkernleyv@blogtalkradio.com', '5527d8fde169a0b4c1f47af1ff792ec1', 0, '2405883944', NULL),
(147, NULL, 'Natalya Wharf', 'nwharfw@icq.com', '6093c48a4127be448ec45a0182ef7c7f', 0, NULL, NULL),
(148, NULL, 'Peta Kippin', 'pkippinx@springer.com', 'ffa97cc455661b43eaa5597f719c852a', 0, '6769879604', NULL),
(149, NULL, 'Pebrook Mandrey', 'pmandreyy@amazon.co.uk', 'ab2a651771ece50db4d894af424d30e8', 0, NULL, NULL),
(150, NULL, 'Glennie Warricker', 'gwarrickerz@jugem.jp', 'bb9d0be4fe30f20e5f0a6c071823b4f6', 0, '3959181862', NULL),
(151, NULL, 'Moore Procter', 'mprocter10@eventbrite.com', '0dcbc007b63e120d81adf84c2ea6ad81', 0, NULL, NULL),
(152, NULL, 'Emelina de Cullip', 'ede11@wordpress.com', 'd8c20b6c3d343940d91ca35fa2b64b1d', 0, NULL, NULL),
(153, NULL, 'Jock Oleszczak', 'joleszczak12@freewebs.com', '2a9ffcc67a8426d1f334a079dd73e5e1', 0, NULL, NULL),
(154, NULL, 'Michaella Grummitt', 'mgrummitt13@cornell.edu', '6c0e2c7d369c98b834497292e07f1548', 0, NULL, NULL),
(155, NULL, 'Marty Frill', 'mfrill14@archive.org', '1cf4d89c97b7f739840333917ddf42d1', 0, NULL, NULL),
(156, NULL, 'Novelia Pickless', 'npickless15@businesswire.com', 'f1408a76c3bfe0326ecc50e2a6aafb0f', 0, '1491472494', NULL),
(157, NULL, 'Wynny Joddens', 'wjoddens16@themeforest.net', '7d1a138e891ddf342d992327d7eb21ae', 0, '2006155800', NULL),
(158, NULL, 'Harri Gadie', 'hgadie17@mac.com', 'b92cf6968f23456206d7b9f91378ed96', 0, NULL, NULL),
(159, NULL, 'Paddy Greenroad', 'pgreenroad18@hhs.gov', '4a913e45a43090938e47c4e02f13321d', 0, NULL, NULL),
(160, NULL, 'Nahum Fitzsimon', 'nfitzsimon19@t.co', 'efa395fb9ba0bf78b02587850887d2db', 0, NULL, NULL),
(161, NULL, 'Janna MacRorie', 'jmacrorie1a@irs.gov', '4f6a6a4df7869f6be53f4668766f1fd5', 0, '2316088753', NULL),
(162, NULL, 'Kordula McGhie', 'kmcghie1b@123-reg.co.uk', 'de9e6a96dee63f3f9433c26f5cbe49ef', 0, NULL, NULL),
(163, NULL, 'Jacynth Hyndman', 'jhyndman1c@seesaa.net', '79dde5bd2dbddf76441bf67bdfbbc47d', 0, NULL, NULL),
(164, NULL, 'Fairlie Lates', 'flates1d@wiley.com', '23fc3ef97e4271c5bb2e17d2f1c8ea03', 0, NULL, NULL),
(165, NULL, 'Morgan Tilzey', 'mtilzey1e@discuz.net', 'ea9dda0d86760574935badd9db3b51ca', 0, NULL, NULL),
(166, NULL, 'Phillipp Loseke', 'ploseke1f@t-online.de', '47157ed7a0d5aac9973bdf0e4130bdf1', 0, '3485300242', NULL),
(167, NULL, 'Lisetta Songist', 'lsongist1g@ca.gov', '2a25e29d6578ced9b0cee32a81614c1b', 0, NULL, NULL),
(168, NULL, 'Chiquia Squirrell', 'csquirrell1h@cisco.com', '16f39f6ef64af8e3203fb9b373f2bc5e', 0, NULL, NULL),
(169, NULL, 'Arda Coley', 'acoley1i@earthlink.net', '336b6f1ebbeffbee9065391bf362a9d7', 0, NULL, NULL),
(170, NULL, 'Thatch Mapowder', 'tmapowder1j@loc.gov', 'f4e71cb30c6cf9f3a0ab90363375d22d', 0, NULL, NULL),
(171, NULL, 'Egan Chiddy', 'echiddy1k@tripod.com', '1d5814a2ea126462816ede75a9312a56', 0, NULL, NULL),
(172, NULL, 'Rudolf Keasy', 'rkeasy1l@toplist.cz', '93701b90e36023eb6073bde256d51ead', 0, '7807487092', NULL),
(173, NULL, 'Octavia Kingsmill', 'okingsmill1m@wix.com', '21fbb8aa5e876669abe3b22af62163e2', 0, '6226580185', NULL),
(174, NULL, 'Gabriela Wafer', 'gwafer1n@4shared.com', 'd6ffe1c763826fb66a4f1fce06db3376', 0, '1139098208', NULL),
(175, NULL, 'Ethelin Haigh', 'ehaigh1o@cloudflare.com', '57985d7ed2cf432de5f6a1efa68f1eaf', 0, NULL, NULL),
(176, NULL, 'Kenn Bingham', 'kbingham1p@eventbrite.com', '07c940a8600d8e811b111e632812d1f5', 0, '1725070505', NULL),
(177, NULL, 'Vergil Jaze', 'vjaze1q@godaddy.com', 'eb076aa0d5e827de95d9f364fd93e1f5', 0, NULL, NULL),
(178, NULL, 'Sharl Cullon', 'scullon1r@fda.gov', 'e4991c3bb69932063b4fed2ea9ed0364', 0, '8665016252', NULL),
(179, NULL, 'Terrie Philipot', 'tphilipot1s@shareasale.com', '5faa0fcdb4f393ec321525a3397a49dd', 0, '8294381448', NULL),
(180, NULL, 'Garvy McCardle', 'gmccardle1t@newyorker.com', 'b5f3de8c41aea769c29ef3912074a482', 0, NULL, NULL),
(181, NULL, 'Cara Drezzer', 'cdrezzer1u@constantcontact.com', '7d013fdb4378042a37fc55e17b338d85', 0, '6809485028', NULL),
(182, NULL, 'Lonee Peeke-Vout', 'lpeekevout1v@wordpress.org', '1c5f56951be44484b8cb2f6a6949288b', 0, '6143939749', NULL),
(183, NULL, 'Othelia Caddies', 'ocaddies1w@123-reg.co.uk', '185cdf870e4f12fb61fb99ad72bfe417', 0, '1075389336', NULL),
(184, NULL, 'Levon Challens', 'lchallens1x@theatlantic.com', '4ca56f34f81f4a2561742fd45c334fa3', 0, '1586605829', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`address_id`);

--
-- Indexes for table `amenity`
--
ALTER TABLE `amenity`
  ADD PRIMARY KEY (`amenity_id`);

--
-- Indexes for table `favorites`
--
ALTER TABLE `favorites`
  ADD PRIMARY KEY (`property_id`,`user_id`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`media_id`);

--
-- Indexes for table `property`
--
ALTER TABLE `property`
  ADD PRIMARY KEY (`property_id`),
  ADD KEY `property_address` (`address_id`),
  ADD KEY `owner_id_property` (`user_id`),
  ADD KEY `property_image` (`media_id`),
  ADD KEY `property_type` (`property_type_id`);

--
-- Indexes for table `property_amenity`
--
ALTER TABLE `property_amenity`
  ADD PRIMARY KEY (`property_id`,`amenity_id`),
  ADD KEY `property_amenity` (`amenity_id`);

--
-- Indexes for table `property_type`
--
ALTER TABLE `property_type`
  ADD PRIMARY KEY (`property_type_id`),
  ADD KEY `fk_featured_image` (`featured_image`);

--
-- Indexes for table `rent_agreement`
--
ALTER TABLE `rent_agreement`
  ADD PRIMARY KEY (`rent_agreement_id`),
  ADD KEY `tenant_id_rent` (`user_id`),
  ADD KEY `property_id_rent` (`property_id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`review_id`),
  ADD KEY `rent_agreement_id_fk` (`rent_agreement_id`),
  ADD KEY `tenant_id_review` (`user_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `user_media_fk` (`media_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `address_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `amenity`
--
ALTER TABLE `amenity`
  MODIFY `amenity_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `media_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `property`
--
ALTER TABLE `property`
  MODIFY `property_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `property_type`
--
ALTER TABLE `property_type`
  MODIFY `property_type_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `rent_agreement`
--
ALTER TABLE `rent_agreement`
  MODIFY `rent_agreement_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `review_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=185;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `favorites`
--
ALTER TABLE `favorites`
  ADD CONSTRAINT `property_id_fav` FOREIGN KEY (`property_id`) REFERENCES `property` (`property_id`),
  ADD CONSTRAINT `tenant_id_fav` FOREIGN KEY (`property_id`) REFERENCES `property` (`property_id`);

--
-- Constraints for table `property`
--
ALTER TABLE `property`
  ADD CONSTRAINT `owner_id_property` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `property_address` FOREIGN KEY (`address_id`) REFERENCES `address` (`address_id`);

--
-- Constraints for table `property_amenity`
--
ALTER TABLE `property_amenity`
  ADD CONSTRAINT `property_amenity` FOREIGN KEY (`amenity_id`) REFERENCES `amenity` (`amenity_id`),
  ADD CONSTRAINT `property_id_amenity` FOREIGN KEY (`property_id`) REFERENCES `property` (`property_id`);

--
-- Constraints for table `property_type`
--
ALTER TABLE `property_type`
  ADD CONSTRAINT `fk_featured_image` FOREIGN KEY (`featured_image`) REFERENCES `media` (`media_id`);

--
-- Constraints for table `rent_agreement`
--
ALTER TABLE `rent_agreement`
  ADD CONSTRAINT `property_id_rent` FOREIGN KEY (`property_id`) REFERENCES `property` (`property_id`),
  ADD CONSTRAINT `tenant_id_rent` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `rent_agreement_id_fk` FOREIGN KEY (`rent_agreement_id`) REFERENCES `rent_agreement` (`rent_agreement_id`),
  ADD CONSTRAINT `tenant_id_review` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_media_fk` FOREIGN KEY (`media_id`) REFERENCES `media` (`media_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
