-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 01 juil. 2019 à 18:12
-- Version du serveur :  5.7.23
-- Version de PHP :  7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `projet`
--

-- --------------------------------------------------------

--
-- Structure de la table `event`
--

DROP TABLE IF EXISTS `event`;
CREATE TABLE IF NOT EXISTS `event` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(256) NOT NULL,
  `date` date DEFAULT NULL,
  `content` varchar(1500) NOT NULL,
  `published` int(11) NOT NULL,
  `summary` varchar(256) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=72 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `event`
--

INSERT INTO `event` (`id`, `name`, `date`, `content`, `published`, `summary`) VALUES
(1, 'La ville, la nuit', '2019-06-15', 'Les anges déchus de Wong Kar-Wai (1995), 1h36\r\nHong Kong, la nuit. Un tueur à gages en a assez de tuer. Une femme rêve qu\'il tombe amoureux d\'elle. Une jeune fille veut se venger d\'un amour déçu. Un garçon muet déambule dans les rues. Sous les néons, l’errance des personnages est somptueusement filmée : c’est un kaleïdoscope d’émotions et d’images, un film romantique et électrique.', 1, 'Une ville, ça ne dort jamais. Le nouveau cycle Nuit proposé par les bibliothèques vous invite à explorer la ville, la nuit à travers lectures, expositions et ateliers.'),
(2, 'Prix du conservatoire / Jeune Création', '2019-06-08', 'Dénicheurs de talents\r\nAprès l\'exposition à Pantin, la 68e édition Jeune Création a pris place aux Beaux-Arts de Paris. Le Pavillon, département arts plastiques du CRD et partenaire de l’association Jeune Création, a décerné le prix du Conservatoire au jeune artiste Maximilien Pellet. L’occasion de découvrir son travail lors de l’exposition qui lui est dédiée au sein du Pavillon.', 1, 'Exposition de l\'artiste lauréat du prix du Conservatoire de Jeune Création 2018.'),
(3, 'New School + #MMIBTY', '2019-06-15', 'Amala Dianor et Compagnie Uzumaki\r\nLe trio New School est une nouvelle génération de danseurs qui installent un rapport de complicité et de jeu permanent pour inventer la genèse de « l’abstract », un style qui ose le métissage tout en s’appuyant sur les conventions hip-hop.\r\nEn deuxième partie de soirée, un voyage doux et planant entre deux mondes, l’Orient et l’Occident. Ici, le breakdance et le voguing donnent à voir une berceuse aux corps enlacés et rendent hommage à la figure maternelle. Une soirée entre les continents qui raconte une nouvelle page du hip-hop.', 1, 'Deux spectacles qui mixent les styles pour créer une nouvelle page du hip-hop. Avec les danseurs des compagnies Amala Dianor et Uzumaki.'),
(71, 'testarosa', '2019-06-01', 'testarosa', 0, 'testarosa');

-- --------------------------------------------------------

--
-- Structure de la table `event_media`
--

