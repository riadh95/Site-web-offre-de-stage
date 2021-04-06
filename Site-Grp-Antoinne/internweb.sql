-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 05 avr. 2021 à 23:57
-- Version du serveur :  10.4.10-MariaDB
-- Version de PHP :  7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `internweb`
--

-- --------------------------------------------------------

--
-- Structure de la table `delegue`
--

DROP TABLE IF EXISTS `delegue`;
CREATE TABLE IF NOT EXISTS `delegue` (
  `del_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `email_id` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `firstName` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastName` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`del_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `delegue`
--

INSERT INTO `delegue` (`del_id`, `email_id`, `password`, `firstName`, `lastName`) VALUES
(1, 'a@a.com', '1', 'a', 'b'),
(2, 'lemail@mail.com', '123', 'Momo', 'Lolo'),
(3, 'mec@gmzil.com', '123', 'Lucien', 'Levrai');

-- --------------------------------------------------------

--
-- Structure de la table `employee`
--

DROP TABLE IF EXISTS `employee`;
CREATE TABLE IF NOT EXISTS `employee` (
  `emp_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `organization` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_id` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`emp_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `employee`
--

INSERT INTO `employee` (`emp_id`, `organization`, `email_id`, `password`, `first_name`, `last_name`, `phone_number`) VALUES
(1, 'CESI', 'nic@company.com', '1234', 'Murty', 'M', '9912423547'),
(2, 'Cool Company', 'nicdio@nic.gov.in', '$2y$10$EdFwSp3kZdNo5HEMaUaMSuMB56etpKDKnrB.LA3M8WuvLTeTX5vZ2', 'Murty', 'M', '9912423547'),
(4, 'Brain O Vision', 'brainovison@company.com', '$2y$10$BDzgod67uZK.BjKfu3DZnO.572b.A4A10ZhTijT6/Ndk465v/Bi7y', 'Appa', 'Rao', '7622703040'),
(5, 'Realentreprise', 'employer1@gmail.com', '$2y$10$Pqm/My7XLSwOTt3CHdaBI.PTtaLEI6alI4gAnGdrwQnPhA/EDAy1W', 'employee', 'one', '8998898978'),
(6, 'leJc\'estleS', 'employer3@gmail.com', '$2y$10$l34pYkNR6Vt87En8cvAG8..IFkVGxTX/qLxxoNB4moO2LGw9iz.WC', 'employer', 'three', '9343567845'),
(7, 'employer 2 organization', 'employer2@gmail.com', '$2y$10$njOdBI872rtGHcKV/WsypuagyyzZTqJ10m6q7Us9NEbiPg91ADrm2', 'employer', 'two', '9082562636');

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `employee_view`
-- (Voir ci-dessous la vue réelle)
--
DROP VIEW IF EXISTS `employee_view`;
CREATE TABLE IF NOT EXISTS `employee_view` (
`intern_id` bigint(20)
,`emp_id` bigint(20)
,`intern_title` varchar(255)
,`stipend` varchar(10)
,`posted_on` date
,`applied_on` date
,`apply_by` date
,`duration` varchar(20)
,`firstName` varchar(50)
,`lastName` varchar(50)
,`email` varchar(50)
,`intern_location` varchar(100)
,`organization` varchar(50)
);

-- --------------------------------------------------------

--
-- Structure de la table `internlist`
--

DROP TABLE IF EXISTS `internlist`;
CREATE TABLE IF NOT EXISTS `internlist` (
  `intern_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `emp_id` bigint(20) NOT NULL,
  `intern_topic` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `intern_location` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `intern_duration` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stipend` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apply_by` date NOT NULL,
  `posted_on` date NOT NULL,
  PRIMARY KEY (`intern_id`),
  UNIQUE KEY `intern_id` (`intern_id`),
  KEY `emp_id` (`emp_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `internlist`
--

INSERT INTO `internlist` (`intern_id`, `emp_id`, `intern_topic`, `intern_location`, `intern_duration`, `stipend`, `apply_by`, `posted_on`) VALUES
(2, 4, 'Developpement WEB', 'Teletravail', '4 weeks', '500', '2021-05-31', '2021-05-02'),
(3, 5, 'Developpeur Android', 'Paris', '6 months', '1000', '2021-05-31', '2021-05-22'),
(4, 2, 'Reseaux', 'Marseille', '2 weeks', '100', '2018-05-28', '2018-05-23'),
(6, 5, 'Block Chain Technology', 'Strasbourg', '3 months', '5000', '2018-06-23', '2018-05-24'),
(7, 7, 'IT', 'Brazil', '1 month', '1000', '2018-05-31', '2018-05-24'),
(8, 6, 'Graphic Design', 'work from home', '2 months', '6000', '2018-05-30', '2018-05-24');

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `internships_list`
-- (Voir ci-dessous la vue réelle)
--
DROP VIEW IF EXISTS `internships_list`;
CREATE TABLE IF NOT EXISTS `internships_list` (
`intern_id` bigint(20)
,`emp_id` bigint(20)
,`organization` varchar(50)
,`intern_title` varchar(255)
,`location` varchar(100)
,`duration` varchar(20)
,`stipend` varchar(10)
,`posted_on` date
,`apply_by` date
);

-- --------------------------------------------------------

--
-- Structure de la table `student`
--

DROP TABLE IF EXISTS `student`;
CREATE TABLE IF NOT EXISTS `student` (
  `stu_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `email_id` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `firstName` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastName` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`stu_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `student`
--

INSERT INTO `student` (`stu_id`, `email_id`, `password`, `firstName`, `lastName`) VALUES
(2, 'msmurty65@gmail.com', '$2y$10$M.tIaJf7I08WBMtsYtNzE.7a24QTrHiXuucHUq8Vpuz40VqFD2Dqy', 'Murthy', 'Maddula'),
(3, 'mbs.yaswanth@gmail.com', '$2y$10$XJKOUn.7iyRQmikimecGo.0iiyJjb1Xuf0au9Oi/hXSwo6Uwc7k3S', 'Momo', 'Yaya'),
(4, 'student1@gmail.com', '$2y$10$KZ5V2ZBHN29CgcLj26WbVu11CYOnE1ztiPMcDIFyYJSOW5AJsLQEG', 'student', 'one'),
(5, 'student2@gmail.com', '$2y$10$zK.yiDSbnVosRSeLh2K/3uT68eX9T.cqmZzTDAGrGmi6ly.zw0igu', 'tonio', 'bg'),
(6, 'student3@gmail.com', '$2y$10$Fndfda0e3PBC6hUY/Lr8u.2WEs6K/PS4qFsWAv0LWiVyDWBLN5AT.', 'student', 'three'),
(7, 'student4@gmail.com', '$2y$10$r/.JvXT6MWxF2fg/afgf7.Qye17w2jrxe2Vid9FcIE..45IOc1Ota', 'student', 'four'),
(8, 'antoine@gmail.com', '$2y$10$D7qVFVaqi8yJm8OdwEpesuHJjylZ3gRM3x8bpLdTl/MZkooOlxznm', 'Antoine', 'Sire'),
(9, 'r@g.com', '$2y$10$zK/LBxXOe.yvN1Z1Sm8VguunHpjfCXJsz8fMQikwUgFT.FwlOdfvq', 'Riadh', 'Fares');

-- --------------------------------------------------------

--
-- Structure de la table `studentoptedintern`
--

DROP TABLE IF EXISTS `studentoptedintern`;
CREATE TABLE IF NOT EXISTS `studentoptedintern` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `stu_id` bigint(20) NOT NULL,
  `intern_id` bigint(20) NOT NULL,
  `applied_on` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `intern_id` (`intern_id`),
  KEY `stu_id` (`stu_id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `studentoptedintern`
--

INSERT INTO `studentoptedintern` (`id`, `stu_id`, `intern_id`, `applied_on`) VALUES
(1, 2, 2, '2018-05-22'),
(6, 3, 2, '2018-05-23'),
(7, 3, 3, '2018-05-24'),
(8, 7, 4, '2018-05-24'),
(9, 5, 3, '2018-05-24'),
(10, 5, 7, '2018-05-24'),
(11, 5, 8, '2018-05-24'),
(12, 7, 2, '2018-05-24'),
(13, 6, 3, '2018-05-24'),
(14, 6, 6, '2018-05-24'),
(17, 8, 2, '2021-04-04'),
(18, 9, 3, '2021-04-05');

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `student_intern_view`
-- (Voir ci-dessous la vue réelle)
--
DROP VIEW IF EXISTS `student_intern_view`;
CREATE TABLE IF NOT EXISTS `student_intern_view` (
`intern_id` bigint(20)
,`stu_id` bigint(20)
,`emp_id` bigint(20)
,`organization` varchar(50)
,`intern_title` varchar(255)
,`location` varchar(100)
,`duration` varchar(20)
,`stipend` varchar(10)
,`applied_on` date
);

-- --------------------------------------------------------

--
-- Structure de la table `table_entreprise`
--

DROP TABLE IF EXISTS `table_entreprise`;
CREATE TABLE IF NOT EXISTS `table_entreprise` (
  `id_entreprise` int(50) NOT NULL AUTO_INCREMENT,
  `nom` varchar(250) NOT NULL,
  `secteur` varchar(250) NOT NULL,
  `competence` varchar(250) NOT NULL,
  `localite` varchar(250) NOT NULL,
  `nbrestagiaire` int(16) NOT NULL,
  `evalstagiaire` int(16) NOT NULL,
  `confiancepilotepromo` int(16) NOT NULL,
  PRIMARY KEY (`id_entreprise`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `table_entreprise`
--

INSERT INTO `table_entreprise` (`id_entreprise`, `nom`, `secteur`, `competence`, `localite`, `nbrestagiaire`, `evalstagiaire`, `confiancepilotepromo`) VALUES
(19, 'Test', 'Web', 'Java', 'Paris', 5, 15, 18);

-- --------------------------------------------------------

--
-- Structure de la table `table_pilote`
--

DROP TABLE IF EXISTS `table_pilote`;
CREATE TABLE IF NOT EXISTS `table_pilote` (
  `id_pilote` int(50) NOT NULL AUTO_INCREMENT,
  `nom` varchar(250) NOT NULL,
  `prenom` varchar(250) NOT NULL,
  `centre` varchar(250) NOT NULL,
  `promo` int(16) NOT NULL,
  `mail` varchar(250) NOT NULL,
  `password` text NOT NULL,
  PRIMARY KEY (`id_pilote`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `table_pilote`
--

INSERT INTO `table_pilote` (`id_pilote`, `nom`, `prenom`, `centre`, `promo`, `mail`, `password`) VALUES
(1, 'Saut', 'Hugo', 'Nanterre', 2019, 'hugo@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef');

-- --------------------------------------------------------

--
-- Structure de la vue `employee_view`
--
DROP TABLE IF EXISTS `employee_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `employee_view`  AS  select `studentoptedintern`.`intern_id` AS `intern_id`,`employee`.`emp_id` AS `emp_id`,`internlist`.`intern_topic` AS `intern_title`,`internlist`.`stipend` AS `stipend`,`internlist`.`posted_on` AS `posted_on`,`studentoptedintern`.`applied_on` AS `applied_on`,`internlist`.`apply_by` AS `apply_by`,`internlist`.`intern_duration` AS `duration`,`student`.`firstName` AS `firstName`,`student`.`lastName` AS `lastName`,`student`.`email_id` AS `email`,`internlist`.`intern_location` AS `intern_location`,`employee`.`organization` AS `organization` from (((`studentoptedintern` join `student` on(`studentoptedintern`.`stu_id` = `student`.`stu_id`)) join `internlist` on(`internlist`.`intern_id` = `studentoptedintern`.`intern_id`)) join `employee` on(`internlist`.`emp_id` = `employee`.`emp_id`)) ;

-- --------------------------------------------------------

--
-- Structure de la vue `internships_list`
--
DROP TABLE IF EXISTS `internships_list`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `internships_list`  AS  select `internlist`.`intern_id` AS `intern_id`,`employee`.`emp_id` AS `emp_id`,`employee`.`organization` AS `organization`,`internlist`.`intern_topic` AS `intern_title`,`internlist`.`intern_location` AS `location`,`internlist`.`intern_duration` AS `duration`,`internlist`.`stipend` AS `stipend`,`internlist`.`posted_on` AS `posted_on`,`internlist`.`apply_by` AS `apply_by` from (`internlist` join `employee` on(`internlist`.`emp_id` = `employee`.`emp_id`)) ;

-- --------------------------------------------------------

--
-- Structure de la vue `student_intern_view`
--
DROP TABLE IF EXISTS `student_intern_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `student_intern_view`  AS  select `studentoptedintern`.`intern_id` AS `intern_id`,`studentoptedintern`.`stu_id` AS `stu_id`,`employee`.`emp_id` AS `emp_id`,`employee`.`organization` AS `organization`,`internlist`.`intern_topic` AS `intern_title`,`internlist`.`intern_location` AS `location`,`internlist`.`intern_duration` AS `duration`,`internlist`.`stipend` AS `stipend`,`studentoptedintern`.`applied_on` AS `applied_on` from ((`studentoptedintern` join `internlist` on(`studentoptedintern`.`intern_id` = `internlist`.`intern_id`)) join `employee` on(`internlist`.`emp_id` = `employee`.`emp_id`)) ;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `internlist`
--
ALTER TABLE `internlist`
  ADD CONSTRAINT `internlist_ibfk_1` FOREIGN KEY (`emp_id`) REFERENCES `employee` (`emp_id`);

--
-- Contraintes pour la table `studentoptedintern`
--
ALTER TABLE `studentoptedintern`
  ADD CONSTRAINT `studentoptedintern_ibfk_1` FOREIGN KEY (`intern_id`) REFERENCES `internlist` (`intern_id`),
  ADD CONSTRAINT `studentoptedintern_ibfk_2` FOREIGN KEY (`stu_id`) REFERENCES `student` (`stu_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
