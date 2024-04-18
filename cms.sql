-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 18, 2024 at 09:19 AM
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
-- Database: `cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(3) NOT NULL,
  `cat_title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(1, 'Bootstrap'),
(2, 'Java'),
(6, 'php'),
(23, 'TEST5'),
(24, 'Prateek');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(3) NOT NULL,
  `comment_post_id` int(3) NOT NULL,
  `comment_author` varchar(255) NOT NULL,
  `comment_email` varchar(255) NOT NULL,
  `comment_content` text NOT NULL,
  `comment_status` varchar(255) NOT NULL,
  `comment_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `comment_post_id`, `comment_author`, `comment_email`, `comment_content`, `comment_status`, `comment_date`) VALUES
(15, 102, 'afwaf', 'swanandkulkarni1812@gmail.com', 'dwadawd', 'Approved', '2024-04-04'),
(17, 101, 'afwaf', 'swanandkulkarni1812@gmail.com', 'qwfaagwa', 'Approved', '2024-04-04'),
(18, 101, 'afwaf', 'swanandkulkarni1812@gmail.com', 'qqqqqqqqqqqqqqqqqqbbbbbbbbbbrwwwwwwwwwwwwwwwwwwww', 'Approved', '2024-04-04');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(3) NOT NULL,
  `post_category_id` int(3) NOT NULL,
  `post_title` varchar(255) NOT NULL,
  `post_author` varchar(255) DEFAULT NULL,
  `post_user` varchar(255) NOT NULL,
  `post_date` date NOT NULL,
  `post_image` text NOT NULL,
  `post_content` text NOT NULL,
  `post_tags` varchar(255) NOT NULL,
  `post_comment_count` int(11) NOT NULL,
  `post_status` varchar(255) NOT NULL DEFAULT 'draft',
  `post_views_count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `post_category_id`, `post_title`, `post_author`, `post_user`, `post_date`, `post_image`, `post_content`, `post_tags`, `post_comment_count`, `post_status`, `post_views_count`) VALUES
