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
('allée');

/*Structure deuxieme partie de la table statut */
INSERT INTO statut (libelleStatut) VALUES
('administrateur'),
('stagiaire'),
('formateur'),
('invité');

/*Structure deuxieme partie de la table centreFormation */
INSERT INTO centreFormation (centreFormation) VALUES
('Rennes'),
('Angers'),
('Nantes');

/*Structure deuxieme partie de la table cursus */
INSERT INTO cursus (libelleCursus) VALUES
('IT START'),
('T2SI'),
('Développeur Logiciel'),
('R.I.S.R'),
('WM&D'),
('Chef de Projet Numérique');

/*Structure deuxieme partie de la table domaine */
INSERT INTO domaine (nomDomaine) VALUES
('développement'),
('réseau'),
('projet'),
('compétences transverses');

/*Structure deuxieme partie de la table matiere */
INSERT INTO matiere (domaine_idDomaine, nomMatiere) VALUES
(1, 'JAVA'),
(1, 'C'),
(1, 'C++'),
(1, 'PHP'),
(1, 'HTML'),
(2, 'Linux'),
(2, 'windows'),
(4, 'anglais'),
(4, 'com'),
(4, 'TRE'),
(4, 'Itil'),
(4, 'veille technologique');