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

