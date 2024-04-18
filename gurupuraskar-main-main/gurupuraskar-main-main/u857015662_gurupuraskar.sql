-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 28, 2024 at 07:23 AM
-- Server version: 10.11.7-MariaDB-cll-lve
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u857015662_gurupuraskar`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity`
--

CREATE TABLE `activity` (
  `id` int(11) NOT NULL,
  `user_code` varchar(256) NOT NULL,
  `activity_name` varchar(128) NOT NULL,
  `activity_from` varchar(128) NOT NULL,
  `activity_date` varchar(128) NOT NULL,
  `activity_points_name` varchar(256) NOT NULL,
  `activity_points` float NOT NULL,
  `activity_balance_type` varchar(128) NOT NULL,
  `activity_balance` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `activity`
--

INSERT INTO `activity` (`id`, `user_code`, `activity_name`, `activity_from`, `activity_date`, `activity_points_name`, `activity_points`, `activity_balance_type`, `activity_balance`) VALUES
(125, '26HU1Z1153TBOU1', 'Registration', 'Gurupuraskar', '27/12/2023', 'ARP', 1000, 'CRE', 1000),
(126, 'YG772N1HLBUGPGF', 'Registration', 'Gurupuraskar', '27/12/2023', 'ARP', 1000, 'CRE', 1000),
(127, 'C1912A8XWK4CZPY', 'Registration', 'Gurupuraskar', '27/12/2023', 'ARP', 1000, 'CRE', 1000),
(128, 'YG772N1HLBUGPGF', 'User registered with your referral code.', '7HMD93BXXWOW843', '28/12/2023', 'RP', 100, 'CRE', 100),
(129, '7HMD93BXXWOW843', 'You registered with a referral code', 'YG772N1HLBUGPGF', '28/12/2023', 'RP', 100, 'CRE', 100),
(130, '7HMD93BXXWOW843', 'Registration', 'Gurupuraskar', '28/12/2023', 'ARP', 1000, 'CRE', 1000),
(131, '8HMD93B11WOW843', 'Registration', 'Gurupuraskar', '28/12/2023', 'ARP', 1000, 'CRE', 1000),
(132, 'Z44CZGK90C2QFG7', 'Registration', 'Gurupuraskar', '28/12/2023', 'ARP', 1000, 'CRE', 1000),
(133, '9TOPP6IIQ7A64V3', 'Registration', 'Gurupuraskar', '02/01/2024', 'ARP', 1000, 'CRE', 1000),
(134, 'Z44CZGK90C2QFG7', 'Rewarded from Review', '9TOPP6IIQ7A64V3', '02/01/2024', 'RP', 25, 'CRE', 25),
(135, '9TOPP6IIQ7A64V3', 'Rewarded to a Review', 'Z44CZGK90C2QFG7', '02/01/2024', 'ARP', 25, 'DEB', 975),
(136, 'Z44CZGK90C2QFG7', 'Rewarded from Review', '9TOPP6IIQ7A64V3', '02/01/2024', 'RP', 26, 'CRE', 51),
(137, '9TOPP6IIQ7A64V3', 'Rewarded to a Review', 'Z44CZGK90C2QFG7', '02/01/2024', 'ARP', 26, 'DEB', 949),
(138, 'Z44CZGK90C2QFG7', 'Rewarded from Review', '9TOPP6IIQ7A64V3', '02/01/2024', 'RP', 27, 'CRE', 78),
(139, '9TOPP6IIQ7A64V3', 'Rewarded to a Review', 'Z44CZGK90C2QFG7', '02/01/2024', 'ARP', 27, 'DEB', 922),
(140, 'D17BT2BFYST6GCQ', 'Registration', 'Gurupuraskar', '02/01/2024', 'ARP', 1000, 'CRE', 1000),
(141, 'GGL7HX84ZUOH9AN', 'Registration', 'Gurupuraskar', '03/01/2024', 'ARP', 1000, 'CRE', 1000),
(142, 'S16OXROV3C54LSC', 'Registration', 'Gurupuraskar', '03/01/2024', 'ARP', 1000, 'CRE', 1000),
(143, 'FCI7M9OQAYJ2SA6', 'Registration', 'Gurupuraskar', '03/01/2024', 'ARP', 1000, 'CRE', 1000),
(144, '', 'Registration', 'Gurupuraskar', '03/01/2024', 'ARP', 1000, 'CRE', 1000),
(145, 'RQ9Q1B68PD1DMZE', 'Registration', 'Gurupuraskar', '03/01/2024', 'ARP', 1000, 'CRE', 1000),
(146, 'GGL7HX84ZUOH9AN', 'User registered with your referral code.', 'EYKKCNJDT29GXLV', '03/01/2024', 'RP', 100, 'CRE', 100),
(147, 'EYKKCNJDT29GXLV', 'You registered with a referral code', 'GGL7HX84ZUOH9AN', '03/01/2024', 'RP', 100, 'CRE', 100),
(148, 'EYKKCNJDT29GXLV', 'Registration', 'Gurupuraskar', '03/01/2024', 'ARP', 1000, 'CRE', 1000),
(149, 'D17BT2BFYST6GCQ', 'Registration', 'Gurupuraskar', '03/01/2024', 'ARP', 1000, 'CRE', 1000),
(150, 'D17BT2BFYST6GCQ', 'Registration', 'Gurupuraskar', '03/01/2024', 'ARP', 1000, 'CRE', 1000),
(151, '', 'Registration', 'Gurupuraskar', '03/01/2024', 'ARP', 1000, 'CRE', 1000),
(152, 'D17BT2BFYST6GCQ', 'Registration', 'Gurupuraskar', '03/01/2024', 'ARP', 1000, 'CRE', 1000),
(153, 'GGL7HX84ZUOH9AN', 'Registration', 'Gurupuraskar', '03/01/2024', 'ARP', 1000, 'CRE', 1000),
(154, 'PBB9XP4GEVPF2ZM', 'Registration', 'Gurupuraskar', '03/01/2024', 'ARP', 1000, 'CRE', 1000),
(155, 'FCI7M9OQAYJ2SA6', 'Registration', 'Gurupuraskar', '03/01/2024', 'ARP', 1000, 'CRE', 1000),
(156, 'ZROXYRSCE89GG12', 'Registration', 'Gurupuraskar', '03/01/2024', 'ARP', 1000, 'CRE', 1000),
(157, 'FCI7M9OQAYJ2SA6', 'Registration', 'Gurupuraskar', '03/01/2024', 'ARP', 1000, 'CRE', 1000),
(158, 'WAQYDFX1AS2S6O9', 'Registration', 'Gurupuraskar', '03/01/2024', 'ARP', 1000, 'CRE', 1000),
(159, 'ZROXYRSCE89GG12', 'Registration', 'Gurupuraskar', '03/01/2024', 'ARP', 1000, 'CRE', 1000),
(160, 'D17BT2BFYST6GCQ', 'User registered with your referral code.', 'LRUOJTP56BZKYCM', '03/01/2024', 'RP', 100, 'CRE', 100),
(161, 'LRUOJTP56BZKYCM', 'You registered with a referral code', 'D17BT2BFYST6GCQ', '03/01/2024', 'RP', 100, 'CRE', 100),
(162, 'LRUOJTP56BZKYCM', 'Registration', 'Gurupuraskar', '03/01/2024', 'ARP', 1000, 'CRE', 1000),
(163, 'WAQYDFX1AS2S6O9', 'Registration', 'Gurupuraskar', '03/01/2024', 'ARP', 1000, 'CRE', 1000),
(164, 'ZROXYRSCE89GG12', 'Registration', 'Gurupuraskar', '03/01/2024', 'ARP', 1000, 'CRE', 1000),
(165, 'JYWA9Q2U35A65Z9', 'Registration', 'Gurupuraskar', '03/01/2024', 'ARP', 1000, 'CRE', 1000),
(166, 'PBB9XP4GEVPF2ZM', 'Registration', 'Gurupuraskar', '03/01/2024', 'ARP', 1000, 'CRE', 1000),
(167, 'PBB9XP4GEVPF2ZM', 'Registration', 'Gurupuraskar', '03/01/2024', 'ARP', 1000, 'CRE', 1000),
(168, 'LRUOJTP56BZKYCM', 'Registration', 'Gurupuraskar', '03/01/2024', 'ARP', 1000, 'CRE', 1000),
(169, 'D17BT2BFYST6GCQ', 'Registration', 'Gurupuraskar', '03/01/2024', 'ARP', 1000, 'CRE', 1000),
(170, '', 'Registration', 'Gurupuraskar', '03/01/2024', 'ARP', 1000, 'CRE', 1000),
(171, 'D17BT2BFYST6GCQ', 'Registration', 'Gurupuraskar', '03/01/2024', 'ARP', 1000, 'CRE', 1000),
(172, 'LIBNVXY5Y73NQLP', 'Registration', 'Gurupuraskar', '03/01/2024', 'ARP', 1000, 'CRE', 1000),
(173, 'D17BT2BFYST6GCQ', 'Registration', 'Gurupuraskar', '04/01/2024', 'ARP', 1000, 'CRE', 1000),
(174, 'D17BT2BFYST6GCQ', 'Registration', 'Gurupuraskar', '04/01/2024', 'ARP', 1000, 'CRE', 1000),
(175, 'JMD4EHMHO9UXFN5', 'Registration', 'Gurupuraskar', '04/01/2024', 'ARP', 1000, 'CRE', 1000),
(176, 'LN3TOS1P3XVGMXD', 'Registration', 'Gurupuraskar', '04/01/2024', 'ARP', 1000, 'CRE', 1000),
(177, 'CDG2PQ4T5IOFOJE', 'Registration', 'Gurupuraskar', '04/01/2024', 'ARP', 1000, 'CRE', 1000),
(178, '', 'Registration', 'Gurupuraskar', '04/01/2024', 'ARP', 1000, 'CRE', 1000),
(179, '', 'Registration', 'Gurupuraskar', '04/01/2024', 'ARP', 1000, 'CRE', 1000),
(180, '7EK1CW9W21DG6FW', 'Registration', 'Gurupuraskar', '04/01/2024', 'ARP', 1000, 'CRE', 1000),
(181, 'NFRSEI5MKLJ293L', 'Registration', 'Gurupuraskar', '04/01/2024', 'ARP', 1000, 'CRE', 1000),
(182, 'GRKSMILWH80LYXN', 'Registration', 'Gurupuraskar', '04/01/2024', 'ARP', 1000, 'CRE', 1000),
(183, '', 'Registration', 'Gurupuraskar', '04/01/2024', 'ARP', 1000, 'CRE', 1000),
(184, '', 'Registration', 'Gurupuraskar', '04/01/2024', 'ARP', 1000, 'CRE', 1000),
(185, '', 'Registration', 'Gurupuraskar', '04/01/2024', 'ARP', 1000, 'CRE', 1000),
(186, '', 'Registration', 'Gurupuraskar', '04/01/2024', 'ARP', 1000, 'CRE', 1000),
(187, 'CDG2PQ4T5IOFOJE', 'Registration', 'Gurupuraskar', '04/01/2024', 'ARP', 1000, 'CRE', 1000),
(188, '7I19X1PX8B3IK97', 'Registration', 'Gurupuraskar', '04/01/2024', 'ARP', 1000, 'CRE', 1000),
(189, '7I19X1PX8B3IK97', 'Registration', 'Gurupuraskar', '04/01/2024', 'ARP', 1000, 'CRE', 1000),
(190, 'CDG2PQ4T5IOFOJE', 'Registration', 'Gurupuraskar', '04/01/2024', 'ARP', 1000, 'CRE', 1000),
(191, 'WBO13CL2NIDA51S', 'Registration', 'Gurupuraskar', '04/01/2024', 'ARP', 1000, 'CRE', 1000),
(192, 'LISNOUAOSPTSI79', 'Registration', 'Gurupuraskar', '04/01/2024', 'ARP', 1000, 'CRE', 1000),
(193, 'E1VW6PY1I0MZMLH', 'Registration', 'Gurupuraskar', '04/01/2024', 'ARP', 1000, 'CRE', 1000),
(194, 'E1VW6PY1I0MZMLH', 'Registration', 'Gurupuraskar', '04/01/2024', 'ARP', 1000, 'CRE', 1000),
(195, 'E1VW6PY1I0MZMLH', 'Registration', 'Gurupuraskar', '04/01/2024', 'ARP', 1000, 'CRE', 1000),
(196, '', 'Registration', 'Gurupuraskar', '04/01/2024', 'ARP', 1000, 'CRE', 1000),
(197, 'UFLVYSLUP4P6E6R', 'Registration', 'Gurupuraskar', '06/01/2024', 'ARP', 1000, 'CRE', 1000),
(198, '', 'Registration', 'Gurupuraskar', '06/01/2024', 'ARP', 1000, 'CRE', 1000),
(199, 'WONYLLCY8KN3596', 'Registration', 'Gurupuraskar', '06/01/2024', 'ARP', 1000, 'CRE', 1000),
(200, 'WOTH43VXCC9RAIB', 'Registration', 'Gurupuraskar', '06/01/2024', 'ARP', 1000, 'CRE', 1000),
(201, 'PBB9XP4GEVPF2ZM', 'User registered with your referral code.', 'P5SEJ70I0C43WMO', '06/01/2024', 'RP', 100, 'CRE', 100),
(202, 'P5SEJ70I0C43WMO', 'You registered with a referral code', 'PBB9XP4GEVPF2ZM', '06/01/2024', 'RP', 100, 'CRE', 100),
(203, 'P5SEJ70I0C43WMO', 'Registration', 'Gurupuraskar', '06/01/2024', 'ARP', 1000, 'CRE', 1000),
(204, '', 'Registration', 'Gurupuraskar', '06/01/2024', 'ARP', 1000, 'CRE', 1000),
(205, '00U0XQNFLFNGD2E', 'Registration', 'Gurupuraskar', '06/01/2024', 'ARP', 1000, 'CRE', 1000),
(206, 'PBB9XP4GEVPF2ZM', 'User registered with your referral code.', 'CY6G6JWQ7E3F79I', '06/01/2024', 'RP', 100, 'CRE', 200),
(207, 'CY6G6JWQ7E3F79I', 'You registered with a referral code', 'PBB9XP4GEVPF2ZM', '06/01/2024', 'RP', 100, 'CRE', 100),
(208, 'CY6G6JWQ7E3F79I', 'Registration', 'Gurupuraskar', '06/01/2024', 'ARP', 1000, 'CRE', 1000),
(209, 'WOFUBRFTP0B0X4Y', 'Registration', 'Gurupuraskar', '06/01/2024', 'ARP', 1000, 'CRE', 1000),
(210, '', 'Registration', 'Gurupuraskar', '06/01/2024', 'ARP', 1000, 'CRE', 1000),
(211, '', 'Registration', 'Gurupuraskar', '06/01/2024', 'ARP', 1000, 'CRE', 1000),
(212, 'PNXJNW9LT5CCQAG', 'Registration', 'Gurupuraskar', '06/01/2024', 'ARP', 1000, 'CRE', 1000),
(213, '', 'Registration', 'Gurupuraskar', '08/01/2024', 'ARP', 1000, 'CRE', 1000),
(214, '', 'Registration', 'Gurupuraskar', '08/01/2024', 'ARP', 1000, 'CRE', 1000),
(215, '', 'Registration', 'Gurupuraskar', '08/01/2024', 'ARP', 1000, 'CRE', 1000),
(216, '', 'Registration', 'Gurupuraskar', '08/01/2024', 'ARP', 1000, 'CRE', 1000),
(217, '', 'Registration', 'Gurupuraskar', '08/01/2024', 'ARP', 1000, 'CRE', 1000),
(218, 'H6CX11X9NWW3IFU', 'Registration', 'Gurupuraskar', '08/01/2024', 'ARP', 1000, 'CRE', 1000),
(219, 'PJQKT9Z5EYQFBL9', 'Registration', 'Gurupuraskar', '08/01/2024', 'ARP', 1000, 'CRE', 1000),
(220, 'A449JG4620BSRJ7', 'Registration', 'Gurupuraskar', '09/01/2024', 'ARP', 1000, 'CRE', 1000),
(221, 'GT0VUO3ZC72HS8Q', 'Registration', 'Gurupuraskar', '09/01/2024', 'ARP', 1000, 'CRE', 1000),
(222, '', 'Registration', 'Gurupuraskar', '09/01/2024', 'ARP', 1000, 'CRE', 1000),
(223, 'JD7IH1T8611KFXH', 'Registration', 'Gurupuraskar', '09/01/2024', 'ARP', 1000, 'CRE', 1000),
(224, 'GT0VUO3ZC72HS8Q', 'User registered with your referral code.', 'JSNTTEFNPDCWI4X', '09/01/2024', 'RP', 100, 'CRE', 100),
(225, 'JSNTTEFNPDCWI4X', 'You registered with a referral code', 'GT0VUO3ZC72HS8Q', '09/01/2024', 'RP', 100, 'CRE', 100),
(226, 'JSNTTEFNPDCWI4X', 'Registration', 'Gurupuraskar', '09/01/2024', 'ARP', 1000, 'CRE', 1000),
(227, 'G5ZV0Z4OCNGFMMC', 'Registration', 'Gurupuraskar', '10/01/2024', 'ARP', 1000, 'CRE', 1000),
(228, 'X2D2909Y2JK8XT5', 'Registration', 'Gurupuraskar', '11/01/2024', 'ARP', 1000, 'CRE', 1000),
(229, 'J7V88FP49OUMBVG', 'Registration', 'Gurupuraskar', '11/01/2024', 'ARP', 1000, 'CRE', 1000),
(230, 'X2D2909Y2JK8XT5', 'User registered with your referral code.', 'SLFB0AH7XYD3EJE', '11/01/2024', 'RP', 100, 'CRE', 100),
(231, 'SLFB0AH7XYD3EJE', 'You registered with a referral code', 'X2D2909Y2JK8XT5', '11/01/2024', 'RP', 100, 'CRE', 100),
(232, 'SLFB0AH7XYD3EJE', 'Registration', 'Gurupuraskar', '11/01/2024', 'ARP', 1000, 'CRE', 1000),
(233, '6RJ3EFPDNB4RCP1', 'Registration', 'Gurupuraskar', '11/01/2024', 'ARP', 1000, 'CRE', 1000),
(234, 'X2D2909Y2JK8XT5', 'User registered with your referral code.', 'ZSQN73XRX4MDZ28', '11/01/2024', 'RP', 100, 'CRE', 200),
(235, 'ZSQN73XRX4MDZ28', 'You registered with a referral code', 'X2D2909Y2JK8XT5', '11/01/2024', 'RP', 100, 'CRE', 100),
(236, 'ZSQN73XRX4MDZ28', 'Registration', 'Gurupuraskar', '11/01/2024', 'ARP', 1000, 'CRE', 1000),
(237, 'G5ZV0Z4OCNGFMMC', 'User registered with your referral code.', 'Z937FW9IP9RMN71', '15/01/2024', 'RP', 100, 'CRE', 100),
(238, 'Z937FW9IP9RMN71', 'You registered with a referral code', 'G5ZV0Z4OCNGFMMC', '15/01/2024', 'RP', 100, 'CRE', 100),
(239, 'Z937FW9IP9RMN71', 'Registration', 'Gurupuraskar', '15/01/2024', 'ARP', 1000, 'CRE', 1000),
(240, 'G5ZV0Z4OCNGFMMC', 'Rewarded from Review', 'A449JG4620BSRJ7', '23/01/2024', 'RP', 50, 'CRE', 150),
(241, 'A449JG4620BSRJ7', 'Rewarded to a Review', 'G5ZV0Z4OCNGFMMC', '23/01/2024', 'ARP', 50, 'DEB', 950),
(242, 'G5ZV0Z4OCNGFMMC', 'Rewarded from Review', 'A449JG4620BSRJ7', '23/01/2024', 'RP', 50, 'CRE', 200),
(243, 'A449JG4620BSRJ7', 'Rewarded to a Review', 'G5ZV0Z4OCNGFMMC', '23/01/2024', 'ARP', 50, 'DEB', 900),
(244, 'G5ZV0Z4OCNGFMMC', 'Rewarded from Review', 'A449JG4620BSRJ7', '23/01/2024', 'RP', 20, 'CRE', 220),
(245, 'A449JG4620BSRJ7', 'Rewarded to a Review', 'G5ZV0Z4OCNGFMMC', '23/01/2024', 'ARP', 20, 'DEB', 880),
(246, 'G5ZV0Z4OCNGFMMC', 'Rewarded from Review', 'A449JG4620BSRJ7', '23/01/2024', 'RP', 30, 'CRE', 250),
(247, 'A449JG4620BSRJ7', 'Rewarded to a Review', 'G5ZV0Z4OCNGFMMC', '23/01/2024', 'ARP', 30, 'DEB', 850),
(248, 'G5ZV0Z4OCNGFMMC', 'Rewarded from Review', 'A449JG4620BSRJ7', '23/01/2024', 'RP', 100, 'CRE', 350),
(249, 'A449JG4620BSRJ7', 'Rewarded to a Review', 'G5ZV0Z4OCNGFMMC', '23/01/2024', 'ARP', 100, 'DEB', 750),
(250, 'G5ZV0Z4OCNGFMMC', 'Rewarded from Review', 'A449JG4620BSRJ7', '23/01/2024', 'RP', 70, 'CRE', 420),
(251, 'A449JG4620BSRJ7', 'Rewarded to a Review', 'G5ZV0Z4OCNGFMMC', '23/01/2024', 'ARP', 70, 'DEB', 680),
(252, 'A449JG4620BSRJ7', 'Registration', 'Gurupuraskar', '23/01/2024', 'ARP', 1000, 'CRE', 1000),
(253, 'Z7TEN2E2PUUYGLO', 'Registration', 'Gurupuraskar', '24/01/2024', 'ARP', 1000, 'CRE', 1000),
(254, 'G5ZV0Z4OCNGFMMC', 'Registration', 'Gurupuraskar', '24/01/2024', 'ARP', 1000, 'CRE', 1000),
(255, 'Z7TEN2E2PUUYGLO', 'Rewarded from Review', 'G5ZV0Z4OCNGFMMC', '24/01/2024', 'RP', 99, 'CRE', 99),
(256, 'G5ZV0Z4OCNGFMMC', 'Rewarded to a Review', 'Z7TEN2E2PUUYGLO', '24/01/2024', 'ARP', 99, 'DEB', 901),
(257, 'Z7TEN2E2PUUYGLO', 'Rewarded from Review', 'G5ZV0Z4OCNGFMMC', '24/01/2024', 'RP', 90, 'CRE', 189),
(258, 'G5ZV0Z4OCNGFMMC', 'Rewarded to a Review', 'Z7TEN2E2PUUYGLO', '24/01/2024', 'ARP', 90, 'DEB', 811),
(259, 'X2D2909Y2JK8XT5', 'User registered with your referral code.', 'ZSQN73XRX4MDZ28', '24/01/2024', 'RP', 100, 'CRE', 100),
(260, 'ZSQN73XRX4MDZ28', 'You registered with a referral code', 'X2D2909Y2JK8XT5', '24/01/2024', 'RP', 100, 'CRE', 100),
(261, 'ZSQN73XRX4MDZ28', 'Registration', 'Gurupuraskar', '24/01/2024', 'ARP', 1000, 'CRE', 1000),
(262, 'Z7TEN2E2PUUYGLO', 'Rewarded from Review', 'ZSQN73XRX4MDZ28', '24/01/2024', 'RP', 1, 'CRE', 190),
(263, 'ZSQN73XRX4MDZ28', 'Rewarded to a Review', 'Z7TEN2E2PUUYGLO', '24/01/2024', 'ARP', 1, 'DEB', 999),
(264, '2NZA1G3LMIRZQ7L', 'Registration', 'Gurupuraskar', '25/01/2024', 'ARP', 1000, 'CRE', 1000),
(265, 'Z7TEN2E2PUUYGLO', 'Rewarded from Review', '2NZA1G3LMIRZQ7L', '25/01/2024', 'RP', 12, 'CRE', 202),
(266, '2NZA1G3LMIRZQ7L', 'Rewarded to a Review', 'Z7TEN2E2PUUYGLO', '25/01/2024', 'ARP', 12, 'DEB', 988),
(267, 'Z7TEN2E2PUUYGLO', 'Rewarded from Review', '2NZA1G3LMIRZQ7L', '25/01/2024', 'RP', 12, 'CRE', 214),
(268, '2NZA1G3LMIRZQ7L', 'Rewarded to a Review', 'Z7TEN2E2PUUYGLO', '25/01/2024', 'ARP', 12, 'DEB', 976),
(269, 'Z7TEN2E2PUUYGLO', 'Rewarded from Review', '2NZA1G3LMIRZQ7L', '27/01/2024', 'RP', 12, 'CRE', 226),
(270, '2NZA1G3LMIRZQ7L', 'Rewarded to a Review', 'Z7TEN2E2PUUYGLO', '27/01/2024', 'ARP', 12, 'DEB', 964),
(271, 'J298JMOAC65O8IA', 'Registration', 'Gurupuraskar', '27/01/2024', 'ARP', 1000, 'CRE', 1000),
(272, 'J298JMOAC65O8IA', 'Registration', 'Gurupuraskar', '27/01/2024', 'ARP', 1000, 'CRE', 1000),
(273, 'J298JMOAC65O8IA', 'Registration', 'Gurupuraskar', '27/01/2024', 'ARP', 1000, 'CRE', 1000),
(274, 'VMLFODVFO0XJ5FF', 'Registration', 'Gurupuraskar', '27/01/2024', 'ARP', 1000, 'CRE', 1000),
(275, 'Z7TEN2E2PUUYGLO', 'Rewarded from Review', 'VMLFODVFO0XJ5FF', '27/01/2024', 'RP', 12, 'CRE', 238),
(276, 'VMLFODVFO0XJ5FF', 'Rewarded to a Review', 'Z7TEN2E2PUUYGLO', '27/01/2024', 'ARP', 12, 'DEB', 988),
(277, '12MO7V0HPVBGUXC', 'Registration', 'Gurupuraskar', '27/01/2024', 'ARP', 1000, 'CRE', 1000),
(278, '12MO7V0HPVBGUXC', 'User registered with your referral code.', 'R2FB6OJSRDPL5ZQ', '27/01/2024', 'RP', 100, 'CRE', 100),
(279, 'R2FB6OJSRDPL5ZQ', 'You registered with a referral code', '12MO7V0HPVBGUXC', '27/01/2024', 'RP', 100, 'CRE', 100),
(280, 'R2FB6OJSRDPL5ZQ', 'Registration', 'Gurupuraskar', '27/01/2024', 'ARP', 1000, 'CRE', 1000),
(281, 'Z7TEN2E2PUUYGLO', 'User registered with your referral code.', 'EF39GHTHKQVHQH3', '30/01/2024', 'RP', 100, 'CRE', 338),
(282, 'EF39GHTHKQVHQH3', 'You registered with a referral code', 'Z7TEN2E2PUUYGLO', '30/01/2024', 'RP', 100, 'CRE', 100),
(283, 'EF39GHTHKQVHQH3', 'Registration', 'Gurupuraskar', '30/01/2024', 'ARP', 1000, 'CRE', 1000),
(284, '9PI29HP9V9TIE24', 'Registration', 'Gurupuraskar', '30/01/2024', 'ARP', 1000, 'CRE', 1000),
(285, 'KLEN8E7OJ4VD62T', 'Registration', 'Gurupuraskar', '30/01/2024', 'ARP', 1000, 'CRE', 1000),
(286, 'Z937FW9IP9RMN71', 'Registration', 'Gurupuraskar', '31/01/2024', 'ARP', 1000, 'CRE', 1000),
(287, '12MO7V0HPVBGUXC', 'User registered with your referral code.', 'W6MLNJU788JYXW4', '31/01/2024', 'RP', 100, 'CRE', 200),
(288, 'W6MLNJU788JYXW4', 'You registered with a referral code', '12MO7V0HPVBGUXC', '31/01/2024', 'RP', 100, 'CRE', 100),
(289, 'W6MLNJU788JYXW4', 'Registration', 'Gurupuraskar', '31/01/2024', 'ARP', 1000, 'CRE', 1000),
(290, '12MO7V0HPVBGUXC', 'Rewarded from Review', 'KLEN8E7OJ4VD62T', '31/01/2024', 'RP', 12, 'CRE', 212),
(291, 'KLEN8E7OJ4VD62T', 'Rewarded to a Review', '12MO7V0HPVBGUXC', '31/01/2024', 'ARP', 12, 'DEB', 988);

-- --------------------------------------------------------

--
-- Table structure for table `app_config`
--

CREATE TABLE `app_config` (
  `id` int(11) NOT NULL,
  `app_locked` tinyint(1) NOT NULL DEFAULT 0,
  `app_reset` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `app_config`
--

INSERT INTO `app_config` (`id`, `app_locked`, `app_reset`) VALUES
(1, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `assessment_form_questions`
--

CREATE TABLE `assessment_form_questions` (
  `id` int(11) NOT NULL,
  `question_code` varchar(128) NOT NULL,
  `question_title` text NOT NULL,
  `question_type` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `assessment_form_questions`
--

INSERT INTO `assessment_form_questions` (`id`, `question_code`, `question_title`, `question_type`) VALUES
(39, 'uZ6RC9K2P0KddmD', 'My Experience as Teacher (years): ', 'number'),
(40, 'Mh6CSc4dxSQv8rA', 'Subjects I Teach: ', 'text'),
(41, 'ttPonLOQ5olFxLT', 'Total number of students in my Institution:', 'number'),
(42, 'FmUBSmr76m2xz5X', 'Total number of Teachers in my Institution:', 'number'),
(43, 'zz6xz1GREGGytdm', 'Number of students I taught in the previous academic year:', 'number'),
(44, 'xspFq7VSEjjmtDl', 'My Reason/s for becoming a Teacher: ', 'text'),
(45, 'EWX5tt1u0AP2Vj5', 'My Role-model? And Why?', 'text'),
(46, '63qblG4WkRkhS6O', 'My Goal/s in Life: ', 'text'),
(48, 'ggDtBqTc25YbkQc', 'My favourite Teacher (Name and why your favourite):', 'text'),
(49, 'bjcZ8ldnszpPQAm', 'My favourite book/s and their author/s: ', 'text'),
(52, 'JwzT0wZdeFXrwy3', 'I think every Teacher should possess these qualities: ', 'text'),
(53, 'VTR24rPTiZkrRqi', 'My Strengths: ', 'text'),
(54, 'v0BJ50rG3j57Nn2', 'My Weaknesses: ', 'text'),
(55, 'wdfzFVeWpzodVFt', 'My Opportunities: ', 'text'),
(56, 'QdH2D0XPiGayDmP', 'My Challenges: ', 'text'),
(57, 'pBjt8KPKDpBWmBw', 'My suggestions for other Teachers to be more effective: ', 'text'),
(58, 'ECriZTT35USxn5R', 'Innovations I have adopted in Class: ', 'text'),
(59, 'XSKX7edBFtmfIgE', 'Innovations I have adopted in my Institution: ', 'text'),
(66, '7HLXcwapKSNuKXj', 'Creative solutions I have adopted in teaching-learning processes: ', 'text'),
(70, '4bxj19wWvsfbois', 'My experience as a Teacher during Covid and Lock-down', 'text'),
(74, 'fcwC3Id7tlNUh6X', 'My continuous learning and updation is through: ', 'text'),
(75, 'TUY1MsskHQ9aBkD', 'My views on the New Education Policy: ', 'text'),
(76, 'CEH9W49HvFimIrv', 'My Hobbies: ', 'text'),
(77, '681RmOkeSaSIoY1', 'My Achievements: ', 'text'),
(78, 'UvqW8DQrbxgYxIX', 'My definition of LIFE in one sentence:', 'text'),
(79, 'x3Iz5WyK5FOaskf', 'My definition of HAPPINESS in one sentence:', 'text'),
(80, '5I3wG8FlpvbVoi8', 'My definition of SUCCESS in one sentence:', 'text'),
(81, 'RZ2GqUmHwZpK8RQ', 'My favourite QUOTE:', 'text'),
(83, 'Ad9T9xdRz1FJaV5', 'My definition of WELLNESS (Svastya) in one sentence:', 'text'),
(84, 'iIvmn9MtsK9TRx0', 'My opinion on SERVICE (Seva):', 'text'),
(85, 'rHBxVcGo7zZHntY', 'Activities I undertake to keep myself fit and health – physically & mentally: ', 'text'),
(86, 'gtQrLrLMLslmeCz', 'Social Activities I am involved: ', 'text'),
(87, 'qzXfqYxbCbnlOzH', 'Qualities/Skills every student should imbibe in today’s world: ', 'text'),
(88, 'CgPDpbS86e8b4KS', 'Challenges today’s students face: ', 'text'),
(89, 'amynAcLaCDoYu8y', 'Your advice to students: ', 'text'),
(92, 'GTLiprH4gz1Dji6', 'My suggestion/s for Teachers to improve: ', 'text'),
(93, 'iQIdD6NIC2pNGfB', 'My suggestion/s to NGOs/Management: ', 'text'),
(94, '6aIwHHypiXIvFyM', 'My suggestion/s to Parents and community: ', 'text'),
(95, 'L5HKsynI39ynck0', 'My suggestion/s to Government: ', 'text'),
(98, 'QfljNkiZr6RFXoz', 'My opinion on Value Education:', 'text'),
(99, 'TwG3tvLhHt6CCMV', 'My opinion on Scientific Temper:', 'text'),
(100, 'v6ISA5gKJXYEdvy', 'My opinion on Personality Development:', 'text'),
(101, 'dFK8h7HrgwYxwGS', 'My opinion on Media and Social media:', 'text'),
(102, '1rxHBJdRe88FpR9', 'If given an opportunity, I would like to evaluate: ', 'mcq'),
(107, 'kFt5AKiw1a5AWfh', 'If given an opportunity, I would like to be evaluated by Teachers:', 'mcq'),
(112, 'f6qbvaEcN8HfqBR', 'What additional Resources (goods or services) do your students require to make teaching-learning effective: ', 'text'),
(113, '1o2D6R7bK7XuACX', 'What are the Surplus Resources (good or services) that your Students generate that they could give/donate to the needy/less-fortunate: ', 'text'),
(123, 'v54YBQySC3vXEve', 'If selected, I agree to participate in the Videsha Yatra or Swadesha Yatra', 'mcq');

-- --------------------------------------------------------

--
-- Table structure for table `assessment_form_responses`
--

CREATE TABLE `assessment_form_responses` (
  `id` int(11) NOT NULL,
  `user_code` varchar(128) NOT NULL,
  `question_code` varchar(128) NOT NULL,
  `user_response` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `assessment_form_responses`
--

INSERT INTO `assessment_form_responses` (`id`, `user_code`, `question_code`, `user_response`) VALUES
(1, 'A449JG4620BSRJ7', 'uZ6RC9K2P0KddmD', '87'),
(2, 'A449JG4620BSRJ7', 'Mh6CSc4dxSQv8rA', 'tghd'),
(3, 'A449JG4620BSRJ7', 'ttPonLOQ5olFxLT', ''),
(4, 'A449JG4620BSRJ7', 'FmUBSmr76m2xz5X', ''),
(5, 'A449JG4620BSRJ7', 'zz6xz1GREGGytdm', ''),
(6, 'A449JG4620BSRJ7', 'xspFq7VSEjjmtDl', ''),
(7, 'A449JG4620BSRJ7', 'EWX5tt1u0AP2Vj5', ''),
(8, 'A449JG4620BSRJ7', '63qblG4WkRkhS6O', ''),
(9, 'A449JG4620BSRJ7', 'whVcRluiQnlM2xT', ''),
(10, 'A449JG4620BSRJ7', 'ggDtBqTc25YbkQc', ''),
(11, 'A449JG4620BSRJ7', 'bjcZ8ldnszpPQAm', ''),
(12, 'A449JG4620BSRJ7', '6OkFFPUS7MuGlZr', ''),
(13, 'A449JG4620BSRJ7', 'afQJHCHSjM0HvlH', ''),
(14, 'A449JG4620BSRJ7', 'JwzT0wZdeFXrwy3', ''),
(15, 'A449JG4620BSRJ7', 'VTR24rPTiZkrRqi', ''),
(16, 'A449JG4620BSRJ7', 'v0BJ50rG3j57Nn2', ''),
(17, 'A449JG4620BSRJ7', 'wdfzFVeWpzodVFt', ''),
(18, 'A449JG4620BSRJ7', 'QdH2D0XPiGayDmP', ''),
(19, 'A449JG4620BSRJ7', 'pBjt8KPKDpBWmBw', ''),
(20, 'A449JG4620BSRJ7', 'ECriZTT35USxn5R', ''),
(21, 'A449JG4620BSRJ7', 'XSKX7edBFtmfIgE', ''),
(22, 'A449JG4620BSRJ7', 'JeQlinCIw6mrOdX', ''),
(23, 'A449JG4620BSRJ7', 'RiNoRSrkxMoLATu', ''),
(24, 'A449JG4620BSRJ7', 'waBexm1Q0yk94u6', ''),
(25, 'A449JG4620BSRJ7', 'lvwbHPDPw8pwbx7', ''),
(26, 'A449JG4620BSRJ7', 'MIaqW67Q90KUrVo', ''),
(27, 'A449JG4620BSRJ7', 'zmfw5HOO5PlbV3O', ''),
(28, 'A449JG4620BSRJ7', '7HLXcwapKSNuKXj', ''),
(29, 'A449JG4620BSRJ7', 'glNhKxLWS9Io53j', ''),
(30, 'A449JG4620BSRJ7', 'cIWZQFGndcpmfTG', ''),
(31, 'A449JG4620BSRJ7', 'G0yI7EJgXwn1oRm', ''),
(32, 'A449JG4620BSRJ7', '4bxj19wWvsfbois', ''),
(33, 'A449JG4620BSRJ7', 'IFCA9yH4FV6GUdF', ''),
(34, 'A449JG4620BSRJ7', 'UiH8qi0ELf3oX4F', ''),
(35, 'A449JG4620BSRJ7', 'lUPGM8FhIa5bGWK', ''),
(36, 'A449JG4620BSRJ7', 'fcwC3Id7tlNUh6X', ''),
(37, 'A449JG4620BSRJ7', 'TUY1MsskHQ9aBkD', ''),
(38, 'A449JG4620BSRJ7', 'CEH9W49HvFimIrv', ''),
(39, 'A449JG4620BSRJ7', '681RmOkeSaSIoY1', ''),
(40, 'A449JG4620BSRJ7', 'UvqW8DQrbxgYxIX', ''),
(41, 'A449JG4620BSRJ7', 'x3Iz5WyK5FOaskf', ''),
(42, 'A449JG4620BSRJ7', '5I3wG8FlpvbVoi8', ''),
(43, 'A449JG4620BSRJ7', 'RZ2GqUmHwZpK8RQ', ''),
(44, 'A449JG4620BSRJ7', 't5fQ7jlIBf2E8mB', ''),
(45, 'A449JG4620BSRJ7', 'Ad9T9xdRz1FJaV5', ''),
(46, 'A449JG4620BSRJ7', 'iIvmn9MtsK9TRx0', ''),
(47, 'A449JG4620BSRJ7', 'rHBxVcGo7zZHntY', ''),
(48, 'A449JG4620BSRJ7', 'gtQrLrLMLslmeCz', ''),
(49, 'A449JG4620BSRJ7', 'qzXfqYxbCbnlOzH', ''),
(50, 'A449JG4620BSRJ7', 'CgPDpbS86e8b4KS', ''),
(51, 'A449JG4620BSRJ7', 'amynAcLaCDoYu8y', ''),
(52, 'A449JG4620BSRJ7', 'bOUuXHOZirWWoU7', ''),
(53, 'A449JG4620BSRJ7', '1tWbi2uTnEIslw3', ''),
(54, 'A449JG4620BSRJ7', 'GTLiprH4gz1Dji6', ''),
(55, 'A449JG4620BSRJ7', 'iQIdD6NIC2pNGfB', ''),
(56, 'A449JG4620BSRJ7', '6aIwHHypiXIvFyM', ''),
(57, 'A449JG4620BSRJ7', 'L5HKsynI39ynck0', ''),
(58, 'A449JG4620BSRJ7', 'kpkFgxI3cz4vWAl', ''),
(59, 'A449JG4620BSRJ7', 'DWW9rPB91HsO06w', ''),
(60, 'A449JG4620BSRJ7', 'QfljNkiZr6RFXoz', ''),
(61, 'A449JG4620BSRJ7', 'TwG3tvLhHt6CCMV', ''),
(62, 'A449JG4620BSRJ7', 'v6ISA5gKJXYEdvy', ''),
(63, 'A449JG4620BSRJ7', 'dFK8h7HrgwYxwGS', ''),
(64, 'A449JG4620BSRJ7', '1rxHBJdRe88FpR9', ''),
(65, 'A449JG4620BSRJ7', 'kFt5AKiw1a5AWfh', ''),
(66, 'A449JG4620BSRJ7', 'f6qbvaEcN8HfqBR', ''),
(67, 'A449JG4620BSRJ7', '1o2D6R7bK7XuACX', ''),
(68, 'A449JG4620BSRJ7', 'faoOT9OjGQKWm62', ''),
(69, 'A449JG4620BSRJ7', 'QBJSbDdzqAP8lqR', ''),
(70, 'A449JG4620BSRJ7', 'OCUO6bcora9fb7C', ''),
(71, 'A449JG4620BSRJ7', 'lJ6xG8O1PI3PgZL', ''),
(72, 'A449JG4620BSRJ7', 'G7inWZsNR3ygHr4', ''),
(73, 'A449JG4620BSRJ7', 'valnPcyRRc5mgCt', ''),
(74, 'A449JG4620BSRJ7', 'xXiL3XPQFdM0hQB', ''),
(75, 'A449JG4620BSRJ7', 'TdvrPQECmt0M8kL', ''),
(76, 'Z7TEN2E2PUUYGLO', 'uZ6RC9K2P0KddmD', '12'),
(77, 'Z7TEN2E2PUUYGLO', 'Mh6CSc4dxSQv8rA', 'Soft'),
(78, 'Z7TEN2E2PUUYGLO', 'ttPonLOQ5olFxLT', '100'),
(79, 'Z7TEN2E2PUUYGLO', 'FmUBSmr76m2xz5X', '10'),
(80, 'Z7TEN2E2PUUYGLO', 'zz6xz1GREGGytdm', '50'),
(81, 'Z7TEN2E2PUUYGLO', 'xspFq7VSEjjmtDl', 'Love to teach and add value'),
(82, 'Z7TEN2E2PUUYGLO', 'EWX5tt1u0AP2Vj5', 'Dr.Kalam'),
(83, 'Z7TEN2E2PUUYGLO', '63qblG4WkRkhS6O', 'Keep training'),
(84, 'Z7TEN2E2PUUYGLO', 'whVcRluiQnlM2xT', 'To deeply impact everyone to learn and grow joyfully'),
(85, 'Z7TEN2E2PUUYGLO', 'ggDtBqTc25YbkQc', 'Hemalatha'),
(86, 'Z7TEN2E2PUUYGLO', 'bjcZ8ldnszpPQAm', 'Mahabrahmana'),
(87, 'Z7TEN2E2PUUYGLO', '6OkFFPUS7MuGlZr', 'Magabrahmana'),
(88, 'Z7TEN2E2PUUYGLO', 'afQJHCHSjM0HvlH', 'Anish'),
(89, 'Z7TEN2E2PUUYGLO', 'JwzT0wZdeFXrwy3', 'Compassion as a value'),
(90, 'Z7TEN2E2PUUYGLO', 'VTR24rPTiZkrRqi', 'Talking'),
(91, 'Z7TEN2E2PUUYGLO', 'v0BJ50rG3j57Nn2', 'Talking'),
(92, 'Z7TEN2E2PUUYGLO', 'wdfzFVeWpzodVFt', 'plenty'),
(93, 'Z7TEN2E2PUUYGLO', 'QdH2D0XPiGayDmP', 'Business Development'),
(94, 'Z7TEN2E2PUUYGLO', 'pBjt8KPKDpBWmBw', 'None'),
(95, 'Z7TEN2E2PUUYGLO', 'ECriZTT35USxn5R', 'experiential'),
(96, 'Z7TEN2E2PUUYGLO', 'XSKX7edBFtmfIgE', 'Experiential and fun'),
(97, 'Z7TEN2E2PUUYGLO', 'JeQlinCIw6mrOdX', '15'),
(98, 'Z7TEN2E2PUUYGLO', 'RiNoRSrkxMoLATu', '9'),
(99, 'Z7TEN2E2PUUYGLO', 'waBexm1Q0yk94u6', 'plenty'),
(100, 'Z7TEN2E2PUUYGLO', 'lvwbHPDPw8pwbx7', 'plenty'),
(101, 'Z7TEN2E2PUUYGLO', 'MIaqW67Q90KUrVo', 'few'),
(102, 'Z7TEN2E2PUUYGLO', 'zmfw5HOO5PlbV3O', 'Counselling'),
(103, 'Z7TEN2E2PUUYGLO', '7HLXcwapKSNuKXj', 'kh'),
(104, 'Z7TEN2E2PUUYGLO', 'glNhKxLWS9Io53j', 'ljh'),
(105, 'Z7TEN2E2PUUYGLO', 'cIWZQFGndcpmfTG', 'ljnlj'),
(106, 'Z7TEN2E2PUUYGLO', 'G0yI7EJgXwn1oRm', 'jaj'),
(107, 'Z7TEN2E2PUUYGLO', '4bxj19wWvsfbois', 'ljnlk'),
(108, 'Z7TEN2E2PUUYGLO', 'IFCA9yH4FV6GUdF', 'ljnkm'),
(109, 'Z7TEN2E2PUUYGLO', 'UiH8qi0ELf3oX4F', 'lnlk'),
(110, 'Z7TEN2E2PUUYGLO', 'lUPGM8FhIa5bGWK', 'jf'),
(111, 'Z7TEN2E2PUUYGLO', 'fcwC3Id7tlNUh6X', 'talking'),
(112, 'Z7TEN2E2PUUYGLO', 'TUY1MsskHQ9aBkD', 'nice'),
(113, 'Z7TEN2E2PUUYGLO', 'CEH9W49HvFimIrv', 'abcd'),
(114, 'Z7TEN2E2PUUYGLO', '681RmOkeSaSIoY1', 'deft'),
(115, 'Z7TEN2E2PUUYGLO', 'UvqW8DQrbxgYxIX', 'interesting'),
(116, 'Z7TEN2E2PUUYGLO', 'x3Iz5WyK5FOaskf', 'is a choice'),
(117, 'Z7TEN2E2PUUYGLO', '5I3wG8FlpvbVoi8', 'efforts'),
(118, 'Z7TEN2E2PUUYGLO', 'RZ2GqUmHwZpK8RQ', 'Inspire yourself first before you inspire others'),
(119, 'Z7TEN2E2PUUYGLO', 't5fQ7jlIBf2E8mB', 'none'),
(120, 'Z7TEN2E2PUUYGLO', 'Ad9T9xdRz1FJaV5', 'Fit'),
(121, 'Z7TEN2E2PUUYGLO', 'iIvmn9MtsK9TRx0', 'Just do it'),
(122, 'Z7TEN2E2PUUYGLO', 'rHBxVcGo7zZHntY', 'Exercise'),
(123, 'Z7TEN2E2PUUYGLO', 'gtQrLrLMLslmeCz', 'Counselling and teaching'),
(124, 'Z7TEN2E2PUUYGLO', 'qzXfqYxbCbnlOzH', 'Networking'),
(125, 'Z7TEN2E2PUUYGLO', 'CgPDpbS86e8b4KS', 'overload of info'),
(126, 'Z7TEN2E2PUUYGLO', 'amynAcLaCDoYu8y', 'None'),
(127, 'Z7TEN2E2PUUYGLO', 'bOUuXHOZirWWoU7', 'good'),
(128, 'Z7TEN2E2PUUYGLO', '1tWbi2uTnEIslw3', 'None'),
(129, 'Z7TEN2E2PUUYGLO', 'GTLiprH4gz1Dji6', 'None'),
(130, 'Z7TEN2E2PUUYGLO', 'iQIdD6NIC2pNGfB', 'None'),
(131, 'Z7TEN2E2PUUYGLO', '6aIwHHypiXIvFyM', 'none'),
(132, 'Z7TEN2E2PUUYGLO', 'L5HKsynI39ynck0', 'no'),
(133, 'Z7TEN2E2PUUYGLO', 'kpkFgxI3cz4vWAl', 'no'),
(134, 'Z7TEN2E2PUUYGLO', 'DWW9rPB91HsO06w', 'no'),
(135, 'Z7TEN2E2PUUYGLO', 'QfljNkiZr6RFXoz', 'no'),
(136, 'Z7TEN2E2PUUYGLO', 'TwG3tvLhHt6CCMV', 'no'),
(137, 'Z7TEN2E2PUUYGLO', 'v6ISA5gKJXYEdvy', 'yes'),
(138, 'Z7TEN2E2PUUYGLO', 'dFK8h7HrgwYxwGS', 'no'),
(139, 'Z7TEN2E2PUUYGLO', '1rxHBJdRe88FpR9', 'Teachers'),
(140, 'Z7TEN2E2PUUYGLO', 'kFt5AKiw1a5AWfh', 'Teachers'),
(141, 'Z7TEN2E2PUUYGLO', 'f6qbvaEcN8HfqBR', 'no'),
(142, 'Z7TEN2E2PUUYGLO', '1o2D6R7bK7XuACX', 'many'),
(143, 'Z7TEN2E2PUUYGLO', 'faoOT9OjGQKWm62', 'many'),
(144, 'Z7TEN2E2PUUYGLO', 'QBJSbDdzqAP8lqR', 'many'),
(145, 'Z7TEN2E2PUUYGLO', 'OCUO6bcora9fb7C', 'YES'),
(146, 'Z7TEN2E2PUUYGLO', 'lJ6xG8O1PI3PgZL', 'YES'),
(147, 'Z7TEN2E2PUUYGLO', 'G7inWZsNR3ygHr4', 'YES'),
(148, 'Z7TEN2E2PUUYGLO', 'valnPcyRRc5mgCt', 'YES'),
(149, 'Z7TEN2E2PUUYGLO', 'xXiL3XPQFdM0hQB', 'YES'),
(150, 'Z7TEN2E2PUUYGLO', 'TdvrPQECmt0M8kL', 'YES'),
(151, 'G5ZV0Z4OCNGFMMC', 'uZ6RC9K2P0KddmD', '7'),
(152, 'G5ZV0Z4OCNGFMMC', 'Mh6CSc4dxSQv8rA', 'Indic'),
(153, 'G5ZV0Z4OCNGFMMC', 'ttPonLOQ5olFxLT', '67'),
(154, 'G5ZV0Z4OCNGFMMC', 'FmUBSmr76m2xz5X', '78'),
(155, 'G5ZV0Z4OCNGFMMC', 'zz6xz1GREGGytdm', '89'),
(156, 'G5ZV0Z4OCNGFMMC', 'xspFq7VSEjjmtDl', 'inspiration'),
(157, 'G5ZV0Z4OCNGFMMC', 'EWX5tt1u0AP2Vj5', 'Vijay'),
(158, 'G5ZV0Z4OCNGFMMC', '63qblG4WkRkhS6O', 'Sahyog'),
(159, 'G5ZV0Z4OCNGFMMC', 'whVcRluiQnlM2xT', 'be pleasant'),
(160, 'G5ZV0Z4OCNGFMMC', 'ggDtBqTc25YbkQc', 'Venugopal'),
(161, 'G5ZV0Z4OCNGFMMC', 'bjcZ8ldnszpPQAm', 'Your'),
(162, 'G5ZV0Z4OCNGFMMC', '6OkFFPUS7MuGlZr', 'Atlas of the Heart'),
(163, 'G5ZV0Z4OCNGFMMC', 'afQJHCHSjM0HvlH', 'Chakravarthy'),
(164, 'G5ZV0Z4OCNGFMMC', 'JwzT0wZdeFXrwy3', 'joyful'),
(165, 'G5ZV0Z4OCNGFMMC', 'VTR24rPTiZkrRqi', 'creAtive'),
(166, 'G5ZV0Z4OCNGFMMC', 'v0BJ50rG3j57Nn2', 'laziness'),
(167, 'G5ZV0Z4OCNGFMMC', 'wdfzFVeWpzodVFt', 'Modis'),
(168, 'G5ZV0Z4OCNGFMMC', 'QdH2D0XPiGayDmP', 'average'),
(169, 'G5ZV0Z4OCNGFMMC', 'pBjt8KPKDpBWmBw', 'gear'),
(170, 'G5ZV0Z4OCNGFMMC', 'ECriZTT35USxn5R', 'spontaneity'),
(171, 'G5ZV0Z4OCNGFMMC', 'XSKX7edBFtmfIgE', 'interactive'),
(172, 'G5ZV0Z4OCNGFMMC', 'JeQlinCIw6mrOdX', 'KARNATAKA'),
(173, 'G5ZV0Z4OCNGFMMC', 'RiNoRSrkxMoLATu', 'India, uK, USA'),
(174, 'G5ZV0Z4OCNGFMMC', 'waBexm1Q0yk94u6', 'Invited APJ'),
(175, 'G5ZV0Z4OCNGFMMC', 'lvwbHPDPw8pwbx7', 'Repaired my bicycle'),
(176, 'G5ZV0Z4OCNGFMMC', 'MIaqW67Q90KUrVo', 'leadership camp'),
(177, 'G5ZV0Z4OCNGFMMC', 'zmfw5HOO5PlbV3O', 'let others do'),
(178, 'G5ZV0Z4OCNGFMMC', '7HLXcwapKSNuKXj', 'involve'),
(179, 'G5ZV0Z4OCNGFMMC', 'glNhKxLWS9Io53j', 'kids not as enthusiastic'),
(180, 'G5ZV0Z4OCNGFMMC', 'cIWZQFGndcpmfTG', 'apply for gurupuraskar'),
(181, 'G5ZV0Z4OCNGFMMC', 'G0yI7EJgXwn1oRm', 'visit them when sick'),
(182, 'G5ZV0Z4OCNGFMMC', '4bxj19wWvsfbois', 'tried'),
(183, 'G5ZV0Z4OCNGFMMC', 'IFCA9yH4FV6GUdF', 'life is uncertain'),
(184, 'G5ZV0Z4OCNGFMMC', 'UiH8qi0ELf3oX4F', 'very challenging'),
(185, 'G5ZV0Z4OCNGFMMC', 'lUPGM8FhIa5bGWK', 'utube and facebook'),
(186, 'G5ZV0Z4OCNGFMMC', 'fcwC3Id7tlNUh6X', 'reading'),
(187, 'G5ZV0Z4OCNGFMMC', 'TUY1MsskHQ9aBkD', 'will'),
(188, 'G5ZV0Z4OCNGFMMC', 'CEH9W49HvFimIrv', 'yoga'),
(189, 'G5ZV0Z4OCNGFMMC', '681RmOkeSaSIoY1', 'GSE'),
(190, 'G5ZV0Z4OCNGFMMC', 'UvqW8DQrbxgYxIX', 'Life'),
(191, 'G5ZV0Z4OCNGFMMC', 'x3Iz5WyK5FOaskf', 'Happiness'),
(192, 'G5ZV0Z4OCNGFMMC', '5I3wG8FlpvbVoi8', 'It'),
(193, 'G5ZV0Z4OCNGFMMC', 'RZ2GqUmHwZpK8RQ', 'When'),
(194, 'G5ZV0Z4OCNGFMMC', 't5fQ7jlIBf2E8mB', 'Advocates are spineless, heartless, gutless'),
(195, 'G5ZV0Z4OCNGFMMC', 'Ad9T9xdRz1FJaV5', 'no'),
(196, 'G5ZV0Z4OCNGFMMC', 'iIvmn9MtsK9TRx0', 'joy'),
(197, 'G5ZV0Z4OCNGFMMC', 'rHBxVcGo7zZHntY', 'suryanamaskar'),
(198, 'G5ZV0Z4OCNGFMMC', 'gtQrLrLMLslmeCz', 'jaycees'),
(199, 'G5ZV0Z4OCNGFMMC', 'qzXfqYxbCbnlOzH', 'writing'),
(200, 'G5ZV0Z4OCNGFMMC', 'CgPDpbS86e8b4KS', 'mobile'),
(201, 'G5ZV0Z4OCNGFMMC', 'amynAcLaCDoYu8y', 'play'),
(202, 'G5ZV0Z4OCNGFMMC', 'bOUuXHOZirWWoU7', 'learn'),
(203, 'G5ZV0Z4OCNGFMMC', '1tWbi2uTnEIslw3', 'more'),
(204, 'G5ZV0Z4OCNGFMMC', 'GTLiprH4gz1Dji6', 'read'),
(205, 'G5ZV0Z4OCNGFMMC', 'iQIdD6NIC2pNGfB', 'make'),
(206, 'G5ZV0Z4OCNGFMMC', '6aIwHHypiXIvFyM', 'help'),
(207, 'G5ZV0Z4OCNGFMMC', 'L5HKsynI39ynck0', 'treat'),
(208, 'G5ZV0Z4OCNGFMMC', 'kpkFgxI3cz4vWAl', 'highlight'),
(209, 'G5ZV0Z4OCNGFMMC', 'DWW9rPB91HsO06w', 'Both'),
(210, 'G5ZV0Z4OCNGFMMC', 'QfljNkiZr6RFXoz', 'Teachers'),
(211, 'G5ZV0Z4OCNGFMMC', 'TwG3tvLhHt6CCMV', 'has'),
(212, 'G5ZV0Z4OCNGFMMC', 'v6ISA5gKJXYEdvy', 'is'),
(213, 'G5ZV0Z4OCNGFMMC', 'dFK8h7HrgwYxwGS', 'engage'),
(214, 'G5ZV0Z4OCNGFMMC', '1rxHBJdRe88FpR9', 'Teachers'),
(215, 'G5ZV0Z4OCNGFMMC', 'kFt5AKiw1a5AWfh', 'Lecturers'),
(216, 'G5ZV0Z4OCNGFMMC', 'f6qbvaEcN8HfqBR', 'toys,'),
(217, 'G5ZV0Z4OCNGFMMC', '1o2D6R7bK7XuACX', 'GOODS'),
(218, 'G5ZV0Z4OCNGFMMC', 'faoOT9OjGQKWm62', 'JOOP'),
(219, 'G5ZV0Z4OCNGFMMC', 'QBJSbDdzqAP8lqR', 'KLID'),
(220, 'G5ZV0Z4OCNGFMMC', 'OCUO6bcora9fb7C', 'MAYBE'),
(221, 'G5ZV0Z4OCNGFMMC', 'lJ6xG8O1PI3PgZL', 'MAYBE'),
(222, 'G5ZV0Z4OCNGFMMC', 'G7inWZsNR3ygHr4', 'MAYBE'),
(223, 'G5ZV0Z4OCNGFMMC', 'valnPcyRRc5mgCt', 'MAYBE'),
(224, 'G5ZV0Z4OCNGFMMC', 'xXiL3XPQFdM0hQB', 'MAYBE'),
(225, 'G5ZV0Z4OCNGFMMC', 'TdvrPQECmt0M8kL', 'MAYBE'),
(226, 'ZSQN73XRX4MDZ28', 'uZ6RC9K2P0KddmD', '5'),
(227, 'ZSQN73XRX4MDZ28', 'Mh6CSc4dxSQv8rA', 'Computer'),
(228, 'ZSQN73XRX4MDZ28', 'ttPonLOQ5olFxLT', '12'),
(229, 'ZSQN73XRX4MDZ28', 'FmUBSmr76m2xz5X', '12'),
(230, 'ZSQN73XRX4MDZ28', 'zz6xz1GREGGytdm', '12'),
(231, 'ZSQN73XRX4MDZ28', 'xspFq7VSEjjmtDl', 'Motivation'),
(232, 'ZSQN73XRX4MDZ28', 'EWX5tt1u0AP2Vj5', 'Teaching'),
(233, 'ZSQN73XRX4MDZ28', '63qblG4WkRkhS6O', 'Teaching'),
(234, 'ZSQN73XRX4MDZ28', 'whVcRluiQnlM2xT', 'Teaching'),
(235, 'ZSQN73XRX4MDZ28', 'ggDtBqTc25YbkQc', 'Sarvapalli Radha Krishnan'),
(236, 'ZSQN73XRX4MDZ28', 'bjcZ8ldnszpPQAm', 'Can\'t Hurt Me - David Goggins'),
(237, 'ZSQN73XRX4MDZ28', '6OkFFPUS7MuGlZr', 'Anubhav Shavaran'),
(238, 'ZSQN73XRX4MDZ28', 'afQJHCHSjM0HvlH', 'Anubhav Shavaran'),
(239, 'ZSQN73XRX4MDZ28', 'JwzT0wZdeFXrwy3', 'yes'),
(240, 'ZSQN73XRX4MDZ28', 'VTR24rPTiZkrRqi', 'Teaching'),
(241, 'ZSQN73XRX4MDZ28', 'v0BJ50rG3j57Nn2', 'no'),
(242, 'ZSQN73XRX4MDZ28', 'wdfzFVeWpzodVFt', 'y'),
(243, 'ZSQN73XRX4MDZ28', 'QdH2D0XPiGayDmP', 'y'),
(244, 'ZSQN73XRX4MDZ28', 'pBjt8KPKDpBWmBw', 'y'),
(245, 'ZSQN73XRX4MDZ28', 'ECriZTT35USxn5R', 'y'),
(246, 'ZSQN73XRX4MDZ28', 'XSKX7edBFtmfIgE', 'y'),
(247, 'ZSQN73XRX4MDZ28', 'JeQlinCIw6mrOdX', 'Maharashtra'),
(248, 'ZSQN73XRX4MDZ28', 'RiNoRSrkxMoLATu', 'India'),
(249, 'ZSQN73XRX4MDZ28', 'waBexm1Q0yk94u6', 'yy'),
(250, 'ZSQN73XRX4MDZ28', 'lvwbHPDPw8pwbx7', 'y'),
(251, 'ZSQN73XRX4MDZ28', 'MIaqW67Q90KUrVo', 'y'),
(252, 'ZSQN73XRX4MDZ28', 'zmfw5HOO5PlbV3O', 'y'),
(253, 'ZSQN73XRX4MDZ28', '7HLXcwapKSNuKXj', 'y'),
(254, 'ZSQN73XRX4MDZ28', 'glNhKxLWS9Io53j', 'y'),
(255, 'ZSQN73XRX4MDZ28', 'cIWZQFGndcpmfTG', 'y'),
(256, 'ZSQN73XRX4MDZ28', 'G0yI7EJgXwn1oRm', 'y'),
(257, 'ZSQN73XRX4MDZ28', '4bxj19wWvsfbois', 'yyy'),
(258, 'ZSQN73XRX4MDZ28', 'IFCA9yH4FV6GUdF', 'y'),
(259, 'ZSQN73XRX4MDZ28', 'UiH8qi0ELf3oX4F', 'y'),
(260, 'ZSQN73XRX4MDZ28', 'lUPGM8FhIa5bGWK', 'y'),
(261, 'ZSQN73XRX4MDZ28', 'fcwC3Id7tlNUh6X', 'y'),
(262, 'ZSQN73XRX4MDZ28', 'TUY1MsskHQ9aBkD', 'good'),
(263, 'ZSQN73XRX4MDZ28', 'CEH9W49HvFimIrv', 'y'),
(264, 'ZSQN73XRX4MDZ28', '681RmOkeSaSIoY1', 'yy'),
(265, 'ZSQN73XRX4MDZ28', 'UvqW8DQrbxgYxIX', 'y'),
(266, 'ZSQN73XRX4MDZ28', 'x3Iz5WyK5FOaskf', 'y'),
(267, 'ZSQN73XRX4MDZ28', '5I3wG8FlpvbVoi8', 'y'),
(268, 'ZSQN73XRX4MDZ28', 'RZ2GqUmHwZpK8RQ', 'y'),
(269, 'ZSQN73XRX4MDZ28', 't5fQ7jlIBf2E8mB', 'y'),
(270, 'ZSQN73XRX4MDZ28', 'Ad9T9xdRz1FJaV5', 'yy'),
(271, 'ZSQN73XRX4MDZ28', 'iIvmn9MtsK9TRx0', 'y'),
(272, 'ZSQN73XRX4MDZ28', 'rHBxVcGo7zZHntY', 'y'),
(273, 'ZSQN73XRX4MDZ28', 'gtQrLrLMLslmeCz', 'y'),
(274, 'ZSQN73XRX4MDZ28', 'qzXfqYxbCbnlOzH', 'yy'),
(275, 'ZSQN73XRX4MDZ28', 'CgPDpbS86e8b4KS', 'y'),
(276, 'ZSQN73XRX4MDZ28', 'amynAcLaCDoYu8y', 'y'),
(277, 'ZSQN73XRX4MDZ28', 'bOUuXHOZirWWoU7', 'y'),
(278, 'ZSQN73XRX4MDZ28', '1tWbi2uTnEIslw3', 'yy'),
(279, 'ZSQN73XRX4MDZ28', 'GTLiprH4gz1Dji6', 'y'),
(280, 'ZSQN73XRX4MDZ28', 'iQIdD6NIC2pNGfB', 'good'),
(281, 'ZSQN73XRX4MDZ28', '6aIwHHypiXIvFyM', 'y'),
(282, 'ZSQN73XRX4MDZ28', 'L5HKsynI39ynck0', 'y'),
(283, 'ZSQN73XRX4MDZ28', 'kpkFgxI3cz4vWAl', 'y'),
(284, 'ZSQN73XRX4MDZ28', 'DWW9rPB91HsO06w', 'y'),
(285, 'ZSQN73XRX4MDZ28', 'QfljNkiZr6RFXoz', 'y'),
(286, 'ZSQN73XRX4MDZ28', 'TwG3tvLhHt6CCMV', 'yy'),
(287, 'ZSQN73XRX4MDZ28', 'v6ISA5gKJXYEdvy', 'y'),
(288, 'ZSQN73XRX4MDZ28', 'dFK8h7HrgwYxwGS', 'y'),
(289, 'ZSQN73XRX4MDZ28', '1rxHBJdRe88FpR9', 'Teachers'),
(290, 'ZSQN73XRX4MDZ28', 'kFt5AKiw1a5AWfh', 'Teachers'),
(291, 'ZSQN73XRX4MDZ28', 'f6qbvaEcN8HfqBR', 'y'),
(292, 'ZSQN73XRX4MDZ28', '1o2D6R7bK7XuACX', 'y'),
(293, 'ZSQN73XRX4MDZ28', 'faoOT9OjGQKWm62', 'ARMY INSTITUTE OF TECHNOLOGY'),
(294, 'ZSQN73XRX4MDZ28', 'QBJSbDdzqAP8lqR', 'y'),
(295, 'ZSQN73XRX4MDZ28', 'OCUO6bcora9fb7C', 'YES'),
(296, 'ZSQN73XRX4MDZ28', 'lJ6xG8O1PI3PgZL', 'YES'),
(297, 'ZSQN73XRX4MDZ28', 'G7inWZsNR3ygHr4', 'YES'),
(298, 'ZSQN73XRX4MDZ28', 'valnPcyRRc5mgCt', 'YES'),
(299, 'ZSQN73XRX4MDZ28', 'xXiL3XPQFdM0hQB', 'YES'),
(300, 'ZSQN73XRX4MDZ28', 'TdvrPQECmt0M8kL', 'YES'),
(301, '2NZA1G3LMIRZQ7L', 'uZ6RC9K2P0KddmD', '23'),
(302, '2NZA1G3LMIRZQ7L', 'Mh6CSc4dxSQv8rA', 'Computer'),
(303, '2NZA1G3LMIRZQ7L', 'ttPonLOQ5olFxLT', '12'),
(304, '2NZA1G3LMIRZQ7L', 'FmUBSmr76m2xz5X', '12'),
(305, '2NZA1G3LMIRZQ7L', 'zz6xz1GREGGytdm', '12'),
(306, '2NZA1G3LMIRZQ7L', 'xspFq7VSEjjmtDl', 'Motivation'),
(307, '2NZA1G3LMIRZQ7L', 'EWX5tt1u0AP2Vj5', 'Teaching'),
(308, '2NZA1G3LMIRZQ7L', '63qblG4WkRkhS6O', 'Teaching'),
(309, '2NZA1G3LMIRZQ7L', 'whVcRluiQnlM2xT', 'Teaching'),
(310, '2NZA1G3LMIRZQ7L', 'ggDtBqTc25YbkQc', 'Sarvapalli'),
(311, '2NZA1G3LMIRZQ7L', 'bjcZ8ldnszpPQAm', 'Can\'t'),
(312, '2NZA1G3LMIRZQ7L', '6OkFFPUS7MuGlZr', 'Anubhav'),
(313, '2NZA1G3LMIRZQ7L', 'afQJHCHSjM0HvlH', 'Anubhav'),
(314, '2NZA1G3LMIRZQ7L', 'JwzT0wZdeFXrwy3', 'yes'),
(315, '2NZA1G3LMIRZQ7L', 'VTR24rPTiZkrRqi', 'Teaching'),
(316, '2NZA1G3LMIRZQ7L', 'v0BJ50rG3j57Nn2', 'no'),
(317, '2NZA1G3LMIRZQ7L', 'wdfzFVeWpzodVFt', 'y'),
(318, '2NZA1G3LMIRZQ7L', 'QdH2D0XPiGayDmP', 'y'),
(319, '2NZA1G3LMIRZQ7L', 'pBjt8KPKDpBWmBw', 'y'),
(320, '2NZA1G3LMIRZQ7L', 'ECriZTT35USxn5R', 'y'),
(321, '2NZA1G3LMIRZQ7L', 'XSKX7edBFtmfIgE', 'y'),
(322, '2NZA1G3LMIRZQ7L', 'JeQlinCIw6mrOdX', 'Maharashtra'),
(323, '2NZA1G3LMIRZQ7L', 'RiNoRSrkxMoLATu', 'India'),
(324, '2NZA1G3LMIRZQ7L', 'waBexm1Q0yk94u6', 'yy'),
(325, '2NZA1G3LMIRZQ7L', 'lvwbHPDPw8pwbx7', 'y'),
(326, '2NZA1G3LMIRZQ7L', 'MIaqW67Q90KUrVo', 'y'),
(327, '2NZA1G3LMIRZQ7L', 'zmfw5HOO5PlbV3O', 'y'),
(328, '2NZA1G3LMIRZQ7L', '7HLXcwapKSNuKXj', 'y'),
(329, '2NZA1G3LMIRZQ7L', 'glNhKxLWS9Io53j', 'y'),
(330, '2NZA1G3LMIRZQ7L', 'cIWZQFGndcpmfTG', 'y'),
(331, '2NZA1G3LMIRZQ7L', 'G0yI7EJgXwn1oRm', 'y'),
(332, '2NZA1G3LMIRZQ7L', '4bxj19wWvsfbois', 'yyy'),
(333, '2NZA1G3LMIRZQ7L', 'IFCA9yH4FV6GUdF', 'y'),
(334, '2NZA1G3LMIRZQ7L', 'UiH8qi0ELf3oX4F', 'y'),
(335, '2NZA1G3LMIRZQ7L', 'lUPGM8FhIa5bGWK', 'y'),
(336, '2NZA1G3LMIRZQ7L', 'fcwC3Id7tlNUh6X', 'y'),
(337, '2NZA1G3LMIRZQ7L', 'TUY1MsskHQ9aBkD', 'good'),
(338, '2NZA1G3LMIRZQ7L', 'CEH9W49HvFimIrv', 'y'),
(339, '2NZA1G3LMIRZQ7L', '681RmOkeSaSIoY1', 'yy'),
(340, '2NZA1G3LMIRZQ7L', 'UvqW8DQrbxgYxIX', 'y'),
(341, '2NZA1G3LMIRZQ7L', 'x3Iz5WyK5FOaskf', 'y'),
(342, '2NZA1G3LMIRZQ7L', '5I3wG8FlpvbVoi8', 'y'),
(343, '2NZA1G3LMIRZQ7L', 'RZ2GqUmHwZpK8RQ', 'y'),
(344, '2NZA1G3LMIRZQ7L', 't5fQ7jlIBf2E8mB', 'y'),
(345, '2NZA1G3LMIRZQ7L', 'Ad9T9xdRz1FJaV5', 'yy'),
(346, '2NZA1G3LMIRZQ7L', 'iIvmn9MtsK9TRx0', 'y'),
(347, '2NZA1G3LMIRZQ7L', 'rHBxVcGo7zZHntY', 'y'),
(348, '2NZA1G3LMIRZQ7L', 'gtQrLrLMLslmeCz', 'y'),
(349, '2NZA1G3LMIRZQ7L', 'qzXfqYxbCbnlOzH', 'yy'),
(350, '2NZA1G3LMIRZQ7L', 'CgPDpbS86e8b4KS', 'y'),
(351, '2NZA1G3LMIRZQ7L', 'amynAcLaCDoYu8y', 'y'),
(352, '2NZA1G3LMIRZQ7L', 'bOUuXHOZirWWoU7', 'y'),
(353, '2NZA1G3LMIRZQ7L', '1tWbi2uTnEIslw3', 'yy'),
(354, '2NZA1G3LMIRZQ7L', 'GTLiprH4gz1Dji6', 'y'),
(355, '2NZA1G3LMIRZQ7L', 'iQIdD6NIC2pNGfB', 'good'),
(356, '2NZA1G3LMIRZQ7L', '6aIwHHypiXIvFyM', 'y'),
(357, '2NZA1G3LMIRZQ7L', 'L5HKsynI39ynck0', 'y'),
(358, '2NZA1G3LMIRZQ7L', 'kpkFgxI3cz4vWAl', 'y'),
(359, '2NZA1G3LMIRZQ7L', 'DWW9rPB91HsO06w', 'y'),
(360, '2NZA1G3LMIRZQ7L', 'QfljNkiZr6RFXoz', 'y'),
(361, '2NZA1G3LMIRZQ7L', 'TwG3tvLhHt6CCMV', 'yy'),
(362, '2NZA1G3LMIRZQ7L', 'v6ISA5gKJXYEdvy', 'y'),
(363, '2NZA1G3LMIRZQ7L', 'dFK8h7HrgwYxwGS', 'y'),
(364, '2NZA1G3LMIRZQ7L', '1rxHBJdRe88FpR9', 'Professors'),
(365, '2NZA1G3LMIRZQ7L', 'kFt5AKiw1a5AWfh', 'Professors'),
(366, '2NZA1G3LMIRZQ7L', 'f6qbvaEcN8HfqBR', 'y'),
(367, '2NZA1G3LMIRZQ7L', '1o2D6R7bK7XuACX', 'y'),
(368, '2NZA1G3LMIRZQ7L', 'faoOT9OjGQKWm62', 'ARMY'),
(369, '2NZA1G3LMIRZQ7L', 'QBJSbDdzqAP8lqR', 'y'),
(370, '2NZA1G3LMIRZQ7L', 'OCUO6bcora9fb7C', 'YES'),
(371, '2NZA1G3LMIRZQ7L', 'lJ6xG8O1PI3PgZL', 'YES'),
(372, '2NZA1G3LMIRZQ7L', 'G7inWZsNR3ygHr4', 'YES'),
(373, '2NZA1G3LMIRZQ7L', 'valnPcyRRc5mgCt', 'YES'),
(374, '2NZA1G3LMIRZQ7L', 'xXiL3XPQFdM0hQB', 'YES'),
(375, '2NZA1G3LMIRZQ7L', 'TdvrPQECmt0M8kL', 'YES'),
(601, 'VMLFODVFO0XJ5FF', 'uZ6RC9K2P0KddmD', '12'),
(602, 'VMLFODVFO0XJ5FF', 'Mh6CSc4dxSQv8rA', 'Computer'),
(603, 'VMLFODVFO0XJ5FF', 'ttPonLOQ5olFxLT', '13'),
(604, 'VMLFODVFO0XJ5FF', 'FmUBSmr76m2xz5X', '12'),
(605, 'VMLFODVFO0XJ5FF', 'zz6xz1GREGGytdm', '12'),
(606, 'VMLFODVFO0XJ5FF', 'xspFq7VSEjjmtDl', 'Motivation'),
(607, 'VMLFODVFO0XJ5FF', 'EWX5tt1u0AP2Vj5', 'Teaching'),
(608, 'VMLFODVFO0XJ5FF', '63qblG4WkRkhS6O', 'Teaching'),
(609, 'VMLFODVFO0XJ5FF', 'whVcRluiQnlM2xT', 'Teaching'),
(610, 'VMLFODVFO0XJ5FF', 'ggDtBqTc25YbkQc', 'Sarvapalli'),
(611, 'VMLFODVFO0XJ5FF', 'bjcZ8ldnszpPQAm', 'Can\'t'),
(612, 'VMLFODVFO0XJ5FF', '6OkFFPUS7MuGlZr', 'Can\'t'),
(613, 'VMLFODVFO0XJ5FF', 'afQJHCHSjM0HvlH', 'Anyone'),
(614, 'VMLFODVFO0XJ5FF', 'JwzT0wZdeFXrwy3', 'yes'),
(615, 'VMLFODVFO0XJ5FF', 'VTR24rPTiZkrRqi', 'Teaching'),
(616, 'VMLFODVFO0XJ5FF', 'v0BJ50rG3j57Nn2', 'no'),
(617, 'VMLFODVFO0XJ5FF', 'wdfzFVeWpzodVFt', 'y'),
(618, 'VMLFODVFO0XJ5FF', 'QdH2D0XPiGayDmP', 'y'),
(619, 'VMLFODVFO0XJ5FF', 'pBjt8KPKDpBWmBw', 'y'),
(620, 'VMLFODVFO0XJ5FF', 'ECriZTT35USxn5R', 'y'),
(621, 'VMLFODVFO0XJ5FF', 'XSKX7edBFtmfIgE', 'y'),
(622, 'VMLFODVFO0XJ5FF', 'JeQlinCIw6mrOdX', 'y'),
(623, 'VMLFODVFO0XJ5FF', 'RiNoRSrkxMoLATu', 'y'),
(624, 'VMLFODVFO0XJ5FF', 'waBexm1Q0yk94u6', 'y'),
(625, 'VMLFODVFO0XJ5FF', 'lvwbHPDPw8pwbx7', 'y'),
(626, 'VMLFODVFO0XJ5FF', 'MIaqW67Q90KUrVo', 'y'),
(627, 'VMLFODVFO0XJ5FF', 'zmfw5HOO5PlbV3O', 'y'),
(628, 'VMLFODVFO0XJ5FF', '7HLXcwapKSNuKXj', 'y'),
(629, 'VMLFODVFO0XJ5FF', 'glNhKxLWS9Io53j', 'y'),
(630, 'VMLFODVFO0XJ5FF', 'cIWZQFGndcpmfTG', 'y'),
(631, 'VMLFODVFO0XJ5FF', 'G0yI7EJgXwn1oRm', 'y'),
(632, 'VMLFODVFO0XJ5FF', '4bxj19wWvsfbois', 'y'),
(633, 'VMLFODVFO0XJ5FF', 'IFCA9yH4FV6GUdF', 'y'),
(634, 'VMLFODVFO0XJ5FF', 'UiH8qi0ELf3oX4F', 'y'),
(635, 'VMLFODVFO0XJ5FF', 'lUPGM8FhIa5bGWK', 'y'),
(636, 'VMLFODVFO0XJ5FF', 'fcwC3Id7tlNUh6X', 'yy'),
(637, 'VMLFODVFO0XJ5FF', 'TUY1MsskHQ9aBkD', 'y'),
(638, 'VMLFODVFO0XJ5FF', 'CEH9W49HvFimIrv', 'y'),
(639, 'VMLFODVFO0XJ5FF', '681RmOkeSaSIoY1', 'yy'),
(640, 'VMLFODVFO0XJ5FF', 'UvqW8DQrbxgYxIX', 'y'),
(641, 'VMLFODVFO0XJ5FF', 'x3Iz5WyK5FOaskf', 'y'),
(642, 'VMLFODVFO0XJ5FF', '5I3wG8FlpvbVoi8', 'yy'),
(643, 'VMLFODVFO0XJ5FF', 'RZ2GqUmHwZpK8RQ', 'y'),
(644, 'VMLFODVFO0XJ5FF', 't5fQ7jlIBf2E8mB', 'y'),
(645, 'VMLFODVFO0XJ5FF', 'Ad9T9xdRz1FJaV5', 'yy'),
(646, 'VMLFODVFO0XJ5FF', 'iIvmn9MtsK9TRx0', 'y'),
(647, 'VMLFODVFO0XJ5FF', 'rHBxVcGo7zZHntY', 'yy'),
(648, 'VMLFODVFO0XJ5FF', 'gtQrLrLMLslmeCz', 'y'),
(649, 'VMLFODVFO0XJ5FF', 'qzXfqYxbCbnlOzH', 'yy'),
(650, 'VMLFODVFO0XJ5FF', 'CgPDpbS86e8b4KS', 'y'),
(651, 'VMLFODVFO0XJ5FF', 'amynAcLaCDoYu8y', 'y'),
(652, 'VMLFODVFO0XJ5FF', 'bOUuXHOZirWWoU7', 'y'),
(653, 'VMLFODVFO0XJ5FF', '1tWbi2uTnEIslw3', 'yy'),
(654, 'VMLFODVFO0XJ5FF', 'GTLiprH4gz1Dji6', 'y'),
(655, 'VMLFODVFO0XJ5FF', 'iQIdD6NIC2pNGfB', 'y'),
(656, 'VMLFODVFO0XJ5FF', '6aIwHHypiXIvFyM', 'y'),
(657, 'VMLFODVFO0XJ5FF', 'L5HKsynI39ynck0', 'y'),
(658, 'VMLFODVFO0XJ5FF', 'kpkFgxI3cz4vWAl', 'y'),
(659, 'VMLFODVFO0XJ5FF', 'DWW9rPB91HsO06w', 'y'),
(660, 'VMLFODVFO0XJ5FF', 'QfljNkiZr6RFXoz', 'y'),
(661, 'VMLFODVFO0XJ5FF', 'TwG3tvLhHt6CCMV', 'yy'),
(662, 'VMLFODVFO0XJ5FF', 'v6ISA5gKJXYEdvy', 'y'),
(663, 'VMLFODVFO0XJ5FF', 'dFK8h7HrgwYxwGS', 'y'),
(664, 'VMLFODVFO0XJ5FF', '1rxHBJdRe88FpR9', 'Teachers'),
(665, 'VMLFODVFO0XJ5FF', 'kFt5AKiw1a5AWfh', 'Teachers'),
(666, 'VMLFODVFO0XJ5FF', 'f6qbvaEcN8HfqBR', 'y'),
(667, 'VMLFODVFO0XJ5FF', '1o2D6R7bK7XuACX', 'y'),
(668, 'VMLFODVFO0XJ5FF', 'faoOT9OjGQKWm62', 'y'),
(669, 'VMLFODVFO0XJ5FF', 'QBJSbDdzqAP8lqR', 'y'),
(670, 'VMLFODVFO0XJ5FF', 'OCUO6bcora9fb7C', 'YES'),
(671, 'VMLFODVFO0XJ5FF', 'lJ6xG8O1PI3PgZL', 'YES'),
(672, 'VMLFODVFO0XJ5FF', 'G7inWZsNR3ygHr4', 'YES'),
(673, 'VMLFODVFO0XJ5FF', 'valnPcyRRc5mgCt', 'YES'),
(674, 'VMLFODVFO0XJ5FF', 'xXiL3XPQFdM0hQB', 'YES'),
(675, 'VMLFODVFO0XJ5FF', 'TdvrPQECmt0M8kL', 'YES'),
(676, '12MO7V0HPVBGUXC', 'uZ6RC9K2P0KddmD', '7'),
(677, '12MO7V0HPVBGUXC', 'Mh6CSc4dxSQv8rA', 'cvncv'),
(678, '12MO7V0HPVBGUXC', 'ttPonLOQ5olFxLT', '556'),
(679, '12MO7V0HPVBGUXC', 'FmUBSmr76m2xz5X', '65'),
(680, '12MO7V0HPVBGUXC', 'zz6xz1GREGGytdm', '4'),
(681, '12MO7V0HPVBGUXC', 'xspFq7VSEjjmtDl', '4'),
(682, '12MO7V0HPVBGUXC', 'EWX5tt1u0AP2Vj5', '4'),
(683, '12MO7V0HPVBGUXC', '63qblG4WkRkhS6O', '4'),
(684, '12MO7V0HPVBGUXC', 'whVcRluiQnlM2xT', '4'),
(685, '12MO7V0HPVBGUXC', 'ggDtBqTc25YbkQc', '4'),
(686, '12MO7V0HPVBGUXC', 'bjcZ8ldnszpPQAm', '4'),
(687, '12MO7V0HPVBGUXC', '6OkFFPUS7MuGlZr', '4'),
(688, '12MO7V0HPVBGUXC', 'afQJHCHSjM0HvlH', '4'),
(689, '12MO7V0HPVBGUXC', 'JwzT0wZdeFXrwy3', '4'),
(690, '12MO7V0HPVBGUXC', 'VTR24rPTiZkrRqi', '4'),
(691, '12MO7V0HPVBGUXC', 'v0BJ50rG3j57Nn2', '4'),
(692, '12MO7V0HPVBGUXC', 'wdfzFVeWpzodVFt', '4'),
(693, '12MO7V0HPVBGUXC', 'QdH2D0XPiGayDmP', '4'),
(694, '12MO7V0HPVBGUXC', 'pBjt8KPKDpBWmBw', '4'),
(695, '12MO7V0HPVBGUXC', 'ECriZTT35USxn5R', '4'),
(696, '12MO7V0HPVBGUXC', 'XSKX7edBFtmfIgE', '4'),
(697, '12MO7V0HPVBGUXC', 'JeQlinCIw6mrOdX', '4'),
(698, '12MO7V0HPVBGUXC', 'RiNoRSrkxMoLATu', '4'),
(699, '12MO7V0HPVBGUXC', 'waBexm1Q0yk94u6', '4'),
(700, '12MO7V0HPVBGUXC', 'lvwbHPDPw8pwbx7', '4'),
(701, '12MO7V0HPVBGUXC', 'MIaqW67Q90KUrVo', '4'),
(702, '12MO7V0HPVBGUXC', 'zmfw5HOO5PlbV3O', '4'),
(703, '12MO7V0HPVBGUXC', '7HLXcwapKSNuKXj', '4'),
(704, '12MO7V0HPVBGUXC', 'glNhKxLWS9Io53j', '4'),
(705, '12MO7V0HPVBGUXC', 'cIWZQFGndcpmfTG', '4'),
(706, '12MO7V0HPVBGUXC', 'G0yI7EJgXwn1oRm', '4'),
(707, '12MO7V0HPVBGUXC', '4bxj19wWvsfbois', '4'),
(708, '12MO7V0HPVBGUXC', 'IFCA9yH4FV6GUdF', '4'),
(709, '12MO7V0HPVBGUXC', 'UiH8qi0ELf3oX4F', '4'),
(710, '12MO7V0HPVBGUXC', 'lUPGM8FhIa5bGWK', '4'),
(711, '12MO7V0HPVBGUXC', 'fcwC3Id7tlNUh6X', '4'),
(712, '12MO7V0HPVBGUXC', 'TUY1MsskHQ9aBkD', '4'),
(713, '12MO7V0HPVBGUXC', 'CEH9W49HvFimIrv', '4'),
(714, '12MO7V0HPVBGUXC', '681RmOkeSaSIoY1', '4'),
(715, '12MO7V0HPVBGUXC', 'UvqW8DQrbxgYxIX', '4'),
(716, '12MO7V0HPVBGUXC', 'x3Iz5WyK5FOaskf', '4'),
(717, '12MO7V0HPVBGUXC', '5I3wG8FlpvbVoi8', '4'),
(718, '12MO7V0HPVBGUXC', 'RZ2GqUmHwZpK8RQ', '4'),
(719, '12MO7V0HPVBGUXC', 't5fQ7jlIBf2E8mB', '4'),
(720, '12MO7V0HPVBGUXC', 'Ad9T9xdRz1FJaV5', '4'),
(721, '12MO7V0HPVBGUXC', 'iIvmn9MtsK9TRx0', '4'),
(722, '12MO7V0HPVBGUXC', 'rHBxVcGo7zZHntY', '4'),
(723, '12MO7V0HPVBGUXC', 'gtQrLrLMLslmeCz', '4'),
(724, '12MO7V0HPVBGUXC', 'qzXfqYxbCbnlOzH', '4'),
(725, '12MO7V0HPVBGUXC', 'CgPDpbS86e8b4KS', '4'),
(726, '12MO7V0HPVBGUXC', 'amynAcLaCDoYu8y', '4'),
(727, '12MO7V0HPVBGUXC', 'bOUuXHOZirWWoU7', '4'),
(728, '12MO7V0HPVBGUXC', '1tWbi2uTnEIslw3', '4'),
(729, '12MO7V0HPVBGUXC', 'GTLiprH4gz1Dji6', '4'),
(730, '12MO7V0HPVBGUXC', 'iQIdD6NIC2pNGfB', '4'),
(731, '12MO7V0HPVBGUXC', '6aIwHHypiXIvFyM', '4'),
(732, '12MO7V0HPVBGUXC', 'L5HKsynI39ynck0', '4'),
(733, '12MO7V0HPVBGUXC', 'kpkFgxI3cz4vWAl', '4'),
(734, '12MO7V0HPVBGUXC', 'DWW9rPB91HsO06w', '4'),
(735, '12MO7V0HPVBGUXC', 'QfljNkiZr6RFXoz', '4'),
(736, '12MO7V0HPVBGUXC', 'TwG3tvLhHt6CCMV', '4'),
(737, '12MO7V0HPVBGUXC', 'v6ISA5gKJXYEdvy', '4'),
(738, '12MO7V0HPVBGUXC', 'dFK8h7HrgwYxwGS', '4'),
(739, '12MO7V0HPVBGUXC', '1rxHBJdRe88FpR9', 'Teachers'),
(740, '12MO7V0HPVBGUXC', 'kFt5AKiw1a5AWfh', 'Teachers'),
(741, '12MO7V0HPVBGUXC', 'f6qbvaEcN8HfqBR', '4'),
(742, '12MO7V0HPVBGUXC', '1o2D6R7bK7XuACX', '4'),
(743, '12MO7V0HPVBGUXC', 'faoOT9OjGQKWm62', '4'),
(744, '12MO7V0HPVBGUXC', 'QBJSbDdzqAP8lqR', '4'),
(745, '12MO7V0HPVBGUXC', 'OCUO6bcora9fb7C', 'YES'),
(746, '12MO7V0HPVBGUXC', 'lJ6xG8O1PI3PgZL', 'NO'),
(747, '12MO7V0HPVBGUXC', 'G7inWZsNR3ygHr4', 'YES'),
(748, '12MO7V0HPVBGUXC', 'valnPcyRRc5mgCt', 'NO'),
(749, '12MO7V0HPVBGUXC', 'xXiL3XPQFdM0hQB', 'YES'),
(750, '12MO7V0HPVBGUXC', 'TdvrPQECmt0M8kL', 'YES'),
(751, 'R2FB6OJSRDPL5ZQ', 'uZ6RC9K2P0KddmD', ''),
(752, 'R2FB6OJSRDPL5ZQ', 'Mh6CSc4dxSQv8rA', ''),
(753, 'R2FB6OJSRDPL5ZQ', 'ttPonLOQ5olFxLT', ''),
(754, 'R2FB6OJSRDPL5ZQ', 'FmUBSmr76m2xz5X', ''),
(755, 'R2FB6OJSRDPL5ZQ', 'zz6xz1GREGGytdm', ''),
(756, 'R2FB6OJSRDPL5ZQ', 'xspFq7VSEjjmtDl', ''),
(757, 'R2FB6OJSRDPL5ZQ', 'EWX5tt1u0AP2Vj5', ''),
(758, 'R2FB6OJSRDPL5ZQ', '63qblG4WkRkhS6O', ''),
(759, 'R2FB6OJSRDPL5ZQ', 'whVcRluiQnlM2xT', ''),
(760, 'R2FB6OJSRDPL5ZQ', 'ggDtBqTc25YbkQc', ''),
(761, 'R2FB6OJSRDPL5ZQ', 'bjcZ8ldnszpPQAm', ''),
(762, 'R2FB6OJSRDPL5ZQ', '6OkFFPUS7MuGlZr', ''),
(763, 'R2FB6OJSRDPL5ZQ', 'afQJHCHSjM0HvlH', ''),
(764, 'R2FB6OJSRDPL5ZQ', 'JwzT0wZdeFXrwy3', ''),
(765, 'R2FB6OJSRDPL5ZQ', 'VTR24rPTiZkrRqi', ''),
(766, 'R2FB6OJSRDPL5ZQ', 'v0BJ50rG3j57Nn2', ''),
(767, 'R2FB6OJSRDPL5ZQ', 'wdfzFVeWpzodVFt', ''),
(768, 'R2FB6OJSRDPL5ZQ', 'QdH2D0XPiGayDmP', ''),
(769, 'R2FB6OJSRDPL5ZQ', 'pBjt8KPKDpBWmBw', ''),
(770, 'R2FB6OJSRDPL5ZQ', 'ECriZTT35USxn5R', ''),
(771, 'R2FB6OJSRDPL5ZQ', 'XSKX7edBFtmfIgE', ''),
(772, 'R2FB6OJSRDPL5ZQ', 'JeQlinCIw6mrOdX', ''),
(773, 'R2FB6OJSRDPL5ZQ', 'RiNoRSrkxMoLATu', ''),
(774, 'R2FB6OJSRDPL5ZQ', 'waBexm1Q0yk94u6', ''),
(775, 'R2FB6OJSRDPL5ZQ', 'lvwbHPDPw8pwbx7', ''),
(776, 'R2FB6OJSRDPL5ZQ', 'MIaqW67Q90KUrVo', ''),
(777, 'R2FB6OJSRDPL5ZQ', 'zmfw5HOO5PlbV3O', ''),
(778, 'R2FB6OJSRDPL5ZQ', '7HLXcwapKSNuKXj', ''),
(779, 'R2FB6OJSRDPL5ZQ', 'glNhKxLWS9Io53j', ''),
(780, 'R2FB6OJSRDPL5ZQ', 'cIWZQFGndcpmfTG', ''),
(781, 'R2FB6OJSRDPL5ZQ', 'G0yI7EJgXwn1oRm', ''),
(782, 'R2FB6OJSRDPL5ZQ', '4bxj19wWvsfbois', ''),
(783, 'R2FB6OJSRDPL5ZQ', 'IFCA9yH4FV6GUdF', ''),
(784, 'R2FB6OJSRDPL5ZQ', 'UiH8qi0ELf3oX4F', ''),
(785, 'R2FB6OJSRDPL5ZQ', 'lUPGM8FhIa5bGWK', ''),
(786, 'R2FB6OJSRDPL5ZQ', 'fcwC3Id7tlNUh6X', ''),
(787, 'R2FB6OJSRDPL5ZQ', 'TUY1MsskHQ9aBkD', ''),
(788, 'R2FB6OJSRDPL5ZQ', 'CEH9W49HvFimIrv', ''),
(789, 'R2FB6OJSRDPL5ZQ', '681RmOkeSaSIoY1', ''),
(790, 'R2FB6OJSRDPL5ZQ', 'UvqW8DQrbxgYxIX', ''),
(791, 'R2FB6OJSRDPL5ZQ', 'x3Iz5WyK5FOaskf', ''),
(792, 'R2FB6OJSRDPL5ZQ', '5I3wG8FlpvbVoi8', ''),
(793, 'R2FB6OJSRDPL5ZQ', 'RZ2GqUmHwZpK8RQ', ''),
(794, 'R2FB6OJSRDPL5ZQ', 't5fQ7jlIBf2E8mB', ''),
(795, 'R2FB6OJSRDPL5ZQ', 'Ad9T9xdRz1FJaV5', ''),
(796, 'R2FB6OJSRDPL5ZQ', 'iIvmn9MtsK9TRx0', ''),
(797, 'R2FB6OJSRDPL5ZQ', 'rHBxVcGo7zZHntY', ''),
(798, 'R2FB6OJSRDPL5ZQ', 'gtQrLrLMLslmeCz', ''),
(799, 'R2FB6OJSRDPL5ZQ', 'qzXfqYxbCbnlOzH', ''),
(800, 'R2FB6OJSRDPL5ZQ', 'CgPDpbS86e8b4KS', ''),
(801, 'R2FB6OJSRDPL5ZQ', 'amynAcLaCDoYu8y', ''),
(802, 'R2FB6OJSRDPL5ZQ', 'bOUuXHOZirWWoU7', ''),
(803, 'R2FB6OJSRDPL5ZQ', '1tWbi2uTnEIslw3', ''),
(804, 'R2FB6OJSRDPL5ZQ', 'GTLiprH4gz1Dji6', ''),
(805, 'R2FB6OJSRDPL5ZQ', 'iQIdD6NIC2pNGfB', ''),
(806, 'R2FB6OJSRDPL5ZQ', '6aIwHHypiXIvFyM', ''),
(807, 'R2FB6OJSRDPL5ZQ', 'L5HKsynI39ynck0', ''),
(808, 'R2FB6OJSRDPL5ZQ', 'kpkFgxI3cz4vWAl', ''),
(809, 'R2FB6OJSRDPL5ZQ', 'DWW9rPB91HsO06w', ''),
(810, 'R2FB6OJSRDPL5ZQ', 'QfljNkiZr6RFXoz', ''),
(811, 'R2FB6OJSRDPL5ZQ', 'TwG3tvLhHt6CCMV', ''),
(812, 'R2FB6OJSRDPL5ZQ', 'v6ISA5gKJXYEdvy', ''),
(813, 'R2FB6OJSRDPL5ZQ', 'dFK8h7HrgwYxwGS', ''),
(814, 'R2FB6OJSRDPL5ZQ', '1rxHBJdRe88FpR9', ''),
(815, 'R2FB6OJSRDPL5ZQ', 'kFt5AKiw1a5AWfh', ''),
(816, 'R2FB6OJSRDPL5ZQ', 'f6qbvaEcN8HfqBR', ''),
(817, 'R2FB6OJSRDPL5ZQ', '1o2D6R7bK7XuACX', ''),
(818, 'R2FB6OJSRDPL5ZQ', 'faoOT9OjGQKWm62', ''),
(819, 'R2FB6OJSRDPL5ZQ', 'QBJSbDdzqAP8lqR', ''),
(820, 'R2FB6OJSRDPL5ZQ', 'OCUO6bcora9fb7C', ''),
(821, 'R2FB6OJSRDPL5ZQ', 'lJ6xG8O1PI3PgZL', ''),
(822, 'R2FB6OJSRDPL5ZQ', 'G7inWZsNR3ygHr4', ''),
(823, 'R2FB6OJSRDPL5ZQ', 'valnPcyRRc5mgCt', ''),
(824, 'R2FB6OJSRDPL5ZQ', 'xXiL3XPQFdM0hQB', ''),
(825, 'R2FB6OJSRDPL5ZQ', 'TdvrPQECmt0M8kL', ''),
(826, 'EF39GHTHKQVHQH3', 'uZ6RC9K2P0KddmD', '12'),
(827, 'EF39GHTHKQVHQH3', 'Mh6CSc4dxSQv8rA', 'Science'),
(828, 'EF39GHTHKQVHQH3', 'ttPonLOQ5olFxLT', '12'),
(829, 'EF39GHTHKQVHQH3', 'FmUBSmr76m2xz5X', '121'),
(830, 'EF39GHTHKQVHQH3', 'zz6xz1GREGGytdm', '12'),
(831, 'EF39GHTHKQVHQH3', 'xspFq7VSEjjmtDl', 'Motivation'),
(832, 'EF39GHTHKQVHQH3', 'EWX5tt1u0AP2Vj5', 'Teaching'),
(833, 'EF39GHTHKQVHQH3', '63qblG4WkRkhS6O', 'Teaching'),
(834, 'EF39GHTHKQVHQH3', 'whVcRluiQnlM2xT', 'Teaching'),
(835, 'EF39GHTHKQVHQH3', 'ggDtBqTc25YbkQc', 'Sarvapalli'),
(836, 'EF39GHTHKQVHQH3', 'bjcZ8ldnszpPQAm', 'Can\'t'),
(837, 'EF39GHTHKQVHQH3', '6OkFFPUS7MuGlZr', 'Can\'t'),
(838, 'EF39GHTHKQVHQH3', 'afQJHCHSjM0HvlH', 'Anubhav'),
(839, 'EF39GHTHKQVHQH3', 'JwzT0wZdeFXrwy3', 'yes'),
(840, 'EF39GHTHKQVHQH3', 'VTR24rPTiZkrRqi', 'y'),
(841, 'EF39GHTHKQVHQH3', 'v0BJ50rG3j57Nn2', 'y'),
(842, 'EF39GHTHKQVHQH3', 'wdfzFVeWpzodVFt', 'y'),
(843, 'EF39GHTHKQVHQH3', 'QdH2D0XPiGayDmP', 'y'),
(844, 'EF39GHTHKQVHQH3', 'pBjt8KPKDpBWmBw', 'y'),
(845, 'EF39GHTHKQVHQH3', 'ECriZTT35USxn5R', 'y'),
(846, 'EF39GHTHKQVHQH3', 'XSKX7edBFtmfIgE', 'y'),
(847, 'EF39GHTHKQVHQH3', 'JeQlinCIw6mrOdX', 'y'),
(848, 'EF39GHTHKQVHQH3', 'RiNoRSrkxMoLATu', 'India'),
(849, 'EF39GHTHKQVHQH3', 'waBexm1Q0yk94u6', 'y'),
(850, 'EF39GHTHKQVHQH3', 'lvwbHPDPw8pwbx7', 'y'),
(851, 'EF39GHTHKQVHQH3', 'MIaqW67Q90KUrVo', 'y'),
(852, 'EF39GHTHKQVHQH3', 'zmfw5HOO5PlbV3O', 'y'),
(853, 'EF39GHTHKQVHQH3', '7HLXcwapKSNuKXj', 'y'),
(854, 'EF39GHTHKQVHQH3', 'glNhKxLWS9Io53j', 'y'),
(855, 'EF39GHTHKQVHQH3', 'cIWZQFGndcpmfTG', 'y'),
(856, 'EF39GHTHKQVHQH3', 'G0yI7EJgXwn1oRm', 'y'),
(857, 'EF39GHTHKQVHQH3', '4bxj19wWvsfbois', 'y'),
(858, 'EF39GHTHKQVHQH3', 'IFCA9yH4FV6GUdF', 'y'),
(859, 'EF39GHTHKQVHQH3', 'UiH8qi0ELf3oX4F', 'y'),
(860, 'EF39GHTHKQVHQH3', 'lUPGM8FhIa5bGWK', 'y'),
(861, 'EF39GHTHKQVHQH3', 'fcwC3Id7tlNUh6X', 'y'),
(862, 'EF39GHTHKQVHQH3', 'TUY1MsskHQ9aBkD', 'y'),
(863, 'EF39GHTHKQVHQH3', 'CEH9W49HvFimIrv', 'y'),
(864, 'EF39GHTHKQVHQH3', '681RmOkeSaSIoY1', 'yy'),
(865, 'EF39GHTHKQVHQH3', 'UvqW8DQrbxgYxIX', 'y'),
(866, 'EF39GHTHKQVHQH3', 'x3Iz5WyK5FOaskf', 'y'),
(867, 'EF39GHTHKQVHQH3', '5I3wG8FlpvbVoi8', 'y'),
(868, 'EF39GHTHKQVHQH3', 'RZ2GqUmHwZpK8RQ', 'y'),
(869, 'EF39GHTHKQVHQH3', 't5fQ7jlIBf2E8mB', 'y'),
(870, 'EF39GHTHKQVHQH3', 'Ad9T9xdRz1FJaV5', 'yy'),
(871, 'EF39GHTHKQVHQH3', 'iIvmn9MtsK9TRx0', 'y'),
(872, 'EF39GHTHKQVHQH3', 'rHBxVcGo7zZHntY', 'y'),
(873, 'EF39GHTHKQVHQH3', 'gtQrLrLMLslmeCz', 'y'),
(874, 'EF39GHTHKQVHQH3', 'qzXfqYxbCbnlOzH', 'yy'),
(875, 'EF39GHTHKQVHQH3', 'CgPDpbS86e8b4KS', 'y'),
(876, 'EF39GHTHKQVHQH3', 'amynAcLaCDoYu8y', 'y'),
(877, 'EF39GHTHKQVHQH3', 'bOUuXHOZirWWoU7', 'y'),
(878, 'EF39GHTHKQVHQH3', '1tWbi2uTnEIslw3', 'y'),
(879, 'EF39GHTHKQVHQH3', 'GTLiprH4gz1Dji6', 'y'),
(880, 'EF39GHTHKQVHQH3', 'iQIdD6NIC2pNGfB', 'y'),
(881, 'EF39GHTHKQVHQH3', '6aIwHHypiXIvFyM', 'y'),
(882, 'EF39GHTHKQVHQH3', 'L5HKsynI39ynck0', 'y'),
(883, 'EF39GHTHKQVHQH3', 'kpkFgxI3cz4vWAl', 'y'),
(884, 'EF39GHTHKQVHQH3', 'DWW9rPB91HsO06w', 'y'),
(885, 'EF39GHTHKQVHQH3', 'QfljNkiZr6RFXoz', 'y'),
(886, 'EF39GHTHKQVHQH3', 'TwG3tvLhHt6CCMV', 'yy'),
(887, 'EF39GHTHKQVHQH3', 'v6ISA5gKJXYEdvy', 'y'),
(888, 'EF39GHTHKQVHQH3', 'dFK8h7HrgwYxwGS', 'y'),
(889, 'EF39GHTHKQVHQH3', '1rxHBJdRe88FpR9', 'Lecturers'),
(890, 'EF39GHTHKQVHQH3', 'kFt5AKiw1a5AWfh', 'Lecturers'),
(891, 'EF39GHTHKQVHQH3', 'f6qbvaEcN8HfqBR', 'y'),
(892, 'EF39GHTHKQVHQH3', '1o2D6R7bK7XuACX', 'y'),
(893, 'EF39GHTHKQVHQH3', 'faoOT9OjGQKWm62', 'y'),
(894, 'EF39GHTHKQVHQH3', 'QBJSbDdzqAP8lqR', 'y'),
(895, 'EF39GHTHKQVHQH3', 'OCUO6bcora9fb7C', 'YES'),
(896, 'EF39GHTHKQVHQH3', 'lJ6xG8O1PI3PgZL', 'YES'),
(897, 'EF39GHTHKQVHQH3', 'G7inWZsNR3ygHr4', 'YES'),
(898, 'EF39GHTHKQVHQH3', 'valnPcyRRc5mgCt', 'YES'),
(899, 'EF39GHTHKQVHQH3', 'xXiL3XPQFdM0hQB', 'YES'),
(900, 'EF39GHTHKQVHQH3', 'TdvrPQECmt0M8kL', 'YES'),
(901, '9PI29HP9V9TIE24', 'uZ6RC9K2P0KddmD', ''),
(902, '9PI29HP9V9TIE24', 'Mh6CSc4dxSQv8rA', ''),
(903, '9PI29HP9V9TIE24', 'ttPonLOQ5olFxLT', ''),
(904, '9PI29HP9V9TIE24', 'FmUBSmr76m2xz5X', ''),
(905, '9PI29HP9V9TIE24', 'zz6xz1GREGGytdm', ''),
(906, '9PI29HP9V9TIE24', 'xspFq7VSEjjmtDl', ''),
(907, '9PI29HP9V9TIE24', 'EWX5tt1u0AP2Vj5', ''),
(908, '9PI29HP9V9TIE24', '63qblG4WkRkhS6O', ''),
(909, '9PI29HP9V9TIE24', 'whVcRluiQnlM2xT', ''),
(910, '9PI29HP9V9TIE24', 'ggDtBqTc25YbkQc', ''),
(911, '9PI29HP9V9TIE24', 'bjcZ8ldnszpPQAm', ''),
(912, '9PI29HP9V9TIE24', '6OkFFPUS7MuGlZr', ''),
(913, '9PI29HP9V9TIE24', 'afQJHCHSjM0HvlH', ''),
(914, '9PI29HP9V9TIE24', 'JwzT0wZdeFXrwy3', ''),
(915, '9PI29HP9V9TIE24', 'VTR24rPTiZkrRqi', ''),
(916, '9PI29HP9V9TIE24', 'v0BJ50rG3j57Nn2', ''),
(917, '9PI29HP9V9TIE24', 'wdfzFVeWpzodVFt', ''),
(918, '9PI29HP9V9TIE24', 'QdH2D0XPiGayDmP', ''),
(919, '9PI29HP9V9TIE24', 'pBjt8KPKDpBWmBw', ''),
(920, '9PI29HP9V9TIE24', 'ECriZTT35USxn5R', ''),
(921, '9PI29HP9V9TIE24', 'XSKX7edBFtmfIgE', ''),
(922, '9PI29HP9V9TIE24', 'JeQlinCIw6mrOdX', ''),
(923, '9PI29HP9V9TIE24', 'RiNoRSrkxMoLATu', ''),
(924, '9PI29HP9V9TIE24', 'waBexm1Q0yk94u6', ''),
(925, '9PI29HP9V9TIE24', 'lvwbHPDPw8pwbx7', ''),
(926, '9PI29HP9V9TIE24', 'MIaqW67Q90KUrVo', ''),
(927, '9PI29HP9V9TIE24', 'zmfw5HOO5PlbV3O', ''),
(928, '9PI29HP9V9TIE24', '7HLXcwapKSNuKXj', ''),
(929, '9PI29HP9V9TIE24', 'glNhKxLWS9Io53j', ''),
(930, '9PI29HP9V9TIE24', 'cIWZQFGndcpmfTG', ''),
(931, '9PI29HP9V9TIE24', 'G0yI7EJgXwn1oRm', ''),
(932, '9PI29HP9V9TIE24', '4bxj19wWvsfbois', ''),
(933, '9PI29HP9V9TIE24', 'IFCA9yH4FV6GUdF', ''),
(934, '9PI29HP9V9TIE24', 'UiH8qi0ELf3oX4F', ''),
(935, '9PI29HP9V9TIE24', 'lUPGM8FhIa5bGWK', ''),
(936, '9PI29HP9V9TIE24', 'fcwC3Id7tlNUh6X', ''),
(937, '9PI29HP9V9TIE24', 'TUY1MsskHQ9aBkD', ''),
(938, '9PI29HP9V9TIE24', 'CEH9W49HvFimIrv', ''),
(939, '9PI29HP9V9TIE24', '681RmOkeSaSIoY1', ''),
(940, '9PI29HP9V9TIE24', 'UvqW8DQrbxgYxIX', ''),
(941, '9PI29HP9V9TIE24', 'x3Iz5WyK5FOaskf', ''),
(942, '9PI29HP9V9TIE24', '5I3wG8FlpvbVoi8', ''),
(943, '9PI29HP9V9TIE24', 'RZ2GqUmHwZpK8RQ', ''),
(944, '9PI29HP9V9TIE24', 't5fQ7jlIBf2E8mB', ''),
(945, '9PI29HP9V9TIE24', 'Ad9T9xdRz1FJaV5', ''),
(946, '9PI29HP9V9TIE24', 'iIvmn9MtsK9TRx0', ''),
(947, '9PI29HP9V9TIE24', 'rHBxVcGo7zZHntY', ''),
(948, '9PI29HP9V9TIE24', 'gtQrLrLMLslmeCz', ''),
(949, '9PI29HP9V9TIE24', 'qzXfqYxbCbnlOzH', ''),
(950, '9PI29HP9V9TIE24', 'CgPDpbS86e8b4KS', ''),
(951, '9PI29HP9V9TIE24', 'amynAcLaCDoYu8y', ''),
(952, '9PI29HP9V9TIE24', 'bOUuXHOZirWWoU7', ''),
(953, '9PI29HP9V9TIE24', '1tWbi2uTnEIslw3', ''),
(954, '9PI29HP9V9TIE24', 'GTLiprH4gz1Dji6', ''),
(955, '9PI29HP9V9TIE24', 'iQIdD6NIC2pNGfB', ''),
(956, '9PI29HP9V9TIE24', '6aIwHHypiXIvFyM', ''),
(957, '9PI29HP9V9TIE24', 'L5HKsynI39ynck0', ''),
(958, '9PI29HP9V9TIE24', 'kpkFgxI3cz4vWAl', ''),
(959, '9PI29HP9V9TIE24', 'DWW9rPB91HsO06w', ''),
(960, '9PI29HP9V9TIE24', 'QfljNkiZr6RFXoz', ''),
(961, '9PI29HP9V9TIE24', 'TwG3tvLhHt6CCMV', ''),
(962, '9PI29HP9V9TIE24', 'v6ISA5gKJXYEdvy', ''),
(963, '9PI29HP9V9TIE24', 'dFK8h7HrgwYxwGS', ''),
(964, '9PI29HP9V9TIE24', '1rxHBJdRe88FpR9', ''),
(965, '9PI29HP9V9TIE24', 'kFt5AKiw1a5AWfh', ''),
(966, '9PI29HP9V9TIE24', 'f6qbvaEcN8HfqBR', ''),
(967, '9PI29HP9V9TIE24', '1o2D6R7bK7XuACX', ''),
(968, '9PI29HP9V9TIE24', 'faoOT9OjGQKWm62', ''),
(969, '9PI29HP9V9TIE24', 'QBJSbDdzqAP8lqR', ''),
(970, '9PI29HP9V9TIE24', 'OCUO6bcora9fb7C', ''),
(971, '9PI29HP9V9TIE24', 'lJ6xG8O1PI3PgZL', ''),
(972, '9PI29HP9V9TIE24', 'G7inWZsNR3ygHr4', ''),
(973, '9PI29HP9V9TIE24', 'valnPcyRRc5mgCt', ''),
(974, '9PI29HP9V9TIE24', 'xXiL3XPQFdM0hQB', ''),
(975, '9PI29HP9V9TIE24', 'TdvrPQECmt0M8kL', ''),
(976, 'KLEN8E7OJ4VD62T', 'uZ6RC9K2P0KddmD', '12'),
(977, 'KLEN8E7OJ4VD62T', 'Mh6CSc4dxSQv8rA', 'Computer'),
(978, 'KLEN8E7OJ4VD62T', 'ttPonLOQ5olFxLT', '12'),
(979, 'KLEN8E7OJ4VD62T', 'FmUBSmr76m2xz5X', '12'),
(980, 'KLEN8E7OJ4VD62T', 'zz6xz1GREGGytdm', '12'),
(981, 'KLEN8E7OJ4VD62T', 'xspFq7VSEjjmtDl', 'yYyY'),
(982, 'KLEN8E7OJ4VD62T', 'EWX5tt1u0AP2Vj5', 'y'),
(983, 'KLEN8E7OJ4VD62T', '63qblG4WkRkhS6O', 'y'),
(984, 'KLEN8E7OJ4VD62T', 'whVcRluiQnlM2xT', 'y'),
(985, 'KLEN8E7OJ4VD62T', 'ggDtBqTc25YbkQc', 'yyyy'),
(986, 'KLEN8E7OJ4VD62T', 'bjcZ8ldnszpPQAm', 'y'),
(987, 'KLEN8E7OJ4VD62T', '6OkFFPUS7MuGlZr', 'y'),
(988, 'KLEN8E7OJ4VD62T', 'afQJHCHSjM0HvlH', 'y'),
(989, 'KLEN8E7OJ4VD62T', 'JwzT0wZdeFXrwy3', 'y'),
(990, 'KLEN8E7OJ4VD62T', 'VTR24rPTiZkrRqi', 'yy'),
(991, 'KLEN8E7OJ4VD62T', 'v0BJ50rG3j57Nn2', 'y'),
(992, 'KLEN8E7OJ4VD62T', 'wdfzFVeWpzodVFt', 'y'),
(993, 'KLEN8E7OJ4VD62T', 'QdH2D0XPiGayDmP', 'y'),
(994, 'KLEN8E7OJ4VD62T', 'pBjt8KPKDpBWmBw', 'y'),
(995, 'KLEN8E7OJ4VD62T', 'ECriZTT35USxn5R', 'yy'),
(996, 'KLEN8E7OJ4VD62T', 'XSKX7edBFtmfIgE', 'y'),
(997, 'KLEN8E7OJ4VD62T', 'JeQlinCIw6mrOdX', 'y'),
(998, 'KLEN8E7OJ4VD62T', 'RiNoRSrkxMoLATu', 'y'),
(999, 'KLEN8E7OJ4VD62T', 'waBexm1Q0yk94u6', 'yy'),
(1000, 'KLEN8E7OJ4VD62T', 'lvwbHPDPw8pwbx7', 'y'),
(1001, 'KLEN8E7OJ4VD62T', 'MIaqW67Q90KUrVo', 'y'),
(1002, 'KLEN8E7OJ4VD62T', 'zmfw5HOO5PlbV3O', 'y'),
(1003, 'KLEN8E7OJ4VD62T', '7HLXcwapKSNuKXj', 'yy'),
(1004, 'KLEN8E7OJ4VD62T', 'glNhKxLWS9Io53j', 'y'),
(1005, 'KLEN8E7OJ4VD62T', 'cIWZQFGndcpmfTG', 'y'),
(1006, 'KLEN8E7OJ4VD62T', 'G0yI7EJgXwn1oRm', 'y'),
(1007, 'KLEN8E7OJ4VD62T', '4bxj19wWvsfbois', 'y'),
(1008, 'KLEN8E7OJ4VD62T', 'IFCA9yH4FV6GUdF', 'yy'),
(1009, 'KLEN8E7OJ4VD62T', 'UiH8qi0ELf3oX4F', 'yy'),
(1010, 'KLEN8E7OJ4VD62T', 'lUPGM8FhIa5bGWK', 'y'),
(1011, 'KLEN8E7OJ4VD62T', 'fcwC3Id7tlNUh6X', 'y'),
(1012, 'KLEN8E7OJ4VD62T', 'TUY1MsskHQ9aBkD', 'y'),
(1013, 'KLEN8E7OJ4VD62T', 'CEH9W49HvFimIrv', 'yy'),
(1014, 'KLEN8E7OJ4VD62T', '681RmOkeSaSIoY1', 'y'),
(1015, 'KLEN8E7OJ4VD62T', 'UvqW8DQrbxgYxIX', 'y'),
(1016, 'KLEN8E7OJ4VD62T', 'x3Iz5WyK5FOaskf', 'y'),
(1017, 'KLEN8E7OJ4VD62T', '5I3wG8FlpvbVoi8', 'y'),
(1018, 'KLEN8E7OJ4VD62T', 'RZ2GqUmHwZpK8RQ', 'y'),
(1019, 'KLEN8E7OJ4VD62T', 't5fQ7jlIBf2E8mB', 'y'),
(1020, 'KLEN8E7OJ4VD62T', 'Ad9T9xdRz1FJaV5', 'y'),
(1021, 'KLEN8E7OJ4VD62T', 'iIvmn9MtsK9TRx0', 'yy'),
(1022, 'KLEN8E7OJ4VD62T', 'rHBxVcGo7zZHntY', 'y'),
(1023, 'KLEN8E7OJ4VD62T', 'gtQrLrLMLslmeCz', 'y'),
(1024, 'KLEN8E7OJ4VD62T', 'qzXfqYxbCbnlOzH', 'y'),
(1025, 'KLEN8E7OJ4VD62T', 'CgPDpbS86e8b4KS', 'y'),
(1026, 'KLEN8E7OJ4VD62T', 'amynAcLaCDoYu8y', 'y'),
(1027, 'KLEN8E7OJ4VD62T', 'bOUuXHOZirWWoU7', 'y'),
(1028, 'KLEN8E7OJ4VD62T', '1tWbi2uTnEIslw3', 'yy'),
(1029, 'KLEN8E7OJ4VD62T', 'GTLiprH4gz1Dji6', 'y'),
(1030, 'KLEN8E7OJ4VD62T', 'iQIdD6NIC2pNGfB', 'y'),
(1031, 'KLEN8E7OJ4VD62T', '6aIwHHypiXIvFyM', 'y'),
(1032, 'KLEN8E7OJ4VD62T', 'L5HKsynI39ynck0', 'y'),
(1033, 'KLEN8E7OJ4VD62T', 'kpkFgxI3cz4vWAl', 'y'),
(1034, 'KLEN8E7OJ4VD62T', 'DWW9rPB91HsO06w', 'yy'),
(1035, 'KLEN8E7OJ4VD62T', 'QfljNkiZr6RFXoz', 'y'),
(1036, 'KLEN8E7OJ4VD62T', 'TwG3tvLhHt6CCMV', 'y'),
(1037, 'KLEN8E7OJ4VD62T', 'v6ISA5gKJXYEdvy', 'y'),
(1038, 'KLEN8E7OJ4VD62T', 'dFK8h7HrgwYxwGS', 'y'),
(1039, 'KLEN8E7OJ4VD62T', '1rxHBJdRe88FpR9', 'Teachers'),
(1040, 'KLEN8E7OJ4VD62T', 'kFt5AKiw1a5AWfh', 'Teachers'),
(1041, 'KLEN8E7OJ4VD62T', 'f6qbvaEcN8HfqBR', 'y'),
(1042, 'KLEN8E7OJ4VD62T', '1o2D6R7bK7XuACX', 'y'),
(1043, 'KLEN8E7OJ4VD62T', 'faoOT9OjGQKWm62', 'y'),
(1044, 'KLEN8E7OJ4VD62T', 'QBJSbDdzqAP8lqR', 'y'),
(1045, 'KLEN8E7OJ4VD62T', 'OCUO6bcora9fb7C', 'YES'),
(1046, 'KLEN8E7OJ4VD62T', 'lJ6xG8O1PI3PgZL', 'YES'),
(1047, 'KLEN8E7OJ4VD62T', 'G7inWZsNR3ygHr4', 'YES'),
(1048, 'KLEN8E7OJ4VD62T', 'valnPcyRRc5mgCt', 'YES'),
(1049, 'KLEN8E7OJ4VD62T', 'xXiL3XPQFdM0hQB', 'YES'),
(1050, 'KLEN8E7OJ4VD62T', 'TdvrPQECmt0M8kL', 'YES'),
(1051, 'W6MLNJU788JYXW4', 'uZ6RC9K2P0KddmD', ''),
(1052, 'W6MLNJU788JYXW4', 'Mh6CSc4dxSQv8rA', ''),
(1053, 'W6MLNJU788JYXW4', 'ttPonLOQ5olFxLT', ''),
(1054, 'W6MLNJU788JYXW4', 'FmUBSmr76m2xz5X', ''),
(1055, 'W6MLNJU788JYXW4', 'zz6xz1GREGGytdm', ''),
(1056, 'W6MLNJU788JYXW4', 'xspFq7VSEjjmtDl', ''),
(1057, 'W6MLNJU788JYXW4', 'EWX5tt1u0AP2Vj5', ''),
(1058, 'W6MLNJU788JYXW4', '63qblG4WkRkhS6O', ''),
(1059, 'W6MLNJU788JYXW4', 'whVcRluiQnlM2xT', ''),
(1060, 'W6MLNJU788JYXW4', 'ggDtBqTc25YbkQc', ''),
(1061, 'W6MLNJU788JYXW4', 'bjcZ8ldnszpPQAm', ''),
(1062, 'W6MLNJU788JYXW4', '6OkFFPUS7MuGlZr', ''),
(1063, 'W6MLNJU788JYXW4', 'afQJHCHSjM0HvlH', ''),
(1064, 'W6MLNJU788JYXW4', 'JwzT0wZdeFXrwy3', ''),
(1065, 'W6MLNJU788JYXW4', 'VTR24rPTiZkrRqi', ''),
(1066, 'W6MLNJU788JYXW4', 'v0BJ50rG3j57Nn2', ''),
(1067, 'W6MLNJU788JYXW4', 'wdfzFVeWpzodVFt', ''),
(1068, 'W6MLNJU788JYXW4', 'QdH2D0XPiGayDmP', ''),
(1069, 'W6MLNJU788JYXW4', 'pBjt8KPKDpBWmBw', ''),
(1070, 'W6MLNJU788JYXW4', 'ECriZTT35USxn5R', ''),
(1071, 'W6MLNJU788JYXW4', 'XSKX7edBFtmfIgE', ''),
(1072, 'W6MLNJU788JYXW4', 'JeQlinCIw6mrOdX', ''),
(1073, 'W6MLNJU788JYXW4', 'RiNoRSrkxMoLATu', ''),
(1074, 'W6MLNJU788JYXW4', 'waBexm1Q0yk94u6', ''),
(1075, 'W6MLNJU788JYXW4', 'lvwbHPDPw8pwbx7', ''),
(1076, 'W6MLNJU788JYXW4', 'MIaqW67Q90KUrVo', ''),
(1077, 'W6MLNJU788JYXW4', 'zmfw5HOO5PlbV3O', ''),
(1078, 'W6MLNJU788JYXW4', '7HLXcwapKSNuKXj', ''),
(1079, 'W6MLNJU788JYXW4', 'glNhKxLWS9Io53j', ''),
(1080, 'W6MLNJU788JYXW4', 'cIWZQFGndcpmfTG', ''),
(1081, 'W6MLNJU788JYXW4', 'G0yI7EJgXwn1oRm', ''),
(1082, 'W6MLNJU788JYXW4', '4bxj19wWvsfbois', ''),
(1083, 'W6MLNJU788JYXW4', 'IFCA9yH4FV6GUdF', ''),
(1084, 'W6MLNJU788JYXW4', 'UiH8qi0ELf3oX4F', ''),
(1085, 'W6MLNJU788JYXW4', 'lUPGM8FhIa5bGWK', ''),
(1086, 'W6MLNJU788JYXW4', 'fcwC3Id7tlNUh6X', ''),
(1087, 'W6MLNJU788JYXW4', 'TUY1MsskHQ9aBkD', ''),
(1088, 'W6MLNJU788JYXW4', 'CEH9W49HvFimIrv', ''),
(1089, 'W6MLNJU788JYXW4', '681RmOkeSaSIoY1', ''),
(1090, 'W6MLNJU788JYXW4', 'UvqW8DQrbxgYxIX', ''),
(1091, 'W6MLNJU788JYXW4', 'x3Iz5WyK5FOaskf', ''),
(1092, 'W6MLNJU788JYXW4', '5I3wG8FlpvbVoi8', ''),
(1093, 'W6MLNJU788JYXW4', 'RZ2GqUmHwZpK8RQ', ''),
(1094, 'W6MLNJU788JYXW4', 't5fQ7jlIBf2E8mB', ''),
(1095, 'W6MLNJU788JYXW4', 'Ad9T9xdRz1FJaV5', ''),
(1096, 'W6MLNJU788JYXW4', 'iIvmn9MtsK9TRx0', ''),
(1097, 'W6MLNJU788JYXW4', 'rHBxVcGo7zZHntY', ''),
(1098, 'W6MLNJU788JYXW4', 'gtQrLrLMLslmeCz', ''),
(1099, 'W6MLNJU788JYXW4', 'qzXfqYxbCbnlOzH', ''),
(1100, 'W6MLNJU788JYXW4', 'CgPDpbS86e8b4KS', ''),
(1101, 'W6MLNJU788JYXW4', 'amynAcLaCDoYu8y', ''),
(1102, 'W6MLNJU788JYXW4', 'bOUuXHOZirWWoU7', ''),
(1103, 'W6MLNJU788JYXW4', '1tWbi2uTnEIslw3', ''),
(1104, 'W6MLNJU788JYXW4', 'GTLiprH4gz1Dji6', ''),
(1105, 'W6MLNJU788JYXW4', 'iQIdD6NIC2pNGfB', ''),
(1106, 'W6MLNJU788JYXW4', '6aIwHHypiXIvFyM', ''),
(1107, 'W6MLNJU788JYXW4', 'L5HKsynI39ynck0', ''),
(1108, 'W6MLNJU788JYXW4', 'kpkFgxI3cz4vWAl', ''),
(1109, 'W6MLNJU788JYXW4', 'DWW9rPB91HsO06w', ''),
(1110, 'W6MLNJU788JYXW4', 'QfljNkiZr6RFXoz', ''),
(1111, 'W6MLNJU788JYXW4', 'TwG3tvLhHt6CCMV', ''),
(1112, 'W6MLNJU788JYXW4', 'v6ISA5gKJXYEdvy', ''),
(1113, 'W6MLNJU788JYXW4', 'dFK8h7HrgwYxwGS', ''),
(1114, 'W6MLNJU788JYXW4', '1rxHBJdRe88FpR9', ''),
(1115, 'W6MLNJU788JYXW4', 'kFt5AKiw1a5AWfh', ''),
(1116, 'W6MLNJU788JYXW4', 'f6qbvaEcN8HfqBR', ''),
(1117, 'W6MLNJU788JYXW4', '1o2D6R7bK7XuACX', ''),
(1118, 'W6MLNJU788JYXW4', 'faoOT9OjGQKWm62', ''),
(1119, 'W6MLNJU788JYXW4', 'QBJSbDdzqAP8lqR', ''),
(1120, 'W6MLNJU788JYXW4', 'OCUO6bcora9fb7C', ''),
(1121, 'W6MLNJU788JYXW4', 'lJ6xG8O1PI3PgZL', ''),
(1122, 'W6MLNJU788JYXW4', 'G7inWZsNR3ygHr4', ''),
(1123, 'W6MLNJU788JYXW4', 'valnPcyRRc5mgCt', ''),
(1124, 'W6MLNJU788JYXW4', 'xXiL3XPQFdM0hQB', ''),
(1125, 'W6MLNJU788JYXW4', 'TdvrPQECmt0M8kL', ''),
(1126, 'Z937FW9IP9RMN71', 'uZ6RC9K2P0KddmD', ''),
(1127, 'Z937FW9IP9RMN71', 'Mh6CSc4dxSQv8rA', ''),
(1128, 'Z937FW9IP9RMN71', 'ttPonLOQ5olFxLT', ''),
(1129, 'Z937FW9IP9RMN71', 'FmUBSmr76m2xz5X', ''),
(1130, 'Z937FW9IP9RMN71', 'zz6xz1GREGGytdm', ''),
(1131, 'Z937FW9IP9RMN71', 'xspFq7VSEjjmtDl', ''),
(1132, 'Z937FW9IP9RMN71', 'EWX5tt1u0AP2Vj5', ''),
(1133, 'Z937FW9IP9RMN71', '63qblG4WkRkhS6O', ''),
(1134, 'Z937FW9IP9RMN71', 'whVcRluiQnlM2xT', ''),
(1135, 'Z937FW9IP9RMN71', 'ggDtBqTc25YbkQc', ''),
(1136, 'Z937FW9IP9RMN71', 'bjcZ8ldnszpPQAm', ''),
(1137, 'Z937FW9IP9RMN71', '6OkFFPUS7MuGlZr', ''),
(1138, 'Z937FW9IP9RMN71', 'afQJHCHSjM0HvlH', ''),
(1139, 'Z937FW9IP9RMN71', 'JwzT0wZdeFXrwy3', ''),
(1140, 'Z937FW9IP9RMN71', 'VTR24rPTiZkrRqi', ''),
(1141, 'Z937FW9IP9RMN71', 'v0BJ50rG3j57Nn2', ''),
(1142, 'Z937FW9IP9RMN71', 'wdfzFVeWpzodVFt', ''),
(1143, 'Z937FW9IP9RMN71', 'QdH2D0XPiGayDmP', ''),
(1144, 'Z937FW9IP9RMN71', 'pBjt8KPKDpBWmBw', ''),
(1145, 'Z937FW9IP9RMN71', 'ECriZTT35USxn5R', ''),
(1146, 'Z937FW9IP9RMN71', 'XSKX7edBFtmfIgE', ''),
(1147, 'Z937FW9IP9RMN71', 'JeQlinCIw6mrOdX', ''),
(1148, 'Z937FW9IP9RMN71', 'RiNoRSrkxMoLATu', ''),
(1149, 'Z937FW9IP9RMN71', 'waBexm1Q0yk94u6', ''),
(1150, 'Z937FW9IP9RMN71', 'lvwbHPDPw8pwbx7', ''),
(1151, 'Z937FW9IP9RMN71', 'MIaqW67Q90KUrVo', ''),
(1152, 'Z937FW9IP9RMN71', 'zmfw5HOO5PlbV3O', ''),
(1153, 'Z937FW9IP9RMN71', '7HLXcwapKSNuKXj', ''),
(1154, 'Z937FW9IP9RMN71', 'glNhKxLWS9Io53j', ''),
(1155, 'Z937FW9IP9RMN71', 'cIWZQFGndcpmfTG', ''),
(1156, 'Z937FW9IP9RMN71', 'G0yI7EJgXwn1oRm', ''),
(1157, 'Z937FW9IP9RMN71', '4bxj19wWvsfbois', ''),
(1158, 'Z937FW9IP9RMN71', 'IFCA9yH4FV6GUdF', ''),
(1159, 'Z937FW9IP9RMN71', 'UiH8qi0ELf3oX4F', ''),
(1160, 'Z937FW9IP9RMN71', 'lUPGM8FhIa5bGWK', ''),
(1161, 'Z937FW9IP9RMN71', 'fcwC3Id7tlNUh6X', ''),
(1162, 'Z937FW9IP9RMN71', 'TUY1MsskHQ9aBkD', ''),
(1163, 'Z937FW9IP9RMN71', 'CEH9W49HvFimIrv', ''),
(1164, 'Z937FW9IP9RMN71', '681RmOkeSaSIoY1', ''),
(1165, 'Z937FW9IP9RMN71', 'UvqW8DQrbxgYxIX', ''),
(1166, 'Z937FW9IP9RMN71', 'x3Iz5WyK5FOaskf', ''),
(1167, 'Z937FW9IP9RMN71', '5I3wG8FlpvbVoi8', ''),
(1168, 'Z937FW9IP9RMN71', 'RZ2GqUmHwZpK8RQ', ''),
(1169, 'Z937FW9IP9RMN71', 't5fQ7jlIBf2E8mB', ''),
(1170, 'Z937FW9IP9RMN71', 'Ad9T9xdRz1FJaV5', ''),
(1171, 'Z937FW9IP9RMN71', 'iIvmn9MtsK9TRx0', ''),
(1172, 'Z937FW9IP9RMN71', 'rHBxVcGo7zZHntY', ''),
(1173, 'Z937FW9IP9RMN71', 'gtQrLrLMLslmeCz', ''),
(1174, 'Z937FW9IP9RMN71', 'qzXfqYxbCbnlOzH', ''),
(1175, 'Z937FW9IP9RMN71', 'CgPDpbS86e8b4KS', ''),
(1176, 'Z937FW9IP9RMN71', 'amynAcLaCDoYu8y', ''),
(1177, 'Z937FW9IP9RMN71', 'bOUuXHOZirWWoU7', ''),
(1178, 'Z937FW9IP9RMN71', '1tWbi2uTnEIslw3', ''),
(1179, 'Z937FW9IP9RMN71', 'GTLiprH4gz1Dji6', ''),
(1180, 'Z937FW9IP9RMN71', 'iQIdD6NIC2pNGfB', ''),
(1181, 'Z937FW9IP9RMN71', '6aIwHHypiXIvFyM', ''),
(1182, 'Z937FW9IP9RMN71', 'L5HKsynI39ynck0', ''),
(1183, 'Z937FW9IP9RMN71', 'kpkFgxI3cz4vWAl', ''),
(1184, 'Z937FW9IP9RMN71', 'DWW9rPB91HsO06w', ''),
(1185, 'Z937FW9IP9RMN71', 'QfljNkiZr6RFXoz', ''),
(1186, 'Z937FW9IP9RMN71', 'TwG3tvLhHt6CCMV', ''),
(1187, 'Z937FW9IP9RMN71', 'v6ISA5gKJXYEdvy', ''),
(1188, 'Z937FW9IP9RMN71', 'dFK8h7HrgwYxwGS', ''),
(1189, 'Z937FW9IP9RMN71', '1rxHBJdRe88FpR9', ''),
(1190, 'Z937FW9IP9RMN71', 'kFt5AKiw1a5AWfh', ''),
(1191, 'Z937FW9IP9RMN71', 'f6qbvaEcN8HfqBR', ''),
(1192, 'Z937FW9IP9RMN71', '1o2D6R7bK7XuACX', ''),
(1193, 'Z937FW9IP9RMN71', 'faoOT9OjGQKWm62', ''),
(1194, 'Z937FW9IP9RMN71', 'QBJSbDdzqAP8lqR', ''),
(1195, 'Z937FW9IP9RMN71', 'OCUO6bcora9fb7C', ''),
(1196, 'Z937FW9IP9RMN71', 'lJ6xG8O1PI3PgZL', ''),
(1197, 'Z937FW9IP9RMN71', 'G7inWZsNR3ygHr4', ''),
(1198, 'Z937FW9IP9RMN71', 'valnPcyRRc5mgCt', ''),
(1199, 'Z937FW9IP9RMN71', 'xXiL3XPQFdM0hQB', ''),
(1200, 'Z937FW9IP9RMN71', 'TdvrPQECmt0M8kL', '');

-- --------------------------------------------------------

--
-- Table structure for table `assessment_questions_code`
--

CREATE TABLE `assessment_questions_code` (
  `id` int(11) NOT NULL,
  `question_code` varchar(128) NOT NULL,
  `question_type` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `assessment_questions_options`
--

CREATE TABLE `assessment_questions_options` (
  `id` int(11) NOT NULL,
  `question_code` varchar(128) NOT NULL,
  `question_option_code` varchar(128) NOT NULL,
  `question_option_title` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `assessment_questions_options`
--

INSERT INTO `assessment_questions_options` (`id`, `question_code`, `question_option_code`, `question_option_title`) VALUES
(2, 'rEmTvxXBmsaVLlc', 'O0TFXNJAMNGKM0Y', 'B'),
(3, 'rEmTvxXBmsaVLlc', 'ROS4U23X5O84GIQ', 'C'),
(4, 'yyzKCAdtXyAzsvU', 'OIG44M3YT53MCKI', 'A'),
(5, 'yyzKCAdtXyAzsvU', 'D9RD978E3WEXIS3', 'B'),
(6, 'yyzKCAdtXyAzsvU', '554PU5DIUW7VQHH', 'C'),
(7, '6MEUBHvrqAnAtem', '32ZPS2JULPBZSV9', 'a'),
(8, '6MEUBHvrqAnAtem', 'TDY3JKTO8QCMI4W', 'b'),
(9, '6MEUBHvrqAnAtem', 'JJPPDMPJP6HQTXY', 'c'),
(10, 'EIaAOPcvRtFBvAe', 'I7B7C24WTUDQEPQ', 'a'),
(12, 'EIaAOPcvRtFBvAe', '4YWGV6Y0BI1O8KD', 'c'),
(13, 'SV7KBest4VMQu3m', 'EQVPEDLOERZN6UN', 'a'),
(14, 'SV7KBest4VMQu3m', 'D6AWUGXRHK5P9O3', 'b'),
(17, 'UDZcsuhktbAczjz', 'd43q5f43251', 'A'),
(18, 'BPlJ1183DFYqpEN', 'E4OFU3P90XMHAIC', 'A'),
(19, 'BPlJ1183DFYqpEN', 'WVO91D0XK102F55', 'B'),
(20, 'BPlJ1183DFYqpEN', 'Z6K7EI0L1BUY1DJ', 'C'),
(21, 'rEmTvxXBmsaVLlc', 'KA6LQ1QQBZJULON', 'A'),
(22, 'EIaAOPcvRtFBvAe', 'LEXN7BOP2803C6M', 'd'),
(23, 'SV7KBest4VMQu3m', 'QO0AAG6N8DO7XI3', 'f'),
(25, 'UDZcsuhktbAczjz', 'R84FLE0AX8NXL51', 'B'),
(29, 'yyzKCAdtXyAzsvU', 'VYV52XZ49KR8GYQ', 'D'),
(53, '1rxHBJdRe88FpR9', 'V6IUS3PO0JBDSFF', 'Teachers'),
(54, '1rxHBJdRe88FpR9', 'OPZUEZ7SBUL50LA', 'Lecturers'),
(55, '1rxHBJdRe88FpR9', '0CXIBRVEM4XYGQ7', 'Professors'),
(56, '1rxHBJdRe88FpR9', 'N7PJQN9ZPZ0JK91', 'Faculty'),
(57, '1rxHBJdRe88FpR9', 'VRFWO1GX835Y3IF', 'Coach'),
(58, '1rxHBJdRe88FpR9', 'QHVV77JFURHXMNE', 'Trainer'),
(59, '1rxHBJdRe88FpR9', 'Y639C3TP6FVTVR8', 'Tutor'),
(60, '1rxHBJdRe88FpR9', 'FHEF9DQ8L177RJY', 'Others'),
(67, 'kFt5AKiw1a5AWfh', 'C89I79UE5BQJQMQ', 'Teachers'),
(68, 'kFt5AKiw1a5AWfh', 'FZ7M0CCI3T7JKC3', 'Lecturers'),
(69, 'kFt5AKiw1a5AWfh', '9JBX6E5SI9MYRXM', 'Professors'),
(70, 'kFt5AKiw1a5AWfh', 'MXV6678BOIUJCN2', 'Faculty'),
(71, 'kFt5AKiw1a5AWfh', '5HXJ1PNSOKXUBKQ', 'Coach'),
(72, 'kFt5AKiw1a5AWfh', 'LOVTATNXIO89V8U', 'Trainer'),
(73, 'kFt5AKiw1a5AWfh', 'ZN5MXBPBYJFBES6', 'Tutor'),
(74, 'kFt5AKiw1a5AWfh', '2MCEYA7PZ90IPT5', 'others'),
(93, 'v54YBQySC3vXEve', '3W9133V0R2EUMSU', 'Yes'),
(94, 'v54YBQySC3vXEve', '50L7HVH8KJJS8YF', 'No');

-- --------------------------------------------------------

--
-- Table structure for table `event_details`
--

CREATE TABLE `event_details` (
  `id` int(11) NOT NULL,
  `event_date` date NOT NULL,
  `event_time` varchar(128) NOT NULL,
  `event_address` text NOT NULL DEFAULT 'No address added.',
  `event_price` int(11) NOT NULL,
  `event_location` varchar(256) NOT NULL,
  `event_mobile` varchar(256) NOT NULL,
  `event_website` varchar(256) NOT NULL,
  `event_email` varchar(256) NOT NULL,
  `event_about_us_content` text NOT NULL,
  `event_gallery` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `event_details`
--

INSERT INTO `event_details` (`id`, `event_date`, `event_time`, `event_address`, `event_price`, `event_location`, `event_mobile`, `event_website`, `event_email`, `event_about_us_content`, `event_gallery`) VALUES
(1, '2024-04-22', '09:10', 'Parivarthana School, \r\nSrirangapatna,\r\nMandya District,\r\nKarnataka\r\n                ', 10, '3305, 10th Main, 4th Block, Jayanagar, Bangalore 560011', '+91 9845793490', 'www.gurupuraskar.com', 'gurupuraskar@gmail.com', '<div>\r\n<h2>About Us</h2>\r\n<p>Guru Puraskar is an initiative to honor and celebrate Effective Teachers in our Schools.</p>\r\n<br>\r\n<p>Outstanding Teachers are chosen to go on International and National Educational Tours! (Videsha and Swadesha Saikshanika Yatras)</p>\r\n<br>\r\n<p>By rewarding them with Educational Tours in India and Abroad, we not only want Teachers to have an enriching experience, we want them to share and learn about education systems across the states and countries.</p>\r\n<br>\r\n<p>Guru Puraskar is an annual event in which Teachers look forward to participate. Its uniqueness is that participation is rejuvenating while everyone stands a chance to be a winner.</p>\r\n<br>\r\n<p>Bharat Ratna Dr. A.P.J. Abdul Kalam while addressing Guru Puraskar Teachers said:</p>\r\n<br>\r\n<p>&ldquo;True success lies in celebrating others success.&rdquo;</p>\r\n<br>\r\n<p>Every teacher participating in Guru Puraskar feels such.</p>\r\n</div>\r\n<div>\r\n<h2>Why Guru Puraskar</h2>\r\n<p>Around 80% of kids in India go to Government Schools. And 80% of these schools are in the rural areas. Hence long-term impact in education can only be achieved by invigorating the public education system. Various Government programs backed by progressive legislations have ensured that most kids are enrolled in schools. Efforts are afoot to improve infra-structure and facilities in schools across the country. The need of the hour is to improve learning outcomes and teaching effectiveness, across Government schools and Private schools. The most effective interventions are those that empower and enable Teachers. They are the crucial link in the teaching-learning eco-system.</p>\r\n<br>\r\n<p>Guru Puraskar\'s objective is to engage teachers by identifying, appreciating and honoring Outstanding Teachers. Through this honor, we want the Teachers fraternity to realize that community recognizes their contributions, while also encouraging them to acquire qualities to be an effective teacher. Guru Puraskar is based on the principle: When You appreciate the good, the Good Appreciate</p>\r\n<br>\r\n<h2>PURPOSE</h2>\r\n<p>To encourage continuous improvement in learning-teaching in all educational institutions.To actively engage Teachers in Nation-building.</p>\r\n<br>\r\n<h2>VISION</h2>\r\n<p>To regain the glory and respect of the GURU for those in the Teaching Profession!</p>\r\n</div>\r\n<div>\r\n<h2>Selection Process</h2>\r\n<p>Ideally students are the best judges of Teachers. The second-best judges are teachers themselves. Guru Puraskar selection process is designed t consider self-assessment, expert evaluation and peer nomination; thus making it almost scientific in its approach to choose the best teachers. Knowledge, qualification and experience for teachers are a given. What distinguishes an Effective Teacher from an Ordinary Teacher is their Attitude. Hence the focus of Guru Puraskar is to identify Teachers with the Right Attitude that make them Extra-ordinary.</p>\r\n<br>\r\n<p>The Application form for participation in Guru Puraskar, the format of the workshops and the various activities in which the teachers participate are designed to reflect their attitudinal traits. After many years of organizing, we have arrived at a robust selection process that ensures the truly deserving Teachers are selected and honored.</p>\r\n<br>\r\n<p>In the first stage, Teachers interested in participating are solicited to send in their Application Form.</p>\r\n<br>\r\n<p>After scrutiny of the Application forms, in the second stage Teachers are invited to attend a one-day first-round workshop at the Cluster / Block level. At the Guru Puraskar workshops at the Cluster / Block level a few Teachers are chosen to progress into the second-round workshop. Teachers are selected based on their performance in Quizzes, Competitions and activities alongside peer-nominations.</p>\r\n<br>\r\n<p>Teachers selected to the third stage participate at the District level workshop will also be evaluated for their teaching abilities. Video-recording of their class-room teaching will be evaluated by a panel of experts. Reasonable weightage will be given for peer-nominations too.</p>\r\n<br>\r\n<p>At the fourth and final-round workshop at the State level, teachers chosen from the District levels participate and sportingly compete for top honors.</p>\r\n<br>\r\n<p>One-third of the winners will be rewarded with International Educational Trips, while two-thirds will be rewarded with an enriching National Education Trip.</p>\r\n<br>\r\n<p>Five Winners of this year\'s Guru Puraskar will be rewarded with Videsha Yatra and Ten winners will be rewarded with Swadesha Yatra!</p>\r\n</div>', '<p><span style=\"font-size: 24pt;\"><strong>Gallery</strong></span></p>\r\n<p><span style=\"font-size: 18pt;\"><strong><iframe style=\"width: 948px; height: 177px;\" src=\"https://www.youtube.com/embed/C_6J06wdgXY\" width=\"100%\" height=\"500\" allowfullscreen=\"allowfullscreen\"></iframe></strong></span></p>');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `user_code` varchar(256) NOT NULL,
  `notification_title` text NOT NULL,
  `notification_date` varchar(256) NOT NULL,
  `notification_status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `user_code`, `notification_title`, `notification_date`, `notification_status`) VALUES
(1, 'Z7TEN2E2PUUYGLO', 'You have recieved 99 RP from a review.', '05:29AM 24/01/2024', 'SEEN'),
(2, 'Z7TEN2E2PUUYGLO', 'You have recieved 90 RP from a review.', '05:30AM 24/01/2024', 'SEEN'),
(3, 'X2D2909Y2JK8XT5', 'A user registered with your referral code. You both have recieved 100 RP.', '11:22AM 24/01/2024', 'UNSEEN'),
(4, 'Z7TEN2E2PUUYGLO', 'You have recieved 1 RP from a review.', '11:50AM 24/01/2024', 'UNSEEN'),
(5, 'Z7TEN2E2PUUYGLO', 'You have recieved 12 RP from a review.', '05:00PM 25/01/2024', 'UNSEEN'),
(6, 'Z7TEN2E2PUUYGLO', 'You have recieved 12 RP from a review.', '05:00PM 25/01/2024', 'UNSEEN'),
(7, 'Z7TEN2E2PUUYGLO', 'You have recieved 12 RP from a review.', '12:35PM 27/01/2024', 'UNSEEN'),
(8, 'Z7TEN2E2PUUYGLO', 'You have recieved 12 RP from a review.', '01:41PM 27/01/2024', 'UNSEEN'),
(9, '12MO7V0HPVBGUXC', 'A user registered with your referral code. You both have recieved 100 RP.', '05:20PM 27/01/2024', 'SEEN'),
(10, 'Z7TEN2E2PUUYGLO', 'A user registered with your referral code. You both have recieved 100 RP.', '09:05AM 30/01/2024', 'UNSEEN'),
(11, '12MO7V0HPVBGUXC', 'A user registered with your referral code. You both have recieved 100 RP.', '02:04PM 31/01/2024', 'UNSEEN'),
(12, '12MO7V0HPVBGUXC', 'You have recieved 12 RP from a review.', '02:49PM 31/01/2024', 'UNSEEN');

-- --------------------------------------------------------

--
-- Table structure for table `payment_data`
--

CREATE TABLE `payment_data` (
  `id` int(11) NOT NULL,
  `user_code` varchar(256) NOT NULL,
  `ref_number` varchar(256) NOT NULL,
  `process` varchar(256) NOT NULL,
  `amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `referrals`
--

CREATE TABLE `referrals` (
  `id` int(11) NOT NULL,
  `sender_user_code` varchar(256) NOT NULL,
  `reciever_user_code` varchar(256) NOT NULL,
  `sender_balance` varchar(256) NOT NULL,
  `reciever_balance` varchar(256) NOT NULL,
  `referral_code` varchar(256) NOT NULL,
  `referred_date` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `referrals`
--

INSERT INTO `referrals` (`id`, `sender_user_code`, `reciever_user_code`, `sender_balance`, `reciever_balance`, `referral_code`, `referred_date`) VALUES
(5, 'YG772N1HLBUGPGF', '7HMD93BXXWOW843', '100', '100', '', '28/12/2023'),
(6, 'GGL7HX84ZUOH9AN', 'EYKKCNJDT29GXLV', '100', '100', '', '03/01/2024'),
(7, 'D17BT2BFYST6GCQ', 'LRUOJTP56BZKYCM', '100', '100', '', '03/01/2024'),
(8, 'PBB9XP4GEVPF2ZM', 'P5SEJ70I0C43WMO', '100', '100', '', '06/01/2024'),
(9, 'PBB9XP4GEVPF2ZM', 'CY6G6JWQ7E3F79I', '200', '100', '', '06/01/2024'),
(10, 'GT0VUO3ZC72HS8Q', 'JSNTTEFNPDCWI4X', '100', '100', '', '09/01/2024'),
(11, 'X2D2909Y2JK8XT5', 'SLFB0AH7XYD3EJE', '100', '100', '', '11/01/2024'),
(12, 'X2D2909Y2JK8XT5', 'ZSQN73XRX4MDZ28', '200', '100', '', '11/01/2024'),
(13, 'G5ZV0Z4OCNGFMMC', 'Z937FW9IP9RMN71', '100', '100', '', '15/01/2024'),
(14, 'X2D2909Y2JK8XT5', 'ZSQN73XRX4MDZ28', '100', '100', '', '24/01/2024'),
(15, '12MO7V0HPVBGUXC', 'R2FB6OJSRDPL5ZQ', '100', '100', '', '27/01/2024'),
(16, 'Z7TEN2E2PUUYGLO', 'EF39GHTHKQVHQH3', '338', '100', '', '30/01/2024'),
(17, '12MO7V0HPVBGUXC', 'W6MLNJU788JYXW4', '200', '100', '', '31/01/2024');

-- --------------------------------------------------------

--
-- Table structure for table `small_data`
--

CREATE TABLE `small_data` (
  `id` int(11) NOT NULL,
  `user_code` varchar(256) NOT NULL,
  `reference` varchar(256) NOT NULL,
  `task` varchar(256) NOT NULL,
  `referrer` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `small_data`
--

INSERT INTO `small_data` (`id`, `user_code`, `reference`, `task`, `referrer`) VALUES
(12, 'X2D2909Y2JK8XT5', '302665', 'onboarding', 'A449JG4620BSRJ7'),
(16, '6RJ3EFPDNB4RCP1', '619959', 'onboarding', ''),
(18, 'ZSQN73XRX4MDZ28', '307581', 'onboarding', 'X2D2909Y2JK8XT5'),
(20, 'Q4VNIVVOYHO1JS3', '198441', 'onboarding', 'G5ZV0Z4OCNGFMMC'),
(21, 'Q4VNIVVOYHO1JS3', '504958', 'onboarding', 'G5ZV0Z4OCNGFMMC'),
(22, 'Q4VNIVVOYHO1JS3', '364747', 'onboarding', 'G5ZV0Z4OCNGFMMC'),
(24, 'A449JG4620BSRJ7', '431899', 'onboarding', ''),
(25, 'A449JG4620BSRJ7', '544573', 'onboarding', ''),
(28, 'G5ZV0Z4OCNGFMMC', '275811', 'onboarding', ''),
(30, '2NZA1G3LMIRZQ7L', '499175', 'onboarding', 'Z7TEN2E2PUUYGLO'),
(31, '12MO7V0HPVBGUXC', '243584', 'onboarding', ''),
(35, 'RDC6B77MI2U2TGL', '540760', 'onboarding', ''),
(36, '4DZG5U42RH6I3RV', '287669', 'onboarding', ''),
(37, '4DZG5U42RH6I3RV', '368331', 'onboarding', ''),
(38, '4DZG5U42RH6I3RV', '217057', 'onboarding', ''),
(39, '4DZG5U42RH6I3RV', '309754', 'onboarding', ''),
(40, '4DZG5U42RH6I3RV', '809922', 'onboarding', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_code` varchar(256) NOT NULL,
  `user_mob_num` varchar(128) NOT NULL,
  `user_class` varchar(10) NOT NULL,
  `user_blocked` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_code`, `user_mob_num`, `user_class`, `user_blocked`) VALUES
(71, 'M0GV7E2B3RY68G8', '9972727300', 'ON1', 0),
(106, 'G5ZV0Z4OCNGFMMC', '9845793490', 'SAN', 0),
(113, 'IHBR7F7MSUNY5FN', '9036313131', 'ON1', 0),
(114, 'Q4VNIVVOYHO1JS3', '8105124047', 'ON1', 0),
(115, 'Z937FW9IP9RMN71', '9482843595', 'SAF', 0),
(116, 'WTULJYTWN2160W5', '9964571330', 'ON1', 0),
(117, 'Z7TEN2E2PUUYGLO', '9880596200', 'SAF', 0),
(121, '12MO7V0HPVBGUXC', '9886954377', 'SAF', 0),
(124, 'W6MLNJU788JYXW4', '7019320671', 'SAN', 0),
(126, 'KLEN8E7OJ4VD62T', '9162686133', 'SAF', 0),
(127, 'BJOZNE8ONMT3E8Q', '8050069811', 'REG', 0),
(128, '9DIVVEU1N11HW4V', '9741518134', 'REG', 0),
(129, '4DZG5U42RH6I3RV', '8951027294', 'ON1', 0),
(130, 'RDC6B77MI2U2TGL', '8431148811', 'ON1', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users_data`
--

CREATE TABLE `users_data` (
  `id` int(11) NOT NULL,
  `user_code` varchar(256) NOT NULL,
  `user_full_name` varchar(256) NOT NULL,
  `user_email` varchar(256) NOT NULL,
  `user_gender` varchar(10) NOT NULL,
  `user_age` int(11) NOT NULL,
  `user_res_address` text NOT NULL,
  `user_state` varchar(128) NOT NULL,
  `user_district` varchar(128) NOT NULL,
  `user_taluk` varchar(256) NOT NULL,
  `user_pincode` varchar(256) NOT NULL,
  `user_education` varchar(256) NOT NULL,
  `institute_id` varchar(256) NOT NULL,
  `institute_name` varchar(256) NOT NULL,
  `institute_type` varchar(256) NOT NULL,
  `user_designation` varchar(128) NOT NULL,
  `institute_address` text NOT NULL,
  `institute_state` varchar(256) NOT NULL,
  `institute_district` varchar(256) NOT NULL,
  `institute_taluk` varchar(256) NOT NULL,
  `institute_pincode` varchar(256) NOT NULL,
  `user_identity` varchar(128) NOT NULL,
  `user_referral_code` varchar(256) NOT NULL,
  `user_kgid` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users_data`
--

INSERT INTO `users_data` (`id`, `user_code`, `user_full_name`, `user_email`, `user_gender`, `user_age`, `user_res_address`, `user_state`, `user_district`, `user_taluk`, `user_pincode`, `user_education`, `institute_id`, `institute_name`, `institute_type`, `user_designation`, `institute_address`, `institute_state`, `institute_district`, `institute_taluk`, `institute_pincode`, `user_identity`, `user_referral_code`, `user_kgid`) VALUES
(46, 'G5ZV0Z4OCNGFMMC', 'Yogi Anish', 'yogianish@gmail.com', 'male', 50, 'Kamala Mansion ', 'Karnataka', 'Bengaluru (Bangalore) Rural', 'City', '560001', 'MA', '12345', 'Parivartan School', 'College - Aided/Unaided', 'high school teacher', 'Srirangapatna', 'Karnataka', 'Mandya', 'Srirangapatna ', '540001', 'AAXPA4005A', 'YL2T8', 'Qwrt'),
(52, 'Q4VNIVVOYHO1JS3', 'Shivanand Haralayya ', 'shivanand.haralayya@dfmail.org', 'male', 40, 'Deshpande Foundation Hubli ', 'Karnataka', 'Dharwad', 'Hubli ', '580030', 'M Ed , MSW', '', 'Deshpande Foundation Skilling ', 'Others', 'other', '', '', '', '', '', 'AFOPH3050E', '3W0WA', ''),
(53, 'Z937FW9IP9RMN71', 'SHILPA CHARANTIMATH', 'shilpahiremath1978@gmail.com', 'female', 45, '#147/A Vijaynagar Hubli', 'Karnataka', 'Dharwad', 'Hubli', '580032', 'MA BEd, MPhil, PhD', '29090404910', 'Government High School Saunshi', 'Others', 'high school teacher', 'GHS Saunshi Taluk Kundgol', 'Karnataka', 'Dharwad', 'Kundgol', '581117', '775204160151', '2O3UF', '2312485'),
(54, 'Z7TEN2E2PUUYGLO', 'Srividya Nagaraju', 'nagarajusrividya@gmail.com', 'female', 51, 'Jayanagar', 'Karnataka', 'Bengaluru (Bangalore) Urban', 'Bengaluru', '560041', 'Mom', '', '', 'Self-employed', 'other', '', '', '', '', '', 'GVBJNKKOK', 'I1HPL', ''),
(62, '12MO7V0HPVBGUXC', 'Alex', 'acnoxela@outlook.com', 'male', 9, '9', 'Arunachal Pradesh', 'East Kameng', '9', '9', '9', '', '', 'Law – Govt/Pvt', 'preschool teacher', '', '', '', '', '', '9', 'AL437', ''),
(66, 'KLEN8E7OJ4VD62T', 'Anubhav Shavaran', 'anubhavshavaran5678@gmail.com', 'male', 20, 'ARMY INSTITUTE OF TECHNOLOGY, Alandi road, dighi', 'Bihar', 'Bhagalpur', 'PC', '411015', 'edu', '', '', 'Engineering – Govt/Pvt', 'professor', '', '', '', '', '', '123412341234', 'AN613', ''),
(67, 'W6MLNJU788JYXW4', 'Alex 2', 'acnoxela@outlook.com', 'male', 7, '7', 'Chandigarh (UT)', 'Chandigarh', '7', '7', '7', '', '', 'Engineering – Govt/Pvt', 'physical education', '', '', '', '', '', '7', 'AL067', ''),
(68, 'RDC6B77MI2U2TGL', 'Saiprakash H T ', 'saiprakashht@gmail.com', 'male', 22, 'Bangalore ', 'Karnataka', 'Bengaluru (Bangalore) Urban', 'Banashankari ', '560085', 'BE', 'KT', 'Sri Krishna institute of technology ', 'College - Aided/Unaided', 'middle school teacher', 'Jayanagar 8th block ', 'Karnataka', 'Bengaluru (Bangalore) Urban', 'Banashankari ', '560085', '1234', 'SA881', '1234'),
(69, '4DZG5U42RH6I3RV', 'Abhishek', 'abhi123@gmail.com', 'male', 27, 'Banglore', 'Karnataka', 'Hassan', 'Channarayapatna', '424343', 'BE', '12345', 'Government College', 'University – Govt/Pvt', 'tutor', 'Banashankari', 'Karnataka', 'Bengaluru (Bangalore) Rural', 'Banashankari ', '34354', '2342fdd', 'AB729', '22324');

-- --------------------------------------------------------

--
-- Table structure for table `users_score`
--

CREATE TABLE `users_score` (
  `id` int(11) NOT NULL,
  `user_code` varchar(128) NOT NULL,
  `user_arp` float NOT NULL,
  `user_rp` int(11) NOT NULL,
  `user_score` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users_score`
--

INSERT INTO `users_score` (`id`, `user_code`, `user_arp`, `user_rp`, `user_score`) VALUES
(45, '8HMD93B11WOW843', 1000, 0, 0),
(47, '9TOPP6IIQ7A64V3', 922, 0, 0),
(50, 'S16OXROV3C54LSC', 1000, 0, 0),
(52, '', 1000, 0, 0),
(54, 'EYKKCNJDT29GXLV', 1000, 100, 0),
(56, 'FCI7M9OQAYJ2SA6', 1000, 0, 0),
(59, 'ZROXYRSCE89GG12', 1000, 0, 0),
(61, 'WAQYDFX1AS2S6O9', 1000, 0, 0),
(64, 'D17BT2BFYST6GCQ', 1000, 0, 0),
(71, 'CDG2PQ4T5IOFOJE', 1000, 0, 0),
(91, 'G5ZV0Z4OCNGFMMC', 811, 420, 0),
(97, 'Z937FW9IP9RMN71', 1000, 100, 0),
(98, 'Z7TEN2E2PUUYGLO', 1000, 338, 238),
(102, '12MO7V0HPVBGUXC', 1000, 212, 12),
(106, 'KLEN8E7OJ4VD62T', 988, 0, 0),
(107, 'W6MLNJU788JYXW4', 1000, 100, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users_transaction`
--

CREATE TABLE `users_transaction` (
  `id` int(11) NOT NULL,
  `user_code` varchar(256) NOT NULL,
  `user_full_name` varchar(256) NOT NULL,
  `transaction_name` varchar(128) NOT NULL,
  `transaction_code` varchar(128) NOT NULL,
  `transaction_amount` int(10) NOT NULL,
  `transaction_date` varchar(128) NOT NULL,
  `transaction_status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users_transaction`
--

INSERT INTO `users_transaction` (`id`, `user_code`, `user_full_name`, `transaction_name`, `transaction_code`, `transaction_amount`, `transaction_date`, `transaction_status`) VALUES
(147, '26HU1Z1153TBOU1', 'Anubhav Shavaran', 'Registration Fee', '9PZW46TIHE96D00', 100, '27/12/2023', 'success'),
(148, 'YG772N1HLBUGPGF', 'Alex', 'Registration Fee', 'I5RDHYIKPUXCSDZ', 100, '27/12/2023', 'success'),
(151, '7HMD93BXXWOW843', 'Anubhav Shavaran', 'Registration Fee', 'Y4USF20T487C42A', 100, '28/12/2023', 'success'),
(152, '8HMD93B11WOW843', 'Dummy', 'Registration Fee', 'Z6VTF10T487C42B', 100, '28/12/2023', 'success'),
(153, 'Z44CZGK90C2QFG7', 'Anubhav Shavaran', 'Registration Fee', 'DO6BTVH3BGH5VP9', 100, '28/12/2023', 'success'),
(168, 'From Donations', 'Alex', 'Donation', 'SPDSE75H3RUM242', 10, '30/12/2023', 'failure'),
(169, 'From Donations', 'Alex', 'Donation', '6PM501CVWGHQPU1', 10, '30/12/2023', 'success'),
(170, 'From Donations', 'Srividya ', 'Donation', 'P7GN90SJG2NRB7Q', 1018, '30/12/2023', 'success'),
(171, 'From Donations', 'Rajesh Kumar', 'Donation', 'C798B74V9GJY1E1', 10, '30/12/2023', 'success'),
(172, 'From Donations', 'Anish kumar', 'Donation', 'Z4NE8XMZVI1351F', 10, '30/12/2023', 'success'),
(173, 'From Donations', 'Kanti Jain ', 'Donation', 'S1KDGXR0GQTTRFA', 11, '30/12/2023', 'success'),
(174, 'From Donations', 'Balaji Singh ', 'Donation', '08SAB1JZBZSMIOW', 10, '31/12/2023', 'success'),
(175, 'From Donations', 'Anubhav Shavaran y', 'Donation', '0UGBIY18MIZRD3U', 100, '02/01/2024', 'success'),
(176, 'From Donations', 'Anubhav Shavaran y', 'Donation', '7OZO4NSTVM5KRCJ', 100, '02/01/2024', 'success'),
(177, 'From Donations', 'Anubhav Shavaran y', 'Donation', '0FWHUDF6XDLXY5R', 100, '02/01/2024', 'success'),
(178, 'From Donations', 'Anubhav Shavaran y', 'Donation', 'R0YHWOOGC40ZUO6', 100, '02/01/2024', 'success'),
(179, 'From Donations', 'Anubhav Shavaran y', 'Donation', 'X36I4FNT8E9KW74', 100, '02/01/2024', 'success'),
(180, 'From Donations', 'Anish', 'Donation', 'O3S2ZBU67Q7Y0G8', 11, '02/01/2024', 'success'),
(181, '9TOPP6IIQ7A64V3', 'Anish Kumar', 'Registration Fee', 'JT4FW5TPGQJTB52', 100, '02/01/2024', 'success'),
(182, 'D17BT2BFYST6GCQ', 'Anubhav Shavaran', 'Registration Fee', 'PA4YI2B5JGG5MBG', 100, '02/01/2024', 'success'),
(183, 'GGL7HX84ZUOH9AN', 'Alex', 'Registration Fee', 'E3F8RX6K50RCEG3', 100, '03/01/2024', 'success'),
(184, 'From Donations', 'S16OXROV3C54LSC', 'Registration Fee', 'EENUY772KEH8T49', 100, '03/01/2024', 'success'),
(185, 'FCI7M9OQAYJ2SA6', 'Alexx', 'Registration Fee', 'Q4RPR794YQSMVKP', 100, '03/01/2024', 'success'),
(187, 'RQ9Q1B68PD1DMZE', 'Alexs', 'Registration Fee', 'W4RTXPHYN87SMYT', 100, '03/01/2024', 'success'),
(188, 'EYKKCNJDT29GXLV', 'Alexs', 'Registration Fee', '1761G8JJMAVC6KZ', 100, '03/01/2024', 'success'),
(189, 'From Donations', 'Alex', 'Donation', 'ROK2HN97JCCPJ8B', 10, '03/01/2024', 'success'),
(190, 'From Donations', 'Alex', 'Donation', 'A1E7FATQD2ARX1C', 10, '03/01/2024', 'success'),
(191, 'From Donations', 'Alex', 'Donation', '1ER5F15AMJOG342', 10, '03/01/2024', 'success'),
(192, 'From Donations', 'Alex', 'Donation', '5BISSTXJBULRBGK', 10, '03/01/2024', 'success'),
(193, 'D17BT2BFYST6GCQ', 'Anubhav Shavaran', 'Registration Fee', '3V7JRDRMTQNM3IW', 100, '03/01/2024', 'success'),
(194, 'D17BT2BFYST6GCQ', 'Anubhav Shavaran', 'Registration Fee', 'PRSESPUFY21U8MW', 100, '03/01/2024', 'success'),
(196, 'D17BT2BFYST6GCQ', 'Anubhav Shavaran', 'Registration Fee', 'I2XRV934UMWKVEB', 100, '03/01/2024', 'success'),
(197, 'GGL7HX84ZUOH9AN', 'Alex ', 'Registration Fee', 'LS3AWIRQNYEZU62', 100, '03/01/2024', 'success'),
(198, 'From Donations', 'EYKKCNJDT29GXLV', 'Registration Fee', 'B58ML7E9QJBP7UJ', 100, '03/01/2024', 'failure'),
(199, 'From Donations', 'EYKKCNJDT29GXLV', 'Registration Fee', '83D6O4ZEI0EG1R9', 100, '03/01/2024', 'failure'),
(200, 'From Donations', 'EYKKCNJDT29GXLV', 'Registration Fee', 'GZCPUK2H6OZQPPQ', 100, '03/01/2024', 'failure'),
(201, 'From Donations', 'EYKKCNJDT29GXLV', 'Registration Fee', '7ISLDQVI7FXZBHE', 100, '03/01/2024', 'failure'),
(202, 'From Donations', 'EYKKCNJDT29GXLV', 'Registration Fee', 'TUK2P1G6XUR7DKF', 100, '03/01/2024', 'failure'),
(203, 'From Donations', 'EYKKCNJDT29GXLV', 'Registration Fee', 'UBXCW0R8UI9WMCI', 100, '03/01/2024', 'failure'),
(204, 'PBB9XP4GEVPF2ZM', 'Alex', 'Registration Fee', 'GENOCTZB6SZT65Q', 100, '03/01/2024', 'success'),
(205, 'From Donations', 'FCI7M9OQAYJ2SA6', 'Registration Fee', '9QY28HSYRGQD1Z1', 100, '03/01/2024', 'success'),
(206, 'ZROXYRSCE89GG12', 'Alexs', 'Registration Fee', 'KHZOCNGTHCDFQ2H', 100, '03/01/2024', 'success'),
(207, 'From Donations', 'FCI7M9OQAYJ2SA6', 'Registration Fee', 'SBNB0U58UM1Y3A5', 100, '03/01/2024', 'success'),
(208, 'WAQYDFX1AS2S6O9', 'Alex', 'Registration Fee', 'B7PZZNIBZ5XVXJJ', 100, '03/01/2024', 'success'),
(209, 'From Donations', 'ZROXYRSCE89GG12', 'Registration Fee', 'JKDBWBAOBPN23RK', 100, '03/01/2024', 'success'),
(210, 'LRUOJTP56BZKYCM', 'Anubhav 2', 'Registration Fee', 'VGTFQDTBHH3GH42', 100, '03/01/2024', 'success'),
(211, 'From Donations', 'WAQYDFX1AS2S6O9', 'Registration Fee', '2BNF46J2EEDMLPY', 100, '03/01/2024', 'success'),
(212, 'From Donations', 'ZROXYRSCE89GG12', 'Registration Fee', 'VXNEHWOZO8LHB38', 100, '03/01/2024', 'success'),
(213, 'JYWA9Q2U35A65Z9', 'Alexs', 'Registration Fee', 'E9Y36AEKVELHC15', 100, '03/01/2024', 'success'),
(214, 'PBB9XP4GEVPF2ZM', 'Alex', 'Registration Fee', '2FG6YM150YXPVC3', 100, '03/01/2024', 'success'),
(215, 'PBB9XP4GEVPF2ZM', 'Alex', 'Registration Fee', '04B6KT855W6UWLL', 100, '03/01/2024', 'success'),
(216, 'From Donations', 'Alex', 'Donation', 'H116PFH7V6S1ZQC', 10, '03/01/2024', 'success'),
(217, 'From Donations', 'Alex', 'Donation', 'P26P0Y88GS77S0B', 10, '03/01/2024', 'success'),
(218, 'From Donations', 'Alex', 'Donation', 'NOTTZVEQRAFFIQ9', 10, '03/01/2024', 'success'),
(219, 'From Donations', 'Alex', 'Donation', 'CCNQNFDW0RRKLAK', 10, '03/01/2024', 'success'),
(220, 'LRUOJTP56BZKYCM', 'Anubhav 2', 'Registration Fee', 'N9Q36DNKQJDWJ0U', 100, '03/01/2024', 'success'),
(221, 'D17BT2BFYST6GCQ', 'Anubhav Shavaran', 'Registration Fee', '3OAWVESPNLHZ5M1', 100, '03/01/2024', 'success'),
(222, 'From Donations', 'Anubhav ', 'Donation', '47KCBSAKAI1IJSX', 1, '03/01/2024', 'success'),
(223, 'From Donations', 'Anubhav', 'Donation', '3N6TFCULOV1XLEG', 1, '03/01/2024', 'failure'),
(224, 'From Donations', 'Anubhav ', 'Donation', '4ETAMF1LAEC7WEF', 1, '03/01/2024', 'success'),
(226, 'D17BT2BFYST6GCQ', 'Anubhav Shavaran', 'Registration Fee', 'IQR63QA729NC5AL', 100, '03/01/2024', 'success'),
(227, 'LIBNVXY5Y73NQLP', 'Marcos', 'Registration Fee', 'I37DC8LQYI622YK', 100, '03/01/2024', 'success'),
(228, 'From Donations', 'D17BT2BFYST6GCQ', 'Registration Fee', '8KBFHJXHIFVOZ09', 100, '04/01/2024', 'success'),
(229, 'From Donations', 'D17BT2BFYST6GCQ', 'Registration Fee', 'U6C3FK0IBJTEH7E', 100, '04/01/2024', 'success'),
(230, 'JMD4EHMHO9UXFN5', 'Anubhav Shavaran', 'Registration Fee', 'PCDC26NW0II4DRX', 100, '04/01/2024', 'success'),
(231, 'LN3TOS1P3XVGMXD', 'Anubhav Shavaran ', 'Registration Fee', 'Q9Q4BAG2T1GJK4F', 100, '04/01/2024', 'success'),
(232, 'CDG2PQ4T5IOFOJE', 'Anubhav Shavaran ', 'Registration Fee', '4KC36JGVFOWDOPD', 100, '04/01/2024', 'success'),
(235, '7EK1CW9W21DG6FW', 'Anubhav Shavaran', 'Registration Fee', 'X3TPOWSSAMPFAZB', 100, '04/01/2024', 'success'),
(236, 'NFRSEI5MKLJ293L', 'Anubhav Shavaran', 'Registration Fee', 'FCHYFM1K2T7JQIK', 100, '04/01/2024', 'success'),
(237, 'GRKSMILWH80LYXN', 'Anubhav Shavaran', 'Registration Fee', 'HVEDBIZIN8YWYH1', 100, '04/01/2024', 'success'),
(242, 'From Donations', 'CDG2PQ4T5IOFOJE', 'Registration Fee', 'UZXXHA6209DV6T4', 100, '04/01/2024', 'success'),
(243, '7I19X1PX8B3IK97', 'Anubhav Shavaran', 'Registration Fee', '2SFRYEZ7Z4H5CNU', 100, '04/01/2024', 'success'),
(244, '7I19X1PX8B3IK97', 'Anubhav Shavaran', 'Registration Fee', '0QEROJYM2FFHYKV', 100, '04/01/2024', 'success'),
(245, 'From Donations', 'CDG2PQ4T5IOFOJE', 'Registration Fee', '2R78GDP67BREB78', 100, '04/01/2024', 'success'),
(246, 'WBO13CL2NIDA51S', 'Anubhav Shavaran ', 'Registration Fee', '34G1GX7JNS1GCTC', 100, '04/01/2024', 'failure'),
(247, 'WBO13CL2NIDA51S', 'Anubhav Shavaran ', 'Registration Fee', 'KRSJNCC1H91D1UG', 100, '04/01/2024', 'failure'),
(248, 'WBO13CL2NIDA51S', 'Anubhav Shavaran ', 'Registration Fee', '5PUSZYJZ7Z9ZW4D', 100, '04/01/2024', 'failure'),
(249, 'WBO13CL2NIDA51S', 'Anubhav Shavaran ', 'Registration Fee', 'XX4RH4JPARDHDYM', 100, '04/01/2024', 'failure'),
(250, 'WBO13CL2NIDA51S', 'Anubhav Shavaran ', 'Registration Fee', 'N8RDA37Q6WNPKQ5', 100, '04/01/2024', 'success'),
(251, 'WBO13CL2NIDA51S', 'Anubhav Shavaran ', 'Donation', 'T6DW90DTJ4T0ZQO', 100, '04/01/2024', 'failure'),
(252, 'LISNOUAOSPTSI79', 'Anubhav Shavaran', 'Registration Fee', '1TFJI2HWJ1VRMI3', 100, '04/01/2024', 'failure'),
(253, 'LISNOUAOSPTSI79', 'Anubhav Shavaran', 'Registration Fee', 'L9EUTYO0QXTN1JI', 100, '04/01/2024', 'failure'),
(254, 'LISNOUAOSPTSI79', 'Anubhav Shavaran', 'Registration Fee', '9LTWUF6OD4E6FOM', 100, '04/01/2024', 'success'),
(255, 'E1VW6PY1I0MZMLH', 'Anubhav Shavaran', 'Registration Fee', 'VSVOR7V0L5CG2U3', 100, '04/01/2024', 'failure'),
(256, 'E1VW6PY1I0MZMLH', 'Anubhav Shavaran', 'Registration Fee', 'TGUO4VU6F8SLE3C', 100, '04/01/2024', 'failure'),
(257, 'E1VW6PY1I0MZMLH', 'Anubhav Shavaran', 'Registration Fee', 'T6ZZLN0V9Y1ZFUZ', 100, '04/01/2024', 'failure'),
(258, 'E1VW6PY1I0MZMLH', 'Anubhav Shavaran', 'Registration Fee', '5OSRDZDALVPHCM8', 100, '04/01/2024', 'failure'),
(259, 'E1VW6PY1I0MZMLH', 'Anubhav Shavaran', 'Registration Fee', 'HKA543S1042SUHE', 100, '04/01/2024', 'success'),
(260, 'E1VW6PY1I0MZMLH', 'Anubhav Shavaran', 'Registration Fee', '9O1ORU499W43LQA', 100, '04/01/2024', 'success'),
(261, 'E1VW6PY1I0MZMLH', 'Anubhav Shavaran', 'Registration Fee', 'VZ4AIGF4UPPJ8U8', 100, '04/01/2024', 'success'),
(263, 'UFLVYSLUP4P6E6R', 'Anubhav Shavaran', 'Registration Fee', '6BXO6EJPG5CKEME', 100, '06/01/2024', 'success'),
(265, 'WONYLLCY8KN3596', 'Anubhav Shavaran ', 'Registration Fee', 'OIXFBO6UUBDJUZD', 100, '06/01/2024', 'success'),
(266, 'WOTH43VXCC9RAIB', 'Anubhav Shavaran ', 'Registration Fee', '67W86Y8MYGVOCQ9', 100, '06/01/2024', 'success'),
(267, 'P5SEJ70I0C43WMO', 'Anubhav Shavaran ', 'Registration Fee', 'WO0M16KA5X54U3D', 100, '06/01/2024', 'success'),
(269, '00U0XQNFLFNGD2E', 'Anubhav Shavaran ', 'Registration Fee', 'K26V243ML3FI901', 100, '06/01/2024', 'success'),
(270, 'CY6G6JWQ7E3F79I', 'Anubhav Shavaran', 'Registration Fee', 'UL86KA3HNX2MEZ9', 100, '06/01/2024', 'success'),
(271, 'WOFUBRFTP0B0X4Y', 'Anubhav Shavaran', 'Registration Fee', 'ZZGS66S3AIG9KNM', 100, '06/01/2024', 'success'),
(274, 'PNXJNW9LT5CCQAG', 'Anubhav Shavaran ', 'Registration Fee', '4Q25IN637KJTMEV', 100, '06/01/2024', 'success'),
(275, 'From Donations', '', 'Registration Fee', '0736IFA7EFIEEJZ', 100, '08/01/2024', 'success'),
(276, 'From Donations', '', 'Registration Fee', 'AG4XW8XVS5M8GOH', 100, '08/01/2024', 'success'),
(277, 'From Donations', '', 'Registration Fee', 'XURKZP74BPTXW2Y', 100, '08/01/2024', 'success'),
(278, 'From Donations', '', 'Registration Fee', 'GSA88CAL5S7D5HV', 100, '08/01/2024', 'success'),
(279, 'From Donations', '', 'Registration Fee', 'VDQGHPY7QIHP978', 100, '08/01/2024', 'success'),
(280, 'H6CX11X9NWW3IFU', 'Anubhav Shavaran ', 'Registration Fee', 'D2PC9FNVSWH8638', 100, '08/01/2024', 'success'),
(281, 'PJQKT9Z5EYQFBL9', 'Anubhav Shavaran ', 'Registration Fee', 'CFK4GNU71MLAYNR', 100, '08/01/2024', 'success'),
(282, 'A449JG4620BSRJ7', 'Alex', 'Registration Fee', 'RV4MLOTWP9D0ABQ', 100, '09/01/2024', 'success'),
(283, 'GT0VUO3ZC72HS8Q', 'Alex 2', 'Registration Fee', 'Y2J7DMRJ96H1WPF', 100, '09/01/2024', 'success'),
(284, 'From Donations', '', 'Registration Fee', 'MR809E7TW84I7CF', 100, '09/01/2024', 'success'),
(285, 'JD7IH1T8611KFXH', 'Anubhav Shavaran ', 'Registration Fee', 'S1KWEESX61XS4MN', 100, '09/01/2024', 'success'),
(286, 'JSNTTEFNPDCWI4X', 'Anubhav Shavaran ', 'Registration Fee', '53724DEEO9JDKHN', 100, '09/01/2024', 'success'),
(287, 'From Donations', 'Anish kumar', 'Donation', '3492GAJBAPYGYPW', 10, '10/01/2024', 'success'),
(288, 'From Donations', 'Anish kumar', 'Donation', 'RBPB34QMX97NMSD', 10, '10/01/2024', 'failure'),
(289, 'From Donations', 'Anish kumar', 'Donation', 'MS17P2L9JOEVBP1', 10, '10/01/2024', 'failure'),
(290, 'From Donations', 'Anish kumar', 'Donation', 'AMMPMUGKTYQAB1C', 10, '10/01/2024', 'failure'),
(291, 'G5ZV0Z4OCNGFMMC', 'Yogi Anish', 'Registration Fee', 'VYP3W0HQ4M0R4VR', 100, '10/01/2024', 'success'),
(292, 'From Donations', 'Anubhav ', 'Donation', 'UVYFEWMGGDSP2GO', 1, '10/01/2024', 'success'),
(293, 'From Donations', 'Anubhav ', 'Donation', '8WT9F6N9COOF581', 1, '10/01/2024', 'success'),
(294, 'X2D2909Y2JK8XT5', 'Alex 2 ', 'Registration Fee', 'HW2757ZAG4916EJ', 100, '11/01/2024', 'success'),
(295, 'J7V88FP49OUMBVG', 'Anubhav Shavaran', 'Registration Fee', 'TIVK9SVUEG2FDGA', 100, '11/01/2024', 'success'),
(296, 'SLFB0AH7XYD3EJE', 'Anubhav Shavaran', 'Registration Fee', '2GHF18W7ZXTHF4E', 100, '11/01/2024', 'success'),
(297, '6RJ3EFPDNB4RCP1', 'Anubhav Shavaran ', 'Registration Fee', 'ULTO2PH2N4838X3', 100, '11/01/2024', 'success'),
(298, 'ZSQN73XRX4MDZ28', 'Anubhav Shavaran ', 'Registration Fee', 'BGIUNCKLWXX88UW', 100, '11/01/2024', 'failure'),
(299, 'ZSQN73XRX4MDZ28', 'Anubhav Shavaran ', 'Registration Fee', 'LAW8WYVORX6EFYG', 100, '11/01/2024', 'success'),
(300, 'From Donations', 'Anish kumar', 'Donation', 'EW6FJ3DI9SQMAKQ', 100, '12/01/2024', 'success'),
(301, 'Z937FW9IP9RMN71', 'SHILPA CHARANTIMATH', 'Registration Fee', 'YF15LILYTFODJLG', 100, '15/01/2024', 'success'),
(302, 'A449JG4620BSRJ7', 'Alex', 'Registration Fee', 'WJHUT49Z8M6BW8B', 100, '23/01/2024', 'failure'),
(303, 'A449JG4620BSRJ7', 'Alex', 'Registration Fee', 'XKW9YAABFHDT6DZ', 100, '23/01/2024', 'success'),
(304, 'Z7TEN2E2PUUYGLO', 'Srividya Nagaraju', 'Registration Fee', '3L52CMMKF0VUOBZ', 100, '24/01/2024', 'success'),
(305, 'G5ZV0Z4OCNGFMMC', 'Yogi Anish', 'Registration Fee', '3N6ZFKN9L060ROY', 100, '24/01/2024', 'success'),
(306, 'ZSQN73XRX4MDZ28', 'Anubhav Shavaran ', 'Registration Fee', 'BIMWA4PCO5GIMHD', 100, '24/01/2024', 'success'),
(307, 'From Donations', 'SLFB0AH7XYD3EJE', 'Registration Fee', 'E78PNUH1B64938M', 100, '25/01/2024', 'failure'),
(308, '2NZA1G3LMIRZQ7L', 'Anubhav Shavaran', 'Registration Fee', 'O0DQXYZS8WVVD4R', 1, '25/01/2024', 'success'),
(309, '2NZA1G3LMIRZQ7L', 'Anubhav Shavaran', 'Donation', 'HO1ZKH6UNDE6MGJ', 10, '25/01/2024', 'failure'),
(310, '2NZA1G3LMIRZQ7L', 'Anubhav Shavaran', 'Donation', 'PNQ92D1EGS1P1J0', 100, '26/01/2024', 'failure'),
(311, '2NZA1G3LMIRZQ7L', 'Anubhav Shavaran', 'Donation', '91JM25J3CQ0U1R8', 100, '26/01/2024', 'failure'),
(312, '2NZA1G3LMIRZQ7L', 'Anubhav Shavaran', 'Donation', '05IEJQ69HRTSTDC', 100, '26/01/2024', 'failure'),
(313, '2NZA1G3LMIRZQ7L', 'Anubhav Shavaran', 'Donation', 'Q394RS4S2LK2CTG', 1, '26/01/2024', 'success'),
(314, '2NZA1G3LMIRZQ7L', 'Anubhav Shavaran', 'Donation', 'OLYBUT7LW4UORTC', 10, '26/01/2024', 'failure'),
(315, '2NZA1G3LMIRZQ7L', 'Anubhav Shavaran', 'Donation', '04S62XT2284H301', 10, '26/01/2024', 'failure'),
(316, '2NZA1G3LMIRZQ7L', 'Anubhav Shavaran', 'Donation', 'AEBX6P5G0FVR9LS', 10, '27/01/2024', 'failure'),
(317, 'J298JMOAC65O8IA', 'Anubhav Shavaran', 'Registration Fee', '5YZHMUYW7ZVKYVS', 1, '27/01/2024', 'success'),
(318, 'J298JMOAC65O8IA', 'Anubhav Shavaran', 'Registration Fee', 'TN2O5WQ296F383K', 1, '27/01/2024', 'success'),
(319, 'J298JMOAC65O8IA', 'Anubhav Shavaran', 'Registration Fee', 'N37X28J9MDHU84F', 1, '27/01/2024', 'success'),
(320, 'VMLFODVFO0XJ5FF', 'Anubhav Shavaran', 'Registration Fee', 'Z8PKEQ60Q3MI5IB', 1, '27/01/2024', 'success'),
(321, '12MO7V0HPVBGUXC', 'Alex', 'Registration Fee', 'SHYT0SDD4CW2SD0', 1, '27/01/2024', 'success'),
(322, 'R2FB6OJSRDPL5ZQ', 'Alex 2 ', 'Registration Fee', '6KBO2F100DJWVT2', 10, '27/01/2024', 'success'),
(323, 'EF39GHTHKQVHQH3', 'Anubhav Shavaran ', 'Registration Fee', 'KGYQSEXQG3OHP22', 10, '30/01/2024', 'success'),
(324, '9PI29HP9V9TIE24', 'Anubhav Shavaran', 'Registration Fee', 'PFJWPPCTLK4ETVS', 1, '30/01/2024', 'success'),
(325, 'KLEN8E7OJ4VD62T', 'Anubhav Shavaran', 'Registration Fee', 'KV91JSSEG3ICM8N', 1, '30/01/2024', 'success'),
(326, 'Z937FW9IP9RMN71', 'SHILPA CHARANTIMATH', 'Registration Fee', '2Q9F86SSUJBOR30', 1, '31/01/2024', 'success'),
(327, 'W6MLNJU788JYXW4', 'Alex 2', 'Registration Fee', 'WXREX1WVSRRZHFT', 1, '31/01/2024', 'success'),
(328, 'From Donations', '', 'Registration Fee', 'IBNREKO0ES8CVPJ', 10, '22/03/2024', 'failure');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity`
--
ALTER TABLE `activity`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `app_config`
--
ALTER TABLE `app_config`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assessment_form_questions`
--
ALTER TABLE `assessment_form_questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assessment_form_responses`
--
ALTER TABLE `assessment_form_responses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assessment_questions_code`
--
ALTER TABLE `assessment_questions_code`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assessment_questions_options`
--
ALTER TABLE `assessment_questions_options`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event_details`
--
ALTER TABLE `event_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_data`
--
ALTER TABLE `payment_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `referrals`
--
ALTER TABLE `referrals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `small_data`
--
ALTER TABLE `small_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_data`
--
ALTER TABLE `users_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_score`
--
ALTER TABLE `users_score`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_transaction`
--
ALTER TABLE `users_transaction`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity`
--
ALTER TABLE `activity`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=292;

--
-- AUTO_INCREMENT for table `app_config`
--
ALTER TABLE `app_config`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `assessment_form_questions`
--
ALTER TABLE `assessment_form_questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;

--
-- AUTO_INCREMENT for table `assessment_form_responses`
--
ALTER TABLE `assessment_form_responses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1201;

--
-- AUTO_INCREMENT for table `assessment_questions_code`
--
ALTER TABLE `assessment_questions_code`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `assessment_questions_options`
--
ALTER TABLE `assessment_questions_options`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT for table `event_details`
--
ALTER TABLE `event_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `payment_data`
--
ALTER TABLE `payment_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `referrals`
--
ALTER TABLE `referrals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `small_data`
--
ALTER TABLE `small_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131;

--
-- AUTO_INCREMENT for table `users_data`
--
ALTER TABLE `users_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `users_score`
--
ALTER TABLE `users_score`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT for table `users_transaction`
--
ALTER TABLE `users_transaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=329;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
