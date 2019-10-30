#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: typesContrat
#------------------------------------------------------------

CREATE TABLE typesContrat(
        ID  Int  Auto_increment  NOT NULL ,
        nom Varchar (255)
	,CONSTRAINT typesContrat_PK PRIMARY KEY (ID)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: villes
#------------------------------------------------------------

CREATE TABLE villes(
        ID          Int  Auto_increment  NOT NULL ,
        nom         Varchar (255) ,
        departement Int
	,CONSTRAINT villes_PK PRIMARY KEY (ID)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: typesFichiers
#------------------------------------------------------------

CREATE TABLE typesFichiers(
        ID  Int  Auto_increment  NOT NULL ,
        nom Varchar (255)
	,CONSTRAINT typesFichiers_PK PRIMARY KEY (ID)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: utilisateurs
#------------------------------------------------------------

CREATE TABLE utilisateurs(
        ID      Int  Auto_increment  NOT NULL ,
        mail    Varchar (255) NOT NULL ,
        mdp     Varchar (255) NOT NULL ,
        nom     Varchar (255) ,
        tel     Varchar (12) ,
        adresse Varchar (255)
	,CONSTRAINT utilisateurs_PK PRIMARY KEY (ID)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: candidats
#------------------------------------------------------------

CREATE TABLE candidats(
        ID       Int NOT NULL ,
        prenom   Varchar (255) ,
        civilite Varchar (4) ,
        mail     Varchar (255) NOT NULL ,
        mdp      Varchar (255) NOT NULL ,
        nom      Varchar (255) ,
        tel      Varchar (12) ,
        adresse  Varchar (255)
	,CONSTRAINT candidats_PK PRIMARY KEY (ID)

	,CONSTRAINT candidats_utilisateurs_FK FOREIGN KEY (ID) REFERENCES utilisateurs(ID)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: entreprises
#------------------------------------------------------------

CREATE TABLE entreprises(
        ID           Int NOT NULL ,
        siteInternet Varchar (255) ,
        description  Varchar (1500) ,
        mail         Varchar (255) NOT NULL ,
        mdp          Varchar (255) NOT NULL ,
        nom          Varchar (255) ,
        tel          Varchar (12) ,
        adresse      Varchar (255)
	,CONSTRAINT entreprises_PK PRIMARY KEY (ID)

	,CONSTRAINT entreprises_utilisateurs_FK FOREIGN KEY (ID) REFERENCES utilisateurs(ID)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: annonces
#------------------------------------------------------------

CREATE TABLE annonces(
        ID              Int  Auto_increment  NOT NULL ,
        intitule        Varchar (255) ,
        domaine         Varchar (255) ,
        dateDebut       Date NOT NULL ,
        dateFin         Date NOT NULL ,
        description     Varchar (1500) ,
        salaire         Varchar (255) ,
        ID_entreprises  Int ,
        ID_villes       Int ,
        ID_typesContrat Int
	,CONSTRAINT annonces_PK PRIMARY KEY (ID)

	,CONSTRAINT annonces_entreprises_FK FOREIGN KEY (ID_entreprises) REFERENCES entreprises(ID)
	,CONSTRAINT annonces_villes0_FK FOREIGN KEY (ID_villes) REFERENCES villes(ID)
	,CONSTRAINT annonces_typesContrat1_FK FOREIGN KEY (ID_typesContrat) REFERENCES typesContrat(ID)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: fichiers
#------------------------------------------------------------

CREATE TABLE fichiers(
        ID               Int  Auto_increment  NOT NULL ,
        chemin           Varchar (255) ,
        alt              Varchar (255) ,
        ID_typesFichiers Int ,
        ID_utilisateurs  Int
	,CONSTRAINT fichiers_PK PRIMARY KEY (ID)

	,CONSTRAINT fichiers_typesFichiers_FK FOREIGN KEY (ID_typesFichiers) REFERENCES typesFichiers(ID)
	,CONSTRAINT fichiers_utilisateurs0_FK FOREIGN KEY (ID_utilisateurs) REFERENCES utilisateurs(ID)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: postuler
#------------------------------------------------------------

CREATE TABLE postuler(
        ID           Int NOT NULL ,
        ID_candidats Int NOT NULL
	,CONSTRAINT postuler_PK PRIMARY KEY (ID,ID_candidats)

	,CONSTRAINT postuler_annonces_FK FOREIGN KEY (ID) REFERENCES annonces(ID)
	,CONSTRAINT postuler_candidats0_FK FOREIGN KEY (ID_candidats) REFERENCES candidats(ID)
)ENGINE=InnoDB;