(62, 1, 'Red dead Redemption 2', 'Rockstar', '', '2024-04-03', 'arthur.jpg', '                                                                RDR2 is a western themed action/adventure game by Rockstar. Its a prequel to Red Dead Redemption and stars Arthur Morgan, an outlaw who adventures across the land avoiding and fighting other outlaws, the government, and anyone else looking to cause trouble.', 'rdr2, arthur, open_world', 0, 'draft', 20),
(63, 1, 'Valorant', 'Riot Games', '', '2024-04-03', 'download.jpg', '                                                                        Valorant is a free-to-play first-person tactical hero shooter developed and published by Riot Games, for Windows. Teased under the codename Project A in October 2019, the game began a closed beta period with limited access on April 7, 2020, followed by a release on June 2, 2020.', 'fps,multiplayer', 0, 'draft', 6),
(64, 1, 'God of War ', ' David Jaffe, Cory Barlog, Mark Simon', '', '2024-04-03', 'Kratos (1).webp', '                <b>                                                                                                                                                                                                                                                                                                                                                                                                                                        God of War</b> is a fantasy <b>action-adventure</b> game franchise created by <u>David Jaffe </u>an<span style=\"background-color: rgb(255, 255, 255);\">d<font color=\"#000000\" style=\"\"> developed b</font>y</span> <u>Santa Monica Studio.</u> It began in 2005 for the PlayStation 2 video game console and has become a flagship series for PlayStation, consisting of nine installments across multiple platforms.         \r\n        \r\n                  \r\n        \r\n                  \r\n        \r\n                  \r\n        \r\n                  \r\n        \r\n         ', 'godofwar, action, rpg', 0, 'draft', 0),
(65, 1, 'Gta 5', 'Rockstar', '', '2024-04-03', 'trevour.jpg', '                        Grand Theft Auto V is a 2013 action-adventure game developed by Rockstar North and published by Rockstar Games. It is the seventh main entry in the Grand Theft Auto series, following 2008s Grand Theft Auto IV, and the fifteenth instalment overall. Set within the fictional state of San Andreas, based on Southern California, the single-player story follows three protagonists—retired bank robber Michael De Santa, street gangster Franklin Clinton, and drug dealer and gunrunner Trevor Philips—and their attempts to commit heists while under pressure from a corrupt government agency and powerful criminals. The open world design lets players freely roam San Andreas open countryside and the fictional city of Los Santos, based on Los Angeles.', 'gta5, trevour, open_world', 0, 'draft', 0),
(66, 1, 'Valorant', 'Riot Games', '', '2024-04-03', 'download.jpg', '                                                                        Valorant is a free-to-play first-person tactical hero shooter developed and published by Riot Games, for Windows. Teased under the codename Project A in October 2019, the game began a closed beta period with limited access on April 7, 2020, followed by a release on June 2, 2020.', 'fps,multiplayer', 0, 'draft', 0),
(67, 1, 'Gta 5', 'Rockstar', '', '2024-04-03', 'trevour.jpg', '                        Grand Theft Auto V is a 2013 action-adventure game developed by Rockstar North and published by Rockstar Games. It is the seventh main entry in the Grand Theft Auto series, following 2008s Grand Theft Auto IV, and the fifteenth instalment overall. Set within the fictional state of San Andreas, based on Southern California, the single-player story follows three protagonists—retired bank robber Michael De Santa, street gangster Franklin Clinton, and drug dealer and gunrunner Trevor Philips—and their attempts to commit heists while under pressure from a corrupt government agency and powerful criminals. The open world design lets players freely roam San Andreas open countryside and the fictional city of Los Santos, based on Los Angeles.', 'gta5, trevour, open_world', 0, 'draft', 0),
(68, 1, 'Gta 5', 'Rockstar', '', '2024-04-03', 'trevour.jpg', '                        Grand Theft Auto V is a 2013 action-adventure game developed by Rockstar North and published by Rockstar Games. It is the seventh main entry in the Grand Theft Auto series, following 2008s Grand Theft Auto IV, and the fifteenth instalment overall. Set within the fictional state of San Andreas, based on Southern California, the single-player story follows three protagonists—retired bank robber Michael De Santa, street gangster Franklin Clinton, and drug dealer and gunrunner Trevor Philips—and their attempts to commit heists while under pressure from a corrupt government agency and powerful criminals. The open world design lets players freely roam San Andreas open countryside and the fictional city of Los Santos, based on Los Angeles.', 'gta5, trevour, open_world', 0, 'draft', 0),
(69, 1, 'Valorant', 'Riot Games', '', '2024-04-03', 'download.jpg', '                                                                        Valorant is a free-to-play first-person tactical hero shooter developed and published by Riot Games, for Windows. Teased under the codename Project A in October 2019, the game began a closed beta period with limited access on April 7, 2020, followed by a release on June 2, 2020.', 'fps,multiplayer', 0, 'draft', 0),
(70, 1, 'Gta 5', 'Rockstar', '', '2024-04-03', 'trevour.jpg', '                        Grand Theft Auto V is a 2013 action-adventure game developed by Rockstar North and published by Rockstar Games. It is the seventh main entry in the Grand Theft Auto series, following 2008s Grand Theft Auto IV, and the fifteenth instalment overall. Set within the fictional state of San Andreas, based on Southern California, the single-player story follows three protagonists—retired bank robber Michael De Santa, street gangster Franklin Clinton, and drug dealer and gunrunner Trevor Philips—and their attempts to commit heists while under pressure from a corrupt government agency and powerful criminals. The open world design lets players freely roam San Andreas open countryside and the fictional city of Los Santos, based on Los Angeles.', 'gta5, trevour, open_world', 0, 'draft', 0),
(71, 1, 'God of War ', ' David Jaffe, Cory Barlog, Mark Simon', '', '2024-04-03', 'Kratos (1).webp', '                <b>                                                                                                                                                                                                                                                                                                                                                                                                                                        God of War</b> is a fantasy <b>action-adventure</b> game franchise created by <u>David Jaffe </u>an<span style=\"background-color: rgb(255, 255, 255);\">d<font color=\"#000000\" style=\"\"> developed b</font>y</span> <u>Santa Monica Studio.</u> It began in 2005 for the PlayStation 2 video game console and has become a flagship series for PlayStation, consisting of nine installments across multiple platforms.         \r\n        \r\n                  \r\n        \r\n                  \r\n        \r\n                  \r\n        \r\n                  \r\n        \r\n         ', 'godofwar, action, rpg', 0, 'draft', 0),
(72, 1, 'Valorant', 'Riot Games', '', '2024-04-03', 'download.jpg', '                                                                        Valorant is a free-to-play first-person tactical hero shooter developed and published by Riot Games, for Windows. Teased under the codename Project A in October 2019, the game began a closed beta period with limited access on April 7, 2020, followed by a release on June 2, 2020.', 'fps,multiplayer', 0, 'draft', 0),
(73, 1, 'Red dead Redemption 2', 'Rockstar', '', '2024-04-03', 'arthur.jpg', '                                                                RDR2 is a western themed action/adventure game by Rockstar. Its a prequel to Red Dead Redemption and stars Arthur Morgan, an outlaw who adventures across the land avoiding and fighting other outlaws, the government, and anyone else looking to cause trouble.', 'rdr2, arthur, open_world', 0, 'draft', 0),
(74, 1, 'God of War ', ' David Jaffe, Cory Barlog, Mark Simon', '', '2024-04-03', 'Kratos (1).webp', '                <b>                                                                                                                                                                                                                                                                                                                                                                                                                                        God of War</b> is a fantasy <b>action-adventure</b> game franchise created by <u>David Jaffe </u>an<span style=\"background-color: rgb(255, 255, 255);\">d<font color=\"#000000\" style=\"\"> developed b</font>y</span> <u>Santa Monica Studio.</u> It began in 2005 for the PlayStation 2 video game console and has become a flagship series for PlayStation, consisting of nine installments across multiple platforms.         \r\n        \r\n                  \r\n        \r\n                  \r\n        \r\n                  \r\n        \r\n                  \r\n        \r\n         ', 'godofwar, action, rpg', 0, 'draft', 0),
(75, 1, 'God of War ', ' David Jaffe, Cory Barlog, Mark Simon', '', '2024-04-03', 'Kratos (1).webp', '                <b>                                                                                                                                                                                                                                                                                                                                                                                                                                        God of War</b> is a fantasy <b>action-adventure</b> game franchise created by <u>David Jaffe </u>an<span style=\"background-color: rgb(255, 255, 255);\">d<font color=\"#000000\" style=\"\"> developed b</font>y</span> <u>Santa Monica Studio.</u> It began in 2005 for the PlayStation 2 video game console and has become a flagship series for PlayStation, consisting of nine installments across multiple platforms.         \r\n        \r\n                  \r\n        \r\n                  \r\n        \r\n                  \r\n        \r\n                  \r\n        \r\n         ', 'godofwar, action, rpg', 0, 'draft', 0),
(76, 1, 'Red dead Redemption 2', 'Rockstar', '', '2024-04-03', 'arthur.jpg', '                                                                RDR2 is a western themed action/adventure game by Rockstar. Its a prequel to Red Dead Redemption and stars Arthur Morgan, an outlaw who adventures across the land avoiding and fighting other outlaws, the government, and anyone else looking to cause trouble.', 'rdr2, arthur, open_world', 0, 'draft', 0),
(77, 1, 'Valorant', 'Riot Games', '', '2024-04-03', 'download.jpg', '                                                                        Valorant is a free-to-play first-person tactical hero shooter developed and published by Riot Games, for Windows. Teased under the codename Project A in October 2019, the game began a closed beta period with limited access on April 7, 2020, followed by a release on June 2, 2020.', 'fps,multiplayer', 0, 'draft', 0),
(78, 1, 'God of War ', ' David Jaffe, Cory Barlog, Mark Simon', '', '2024-04-03', 'Kratos (1).webp', '                <b>                                                                                                                                                                                                                                                                                                                                                                                                                                        God of War</b> is a fantasy <b>action-adventure</b> game franchise created by <u>David Jaffe </u>an<span style=\"background-color: rgb(255, 255, 255);\">d<font color=\"#000000\" style=\"\"> developed b</font>y</span> <u>Santa Monica Studio.</u> It began in 2005 for the PlayStation 2 video game console and has become a flagship series for PlayStation, consisting of nine installments across multiple platforms.         \r\n        \r\n                  \r\n        \r\n                  \r\n        \r\n                  \r\n        \r\n                  \r\n        \r\n         ', 'godofwar, action, rpg', 0, 'draft', 0),
(79, 1, 'Gta 5', 'Rockstar', '', '2024-04-03', 'trevour.jpg', '                        Grand Theft Auto V is a 2013 action-adventure game developed by Rockstar North and published by Rockstar Games. It is the seventh main entry in the Grand Theft Auto series, following 2008s Grand Theft Auto IV, and the fifteenth instalment overall. Set within the fictional state of San Andreas, based on Southern California, the single-player story follows three protagonists—retired bank robber Michael De Santa, street gangster Franklin Clinton, and drug dealer and gunrunner Trevor Philips—and their attempts to commit heists while under pressure from a corrupt government agency and powerful criminals. The open world design lets players freely roam San Andreas open countryside and the fictional city of Los Santos, based on Los Angeles.', 'gta5, trevour, open_world', 0, 'draft', 0),
(80, 1, 'Valorant', 'Riot Games', '', '2024-04-03', 'download.jpg', '                                                                        Valorant is a free-to-play first-person tactical hero shooter developed and published by Riot Games, for Windows. Teased under the codename Project A in October 2019, the game began a closed beta period with limited access on April 7, 2020, followed by a release on June 2, 2020.', 'fps,multiplayer', 0, 'draft', 0),
(81, 1, 'Gta 5', 'Rockstar', '', '2024-04-03', 'trevour.jpg', '                        Grand Theft Auto V is a 2013 action-adventure game developed by Rockstar North and published by Rockstar Games. It is the seventh main entry in the Grand Theft Auto series, following 2008s Grand Theft Auto IV, and the fifteenth instalment overall. Set within the fictional state of San Andreas, based on Southern California, the single-player story follows three protagonists—retired bank robber Michael De Santa, street gangster Franklin Clinton, and drug dealer and gunrunner Trevor Philips—and their attempts to commit heists while under pressure from a corrupt government agency and powerful criminals. The open world design lets players freely roam San Andreas open countryside and the fictional city of Los Santos, based on Los Angeles.', 'gta5, trevour, open_world', 0, 'draft', 0),
(82, 1, 'Gta 5', 'Rockstar', '', '2024-04-03', 'trevour.jpg', '                        Grand Theft Auto V is a 2013 action-adventure game developed by Rockstar North and published by Rockstar Games. It is the seventh main entry in the Grand Theft Auto series, following 2008s Grand Theft Auto IV, and the fifteenth instalment overall. Set within the fictional state of San Andreas, based on Southern California, the single-player story follows three protagonists—retired bank robber Michael De Santa, street gangster Franklin Clinton, and drug dealer and gunrunner Trevor Philips—and their attempts to commit heists while under pressure from a corrupt government agency and powerful criminals. The open world design lets players freely roam San Andreas open countryside and the fictional city of Los Santos, based on Los Angeles.', 'gta5, trevour, open_world', 0, 'draft', 0),
(83, 1, 'Valorant', 'Riot Games', '', '2024-04-03', 'download.jpg', '                                                                        Valorant is a free-to-play first-person tactical hero shooter developed and published by Riot Games, for Windows. Teased under the codename Project A in October 2019, the game began a closed beta period with limited access on April 7, 2020, followed by a release on June 2, 2020.', 'fps,multiplayer', 0, 'draft', 0),
(84, 1, 'Gta 5', 'Rockstar', '', '2024-04-03', 'trevour.jpg', '                        Grand Theft Auto V is a 2013 action-adventure game developed by Rockstar North and published by Rockstar Games. It is the seventh main entry in the Grand Theft Auto series, following 2008s Grand Theft Auto IV, and the fifteenth instalment overall. Set within the fictional state of San Andreas, based on Southern California, the single-player story follows three protagonists—retired bank robber Michael De Santa, street gangster Franklin Clinton, and drug dealer and gunrunner Trevor Philips—and their attempts to commit heists while under pressure from a corrupt government agency and powerful criminals. The open world design lets players freely roam San Andreas open countryside and the fictional city of Los Santos, based on Los Angeles.', 'gta5, trevour, open_world', 0, 'draft', 0),
(85, 1, 'God of War ', ' David Jaffe, Cory Barlog, Mark Simon', '', '2024-04-03', 'Kratos (1).webp', '                <b>                                                                                                                                                                                                                                                                                                                                                                                                                                        God of War</b> is a fantasy <b>action-adventure</b> game franchise created by <u>David Jaffe </u>an<span style=\"background-color: rgb(255, 255, 255);\">d<font color=\"#000000\" style=\"\"> developed b</font>y</span> <u>Santa Monica Studio.</u> It began in 2005 for the PlayStation 2 video game console and has become a flagship series for PlayStation, consisting of nine installments across multiple platforms.         \r\n        \r\n                  \r\n        \r\n                  \r\n        \r\n                  \r\n        \r\n                  \r\n        \r\n         ', 'godofwar, action, rpg', 0, 'draft', 0),
(86, 1, 'Valorant', 'Riot Games', '', '2024-04-03', 'download.jpg', '                                                                        Valorant is a free-to-play first-person tactical hero shooter developed and published by Riot Games, for Windows. Teased under the codename Project A in October 2019, the game began a closed beta period with limited access on April 7, 2020, followed by a release on June 2, 2020.', 'fps,multiplayer', 0, 'draft', 0),
(87, 1, 'Red dead Redemption 2', 'Rockstar', '', '2024-04-03', 'arthur.jpg', '                                                                RDR2 is a western themed action/adventure game by Rockstar. Its a prequel to Red Dead Redemption and stars Arthur Morgan, an outlaw who adventures across the land avoiding and fighting other outlaws, the government, and anyone else looking to cause trouble.', 'rdr2, arthur, open_world', 0, 'draft', 0),
(88, 1, 'God of War ', ' David Jaffe, Cory Barlog, Mark Simon', '', '2024-04-03', 'Kratos (1).webp', '                <b>                                                                                                                                                                                                                                                                                                                                                                                                                                        God of War</b> is a fantasy <b>action-adventure</b> game franchise created by <u>David Jaffe </u>an<span style=\"background-color: rgb(255, 255, 255);\">d<font color=\"#000000\" style=\"\"> developed b</font>y</span> <u>Santa Monica Studio.</u> It began in 2005 for the PlayStation 2 video game console and has become a flagship series for PlayStation, consisting of nine installments across multiple platforms.         \r\n        \r\n                  \r\n        \r\n                  \r\n        \r\n                  \r\n        \r\n                  \r\n        \r\n         ', 'godofwar, action, rpg', 0, 'draft', 0),
(89, 1, 'God of War ', ' David Jaffe, Cory Barlog, Mark Simon', '', '2024-04-03', 'Kratos (1).webp', '                <b>                                                                                                                                                                                                                                                                                                                                                                                                                                        God of War</b> is a fantasy <b>action-adventure</b> game franchise created by <u>David Jaffe </u>an<span style=\"background-color: rgb(255, 255, 255);\">d<font color=\"#000000\" style=\"\"> developed b</font>y</span> <u>Santa Monica Studio.</u> It began in 2005 for the PlayStation 2 video game console and has become a flagship series for PlayStation, consisting of nine installments across multiple platforms.         \r\n        \r\n                  \r\n        \r\n                  \r\n        \r\n                  \r\n        \r\n                  \r\n        \r\n         ', 'godofwar, action, rpg', 0, 'draft', 0),
(90, 1, 'Red dead Redemption 2', 'Rockstar', '', '2024-04-03', 'arthur.jpg', '                                                                RDR2 is a western themed action/adventure game by Rockstar. Its a prequel to Red Dead Redemption and stars Arthur Morgan, an outlaw who adventures across the land avoiding and fighting other outlaws, the government, and anyone else looking to cause trouble.', 'rdr2, arthur, open_world', 0, 'draft', 0),
(91, 1, 'Valorant', 'Riot Games', '', '2024-04-03', 'download.jpg', '                                                                        Valorant is a free-to-play first-person tactical hero shooter developed and published by Riot Games, for Windows. Teased under the codename Project A in October 2019, the game began a closed beta period with limited access on April 7, 2020, followed by a release on June 2, 2020.', 'fps,multiplayer', 0, 'draft', 0),
(92, 1, 'God of War ', ' David Jaffe, Cory Barlog, Mark Simon', '', '2024-04-03', 'Kratos (1).webp', '                <b>                                                                                                                                                                                                                                                                                                                                                                                                                                        God of War</b> is a fantasy <b>action-adventure</b> game franchise created by <u>David Jaffe </u>an<span style=\"background-color: rgb(255, 255, 255);\">d<font color=\"#000000\" style=\"\"> developed b</font>y</span> <u>Santa Monica Studio.</u> It began in 2005 for the PlayStation 2 video game console and has become a flagship series for PlayStation, consisting of nine installments across multiple platforms.         \r\n        \r\n                  \r\n        \r\n                  \r\n        \r\n                  \r\n        \r\n                  \r\n        \r\n         ', 'godofwar, action, rpg', 0, 'draft', 0),
(93, 1, 'Gta 5', 'Rockstar', '', '2024-04-03', 'trevour.jpg', '                        Grand Theft Auto V is a 2013 action-adventure game developed by Rockstar North and published by Rockstar Games. It is the seventh main entry in the Grand Theft Auto series, following 2008s Grand Theft Auto IV, and the fifteenth instalment overall. Set within the fictional state of San Andreas, based on Southern California, the single-player story follows three protagonists—retired bank robber Michael De Santa, street gangster Franklin Clinton, and drug dealer and gunrunner Trevor Philips—and their attempts to commit heists while under pressure from a corrupt government agency and powerful criminals. The open world design lets players freely roam San Andreas open countryside and the fictional city of Los Santos, based on Los Angeles.', 'gta5, trevour, open_world', 0, 'draft', 0),
(94, 1, 'Valorant', 'Riot Games', '', '2024-04-03', 'download.jpg', '                                                                        Valorant is a free-to-play first-person tactical hero shooter developed and published by Riot Games, for Windows. Teased under the codename Project A in October 2019, the game began a closed beta period with limited access on April 7, 2020, followed by a release on June 2, 2020.', 'fps,multiplayer', 0, 'draft', 0),
(95, 1, 'Gta 5', 'Rockstar', '', '2024-04-03', 'trevour.jpg', '                        Grand Theft Auto V is a 2013 action-adventure game developed by Rockstar North and published by Rockstar Games. It is the seventh main entry in the Grand Theft Auto series, following 2008s Grand Theft Auto IV, and the fifteenth instalment overall. Set within the fictional state of San Andreas, based on Southern California, the single-player story follows three protagonists—retired bank robber Michael De Santa, street gangster Franklin Clinton, and drug dealer and gunrunner Trevor Philips—and their attempts to commit heists while under pressure from a corrupt government agency and powerful criminals. The open world design lets players freely roam San Andreas open countryside and the fictional city of Los Santos, based on Los Angeles.', 'gta5, trevour, open_world', 0, 'draft', 2),
(96, 1, 'Gta 5', 'Rockstar', '', '2024-04-03', 'trevour.jpg', '                        Grand Theft Auto V is a 2013 action-adventure game developed by Rockstar North and published by Rockstar Games. It is the seventh main entry in the Grand Theft Auto series, following 2008s Grand Theft Auto IV, and the fifteenth instalment overall. Set within the fictional state of San Andreas, based on Southern California, the single-player story follows three protagonists—retired bank robber Michael De Santa, street gangster Franklin Clinton, and drug dealer and gunrunner Trevor Philips—and their attempts to commit heists while under pressure from a corrupt government agency and powerful criminals. The open world design lets players freely roam San Andreas open countryside and the fictional city of Los Santos, based on Los Angeles.', 'gta5, trevour, open_world', 0, 'draft', 0),
(97, 1, 'Valorant', 'Riot Games', '', '2024-04-03', 'download.jpg', '                                                                        Valorant is a free-to-play first-person tactical hero shooter developed and published by Riot Games, for Windows. Teased under the codename Project A in October 2019, the game began a closed beta period with limited access on April 7, 2020, followed by a release on June 2, 2020.', 'fps,multiplayer', 0, 'draft', 0),
(98, 6, 'Gta 5', 'Rockstar', '', '2024-04-03', 'trevour.jpg', '                                Grand Theft Auto V is a 2013 action-adventure game developed by Rockstar North and published by Rockstar Games. It is the seventh main entry in the Grand Theft Auto series, following 2008s Grand Theft Auto IV, and the fifteenth instalment overall. Set within the fictional state of San Andreas, based on Southern California, the single-player story follows three protagonists—retired bank robber Michael De Santa, street gangster Franklin Clinton, and drug dealer and gunrunner Trevor Philips—and their attempts to commit heists while under pressure from a corrupt government agency and powerful criminals. The open world design lets players freely roam San Andreas open countryside and the fictional city of Los Santos, based on Los Angeles.', 'gta5, trevour, open_world', 0, 'draft', 0),
(100, 23, 'Valorant', 'Riot Games', '', '2024-04-03', 'download.jpg', '                                                                                Valorant is a free-to-play first-person tactical hero shooter developed and published by Riot Games, for Windows. Teased under the codename Project A in October 2019, the game began a closed beta period with limited access on April 7, 2020, followed by a release on June 2, 2020.', 'fps,multiplayer', 0, 'draft', 0),
(101, 24, 'Red dead Redemption 2', 'Rockstar', '', '2024-04-03', 'arthur.jpg', '                                                                                                RDR2 is a western themed action/adventure game by Rockstar. Its a prequel to Red Dead Redemption and stars Arthur Morgan, an outlaw who adventures across the land avoiding and fighting other outlaws, the government, and anyone else looking to cause trouble.', 'rdr2, arthur, open_world', 0, 'draft', 12),
(102, 24, 'God of War ', ' David Jaffe, Cory Barlog, Mark Simon', 'Swanand', '2024-04-03', 'Kratos (1).webp', '                                <b>                                                                                                                                                                                                                                                                                                                                                                                                                                        God of War</b> is a fantasy <b>action-adventure</b> game franchise created by <u>David Jaffe </u>an<span style=\"background-color: rgb(255, 255, 255);\">d<font color=\"#000000\" style=\"\"> developed b</font>y</span> <u>Santa Monica Studio.</u> It began in 2005 for the PlayStation 2 video game console and has become a flagship series for PlayStation, consisting of nine installments across multiple platforms.         \r\n        \r\n                  \r\n        \r\n                  \r\n        \r\n                  \r\n        \r\n                  \r\n        \r\n         ', 'godofwar, action, rpg', 0, 'draft', 30),
(109, 1, 'afawfwa', NULL, 'Swanand', '2024-04-05', '', '                                                                                                <p>avbw</p>', 'fwaf', 0, 'draft', 13),
(110, 1, 'afawfwa', '', 'demo', '2024-04-12', '', '                                                                                                                                                                                <p>avbw</p>', 'fwaf', 0, 'draft', 0),
(111, 24, 'God of War ', ' David Jaffe, Cory Barlog, Mark Simon', 'ironman', '2024-04-12', 'Kratos (1).webp', '                                        <b>                                                                                                                                                                                                                                                                                                                                                                                                                                        God of War</b> is a fantasy <b>action-adventure</b> game franchise created by <u>David Jaffe </u>an<span style=\"background-color: rgb(255, 255, 255);\">d<font color=\"#000000\" style=\"\"> developed b</font>y</span> <u>Santa Monica Studio.</u> It began in 2005 for the PlayStation 2 video game console and has become a flagship series for PlayStation, consisting of nine installments across multiple platforms.         \r\n        \r\n                  \r\n        \r\n                  \r\n        \r\n                  \r\n        \r\n                  \r\n        \r\n         ', 'godofwar, action, rpg', 0, 'draft', 0),
(112, 1, 'Red dead Redemption 2', 'Rockstar', 'Swanand', '2024-04-12', 'arthur.jpg', '                                                                        RDR2 is a western themed action/adventure game by Rockstar. Its a prequel to Red Dead Redemption and stars Arthur Morgan, an outlaw who adventures across the land avoiding and fighting other outlaws, the government, and anyone else looking to cause trouble.', 'rdr2, arthur, open_world', 0, 'draft', 0),
(113, 24, 'dwadwaqdad', NULL, 'kk', '2024-04-12', '', '<p>dwadwdadw</p>', '', 0, 'published', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(3) NOT NULL,
  `username` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_firstname` varchar(255) NOT NULL,
  `user_lastname` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_image` text NOT NULL,
  `user_role` varchar(255) NOT NULL,
  `randSalt` varchar(255) NOT NULL DEFAULT '$2y$10$iusesomecrazystrings22'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `user_password`, `user_firstname`, `user_lastname`, `user_email`, `user_image`, `user_role`, `randSalt`) VALUES
