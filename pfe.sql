-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : dim. 03 mars 2024 à 21:15
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
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `enseignant`
--

INSERT INTO `enseignant` (`cin`, `password`) VALUES
('1', 'a'),
('2', 'c');

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
('145', '', 'mahdibeyy@gmail.com', '', '', '', '', '', '$2y$10$sTmOkQEPl9D1dvMj4pSlje6/Ub7fz4JPqWpq1uovbQ54mcvNa1D.q', 1),
('145', '', 'mahdibeyy@gmail.com', '', '', '', '', '', '$2y$10$sTmOkQEPl9D1dvMj4pSlje6/Ub7fz4JPqWpq1uovbQ54mcvNa1D.q', 1),
('145', '', 'mahdibeyy@gmail.com', '', '', '', '', '', '$2y$10$sTmOkQEPl9D1dvMj4pSlje6/Ub7fz4JPqWpq1uovbQ54mcvNa1D.q', 1),
('098', '', 'mahdibeyy@gmail.com', '', '', '', '', '', '$2y$10$PrXfLadcaNPtVyqA9IbHvO89xSGm7kVhsYl3OC3iJD39UAgs9c3/m', 1),
('098', '', 'mahdibeyy@gmail.com', '', '', '', '', '', '$2y$10$PrXfLadcaNPtVyqA9IbHvO89xSGm7kVhsYl3OC3iJD39UAgs9c3/m', 1),
('0999', '', 'mahdibeyy@gmail.com', '', '', '', '', '', '$2y$10$m0opPa59JA6ucs8BmEmla.NcQfABU4G/8f9vin4EChMQzWXfNjZiu', 1),
('0999', '', 'mahdibeyy@gmail.com', '', '', '', '', '', '$2y$10$m0opPa59JA6ucs8BmEmla.NcQfABU4G/8f9vin4EChMQzWXfNjZiu', 1);

-- --------------------------------------------------------

--
-- Structure de la table `projet`
--

CREATE TABLE `projet` (
  `titre` varchar(255) NOT NULL,
  `encadreur_iset` varchar(255) NOT NULL,
  `encadreur_entreprise` varchar(255) NOT NULL,
  `nom_entreprise` varchar(255) NOT NULL,
  `fiche` varchar(255) NOT NULL,
  `cin_etudiant1` varchar(255) NOT NULL,
  `cin_etudiant2` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `projet`
--

INSERT INTO `projet` (`titre`, `encadreur_iset`, `encadreur_entreprise`, `nom_entreprise`, `fiche`, `cin_etudiant1`, `cin_etudiant2`) VALUES
('Developp gestion', 'aaa', 'ccc', 'oouy', '', '14668065', '5'),
('Developp gestion', 'aaa', 'ccc', 'oouy', '', '14668065', '5'),
('Jj', 'jj', 'sss', 'ss', '', 'jjj', 'jjj'),
('Ddee', 'ss', 'sss', 'ss', '', '1466', '1455'),
('Ddee', 'ss', 'sss', 'ss', '', '14999999', '1455'),
('Ddee', 'ss', 'sss', 'ss', '', '14999999', '1400000'),
('Ss', 'jj', 'sss', 'ss', '', '149994', '14090909'),
('Ss', 'jj', 'sss', 'ss', '', '1465', '14090909');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
