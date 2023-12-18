-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 15 déc. 2023 à 22:29
-- Version du serveur :  5.7.31
-- Version de PHP : 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `snowtricks`
--

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
CREATE TABLE IF NOT EXISTS `categorie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`id`, `libelle`) VALUES
(1, 'Les Grabs'),
(2, 'Les butters'),
(3, 'Les Spins\r\n'),
(4, 'Les Flips'),
(5, 'Les Corks\r\n'),
(6, 'Les Boxes\r\n'),
(7, 'Les Rails\r\n');

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

DROP TABLE IF EXISTS `commentaire`;
CREATE TABLE IF NOT EXISTS `commentaire` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user_id` int(11) DEFAULT NULL,
  `id_tricks_id` int(11) DEFAULT NULL,
  `commentaire` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_67F068BC79F37AE5` (`id_user_id`),
  KEY `IDX_67F068BCBB208D73` (`id_tricks_id`)
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `commentaire`
--

INSERT INTO `commentaire` (`id`, `id_user_id`, `id_tricks_id`, `commentaire`, `date`) VALUES
(20, 1, 58, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur ornare lacus odio. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Duis sodales nisl at quam auctor venenatis. Praesent consequat arcu.\r\n\r\n', '2023-12-13 10:49:25'),
(21, 2, 58, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur ornare lacus odio. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Duis sodales nisl at quam auctor venenatis. Praesent consequat arcu.\r\n\r\n', '2023-12-14 10:49:25'),
(22, 1, 58, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur ornare lacus odio. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Duis sodales nisl at quam auctor venenatis. Praesent consequat arcu.\r\n\r\n', '2023-12-15 10:49:25'),
(23, 2, 58, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur ornare lacus odio. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Duis sodales nisl at quam auctor venenatis. Praesent consequat arcu.\r\n\r\n', '2023-12-15 17:49:25'),
(24, 1, 58, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur ornare lacus odio. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Duis sodales nisl at quam auctor venenatis. Praesent consequat arcu.\r\n\r\n', '2023-12-17 10:49:25'),
(25, 1, 58, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur ornare lacus odio. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Duis sodales nisl at quam auctor venenatis. Praesent consequat arcu.\r\n\r\n', '2023-12-17 18:49:25'),
(26, 1, 59, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur ornare lacus odio. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Duis sodales nisl at quam auctor venenatis. Praesent consequat arcu.\r\n\r\n', '2023-12-01 10:51:39'),
(27, 2, 59, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur ornare lacus odio. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Duis sodales nisl at quam auctor venenatis. Praesent consequat arcu.\r\n\r\n', '2023-12-02 10:51:39'),
(28, 1, 59, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur ornare lacus odio. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Duis sodales nisl at quam auctor venenatis. Praesent consequat arcu.\r\n\r\n', '2023-12-03 10:52:14'),
(29, 2, 59, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur ornare lacus odio. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Duis sodales nisl at quam auctor venenatis. Praesent consequat arcu.\r\n\r\n', '2023-12-04 10:52:14'),
(30, 1, 59, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur ornare lacus odio. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Duis sodales nisl at quam auctor venenatis. Praesent consequat arcu.\r\n\r\n', '2023-12-05 10:52:14'),
(31, 2, 59, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur ornare lacus odio. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Duis sodales nisl at quam auctor venenatis. Praesent consequat arcu.\r\n\r\n', '2023-12-07 10:52:14'),
(32, 2, 61, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur ornare lacus odio. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Duis sodales nisl at quam auctor venenatis. Praesent consequat arcu.\r\n\r\n', '2023-12-05 10:53:21'),
(33, 1, 61, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur ornare lacus odio. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Duis sodales nisl at quam auctor venenatis. Praesent consequat arcu.\r\n\r\n', '2023-12-07 10:53:21'),
(34, 2, 61, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur ornare lacus odio. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Duis sodales nisl at quam auctor venenatis. Praesent consequat arcu.\r\n\r\n', '2023-12-08 10:54:05'),
(35, 1, 61, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur ornare lacus odio. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Duis sodales nisl at quam auctor venenatis. Praesent consequat arcu.\r\n\r\n', '2023-12-09 10:54:05'),
(36, 2, 61, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur ornare lacus odio. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Duis sodales nisl at quam auctor venenatis. Praesent consequat arcu.\r\n\r\n', '2023-12-10 10:54:05'),
(37, 1, 61, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur ornare lacus odio. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Duis sodales nisl at quam auctor venenatis. Praesent consequat arcu.\r\n\r\n', '2023-12-11 10:54:05'),
(38, 1, 60, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur ornare lacus odio. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Duis sodales nisl at quam auctor venenatis. Praesent consequat arcu.\r\n\r\n', '2023-12-03 10:55:30'),
(39, 2, 60, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur ornare lacus odio. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Duis sodales nisl at quam auctor venenatis. Praesent consequat arcu.\r\n\r\n', '2023-12-04 10:55:30'),
(40, 1, 60, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur ornare lacus odio. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Duis sodales nisl at quam auctor venenatis. Praesent consequat arcu.\r\n\r\n', '2023-12-05 10:55:30'),
(41, 2, 60, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur ornare lacus odio. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Duis sodales nisl at quam auctor venenatis. Praesent consequat arcu.\r\n\r\n', '2023-12-06 10:55:30'),
(42, 2, 60, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur ornare lacus odio. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Duis sodales nisl at quam auctor venenatis. Praesent consequat arcu.\r\n\r\n', '2023-12-07 10:55:30'),
(43, 1, 60, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur ornare lacus odio. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Duis sodales nisl at quam auctor venenatis. Praesent consequat arcu.\r\n\r\n', '2023-12-08 10:55:30'),
(44, 1, 62, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur ornare lacus odio. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Duis sodales nisl at quam auctor venenatis. Praesent consequat arcu.\r\n\r\n', '2023-12-04 10:57:12'),
(45, 2, 62, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur ornare lacus odio. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Duis sodales nisl at quam auctor venenatis. Praesent consequat arcu.\r\n\r\n', '2023-12-05 10:57:12'),
(46, 1, 62, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur ornare lacus odio. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Duis sodales nisl at quam auctor venenatis. Praesent consequat arcu.\r\n\r\n', '2023-12-05 10:57:52'),
(47, 2, 62, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur ornare lacus odio. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Duis sodales nisl at quam auctor venenatis. Praesent consequat arcu.\r\n\r\n', '2023-12-06 10:57:52'),
(48, 2, 62, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur ornare lacus odio. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Duis sodales nisl at quam auctor venenatis. Praesent consequat arcu.\r\n\r\n', '2023-12-07 10:57:52'),
(49, 1, 62, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur ornare lacus odio. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Duis sodales nisl at quam auctor venenatis. Praesent consequat arcu.\r\n\r\n', '2023-12-08 10:57:52');

-- --------------------------------------------------------

--
-- Structure de la table `doctrine_migration_versions`
--

DROP TABLE IF EXISTS `doctrine_migration_versions`;
CREATE TABLE IF NOT EXISTS `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20230614151929', '2023-06-14 15:20:07', 82),
('DoctrineMigrations\\Version20230614152808', '2023-06-14 15:28:20', 167),
('DoctrineMigrations\\Version20230614180346', '2023-06-14 18:03:59', 524),
('DoctrineMigrations\\Version20230622205000', '2023-06-22 20:50:24', 1052),
('DoctrineMigrations\\Version20230622211527', '2023-06-22 21:15:41', 255),
('DoctrineMigrations\\Version20230712091325', '2023-07-12 09:13:45', 1040),
('DoctrineMigrations\\Version20230712095029', '2023-07-12 09:50:39', 72),
('DoctrineMigrations\\Version20230713083552', '2023-07-13 08:35:59', 107),
('DoctrineMigrations\\Version20230713095714', '2023-07-13 09:57:21', 1046),
('DoctrineMigrations\\Version20230801181130', '2023-08-01 18:12:08', 2643),
('DoctrineMigrations\\Version20230820213004', '2023-08-20 21:30:14', 1880),
('DoctrineMigrations\\Version20231001202210', '2023-10-01 20:22:22', 1129),
('DoctrineMigrations\\Version20231010212547', '2023-10-10 21:25:56', 476),
('DoctrineMigrations\\Version20231207114756', '2023-12-07 11:48:15', 368),
('DoctrineMigrations\\Version20231213141724', '2023-12-13 14:17:38', 1585);