(1, 'Swanand', '1234', 'Swanand', 'Kulkarni', 'swanandkulkarni1812@gmail.com', '', 'Admin', ''),
(4, 'ethan22', '1234', 'Ethan', 'Winters', 'ethan22@g.com', '', 'Subscriber', ''),
(7, 'dongare', '1234', 'Tejas', 'Dongare', 'dongare@vasti.com', '', 'Subscriber', ''),
(9, 'ironman', '1234', 'tony', 'stark', 'tony@stark.com', '', 'Subscriber', ''),
(10, 'Swanand', '1234', 'Swanand', 'Kulkarni', 'swanandkulkarni1812@gmail.com', '', 'Subscriber', '$2y$10$iusesomecrazystrings22'),
(11, 'demo', '1234', 'demo', 'demo', 'demo@gmail.com', '', 'subscriber', '$2y$10$iusesomecrazystrings22'),
(13, 'mike', '1234', 'Mike', 'Tyson', 'miket@boom.com', '', 'subscriber', '$2y$10$iusesomecrazystrings22'),
(14, 'demo', '*0', 'demo', 'demo', 'demo@demo.com', '', 'Admin', '$2y$10$iusesomecrazystrings22'),
(18, '123', '123', '123', '123', '123@gmai.com', '', 'Admin', '$2y$10$iusesomecrazystrings22'),
(20, 'kk', '$2y$12$Hha9tcx1N183T25h5aUhNeae7lGj/8GS8gH3Vdd7Sx3uIDGkM7BHm', 'kk', 'kk', 'kk.kkcom', '', 'Admin', '$2y$10$iusesomecrazystrings22');