DROP TABLE IF EXISTS `event_media`;
CREATE TABLE IF NOT EXISTS `event_media` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `event_id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_event_media` (`event_id`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `event_media`
--

INSERT INTO `event_media` (`id`, `event_id`, `name`) VALUES
(1, 1, 'night.png'),
(2, 3, 'schoolDance.png'),
(3, 2, 'expo.png'),
(50, 71, '88705af32f432db6df10c0932b4b23b4.png');

-- --------------------------------------------------------

--
-- Structure de la table `faq`
--

DROP TABLE IF EXISTS `faq`;
CREATE TABLE IF NOT EXISTS `faq` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question` varchar(256) NOT NULL,
  `answer` varchar(256) NOT NULL,
  `category` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_faq_category` (`category`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `faq`
--

INSERT INTO `faq` (`id`, `question`, `answer`, `category`) VALUES
(1, 'Quelles lignes de métro désservent la ville de Pantin?', 'La ligne de métro 5 est la seule à desservir la ville de Pantin cependant vous pouvez retrouver le T3b et de nombreux bus', 1),
(2, 'Avons nous accès aux infrastructures sportives le dimanche ?', 'les stades extérieurs sont ouverts toutes la semaine pour vérifier la disponibilité des infrastructures intérieures rendez vous sur la page service catégorie Sports et loisirs ', 2),
(3, 'Quel jour s\'effectue le ramassage des ordures ?', 'Le ramassage des ordures s\'effectuent 1 fois par semaine le mercredi dans la journée', 3),
(4, 'Quels sont les événements à Pantin durant la fête de la musique ?', 'Vous pourrez retrouver plusieurs scènes pour tout les goûts, Techno, Hip-Hop, 90\'s', 4);

-- --------------------------------------------------------

--
-- Structure de la table `faq_category`
--

DROP TABLE IF EXISTS `faq_category`;
CREATE TABLE IF NOT EXISTS `faq_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(256) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `faq_category`
--

INSERT INTO `faq_category` (`id`, `name`) VALUES
(1, 'Transports'),
(2, 'Infrastructure'),
(3, 'Services'),
(4, 'Evenements');

-- --------------------------------------------------------

--
-- Structure de la table `fees`
--

DROP TABLE IF EXISTS `fees`;
CREATE TABLE IF NOT EXISTS `fees` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(256) NOT NULL,
  `date` date DEFAULT NULL,
  `amount` varchar(256) NOT NULL,
  `file` varchar(256) NOT NULL,
  `user` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_fees_user` (`user`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `fees`
--

INSERT INTO `fees` (`id`, `name`, `date`, `amount`, `file`, `user`) VALUES
(1, 'test', '2019-06-13', '190', 'test.pdf', 1),
(2, 'testarosa', '2019-06-30', '1900', '19c0a7a781ad7962fc1bcdf541080110.pdf', 1);

-- --------------------------------------------------------

--
-- Structure de la table `receipt`
--

DROP TABLE IF EXISTS `receipt`;
CREATE TABLE IF NOT EXISTS `receipt` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(256) NOT NULL,
  `amount` int(3) NOT NULL,
  `file` varchar(256) NOT NULL,
  `id_user` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_id_user` (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `services`
--

DROP TABLE IF EXISTS `services`;
CREATE TABLE IF NOT EXISTS `services` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(256) NOT NULL,
  `categorie` int(11) NOT NULL,
  `lat` float NOT NULL,
  `longi` float NOT NULL,
  `schedule` varchar(256) NOT NULL,
  `address` varchar(256) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_services_cat` (`categorie`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `services`
--

INSERT INTO `services` (`id`, `name`, `categorie`, `lat`, `longi`, `schedule`, `address`) VALUES
(1, 'Charles Auray', 1, 48.8889, 2.41414, 'Lundi - Dimanche 24h/7', '9 Rue de Candale, 93500 Pantin'),
(2, 'Léo Lagrange', 6, 48.9026, 2.39504, 'Lundi au Samedi de 9h à 19h', '10 Rue Honoré, 93500 Pantin'),
(3, 'Conservatoire à Rayonnement Départemental (CRD)', 2, 48.8972, 2.40186, 'Lundi au Vendredi 9h à 18h', '2 rue Sadi Carnot 93500 Pantin');

-- --------------------------------------------------------

--
-- Structure de la table `services_cat`
--

DROP TABLE IF EXISTS `services_cat`;
CREATE TABLE IF NOT EXISTS `services_cat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(256) NOT NULL,
  `image` varchar(256) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `services_cat`
--

INSERT INTO `services_cat` (`id`, `name`, `image`) VALUES
(1, 'Enfance', 'enfance.jpg'),
(2, 'Culture', 'culture.jpg'),
(3, 'Commerces', 'commerce.jpg'),
(4, 'Solidarite', 'solidarite.jpg'),
(5, 'Qualite', 'qualite.jpg'),
(6, 'SportsLoisirs', 'sport.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lastname` text NOT NULL,
  `firstname` text NOT NULL,
  `password` varchar(256) NOT NULL,
  `birthdate` date DEFAULT NULL,
  `adresse` varchar(30) NOT NULL,
  `mail` varchar(30) NOT NULL,
  `phone_number` int(10) NOT NULL,
  `admin` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `lastname`, `firstname`, `password`, `birthdate`, `adresse`, `mail`, `phone_number`, `admin`) VALUES
(1, 'mehdi', 'kannouni', 'mehdi', NULL, '0', 'mehdi.kannouni@hotmail.fr', 0, 1),
(12, 'rtyui', 'zertyui', 'sdfghjk', '2019-06-16', 'tyui', 'ertyuo@mail.fr', 1010383912, 0);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `event_media`
--
ALTER TABLE `event_media`
  ADD CONSTRAINT `fk_event_media` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`);

--
-- Contraintes pour la table `faq`
--
ALTER TABLE `faq`
  ADD CONSTRAINT `fk_faq_category` FOREIGN KEY (`category`) REFERENCES `faq_category` (`id`);

--
-- Contraintes pour la table `fees`
--
ALTER TABLE `fees`
  ADD CONSTRAINT `fk_fees_user` FOREIGN KEY (`user`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `receipt`
--
ALTER TABLE `receipt`
  ADD CONSTRAINT `fk_id_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `services`
--
ALTER TABLE `services`
  ADD CONSTRAINT `fk_services_cat` FOREIGN KEY (`categorie`) REFERENCES `services_cat` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
