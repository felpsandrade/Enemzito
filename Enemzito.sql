-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 27-Out-2024 às 22:43
-- Versão do servidor: 8.0.39
-- versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `enemzito`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `erros`
--

CREATE TABLE `erros` (
  `id` int NOT NULL,
  `materia` varchar(100) NOT NULL,
  `alternativa_correta` varchar(1) NOT NULL,
  `resposta_usuario` varchar(1) NOT NULL,
  `user_id` int NOT NULL,
  `simulado_id` int NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `perguntas`
--

CREATE TABLE `perguntas` (
  `id` int NOT NULL,
  `imagem` varchar(255) NOT NULL,
  `alternativa_correta` varchar(1) NOT NULL,
  `materia` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `perguntas`
--

INSERT INTO `perguntas` (`id`, `imagem`, `alternativa_correta`, `materia`) VALUES
(1, 'H_2019_A (1).png', 'A', 'Ciências Humanas e suas Tecnologias'),
(2, 'H_2019_A (2).png', 'A', 'Ciências Humanas e suas Tecnologias'),
(3, 'H_2019_B (1).png', 'B', 'Ciências Humanas e suas Tecnologias'),
(4, 'H_2019_B (2).png', 'B', 'Ciências Humanas e suas Tecnologias'),
(5, 'H_2019_B (3).png', 'B', 'Ciências Humanas e suas Tecnologias'),
(6, 'H_2019_B (4).png', 'B', 'Ciências Humanas e suas Tecnologias'),
(7, 'H_2019_B (5).png', 'B', 'Ciências Humanas e suas Tecnologias'),
(8, 'H_2019_C (1).png', 'C', 'Ciências Humanas e suas Tecnologias'),
(9, 'H_2019_C (2).png', 'C', 'Ciências Humanas e suas Tecnologias'),
(10, 'H_2019_C (3).png', 'C', 'Ciências Humanas e suas Tecnologias'),
(11, 'H_2019_C (4).png', 'C', 'Ciências Humanas e suas Tecnologias'),
(12, 'H_2019_C (5).png', 'C', 'Ciências Humanas e suas Tecnologias'),
(13, 'H_2021_A (1).PNG', 'A', 'Ciências Humanas e suas Tecnologias'),
(14, 'H_2021_A (2).PNG', 'A', 'Ciências Humanas e suas Tecnologias'),
(15, 'H_2021_A (3).PNG', 'A', 'Ciências Humanas e suas Tecnologias'),
(16, 'H_2021_A (4).PNG', 'A', 'Ciências Humanas e suas Tecnologias'),
(17, 'H_2021_A (5).PNG', 'A', 'Ciências Humanas e suas Tecnologias'),
(18, 'H_2021_A (6).PNG', 'A', 'Ciências Humanas e suas Tecnologias'),
(19, 'H_2021_A (7).PNG', 'A', 'Ciências Humanas e suas Tecnologias'),
(20, 'H_2021_A (8).PNG', 'A', 'Ciências Humanas e suas Tecnologias'),
(21, 'H_2021_A (9).PNG', 'A', 'Ciências Humanas e suas Tecnologias'),
(22, 'H_2021_A (10).PNG', 'A', 'Ciências Humanas e suas Tecnologias'),
(23, 'H_2021_B (1).PNG', 'B', 'Ciências Humanas e suas Tecnologias'),
(24, 'H_2021_B (2).PNG', 'B', 'Ciências Humanas e suas Tecnologias'),
(25, 'H_2021_B (3).PNG', 'B', 'Ciências Humanas e suas Tecnologias'),
(26, 'H_2021_B (4).PNG', 'B', 'Ciências Humanas e suas Tecnologias'),
(27, 'H_2021_B (5).PNG', 'B', 'Ciências Humanas e suas Tecnologias'),
(28, 'H_2021_B (6).PNG', 'B', 'Ciências Humanas e suas Tecnologias'),
(29, 'H_2021_B (7).PNG', 'B', 'Ciências Humanas e suas Tecnologias'),
(30, 'H_2021_B (8).PNG', 'B', 'Ciências Humanas e suas Tecnologias'),
(31, 'H_2021_B (9).PNG', 'B', 'Ciências Humanas e suas Tecnologias'),
(32, 'H_2021_B (10).PNG', 'B', 'Ciências Humanas e suas Tecnologias'),
(33, 'H_2021_B (11).PNG', 'B', 'Ciências Humanas e suas Tecnologias'),
(34, 'H_2021_B (12).PNG', 'B', 'Ciências Humanas e suas Tecnologias'),
(57, 'H_2021_E (2).PNG', 'E', 'Ciências Humanas e suas Tecnologias'),
(56, 'H_2021_E (1).PNG', 'E', 'Ciências Humanas e suas Tecnologias'),
(55, 'H_2021_D.PNG', 'D', 'Ciências Humanas e suas Tecnologias'),
(54, 'H_2021_D (3).PNG', 'D', 'Ciências Humanas e suas Tecnologias'),
(53, 'H_2021_D (2).PNG', 'D', 'Ciências Humanas e suas Tecnologias'),
(52, 'H_2021_C (6).PNG', 'C', 'Ciências Humanas e suas Tecnologias'),
(51, 'H_2021_C (5).PNG', 'C', 'Ciências Humanas e suas Tecnologias'),
(50, 'H_2021_C (4).PNG', 'C', 'Ciências Humanas e suas Tecnologias'),
(47, 'H_2021_C (1).PNG', 'C', 'Ciências Humanas e suas Tecnologias'),
(48, 'H_2021_C (2).PNG', 'C', 'Ciências Humanas e suas Tecnologias'),
(49, 'H_2021_C (3).PNG', 'C', 'Ciências Humanas e suas Tecnologias'),
(58, 'H_2021_E (3).PNG', 'E', 'Ciências Humanas e suas Tecnologias'),
(59, 'H_2021_E (4).PNG', 'E', 'Ciências Humanas e suas Tecnologias'),
(60, 'H_2021_E (5).PNG', 'E', 'Ciências Humanas e suas Tecnologias'),
(61, 'H_2021_E (6).PNG', 'E', 'Ciências Humanas e suas Tecnologias'),
(62, 'H_2021_E (7).PNG', 'E', 'Ciências Humanas e suas Tecnologias'),
(63, 'H_2021_E (8).PNG', 'E', 'Ciências Humanas e suas Tecnologias'),
(64, 'H_2022_A.png', 'A', 'Ciências Humanas e suas Tecnologias'),
(65, 'H_2022_B (1).png', 'B', 'Ciências Humanas e suas Tecnologias'),
(66, 'H_2022_B (2).png', 'B', 'Ciências Humanas e suas Tecnologias'),
(67, 'H_2022_B (3).png', 'B', 'Ciências Humanas e suas Tecnologias'),
(68, 'H_2022_C.png', 'C', 'Ciências Humanas e suas Tecnologias'),
(69, 'H_2022_D (1).png', 'D', 'Ciências Humanas e suas Tecnologias'),
(70, 'H_2022_D (2).png', 'D', 'Ciências Humanas e suas Tecnologias'),
(71, 'H_2022_D (3).png', 'D', 'Ciências Humanas e suas Tecnologias'),
(72, 'H_2022_E (1).png', 'E', 'Ciências Humanas e suas Tecnologias'),
(73, 'H_2022_E (2).png', 'E', 'Ciências Humanas e suas Tecnologias'),
(74, 'H_2022_E (3).png', 'E', 'Ciências Humanas e suas Tecnologias'),
(75, 'H_2022_E (4).png', 'E', 'Ciências Humanas e suas Tecnologias'),
(76, 'N_2019_A (1).png', 'A', 'Ciências da Natureza e suas Tecnologias'),
(77, 'N_2019_A (2).png', 'A', 'Ciências da Natureza e suas Tecnologias'),
(78, 'N_2019_A (3).png', 'A', 'Ciências da Natureza e suas Tecnologias'),
(85, 'N_2019_B (1).png', 'B', 'Ciências da Natureza e suas Tecnologias'),
(80, 'N_2019_A (4).png', 'A', 'Ciências da Natureza e suas Tecnologias'),
(81, 'N_2019_A (5).png', 'A', 'Ciências da Natureza e suas Tecnologias'),
(82, 'N_2019_A (6).png', 'A', 'Ciências da Natureza e suas Tecnologias'),
(83, 'N_2019_A (7).png', 'A', 'Ciências da Natureza e suas Tecnologias'),
(84, 'N_2019_A (8).png', 'A', 'Ciências da Natureza e suas Tecnologias'),
(86, 'N_2019_B (2).png', 'B', 'Ciências da Natureza e suas Tecnologias'),
(87, 'N_2019_B (3).png', 'B', 'Ciências da Natureza e suas Tecnologias'),
(88, 'N_2019_B (4).png', 'B', 'Ciências da Natureza e suas Tecnologias'),
(89, 'N_2019_B (5).png', 'B', 'Ciências da Natureza e suas Tecnologias'),
(90, 'N_2019_B (6).png', 'B', 'Ciências da Natureza e suas Tecnologias'),
(91, 'N_2019_C (1).png', 'C', 'Ciências da Natureza e suas Tecnologias'),
(92, 'N_2019_C (2).png', 'C', 'Ciências da Natureza e suas Tecnologias'),
(93, 'N_2019_C (3).png', 'C', 'Ciências da Natureza e suas Tecnologias'),
(94, 'N_2019_C (4).png', 'C', 'Ciências da Natureza e suas Tecnologias'),
(95, 'N_2019_C (5).png', 'C', 'Ciências da Natureza e suas Tecnologias'),
(96, 'N_2019_C (6).png', 'C', 'Ciências da Natureza e suas Tecnologias'),
(97, 'N_2019_D (1).png', 'D', 'Ciências da Natureza e suas Tecnologias'),
(98, 'N_2019_D (2).png', 'D', 'Ciências da Natureza e suas Tecnologias'),
(99, 'N_2019_D (3).png', 'D', 'Ciências da Natureza e suas Tecnologias'),
(100, 'N_2019_D (4).png', 'D', 'Ciências da Natureza e suas Tecnologias'),
(101, 'N_2019_D (5).png', 'D', 'Ciências da Natureza e suas Tecnologias'),
(102, 'N_2019_D (6).png', 'D', 'Ciências da Natureza e suas Tecnologias'),
(103, 'N_2019_D (7).png', 'D', 'Ciências da Natureza e suas Tecnologias'),
(104, 'N_2019_D (8).png', 'D', 'Ciências da Natureza e suas Tecnologias'),
(105, 'N_2019_D (9).png', 'D', 'Ciências da Natureza e suas Tecnologias'),
(106, 'N_2019_E (1).png', 'E', 'Ciências da Natureza e suas Tecnologias'),
(107, 'N_2019_E (2).png', 'E', 'Ciências da Natureza e suas Tecnologias'),
(108, 'N_2019_E (3).png', 'E', 'Ciências da Natureza e suas Tecnologias'),
(109, 'N_2019_E (4).png', 'E', 'Ciências da Natureza e suas Tecnologias'),
(110, 'N_2019_E (5).png', 'E', 'Ciências da Natureza e suas Tecnologias'),
(111, 'N_2019_E (6).png', 'E', 'Ciências da Natureza e suas Tecnologias'),
(112, 'N_2019_E (7).png', 'E', 'Ciências da Natureza e suas Tecnologias'),
(113, 'N_2019_E (8).png', 'E', 'Ciências da Natureza e suas Tecnologias'),
(114, 'N_2021_A (1).PNG', 'A', 'Ciências da Natureza e suas Tecnologias'),
(115, 'N_2021_A (2).PNG', 'A', 'Ciências da Natureza e suas Tecnologias'),
(116, 'N_2021_A (3).PNG', 'A', 'Ciências da Natureza e suas Tecnologias'),
(117, 'N_2021_A (4).PNG', 'A', 'Ciências da Natureza e suas Tecnologias'),
(118, 'N_2021_A (5).PNG', 'A', 'Ciências da Natureza e suas Tecnologias'),
(119, 'N_2021_A (6).PNG', 'A', 'Ciências da Natureza e suas Tecnologias'),
(120, 'N_2021_B (1).PNG', 'B', 'Ciências da Natureza e suas Tecnologias'),
(121, 'N_2021_B (2).PNG', 'B', 'Ciências da Natureza e suas Tecnologias'),
(122, 'N_2021_B (3).PNG', 'B', 'Ciências da Natureza e suas Tecnologias'),
(123, 'N_2021_B (4).PNG', 'B', 'Ciências da Natureza e suas Tecnologias'),
(124, 'N_2021_B (5).PNG', 'B', 'Ciências da Natureza e suas Tecnologias'),
(125, 'N_2021_B (6).PNG', 'B', 'Ciências da Natureza e suas Tecnologias'),
(126, 'N_2021_B (7).PNG', 'B', 'Ciências da Natureza e suas Tecnologias'),
(127, 'N_2021_B (8).PNG', 'B', 'Ciências da Natureza e suas Tecnologias'),
(128, 'N_2021_B (9).PNG', 'B', 'Ciências da Natureza e suas Tecnologias'),
(129, 'N_2021_B (10).PNG', 'B', 'Ciências da Natureza e suas Tecnologias'),
(130, 'N_2021_B (11).PNG', 'B', 'Ciências da Natureza e suas Tecnologias'),
(131, 'N_2021_B (12).PNG', 'B', 'Ciências da Natureza e suas Tecnologias'),
(132, 'N_2021_C (1).PNG', 'C', 'Ciências da Natureza e suas Tecnologias'),
(133, 'N_2021_C (2).PNG', 'C', 'Ciências da Natureza e suas Tecnologias'),
(134, 'N_2021_C (3).PNG', 'C', 'Ciências da Natureza e suas Tecnologias'),
(135, 'N_2021_C (4).PNG', 'C', 'Ciências da Natureza e suas Tecnologias'),
(136, 'N_2021_C (5).PNG', 'C', 'Ciências da Natureza e suas Tecnologias'),
(137, 'N_2021_C (6).PNG', 'C', 'Ciências da Natureza e suas Tecnologias'),
(138, 'N_2021_C (7).PNG', 'C', 'Ciências da Natureza e suas Tecnologias'),
(139, 'N_2021_C (8).PNG', 'C', 'Ciências da Natureza e suas Tecnologias'),
(140, 'N_2021_C (9).PNG', 'C', 'Ciências da Natureza e suas Tecnologias'),
(141, 'N_2021_C (10).PNG', 'C', 'Ciências da Natureza e suas Tecnologias'),
(142, 'N_2021_D (1).PNG', 'D', 'Ciências da Natureza e suas Tecnologias'),
(143, 'N_2021_D (2).PNG', 'D', 'Ciências da Natureza e suas Tecnologias'),
(144, 'N_2021_D (3).PNG', 'D', 'Ciências da Natureza e suas Tecnologias'),
(145, 'N_2021_D (4).PNG', 'D', 'Ciências da Natureza e suas Tecnologias'),
(146, 'N_2021_D (5).PNG', 'D', 'Ciências da Natureza e suas Tecnologias'),
(147, 'N_2021_D (6).PNG', 'D', 'Ciências da Natureza e suas Tecnologias'),
(148, 'N_2021_D (7).PNG', 'D', 'Ciências da Natureza e suas Tecnologias'),
(149, 'N_2021_E (1).PNG', 'E', 'Ciências da Natureza e suas Tecnologias'),
(150, 'N_2021_E (2).PNG', 'E', 'Ciências da Natureza e suas Tecnologias'),
(151, 'N_2021_E (3).PNG', 'E', 'Ciências da Natureza e suas Tecnologias'),
(152, 'N_2021_E (4).PNG', 'E', 'Ciências da Natureza e suas Tecnologias'),
(153, 'N_2021_E (5).PNG', 'E', 'Ciências da Natureza e suas Tecnologias'),
(154, 'N_2021_E (6).PNG', 'E', 'Ciências da Natureza e suas Tecnologias'),
(155, 'N_2022_A (1).png', 'A', 'Ciências da Natureza e suas Tecnologias'),
(156, 'N_2022_A (2).png', 'A', 'Ciências da Natureza e suas Tecnologias'),
(157, 'N_2022_A (3).png', 'A', 'Ciências da Natureza e suas Tecnologias'),
(158, 'N_2022_A (4).png', 'A', 'Ciências da Natureza e suas Tecnologias'),
(159, 'N_2022_A (5).png', 'A', 'Ciências da Natureza e suas Tecnologias'),
(160, 'N_2022_B (1).png', 'B', 'Ciências da Natureza e suas Tecnologias'),
(161, 'N_2022_B (2).png', 'B', 'Ciências da Natureza e suas Tecnologias'),
(162, 'N_2022_B (3).png', 'B', 'Ciências da Natureza e suas Tecnologias'),
(163, 'N_2022_B (4).png', 'B', 'Ciências da Natureza e suas Tecnologias'),
(164, 'N_2022_C (1).png', 'C', 'Ciências da Natureza e suas Tecnologias'),
(165, 'N_2022_C (2).png', 'C', 'Ciências da Natureza e suas Tecnologias'),
(166, 'N_2022_D (1).png', 'D', 'Ciências da Natureza e suas Tecnologias'),
(167, 'N_2022_D (2).png', 'D', 'Ciências da Natureza e suas Tecnologias'),
(168, 'N_2022_E (1).png', 'E', 'Ciências da Natureza e suas Tecnologias'),
(169, 'N_2022_E (2).png', 'E', 'Ciências da Natureza e suas Tecnologias'),
(170, 'N_2023_A (1).png', 'A', 'Ciências da Natureza e suas Tecnologias'),
(171, 'N_2023_A (2).png', 'A', 'Ciências da Natureza e suas Tecnologias'),
(172, 'N_2023_A (3).png', 'A', 'Ciências da Natureza e suas Tecnologias'),
(173, 'N_2023_A (4).png', 'A', 'Ciências da Natureza e suas Tecnologias'),
(174, 'N_2023_A (5).png', 'A', 'Ciências da Natureza e suas Tecnologias'),
(175, 'N_2023_A (6).png', 'A', 'Ciências da Natureza e suas Tecnologias'),
(176, 'N_2023_A (7).png', 'A', 'Ciências da Natureza e suas Tecnologias'),
(177, 'N_2023_A (8).png', 'A', 'Ciências da Natureza e suas Tecnologias'),
(178, 'N_2023_A (9).png', 'A', 'Ciências da Natureza e suas Tecnologias'),
(179, 'N_2023_B (1).png', 'B', 'Ciências da Natureza e suas Tecnologias'),
(180, 'N_2023_B (2).png', 'B', 'Ciências da Natureza e suas Tecnologias'),
(181, 'N_2023_B (3).png', 'B', 'Ciências da Natureza e suas Tecnologias'),
(182, 'N_2023_B (4).png', 'B', 'Ciências da Natureza e suas Tecnologias'),
(183, 'N_2023_B (5).png', 'B', 'Ciências da Natureza e suas Tecnologias'),
(184, 'N_2023_B (6).png', 'B', 'Ciências da Natureza e suas Tecnologias'),
(185, 'N_2023_B (7).png', 'B', 'Ciências da Natureza e suas Tecnologias'),
(186, 'N_2023_B (8).png', 'B', 'Ciências da Natureza e suas Tecnologias'),
(187, 'N_2023_C (1).png', 'C', 'Ciências da Natureza e suas Tecnologias'),
(188, 'N_2023_C (2).png', 'C', 'Ciências da Natureza e suas Tecnologias'),
(189, 'N_2023_C (3).png', 'C', 'Ciências da Natureza e suas Tecnologias'),
(190, 'N_2023_C (4).png', 'C', 'Ciências da Natureza e suas Tecnologias'),
(191, 'N_2023_C (5).png', 'C', 'Ciências da Natureza e suas Tecnologias'),
(192, 'N_2023_C (6).png', 'C', 'Ciências da Natureza e suas Tecnologias'),
(193, 'N_2023_C (7).png', 'C', 'Ciências da Natureza e suas Tecnologias'),
(194, 'N_2023_C (8).png', 'C', 'Ciências da Natureza e suas Tecnologias'),
(195, 'N_2023_C (9).png', 'C', 'Ciências da Natureza e suas Tecnologias'),
(196, 'N_2023_C (10).png', 'C', 'Ciências da Natureza e suas Tecnologias'),
(197, 'N_2023_D (1).png', 'D', 'Ciências da Natureza e suas Tecnologias'),
(198, 'N_2023_D (2).png', 'D', 'Ciências da Natureza e suas Tecnologias'),
(199, 'N_2023_D (3).png', 'D', 'Ciências da Natureza e suas Tecnologias'),
(200, 'N_2023_D (4).png', 'D', 'Ciências da Natureza e suas Tecnologias'),
(201, 'N_2023_D (5).png', 'D', 'Ciências da Natureza e suas Tecnologias'),
(202, 'N_2023_D (6).png', 'D', 'Ciências da Natureza e suas Tecnologias'),
(203, 'N_2023_D (7).png', 'D', 'Ciências da Natureza e suas Tecnologias'),
(204, 'N_2023_D (8).png', 'D', 'Ciências da Natureza e suas Tecnologias'),
(205, 'N_2023_D (9).png', 'D', 'Ciências da Natureza e suas Tecnologias'),
(206, 'N_2023_D (10).png', 'D', 'Ciências da Natureza e suas Tecnologias'),
(207, 'N_2023_E (1).png', 'E', 'Ciências da Natureza e suas Tecnologias'),
(208, 'N_2023_E (2).png', 'E', 'Ciências da Natureza e suas Tecnologias'),
(209, 'N_2023_E (3).png', 'E', 'Ciências da Natureza e suas Tecnologias'),
(210, 'N_2023_E (4).png', 'E', 'Ciências da Natureza e suas Tecnologias'),
(211, 'N_2023_E (5).png', 'E', 'Ciências da Natureza e suas Tecnologias'),
(212, 'N_2023_E (6).png', 'E', 'Ciências da Natureza e suas Tecnologias'),
(213, 'N_2023_E (7).png', 'E', 'Ciências da Natureza e suas Tecnologias'),
(214, 'N_2023_E (8).png', 'E', 'Ciências da Natureza e suas Tecnologias'),
(215, 'L_2019_A (1).png', 'A', 'Linguagens, Códigos e suas Tecnologias'),
(216, 'L_2019_A (2).png', 'A', 'Linguagens, Códigos e suas Tecnologias'),
(217, 'L_2019_A (3).png', 'A', 'Linguagens, Códigos e suas Tecnologias'),
(218, 'L_2019_A (4).png', 'A', 'Linguagens, Códigos e suas Tecnologias'),
(219, 'L_2019_A (5).png', 'A', 'Linguagens, Códigos e suas Tecnologias'),
(220, 'L_2019_A (6).png', 'A', 'Linguagens, Códigos e suas Tecnologias'),
(221, 'L_2019_A (7).png', 'A', 'Linguagens, Códigos e suas Tecnologias'),
(222, 'L_2019_A (8).png', 'A', 'Linguagens, Códigos e suas Tecnologias'),
(223, 'L_2019_A (9).png', 'A', 'Linguagens, Códigos e suas Tecnologias'),
(224, 'L_2019_A (10).png', 'A', 'Linguagens, Códigos e suas Tecnologias'),
(225, 'L_2019_B (1).png', 'B', 'Linguagens, Códigos e suas Tecnologias'),
(226, 'L_2019_B (2).png', 'B', 'Linguagens, Códigos e suas Tecnologias'),
(227, 'L_2019_B (3).png', 'B', 'Linguagens, Códigos e suas Tecnologias'),
(228, 'L_2019_B (4).png', 'B', 'Linguagens, Códigos e suas Tecnologias'),
(229, 'L_2019_B (5).png', 'B', 'Linguagens, Códigos e suas Tecnologias'),
(230, 'L_2019_B (6).png', 'B', 'Linguagens, Códigos e suas Tecnologias'),
(231, 'L_2019_B (7).png', 'B', 'Linguagens, Códigos e suas Tecnologias'),
(232, 'L_2019_B (8).png', 'B', 'Linguagens, Códigos e suas Tecnologias'),
(233, 'L_2019_B (9).png', 'B', 'Linguagens, Códigos e suas Tecnologias'),
(234, 'L_2019_B (10).png', 'B', 'Linguagens, Códigos e suas Tecnologias'),
(235, 'L_2019_B (11).png', 'B', 'Linguagens, Códigos e suas Tecnologias'),
(236, 'L_2019_C (1).png', 'C', 'Linguagens, Códigos e suas Tecnologias'),
(237, 'L_2019_C (2).png', 'C', 'Linguagens, Códigos e suas Tecnologias'),
(238, 'L_2019_C (3).png', 'C', 'Linguagens, Códigos e suas Tecnologias'),
(239, 'L_2019_C (4).png', 'C', 'Linguagens, Códigos e suas Tecnologias'),
(240, 'L_2019_C (5).png', 'C', 'Linguagens, Códigos e suas Tecnologias'),
(241, 'L_2019_C (6).png', 'C', 'Linguagens, Códigos e suas Tecnologias'),
(242, 'L_2019_C (7).png', 'C', 'Linguagens, Códigos e suas Tecnologias'),
(243, 'L_2019_D (1).png', 'D', 'Linguagens, Códigos e suas Tecnologias'),
(244, 'L_2019_D (2).png', 'D', 'Linguagens, Códigos e suas Tecnologias'),
(245, 'L_2019_D (3).png', 'D', 'Linguagens, Códigos e suas Tecnologias'),
(246, 'L_2019_D (4).png', 'D', 'Linguagens, Códigos e suas Tecnologias'),
(247, 'L_2019_D (5).png', 'D', 'Linguagens, Códigos e suas Tecnologias'),
(248, 'L_2019_D (6).png', 'D', 'Linguagens, Códigos e suas Tecnologias'),
(249, 'L_2019_D (7).png', 'D', 'Linguagens, Códigos e suas Tecnologias'),
(250, 'L_2019_D (8).png', 'D', 'Linguagens, Códigos e suas Tecnologias'),
(251, 'L_2021_A (1).png', 'A', 'Linguagens, Códigos e suas Tecnologias'),
(252, 'L_2021_A (2).png', 'A', 'Linguagens, Códigos e suas Tecnologias'),
(253, 'L_2021_A (3).png', 'A', 'Linguagens, Códigos e suas Tecnologias'),
(254, 'L_2021_A (4).png', 'A', 'Linguagens, Códigos e suas Tecnologias'),
(255, 'L_2021_A (5).png', 'A', 'Linguagens, Códigos e suas Tecnologias'),
(256, 'L_2021_A (6).PNG', 'A', 'Linguagens, Códigos e suas Tecnologias'),
(257, 'L_2021_A (7).PNG', 'A', 'Linguagens, Códigos e suas Tecnologias'),
(258, 'L_2021_A (8).PNG', 'A', 'Linguagens, Códigos e suas Tecnologias'),
(259, 'L_2021_A (9).PNG', 'A', 'Linguagens, Códigos e suas Tecnologias'),
(260, 'L_2021_A (10).PNG', 'A', 'Linguagens, Códigos e suas Tecnologias'),
(261, 'L_2021_B (1).png', 'B', 'Linguagens, Códigos e suas Tecnologias'),
(262, 'L_2021_B (2).PNG', 'B', 'Linguagens, Códigos e suas Tecnologias'),
(263, 'L_2021_B (3).PNG', 'B', 'Linguagens, Códigos e suas Tecnologias'),
(264, 'L_2021_B (4).PNG', 'B', 'Linguagens, Códigos e suas Tecnologias'),
(265, 'L_2021_B (5).PNG', 'B', 'Linguagens, Códigos e suas Tecnologias'),
(266, 'L_2021_B (6).PNG', 'B', 'Linguagens, Códigos e suas Tecnologias'),
(267, 'L_2021_B (7).PNG', 'B', 'Linguagens, Códigos e suas Tecnologias'),
(268, 'L_2021_B (8).PNG', 'B', 'Linguagens, Códigos e suas Tecnologias'),
(269, 'L_2021_B (9).PNG', 'B', 'Linguagens, Códigos e suas Tecnologias'),
(270, 'L_2021_B (10).PNG', 'B', 'Linguagens, Códigos e suas Tecnologias'),
(271, 'L_2021_C (1).png', 'C', 'Linguagens, Códigos e suas Tecnologias'),
(272, 'L_2021_C (2).png', 'C', 'Linguagens, Códigos e suas Tecnologias'),
(273, 'L_2021_C (3).PNG', 'C', 'Linguagens, Códigos e suas Tecnologias'),
(274, 'L_2021_C (4).PNG', 'C', 'Linguagens, Códigos e suas Tecnologias'),
(275, 'L_2021_C (5).PNG', 'C', 'Linguagens, Códigos e suas Tecnologias'),
(276, 'L_2021_C (6).PNG', 'C', 'Linguagens, Códigos e suas Tecnologias'),
(277, 'L_2021_C (7).PNG', 'C', 'Linguagens, Códigos e suas Tecnologias'),
(278, 'L_2021_C (8).PNG', 'C', 'Linguagens, Códigos e suas Tecnologias'),
(279, 'L_2021_D (1).PNG', 'D', 'Linguagens, Códigos e suas Tecnologias'),
(280, 'L_2021_D (2).PNG', 'D', 'Linguagens, Códigos e suas Tecnologias'),
(281, 'L_2021_D (3).PNG', 'D', 'Linguagens, Códigos e suas Tecnologias'),
(282, 'L_2021_D (4).PNG', 'D', 'Linguagens, Códigos e suas Tecnologias'),
(283, 'L_2021_D (5).PNG', 'D', 'Linguagens, Códigos e suas Tecnologias'),
(284, 'L_2021_D (6).PNG', 'D', 'Linguagens, Códigos e suas Tecnologias'),
(285, 'L_2021_D (7).PNG', 'D', 'Linguagens, Códigos e suas Tecnologias'),
(286, 'L_2021_D (8).PNG', 'D', 'Linguagens, Códigos e suas Tecnologias'),
(287, 'L_2021_D (9).PNG', 'D', 'Linguagens, Códigos e suas Tecnologias'),
(288, 'L_2021_D (10).PNG', 'D', 'Linguagens, Códigos e suas Tecnologias'),
(289, 'L_2021_D (11).PNG', 'D', 'Linguagens, Códigos e suas Tecnologias'),
(290, 'L_2021_E (1).png', 'E', 'Linguagens, Códigos e suas Tecnologias'),
(291, 'L_2021_E (2).PNG', 'E', 'Linguagens, Códigos e suas Tecnologias'),
(292, 'L_2021_E (3).PNG', 'E', 'Linguagens, Códigos e suas Tecnologias'),
(293, 'L_2021_E (4).PNG', 'E', 'Linguagens, Códigos e suas Tecnologias'),
(294, 'L_2021_E (5).PNG', 'E', 'Linguagens, Códigos e suas Tecnologias'),
(295, 'L_2022_A (1).png', 'A', 'Linguagens, Códigos e suas Tecnologias'),
(296, 'L_2022_A (2).png', 'A', 'Linguagens, Códigos e suas Tecnologias'),
(297, 'L_2022_A (3).png', 'A', 'Linguagens, Códigos e suas Tecnologias'),
(298, 'L_2022_A (4).png', 'A', 'Linguagens, Códigos e suas Tecnologias'),
(299, 'L_2022_B (1).png', 'B', 'Linguagens, Códigos e suas Tecnologias'),
(300, 'L_2022_B (2).png', 'B', 'Linguagens, Códigos e suas Tecnologias'),
(301, 'L_2022_C (1).png', 'C', 'Linguagens, Códigos e suas Tecnologias'),
(302, 'L_2022_C (2).png', 'C', 'Linguagens, Códigos e suas Tecnologias'),
(303, 'L_2022_D.png', 'D', 'Linguagens, Códigos e suas Tecnologias'),
(304, 'L_2022_E (1).png', 'E', 'Linguagens, Códigos e suas Tecnologias'),
(305, 'L_2022_E (2).png', 'E', 'Linguagens, Códigos e suas Tecnologias'),
(306, 'M_2019_A (1).png', 'A', 'Matemática e suas Tecnologias'),
(307, 'M_2019_A (2).png', 'A', 'Matemática e suas Tecnologias'),
(308, 'M_2019_A (3).png', 'A', 'Matemática e suas Tecnologias'),
(309, 'M_2019_A (4).png', 'A', 'Matemática e suas Tecnologias'),
(310, 'M_2019_A (5).png', 'A', 'Matemática e suas Tecnologias'),
(311, 'M_2019_B (1).png', 'B', 'Matemática e suas Tecnologias'),
(312, 'M_2019_B (2).png', 'B', 'Matemática e suas Tecnologias'),
(313, 'M_2019_B (3).png', 'B', 'Matemática e suas Tecnologias'),
(314, 'M_2019_B (4).png', 'B', 'Matemática e suas Tecnologias'),
(315, 'M_2019_B (5).png', 'B', 'Matemática e suas Tecnologias'),
(316, 'M_2019_B (6).png', 'B', 'Matemática e suas Tecnologias'),
(317, 'M_2019_B (7).png', 'B', 'Matemática e suas Tecnologias'),
(318, 'M_2019_C (1).png', 'C', 'Matemática e suas Tecnologias'),
(319, 'M_2019_C (2).png', 'C', 'Matemática e suas Tecnologias'),
(320, 'M_2019_C (3).png', 'C', 'Matemática e suas Tecnologias'),
(321, 'M_2019_C (4).png', 'C', 'Matemática e suas Tecnologias'),
(322, 'M_2019_C (5).png', 'C', 'Matemática e suas Tecnologias'),
(323, 'M_2019_C (6).png', 'C', 'Matemática e suas Tecnologias'),
(324, 'M_2019_C (7).png', 'C', 'Matemática e suas Tecnologias'),
(325, 'M_2019_C (8).png', 'C', 'Matemática e suas Tecnologias'),
(326, 'M_2019_C (9).png', 'C', 'Matemática e suas Tecnologias'),
(327, 'M_2019_D (1).png', 'D', 'Matemática e suas Tecnologias'),
(328, 'M_2019_D (2).png', 'D', 'Matemática e suas Tecnologias'),
(329, 'M_2019_D (3).png', 'D', 'Matemática e suas Tecnologias'),
(330, 'M_2019_D (4).png', 'D', 'Matemática e suas Tecnologias'),
(331, 'M_2019_D (5).png', 'D', 'Matemática e suas Tecnologias'),
(332, 'M_2019_D (6).png', 'D', 'Matemática e suas Tecnologias'),
(333, 'M_2019_D (7).png', 'D', 'Matemática e suas Tecnologias'),
(334, 'M_2019_D (8).png', 'D', 'Matemática e suas Tecnologias'),
(335, 'M_2019_E (1).png', 'E', 'Matemática e suas Tecnologias'),
(336, 'M_2019_E (2).png', 'E', 'Matemática e suas Tecnologias'),
(337, 'M_2019_E (3).png', 'E', 'Matemática e suas Tecnologias'),
(338, 'M_2019_E (4).png', 'E', 'Matemática e suas Tecnologias'),
(339, 'M_2019_E (5).png', 'E', 'Matemática e suas Tecnologias'),
(340, 'M_2019_E (6).png', 'E', 'Matemática e suas Tecnologias'),
(341, 'M_2019_E (7).png', 'E', 'Matemática e suas Tecnologias'),
(342, 'M_2021_A (1).PNG', 'A', 'Matemática e suas Tecnologias'),
(343, 'M_2021_A (2).PNG', 'A', 'Matemática e suas Tecnologias'),
(344, 'M_2021_A (3).PNG', 'A', 'Matemática e suas Tecnologias'),
(345, 'M_2021_A (4).PNG', 'A', 'Matemática e suas Tecnologias'),
(346, 'M_2021_A (5).PNG', 'A', 'Matemática e suas Tecnologias'),
(347, 'M_2021_A (6).PNG', 'A', 'Matemática e suas Tecnologias'),
(348, 'M_2021_B (1).PNG', 'B', 'Matemática e suas Tecnologias'),
(349, 'M_2021_B (2).PNG', 'B', 'Matemática e suas Tecnologias'),
(350, 'M_2021_B (3).PNG', 'B', 'Matemática e suas Tecnologias'),
(351, 'M_2021_B (4).PNG', 'B', 'Matemática e suas Tecnologias'),
(352, 'M_2021_B (5).PNG', 'B', 'Matemática e suas Tecnologias'),
(353, 'M_2021_B (6).PNG', 'B', 'Matemática e suas Tecnologias'),
(354, 'M_2021_B (7).PNG', 'B', 'Matemática e suas Tecnologias'),
(355, 'M_2021_C (1).PNG', 'C', 'Matemática e suas Tecnologias'),
(356, 'M_2021_C (2).PNG', 'C', 'Matemática e suas Tecnologias'),
(357, 'M_2021_C (3).PNG', 'C', 'Matemática e suas Tecnologias'),
(358, 'M_2021_C (4).PNG', 'C', 'Matemática e suas Tecnologias'),
(359, 'M_2021_C (5).PNG', 'C', 'Matemática e suas Tecnologias'),
(360, 'M_2021_C (6).PNG', 'C', 'Matemática e suas Tecnologias'),
(361, 'M_2021_C (7).PNG', 'C', 'Matemática e suas Tecnologias'),
(362, 'M_2021_C (8).PNG', 'C', 'Matemática e suas Tecnologias'),
(363, 'M_2021_D (1).PNG', 'D', 'Matemática e suas Tecnologias'),
(364, 'M_2021_D (2).PNG', 'D', 'Matemática e suas Tecnologias'),
(365, 'M_2021_D (3).PNG', 'D', 'Matemática e suas Tecnologias'),
(366, 'M_2021_D (4).PNG', 'D', 'Matemática e suas Tecnologias'),
(367, 'M_2021_D (5).PNG', 'D', 'Matemática e suas Tecnologias'),
(368, 'M_2021_D (6).PNG', 'D', 'Matemática e suas Tecnologias'),
(369, 'M_2021_D (7).PNG', 'D', 'Matemática e suas Tecnologias'),
(370, 'M_2021_D (8).PNG', 'D', 'Matemática e suas Tecnologias'),
(371, 'M_2021_D (9).PNG', 'D', 'Matemática e suas Tecnologias'),
(372, 'M_2021_D (10).PNG', 'D', 'Matemática e suas Tecnologias'),
(373, 'M_2021_E (1).PNG', 'E', 'Matemática e suas Tecnologias'),
(374, 'M_2021_E (2).PNG', 'E', 'Matemática e suas Tecnologias'),
(375, 'M_2021_E (3).PNG', 'E', 'Matemática e suas Tecnologias'),
(376, 'M_2021_E (4).PNG', 'E', 'Matemática e suas Tecnologias'),
(377, 'M_2021_E (5).PNG', 'E', 'Matemática e suas Tecnologias'),
(378, 'M_2021_E (6).PNG', 'E', 'Matemática e suas Tecnologias'),
(379, 'M_2021_E (7).PNG', 'E', 'Matemática e suas Tecnologias'),
(380, 'M_2021_E (8).PNG', 'E', 'Matemática e suas Tecnologias'),
(381, 'M_2022_A (1).png', 'A', 'Matemática e suas Tecnologias'),
(382, 'M_2022_A (2).png', 'A', 'Matemática e suas Tecnologias'),
(383, 'M_2022_B (1).png', 'B', 'Matemática e suas Tecnologias'),
(384, 'M_2022_B (2).png', 'B', 'Matemática e suas Tecnologias'),
(385, 'M_2022_B (3).png', 'B', 'Matemática e suas Tecnologias'),
(386, 'M_2022_C (1).png', 'C', 'Matemática e suas Tecnologias'),
(387, 'M_2022_C (2).png', 'C', 'Matemática e suas Tecnologias'),
(388, 'M_2022_D (1).png', 'D', 'Matemática e suas Tecnologias'),
(389, 'M_2022_D (2).png', 'D', 'Matemática e suas Tecnologias'),
(390, 'M_2022_E (1).png', 'E', 'Matemática e suas Tecnologias'),
(391, 'M_2022_E (2).png', 'E', 'Matemática e suas Tecnologias'),
(392, 'M_2023_A (1).png', 'A', 'Matemática e suas Tecnologias'),
(393, 'M_2023_A (2).png', 'A', 'Matemática e suas Tecnologias'),
(394, 'M_2023_A (3).png', 'A', 'Matemática e suas Tecnologias'),
(395, 'M_2023_A (4).png', 'A', 'Matemática e suas Tecnologias'),
(396, 'M_2023_A (5).png', 'A', 'Matemática e suas Tecnologias'),
(397, 'M_2023_A (6).png', 'A', 'Matemática e suas Tecnologias'),
(398, 'M_2023_A (7).png', 'A', 'Matemática e suas Tecnologias'),
(399, 'M_2023_A (8).png', 'A', 'Matemática e suas Tecnologias'),
(400, 'M_2023_B (1).png', 'B', 'Matemática e suas Tecnologias'),
(401, 'M_2023_B (2).png', 'B', 'Matemática e suas Tecnologias'),
(402, 'M_2023_B (3).png', 'B', 'Matemática e suas Tecnologias'),
(403, 'M_2023_B (4).png', 'B', 'Matemática e suas Tecnologias'),
(404, 'M_2023_B (5).png', 'B', 'Matemática e suas Tecnologias'),
(405, 'M_2023_B (6).png', 'B', 'Matemática e suas Tecnologias'),
(406, 'M_2023_B (7).png', 'B', 'Matemática e suas Tecnologias'),
(407, 'M_2023_B (8).png', 'B', 'Matemática e suas Tecnologias'),
(408, 'M_2023_B (9).png', 'B', 'Matemática e suas Tecnologias'),
(409, 'M_2023_B (10).png', 'B', 'Matemática e suas Tecnologias'),
(410, 'M_2023_C (1).png', 'C', 'Matemática e suas Tecnologias'),
(411, 'M_2023_C (2).png', 'C', 'Matemática e suas Tecnologias'),
(412, 'M_2023_C (3).png', 'C', 'Matemática e suas Tecnologias'),
(413, 'M_2023_C (4).png', 'C', 'Matemática e suas Tecnologias'),
(414, 'M_2023_C (5).png', 'C', 'Matemática e suas Tecnologias'),
(415, 'M_2023_C (6).png', 'C', 'Matemática e suas Tecnologias'),
(416, 'M_2023_C (7).png', 'C', 'Matemática e suas Tecnologias'),
(417, 'M_2023_C (8).png', 'C', 'Matemática e suas Tecnologias'),
(418, 'M_2023_C (9).png', 'C', 'Matemática e suas Tecnologias'),
(419, 'M_2023_D (1).png', 'D', 'Matemática e suas Tecnologias'),
(420, 'M_2023_D (2).png', 'D', 'Matemática e suas Tecnologias'),
(421, 'M_2023_D (3).png', 'D', 'Matemática e suas Tecnologias'),
(422, 'M_2023_D (4).png', 'D', 'Matemática e suas Tecnologias'),
(423, 'M_2023_D (5).png', 'D', 'Matemática e suas Tecnologias'),
(424, 'M_2023_D (6).png', 'D', 'Matemática e suas Tecnologias'),
(425, 'M_2023_D (7).png', 'D', 'Matemática e suas Tecnologias'),
(426, 'M_2023_D (8).png', 'D', 'Matemática e suas Tecnologias'),
(427, 'M_2023_D (9).png', 'D', 'Matemática e suas Tecnologias'),
(428, 'M_2023_E (1).png', 'E', 'Matemática e suas Tecnologias'),
(429, 'M_2023_E (2).png', 'E', 'Matemática e suas Tecnologias'),
(430, 'M_2023_E (3).png', 'E', 'Matemática e suas Tecnologias'),
(431, 'M_2023_E (4).png', 'E', 'Matemática e suas Tecnologias'),
(432, 'M_2023_E (4).png', 'E', 'Matemática e suas Tecnologias'),
(433, 'M_2023_E (5).png', 'E', 'Matemática e suas Tecnologias'),
(434, 'M_2023_E (6).png', 'E', 'Matemática e suas Tecnologias'),
(435, 'M_2023_E (7).png', 'E', 'Matemática e suas Tecnologias'),
(436, 'M_2023_E (8).png', 'E', 'Matemática e suas Tecnologias');

-- --------------------------------------------------------

--
-- Estrutura da tabela `resultados`
--

CREATE TABLE `resultados` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `materia` varchar(255) NOT NULL,
  `resposta` varchar(255) DEFAULT NULL,
  `correto` tinyint(1) DEFAULT NULL,
  `data` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `simulado_id` int DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int NOT NULL,
  `email` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `email`, `senha`) VALUES
(1, 'islipe02@gmail.com', '$2y$10$OxRaspZu5EURJDI0RjSk3uOp5uHBJ9XORck85A/YZ/Evrx6Kn0zeS');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `erros`
--
ALTER TABLE `erros`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `perguntas`
--
ALTER TABLE `perguntas`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `resultados`
--
ALTER TABLE `resultados`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `erros`
--
ALTER TABLE `erros`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `perguntas`
--
ALTER TABLE `perguntas`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=437;

--
-- AUTO_INCREMENT de tabela `resultados`
--
ALTER TABLE `resultados`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