-- --------------------------------------------------------

--
-- Structure de la table `media`
--

DROP TABLE IF EXISTS `media`;
CREATE TABLE IF NOT EXISTS `media` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tricks_id` int(11) DEFAULT NULL,
  `image` longtext COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`),
  KEY `IDX_6A2CA10C3B153154` (`tricks_id`)
) ENGINE=InnoDB AUTO_INCREMENT=83 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `media`
--

INSERT INTO `media` (`id`, `tricks_id`, `image`) VALUES
(37, 60, 'default-image-657ac44b9d5e8.jpg'),
(38, 60, 'pexels-agustin-villalba-17206877-657ac44bd1993.jpg'),
(39, 60, 'pexels-bert-christiaens-5699888-657ac44bd6252.jpg'),
(40, 60, 'pexels-kirill-lazarev-8532486-657ac44bda64d.jpg'),
(41, 61, 'default-image-657ae7dc17351.jpg'),
(42, 61, 'pexels-pixabay-209817-657ac454e188b.jpg '),
(43, 61, 'pexels-ryan-leeper-4580974-657ac454e43ab.jpg'),
(44, 61, 'pexels-visit-almaty-848599-657ac454e8576.jpg'),
(45, 62, 'pexels-evgenia-kirpichnikova-1973293-657ac6435eaaa.jpg'),
(46, 62, 'pexels-john-robertnicoud-38242-657ac64368142.jpg'),
(47, 62, 'pexels-kirill-lazarev-8532486-657ac6436af31.jpg'),
(48, 62, 'pexels-paul-voie-10626867-657c31d71e224.jpg'),
(49, 63, 'pexels-agustin-villalba-17206877-657ac666e0c78.jpg'),
(50, 63, 'pexels-bert-christiaens-5699888-657ac666e7d11.jpg'),
(51, 63, 'pexels-kirill-lazarev-8532486-657ac666ec487.jpg'),
(52, 63, 'pexels-paul-voie-10626867-657ac666f1107.jpg'),
(53, 64, 'pexels-pixabay-209817-657ac6aaecd9f.jpg'),
(54, 64, 'pexels-ryan-leeper-4580974-657ac6aaf3a4f.jpg'),
(55, 64, 'pexels-visit-almaty-848599-657ac6ab02f2f.jpg'),
(56, 66, 'pexels-chris-f-3888007-657ac733d85d5.jpg'),
(57, 66, 'pexels-evgenia-kirpichnikova-1973293-657ac733e0bb8.jpg'),
(58, 66, 'pexels-john-robertnicoud-38242-657ac733e4b7c.jpg'),
(59, 67, 'pexels-kirill-lazarev-8532486-657ac77b52270.jpg'),
(60, 67, 'pexels-pixabay-209817-657ac77b5b0c2.jpg'),
(61, 67, 'pexels-ryan-leeper-4580974-657ac77b5dbdb.jpg'),
(62, 68, 'pexels-pixabay-209817-657ac7d937408.jpg'),
(63, 68, 'pexels-ryan-leeper-4580974-657ac7d93e7f0.jpg'),
(64, 68, 'pexels-visit-almaty-848599-657ac7d942160.jpg'),
(65, 69, 'pexels-evgenia-kirpichnikova-1973293-657ac81f56a98.jpg'),
(66, 69, 'pexels-kirill-lazarev-8532486-657ac81f5cadb.jpg'),
(67, 69, 'pexels-paul-voie-10626867-657ac81f61d15.jpg'),
(68, 70, 'default-image-657ac83e4517d.jpg'),
(69, 70, 'pexels-kirill-lazarev-8532486-657ac83e4d200.jpg'),
(70, 70, 'pexels-paul-voie-10626867-657ac83e5123e.jpg'),
(71, 71, 'pexels-chris-f-3888007-657ac87136fc4.jpg'),
(72, 71, 'pexels-john-robertnicoud-38242-657ac8713eca4.jpg'),
(73, 71, 'pexels-kirill-lazarev-8532486-657ac87141ad2.jpg'),
(74, 71, 'pexels-paul-voie-10626867-657ac871457ec.jpg'),
(75, 58, 'pexels-agustin-villalba-17206877-657ac44bd1993.jpg'),
(76, 58, 'pexels-bert-christiaens-5699888-657ac44bd6252.jpg'),
(77, 59, 'pexels-bert-christiaens-5699888-657ac44bd6252.jpg'),
(78, 59, 'pexels-bert-christiaens-5699888-657ac666e7d11.jpg'),
(79, 59, 'pexels-pixabay-209817-657ac454e188b.jpg'),
(80, 65, 'pexels-bert-christiaens-5699888-657ac666e7d11.jpg'),
(81, 65, 'pexels-pixabay-209817-657ac454e188b.jpg'),
(82, 65, 'pexels-bert-christiaens-5699888-657ac44bd6252.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `reset_password_request`
--

DROP TABLE IF EXISTS `reset_password_request`;
CREATE TABLE IF NOT EXISTS `reset_password_request` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `selector` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hashed_token` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `requested_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `expires_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  PRIMARY KEY (`id`),
  KEY `IDX_7CE748AA76ED395` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `reset_password_request`
--

INSERT INTO `reset_password_request` (`id`, `user_id`, `selector`, `hashed_token`, `requested_at`, `expires_at`) VALUES
(1, 2, 'U8aYumbkCbrDU69B1KQ0', 'EtEeO9qjqENfKDo1i1nm8oTqiNnFDepnJFJbZFFJZNg=', '2023-12-15 14:47:46', '2023-12-15 15:47:46');

-- --------------------------------------------------------

--
-- Structure de la table `tricks`
--

DROP TABLE IF EXISTS `tricks`;
CREATE TABLE IF NOT EXISTS `tricks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `categorie_id` int(11) DEFAULT NULL,
  `id_user_id` int(11) DEFAULT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `ajouter` datetime DEFAULT NULL,
  `modifier` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_E1D902C1BCF5E72D` (`categorie_id`),
  KEY `IDX_E1D902C179F37AE5` (`id_user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=72 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `tricks`
--

INSERT INTO `tricks` (`id`, `categorie_id`, `id_user_id`, `nom`, `description`, `ajouter`, `modifier`) VALUES
(58, 1, NULL, 'trick', 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l\'imprimerie depuis les années 1500, quand un imprimeur anonyme assembla ensemble des morceaux de texte pour réaliser un livre spécimen de polices de texte. Il n\'a pas fait que survivre cinq siècles, mais s\'est aussi adapté à la bureautique informatique, sans que son contenu n\'en soit modifié.', '2023-12-14 08:59:02', NULL),
(59, 1, NULL, 'tricks1', 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l\'imprimerie depuis les années 1500, quand un imprimeur anonyme assembla ensemble des morceaux de texte pour réaliser un livre spécimen de polices de texte. Il n\'a pas fait que survivre cinq siècles, mais s\'est aussi adapté à la bureautique informatique, sans que son contenu n\'en soit modifié.', '2023-12-14 08:59:10', NULL),
(60, 2, NULL, 'tricks3', 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l\'imprimerie depuis les années 1500, quand un imprimeur anonyme assembla ensemble des morceaux de texte pour réaliser un livre spécimen de polices de texte. Il n\'a pas fait que survivre cinq siècles, mais s\'est aussi adapté à la bureautique informatique, sans que son contenu n\'en soit modifié.', '2023-12-14 09:00:58', NULL),
(61, 2, NULL, 'tricks2', 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l\'imprimerie depuis les années 1500, quand un imprimeur anonyme assembla ensemble des morceaux de texte pour réaliser un livre spécimen de polices de texte. Il n\'a pas fait que survivre cinq siècles, mais s\'est aussi adapté à la bureautique informatique, sans que son contenu n\'en soit modifié.', '2023-12-14 09:01:08', NULL),
(62, 4, NULL, 'tricks4', 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l\'imprimerie depuis les années 1500, quand un imprimeur anonyme assembla ensemble des morceaux de texte pour réaliser un livre spécimen de polices de texte. Il n\'a pas fait que survivre cinq siècles, mais s\'est aussi adapté à la bureautique informatique, sans que son contenu n\'en soit modifié.', '2023-12-14 09:09:22', NULL),
(63, 4, NULL, 'tricks5', 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l\'imprimerie depuis les années 1500, quand un imprimeur anonyme assembla ensemble des morceaux de texte pour réaliser un livre spécimen de polices de texte. Il n\'a pas fait que survivre cinq siècles, mais s\'est aussi adapté à la bureautique informatique, sans que son contenu n\'en soit modifié.', '2023-12-14 09:09:58', NULL),
(64, 5, NULL, 'tricks6', 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l\'imprimerie depuis les années 1500, quand un imprimeur anonyme assembla ensemble des morceaux de texte pour réaliser un livre spécimen de polices de texte. Il n\'a pas fait que survivre cinq siècles, mais s\'est aussi adapté à la bureautique informatique, sans que son contenu n\'en soit modifié.', '2023-12-14 09:11:06', NULL),
(65, 4, NULL, 'tricks7', 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l\'imprimerie depuis les années 1500, quand un imprimeur anonyme assembla ensemble des morceaux de texte pour réaliser un livre spécimen de polices de texte. Il n\'a pas fait que survivre cinq siècles, mais s\'est aussi adapté à la bureautique informatique, sans que son contenu n\'en soit modifié.', '2023-12-14 09:11:34', NULL),
(66, 4, NULL, 'tricks8', 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l\'imprimerie depuis les années 1500, quand un imprimeur anonyme assembla ensemble des morceaux de texte pour réaliser un livre spécimen de polices de texte. Il n\'a pas fait que survivre cinq siècles, mais s\'est aussi adapté à la bureautique informatique, sans que son contenu n\'en soit modifié.', '2023-12-14 09:13:23', NULL),
(67, 5, NULL, 'tricks9', 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l\'imprimerie depuis les années 1500, quand un imprimeur anonyme assembla ensemble des morceaux de texte pour réaliser un livre spécimen de polices de texte. Il n\'a pas fait que survivre cinq siècles, mais s\'est aussi adapté à la bureautique informatique, sans que son contenu n\'en soit modifié.', '2023-12-14 09:14:34', NULL),
(68, 6, NULL, 'tricks10', 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l\'imprimerie depuis les années 1500, quand un imprimeur anonyme assembla ensemble des morceaux de texte pour réaliser un livre spécimen de polices de texte. Il n\'a pas fait que survivre cinq siècles, mais s\'est aussi adapté à la bureautique informatique, sans que son contenu n\'en soit modifié.', '2023-12-14 09:16:08', NULL),
(69, 6, NULL, 'tricks11', 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l\'imprimerie depuis les années 1500, quand un imprimeur anonyme assembla ensemble des morceaux de texte pour réaliser un livre spécimen de polices de texte. Il n\'a pas fait que survivre cinq siècles, mais s\'est aussi adapté à la bureautique informatique, sans que son contenu n\'en soit modifié.', '2023-12-14 09:17:18', NULL),
(70, 7, NULL, 'tricks12', 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l\'imprimerie depuis les années 1500, quand un imprimeur anonyme assembla ensemble des morceaux de texte pour réaliser un livre spécimen de polices de texte. Il n\'a pas fait que survivre cinq siècles, mais s\'est aussi adapté à la bureautique informatique, sans que son contenu n\'en soit modifié.', '2023-12-14 09:17:49', NULL),
(71, 7, NULL, 'tricks13', 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l\'imprimerie depuis les années 1500, quand un imprimeur anonyme assembla ensemble des morceaux de texte pour réaliser un livre spécimen de polices de texte. Il n\'a pas fait que survivre cinq siècles, mais s\'est aussi adapté à la bureautique informatique, sans que son contenu n\'en soit modifié.', '2023-12-14 09:18:40', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` json NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_verified` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `email`, `roles`, `password`, `nom`, `prenom`, `is_verified`) VALUES
(1, 'saidou@saidou.com', '[\"ROLE_ADMIN\"]', '$2y$13$Ica67mmoH9yzwQfhnjPageiE1AdYc2DnyXVbOjCxMlGncY1a05MiS', 'keita', 'saidou', 1),
(2, 'test@test.fr', '[]', '$2y$13$hnDWh0hIZQGD2hIwcU4BMucYYWB1rGWVdeKa3jXymVr1fA7wmkYFe', 'test', 'test', 1);

-- --------------------------------------------------------

--
-- Structure de la table `video`
--

DROP TABLE IF EXISTS `video`;
CREATE TABLE IF NOT EXISTS `video` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `trick_video_id` int(11) DEFAULT NULL,
  `video1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_7CC7DA2C4C1284F1` (`trick_video_id`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `video`
--

INSERT INTO `video` (`id`, `trick_video_id`, `video1`) VALUES
(15, 58, 'https://www.youtube.com/embed/PxhfDec8Ays?si=xHaqgwuZAjXY5eEO'),
(16, 58, 'https://www.youtube.com/embed/PxhfDec8Ays?si=xHaqgwuZAjXY5eEO'),
(17, 59, 'https://www.youtube.com/embed/PxhfDec8Ays?si=xHaqgwuZAjXY5eEO'),
(18, 59, 'https://www.youtube.com/embed/PxhfDec8Ays?si=xHaqgwuZAjXY5eEO'),
(19, 60, 'https://www.youtube.com/embed/PxhfDec8Ays?si=xHaqgwuZAjXY5eEO'),
(20, 60, 'https://www.youtube.com/embed/PxhfDec8Ays?si=xHaqgwuZAjXY5eEO'),
(21, 61, 'https://www.youtube.com/embed/PxhfDec8Ays?si=xHaqgwuZAjXY5eEO'),
(22, 61, 'https://www.youtube.com/embed/PxhfDec8Ays?si=xHaqgwuZAjXY5eEO'),
(24, 62, 'https://www.youtube.com/embed/Iofrv4rxJcY?si=RnYz4kDP1lo9PEor'),
(26, 63, 'https://www.youtube.com/embed/PxhfDec8Ays?si=xHaqgwuZAjXY5eEO'),
(28, 64, 'https://www.youtube.com/embed/PxhfDec8Ays?si=xHaqgwuZAjXY5eEO'),
(30, 65, 'https://www.youtube.com/embed/PxhfDec8Ays?si=xHaqgwuZAjXY5eEO'),
(31, 66, 'https://www.youtube.com/embed/PxhfDec8Ays?si=xHaqgwuZAjXY5eEO'),
(32, 66, 'https://www.youtube.com/embed/PxhfDec8Ays?si=xHaqgwuZAjXY5eEO'),
(33, 67, 'https://www.youtube.com/embed/PxhfDec8Ays?si=xHaqgwuZAjXY5eEO'),
(34, 67, 'https://www.youtube.com/embed/PxhfDec8Ays?si=xHaqgwuZAjXY5eEO'),
(35, 68, 'https://www.youtube.com/embed/PxhfDec8Ays?si=xHaqgwuZAjXY5eEO'),
(36, 68, 'https://www.youtube.com/embed/PxhfDec8Ays?si=xHaqgwuZAjXY5eEO'),
(37, 69, 'https://www.youtube.com/embed/PxhfDec8Ays?si=xHaqgwuZAjXY5eEO'),
(38, 69, 'https://www.youtube.com/embed/PxhfDec8Ays?si=xHaqgwuZAjXY5eEO'),
(39, 70, 'https://www.youtube.com/embed/PxhfDec8Ays?si=xHaqgwuZAjXY5eEO'),
(40, 70, 'https://www.youtube.com/embed/PxhfDec8Ays?si=xHaqgwuZAjXY5eEO'),
(41, 71, 'https://www.youtube.com/embed/PxhfDec8Ays?si=xHaqgwuZAjXY5eEO'),
(42, 71, 'https://www.youtube.com/embed/PxhfDec8Ays?si=xHaqgwuZAjXY5eEO');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD CONSTRAINT `FK_67F068BC79F37AE5` FOREIGN KEY (`id_user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_67F068BCBB208D73` FOREIGN KEY (`id_tricks_id`) REFERENCES `tricks` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `media`
--
ALTER TABLE `media`
  ADD CONSTRAINT `FK_6A2CA10C3B153154` FOREIGN KEY (`tricks_id`) REFERENCES `tricks` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `reset_password_request`
--
ALTER TABLE `reset_password_request`
  ADD CONSTRAINT `FK_7CE748AA76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `tricks`
--
ALTER TABLE `tricks`
  ADD CONSTRAINT `FK_E1D902C179F37AE5` FOREIGN KEY (`id_user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_E1D902C1BCF5E72D` FOREIGN KEY (`categorie_id`) REFERENCES `categorie` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `video`
--
ALTER TABLE `video`
  ADD CONSTRAINT `FK_7CC7DA2C4C1284F1` FOREIGN KEY (`trick_video_id`) REFERENCES `tricks` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
