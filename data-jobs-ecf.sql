-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : dim. 03 juil. 2022 à 18:16
-- Version du serveur :  5.7.34
-- Version de PHP : 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `data-jobs-ecf`
--

-- --------------------------------------------------------

--
-- Structure de la table `company`
--

CREATE TABLE `company` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo_background` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `website` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `company`
--

INSERT INTO `company` (`id`, `name`, `logo`, `logo_background`, `position`, `website`, `user_id`) VALUES
(28, 'hanane', 'http://data:image/jpeg;base64,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', '#6cdc77', 'france', 'http://www.google.com', 5),
(31, 'company2', 'data:image/jpeg;base64,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', 'vert', 'suisse', 'www.facebook.com', 7);

-- --------------------------------------------------------

--
-- Structure de la table `doctrine_migration_versions`
--

CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20220622080612', '2022-06-22 08:06:32', 149),
('DoctrineMigrations\\Version20220622082457', '2022-06-22 08:25:25', 87),
('DoctrineMigrations\\Version20220622091203', '2022-06-22 09:12:21', 157),
('DoctrineMigrations\\Version20220622113743', '2022-06-22 11:37:57', 255),
('DoctrineMigrations\\Version20220623184054', '2022-06-23 18:41:19', 154),
('DoctrineMigrations\\Version20220623190130', '2022-06-23 19:01:52', 82),
('DoctrineMigrations\\Version20220623190817', '2022-06-23 19:08:28', 167),
('DoctrineMigrations\\Version20220623192254', '2022-06-23 19:27:53', 111),
('DoctrineMigrations\\Version20220629153702', '2022-06-29 15:39:11', 176),
('DoctrineMigrations\\Version20220629163822', '2022-06-29 16:39:13', 154);

-- --------------------------------------------------------

--
-- Structure de la table `jobs`
--

CREATE TABLE `jobs` (
  `id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `type_contract` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `posted` date NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `requirement` longtext COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `jobs`
--

INSERT INTO `jobs` (`id`, `company_id`, `type_contract`, `posted`, `description`, `requirement`) VALUES
(1, 28, 'mitemps', '2022-07-13', 'blablabalabala', 'blablaalba'),
(2, 31, 'temps pliens', '2022-07-12', 'blabalajkgsdluz:hdb,nsbclsjdcnbsd:,nf', 'bdzkgyfhvs:;,c,smlfhskjfns=lc,');

-- --------------------------------------------------------

--
-- Structure de la table `messenger_messages`
--

