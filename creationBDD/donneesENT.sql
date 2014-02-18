/* Cr�ation de la table typeVoie */
CREATE TABLE typeVoie (
	idTypeVoie INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
	typeVoie VARCHAR(20) NOT NULL,
	PRIMARY KEY (idTypeVoie)
);

/*Structure deuxieme partie de la table typeVoie */
INSERT INTO typeVoie (typeVoie) VALUES
('rue'),
('avenue'),
('boulevard'),
('bourg'),
('impasse'),
('chemin'),
('square'),
('route'),
('all�e');










/* Cr�ation de la table statut */
CREATE TABLE statut (
	idStatut INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
	libelleStatut VARCHAR(45) NOT NULL,
	PRIMARY KEY (idStatut)
);

/*Structure deuxieme partie de la table statut */
INSERT INTO statut (libelleStatut) VALUES
('administrateur'),
('stagiaire'),
('formateur'),
('invit�');




partie sup�rireur est valide.



/* Cr�ation de la table centreFormation */
CREATE TABLE centreFormation (
	idCentreFormation INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
	centreFormation VARCHAR(45) NOT NULL,
	PRIMARY KEY (idCentreFormation)
);
	
/*Structure deuxieme partie de la table centreFormation */
INSERT INTO centreFormation (idCentreFormation) VALUES
('Rennes'),
('Angers'),
('Nantes');






/* Cr�ation de la table cursus */
CREATE TABLE cursus (
	idCursus INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
	libelleCursus VARCHAR(45) NOT NULL,
	PRIMARY KEY (idCursus)
);

/*Structure deuxieme partie de la table cursus */
INSERT INTO cursus, classe (libelleCursus, cursus_idCursus) VALUES
('IT START',),
('T2SI'),
('D�veloppeur Logiciel'),
('R.I.S.R'),
('WM&D'),
('Chef de Projet Num�rique');



