-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 14 juin 2023 à 20:59
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `projetinsa`
--

-- --------------------------------------------------------

--
-- Structure de la table `category`
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
-- Déchargement des données de la table `category`
--

INSERT INTO `category` (`idCategory`, `difficulty`, `titleCat`, `descCat`, `photoCat`, `duration`) VALUES
(1, 0, 'Mathematics', 'Learn some mathematics', 'math.png', 40),
(2, 3, 'Français', 'Learn some french', 'french.jpg', 40),
(3, 3, 'Java', 'Learn some Java', 'java.png', 40),
(4, 3, 'Network', 'Learn some Network', 'wp2044699.jpg', 35),
(6, 1, 'Histoire de France', 'Explorez l\'histoire fascinante de la France', 'histoire-france.jpg', 60),
(7, 2, 'Gastronomie française', 'Découvrez les délices de la cuisine française', 'gastronomie_image.jpg', 45),
(8, 3, 'Art et culture', 'Plongez dans l\'art et la culture français', NULL, 30),
(9, 2, 'Concepts fondamentaux', 'Comprenez les principes de base de la programmation orientée objet', NULL, 45),
(10, 3, 'Encapsulation et abstraction', 'Explorez les concepts d\'encapsulation et d\'abstraction en POO', NULL, 60),
(11, 2, 'Héritage et polymorphisme', 'Découvrez l\'héritage et le polymorphisme en POO', NULL, 60),
(12, 3, 'Anciennes civilisations', 'Découvrez les anciennes civilisations du monde', NULL, 60),
(13, 2, 'Événements marquants', 'Explorez les événements marquants de l\'histoire mondiale', NULL, 45),
(14, 1, 'Personnages historiques', 'Apprenez-en davantage sur les personnages historiques influents', NULL, 30),
(15, 1, 'Calcul mental', 'Exercez votre calcul mental avec des problèmes mathématiques', NULL, 30),
(16, 3, 'Géométrie', 'Explorez les concepts de base de la géométrie', NULL, 45),
(17, 2, 'Algèbre', 'Plongez dans le monde de l\'algèbre et des équations mathématiques', NULL, 60),
(18, 2, 'Capitales du monde', 'Testez vos connaissances sur les capitales du monde', NULL, 45),
(19, 1, 'Pays et continents', 'Découvrez les pays et les continents du monde', NULL, 30),
(20, 3, 'Relief et climat', 'Explorez les caractéristiques du relief et du climat à travers le monde', NULL, 60);

-- --------------------------------------------------------

--
-- Structure de la table `commentary`
--

