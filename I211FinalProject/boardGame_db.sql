-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 06, 2022 at 06:48 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `boardgame`
--

-- --------------------------------------------------------

--
-- Table structure for table `check_out_items`
--

CREATE TABLE `check_out_items` (
  `transaction_id` int(11) NOT NULL,
  `game_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `check_out_items`
--

INSERT INTO `check_out_items` (`transaction_id`, `game_id`) VALUES
(1, 1),
(2, 4),
(4, 6),
(5, 7),
(3, 8);

-- --------------------------------------------------------

--
-- Table structure for table `genre_tbl`
--

CREATE TABLE `genre_tbl` (
  `genre_id` int(11) NOT NULL,
  `genre_name` varchar(64) NOT NULL,
  `genre_description` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `genre_tbl`
--

INSERT INTO `genre_tbl` (`genre_id`, `genre_name`, `genre_description`) VALUES
(1, 'Strategy', 'A strategy game or strategic game is a game (e.g. a board game) in which the players'' uncoerced, and often autonomous, decision-making skills have a high significance in determining the outcome.'),
(2, 'Murder/Mystery', 'Murder/Mystery games often involve an unsolved murder or murders. A requirement of these games is usually for players to investigate these crimes, and determine the criminal details and/or perpetrator(s).'),
(3, 'Role Playing Game (RPG)', 'A game in which each participant assumes the role of a character, generally in a fantasy or science fiction setting, that can interact within the game''s imaginary world.'),
(4, 'Engine Building ', 'Consist of players having a set of resources personal to them that they will use to progress through the game. These resources usually include cards, tiles, and player boards. Players will use these resources in order to manipulate and build their personal components of the game.'),
(5, 'Worker', 'These games tend to have a lot of resource management and worker placement in them. This is one of the board game types that tend to have less variance (luck) and is more focused on skilled play.');

-- --------------------------------------------------------

--
-- Table structure for table `inventory_games`
--

CREATE TABLE `inventory_games` (
  `game_id` int(11) NOT NULL,
  `game_name` varchar(45) NOT NULL,
  `genre_id` int(11) NOT NULL,
  `publisher_id` int(11) NOT NULL,
  `minPlayer` int(11) DEFAULT NULL,
  `maxPlayer` int(11) DEFAULT NULL,
  `description` varchar(200) NOT NULL,
  `price` float NOT NULL,
  `image` varchar(200) NOT NULL,
  `playTime` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `inventory_games`
--

INSERT INTO `inventory_games` (`game_id`, `game_name`, `genre_id`, `publisher_id`, `minPlayer`, `maxPlayer`, `description`, `price`, `image`, `playTime`) VALUES
(1, 'Monopoly', 1, 1, 2, 6, 'Buy, sell, dream, and scheme the way to riches with the Monopoly board game! ', 19.99, 'https://cdn.shopify.com/s/files/1/0169/6995/7440/products/C10090002_630509512638_main_20_Online_2000SQ_1024x1024.jpg?v=1650894210', 45),
(2, 'Clue', 2, 1, 2, 8, 'The mystery you love to solve again and again is even more intense! ', 11.99, 'https://i5.walmartimages.com/asr/d5449a01-b3a9-40c4-8bad-17a116d1043e_1.71becdfe4cc9920db3b1a2610a267301.jpeg', 60),
(3, 'Risk', 1, 1, 2, 8, 'Take over the world in this game of strategy conquest, now with updated figures and improved Mission cards.', 33.99, 'https://www.hasbro.com/common/productimages/en_US/2C7C6F5250569047F5DDEB8AC273BA4C/1B45E578B86B4A0FAB6E88D8D82C7FDF.jpg', 120),
(4, 'Mystery of the Abbey', 2, 2, 2, 8, 'Mystery of the Abbey is a new kind of "whodunit" game of deduction and intuition, set in a medieval abbey. Players compete and collaborate to solve the mystery', 85, 'https://cf.geekdo-images.com/OAZmWQ4u4Sda-3lUyMVxQw__opengraph/img/Jr-WK_GRGtABLaz_KJjDjr88krc=/fit-in/1200x630/filters:strip_icc()/pic897161.jpg', 45),
(5, 'The Worst Case Scenario', 3, 3, 3, 5, 'How do you compare living through a pandemic to being chased by a gorilla or locked in the trunk of a moving car or losing your memory or being lost at sea? ', 19.99, 'https://target.scene7.com/is/image/Target/GUEST_03d8f4e2-1645-4995-be96-b00f84506c04?wid=488&hei=488&fmt=pjpeg', 15),
(6, 'Ticket to Ride', 4, 2, 2, 5, 'Ticket to Ride is a cross-country train adventure in which players collect and play matching train cards to claim railway routes connecting cities throughout North America.', 39.97, 'https://m.media-amazon.com/images/I/91YNJM4oyhL.jpg', 120),
(7, 'Settlers of Catan', 5, 5, 2, 7, 'Players take on the roles of settlers, each attempting to build and develop holdings while trading and acquiring resources. Players gain victory points as their settlements grow.', 28.99, 'https://www.catan.com/sites/default/files/2021-06/dye_catan_150407_0564.jpg', 60),
(8, 'Magic the Gathering', 1, 4, 1, 99, 'A player in Magic takes the role of a Planeswalker, a powerful wizard who can travel ("walk") between dimensions ("planes") of the Multiverse, doing battle with other players as Planeswalkers ', 49.99, 'https://media.gamestop.com/i/gamestop/11208572/Magic-The-Gathering-Arena-Starter-Kit-2022-', 45);

-- --------------------------------------------------------

--
-- Table structure for table `publisher`
--

CREATE TABLE `publisher` (
  `publisher_id` int(11) NOT NULL,
  `publisher_name` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `publisher`
--

INSERT INTO `publisher` (`publisher_id`, `publisher_name`) VALUES
(1, 'Hasbro'),
(2, 'Days of Wonder'),
(3, 'University Games'),
(4, 'Wizards of the Coast'),
(5, 'Kosmos');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `transaction_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `transaction_date` date NOT NULL,
  `due_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`transaction_id`, `user_id`, `transaction_date`, `due_date`) VALUES
(1, 1, '2022-10-31', '2022-11-07'),
(2, 2, '2022-10-30', '2022-11-06'),
(3, 3, '2022-10-17', '2022-10-24'),
(4, 5, '2022-10-14', '2022-10-28'),
(5, 4, '2022-10-03', '2022-10-17');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(64) NOT NULL,
  `user_address` varchar(200) NOT NULL,
  `f_name` varchar(64) NOT NULL,
  `l_name` varchar(64) NOT NULL,
  `password` varchar(64) NOT NULL,
  `email` varchar(64) NOT NULL,
  `admin` boolean not NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `user_address`, `f_name`, `l_name`, `password`, `email`,`admin`) VALUES
(1, 'LuckyCharmz', 'address', 'Jon', 'Richardson', 'password1234', 'richjonr@iu.edu','1'),
(2, 'CaptainCrunch', 'The Sea', 'Morgan', 'Spice', 'passwordCaptain', 'CaptainCrunch@gmail.com','0'),
(3, 'Taurine', 'Somewhere', 'Jenn', 'Froth', 'password2345', 'jennFroth@gmail.com','0'),
(4, 'Siri', 'IUPUI', 'Apple', 'Jobs', 'steve', 'apple@apple.com','0'),
(5, 'blackjack', 'vegas', 'Terry', 'Benedict', 'Bellagio', 'tbenedict@bellagio.com','0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `check_out_items`
--
ALTER TABLE `check_out_items`
  ADD PRIMARY KEY (`transaction_id`),
  ADD KEY `game_id` (`game_id`);

--
-- Indexes for table `genre_tbl`
--
ALTER TABLE `genre_tbl`
  ADD PRIMARY KEY (`genre_id`);

--
-- Indexes for table `inventory_games`
--
ALTER TABLE `inventory_games`
  ADD PRIMARY KEY (`game_id`),
  ADD KEY `genre_id` (`genre_id`),
  ADD KEY `publisher_id` (`publisher_id`);

--
-- Indexes for table `publisher`
--
ALTER TABLE `publisher`
  ADD PRIMARY KEY (`publisher_id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`transaction_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `genre_tbl`
--
ALTER TABLE `genre_tbl`
  MODIFY `genre_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `inventory_games`
--
ALTER TABLE `inventory_games`
  MODIFY `game_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `publisher`
--
ALTER TABLE `publisher`
  MODIFY `publisher_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `check_out_items`
--
ALTER TABLE `check_out_items`
  ADD CONSTRAINT `check_out_items_ibfk_1` FOREIGN KEY (`game_id`) REFERENCES `inventory_games` (`game_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `check_out_items_ibfk_2` FOREIGN KEY (`transaction_id`) REFERENCES `transaction` (`transaction_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `inventory_games`
--
ALTER TABLE `inventory_games`
  ADD CONSTRAINT `inventory_games_ibfk_1` FOREIGN KEY (`publisher_id`) REFERENCES `publisher` (`publisher_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `inventory_games_ibfk_2` FOREIGN KEY (`genre_id`) REFERENCES `genre_tbl` (`genre_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transaction`
--
ALTER TABLE `transaction`
  ADD CONSTRAINT `transaction_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
