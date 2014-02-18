/* Utilisation de la base ENT */

USE ENT;

/* Création de la table utilisateur */
CREATE TABLE utilisateur (
	idUtilisateur INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
	nom VARCHAR(45) NOT NULL,
	prenom VARCHAR(45) NOT NULL,
	mail VARCHAR(45) NOT NULL,
	login VARCHAR(45) NOT NULL,
	mp VARCHAR(255) NOT NULL,
	PRIMARY KEY (idUtilisateur)
);

/* Création de la table classe */
CREATE TABLE classe (
	idClasse INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
	cursus VARCHAR(45) NOT NULL,
	session INTEGER NOT NULL,
	centreFormation VARCHAR(45) NOT NULL,
	PRIMARY KEY (idClasse)
);

/* Création de la table utilisateur_has_classe */
CREATE TABLE utilisateur_has_classe (
	utilisateur_idUtilisateur INTEGER UNSIGNED NOT NULL,
	classe_idClasse INTEGER UNSIGNED NOT NULL,
	PRIMARY KEY (utilisateur_idUtilisateur, classe_idClasse),
	FOREIGN KEY (utilisateur_idUtilisateur) REFERENCES utilisateur (idUtilisateur),
	FOREIGN KEY (classe_idClasse) REFERENCES classe (idClasse)
);

/* Création de la table domaine */
CREATE TABLE domaine (
	idDomaine INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
	nomDomaine VARCHAR(45) NOT NULL,
	PRIMARY KEY (idDomaine)
);

/* Création de la table matiere */
CREATE TABLE matiere (
	idMatiere INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
	nomMatiere VARCHAR(45) NOT NULL,
	domaine_idDomaine INTEGER UNSIGNED NOT NULL,
	PRIMARY KEY (idMatiere),
	FOREIGN KEY (domaine_idDomaine) REFERENCES domaine (idDomaine)
);

/* Création de la table utilisateur_has_matiere */
CREATE TABLE utilisateur_has_matiere (
	utilisateur_idUtilisateur INTEGER UNSIGNED NOT NULL,
	matiere_idMatiere INTEGER UNSIGNED NOT NULL,
	PRIMARY KEY (utilisateur_idUtilisateur, matiere_idMatiere),
	FOREIGN KEY (utilisateur_idUtilisateur) REFERENCES utilisateur (idUtilisateur),
	FOREIGN KEY (matiere_idMatiere) REFERENCES matiere (idMatiere)
);
	
/* Création de la table trimestre */
CREATE TABLE trimestre (
	idTrimestre INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
	libelleTrimestre VARCHAR(20) NOT NULL,
	PRIMARY KEY (idTrimestre)
);
	
/* Création de la table appreciation */
CREATE TABLE appreciation (
	idAppreciation INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
	appreciation TEXT,
	annee INTEGER NOT NULL,
	trimestre_idTrimestre INTEGER UNSIGNED NOT NULL,
	utilisateur_idUtilisateur INTEGER UNSIGNED NOT NULL,
	matiere_idMatiere INTEGER UNSIGNED NOT NULL,
	PRIMARY KEY (idAppreciation),
	FOREIGN KEY (trimestre_idTrimestre) REFERENCES trimestre (idTrimestre),
	FOREIGN KEY (utilisateur_idUtilisateur) REFERENCES utilisateur (idUtilisateur),
	FOREIGN KEY (matiere_idMatiere) REFERENCES matiere (idMatiere)
);

/* Création de la table statut */
CREATE TABLE statut (
	idStatut INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
	libelleStatut VARCHAR(45) NOT NULL,
	PRIMARY KEY (idStatut)
);

/* Création de la table utilisateur_has_statut */
CREATE TABLE utilisateur_has_statut (
	utilisateur_idUtilisateur INTEGER UNSIGNED NOT NULL,
	statut_idStatut INTEGER UNSIGNED NOT NULL,
	PRIMARY KEY (utilisateur_idUtilisateur, statut_idStatut),
	FOREIGN KEY (utilisateur_idUtilisateur) REFERENCES utilisateur (idUtilisateur),
	FOREIGN KEY (statut_idStatut) REFERENCES statut (idStatut)
);

/* Création de la table typeVoie */
CREATE TABLE typeVoie (
	idTypeVoie INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
	typeVoie VARCHAR(20) NOT NULL,
	PRIMARY KEY (idTypeVoie)
);

/* Création de la table codePostal */
CREATE TABLE codePostal (
	idCodePostal INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
	codePostal INTEGER NOT NULL,
	PRIMARY KEY (idCodePostal)
);

/* Création de la table ville */
CREATE TABLE ville (
	idVille INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
	nomVille VARCHAR(45) NOT NULL,
	codePostal_idCodePostal INTEGER UNSIGNED NOT NULL,
	PRIMARY KEY (idVille),
	FOREIGN KEY (codePostal_idCodePostal) REFERENCES codePostal (idCodePostal)
);

/* Création de la table adresse */
CREATE TABLE adresse (
	idAdresse INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
	utilisateur_idUtilisateur INTEGER UNSIGNED NOT NULL,
	typeVoie_idTypeVoie INTEGER UNSIGNED NOT NULL,
	ville_idVille INTEGER UNSIGNED NOT NULL,
	numero VARCHAR(20) NOT NULL,
	voie VARCHAR(255) NOT NULL,
	complement VARCHAR(255) NOT NULL,
	PRIMARY KEY (idAdresse),
	FOREIGN KEY (utilisateur_idUtilisateur) REFERENCES utilisateur (idUtilisateur),
	FOREIGN KEY (typeVoie_idTypeVoie) REFERENCES typeVoie (idTypeVoie),
	FOREIGN KEY (ville_idVille) REFERENCES ville (idVille)
);

/* Création de la table devoir */
CREATE TABLE devoir (
	idDevoir INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
	utilisateur_idUtilisateur INTEGER UNSIGNED NOT NULL,
	classe_idClasse INTEGER UNSIGNED NOT NULL,
	intitule VARCHAR(255) NOT NULL,
	date DATE NOT NULL,
	lienSujet VARCHAR(255),
	lienCorige VARCHAR(255),
	moyenne FLOAT NOT NULL,
	PRIMARY KEY (idDevoir),
	FOREIGN KEY (utilisateur_idUtilisateur) REFERENCES utilisateur (idUtilisateur),
	FOREIGN KEY (classe_idClasse) REFERENCES classe (idClasse)
);

/* Création de la table devoir_has_matiere */
CREATE TABLE devoir_has_matiere (
	devoir_idDevoir INTEGER UNSIGNED NOT NULL,
	matiere_idMatiere INTEGER UNSIGNED NOT NULL,
	PRIMARY KEY (devoir_idDevoir, matiere_idMatiere),
	FOREIGN KEY (devoir_idDevoir) REFERENCES devoir (idDevoir),
	FOREIGN KEY (matiere_idMatiere) REFERENCES matiere (idMatiere)
);

/* Création de la table correctionDevoir */
CREATE TABLE correctionDevoir (
	utilisateur_idUtilisateur INTEGER UNSIGNED NOT NULL,
	devoir_idDevoir INTEGER UNSIGNED NOT NULL,
	note FLOAT NOT NULL,
	commentaire TEXT,
	PRIMARY KEY (utilisateur_idUtilisateur, devoir_idDevoir),
	FOREIGN KEY (utilisateur_idUtilisateur) REFERENCES utilisateur (idUtilisateur),
	FOREIGN KEY (devoir_idDevoir) REFERENCES devoir (idDevoir)
);
	