-- --------------------------------------------------------

--
-- Table structure for table `users_online`
--

CREATE TABLE `users_online` (
  `id` int(11) NOT NULL,
  `session` varchar(255) NOT NULL,
  `time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users_online`
--

INSERT INTO `users_online` (`id`, `session`, `time`) VALUES
(1, '1q6f62mdsngmofingctn21b5df', 1712217287),
(2, 's1q7luvrf6itiesrpnearnn047', 1712213773),
(3, '5oah45onffog05gbg9irefnubb', 1712236164),
(4, 'a67h0cb1cbdo45iravnebca4en', 1712217423),
(5, 'agbj100bjiamernacjqg1tvnos', 1712222391),
(6, '0la2vael4n6cnfcip2tft278tb', 1712228859),
(7, '7nlhhqqkrcrit2rug4660b3imo', 1712321723),
(8, 'qc1ukcbds81eqt4qmpasqttspd', 1712574268),
(9, '8ncthoirpkosbpig25d10h81i5', 1712575154),
(10, 'jgins4kf8a7blv7irak3eip0em', 1712579560),
(11, 'g0g88q3qup6863l5602sm684dl', 1712740835),
(12, '5b4bd9c6qmi76ejab2c3cl9amd', 1712930298),
(13, 'uqs84ulv4oa0sak1jt85tc2u6j', 1713002512);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `users_online`
--
ALTER TABLE `users_online`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `users_online`
--
ALTER TABLE `users_online`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
