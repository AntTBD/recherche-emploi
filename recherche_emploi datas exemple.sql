-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mar. 10 déc. 2019 à 22:44
-- Version du serveur :  5.7.24
-- Version de PHP :  7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `recherche_emploi`
--
CREATE DATABASE IF NOT EXISTS `recherche_emploi` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `recherche_emploi`;

--
-- Déchargement des données de la table `annonces`
--

INSERT INTO `annonces` (`id`, `intitule`, `domaine`, `dateDebut`, `dateFin`, `description`, `salaire`, `tempsTravail`, `idEntreprise`, `idVille`, `idTypeContrat`) VALUES
(1, 'Annonce 1', 'Domaine 1', '2019-12-10', '2019-12-31', 'Nous recrutons ! Venez vite...', '1000€ - 1500€', '35h', 2, 78, 1),
(2, 'Annonce 2', 'Domaine 1', '2019-12-10', '2021-09-30', '', '- €', '- h', 2, 62, 4),
(3, 'Annonce 3', 'Domaine 2', '2019-12-10', '2020-01-31', 'Nous recherchons un stagiaire avec de bonne compétences en informatique.\r\n\r\nNous privilégierons un candidat ayant de bonnes compétences en HTML, PHP, CSS et JavaScript.', '900 €', '30 h', 2, 23, 3);

--
-- Déchargement des données de la table `candidats`
--

INSERT INTO `candidats` (`id`, `prenom`, `civilite`) VALUES
(1, 'A', 'Mr'),
(4, 'B', 'Mme');

--
-- Déchargement des données de la table `entreprises`
--

INSERT INTO `entreprises` (`id`, `siteInternet`, `description`, `adresse`) VALUES
(2, 'http://entreprise_a.com', 'Nous somme une entreprise accueillante et dynamique !', 'LIMOGES'),
(3, '', '', '');

--
-- Déchargement des données de la table `favoris`
--

INSERT INTO `favoris` (`id`, `idCandidat`) VALUES
(2, 4),
(3, 4);

--
-- Déchargement des données de la table `postuler`
--

INSERT INTO `postuler` (`id`, `idCandidat`) VALUES
(3, 1),
(3, 4);

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `mail`, `mdp`, `nom`, `tel`) VALUES
(1, 'candidat_a@gmail.com', '$argon2i$v=19$m=1024,t=2,p=2$STN3dVV1a1NrTFQ3MFBNYQ$io7Z7yREBd6SajW5HPfvbo0RdyF4Nldy9/hpz4I3gy8', 'Candidat', '0123456789'),
(2, 'entreprise_a@gmail.com', '$argon2i$v=19$m=1024,t=2,p=2$a0MwVkFRS01ra2lJNmlFVw$gPLa1Kv/iFrPUmWc0hz5A25Xac6yx3kpbxadFskkv6E', 'Entreprise A', '0123456789'),
(3, 'entreprise_b@gmail.com', '$argon2i$v=19$m=1024,t=2,p=2$WmZhaENFdWhqWWhSSy5qdw$24bhDWRKyXsTTfwlPUd1bxwV0Hv22TdFacEHpVQ25YI', 'Entreprise B', ''),
(4, 'candidate_b@gmail.com', '$argon2i$v=19$m=1024,t=2,p=2$TS5Yczc4RHJIZnBtMGxXag$8Ckdgh0jVEHmafHviCuXXPPkngv9CKP6rnqyYI6H+P4', 'Candidate', '');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
