#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: candidats
#------------------------------------------------------------

CREATE TABLE candidats(
        ID       Int  Auto_increment  NOT NULL ,
        nom      Varchar (255) ,
        prenom   Varchar (255) ,
        civilite Varchar (4) ,
        mail     Varchar (255) NOT NULL ,
        tel      Varchar (12) ,
        mdp      Varchar (255) NOT NULL
	,CONSTRAINT candidats_PK PRIMARY KEY (ID)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: entreprises
#------------------------------------------------------------

CREATE TABLE entreprises(
        ID           Int  Auto_increment  NOT NULL ,
        nom          Varchar (255) ,
        mail         Varchar (255) NOT NULL ,
        adresse      Varchar (400) ,
        siteInternet Varchar (255) ,
        description  Varchar (1500)
	,CONSTRAINT entreprises_PK PRIMARY KEY (ID)
)ENGINE=InnoDB;


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
# Table: typesFichiers
#------------------------------------------------------------

CREATE TABLE typesFichiers(
        ID  Int  Auto_increment  NOT NULL ,
        nom Varchar (255)
	,CONSTRAINT typesFichiers_PK PRIMARY KEY (ID)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: fichiers
#------------------------------------------------------------

CREATE TABLE fichiers(
        ID               Int  Auto_increment  NOT NULL ,
        chemin           Varchar (255) ,
        alt              Varchar (255) ,
        ID_typesFichiers Int ,
        ID_candidats     Int ,
        ID_entreprises   Int NOT NULL
	,CONSTRAINT fichiers_PK PRIMARY KEY (ID)

	,CONSTRAINT fichiers_typesFichiers_FK FOREIGN KEY (ID_typesFichiers) REFERENCES typesFichiers(ID)
	,CONSTRAINT fichiers_candidats0_FK FOREIGN KEY (ID_candidats) REFERENCES candidats(ID)
	,CONSTRAINT fichiers_entreprises1_FK FOREIGN KEY (ID_entreprises) REFERENCES entreprises(ID)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: postuler à
#------------------------------------------------------------

CREATE TABLE postuler_a(
        ID           Int NOT NULL ,
        ID_candidats Int NOT NULL
	,CONSTRAINT postuler_a_PK PRIMARY KEY (ID,ID_candidats)

	,CONSTRAINT postuler_a_annonces_FK FOREIGN KEY (ID) REFERENCES annonces(ID)
	,CONSTRAINT postuler_a_candidats0_FK FOREIGN KEY (ID_candidats) REFERENCES candidats(ID)
)ENGINE=InnoDB;