CREATE TABLE `commentary` (
  `idComment` int(11) NOT NULL,
  `idUser` int(11) DEFAULT NULL,
  `comment` text DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `idMemo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `commentary`
--

INSERT INTO `commentary` (`idComment`, `idUser`, `comment`, `timestamp`, `idMemo`) VALUES
(1, 1, 'Le cours de grammaire était très instructif. J\'ai enfin compris certaines règles qui me posaient problème.', '2023-06-14 18:23:40', 1),
(2, 2, 'Le cours de conversation était génial ! J\'ai pu pratiquer mon français avec d\'autres étudiants et gagner en confiance.', '2023-06-14 18:23:40', 1),
(3, 3, 'Le cours de littérature française m\'a ouvert les portes d\'un nouveau monde. Les œuvres étudiées étaient captivantes.', '2023-06-14 18:23:40', 2),
(4, 4, 'Je recommande vivement le cours de phonétique. J\'ai amélioré ma prononciation et mon accent grâce aux exercices pratiques.', '2023-06-14 18:23:40', 4),
(5, 4, 'Le cours de traduction était un défi stimulant. J\'ai pu mettre mes compétences linguistiques à l\'épreuve et développer mes capacités de traduction.', '2023-06-14 18:23:40', 2),
(6, 4, 'Le cours de culture française était enrichissant. J\'ai découvert l\'histoire, la cuisine et les traditions de la France de manière intéressante.', '2023-06-14 18:23:40', 2);

-- --------------------------------------------------------

--
-- Structure de la table `constitueexos`
--

CREATE TABLE `constitueexos` (
  `idExercice` int(4) NOT NULL,
  `idCategory` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `constitueexos`
--

INSERT INTO `constitueexos` (`idExercice`, `idCategory`) VALUES
(1, 2),
(2, 3),
(3, 2),
(4, 1),
(5, 7);

-- --------------------------------------------------------

--
-- Structure de la table `exercices`
--

CREATE TABLE `exercices` (
  `idExercice` int(4) NOT NULL,
  `descTache` varchar(500) DEFAULT NULL,
  `stars` float NOT NULL,
  `author` varchar(100) NOT NULL,
  `difficulty` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `exercices`
--

INSERT INTO `exercices` (`idExercice`, `descTache`, `stars`, `author`, `difficulty`) VALUES
(1, 'Question sur la culture française', 4.6, 'Rayane Bendah', ''),
(2, 'Question en Programmation orientée objet', 3.4, 'Hamed Ona', ''),
(3, 'Question sur l\'histoire mondiale', 5, 'Phil StJ', ''),
(4, 'Question de mathématiques', 4, 'Lewis Mithen', ''),
(5, 'Question de géographie', 1, 'Mathieu Joe', '');

-- --------------------------------------------------------

--
-- Structure de la table `memo_cards`
--

CREATE TABLE `memo_cards` (
  `idMemo` int(11) NOT NULL,
  `idExercices` int(11) NOT NULL,
  `question` char(150) NOT NULL,
  `reponse` char(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `memo_cards`
--

INSERT INTO `memo_cards` (`idMemo`, `idExercices`, `question`, `reponse`) VALUES
(1, 1, 'Quelle est la capitale de la France ?', 'La capitale de la France est Paris.'),
(2, 1, 'Quel est le plus long fleuve du monde ?', 'Le plus long fleuve du monde est le Nil.'),
(3, 1, 'Quelle est la formule chimique de l\'eau ?', 'La formule chimique de l\'eau est H2O.'),
(4, 1, 'Qui a peint la Joconde ?', 'La Joconde a été peinte par Léonard de Vinci.'),
(5, 2, 'Qu\'est-ce qu\'une classe en programmation orientée objet ?', 'Une classe est un modèle ou un plan permettant de créer des objets.'),
(6, 2, 'Qu\'est-ce qu\'un objet en programmation orientée objet ?', 'Un objet est une instance d\'une classe.'),
(7, 2, 'Qu\'est-ce qu\'une méthode en programmation orientée objet ?', 'Une méthode est un comportement ou une action associée à un objet.'),
(8, 2, 'Qu\'est-ce qu\'un attribut en programmation orientée objet ?', 'Un attribut est une caractéristique ou une donnée associée à un objet.'),
(9, 3, 'Quelle était l\'année de la Révolution française ?', 'La Révolution française a commencé en 1789.'),
(10, 3, 'Qui était le premier président des États-Unis ?', 'Le premier président des États-Unis était George Washington.'),
(11, 3, 'Quel événement a déclenché la Première Guerre mondiale ?', 'L\'assassinat de l\'archiduc François-Ferdinand d\'Autriche à Sarajevo en 1914.'),
(12, 4, 'Quel est le théorème de Pythagore ?', 'Le théorème de Pythagore énonce que dans un triangle rectangle, le carré de l\'hypoténuse est égal à la somme des carrés des deux autres côtés.'),
(13, 4, 'Quelle est la formule de l\'aire d\'un cercle ?', 'La formule de l\'aire d\'un cercle est A = πr², où A représente l\'aire et r représente le rayon du cercle.'),
(14, 4, 'Quel est le théorème de Thalès ?', 'Le théorème de Thalès énonce que dans un triangle, si les trois sommets sont alignés avec trois points sur une droite parallèle, alors les segments fo'),
(15, 4, 'Qu\'est-ce qu\'une équation quadratique ?', 'Une équation quadratique est une équation de la forme ax² + bx + c = 0, où a, b et c sont des constantes et x est la variable.'),
(16, 5, 'Quel est le plus haut sommet du monde ?', 'Le plus haut sommet du monde est l\'Everest, avec une altitude de 8 848 mètres.'),
(17, 5, 'Quel est le plus grand pays du monde en termes de superficie ?', 'Le plus grand pays du monde en termes de superficie est la Russie, avec une superficie totale d\'environ 17,1 millions de kilomètres carrés.'),
(18, 5, 'Quel est le plus long fleuve d\'Europe ?', 'Le plus long fleuve d\'Europe est la Volga, avec une longueur d\'environ 3 530 kilomètres.');

-- --------------------------------------------------------

--
-- Structure de la table `users`
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
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`idUser`, `username`, `password`, `email`, `admin`, `dateRegister`, `image`) VALUES
(1, 'testUser', 'bWRwVHJwQ29tcGxpcXVl', 'testUser@gmail.com', 1, '2023-03-08', 'avatar.png'),
(2, 'testUser2', 'bWRwVHJwQ29tcGxpcXVl', 'testUser2@gmail.com', 0, '0000-00-00', 'avatar3.png'),
(3, 'testUser3', 'bWRwVHJwQ29tcGxpcXVl', 'testUser3@gmail.com', 0, '0000-00-00', 'avatar2.png'),
(4, 'Test', 'bWRwVHJwQ29tcGxpcXVl', 'te@test.com', 0, NULL, 'avatar04.png'),
(5, 'Phil', 'bWRwVHJwQ29tcGxpcXVl', 'phil@gmail.com', 0, NULL, 'avatar5.png'),
(6, 'test888', 'bWRwVHJwQ29tcGxpcXVl', 'test888@gmail.com', 0, NULL, 'user2-160x160.jpg');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`idCategory`);

--
-- Index pour la table `commentary`
--
ALTER TABLE `commentary`
  ADD PRIMARY KEY (`idComment`),
  ADD KEY `idUser` (`idUser`),
  ADD KEY `idMemo` (`idMemo`);

--
-- Index pour la table `constitueexos`
--
ALTER TABLE `constitueexos`
  ADD PRIMARY KEY (`idExercice`,`idCategory`),
  ADD KEY `idCategory` (`idCategory`);

--
-- Index pour la table `exercices`
--
ALTER TABLE `exercices`
  ADD PRIMARY KEY (`idExercice`);

--
-- Index pour la table `memo_cards`
--
ALTER TABLE `memo_cards`
  ADD PRIMARY KEY (`idMemo`),
  ADD KEY `idExercices` (`idExercices`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`idUser`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `category`
--
ALTER TABLE `category`
  MODIFY `idCategory` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT pour la table `commentary`
--
ALTER TABLE `commentary`
  MODIFY `idComment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `memo_cards`
--
ALTER TABLE `memo_cards`
  MODIFY `idMemo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `idUser` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `commentary`
--
ALTER TABLE `commentary`
  ADD CONSTRAINT `commentary_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `users` (`idUser`),
  ADD CONSTRAINT `commentary_ibfk_2` FOREIGN KEY (`idMemo`) REFERENCES `memo_cards` (`idMemo`);

--
-- Contraintes pour la table `constitueexos`
--
ALTER TABLE `constitueexos`
  ADD CONSTRAINT `constitueexos_ibfk_1` FOREIGN KEY (`idCategory`) REFERENCES `category` (`idCategory`),
  ADD CONSTRAINT `constitueexos_ibfk_2` FOREIGN KEY (`idExercice`) REFERENCES `exercices` (`idExercice`);

--
-- Contraintes pour la table `memo_cards`
--
ALTER TABLE `memo_cards`
  ADD CONSTRAINT `memo_cards_ibfk_1` FOREIGN KEY (`idExercices`) REFERENCES `exercices` (`idExercice`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
