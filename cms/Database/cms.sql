-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 04 jan 2022 om 20:12
-- Serverversie: 10.4.22-MariaDB
-- PHP-versie: 8.1.1

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
-- Tabelstructuur voor tabel `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(3) NOT NULL,
  `cat_title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(1, 'Arduinos'),
(2, 'C++'),
(3, 'Smarthome'),
(18, 'IoT');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `post_id` int(3) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `comment_check` bit(1) NOT NULL DEFAULT b'0',
  `comment_date` date NOT NULL DEFAULT current_timestamp(),
  `comment_cont` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `comments`
--

INSERT INTO `comments` (`comment_id`, `post_id`, `user_id`, `comment_check`, `comment_date`, `comment_cont`) VALUES
(1, 33, NULL, b'0', '2021-12-20', 'Hallo post ik ben comment'),
(2, 33, NULL, b'1', '2021-12-20', 'Hallo post ik ben comment');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `posts`
--

CREATE TABLE `posts` (
  `Post_id` int(3) NOT NULL,
  `Post_category_id` int(3) NOT NULL,
  `Post_title` varchar(255) NOT NULL,
  `Post_author` varchar(255) NOT NULL,
  `Post_date` date NOT NULL,
  `Post_image` text NOT NULL,
  `Post_content` text NOT NULL,
  `Post_tags` varchar(255) NOT NULL,
  `Post_comment_count` int(11) NOT NULL,
  `Post_status` varchar(255) NOT NULL DEFAULT 'draft'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `posts`
--

INSERT INTO `posts` (`Post_id`, `Post_category_id`, `Post_title`, `Post_author`, `Post_date`, `Post_image`, `Post_content`, `Post_tags`, `Post_comment_count`, `Post_status`) VALUES
(33, 3, 'b', 'c', '2021-11-24', 'test2.jpg', 'b', 'b', 4, 'c'),
(38, 1, 'How to fix arduino bugs', 'wendy', '2021-11-24', 'Screenshot from 2021-10-30 20-09-01.png', ' Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas lacinia lectus condimentum, euismod massa et, rutrum nibh. Sed vel luctus leo. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas sed velit sodales, dictum mauris vestibulum, ornare magna. Curabitur hendrerit diam vitae mi mattis posuere. Donec venenatis ipsum et nulla congue, quis volutpat dolor consequat. Cras vel erat quam. Ut vulputate, justo ac pharetra luctus, ante justo consectetur justo, quis volutpat massa augue eu felis. Mauris dignissim non erat vitae malesuada. Interdum et malesuada fames ac ante ipsum primis in faucibus. Aenean ac nisi fringilla ex pharetra molestie. Duis viverra sapien elit, ac ultrices risus ultrices et.\r\n\r\nFusce eu ligula ipsum. Vivamus ac diam ipsum. Aliquam egestas suscipit leo in sollicitudin. Suspendisse potenti. Aliquam eleifend risus ut ligula tincidunt cursus. Mauris odio neque, iaculis a leo sit amet, tempor consectetur odio. Integer suscipit mollis ullamcorper. Mauris eu ex interdum, egestas turpis et, volutpat massa. Phasellus aliquam tempus egestas. Vivamus in eleifend velit. Morbi in mauris consequat dui molestie maximus a nec magna. Morbi id ultrices quam. Vestibulum at urna aliquet, maximus nisi id, dictum lacus. Morbi ipsum est, pellentesque ut aliquam ac, lacinia quis quam.\r\n\r\nUt molestie fringilla ante vitae eleifend. Sed non tellus non justo rutrum aliquam. Quisque erat ex, ultrices vitae viverra rutrum, placerat vel sem. Praesent viverra gravida pulvinar. Donec id viverra dolor. Duis eget tempor enim, vitae aliquam justo. Aliquam mattis, est a consequat mollis, mauris nunc lacinia mauris, sed sagittis elit ligula non risus. Fusce id finibus mi. Donec ut volutpat sem. Nunc libero justo, hendrerit sed orci eu, ullamcorper semper augue. Proin et dictum lacus.\r\n\r\nMaecenas interdum aliquam nisi aliquet volutpat. Donec ut odio iaculis, lobortis lorem ac, mollis augue. Praesent lectus quam, dignissim egestas nunc eu, ornare malesuada eros. Aenean egestas eros id tellus mollis tempor. Etiam porta risus sapien, a hendrerit justo porta ut. Sed eleifend sapien quis odio eleifend iaculis. Mauris tempus eget nisi eu aliquet. Fusce convallis turpis arcu, eget porta leo luctus eu. ', 'arduino, bugs, test, fix', 4, 'active'),
(39, 2, 'IF statements in C++', 'wendy', '2021-11-24', 'orb.jpg', ' Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas lacinia lectus condimentum, euismod massa et, rutrum nibh. Sed vel luctus leo. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas sed velit sodales, dictum mauris vestibulum, ornare magna. Curabitur hendrerit diam vitae mi mattis posuere. Donec venenatis ipsum et nulla congue, quis volutpat dolor consequat. Cras vel erat quam. Ut vulputate, justo ac pharetra luctus, ante justo consectetur justo, quis volutpat massa augue eu felis. Mauris dignissim non erat vitae malesuada. Interdum et malesuada fames ac ante ipsum primis in faucibus. Aenean ac nisi fringilla ex pharetra molestie. Duis viverra sapien elit, ac ultrices risus ultrices et.\r\n\r\nFusce eu ligula ipsum. Vivamus ac diam ipsum. Aliquam egestas suscipit leo in sollicitudin. Suspendisse potenti. Aliquam eleifend risus ut ligula tincidunt cursus. Mauris odio neque, iaculis a leo sit amet, tempor consectetur odio. Integer suscipit mollis ullamcorper. Mauris eu ex interdum, egestas turpis et, volutpat massa. Phasellus aliquam tempus egestas. Vivamus in eleifend velit. Morbi in mauris consequat dui molestie maximus a nec magna. Morbi id ultrices quam. Vestibulum at urna aliquet, maximus nisi id, dictum lacus. Morbi ipsum est, pellentesque ut aliquam ac, lacinia quis quam.\r\n\r\nUt molestie fringilla ante vitae eleifend. Sed non tellus non justo rutrum aliquam. Quisque erat ex, ultrices vitae viverra rutrum, placerat vel sem. Praesent viverra gravida pulvinar. Donec id viverra dolor. Duis eget tempor enim, vitae aliquam justo. Aliquam mattis, est a consequat mollis, mauris nunc lacinia mauris, sed sagittis elit ligula non risus. Fusce id finibus mi. Donec ut volutpat sem. Nunc libero justo, hendrerit sed orci eu, ullamcorper semper augue. Proin et dictum lacus.\r\n\r\nMaecenas interdum aliquam nisi aliquet volutpat. Donec ut odio iaculis, lobortis lorem ac, mollis augue. Praesent lectus quam, dignissim egestas nunc eu, ornare malesuada eros. Aenean egestas eros id tellus mollis tempor. Etiam porta risus sapien, a hendrerit justo porta ut. Sed eleifend sapien quis odio eleifend iaculis. Mauris tempus eget nisi eu aliquet. Fusce convallis turpis arcu, eget porta leo luctus eu. ', 'C++, test, if, statements', 4, 'active'),
(40, 1, 'how to make a smart home', 'wendy', '2021-11-24', 'AppBreweryWallpaper.jpg', '         Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas lacinia lectus condimentum, euismod massa et, rutrum nibh. Sed vel luctus leo. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas sed velit sodales, dictum mauris vestibulum, ornare magna. Curabitur hendrerit diam vitae mi mattis posuere. Donec venenatis ipsum et nulla congue, quis volutpat dolor consequat. Cras vel erat quam. Ut vulputate, justo ac pharetra luctus, ante justo consectetur justo, quis volutpat massa augue eu felis. Mauris dignissim non erat vitae malesuada. Interdum et malesuada fames ac ante ipsum primis in faucibus. Aenean ac nisi fringilla ex pharetra molestie. Duis viverra sapien elit, ac ultrices risus ultrices et.\r\n\r\nFusce eu ligula ipsum. Vivamus ac diam ipsum. Aliquam egestas suscipit leo in sollicitudin. Suspendisse potenti. Aliquam eleifend risus ut ligula tincidunt cursus. Mauris odio neque, iaculis a leo sit amet, tempor consectetur odio. Integer suscipit mollis ullamcorper. Mauris eu ex interdum, egestas turpis et, volutpat massa. Phasellus aliquam tempus egestas. Vivamus in eleifend velit. Morbi in mauris consequat dui molestie maximus a nec magna. Morbi id ultrices quam. Vestibulum at urna aliquet, maximus nisi id, dictum lacus. Morbi ipsum est, pellentesque ut aliquam ac, lacinia quis quam.\r\n\r\nUt molestie fringilla ante vitae eleifend. Sed non tellus non justo rutrum aliquam. Quisque erat ex, ultrices vitae viverra rutrum, placerat vel sem. Praesent viverra gravida pulvinar. Donec id viverra dolor. Duis eget tempor enim, vitae aliquam justo. Aliquam mattis, est a consequat mollis, mauris nunc lacinia mauris, sed sagittis elit ligula non risus. Fusce id finibus mi. Donec ut volutpat sem. Nunc libero justo, hendrerit sed orci eu, ullamcorper semper augue. Proin et dictum lacus.\r\n\r\nMaecenas interdum aliquam nisi aliquet volutpat. Donec ut odio iaculis, lobortis lorem ac, mollis augue. Praesent lectus quam, dignissim egestas nunc eu, ornare malesuada eros. Aenean egestas eros id tellus mollis tempor. Etiam porta risus sapien, a hendrerit justo porta ut. Sed eleifend sapien quis odio eleifend iaculis. Mauris tempus eget nisi eu aliquet. Fusce convallis turpis arcu, eget porta leo luctus eu. ', 'smart. home, smart home, ', 4, 'active');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users`
--

CREATE TABLE `users` (
  `user_id` int(3) NOT NULL,
  `username` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_firstname` varchar(255) NOT NULL,
  `user_lastname` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_image` varchar(255) NOT NULL,
  `user_role` varchar(255) NOT NULL,
  `randSalt` varchar(255) NOT NULL DEFAULT '$2y$10$iusesomecrazystring22'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `users`
--

INSERT INTO `users` (`user_id`, `username`, `user_password`, `user_firstname`, `user_lastname`, `user_email`, `user_image`, `user_role`, `randSalt`) VALUES
(4, 'dax', 'dax', 'Dax', 'Moorman', 'dax@moorman.nlff', '', 'viewer', '$2y$10$automatiseringsbedrijf'),
(5, 'test', 'test', 'test', 'test', 'test@test.nl', '', 'admin', '$2y$10$automatiseringsbedrijf'),
(19, 'test123', '$2y$10$automatiseringsbedrijeu3L1mXo416221Nlu4MAV.TUEx7IJglC', '', '', 'test123@email.com', '', 'viewer', '$2y$10$iusesomecrazystring22'),
(20, 'test76532', 'hiybesfdaiyhfesihfesiuhsef', '', '', 'test@test.be', '', 'viewer', '$2y$10$iusesomecrazystring22');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexen voor tabel `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexen voor tabel `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`Post_id`);

--
-- Indexen voor tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT voor een tabel `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT voor een tabel `posts`
--
ALTER TABLE `posts`
  MODIFY `Post_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT voor een tabel `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
