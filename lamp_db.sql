-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: db
-- Generation Time: May 17, 2024 at 10:34 AM
-- Server version: 8.1.0
-- PHP Version: 8.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lamp_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` bigint NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(254) NOT NULL,
  `message` text NOT NULL,
  `ipaddr` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `name`, `email`, `message`, `ipaddr`) VALUES
(1, 'Hector', 'hola@hola.com', 'El primer mensaje!', '172.18.0.1'),
(2, 'Hector', 'hola@hola.com', 'El segundo mensaje!', '172.18.0.1'),
(3, 'Hector', 'adios@hola.com', 'Esto es una prueba.', '172.18.0.1'),
(4, 'Eloy', 'eloy@eloy.com', 'Hola !', '172.18.0.1');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` bigint NOT NULL,
  `title` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `id_user` bigint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `content`, `id_user`) VALUES
(1, 'Título de la Noticia 1', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus vitae mi in ligula ultrices tempor. Fusce auctor mauris vel velit convallis, in sollicitudin odio convallis. Duis at lorem ac libero efficitur fermentum. Vivamus tristique ultricies eros, nec interdum mauris scelerisque nec. Nulla et nunc et odio sollicitudin aliquam. Mauris feugiat nisl a tempus tempor. Morbi sit amet libero euismod, ultrices mauris non, luctus orci. Cras lacinia est a turpis viverra, sit amet viverra metus tempor. Integer et velit et lacus finibus vehicula. Nunc quis velit auctor, aliquam metus ut, commodo lorem. Integer in tortor quis ligula commodo interdum in ac nulla. Phasellus ut ultrices velit, nec lobortis felis.', 2),
(2, 'Título de la Noticia 2', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus vitae mi in ligula ultrices tempor. Fusce auctor mauris vel velit convallis, in sollicitudin odio convallis. Duis at lorem ac libero efficitur fermentum. Vivamus tristique ultricies eros, nec interdum mauris scelerisque nec. Nulla et nunc et odio sollicitudin aliquam. Mauris feugiat nisl a tempus tempor. Morbi sit amet libero euismod, ultrices mauris non, luctus orci. Cras lacinia est a turpis viverra, sit amet viverra metus tempor. Integer et velit et lacus finibus vehicula. Nunc quis velit auctor, aliquam metus ut, commodo lorem. Integer in tortor quis ligula commodo interdum in ac nulla. Phasellus ut ultrices velit, nec lobortis felis.', 3),
(3, 'Título de la Noticia 3', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus vitae mi in ligula ultrices tempor. Fusce auctor mauris vel velit convallis, in sollicitudin odio convallis. Duis at lorem ac libero efficitur fermentum. Vivamus tristique ultricies eros, nec interdum mauris scelerisque nec. Nulla et nunc et odio sollicitudin aliquam. Mauris feugiat nisl a tempus tempor. Morbi sit amet libero euismod, ultrices mauris non, luctus orci. Cras lacinia est a turpis viverra, sit amet viverra metus tempor. Integer et velit et lacus finibus vehicula. Nunc quis velit auctor, aliquam metus ut, commodo lorem. Integer in tortor quis ligula commodo interdum in ac nulla. Phasellus ut ultrices velit, nec lobortis felis.', 2),
(4, 'Título de la Noticia 4', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus vitae mi in ligula ultrices tempor. Fusce auctor mauris vel velit convallis, in sollicitudin odio convallis. Duis at lorem ac libero efficitur fermentum. Vivamus tristique ultricies eros, nec interdum mauris scelerisque nec. Nulla et nunc et odio sollicitudin aliquam. Mauris feugiat nisl a tempus tempor. Morbi sit amet libero euismod, ultrices mauris non, luctus orci. Cras lacinia est a turpis viverra, sit amet viverra metus tempor. Integer et velit et lacus finibus vehicula. Nunc quis velit auctor, aliquam metus ut, commodo lorem. Integer in tortor quis ligula commodo interdum in ac nulla. Phasellus ut ultrices velit, nec lobortis felis.', 3),
(5, 'Título de la Noticia 5', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus vitae mi in ligula ultrices tempor. Fusce auctor mauris vel velit convallis, in sollicitudin odio convallis. Duis at lorem ac libero efficitur fermentum. Vivamus tristique ultricies eros, nec interdum mauris scelerisque nec. Nulla et nunc et odio sollicitudin aliquam. Mauris feugiat nisl a tempus tempor. Morbi sit amet libero euismod, ultrices mauris non, luctus orci. Cras lacinia est a turpis viverra, sit amet viverra metus tempor. Integer et velit et lacus finibus vehicula. Nunc quis velit auctor, aliquam metus ut, commodo lorem. Integer in tortor quis ligula commodo interdum in ac nulla. Phasellus ut ultrices velit, nec lobortis felis.', 2),
(6, 'Título de la Noticia 6', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus vitae mi in ligula ultrices tempor. Fusce auctor mauris vel velit convallis, in sollicitudin odio convallis. Duis at lorem ac libero efficitur fermentum. Vivamus tristique ultricies eros, nec interdum mauris scelerisque nec. Nulla et nunc et odio sollicitudin aliquam. Mauris feugiat nisl a tempus tempor. Morbi sit amet libero euismod, ultrices mauris non, luctus orci. Cras lacinia est a turpis viverra, sit amet viverra metus tempor. Integer et velit et lacus finibus vehicula. Nunc quis velit auctor, aliquam metus ut, commodo lorem. Integer in tortor quis ligula commodo interdum in ac nulla. Phasellus ut ultrices velit, nec lobortis felis.', 3),
(7, 'Título de la Noticia 7', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus vitae mi in ligula ultrices tempor. Fusce auctor mauris vel velit convallis, in sollicitudin odio convallis. Duis at lorem ac libero efficitur fermentum. Vivamus tristique ultricies eros, nec interdum mauris scelerisque nec. Nulla et nunc et odio sollicitudin aliquam. Mauris feugiat nisl a tempus tempor. Morbi sit amet libero euismod, ultrices mauris non, luctus orci. Cras lacinia est a turpis viverra, sit amet viverra metus tempor. Integer et velit et lacus finibus vehicula. Nunc quis velit auctor, aliquam metus ut, commodo lorem. Integer in tortor quis ligula commodo interdum in ac nulla. Phasellus ut ultrices velit, nec lobortis felis.', 2),
(8, 'Título de la Noticia 8', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus vitae mi in ligula ultrices tempor. Fusce auctor mauris vel velit convallis, in sollicitudin odio convallis. Duis at lorem ac libero efficitur fermentum. Vivamus tristique ultricies eros, nec interdum mauris scelerisque nec. Nulla et nunc et odio sollicitudin aliquam. Mauris feugiat nisl a tempus tempor. Morbi sit amet libero euismod, ultrices mauris non, luctus orci. Cras lacinia est a turpis viverra, sit amet viverra metus tempor. Integer et velit et lacus finibus vehicula. Nunc quis velit auctor, aliquam metus ut, commodo lorem. Integer in tortor quis ligula commodo interdum in ac nulla. Phasellus ut ultrices velit, nec lobortis felis.', 3),
(9, 'Título de la Noticia 9', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus vitae mi in ligula ultrices tempor. Fusce auctor mauris vel velit convallis, in sollicitudin odio convallis. Duis at lorem ac libero efficitur fermentum. Vivamus tristique ultricies eros, nec interdum mauris scelerisque nec. Nulla et nunc et odio sollicitudin aliquam. Mauris feugiat nisl a tempus tempor. Morbi sit amet libero euismod, ultrices mauris non, luctus orci. Cras lacinia est a turpis viverra, sit amet viverra metus tempor. Integer et velit et lacus finibus vehicula. Nunc quis velit auctor, aliquam metus ut, commodo lorem. Integer in tortor quis ligula commodo interdum in ac nulla. Phasellus ut ultrices velit, nec lobortis felis.', 2),
(10, 'Título de la Noticia 10', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus vitae mi in ligula ultrices tempor. Fusce auctor mauris vel velit convallis, in sollicitudin odio convallis. Duis at lorem ac libero efficitur fermentum. Vivamus tristique ultricies eros, nec interdum mauris scelerisque nec. Nulla et nunc et odio sollicitudin aliquam. Mauris feugiat nisl a tempus tempor. Morbi sit amet libero euismod, ultrices mauris non, luctus or', 3),
(11, 'This new was made by the new form', 'This new was made by the new form and it\'s quite good, so check the new function.', 1),
(12, 'New 2', 'Hello this is the second new', 1),
(14, 'Nueva Noticia', '&lt;script&gt;alert(&#039;hola&#039;)&lt;/script&gt;', 3);

-- --------------------------------------------------------

--
-- Table structure for table `photos`
--

CREATE TABLE `photos` (
  `id` int NOT NULL,
  `filename` varchar(255) NOT NULL,
  `id_user` bigint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `photos`
--

INSERT INTO `photos` (`id`, `filename`, `id_user`) VALUES
(1, 'hoj1glqjyfkhlu.jpg', 3),
(2, 'fnj2rpsvqhuukc.jpg', 3),
(3, 'tks3ggipzgihyh.jpg', 3),
(4, 'prs4fndunoapkw.jpg', 3),
(5, 'vst5kgoubhymbh.jpeg', 3),
(6, '183312cclshiwrox.jpg', 3),
(7, 'vdrou-lggix-159533631fgcyuwzycm.jpg', 3);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `email` varchar(254) NOT NULL,
  `name` varchar(50) NOT NULL,
  `surname` varchar(100) NOT NULL,
  `dni` varchar(9) NOT NULL,
  `photo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `name`, `surname`, `dni`, `photo`) VALUES
(1, 'admin', '4f6af08f0ab26f8e1cf06b930c38ff186d76dbc1d6cf673578e11985a0c44d4b', 'admin@cyberexp.com', 'ad', 'min', '11111111F', 'aqf1nyveqvwoxd.avif'),
(2, 'hecutresc', 'f92406d0a6bfda663cc0ec16b54b333fda1923f3d38ca0324f1e951a71178f53', 'hola@hola.com', 'adf', 'adsf', '11111111F', 'sopIlpGfeekppaeaigqav.png'),
(3, 'usuario1', '965e40a39ce99db07d2dd1569c9e7c8a9149cf44e27f8d524ca284d25f5d0e6c', 'hola@adios.com', 'Hola', 'adios', '11111111F', 'whv1zwgsaacsahalrwxaquxg.jpg'),
(4, 'eloy', '636ba8f1e6ba812cd977fe1cf2adab7a9f551fc20bcf827b1c0d14fa1a8f14d3', 'eloy@eloy.com', 'Eloy', 'Profe', '11111111F', 'sopIlpGfeekppaeaigqav.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `photos`
--
ALTER TABLE `photos`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `news_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Constraints for table `photos`
--
ALTER TABLE `photos`
  ADD CONSTRAINT `photos_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
