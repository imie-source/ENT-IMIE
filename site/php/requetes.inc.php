<?php
/* 
	Fichier contenant toutes les constantes pour faire les requêtes 
	Les variables présentes dans les requêtes sont symbolisées par le symbole ~
	Nommage : TYPE_CIBLE_DEQUI
*/

/* SERIE DES SELECT */

define('GET_CLASSE_UTILISATEUR','SELECT libelleCursus, centreFormation, session
								FROM classe, cursus, centreFormation, utilisateur, utilisateur_has_classe
								WHERE idUtilisateur=utilisateur_idUtilisateur
								AND classe_idClasse=idClasse
								AND cursus_idCursus=idCursus
								AND centreFormation_idCentreFormation=idCentreFormation
								AND idUtilisateur =~');
								
define('GET_MATIERE_UTILISATEUR', 'SELECT nomMatiere
								FROM matiere, utilisateur, utilisateur_has_matiere
								WHERE idUtilisateur=utilisateur_idUtilisateur
								AND matiere_idMatiere=idMatiere
								AND idUtilisateur =~');
								
define('GET_UTILISATEUR', 'SELECT * 
							FROM utilisateur_has_statut, utilisateur, statut 
							WHERE idUtilisateur = utilisateur_idUtilisateur 
							AND statut_idStatut = idStatut 
							AND login =~');

define('GET_MOYENNE_ELEVE','SELECT nomMatiere, ROUND(AVG(note),2) AS moyenne 
								FROM classe, utilisateur_has_classe, utilisateur, correctionDevoir, utilisateur_has_matiere,  matiere  
								WHERE idClasse = utilisateur_has_classe.classe_idClasse 
								AND utilisateur_has_classe.utilisateur_idUtilisateur = idUtilisateur 
								AND idUtilisateur = correctionDevoir.utilisateur_idUtilisateur 
								AND idUtilisateur = utilisateur_has_matiere.utilisateur_idUtilisateur 
								AND utilisateur_has_matiere.matiere_idMatiere = idMatiere 
								AND idClasse = ~ GROUP BY idMatiere');

define('GET_MOYENNE_CLASSE','SELECT appreciation 
								FROM trimestre, appreciation, utilisateur_has_statut, utilisateur								
								WHERE idUtilisateur =  ~
								AND idtrimestre = ~');
								
define('GET_APPRECIATION','SELECT appreciation 
								FROM trimestre, appreciation, utilisateur_has_statut, utilisateur 
								WHERE idUtilisateur =  ~ 
								AND idtrimestre = ~');

define('GET_MOYENNE_CLASSE_DEVOIR','SELECT ROUND(AVG(note),2) AS moyenne 
								FROM correctionDevoir, devoir, devoir_has_matiere, matiere 
								WHERE correctionDevoir.devoir_idDevoir = idDevoir 
								AND idDevoir = devoir_has_matiere.devoir_idDevoir 
								AND devoir_has_matiere.matiere_idMatiere = idMatiere 
								AND nomMatiere = ~
								GROUP BY idDevoir');
								
define('GET_NOTE_UTILISATEUR','SELECT note 
								FROM matiere, utilisateur_has_matiere, utilisateur, devoir, correctionDevoir 
								WHERE idMatiere = utilisateur_has_matiere.matiere_idMatiere 
								AND utilisateur_has_matiere.utilisateur_idUtilisateur = idUtilisateur 
								AND idUtilisateur = devoir.utilisateur_idUtilisateur 
								AND idDevoir = correctionDevoir.devoir_idDevoir 
								AND nomMatiere = ~
								AND idUtilisateur =  ~');
								
define('GET_INTITULE_DEVOIR','SELECT intitule 
								FROM matiere, utilisateur_has_matiere, utilisateur, devoir, correctionDevoir 
								WHERE idMatiere = utilisateur_has_matiere.matiere_idMatiere 
								AND utilisateur_has_matiere.utilisateur_idUtilisateur = idUtilisateur 
								AND idUtilisateur = devoir.utilisateur_idUtilisateur 
								AND idDevoir = correctionDevoir.devoir_idDevoir 
								AND idUtilisateur = ~
								AND nomMatiere = ~
								GROUP BY devoir.idDevoir');
								
define('GET_COMMENTAIRE_DEVOIR','SELECT commentaire 
								FROM matiere, utilisateur_has_matiere, utilisateur, devoir, correctionDevoir 
								WHERE idMatiere = utilisateur_has_matiere.matiere_idMatiere 
								AND utilisateur_has_matiere.utilisateur_idUtilisateur = idUtilisateur 
								AND idUtilisateur = devoir.utilisateur_idUtilisateur 
								AND idDevoir = correctionDevoir.devoir_idDevoir 
								AND idUtilisateur = ~
								AND nomMatiere = ~
								GROUP BY idDevoir');

define('GET_LISTE_DEVOIR','SELECT idDevoir 
								FROM matiere, utilisateur_has_matiere, utilisateur, devoir, correctionDevoir 
								WHERE idMatiere = matiere_idMatiere 
								AND utilisateur_has_matiere.utilisateur_idUtilisateur = idUtilisateur 
								AND idUtilisateur = devoir.utilisateur_idUtilisateur 
								AND idDevoir = correctionDevoir.devoir_idDevoir 
								AND  idUtilisateur = ~
								AND nomMatiere = ~');
			
define('GET_LISTE_MATIERE','SELECT idMatiere 
								FROM utilisateur, correctionDevoir, devoir, devoir_has_matiere, matiere 
								WHERE idUtilisateur = correctionDevoir.utilisateur_idUtilisateur 
								AND correctionDevoir.devoir_idDevoir = idDevoir 
								AND idDevoir = devoir_has_matiere.devoir_idDevoir 
								AND matiere_idMatiere = idMatiere 
								AND idUtilisateur = ~ 
								GROUP BY idMatiere');

/* SERIE DES INSERT */

?>