INSERT INTO utilisateur (nom, prenom, mail, login, mp)
VALUES (Durand, Gudule, lkj@kjk, Gudule, 1234),
	(Michel, Michel, dsffsd@sdfsd, Michel, 1234),
	(Serge, Coude, mlkml@fds, Serge, 1234)
	(jean, jean, bngjivr@gvfrjb, jean, 1234),
	(marc, marc, bt@gt, marc, 1234),
	(matthieu, matthieu, vfeze@bthg, matthieu, 1234),
	(baptiste, baptiste, vrtgb@btre, baptiste, 1234),
	(pierre, pierre, vrf@vfq, pierre, 1234);
	

INSERT INTO classe (session, anneeDebut, anneeFin, cursus_idCursus, centreFormation_idCentreFormation)
	VALUES (r01, 2013, 2014, 1, 1)
	VALUES (r01, 2013, 2014, 2, 1);

	
INSERT INTO utilisateur_has_statut (utilisateur_idUtilisateur, statut_idStatut)
	VALUES (1,2),
			(2,2),
			(3,1),
			(4,1),
			(5,1),
			(6,1),
			(7,1),
			(8,1);
			
			
	
INSERT INTO utilisateur_has_classe (utilisateur_idUtilisateur, classe_idClasse)
VALUES (1,1),
	(2,1),
	(3,1),
	(4,1),
	(5,1),
	(6,1),
	(7,1),
	(8,1);
	
	
	