CREATE TABLE `messenger_messages` (
  `id` bigint(20) NOT NULL,
  `body` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `headers` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue_name` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `available_at` datetime NOT NULL,
  `delivered_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `offer`
--

CREATE TABLE `offer` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cv` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `job_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `offer`
--

INSERT INTO `offer` (`id`, `first_name`, `last_name`, `phone_number`, `email`, `cv`, `job_id`) VALUES
(1, 'lia', 'bla', '0000000', 'hanane@hotmail.fr', 'www.google.fr', 1),
(2, 'rachid', 'sosjp', 'testestes', 'rachid@hotmail.fr', 'www.facebook.com', 2),
(3, 'hanane', 'balba', '0000000', 'hanane@hoamail.fr', 'blbalaba', 1),
(4, 'khadija', 'fleur', '0000000', 'test@hotmail.fr', 'blahatanebj', 1);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` json NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `firstname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `email`, `roles`, `password`, `firstname`, `lastname`) VALUES
(1, 'hananedu37@hotmail.fr', '[\"ROLE_ADMIN\"]', '$2y$13$hzLnv9SB.VFZF37zEVho2.0ItvMn/uHTPRnJo.YV07jGxhr5pWqj6', 'hanane', 'baaziz'),
(2, 'teset@hotmail.fr', '[]', 'hanane', 'hanane', 'hanane'),
(3, 'societe@hotmail.fr', '[\"ROLE_SOCIETE\"]', '$2y$13$hzLnv9SB.VFZF37zEVho2.0ItvMn/uHTPRnJo.YV07jGxhr5pWqj6', 'SOCIETE', 'SOCIETE'),
(4, 'user@hotmail.fr', '[\"ROLE_USER\"]', '$2y$13$hzLnv9SB.VFZF37zEVho2.0ItvMn/uHTPRnJo.YV07jGxhr5pWqj6', 'user', 'user'),
(5, 'company1@hotmail.fr', '[\"ROLE_SOCIETE\"]', '$2y$13$RAOIIzl0QEqxfZaefI3iIe.bsXIvq7LQQgQJktyvUf8rAIQI4QxBW', 'company', 'company'),
(6, 'company2@hotmail.fr', '[\"ROLE_SOCIETE\"]', '$2y$13$RAOIIzl0QEqxfZaefI3iIe.bsXIvq7LQQgQJktyvUf8rAIQI4QxBW', 'fromage', 'fromage'),
(7, 'company3@hotmail.fr', '[\"ROLE_SOCIETE\"]', '$2y$13$RAOIIzl0QEqxfZaefI3iIe.bsXIvq7LQQgQJktyvUf8rAIQI4QxBW', 'fraise', 'fraise'),
(9, 'company4@hotmail.fr', '[\"ROLE_SOCIETE\"]', '$2y$13$RAOIIzl0QEqxfZaefI3iIe.bsXIvq7LQQgQJktyvUf8rAIQI4QxBW', 'orange', 'orange'),
(10, 'company5@hotmail.fr', '[\"ROLE_SOCIETE\"]', '$2y$13$RAOIIzl0QEqxfZaefI3iIe.bsXIvq7LQQgQJktyvUf8rAIQI4QxBW', 'banane', 'banane'),
(12, 'test@hotmail.fr', '[]', 'hanane', 'alex', 'bro'),
(13, 'tes@google.fr', '[\"ROLE_SOCIETE\"]', 'tes123', 'test', 'testest'),
(14, 'fromage@hotmail.fr', '[\"ROLE_SOCIETE\"]', 'fromage', 'fromage', 'fromage'),
(16, 'fraise@hotmail.fr', '[\"ROLE_SOCIETE\"]', 'fraise', 'fraise', 'fraise'),
(17, 'pommehotmail.fr', '[\"ROLE_SOCIETE\"]', 'pomme', 'pomme', 'pomme'),
(18, 'p.princesse@hotmail.fr', '[\"ROLE_SOCIETE\"]', 'princesse', 'princesse', 'prince'),
(19, 'rachid@hotmail.fr', '[\"ROLE_SOCIETE\"]', '$2y$13$b523wv0YDiLFrTWS8uKa/u69odXYNGmpoHzLibOgCkDTvPcBl8wNO', 'rachid', 'blala'),
(20, 'bazzi@hotmail.fr', '[\"ROLE_SOCIETE\"]', '$2y$13$1EXMbK1Ra70EhLvAsXZJwO2nUimnVDD/MLsphRaTZiGqhoLsACe4m', 'hanane', 'baaziz'),
(22, 'abdu@hotmail.fr', '[\"ROLE_SOCIETE\"]', '$2y$13$OsJcq7A97j95Ihe8Vv/ht.ENEXMDhX.ObkgiQLq0bzweKTwcM45Mi', 'abdu', 'abdu2'),
(24, 'abdu1@hotmail.fr', '[\"ROLE_SOCIETE\"]', '$2y$13$xRfqqR5A7VLe610oqkXwqeG0/3ieWF7TurX.5apCFESKGmNjCkweq', 'abdu', 'abdu2'),
(25, 'hajar@hotmail.fr', '[\"ROLE_SOCIETE\"]', '$2y$13$3yg.dfO8HI3hoWz6MuDst.6aZ1roAlFbFgFAzpOMcEhnMfLrW78Ru', 'hajar', 'hajar');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_4FBF094FA76ED395` (`user_id`);

--
-- Index pour la table `doctrine_migration_versions`
--
ALTER TABLE `doctrine_migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Index pour la table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_A8936DC5979B1AD6` (`company_id`);

--
-- Index pour la table `messenger_messages`
--
ALTER TABLE `messenger_messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_75EA56E0FB7336F0` (`queue_name`),
  ADD KEY `IDX_75EA56E0E3BD61CE` (`available_at`),
  ADD KEY `IDX_75EA56E016BA31DB` (`delivered_at`);

--
-- Index pour la table `offer`
--
ALTER TABLE `offer`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_29D6873EBE04EA9` (`job_id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `company`
--
ALTER TABLE `company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT pour la table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `messenger_messages`
--
ALTER TABLE `messenger_messages`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `offer`
--
ALTER TABLE `offer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `company`
--
ALTER TABLE `company`
  ADD CONSTRAINT `FK_4FBF094FA76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `jobs`
--
ALTER TABLE `jobs`
  ADD CONSTRAINT `FK_A8936DC5979B1AD6` FOREIGN KEY (`company_id`) REFERENCES `company` (`id`);

--
-- Contraintes pour la table `offer`
--
ALTER TABLE `offer`
  ADD CONSTRAINT `FK_29D6873EBE04EA9` FOREIGN KEY (`job_id`) REFERENCES `jobs` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
