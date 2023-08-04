-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 04, 2023 at 09:02 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hotel`
--

-- --------------------------------------------------------

--
-- Table structure for table `checked`
--

CREATE TABLE `checked` (
  `id` int(11) NOT NULL,
  `ref_no` int(11) NOT NULL,
  `roomid` int(30) NOT NULL,
  `booked_cid` int(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `contact_no` varchar(50) NOT NULL,
  `date_in` datetime NOT NULL,
  `date_out` datetime NOT NULL,
  `status` varchar(50) NOT NULL COMMENT 'checkin=1,checkout=2,pending=0',
  `date_updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `checked`
--

INSERT INTO `checked` (`id`, `ref_no`, `roomid`, `booked_cid`, `name`, `contact_no`, `date_in`, `date_out`, `status`, `date_updated`) VALUES
(1, 6589, 3, 1, 'nehal', '8657904486', '2024-07-23 17:00:00', '2025-07-23 17:00:00', '1', '2025-07-23 17:30:00'),
(2, 4848, 1, 1, 'rehan', '9424904925', '2024-07-23 20:00:00', '2026-07-23 20:00:00', '1', '2026-07-23 20:30:00'),
(3, 9035, 2, 1, 'sam', '7773010439', '2025-07-23 16:00:00', '2026-07-23 16:00:00', '1', '2026-07-23 17:30:00'),
(4, 1806, 22, 5, 'preeti', '662653209', '2023-07-26 06:15:00', '2023-07-27 06:15:00', '1', '2023-07-27 06:14:00'),
(5, 4565, 15, 3, 'dev', '765478987', '2023-07-26 06:45:00', '2023-07-27 06:45:00', '1', '2023-07-27 04:00:00'),
(8, 1234, 7, 2, 'piyaa', '890989098', '2023-07-26 19:22:00', '2023-07-27 19:22:00', '1', '2023-07-27 18:00:00'),
(9, 0, 0, 0, '', '', '2023-07-31 06:04:00', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `username`, `password`, `role`) VALUES
(1, 'ruhi', 'abc', 1),
(2, 'admin', '123', 2);

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` int(11) NOT NULL,
  `roomno` int(5) NOT NULL,
  `roomtype` varchar(40) NOT NULL,
  `sdescription` varchar(100) NOT NULL,
  `description` varchar(500) NOT NULL,
  `price` int(8) NOT NULL,
  `image` varchar(50) NOT NULL,
  `status` text NOT NULL,
  `size` varchar(40) NOT NULL,
  `conveniences` varchar(500) NOT NULL,
  `sigfeature` varchar(100) NOT NULL,
  `occupancy` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `roomno`, `roomtype`, `sdescription`, `description`, `price`, `image`, `status`, `size`, `conveniences`, `sigfeature`, `occupancy`) VALUES
(12, 101, 'Luxury Room', 'These cozy rooms located in the historic Palace Wing are the gateway to a memorable experience.', 'These cozy rooms located in the historic Palace Wing are the gateway to a memorable experience. Perfect for meditation, these windowless rooms offer you complete tranquillity. Designed for our jet-setting business travellers who require silence. ', 2500, 'images/room1.jpg', '', '33 Sq Mt', '24-hour in-room dining |\r\nPremium Wi-Fi at nominal charge |\r\nInclusive newspapers |\r\nTea-coffee maker |\r\nInclusive of WiFi |\r\nDual-line telephones with voicemail & data capabilities |\r\n24-hour personalised butler service |\r\nBottles of mineral water.', 'Spacious rooms and bathrooms.', 'Up to 3 guests. Max Adults: 3, Max Children: 2'),
(13, 102, 'Luxury Room', 'These cozy rooms located in the historic Palace Wing are the gateway to a memorable experience.Perfe', 'These cozy rooms located in the historic Palace Wing are the gateway to a memorable experience. Perfect for meditation, these windowless rooms offer you complete tranquillity. Designed for our jet-setting business travellers who require silence. ', 2500, 'images/room1.jpg', '', '33 Sq Mt', '24-hour in-room dining |\r\nPremium Wi-Fi at nominal charge |\r\nInclusive newspapers |\r\nTea-coffee maker |\r\nInclusive of WiFi |\r\nDual-line telephones with voicemail & data capabilities |\r\n24-hour personalised butler service |\r\nBottles of mineral water.', 'Spacious rooms and bathrooms.', 'Up to 3 guests. Max Adults: 3, Max Children: 2'),
(14, 103, 'Luxury Room', 'These cozy rooms located in the historic Palace Wing are the gateway to a memorable experience.Perfe', 'These cozy rooms located in the historic Palace Wing are the gateway to a memorable experience. Perfect for meditation, these windowless rooms offer you complete tranquillity. Designed for our jet-setting business travellers who require silence. ', 2500, 'images/room1.jpg', '', '33 Sq Mt', '24-hour in-room dining |\r\nPremium Wi-Fi at nominal charge |\r\nInclusive newspapers |\r\nTea-coffee maker |\r\nInclusive of WiFi |\r\nDual-line telephones with voicemail & data capabilities |\r\n24-hour personalised butler service |\r\nBottles of mineral water.', 'Spacious rooms and bathrooms.', 'Up to 3 guests. Max Adults: 3, Max Children: 2'),
(15, 104, 'Luxury Room', 'These cozy rooms located in the historic Palace Wing are the gateway to a memorable experience.Perfe', 'These cozy rooms located in the historic Palace Wing are the gateway to a memorable experience. Perfect for meditation, these windowless rooms offer you complete tranquillity. Designed for our jet-setting business travellers who require silence. ', 2500, 'images/room1.jpg', '', '33 Sq Mt', '24-hour in-room dining |\r\nPremium Wi-Fi at nominal charge |\r\nInclusive newspapers |\r\nTea-coffee maker |\r\nInclusive of WiFi |\r\nDual-line telephones with voicemail & data capabilities |\r\n24-hour personalised butler service |\r\nBottles of mineral water.', 'Spacious rooms and bathrooms.', 'Up to 3 guests. Max Adults: 3, Max Children: 2'),
(16, 105, 'Luxury Room', 'These cozy rooms located in the historic Palace Wing are the gateway to a memorable experience.Perfe', 'These cozy rooms located in the historic Palace Wing are the gateway to a memorable experience. Perfect for meditation, these windowless rooms offer you complete tranquillity. Designed for our jet-setting business travellers who require silence. ', 2500, 'images/room1.jpg', '', '33 Sq Mt', '24-hour in-room dining |\r\nPremium Wi-Fi at nominal charge |\r\nInclusive newspapers |\r\nTea-coffee maker |\r\nInclusive of WiFi |\r\nDual-line telephones with voicemail & data capabilities |\r\n24-hour personalised butler service |\r\nBottles of mineral water.', 'Spacious rooms and bathrooms.', 'Up to 3 guests. Max Adults: 3, Max Children: 2'),
(17, 201, 'Luxury Suite', 'These picturesque thematic suites have a spacious living area and bedroom', 'These picturesque thematic suites have a spacious living area and bedroom. These suites allows access to buffet breakfast at the Sea Lounge, high-tea at the Palace Lounge from 1500 hrs to 1700 hrs, daily evening cocktail hours at the Palace Lounge from 1800 hrs to 1900 hrs, service of hot and soft beverages at the Palace Lounge from 0700 hrs to 2300 hrs and 24-hours personalized butler service. Inclusive 02-way airport transfers and 02 pieces of garments for ironing per stay. Convenience of earl', 3000, 'images/room2.jpg', '', '40 Sq Mt', '24-hour personalised butler service |\r\nInclusive two-way Airport Transfer |\r\nBottles of mineral water |\r\n50-inch flat-screen TV with satellite programmes |\r\nPremium Wi-Fi at nominal charge |\r\nInclusive newspapers |\r\nWelcome drink |\r\nInclusive daily breakfast at Shamiana.', 'The Lotus & Aquarius Suites have a view of the Grand Central Dome of the hotel - the most picturesqu', 'Up to 3 guests. Max Adults: 3, Max Children: 2'),
(18, 202, 'Luxury Suite', 'These picturesque thematic suites have a spacious living area and bedroom', 'These picturesque thematic suites have a spacious living area and bedroom. These suites allows access to buffet breakfast at the Sea Lounge, high-tea at the Palace Lounge from 1500 hrs to 1700 hrs, daily evening cocktail hours at the Palace Lounge from 1800 hrs to 1900 hrs, service of hot and soft beverages at the Palace Lounge from 0700 hrs to 2300 hrs and 24-hours personalized butler service. Inclusive 02-way airport transfers and 02 pieces of garments for ironing per stay. Convenience of earl', 3000, 'images/room2.jpg', '', '33 Sq Mt', '24-hour personalised butler service |\r\nInclusive two-way Airport Transfer |\r\nBottles of mineral water |\r\n50-inch flat-screen TV with satellite programmes |\r\nPremium Wi-Fi at nominal charge |\r\nInclusive newspapers |\r\nWelcome drink |\r\nInclusive daily breakfast at Shamiana.', 'The Lotus & Aquarius Suites have a view of the Grand Central Dome of the hotel - the most picturesqu', 'Up to 3 guests. Max Adults: 3, Max Children: 2'),
(19, 203, 'Luxury Suite', 'These picturesque thematic suites have a spacious living area and bedroom', 'These picturesque thematic suites have a spacious living area and bedroom. These suites allows access to buffet breakfast at the Sea Lounge, high-tea at the Palace Lounge from 1500 hrs to 1700 hrs, daily evening cocktail hours at the Palace Lounge from 1800 hrs to 1900 hrs, service of hot and soft beverages at the Palace Lounge from 0700 hrs to 2300 hrs and 24-hours personalized butler service. Inclusive 02-way airport transfers and 02 pieces of garments for ironing per stay. Convenience of earl', 3000, 'images/room2.jpg', '', '33 Sq Mt', '24-hour personalised butler service |\r\nInclusive two-way Airport Transfer |\r\nBottles of mineral water |\r\n50-inch flat-screen TV with satellite programmes |\r\nPremium Wi-Fi at nominal charge |\r\nInclusive newspapers |\r\nWelcome drink |\r\nInclusive daily breakfast at Shamiana.', 'The Lotus & Aquarius Suites have a view of the Grand Central Dome of the hotel - the most picturesqu', 'Up to 3 guests. Max Adults: 3, Max Children: 2'),
(20, 204, 'Luxury Suite', 'These picturesque thematic suites have a spacious living area and bedroom', 'These picturesque thematic suites have a spacious living area and bedroom. These suites allows access to buffet breakfast at the Sea Lounge, high-tea at the Palace Lounge from 1500 hrs to 1700 hrs, daily evening cocktail hours at the Palace Lounge from 1800 hrs to 1900 hrs, service of hot and soft beverages at the Palace Lounge from 0700 hrs to 2300 hrs and 24-hours personalized butler service. Inclusive 02-way airport transfers and 02 pieces of garments for ironing per stay. Convenience of earl', 3000, 'images/room2.jpg', '', '33 Sq Mt', '24-hour personalised butler service |\r\nInclusive two-way Airport Transfer |\r\nBottles of mineral water |\r\n50-inch flat-screen TV with satellite programmes |\r\nPremium Wi-Fi at nominal charge |\r\nInclusive newspapers |\r\nWelcome drink |\r\nInclusive daily breakfast at Shamiana.', 'The Lotus & Aquarius Suites have a view of the Grand Central Dome of the hotel - the most picturesqu', 'Up to 3 guests. Max Adults: 3, Max Children: 2'),
(21, 205, 'Luxury Suite', 'These picturesque thematic suites have a spacious living area and bedroom', 'These picturesque thematic suites have a spacious living area and bedroom. These suites allows access to buffet breakfast at the Sea Lounge, high-tea at the Palace Lounge from 1500 hrs to 1700 hrs, daily evening cocktail hours at the Palace Lounge from 1800 hrs to 1900 hrs, service of hot and soft beverages at the Palace Lounge from 0700 hrs to 2300 hrs and 24-hours personalized butler service. Inclusive 02-way airport transfers and 02 pieces of garments for ironing per stay. Convenience of earl', 3000, 'images/room2.jpg', '', '33 Sq Mt', '24-hour personalised butler service |\r\nInclusive two-way Airport Transfer |\r\nBottles of mineral water |\r\n50-inch flat-screen TV with satellite programmes |\r\nPremium Wi-Fi at nominal charge |\r\nInclusive newspapers |\r\nWelcome drink |\r\nInclusive daily breakfast at Shamiana.\r\n', 'The Lotus & Aquarius Suites have a view of the Grand Central Dome of the hotel - the most picturesqu', 'Up to 3 guests. Max Adults: 3, Max Children: 2'),
(22, 301, 'Executive Suite', 'These thematic suites offer an exclusive host, access to buffet breakfast at the Sea Lounge, high-te', 'These thematic suites offer an exclusive host of amenities such as access to buffet breakfast at the Sea Lounge, high-tea at the Palace Lounge from 1500 hrs to 1700 hrs, daily evening cocktail hours at the Palace Lounge from 1800 hrs to 1900 hrs, service of hot and soft beverages at the Palace Lounge from 0700 hrs to 2300 hrs and 24-hours personalized butler service. Inclusive 01-way airport transfer and 02 pieces of garments for ironing per stay', 3500, 'images/room3.jpg', '', '25 Sq Mt', '24-hour in-room dining |\r\nPremium Wi-Fi at nominal charge |\r\nInclusive newspapers |\r\nDaily housekeeping & turndown service |\r\n24-hour laundry service |\r\nIron & ironing board on request |\r\nWell-stocked minibar |\r\nBottles of mineral water.', 'Classic decor providing a sense of history', 'Up to 3 guests. Max Adults: 3, Max Children: 2'),
(23, 302, 'Executive Suite', 'These thematic suites offer an exclusive host, access to buffet breakfast at the Sea Lounge, high-te', 'These thematic suites offer an exclusive host of amenities such as access to buffet breakfast at the Sea Lounge, high-tea at the Palace Lounge from 1500 hrs to 1700 hrs, daily evening cocktail hours at the Palace Lounge from 1800 hrs to 1900 hrs, service of hot and soft beverages at the Palace Lounge from 0700 hrs to 2300 hrs and 24-hours personalized butler service. Inclusive 01-way airport transfer and 02 pieces of garments for ironing per stay', 3500, 'images/room3.jpg', '', '25 Sq Mt', '24-hour in-room dining |\r\nPremium Wi-Fi at nominal charge |\r\nInclusive newspapers |\r\nDaily housekeeping & turndown service |\r\n24-hour laundry service |\r\nIron & ironing board on request |\r\nWell-stocked minibar |\r\nBottles of mineral water.', 'Classic decor providing a sense of history', 'Up to 3 guests. Max Adults: 3, Max Children: 2'),
(24, 303, 'Executive Suite', 'These thematic suites offer an exclusive host, access to buffet breakfast at the Sea Lounge, high-te', 'These thematic suites offer an exclusive host of amenities such as access to buffet breakfast at the Sea Lounge, high-tea at the Palace Lounge from 1500 hrs to 1700 hrs, daily evening cocktail hours at the Palace Lounge from 1800 hrs to 1900 hrs, service of hot and soft beverages at the Palace Lounge from 0700 hrs to 2300 hrs and 24-hours personalized butler service. Inclusive 01-way airport transfer and 02 pieces of garments for ironing per stay', 3500, 'images/room3.jpg', '', '25 Sq Mt', '24-hour in-room dining |\r\nPremium Wi-Fi at nominal charge |\r\nInclusive newspapers |\r\nDaily housekeeping & turndown service |\r\n24-hour laundry service |\r\nIron & ironing board on request |\r\nWell-stocked minibar |\r\nBottles of mineral water.', 'Classic decor providing a sense of history', 'Up to 3 guests. Max Adults: 3, Max Children: 2'),
(25, 304, 'Executive Suite', 'These thematic suites offer an exclusive host, access to buffet breakfast at the Sea Lounge, high-te', 'These thematic suites offer an exclusive host of amenities such as access to buffet breakfast at the Sea Lounge, high-tea at the Palace Lounge from 1500 hrs to 1700 hrs, daily evening cocktail hours at the Palace Lounge from 1800 hrs to 1900 hrs, service of hot and soft beverages at the Palace Lounge from 0700 hrs to 2300 hrs and 24-hours personalized butler service. Inclusive 01-way airport transfer and 02 pieces of garments for ironing per stay', 3500, 'images/room3.jpg', '', '25 Sq Mt', '24-hour in-room dining |\r\nPremium Wi-Fi at nominal charge |\r\nInclusive newspapers |\r\nDaily housekeeping & turndown service |\r\n24-hour laundry service |\r\nIron & ironing board on request |\r\nWell-stocked minibar |\r\nBottles of mineral water.', 'Classic decor providing a sense of history', 'Up to 3 guests. Max Adults: 3, Max Children: 2'),
(26, 305, 'Executive Suite', 'These thematic suites offer an exclusive host, access to buffet breakfast at the Sea Lounge, high-te', 'These thematic suites offer an exclusive host of amenities such as access to buffet breakfast at the Sea Lounge, high-tea at the Palace Lounge from 1500 hrs to 1700 hrs, daily evening cocktail hours at the Palace Lounge from 1800 hrs to 1900 hrs, service of hot and soft beverages at the Palace Lounge from 0700 hrs to 2300 hrs and 24-hours personalized butler service. Inclusive 01-way airport transfer and 02 pieces of garments for ironing per stay', 3500, 'images/room3.jpg', '', '25 Sq Mt', '24-hour in-room dining |\r\nPremium Wi-Fi at nominal charge |\r\nInclusive newspapers |\r\nDaily housekeeping & turndown service |\r\n24-hour laundry service |\r\nIron & ironing board on request |\r\nWell-stocked minibar |\r\nBottles of mineral water.', 'Classic decor providing a sense of history', 'Up to 3 guests. Max Adults: 3, Max Children: 2'),
(27, 401, 'Signature Suite', 'These storied suites each have a unique history and offer breath-taking views', 'These storied suites each have a unique history and offer breath-taking views of the Gateway of India and the Arabian Sea. Choose from the traditional Rajput Suite to the maritime-themed Bell Tower Suite or the magnificent duplex Ravi Shankar Suite. Adorned with original artefacts, each suite is a treasure trove of art and sculpture waiting to be explored.', 4000, 'images/room4.jpg', '', '32 Sq Mt', '24-hour in-room dining |\r\nInclusive newspapers |\r\nDaily housekeeping & turndown service |\r\n24-hour laundry service |\r\nIron & ironing board on request |\r\n24-hour on-call doctor & nurse |\r\nTea-coffee maker |\r\nDaily two bottles mineral water.', 'Unique suite offering a Rajasthani splendour', 'Up to 3 guests. Max Adults: 3, Max Children: 2'),
(28, 402, 'Signature Suite', 'These storied suites each have a unique history and offer breath-taking views', 'These storied suites each have a unique history and offer breath-taking views of the Gateway of India and the Arabian Sea. Choose from the traditional Rajput Suite to the maritime-themed Bell Tower Suite or the magnificent duplex Ravi Shankar Suite. Adorned with original artefacts, each suite is a treasure trove of art and sculpture waiting to be explored.', 4000, 'images/room4.jpg', '', '32 Sq Mt', '24-hour in-room dining |\r\nInclusive newspapers |\r\nDaily housekeeping & turndown service |\r\n24-hour laundry service |\r\nIron & ironing board on request |\r\n24-hour on-call doctor & nurse |\r\nTea-coffee maker |\r\nDaily two bottles mineral water.', 'Unique suite offering a Rajasthani splendour', 'Up to 3 guests. Max Adults: 3, Max Children: 2'),
(29, 403, 'Signature Suite', 'These storied suites each have a unique history and offer breath-taking views', 'These storied suites each have a unique history and offer breath-taking views of the Gateway of India and the Arabian Sea. Choose from the traditional Rajput Suite to the maritime-themed Bell Tower Suite or the magnificent duplex Ravi Shankar Suite. Adorned with original artefacts, each suite is a treasure trove of art and sculpture waiting to be explored.', 4000, 'images/room4.jpg', '', '32 Sq Mt', '24-hour in-room dining |\r\nInclusive newspapers |\r\nDaily housekeeping & turndown service |\r\n24-hour laundry service |\r\nIron & ironing board on request |\r\n24-hour on-call doctor & nurse |\r\nTea-coffee maker |\r\nDaily two bottles mineral water.', 'Unique suite offering a Rajasthani splendour', 'Up to 3 guests. Max Adults: 3, Max Children: 2'),
(30, 404, 'Signature Suite', 'These storied suites each have a unique history and offer breath-taking views', 'These storied suites each have a unique history and offer breath-taking views of the Gateway of India and the Arabian Sea. Choose from the traditional Rajput Suite to the maritime-themed Bell Tower Suite or the magnificent duplex Ravi Shankar Suite. Adorned with original artefacts, each suite is a treasure trove of art and sculpture waiting to be explored.', 4000, 'images/room4.jpg', '', '32 Sq Mt', '24-hour in-room dining |\r\nInclusive newspapers |\r\nDaily housekeeping & turndown service |\r\n24-hour laundry service |\r\nIron & ironing board on request |\r\n24-hour on-call doctor & nurse |\r\nTea-coffee maker |\r\nDaily two bottles mineral water.', 'Unique suite offering a Rajasthani splendour', 'Up to 3 guests. Max Adults: 3, Max Children: 2'),
(31, 405, 'Signature Suite', 'These storied suites each have a unique history and offer breath-taking views', 'These storied suites each have a unique history and offer breath-taking views of the Gateway of India and the Arabian Sea. Choose from the traditional Rajput Suite to the maritime-themed Bell Tower Suite or the magnificent duplex Ravi Shankar Suite. Adorned with original artefacts, each suite is a treasure trove of art and sculpture waiting to be explored.', 4000, 'images/room4.jpg', '', '32 Sq Mt', '24-hour in-room dining |\r\nInclusive newspapers |\r\nDaily housekeeping & turndown service |\r\n24-hour laundry service |\r\nIron & ironing board on request |\r\n24-hour on-call doctor & nurse |\r\nTea-coffee maker |\r\nDaily two bottles mineral water.', 'Unique suite offering a Rajasthani splendour', 'Up to 3 guests. Max Adults: 3, Max Children: 2'),
(32, 501, 'Club Room', 'These immaculately planned rooms offer an exclusive host such as buffet breakfast at the Sea Lounge', 'These immaculately planned rooms offer an exclusive host of amenities such as access to buffet breakfast at the Sea Lounge, high-tea at the Palace Lounge from 1500 hrs to 1700 hrs, daily evening cocktail hours at the Palace Lounge from 1800 hrs to 1900 hrs, service of hot and soft beverages at the Palace Lounge from 0700 hrs to 2300 hrs and 24-hours personalized butler service.', 4500, 'images/room5.jpg', '', '35 Sq Mt', '24-hour in-room dining |\r\nInclusive newspapers |\r\nDaily housekeeping & turndown service |\r\n24-hour laundry service |\r\nIron & ironing board on request |\r\n24-hour on-call doctor & nurse |\r\nTea-coffee maker |\r\nDaily two bottles mineral water.', 'Unique suite offering a Rajasthani splendour', 'Up to 3 guests. Max Adults: 3, Max Children: 2'),
(33, 502, 'Club Room', 'These immaculately planned rooms offer an exclusive host such as buffet breakfast at the Sea Lounge', 'These immaculately planned rooms offer an exclusive host of amenities such as access to buffet breakfast at the Sea Lounge, high-tea at the Palace Lounge from 1500 hrs to 1700 hrs, daily evening cocktail hours at the Palace Lounge from 1800 hrs to 1900 hrs, service of hot and soft beverages at the Palace Lounge from 0700 hrs to 2300 hrs and 24-hours personalized butler service.', 4500, 'images/room5.jpg', '', '35 Sq Mt', '24-hour in-room dining |\r\nInclusive newspapers |\r\nDaily housekeeping & turndown service |\r\n24-hour laundry service |\r\nIron & ironing board on request |\r\n24-hour on-call doctor & nurse |\r\nTea-coffee maker |\r\nDaily two bottles mineral water.', 'Unique suite offering a Rajasthani splendour', 'Up to 3 guests. Max Adults: 3, Max Children: 2'),
(34, 503, 'Club Room', 'These immaculately planned rooms offer an exclusive host such as buffet breakfast at the Sea Lounge', 'These immaculately planned rooms offer an exclusive host of amenities such as access to buffet breakfast at the Sea Lounge, high-tea at the Palace Lounge from 1500 hrs to 1700 hrs, daily evening cocktail hours at the Palace Lounge from 1800 hrs to 1900 hrs, service of hot and soft beverages at the Palace Lounge from 0700 hrs to 2300 hrs and 24-hours personalized butler service.', 4500, 'images/room5.jpg', '', '35 Sq Mt', '24-hour in-room dining |\r\nInclusive newspapers |\r\nDaily housekeeping & turndown service |\r\n24-hour laundry service |\r\nIron & ironing board on request |\r\n24-hour on-call doctor & nurse |\r\nTea-coffee maker |\r\nDaily two bottles mineral water.', 'Unique suite offering a Rajasthani splendour', 'Up to 3 guests. Max Adults: 3, Max Children: 2'),
(35, 504, 'Club Room', 'These immaculately planned rooms offer an exclusive host such as buffet breakfast at the Sea Lounge', 'These immaculately planned rooms offer an exclusive host of amenities such as access to buffet breakfast at the Sea Lounge, high-tea at the Palace Lounge from 1500 hrs to 1700 hrs, daily evening cocktail hours at the Palace Lounge from 1800 hrs to 1900 hrs, service of hot and soft beverages at the Palace Lounge from 0700 hrs to 2300 hrs and 24-hours personalized butler service.', 4500, 'images/room5.jpg', '', '35 Sq Mt', '24-hour in-room dining |\r\nInclusive newspapers |\r\nDaily housekeeping & turndown service |\r\n24-hour laundry service |\r\nIron & ironing board on request |\r\n24-hour on-call doctor & nurse |\r\nTea-coffee maker |\r\nDaily two bottles mineral water.', 'Unique suite offering a Rajasthani splendour', 'Up to 3 guests. Max Adults: 3, Max Children: 2'),
(36, 505, 'Club Room', 'These immaculately planned rooms offer an exclusive host such as buffet breakfast at the Sea Lounge', 'These immaculately planned rooms offer an exclusive host of amenities such as access to buffet breakfast at the Sea Lounge, high-tea at the Palace Lounge from 1500 hrs to 1700 hrs, daily evening cocktail hours at the Palace Lounge from 1800 hrs to 1900 hrs, service of hot and soft beverages at the Palace Lounge from 0700 hrs to 2300 hrs and 24-hours personalized butler service.', 4500, 'images/room5.jpg', '', '35 Sq Mt', '24-hour in-room dining |\r\nInclusive newspapers |\r\nDaily housekeeping & turndown service |\r\n24-hour laundry service |\r\nIron & ironing board on request |\r\n24-hour on-call doctor & nurse |\r\nTea-coffee maker |\r\nDaily two bottles mineral water.', 'Unique suite offering a Rajasthani splendour', 'Up to 3 guests. Max Adults: 3, Max Children: 2'),
(37, 601, 'Luxury Grande Room', 'These rooms have an old world charm with the delicate Rajput bay-windows that offer spectacular view', 'These rooms have an old world charm with the delicate Rajput bay-windows that offer spectacular views of the Arabian Sea or the Gateway of India. Includes butler service and WiFi for four devices. ', 5000, 'images/room6.jpg', '', '33 Sq Mt', '24-hour in-room dining |\r\nPremium Wi-Fi at nominal charge |\r\nInclusive newspapers |\r\n24-hour laundry service |\r\nIron & ironing board on request |\r\n24-hour on-call doctor & nurse |\r\nTea-coffee maker |\r\nChoice of smoking & non-smoking rooms(subject to availability) |\r\nWell-stocked minibar |\r\nInclusive of Wi-fi |\r\nBottles of mineral water.', 'Panoramic views of the Sea.', 'Up to 3 guests. Max Adults: 3, Max Children: 2'),
(38, 602, 'Luxury Grande Room', 'These rooms have an old world charm with the delicate Rajput bay-windows that offer spectacular view', 'These rooms have an old world charm with the delicate Rajput bay-windows that offer spectacular views of the Arabian Sea or the Gateway of India. Includes butler service and WiFi for four devices. ', 5000, 'images/room6.jpg', '', '33 Sq Mt', '24-hour in-room dining |\r\nPremium Wi-Fi at nominal charge |\r\nInclusive newspapers |\r\n24-hour laundry service |\r\nIron & ironing board on request |\r\n24-hour on-call doctor & nurse |\r\nTea-coffee maker |\r\nChoice of smoking & non-smoking rooms(subject to availability) |\r\nWell-stocked minibar |\r\nInclusive of Wi-fi |\r\nBottles of mineral water.', 'Panoramic views of the Sea.', 'Up to 3 guests. Max Adults: 3, Max Children: 2'),
(39, 603, 'Luxury Grande Room', 'These rooms have an old world charm with the delicate Rajput bay-windows that offer spectacular view', 'These rooms have an old world charm with the delicate Rajput bay-windows that offer spectacular views of the Arabian Sea or the Gateway of India. Includes butler service and WiFi for four devices. ', 5000, 'images/room6.jpg', '', '33 Sq Mt', '24-hour in-room dining |\r\nPremium Wi-Fi at nominal charge |\r\nInclusive newspapers |\r\n24-hour laundry service |\r\nIron & ironing board on request |\r\n24-hour on-call doctor & nurse |\r\nTea-coffee maker |\r\nChoice of smoking & non-smoking rooms(subject to availability) |\r\nWell-stocked minibar |\r\nInclusive of Wi-fi |\r\nBottles of mineral water.', 'Panoramic views of the Sea.', 'Up to 3 guests. Max Adults: 3, Max Children: 2'),
(40, 604, 'Luxury Grande Room', 'These rooms have an old world charm with the delicate Rajput bay-windows that offer spectacular view', 'These rooms have an old world charm with the delicate Rajput bay-windows that offer spectacular views of the Arabian Sea or the Gateway of India. Includes butler service and WiFi for four devices. ', 5000, 'images/room6.jpg', '', '33 Sq Mt', '24-hour in-room dining |\r\nPremium Wi-Fi at nominal charge |\r\nInclusive newspapers |\r\n24-hour laundry service |\r\nIron & ironing board on request |\r\n24-hour on-call doctor & nurse |\r\nTea-coffee maker |\r\nChoice of smoking & non-smoking rooms(subject to availability) |\r\nWell-stocked minibar |\r\nInclusive of Wi-fi |\r\nBottles of mineral water.', 'Panoramic views of the Sea.', 'Up to 3 guests. Max Adults: 3, Max Children: 2'),
(41, 605, 'Luxury Grande Room', 'These rooms have an old world charm with the delicate Rajput bay-windows that offer spectacular view', 'These rooms have an old world charm with the delicate Rajput bay-windows that offer spectacular views of the Arabian Sea or the Gateway of India. Includes butler service and WiFi for four devices. ', 5000, 'images/room6.jpg', '', '33 Sq Mt', '24-hour in-room dining |\r\nPremium Wi-Fi at nominal charge |\r\nInclusive newspapers |\r\n24-hour laundry service |\r\nIron & ironing board on request |\r\n24-hour on-call doctor & nurse |\r\nTea-coffee maker |\r\nChoice of smoking & non-smoking rooms(subject to availability) |\r\nWell-stocked minibar |\r\nInclusive of Wi-fi |\r\nBottles of mineral water.', 'Panoramic views of the Sea.', 'Up to 3 guests. Max Adults: 3, Max Children: 2');

-- --------------------------------------------------------

--
-- Table structure for table `room_category`
--

CREATE TABLE `room_category` (
  `id` int(11) NOT NULL,
  `roomtype` varchar(50) NOT NULL,
  `price` varchar(30) NOT NULL,
  `cover_img` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `room_category`
--

INSERT INTO `room_category` (`id`, `roomtype`, `price`, `cover_img`) VALUES
(1, 'Luxury Room', '2500', 'images/room1.jpg'),
(2, 'Luxury Suite', '3000', 'images/room2.jpg'),
(3, 'Executive Suite', '3500', 'images/room3.jpg'),
(4, 'Signature Suite', '4000', 'images/room4.jpg'),
(5, 'Club Room', '4500', 'images/room5.jpg'),
(6, 'Luxury Grande Room', '5000', 'images/room6.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `room_no`
--

CREATE TABLE `room_no` (
  `id` int(11) NOT NULL,
  `room` int(50) NOT NULL,
  `category_id` int(20) NOT NULL,
  `status` varchar(100) NOT NULL COMMENT '0=available,1=unavailable'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `room_no`
--

INSERT INTO `room_no` (`id`, `room`, `category_id`, `status`) VALUES
(1, 101, 1, '1'),
(2, 102, 1, '0'),
(3, 103, 1, '0'),
(4, 104, 1, '0'),
(5, 105, 1, '0'),
(6, 201, 2, '0'),
(7, 202, 2, '1'),
(8, 203, 2, '0'),
(9, 204, 2, '0'),
(10, 205, 2, '1'),
(11, 301, 3, '0'),
(12, 302, 3, '0'),
(13, 303, 3, '0'),
(14, 304, 3, '1'),
(15, 305, 3, '1'),
(16, 401, 4, '0'),
(17, 402, 4, '0'),
(18, 403, 4, '0'),
(19, 404, 4, '0'),
(20, 405, 4, '0'),
(21, 501, 5, '0'),
(22, 502, 5, '1'),
(23, 503, 5, '1'),
(24, 504, 5, '0'),
(25, 505, 5, '1'),
(26, 601, 6, '0'),
(27, 602, 6, '1'),
(28, 603, 6, '1'),
(29, 604, 6, '0'),
(30, 605, 6, '0');

-- --------------------------------------------------------

--
-- Table structure for table `system_settings`
--

CREATE TABLE `system_settings` (
  `id` int(11) NOT NULL,
  `hotel_name` varchar(60) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contact` int(11) NOT NULL,
  `cover_img` varchar(100) NOT NULL,
  `about_content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `system_settings`
--

INSERT INTO `system_settings` (`id`, `hotel_name`, `email`, `contact`, `cover_img`, `about_content`) VALUES
(1, 'Celestial Crown', 'ccinfo@gmail.com', 207772558, 'images/hotel_img', '&lt;p style=&quot;text-align: center; background: transparent; position: relative;&quot;&gt;&lt;span style=&quot;font-size:28px;background: transparent; position: relative;&quot;&gt;ABOUT US&lt;/span&gt;&lt;/b&gt;&lt;/span&gt;&lt;/p&gt;&lt;p style=&quot;text-align: center; background: transparent; position: relative;&quot;&gt;&lt;span style=&quot;background: transparent; position: relative; font-size: 14px;&quot;&gt;&lt;span style=&quot;font-size:28px;background: transparent; position: relative;&quot;&gt;&lt;b style=&quot;margin: 0px; padding: 0px; color: rgb(0, 0, 0); font-family: &amp;quot;Open Sans&amp;quot;, Arial, sans-serif; text-align: justify;&quot;&gt;Lorem Ipsum&lt;/b&gt;&lt;span style=&quot;color: rgb(0, 0, 0); font-family: &amp;quot;Open Sans&amp;quot;, Arial, sans-serif; font-weight: 400; text-align: justify;&quot;&gt;&amp;nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&amp;#x2019;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.&lt;/span&gt;&lt;br&gt;&lt;/span&gt;&lt;/b&gt;&lt;/span&gt;&lt;/p&gt;&lt;p style=&quot;text-align: center; background: transparent; position: relative;&quot;&gt;&lt;span style=&quot;background: transparent; position: relative; font-size: 14px;&quot;&gt;&lt;span style=&quot;font-size:28px;background: transparent; position: relative;&quot;&gt;&lt;span style=&quot;color: rgb(0, 0, 0); font-family: &amp;quot;Open Sans&amp;quot;, Arial, sans-serif; font-weight: 400; text-align: justify;&quot;&gt;&lt;br&gt;&lt;/span&gt;&lt;/b&gt;&lt;/span&gt;&lt;/p&gt;&lt;p style=&quot;text-align: center; background: transparent; position: relative;&quot;&gt;&lt;span style=&quot;background: transparent; position: relative; font-size: 14px;&quot;&gt;&lt;span style=&quot;font-size:28px;background: transparent; position: relative;&quot;&gt;&lt;h2 style=&quot;font-size:28px;background: transparent; position: relative;&quot;&gt;Where does it come from?&lt;/h2&gt;&lt;p style=&quot;text-align: center; margin-bottom: 15px; padding: 0px; color: rgb(0, 0, 0); font-family: &amp;quot;Open Sans&amp;quot;, Arial, sans-serif; font-weight: 400;&quot;&gt;Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of &quot;de Finibus Bonorum et Malorum&quot; (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, &quot;Lorem ipsum dolor sit amet..&quot;, comes from a line in section 1.10.32.&lt;/p&gt;&lt;/span&gt;&lt;/b&gt;&lt;/span&gt;&lt;/p&gt;');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `checked`
--
ALTER TABLE `checked`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `room_category`
--
ALTER TABLE `room_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `room_no`
--
ALTER TABLE `room_no`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `system_settings`
--
ALTER TABLE `system_settings`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `checked`
--
ALTER TABLE `checked`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `room_category`
--
ALTER TABLE `room_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `room_no`
--
ALTER TABLE `room_no`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `system_settings`
--
ALTER TABLE `system_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
