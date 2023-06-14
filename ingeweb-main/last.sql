-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 23, 2023 at 09:05 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projetinsa`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `idCategory` int(4) NOT NULL,
  `difficulty` int(1) DEFAULT NULL,
  `titleCat` varchar(50) DEFAULT NULL,
  `descCat` varchar(500) DEFAULT NULL,
  `photoCat` varchar(50) DEFAULT NULL,
  `duration` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`idCategory`, `difficulty`, `titleCat`, `descCat`, `photoCat`, `duration`) VALUES
(1, 0, 'Mathematics', 'Learn some mathematics', 'photo-1556680262-9990363a3e6d.png', 40),
(2, 3, 'Français', 'Learn some french', 'photo-1556680262-9990363a3e6d.png', 40),
(3, 3, 'Java', 'Learn some Java', 'photo-1556680262-9990363a3e6d.png', 40),
(4, 3, 'Network', 'Learn some Network', 'photo-1556680262-9990363a3e6d.png', 35),
(6, 1, 'Histoire de France', 'Explorez l\'histoire fascinante de la France', 'histoire-france.jpg', 60),
(7, 2, 'Gastronomie française', 'Découvrez les délices de la cuisine française', 'gastronomie-francaise.jpg', 45),
(8, 3, 'Art et culture', 'Plongez dans l\'art et la culture français', 'art-culture.jpg', 30),
(9, 2, 'Concepts fondamentaux', 'Comprenez les principes de base de la programmation orientée objet', 'concept-fondamentaux.jpg', 45),
(10, 3, 'Encapsulation et abstraction', 'Explorez les concepts d\'encapsulation et d\'abstraction en POO', 'encapsulation-abstraction.jpg', 60),
(11, 2, 'Héritage et polymorphisme', 'Découvrez l\'héritage et le polymorphisme en POO', 'heritage-polymorphisme.jpg', 60),
(12, 3, 'Anciennes civilisations', 'Découvrez les anciennes civilisations du monde', 'anciennes-civilisations.jpg', 60),
(13, 2, 'Événements marquants', 'Explorez les événements marquants de l\'histoire mondiale', 'evenements-marquants.jpg', 45),
(14, 1, 'Personnages historiques', 'Apprenez-en davantage sur les personnages historiques influents', 'personnages-historiques.jpg', 30),
(15, 1, 'Calcul mental', 'Exercez votre calcul mental avec des problèmes mathématiques', 'calcul-mental.jpg', 30),
(16, 3, 'Géométrie', 'Explorez les concepts de base de la géométrie', 'geometrie.jpg', 45),
(17, 2, 'Algèbre', 'Plongez dans le monde de l\'algèbre et des équations mathématiques', 'algebre.jpg', 60),
(18, 2, 'Capitales du monde', 'Testez vos connaissances sur les capitales du monde', 'capitales-monde.jpg', 45),
(19, 1, 'Pays et continents', 'Découvrez les pays et les continents du monde', 'pays-continents.jpg', 30),
(20, 3, 'Relief et climat', 'Explorez les caractéristiques du relief et du climat à travers le monde', 'relief-climat.jpg', 60);

-- --------------------------------------------------------

--
-- Table structure for table `constitueexos`
--

CREATE TABLE `constitueexos` (
  `idExercice` int(4) NOT NULL,
  `idCategory` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `constitueexos`
--

INSERT INTO `constitueexos` (`idExercice`, `idCategory`) VALUES
(1, 1),
(1, 2),
(2, 2),
(2, 4),
(3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `exercices`
--

CREATE TABLE `exercices` (
  `idExercice` int(4) NOT NULL,
  `descTache` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `exercices`
--

INSERT INTO `exercices` (`idExercice`, `descTache`) VALUES
(1, 'Question sur la culture française'),
(2, 'Question en Programmation orientée objet'),
(3, 'Question sur l\'histoire mondiale'),
(4, 'Question de mathématiques'),
(5, 'Question de géographie');

-- --------------------------------------------------------

--
-- Table structure for table `memo_cards`
--

CREATE TABLE `memo_cards` (
  `idMemo` int(11) NOT NULL,
  `idExercices` int(11) NOT NULL,
  `question` char(150) NOT NULL,
  `reponse` char(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `memo_cards`
--

INSERT INTO `memo_cards` (`idMemo`, `idExercices`, `question`, `reponse`) VALUES
(1, 1, 'Quelle est la capitale de la France ?', 'La capitale de la France est Paris.'),
(2, 1, 'Quel est le plus long fleuve du monde ?', 'Le plus long fleuve du monde est le Nil.'),
(3, 1, 'Quelle est la formule chimique de l\'eau ?', 'La formule chimique de l\'eau est H2O.'),
(4, 1, 'Qui a peint la Joconde ?', 'La Joconde a été peinte par Léonard de Vinci.'),
(5, 2, 'Qu\'est-ce qu\'une classe en programmation orientée objet ?', 'Une classe est un modèle ou un plan permettant de créer des objets.'),
(6, 2, 'Qu\'est-ce qu\'un objet en programmation orientée objet ?', 'Un objet est une instance d\'une classe.'),
(7, 2, 'Qu\'est-ce qu\'une méthode en programmation orientée objet ?', 'Une méthode est un comportement ou une action associée à un objet.'),
(8, 2, 'Qu\'est-ce qu\'un attribut en programmation orientée objet ?', 'Un attribut est une caractéristique ou une donnée associée à un objet.');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `idUser` int(4) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `admin` tinyint(1) DEFAULT NULL,
  `dateRegister` date DEFAULT NULL,
  `image` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`idUser`, `username`, `password`, `email`, `admin`, `dateRegister`, `image`) VALUES
(1, 'testUser', 'bWRwVHJwQ29tcGxpcXVl', 'testUser@gmail.com', 1, '2023-03-08', 'avatar.png'),
(2, 'testUser2', 'bWRwVHJwQ29tcGxpcXVl', 'testUser2@gmail.com', 0, '0000-00-00', 'avatar3.png'),
(3, 'testUser3', 'bWRwVHJwQ29tcGxpcXVl', 'testUser3@gmail.com', 0, '0000-00-00', 'avatar2.png'),
(4, 'Test', 'bWRwVHJwQ29tcGxpcXVl', 'te@test.com', 0, NULL, 'avatar04.png'),
(5, 'Phil', 'bWRwVHJwQ29tcGxpcXVl', 'phil@gmail.com', 0, NULL, 'avatar5.png'),
(6, 'test888', 'bWRwVHJwQ29tcGxpcXVl', 'test888@gmail.com', 0, NULL, 'user2-160x160.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`idCategory`);

--
-- Indexes for table `constitueexos`
--
ALTER TABLE `constitueexos`
  ADD PRIMARY KEY (`idExercice`,`idCategory`),
  ADD KEY `idCategory` (`idCategory`);

--
-- Indexes for table `exercices`
--
ALTER TABLE `exercices`
  ADD PRIMARY KEY (`idExercice`);

--
-- Indexes for table `memo_cards`
--
ALTER TABLE `memo_cards`
  ADD PRIMARY KEY (`idMemo`),
  ADD KEY `idExercices` (`idExercices`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`idUser`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `idCategory` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `memo_cards`
--
ALTER TABLE `memo_cards`
  MODIFY `idMemo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `idUser` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `constitueexos`
--
ALTER TABLE `constitueexos`
  ADD CONSTRAINT `constitueexos_ibfk_1` FOREIGN KEY (`idCategory`) REFERENCES `category` (`idCategory`),
  ADD CONSTRAINT `constitueexos_ibfk_2` FOREIGN KEY (`idExercice`) REFERENCES `exercices` (`idExercice`);

--
-- Constraints for table `memo_cards`
--
ALTER TABLE `memo_cards`
  ADD CONSTRAINT `memo_cards_ibfk_1` FOREIGN KEY (`idExercices`) REFERENCES `exercices` (`idExercice`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
