#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: typesContrat
#------------------------------------------------------------

CREATE TABLE typesContrat(
        id  Int  Auto_increment  NOT NULL ,
        nom Varchar (255)
	,CONSTRAINT typesContrat_PK PRIMARY KEY (id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: villes
#------------------------------------------------------------

CREATE TABLE villes(
        id          Int  Auto_increment  NOT NULL ,
        nom         Varchar (255) ,
        departement Int
	,CONSTRAINT villes_PK PRIMARY KEY (id)
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
        id      Int  Auto_increment  NOT NULL ,
        mail    Varchar (255) NOT NULL ,
        mdp     Varchar (255) NOT NULL ,
        nom     Varchar (255) ,
        tel     Varchar (12) ,
        adresse Varchar (255)
	,CONSTRAINT utilisateurs_PK PRIMARY KEY (id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: candidats
#------------------------------------------------------------

CREATE TABLE candidats(
        id       Int NOT NULL ,
        prenom   Varchar (255) ,
        civilite Varchar (4)
	,CONSTRAINT candidats_PK PRIMARY KEY (id)

	,CONSTRAINT candidats_utilisateurs_FK FOREIGN KEY (id) REFERENCES utilisateurs(id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: entreprises
#------------------------------------------------------------

CREATE TABLE entreprises(
        id           Int NOT NULL ,
        siteInternet Varchar (255) ,
        description  Varchar (1500)
	,CONSTRAINT entreprises_PK PRIMARY KEY (id)

	,CONSTRAINT entreprises_utilisateurs_FK FOREIGN KEY (id) REFERENCES utilisateurs(id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: annonces
#------------------------------------------------------------

CREATE TABLE annonces(
        id              Int  Auto_increment  NOT NULL ,
        intitule        Varchar (255) ,
        domaine         Varchar (255) ,
        dateDebut       Date NOT NULL ,
        dateFin         Date NOT NULL ,
        description     Varchar (1500) ,
        salaire         Varchar (255) ,
        id_entreprises  Int ,
        id_villes       Int ,
        id_typesContrat Int
	,CONSTRAINT annonces_PK PRIMARY KEY (id)

	,CONSTRAINT annonces_entreprises_FK FOREIGN KEY (id_entreprises) REFERENCES entreprises(id)
	,CONSTRAINT annonces_villes0_FK FOREIGN KEY (id_villes) REFERENCES villes(id)
	,CONSTRAINT annonces_typesContrat1_FK FOREIGN KEY (id_typesContrat) REFERENCES typesContrat(id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: fichiers
#------------------------------------------------------------

CREATE TABLE fichiers(
        id               Int  Auto_increment  NOT NULL ,
        chemin           Varchar (255) ,
        alt              Varchar (255) ,
        ID_typesFichiers Int ,
        id_utilisateurs  Int
	,CONSTRAINT fichiers_PK PRIMARY KEY (id)

	,CONSTRAINT fichiers_typesFichiers_FK FOREIGN KEY (ID_typesFichiers) REFERENCES typesFichiers(ID)
	,CONSTRAINT fichiers_utilisateurs0_FK FOREIGN KEY (id_utilisateurs) REFERENCES utilisateurs(id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: postuler
#------------------------------------------------------------

CREATE TABLE postuler(
        id           Int NOT NULL ,
        id_candidats Int NOT NULL
	,CONSTRAINT postuler_PK PRIMARY KEY (id,id_candidats)

	,CONSTRAINT postuler_annonces_FK FOREIGN KEY (id) REFERENCES annonces(id)
	,CONSTRAINT postuler_candidats0_FK FOREIGN KEY (id_candidats) REFERENCES candidats(id)
)ENGINE=InnoDB;

