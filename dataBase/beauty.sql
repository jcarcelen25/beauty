-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-03-2022 a las 05:09:01
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `beauty`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ads`
--

CREATE TABLE `ads` (
  `ads_id` int(11) NOT NULL,
  `ads_type` int(11) NOT NULL,
  `ads_count` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `ads`
--

INSERT INTO `ads` (`ads_id`, `ads_type`, `ads_count`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 5, 0),
(4, 10, 0);

--
-- Disparadores `ads`
--
DELIMITER $$
CREATE TRIGGER `ads_update` AFTER UPDATE ON `ads` FOR EACH ROW INSERT INTO ads_audit (ads_id, ads_type, ads_count, audit_date)
VALUES (new.ads_id, new.ads_type, '1', NOW())
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ads_audit`
--

CREATE TABLE `ads_audit` (
  `audit_id` int(11) NOT NULL,
  `ads_id` int(11) NOT NULL,
  `ads_type` int(11) NOT NULL,
  `ads_count` int(11) NOT NULL,
  `audit_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `author`
--

CREATE TABLE `author` (
  `author_id` int(11) NOT NULL,
  `author_user` varchar(100) NOT NULL,
  `author_password` varchar(100) NOT NULL,
  `author_status` int(1) NOT NULL,
  `lastupdated` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `author`
--

INSERT INTO `author` (`author_id`, `author_user`, `author_password`, `author_status`, `lastupdated`) VALUES
(4, 'juan.carcelen.1994@gmail.com', 'bdb2e6c45c37d9dc989ed77e31994bebfad2ff4e496fe9511681dd4b5811d243', 2, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `config`
--

CREATE TABLE `config` (
  `config_id` int(11) NOT NULL,
  `config_title` varchar(250) NOT NULL,
  `config_value` varchar(250) NOT NULL,
  `lastupdated` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `config`
--

INSERT INTO `config` (`config_id`, `config_title`, `config_value`, `lastupdated`) VALUES
(1, 'Donar $5', 'https://payp.page.link/hvhW ', 1),
(2, 'Donar $2', 'https://payp.page.link/332Z', 4),
(3, 'Donar $10', 'https://payp.page.link/1Wwx', 4),
(4, 'Donar $1', 'https://payp.page.link/fKnk', 4),
(5, 'correo', 'info@beauty-photo.website', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `count`
--

CREATE TABLE `count` (
  `count_id` int(11) NOT NULL,
  `count_name` varchar(250) NOT NULL,
  `count_type` int(11) NOT NULL,
  `count_ammount` double NOT NULL,
  `count_date` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `image`
--

CREATE TABLE `image` (
  `image_id` int(11) NOT NULL,
  `image_url` varchar(150) NOT NULL,
  `image_type` tinyint(1) NOT NULL,
  `image_position` int(11) NOT NULL,
  `image_status` tinyint(1) NOT NULL,
  `id_post` int(11) NOT NULL,
  `lastupdated` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `image`
--

INSERT INTO `image` (`image_id`, `image_url`, `image_type`, `image_position`, `image_status`, `id_post`, `lastupdated`) VALUES
(1, '1645449010.jpg', 2, 1, 1, 1, 4),
(2, '1645449525.jpg', 2, 1, 1, 2, 4),
(3, '1645449725.jpg', 2, 1, 1, 9, 4),
(4, '1645450652.jpg', 1, 1, 1, 1, 4),
(5, '1645450664.jpg', 1, 6, 1, 1, 4),
(6, '1645450671.jpg', 1, 12, 1, 1, 4),
(7, '1645451478.jpg', 1, 2, 1, 1, 4),
(8, '1645451504.jpg', 1, 3, 1, 1, 4),
(9, '1645451521.jpg', 1, 13, 1, 1, 4),
(10, '1645451778.jpg', 1, 4, 1, 1, 4),
(11, '1645451954.jpg', 1, 5, 1, 1, 4),
(12, '1645452100.jpg', 1, 7, 1, 1, 4),
(13, '1645452180.jpg', 1, 8, 1, 1, 4),
(14, '1645492098.jfif', 1, 9, 1, 1, 4),
(15, '1645452725.jpg', 1, 10, 1, 1, 4),
(16, '1645452827.jpg', 1, 11, 1, 1, 4),
(17, '1645452882.jpg', 1, 16, 1, 1, 4),
(18, '1645453371.jpg', 1, 14, 1, 1, 4),
(19, '1645453475.jpg', 1, 15, 1, 1, 4),
(20, '1645463750.jpg', 1, 17, 1, 1, 4),
(21, '1645464158.jpg', 1, 15, 1, 2, 4),
(22, '1645464188.jpg', 1, 12, 1, 2, 4),
(23, '1645464256.jpg', 1, 2, 1, 2, 4),
(24, '1645464296.jpg', 1, 14, 1, 2, 4),
(25, '1645464319.jpg', 1, 8, 1, 2, 4),
(26, '1645464381.jpg', 1, 4, 1, 2, 4),
(27, '1645464427.jpg', 1, 9, 1, 2, 4),
(28, '1645464519.jpg', 1, 3, 1, 2, 4),
(29, '1645464577.jpg', 1, 5, 1, 2, 4),
(30, '1645464634.jpg', 1, 7, 1, 2, 4),
(31, '1645464793.jpg', 1, 10, 1, 2, 4),
(32, '1645464926.jpg', 1, 6, 1, 2, 4),
(33, '1645465007.jpeg', 1, 11, 1, 2, 4),
(34, '1645465026.jpg', 1, 13, 1, 2, 4),
(35, '1645465433.jpg', 1, 16, 1, 1, 4),
(36, '1645466136.jpg', 1, 2, 1, 3, 4),
(37, '1645466147.jpg', 1, 3, 1, 3, 4),
(38, '1645466156.jpg', 1, 4, 1, 3, 4),
(39, '1645466167.jpg', 1, 5, 1, 3, 4),
(40, '1645466176.jpg', 1, 6, 1, 3, 4),
(41, '1645466185.jpg', 1, 7, 1, 3, 4),
(42, '1645466200.jpg', 1, 8, 1, 3, 4),
(43, '1645466224.png', 1, 9, 1, 3, 4),
(44, '1645466235.jpg', 1, 10, 1, 3, 4),
(45, '1645466244.jpg', 1, 11, 1, 3, 4),
(46, '1645466265.jpg', 1, 12, 1, 3, 4),
(47, '1645466286.jpg', 1, 13, 1, 3, 4),
(48, '1645466295.jpg', 1, 14, 1, 3, 4),
(49, '1645466306.jpg', 1, 15, 1, 3, 4),
(50, '1645466354.jpg', 1, 15, 1, 3, 4),
(51, '1645466375.jpg', 1, 16, 1, 3, 4),
(52, '1645466436.jpg', 3, 1, 1, 3, 4),
(53, '1645471446.jpg', 1, 2, 1, 5, 4),
(54, '1645471457.jpg', 1, 10, 1, 5, 4),
(55, '1645471484.jpg', 1, 15, 1, 5, 4),
(56, '1645471520.jpg', 1, 3, 1, 5, 4),
(57, '1645471535.jpg', 1, 5, 1, 5, 4),
(58, '1645471609.jpg', 1, 4, 1, 5, 4),
(59, '1645471753.jpg', 3, 1, 1, 5, 4),
(60, '1645472278.jpg', 1, 6, 1, 5, 4),
(61, '1645472403.jpg', 1, 7, 1, 5, 4),
(62, '1645472411.jpg', 1, 14, 1, 5, 4),
(63, '1645472644.jpg', 1, 8, 1, 5, 4),
(64, '1645472711.jpg', 1, 9, 1, 5, 4),
(65, '1645472921.jpg', 1, 11, 1, 5, 4),
(66, '1645473329.jpg', 1, 12, 1, 5, 4),
(67, '1645473480.jpg', 1, 13, 1, 5, 4),
(68, '1645474545.jpg', 1, 2, 1, 9, 4),
(69, '1645474556.jpg', 1, 3, 1, 9, 4),
(70, '1645474565.jpg', 1, 4, 1, 9, 4),
(71, '1645474575.jpg', 1, 5, 1, 9, 4),
(72, '1645474599.jpg', 1, 6, 1, 9, 4),
(73, '1645474610.jpg', 1, 7, 1, 9, 4),
(74, '1645474617.jpeg', 1, 8, 1, 9, 4),
(75, '1645474625.jpeg', 1, 9, 1, 9, 4),
(76, '1645474650.jpeg', 1, 10, 1, 9, 4),
(77, '1645474668.jpg', 1, 11, 1, 9, 4),
(78, '1645474727.jpg', 1, 12, 1, 9, 4),
(79, '1645474753.jpg', 1, 13, 1, 9, 4),
(80, '1645474856.jpg', 1, 14, 1, 9, 4),
(81, '1645474870.jpg', 1, 15, 1, 9, 4),
(82, '1645475391.png', 1, 2, 1, 4, 4),
(83, '1645475493.jpg', 1, 3, 1, 4, 4),
(84, '1645475501.jpg', 1, 4, 1, 4, 4),
(85, '1645475507.jpg', 1, 5, 1, 4, 4),
(86, '1645475512.jpg', 1, 6, 1, 4, 4),
(87, '1645475520.jpg', 1, 7, 1, 4, 4),
(88, '1645475530.jpg', 1, 8, 1, 4, 4),
(89, '1645475541.jpg', 1, 9, 1, 4, 4),
(90, '1645475549.jpg', 1, 10, 1, 4, 4),
(91, '1645475569.jpg', 1, 11, 1, 4, 4),
(92, '1645475579.jpg', 1, 12, 1, 4, 4),
(93, '1645475590.jpg', 1, 13, 1, 4, 4),
(94, '1645475599.jpg', 1, 14, 1, 4, 4),
(95, '1645475622.jpg', 1, 15, 1, 4, 4),
(96, '1645475668.jpg', 3, 1, 1, 4, 4),
(97, '1645476347.jpg', 3, 1, 1, 6, 4),
(98, '1645476354.jpg', 1, 2, 1, 6, 4),
(99, '1645476373.jpg', 1, 3, 1, 6, 4),
(100, '1645476496.jpg', 1, 4, 1, 6, 4),
(101, '1645476391.jpg', 1, 5, 1, 6, 4),
(102, '1645476400.png', 1, 6, 1, 6, 4),
(103, '1645476410.jpg', 1, 7, 1, 6, 4),
(104, '1645476562.jpg', 1, 8, 1, 6, 4),
(105, '1645476600.jpg', 1, 9, 1, 6, 4),
(106, '1645476621.jpg', 1, 10, 1, 6, 4),
(107, '1645476643.jpg', 1, 11, 1, 6, 4),
(108, '1645476656.jpg', 1, 12, 1, 6, 4),
(109, '1645476677.jpeg', 1, 13, 1, 6, 4),
(110, '1645476683.jpeg', 1, 14, 1, 6, 4),
(111, '1645476689.jpg', 1, 15, 1, 6, 4),
(112, '1645490120.jpg', 3, 1, 1, 7, 4),
(113, '1645490132.jpg', 1, 2, 1, 7, 4),
(114, '1645490142.jpg', 1, 3, 1, 7, 4),
(115, '1645490157.jpg', 1, 4, 1, 7, 4),
(116, '1645490168.jpg', 1, 5, 1, 7, 4),
(117, '1645490188.jpg', 1, 6, 1, 7, 4),
(118, '1645490194.jpg', 1, 7, 1, 7, 4),
(119, '1645490206.jpg', 1, 8, 1, 7, 4),
(120, '1645490212.jpg', 1, 9, 1, 7, 4),
(121, '1645490223.jpg', 1, 10, 1, 7, 4),
(122, '1645490233.jpg', 1, 11, 1, 7, 4),
(123, '1645490242.jpg', 1, 12, 1, 7, 4),
(124, '1645490254.jpg', 1, 14, 1, 7, 4),
(125, '1645490275.jpg', 1, 14, 1, 7, 4),
(126, '1645490282.jpg', 1, 15, 1, 7, 4),
(127, '1645490755.jpg', 1, 2, 1, 8, 4),
(128, '1645490760.jpg', 1, 3, 1, 8, 4),
(129, '1645490766.jpg', 1, 4, 1, 8, 4),
(130, '1645490771.jpg', 1, 5, 1, 8, 4),
(131, '1645490782.jpg', 1, 6, 1, 8, 4),
(132, '1645490788.jpg', 1, 7, 1, 8, 4),
(133, '1645490805.jpg', 1, 8, 1, 8, 4),
(134, '1645490816.jpg', 1, 9, 1, 8, 4),
(135, '1645490825.jpg', 1, 10, 1, 8, 4),
(136, '1645490833.jpg', 1, 11, 1, 8, 4),
(137, '1645490844.jpg', 1, 13, 1, 8, 4),
(138, '1645490849.jpg', 1, 14, 1, 8, 4),
(139, '1645490854.jpg', 1, 15, 1, 8, 4),
(140, '1645490858.jpg', 1, 16, 1, 8, 4),
(141, '1645490932.jpg', 3, 1, 1, 8, 4),
(142, '1647387913.jpg', 1, 2, 1, 10, 4),
(143, '1647387922.jpeg', 1, 8, 1, 10, 4),
(144, '1647387968.jpeg', 1, 3, 1, 10, 4),
(145, '1647387981.jpeg', 1, 15, 1, 10, 4),
(146, '1647388071.jpg', 1, 5, 1, 10, 4),
(147, '1647388107.jpg', 1, 4, 1, 10, 4),
(148, '1647388197.jpg', 3, 6, 1, 10, 4),
(149, '1647388315.jpg', 1, 7, 1, 10, 4),
(150, '1647388405.jpg', 1, 9, 1, 10, 4),
(151, '1647388448.jpg', 1, 10, 1, 10, 4),
(152, '1647388808.jpg', 1, 11, 1, 10, 4),
(153, '1647388866.jpg', 1, 1, 1, 10, 4),
(154, '1647388896.jpg', 1, 12, 1, 10, 4),
(158, '1647391341.jpg', 1, 16, 1, 10, 4),
(157, '1647388987.jpg', 1, 13, 1, 10, 4),
(159, '1647391670.jpg', 3, 1, 1, 14, 4),
(160, '1647391909.jpg', 1, 2, 1, 14, 4),
(161, '1647391928.jpg', 1, 3, 1, 14, 4),
(162, '1647391941.jpg', 1, 4, 1, 14, 4),
(163, '1647391960.jpg', 1, 5, 1, 14, 4),
(164, '1647391981.jpg', 1, 6, 1, 14, 4),
(165, '1647392008.jpg', 1, 7, 1, 14, 4),
(166, '1647392025.jpg', 1, 8, 1, 14, 4),
(167, '1647392037.jpg', 1, 9, 1, 14, 4),
(168, '1647392062.jpg', 1, 11, 1, 14, 4),
(169, '1647392082.jpg', 1, 10, 1, 14, 4),
(170, '1647392097.jpg', 1, 12, 1, 14, 4),
(171, '1647392106.jpg', 1, 13, 1, 14, 4),
(172, '1647392116.jpg', 1, 14, 1, 14, 4),
(173, '1647392134.jpg', 1, 15, 1, 14, 4),
(174, '1647392145.jpg', 1, 16, 1, 14, 4),
(175, '1647392160.jpg', 1, 17, 1, 14, 4),
(176, '1647394511.jpg', 3, 1, 1, 17, 4),
(177, '1647394535.jpg', 1, 2, 1, 17, 4),
(180, '1647394611.jpg', 1, 4, 1, 17, 4),
(179, '1647394569.jpg', 1, 3, 1, 17, 4),
(181, '1647394639.jpg', 1, 5, 1, 17, 4),
(182, '1647394653.jpg', 1, 6, 1, 17, 4),
(183, '1647394674.jpg', 1, 7, 1, 17, 4),
(184, '1647394697.jpg', 1, 8, 1, 17, 4),
(185, '1647394804.jpg', 1, 9, 1, 17, 4),
(186, '1647394818.jpg', 1, 10, 1, 17, 4),
(187, '1647394852.jpg', 1, 11, 1, 17, 4),
(188, '1647394871.jpg', 1, 12, 1, 17, 4),
(189, '1647394892.jpg', 1, 13, 1, 17, 4),
(190, '1647394905.jpg', 1, 14, 1, 17, 4),
(191, '1647394918.jpg', 1, 15, 1, 17, 4),
(192, '1647394927.jpg', 1, 16, 1, 17, 4),
(193, '1647394935.jpg', 1, 17, 1, 17, 4),
(194, '1647394960.jpg', 1, 17, 1, 17, 4),
(195, '1647394970.jpg', 1, 18, 1, 17, 4),
(196, '1647394979.jpg', 1, 19, 1, 17, 4),
(197, '1647395013.jpg', 1, 20, 1, 17, 4),
(198, '1647395035.jpg', 1, 21, 1, 17, 4),
(199, '1647396428.jpg', 3, 1, 1, 18, 4),
(200, '1647396782.jpg', 1, 2, 1, 18, 4),
(201, '1647396793.jpg', 1, 3, 1, 18, 4),
(202, '1647396807.jpg', 1, 4, 1, 18, 4),
(203, '1647396831.jpg', 1, 5, 1, 18, 4),
(204, '1647396841.jpg', 1, 6, 1, 18, 4),
(205, '1647396850.jpg', 1, 7, 1, 18, 4),
(206, '1647396859.jpg', 1, 8, 1, 18, 4),
(207, '1647396889.jpg', 1, 9, 1, 18, 4),
(208, '1647396915.jpg', 1, 10, 1, 18, 4),
(209, '1647396923.jpg', 1, 11, 1, 18, 4),
(210, '1647396932.jpg', 1, 12, 1, 18, 4),
(211, '1647396962.jpg', 1, 13, 1, 18, 4),
(212, '1647396974.jpg', 1, 15, 1, 18, 4),
(213, '1647396990.jpeg', 1, 14, 1, 18, 4),
(214, '1647397010.jpg', 1, 16, 1, 18, 4),
(215, '1647397026.jpg', 1, 17, 1, 18, 4),
(216, '1647447483.jpg', 3, 1, 1, 19, 4),
(217, '1647447518.jpg', 1, 2, 1, 19, 4),
(218, '1647447529.jpg', 1, 3, 1, 19, 4),
(219, '1647447539.jpg', 1, 5, 1, 19, 4),
(220, '1647447556.jpg', 1, 4, 1, 19, 4),
(221, '1647447575.jpg', 1, 6, 1, 19, 4),
(222, '1647447702.jpg', 1, 7, 1, 19, 4),
(223, '1647447749.jpg', 1, 8, 1, 19, 4),
(224, '1647447763.jpg', 1, 9, 1, 19, 4),
(225, '1647447782.jpg', 1, 10, 1, 19, 4),
(226, '1647447803.jpg', 1, 11, 1, 19, 4),
(227, '1647447818.jpg', 1, 12, 1, 19, 4),
(228, '1647447827.jpg', 1, 13, 1, 19, 4),
(229, '1647447848.jpg', 1, 14, 1, 19, 4),
(230, '1647447858.jpg', 1, 15, 1, 19, 4),
(231, '1647447867.jpg', 1, 16, 1, 19, 4),
(232, '1647451284.jpg', 3, 1, 1, 21, 4),
(233, '1647451318.jpg', 1, 2, 1, 21, 4),
(234, '1647451328.jpg', 1, 3, 1, 21, 4),
(235, '1647451336.jpg', 1, 4, 1, 21, 4),
(236, '1647451348.jpg', 1, 5, 1, 21, 4),
(237, '1647451361.jpg', 1, 6, 1, 21, 4),
(238, '1647451371.jpg', 1, 7, 1, 21, 4),
(239, '1647451393.jpg', 1, 8, 1, 21, 4),
(240, '1647451405.jpg', 1, 9, 1, 21, 4),
(241, '1647451419.jpg', 1, 10, 1, 21, 4),
(242, '1647451430.jpg', 1, 11, 1, 21, 4),
(243, '1647451440.jpg', 1, 12, 1, 21, 4),
(244, '1647451448.jpg', 1, 13, 1, 21, 4),
(245, '1647451456.jpg', 1, 14, 1, 21, 4),
(246, '1647451466.jpg', 1, 15, 1, 21, 4),
(247, '1647623761.jpg', 3, 1, 1, 22, 4),
(248, '1647624161.jpg', 1, 2, 1, 22, 4),
(249, '1647624171.jpg', 1, 3, 1, 22, 4),
(250, '1647624182.jpg', 1, 4, 1, 22, 4),
(251, '1647624203.jpg', 1, 5, 1, 22, 4),
(252, '1647624217.jpg', 1, 6, 1, 22, 4),
(253, '1647624229.jpg', 1, 8, 1, 22, 4),
(254, '1647624247.jpg', 1, 7, 1, 22, 4),
(255, '1647624269.jpg', 1, 9, 1, 22, 4),
(256, '1647624277.jpg', 1, 10, 1, 22, 4),
(257, '1647624286.jpg', 1, 11, 1, 22, 4),
(258, '1647624297.jpg', 1, 13, 1, 22, 4),
(259, '1647624310.jpg', 1, 14, 1, 22, 4),
(260, '1647624320.jpg', 1, 15, 1, 22, 4),
(261, '1647625994.jpg', 3, 1, 1, 20, 4),
(262, '1647626027.jpg', 1, 2, 1, 20, 4),
(263, '1647626034.jpg', 1, 3, 1, 20, 4),
(264, '1647626041.jpg', 1, 4, 1, 20, 4),
(265, '1647626605.jpg', 1, 5, 1, 20, 4),
(266, '1647628200.jpg', 1, 6, 1, 20, 4),
(267, '1647628210.jpg', 1, 7, 1, 20, 4),
(268, '1647628218.jpg', 1, 8, 1, 20, 4),
(269, '1647628226.jpg', 1, 9, 1, 20, 4),
(270, '1647628373.jpg', 1, 10, 1, 20, 4),
(271, '1647628383.jpg', 1, 11, 1, 20, 4),
(272, '1647628391.jpg', 1, 12, 1, 20, 4),
(273, '1647628420.jpg', 1, 13, 1, 20, 4),
(274, '1647628426.jpg', 1, 14, 1, 20, 4),
(275, '1647628434.jpeg', 1, 15, 1, 20, 4),
(276, '1647628444.jpg', 1, 16, 1, 20, 4),
(277, '1647628452.jpg', 1, 17, 1, 20, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `newsletter`
--

CREATE TABLE `newsletter` (
  `newsletter_id` int(11) NOT NULL,
  `newsletter_email` varchar(50) NOT NULL,
  `newsletter_date` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `newsletter`
--

INSERT INTO `newsletter` (`newsletter_id`, `newsletter_email`, `newsletter_date`) VALUES
(1, 'juan.carcelen.1994@gmail.com', '2022-03-15 23:20:36'),
(3, 'blackpanter_yp@hotmail.com', '2022-03-15 17:38:48');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `post`
--

CREATE TABLE `post` (
  `post_id` int(11) NOT NULL,
  `post_title` varchar(75) NOT NULL,
  `post_meta_title` varchar(100) NOT NULL,
  `post_slug` varchar(100) NOT NULL,
  `post_summary` tinytext NOT NULL,
  `post_published` datetime NOT NULL,
  `post_content` text NOT NULL,
  `post_views` int(11) NOT NULL DEFAULT 0,
  `post_likes` int(11) NOT NULL,
  `post_status` tinyint(1) NOT NULL,
  `id_author` int(11) NOT NULL,
  `lastupdated` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `post`
--

INSERT INTO `post` (`post_id`, `post_title`, `post_meta_title`, `post_slug`, `post_summary`, `post_published`, `post_content`, `post_views`, `post_likes`, `post_status`, `id_author`, `lastupdated`) VALUES
(1, '¿Cómo vestir para ir a la playa?', '¿Cómo vestir para ir a la playa?', 'vestir-en-la-playa', 'El clima cálido está cerca, amigos, lo que significa que, si tiene suerte, hay un océano o una piscina en su futuro inmediato. Ya sea que pueda visitar las costas soleadas una vez en su vida o una vez a la semana, seguramente se encontrará con el últ', '2022-02-20 18:36:51', 'Claro, todos nos ponemos trajes de baño y gafas de sol mientras nos sentamos en la arena, pero a veces, necesitas algo un poco más. Para los momentos en los que no estés seguro de qué diablos ponerte mientras saltas (o dentro, según la situación) de las mareas entrantes, siempre es mejor recurrir a los expertos. Con esto, por supuesto, me refiero a bloggers, influencers, amantes de la moda y similares. Están aquí para mostrarnos a todos un par de cosas sobre cómo vestirse cuando se dirige a la playa, cariño.', 0, 0, 1, 4, 4),
(2, '¿Qué lencería favorece a cada tipo de cuerpo?', '¿Qué lencería favorece a cada tipo de cuerpo?', 'lenceria-segun-tu-cuerpo', 'Cuando se trata de los cuerpos de las mujeres, hay una variedad infinita de formas y tamaños que hacen que cada mujer sea hermosa y única. Con el tiempo, sin embargo, las distintas proporciones del cuerpo han llegado a clasificarse en cinco categorías ', '2022-02-20 18:39:28', '', 0, 0, 1, 4, 4),
(3, 'Conjuntos: lencería para todos los tipos de cuerpo', 'Conjuntos: lencería para todos los tipos de cuerpo', 'lenceria-para-todos-los-cuerpos', 'Como sugiere el nombre, un conjunto a juego incorpora a juego tu sostén y tus bragas. Este enfoque femenino y coqueto de la lencería se adapta a todos los tipos de cuerpo, ya que llama la atención sobre el cuerpo y el conjunto como un todo, en lugar de', '2022-02-20 18:53:52', '', 0, 0, 1, 4, 4),
(4, 'Ligueros: lencería para cinturas delgadas', 'Ligueros: lencería para cinturas delgadas', 'ligueros-lenceria-para-cinturas-delgadas', 'Esta lencería es ideal para mujeres con forma de reloj de arena que quieren enfatizar su cintura. Además, es un ganador para las mujeres que buscan llamar la atención sobre sus piernas.&amp;amp;lt;br&amp;amp;gt;\r\nEsta pieza se envuelve alrededor de la ', '2022-02-20 18:55:30', '', 0, 0, 1, 4, 4),
(5, 'Corsé: lencería para cinturas delgadas', 'Corsé: lencería para cinturas delgadas', 'corse-lenceria-para-cinturas-delgadas', 'A lo largo de la historia, el propósito y el simbolismo del corsé han cambiado varias veces. Una vez visto como un objeto de poder patriarcal y una prenda restrictiva, en los últimos tiempos, este equilibrio de poder ahora ha vuelto a las mujeres. Impo', '2022-02-20 18:56:48', '', 0, 0, 1, 4, 4),
(6, 'Corpiño: lencería para busto pequeño', 'Corpiño: lencería para busto pequeño', 'corpino-lenceria-para-busto-pequeno', 'Similar a un corsé, el bustier refuerza la silueta curvilínea de reloj de arena de la forma femenina. Esta pieza ceñida trabaja para empujar hacia arriba el busto mientras da forma a la cintura para crear la figura más atractiva. Con el poder de estre', '2022-02-20 18:58:58', '', 0, 0, 1, 4, 4),
(7, 'Enterizo: lencería para cuerpos anchos', 'Enterizo: lencería para cuerpos anchos', 'enterizo-lenceria-para-cuerpos-anchos', 'Usar un enterizo es definitivamente sexy. El equivalente en lencería del traje de baño de una pieza, el enterizo es una pieza divertida que se adapta a todos los tipos de cuerpo. Disponible en encaje, cuero, malla y una gama de otras telas, cortes y est', '2022-02-20 19:03:10', '', 0, 0, 1, 4, 4),
(8, 'Negligés: lencería para cuerpos delgados', 'Negligés: lencería para cuerpos delgados', 'negliges-lenceria-para-cuerpos-delgados', 'Introducido en Francia en el siglo XVIII, el negligé está estrechamente asociado con el romance y la feminidad. Esta prenda transparente es esencialmente una alternativa más delicada y coqueta a tu bata cálida y difusa. Úselo sobre su lencería favor', '2022-02-20 19:04:37', '', 0, 0, 1, 4, 4),
(9, 'Babydoll: lencería para cinturas delgadas', 'Babydoll: lencería para cinturas delgadas', 'babydoll-lenceria-para-cinturas-delgadas', 'Los vestidos babydoll flotantes son excelentes para las mujeres con forma de triángulo invertido, es decir, mujeres con hombros anchos y cintura comparativamente pequeña. Los tirantes suaves de esta pieza realzarán tus hombros, mientras que la falda co', '2022-02-20 19:06:23', '', 0, 0, 1, 4, 4),
(10, 'Camisola: lencería para piernas largas', 'Camisola: lencería para piernas largas', 'camisola-lenceria-para-piernas-largas', 'Muestra tus piernas con una hermosa camisola sedosa que es a la vez muy seductora y un sueño para dormir. Con un conjunto a juego de una blusa de seda delicada y pantalones cortos a juego, la camisola es ideal para las cálidas noches de verano y las fie', '2022-02-20 19:07:51', '', 0, 0, 1, 4, 4),
(11, 'Camisón: lencería para piernas largas', 'Camisón: lencería para piernas largas', 'camison-lenceria-para-piernas-largas', 'Una opción delicada y femenina cuando se trata de lencería y ropa de dormir, la camisola es un vestido sencillo y corto que cuelga directamente de los hombros. Popularizada en la década de 1920, esta prenda interior es hermosa en seda suave y relucient', '2022-02-20 19:09:40', '', 0, 0, 1, 4, 4),
(12, 'Bodystocking: lencería para cuerpos pequeños y delgados', 'Bodystocking: lencería para cuerpos pequeños y delgados', 'bodystocking-lenceria-para-cuerpos-pequenos', 'Esta prenda súper ajustada de una sola pieza llega desde la punta de los dedos de los pies, sube por las piernas, atraviesa el torso hasta el cuello y baja por los brazos. Una pieza que marca la diferencia, el bodystocking a menudo está hecho de tela tr', '2022-02-20 19:11:23', '', 0, 0, 1, 4, 4),
(13, 'Body Suit: lencería para caderas anchas', 'Body Suit: lencería para caderas anchas', 'body-suit-lenceria-para-caderas-anchas', 'Al igual que los enterizos y los mamelucos, el Body Suit es una prenda de lencería que actúa como una sola pieza. Esto significa que la mitad superior e inferior de estilo bralette de la prenda están conectadas. En general, si es corto y de encaje, pod', '2022-02-20 19:13:31', '', 0, 0, 1, 4, 4),
(14, 'Brassiere: lencería para busto voluptuoso', 'Brassiere: lencería para busto voluptuoso', 'brassiere-lenceria-para-busto-voluptuoso', 'El brassiereclásico, o sostén, como se le conoce comúnmente, ha sido una prenda de lencería básica para las mujeres desde que recibió su nombre por primera vez en 1907. Aunque existía mucho antes de esta fecha, fue durante este tiempo que se convir', '2022-02-20 19:14:58', '', 0, 0, 1, 4, 4),
(15, 'Slip: lencería para hombros anchos', 'Slip: lencería para hombros anchos', 'slip-lenceria-para-hombros-anchos', 'En los últimos años, la combinación elegante se ha abierto camino fuera del dormitorio y en las calles, ya que esta pieza se ha convertido en un artículo de moda para todos los días. Sin embargo, tradicionalmente, este sexy vestido \'sin cordones\' est', '2022-02-20 19:53:09', '', 0, 0, 1, 4, 4),
(16, 'Mameluco: lencería para piernas largas', 'Mameluco: lencería para piernas largas', 'mameluco-lenceria-para-piernas-largas', 'Como el equivalente en lencería del mono corto, el mameluco es una prenda divertida y juvenil. El corte típicamente alto llamará la atención sobre las piernas, mientras que la forma de una sola pieza enfatizará las bellas curvas. Sin embargo, si eres', '2022-02-20 19:54:28', '', 0, 0, 1, 4, 4),
(17, 'Tanga: lencería para cuerpos esbeltos', 'Tanga: lencería para cuerpos esbeltos', 'tanga-lenceria-para-cuerpos-esbeltos', 'La alternativa descarada a la ropa interior clásica, la tanga es una excelente manera de verse y sentirse bien. Este estilo elimina instantáneamente esas líneas molestas creadas por la lencería típica cuando se usa ropa ajustada. Además, también mo', '2022-02-20 19:56:08', '', 0, 0, 1, 4, 4),
(18, 'Conoce la ducha correcta según tu edad', 'Conoce la ducha correcta según tu edad', 'conoce-la-ducha-correcta-segun-tu-edad', 'Relajarse debajo de la ducha después de una larga jornada de trabajo, de una buena actividad física, o en pleno verano puede parecer una de las cosas más placenteras y sencillas de todo el día. Pero ¿lo estamos haciendo bien? Los especialistas apunta', '2022-03-15 20:49:35', 'Por la mañana o por la noche reporta diferentes beneficios. Así lo ha demostrado la doctora en psicología de Harvard, Shelley Carson, quien asegura que la ducha por la mañana nos ayuda a estar relajados y, a la vez, a mantenernos en alerta, y además hace que se fomente la creatividad. Mientras que por la noche, la ducha nos ayuda a irnos a la cama más relajados. En parte porque el agua puede ayudar a regular la temperatura corporal, lo que induce el sueño. Así que optar por una o por la otra dependerá de la necesidad de cada persona.', 0, 0, 1, 4, 4),
(19, 'Fotos artísticas en blanco y negro', 'Fotos artísticas en blanco y negro', 'fotos-artisticas-blanco-y-negro', 'Cuando fotografías personas en color, fotografías su ropa. Cuando fotografías personas en blanco y negro, fotografías su alma.', '2022-03-16 10:45:07', 'La fotografía en blanco y negro es un género fotográfico en el cual la imagen se caracteriza por la ausencia de color. Este tipo de fotografía se basa, en cambio, en tonalidades que van del blanco al negro pasando por los tonos medios (grises). Por ello también puedes oír hablar de ella como fotografía monocroma o en escala de grises.', 0, 0, 1, 4, 0),
(20, '¿Cuál es el origen de los tatuajes?', '¿Cuál es el origen de los tatuajes?', 'cual-es-el-origen-de-los-tatuajes', 'El mundo del tatuaje nos parece algo tan moderno que, posiblemente, no nos hayamos percatado del hecho de que este arte es realmente milenario y, quizás, uno de los primeros en conocerse en la Tierra.', '2022-03-16 10:48:45', 'El origen del tatuaje no se sabe con exactitud, ya que se cree que este arte era conocido por numerosas culturas alrededor del mundo, pero practicado de forma diferente. Se apunta a los hombres euroasiáticos del periodo Neolítico como los primeros &quot;tatuadores&quot;, hace más 5 mil años, a juzgar por los restos encontrados a finales del siglo XX, en Siberia y el delta del Danubio. \r\n\r\nA partir de entonces, se sabe que en Egipto, lugar del que provienen los pigmentos de henna (que se convertiría también en un fenómeno en el sur de la India), las mujeres eran tatuadas para representar su estatus social y muchos momias eran marcadas.\r\n\r\nAl mismo tiempo, la cultura celta y germánica utilizaban el arte del tatuaje con fines bélicos; los japoneses tatuaban figuritas de barro que acompañaban a los difuntos en su camino al paraíso, y los aztecas tatuaban especialmente a los niños con tal de rendir tributo a dioses como Quauhtli.', 0, 0, 1, 4, 0),
(21, 'Cosplay Vol I', 'Cosplay Vol I', 'cosplay-vol-i', 'El término cosplay no forma parte del diccionario de la Real Academia Española (RAE). De todos modos, este concepto de origen inglés se utiliza en nuestra lengua para referirse a la tendencia o el hábito de utilizar disfraces a modo de entretenimiento', '2022-03-16 12:13:32', 'Cosplay procede de la expresión costume play, que puede traducirse como “juego de disfraz”. Actualmente el cosplay puede considerarse como una subcultura: sus integrantes buscan representar una idea o encarnar a algún personaje a través de su vestimenta e incluso interpretando un rol.\r\n\r\nPor lo general el cosplay se basa en personajes de las historietas, el anime, el cine, los videojuegos o la literatura. Quien se disfraza y participa de este tipo de acciones recibe el nombre de cosplayer.', 0, 0, 1, 4, 4),
(22, 'Halloween Vol I', 'Halloween Vol I', 'halloween-i', 'Halloween, ​​​ también conocido como Víspera de Todos los Santos, ​​ Noche de los Muertos, ​ Noche de Brujas o Allhalloween, ​ es una celebración internacional que se celebra el 31 de octubre, víspera de la fiesta cristiana occidental de', '2022-03-18 12:12:09', 'Los disfraces de Halloween son disfraces que se usan en o alrededor de Halloween, un festival que se celebra el 31 de octubre. Una referencia temprana al uso de disfraces en Halloween proviene de Escocia en 1585, pero pueden ser anteriores a este.', 0, 0, 1, 4, 4);

--
-- Disparadores `post`
--
DELIMITER $$
CREATE TRIGGER `post_update` AFTER UPDATE ON `post` FOR EACH ROW INSERT INTO post_audit (post_id, post_views, audit_date) VALUES (new.post_id, '1', NOW())
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `post_audit`
--

CREATE TABLE `post_audit` (
  `audit_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `post_views` int(11) NOT NULL,
  `audit_date` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `social`
--

CREATE TABLE `social` (
  `social_id` int(11) NOT NULL,
  `social_name` varchar(50) NOT NULL,
  `social_url` varchar(150) NOT NULL,
  `social_icon` varchar(150) NOT NULL,
  `social_position` int(11) NOT NULL,
  `social_status` tinyint(1) NOT NULL,
  `lastupdated` int(11) NOT NULL,
  `social_count` int(11) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `social`
--

INSERT INTO `social` (`social_id`, `social_name`, `social_url`, `social_icon`, `social_position`, `social_status`, `lastupdated`, `social_count`) VALUES
(1, 'facebook', '#', '1647638179.png', 1, 1, 4, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `ads`
--
ALTER TABLE `ads`
  ADD PRIMARY KEY (`ads_id`);

--
-- Indices de la tabla `ads_audit`
--
ALTER TABLE `ads_audit`
  ADD PRIMARY KEY (`audit_id`);

--
-- Indices de la tabla `author`
--
ALTER TABLE `author`
  ADD PRIMARY KEY (`author_id`);

--
-- Indices de la tabla `config`
--
ALTER TABLE `config`
  ADD PRIMARY KEY (`config_id`);

--
-- Indices de la tabla `count`
--
ALTER TABLE `count`
  ADD PRIMARY KEY (`count_id`);

--
-- Indices de la tabla `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`image_id`);

--
-- Indices de la tabla `newsletter`
--
ALTER TABLE `newsletter`
  ADD PRIMARY KEY (`newsletter_id`),
  ADD UNIQUE KEY `newsletter_email` (`newsletter_email`);

--
-- Indices de la tabla `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`post_id`);

--
-- Indices de la tabla `post_audit`
--
ALTER TABLE `post_audit`
  ADD PRIMARY KEY (`audit_id`);

--
-- Indices de la tabla `social`
--
ALTER TABLE `social`
  ADD PRIMARY KEY (`social_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `ads`
--
ALTER TABLE `ads`
  MODIFY `ads_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `ads_audit`
--
ALTER TABLE `ads_audit`
  MODIFY `audit_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `author`
--
ALTER TABLE `author`
  MODIFY `author_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `config`
--
ALTER TABLE `config`
  MODIFY `config_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `count`
--
ALTER TABLE `count`
  MODIFY `count_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `image`
--
ALTER TABLE `image`
  MODIFY `image_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=278;

--
-- AUTO_INCREMENT de la tabla `newsletter`
--
ALTER TABLE `newsletter`
  MODIFY `newsletter_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `post`
--
ALTER TABLE `post`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `post_audit`
--
ALTER TABLE `post_audit`
  MODIFY `audit_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `social`
--
ALTER TABLE `social`
  MODIFY `social_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
