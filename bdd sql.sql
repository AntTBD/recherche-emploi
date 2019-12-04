-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mer. 04 déc. 2019 à 23:30
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
-- Base de données :  recherche_emploi
--

-- --------------------------------------------------------

--
-- Structure de la table annonces
--

DROP TABLE IF EXISTS annonces;
CREATE TABLE IF NOT EXISTS annonces (
  id int(11) NOT NULL AUTO_INCREMENT,
  intitule varchar(255) COLLATE utf8_bin DEFAULT NULL,
  domaine varchar(255) COLLATE utf8_bin DEFAULT NULL,
  dateDebut date NOT NULL,
  dateFin date NOT NULL,
  description varchar(1500) COLLATE utf8_bin DEFAULT NULL,
  salaire varchar(255) COLLATE utf8_bin DEFAULT NULL,
  tempsTravail varchar(255) COLLATE utf8_bin DEFAULT NULL,
  idEntreprise int(11) DEFAULT NULL,
  idVille int(11) DEFAULT NULL,
  idTypeContrat int(11) DEFAULT NULL,
  PRIMARY KEY (id),
  KEY annonces_entreprises_FK (idEntreprise),
  KEY annonces_villes0_FK (idVille),
  KEY annonces_typesContrat1_FK (idTypeContrat)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table candidats
--

DROP TABLE IF EXISTS candidats;
CREATE TABLE IF NOT EXISTS candidats (
  id int(11) NOT NULL,
  prenom varchar(255) COLLATE utf8_bin DEFAULT NULL,
  civilite varchar(4) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table entreprises
--

DROP TABLE IF EXISTS entreprises;
CREATE TABLE IF NOT EXISTS entreprises (
  id int(11) NOT NULL,
  siteInternet varchar(255) COLLATE utf8_bin DEFAULT NULL,
  description varchar(1500) COLLATE utf8_bin DEFAULT NULL,
  adresse varchar(255) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table fichiers
--

DROP TABLE IF EXISTS fichiers;
CREATE TABLE IF NOT EXISTS fichiers (
  id int(11) NOT NULL AUTO_INCREMENT,
  chemin varchar(255) COLLATE utf8_bin DEFAULT NULL,
  alt varchar(255) COLLATE utf8_bin DEFAULT NULL,
  idTypeFichier int(11) DEFAULT NULL,
  idUtilisateur int(11) DEFAULT NULL,
  PRIMARY KEY (id),
  KEY fichiers_typesFichiers_FK (idTypeFichier),
  KEY fichiers_utilisateurs0_FK (idUtilisateur)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table postuler
--

DROP TABLE IF EXISTS postuler;
CREATE TABLE IF NOT EXISTS postuler (
  id int(11) NOT NULL,
  idCandidat int(11) NOT NULL,
  PRIMARY KEY (id,idCandidat),
  KEY postuler_candidats0_FK (idCandidat)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table typescontrat
--

DROP TABLE IF EXISTS typescontrat;
CREATE TABLE IF NOT EXISTS typescontrat (
  id int(11) NOT NULL AUTO_INCREMENT,
  nom varchar(255) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table typesfichiers
--

DROP TABLE IF EXISTS typesfichiers;
CREATE TABLE IF NOT EXISTS typesfichiers (
  id int(11) NOT NULL AUTO_INCREMENT,
  nom varchar(255) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table utilisateurs
--

DROP TABLE IF EXISTS utilisateurs;
CREATE TABLE IF NOT EXISTS utilisateurs (
  id int(11) NOT NULL AUTO_INCREMENT,
  mail varchar(255) COLLATE utf8_bin NOT NULL,
  mdp varchar(255) COLLATE utf8_bin NOT NULL,
  nom varchar(255) COLLATE utf8_bin DEFAULT NULL,
  tel varchar(12) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table villes
--

DROP TABLE IF EXISTS villes;
CREATE TABLE IF NOT EXISTS villes (
  id int(11) NOT NULL AUTO_INCREMENT,
  nom varchar(255) COLLATE utf8_bin DEFAULT NULL,
  departement int(11) DEFAULT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table annonces
--
ALTER TABLE annonces
  ADD CONSTRAINT annonces_entreprises_FK FOREIGN KEY (idEntreprise) REFERENCES entreprises (id),
  ADD CONSTRAINT annonces_typesContrat1_FK FOREIGN KEY (idTypeContrat) REFERENCES typescontrat (id),
  ADD CONSTRAINT annonces_villes0_FK FOREIGN KEY (idVille) REFERENCES villes (id);

--
-- Contraintes pour la table candidats
--
ALTER TABLE candidats
  ADD CONSTRAINT candidats_utilisateurs_FK FOREIGN KEY (id) REFERENCES utilisateurs (id);

--
-- Contraintes pour la table entreprises
--
ALTER TABLE entreprises
  ADD CONSTRAINT entreprises_utilisateurs_FK FOREIGN KEY (id) REFERENCES utilisateurs (id);

--
-- Contraintes pour la table fichiers
--
ALTER TABLE fichiers
  ADD CONSTRAINT fichiers_typesFichiers_FK FOREIGN KEY (idTypeFichier) REFERENCES typesfichiers (id),
  ADD CONSTRAINT fichiers_utilisateurs0_FK FOREIGN KEY (idUtilisateur) REFERENCES utilisateurs (id);

--
-- Contraintes pour la table postuler
--
ALTER TABLE postuler
  ADD CONSTRAINT postuler_annonces_FK FOREIGN KEY (id) REFERENCES annonces (id),
  ADD CONSTRAINT postuler_candidats0_FK FOREIGN KEY (idCandidat) REFERENCES candidats (id);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
