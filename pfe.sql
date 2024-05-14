-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 14 mai 2024 à 10:37
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
-- Base de données : `pfe`
--

-- --------------------------------------------------------

--
-- Structure de la table `enseignant`
--

CREATE TABLE `enseignant` (
  `cin` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nom_prenom` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `enseignant`
--

INSERT INTO `enseignant` (`cin`, `password`, `nom_prenom`, `mail`) VALUES
('1', 'ee', '', '=dfd'),
('2', 'c', '', ''),
('3', 'b', '', ''),
('3', 'b', '', ''),
('4', 'm', '3ammar', 'k@gmail.com'),
('4', 'm', '3ammar', 'k@gmail.com');

-- --------------------------------------------------------

--
-- Structure de la table `etudiant`
--

CREATE TABLE `etudiant` (
  `cin_etudiant1` varchar(255) NOT NULL,
  `nom_prenom_etud1` varchar(255) NOT NULL,
  `email_etud1` varchar(255) NOT NULL,
  `groupe_etud1` varchar(255) NOT NULL,
  `cin_etud2` varchar(255) NOT NULL,
  `nom_prenom_etud2` varchar(255) NOT NULL,
  `eamil_etud2` varchar(255) NOT NULL,
  `groupe_etud2` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `etudiant`
--

INSERT INTO `etudiant` (`cin_etudiant1`, `nom_prenom_etud1`, `email_etud1`, `groupe_etud1`, `cin_etud2`, `nom_prenom_etud2`, `eamil_etud2`, `groupe_etud2`, `password`, `status`) VALUES
('1466', 'jj', 'lolll@gmail.com', 'L3-DSI1', '1455', 'ss', 'jjjj@gmail.com', 'L3-DSI3', '$2y$10$6ltkVePT0eERtE25cvtUhewXQ4o8OEHeGgBpoKu/hwv75.0QnJMq6', 0),
('1465', 'jj', 'lolll@gmail.com', 'L3-DSI2', '14090909', 'cc', 'jjjj@gmail.com', 'L3-DSI2', '$2y$10$z9vvC/YUeTM13aJqLGdAVuIZOL.vo/JNon5dT3Gc5S9/RgZVmk/XS', 0),
('1455', '', '', '', '', '', '', '', '$2y$10$Q9TugZil0PbgdgSIL3S7yO.JBsbrDghnnkqNEWQ4XtuwWmXB5BRdK', 0),
('1234', '', '', '', '', '', '', '', '$2y$10$zQQUtJB5KcQJZQD9M2HjEejntxEzH9.CSTONPXjoN4TVfawsut2O6', 0),
('14668065', 'eee', 'e@gmail.com', 'L3-DSI2', '5', 'mahdi', 'q@gmail.com', 'L3-DSI2', '$2y$10$bvbMFLOCgP0pG/ITeiZqN.7dooQjHaK39hSpOzvjLtdSDJo/zKGv6', 0),
('145', 'jj', 'lolll@gmail.com', 'L3-DSI1', '14090', 'qq', 'jjjj@gmail.com', 'L3-DSI2', '$2y$10$sTmOkQEPl9D1dvMj4pSlje6/Ub7fz4JPqWpq1uovbQ54mcvNa1D.q', 1),
('145', 'jj', 'lolll@gmail.com', 'L3-DSI1', '14090', 'qq', 'jjjj@gmail.com', 'L3-DSI2', '$2y$10$sTmOkQEPl9D1dvMj4pSlje6/Ub7fz4JPqWpq1uovbQ54mcvNa1D.q', 1),
('145', 'jj', 'lolll@gmail.com', 'L3-DSI1', '14090', 'qq', 'jjjj@gmail.com', 'L3-DSI2', '$2y$10$sTmOkQEPl9D1dvMj4pSlje6/Ub7fz4JPqWpq1uovbQ54mcvNa1D.q', 1),
('098', 'mahdi bey', 'mahdibeyy@gmail.com', 'L3-DSI2', '1455', 'ss', 'mahdibeyy@gmail.com', 'L3-DSI1', '$2y$10$PrXfLadcaNPtVyqA9IbHvO89xSGm7kVhsYl3OC3iJD39UAgs9c3/m', 1),
('098', 'mahdi bey', 'mahdibeyy@gmail.com', 'L3-DSI2', '1455', 'ss', 'mahdibeyy@gmail.com', 'L3-DSI1', '$2y$10$PrXfLadcaNPtVyqA9IbHvO89xSGm7kVhsYl3OC3iJD39UAgs9c3/m', 1),
('09647', '', '', '', '', '', '', '', 'mahdibeyy@gmail.com', 0),
('0000', '', '', '', '', '', '', '', 'beyymahdi@gmail.com', 0),
('000', 'ajfsyty', 'mahdibeyy@gmail.com', 'L3-DSI1', '14599', 'eya', 'farhaouieya@gmail.com', 'L3-DSI2', '$2y$10$LaQ6U8GZhPScBY7o8BR3gOB9fAuMd.bgQr.LhP4o7B1zxENPwTBuW', 1),
('0988', '', 'mahdibeyy@gmail.com', '', '', '', '', '', '$2y$10$GXwbqDF6QCIWI7ZAfCx.eet6iYv8c7HnCPpzAyFVi0A6vBCWRhi56', 1),
('0766', '', 'mahdibeyy@gmail.com', '', '', '', '', '', '$2y$10$svoxeFGV/oSGv6q9/YbhcOI5eqNCioCHR/FBs3ER9FiUnULdEcUKy', 1),
('09647268', '', 'beyymahdi@gmail.com', '', '', '', '', '', '$2y$10$osPlnpjtzRQq9VCuRLOO3eARaLjoBigRSditVhcl0VplRHERJl3xu', 1),
('144', '', 'beyymahdi@gmail.com', '', '', '', '', '', '$2y$10$Js0OJw9rY2eZOQ/dVJCRquoSz7RgcYSvaLHONdAVKYFk8EuYOstXS', 1),
('144', '', 'beyymahdi@gmail.com', '', '', '', '', '', '$2y$10$Js0OJw9rY2eZOQ/dVJCRquoSz7RgcYSvaLHONdAVKYFk8EuYOstXS', 1),
('4545', 'jm', 'mahdibey2002@gmail.com', 'autre', '777777', 'Yassine', 'ul@gmail.com', 'L3-DSI1', '$2y$12$gYaZZIbB2XJBOmrxb9YpeeQJJNe/do.Ds2kO9shpIayAkKegG.tH6', 1),
('4545', 'jm', 'mahdibey2002@gmail.com', 'autre', '777777', 'Yassine', 'ul@gmail.com', 'L3-DSI1', '$2y$12$gYaZZIbB2XJBOmrxb9YpeeQJJNe/do.Ds2kO9shpIayAkKegG.tH6', 1);

-- --------------------------------------------------------

--
-- Structure de la table `projet`
--

CREATE TABLE `projet` (
  `id_projet` int(11) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `encadreur_iset` varchar(255) NOT NULL,
  `encadreur_entreprise` varchar(255) NOT NULL,
  `nom_entreprise` varchar(255) NOT NULL,
  `fiche` varchar(255) NOT NULL,
  `cin_etudiant1` varchar(255) NOT NULL,
  `cin_etudiant2` varchar(255) NOT NULL,
  `etat` varchar(255) DEFAULT 'en attente'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `projet`
--

INSERT INTO `projet` (`id_projet`, `titre`, `encadreur_iset`, `encadreur_entreprise`, `nom_entreprise`, `fiche`, `cin_etudiant1`, `cin_etudiant2`, `etat`) VALUES
(1, 'Developp gestion', 'aaa', 'ccc', 'oouy', '', '14668065', '5', 'validé'),
(2, 'Developp gestion', 'aaa', 'ccc', 'oouy', '', '14668065', '5', 'refusé'),
(3, 'Jj', 'jj', 'sss', 'ss', '', 'jjj', 'jjj', 'en attente'),
(4, 'Ddee', 'ss', 'sss', 'ss', '', '1466', '1455', 'refusé'),
(5, 'Ddee', 'ss', 'sss', 'ss', '', '14999999', '1455', 'validé'),
(6, 'Ddee', 'ss', 'sss', 'ss', '', '14999999', '1400000', 'en attente'),
(7, 'Ss', 'jj', 'sss', 'ss', '', '149994', '14090909', 'en attente'),
(8, 'Ss', 'jj', 'sss', 'ss', '', '1465', '14090909', 'refusé'),
(9, 'Ss', 'ss', 'sss', 'ss', '', '149994', '14090909', 'en attente'),
(10, 'Ss', 'ss', 'sss', 'ss', '', '145', '14090', 'refusé'),
(11, 'Ss', 'ss', 'sss', 'ss', '', '098', '1455', 'refusé'),
(12, 'Ss', 'ss', 'sss', 'mahdi', '', '000', '1455', 'validé'),
(13, 'Szhsstz', 'xhxts', 'xh', 'xh', '', '000', '14599', 'en cours'),
(17, 'Site dynamique', 'ahmed', 'ccc', 'q', 'brochuredox.pdf', '4545', '777777', 'validé'),
(18, 'Site dynamique', 'ahmed', 'ccc', 'q', 'brochuredox (1).pdf', '4545', '777777', 'validé'),
(19, 'Site dynamique', 'ahmed', 'ccc', 'q', 'jm_Yassine.pdf', '4545', '777777', 'refusé'),
(20, 'Site dynamique', 'ahmed', 'ccc', 'q', 'jm_Yassine', '4545', '777777', 'validé');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `projet`
--
ALTER TABLE `projet`
  ADD PRIMARY KEY (`id_projet`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `projet`
--
ALTER TABLE `projet`
  MODIFY `id_projet` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
