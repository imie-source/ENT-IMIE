<?php
/* 
	Fichier contenant toutes les constantes pour faire les requêtes 
	Les variables présentes dans les requêtes sont symbolisées par le symbole ~
	Nommage : TYPE_CIBLE_DEQUI
*/

/* SERIE DES SELECT */

define('GET_CLASSE_UTILISATEUR','SELECT idClasse, libelleCursus, centreFormation, session
								FROM classe, cursus, centreFormation, utilisateur, utilisateur_has_classe
								WHERE idUtilisateur=utilisateur_idUtilisateur
								AND classe_idClasse=idClasse
								AND cursus_idCursus=idCursus
								AND centreFormation_idCentreFormation=idCentreFormation
								AND idUtilisateur =~');
								
define('GET_MATIERE_UTILISATEUR', 'SELECT idMatiere, nomMatiere
								FROM matiere, utilisateur, utilisateur_has_matiere
								WHERE idUtilisateur=utilisateur_idUtilisateur
								AND matiere_idMatiere=idMatiere
								AND idUtilisateur =~');
								
define('GET_UTILISATEUR', 'SELECT * 
							FROM utilisateur_has_statut, utilisateur, statut 
							WHERE idUtilisateur = utilisateur_idUtilisateur 
							AND statut_idStatut = idStatut 
							AND login =~');

define('GET_MOYENNE_ELEVE','SELECT matiere.nomMatiere, ROUND(AVG(note),2) AS moyenne 
								FROM classe, utilisateur_has_classe, utilisateur, correctionDevoir, utilisateur_has_matiere,  matiere  
								WHERE classe.idClasse = utilisateur_has_classe.classe_idClasse 
								AND utilisateur_has_classe.utilisateur_idUtilisateur = utilisateur.idUtilisateur 
								AND utilisateur.idUtilisateur = correctionDevoir.utilisateur_idUtilisateur 
								AND utilisateur.idUtilisateur = utilisateur_has_matiere.utilisateur_idUtilisateur 
								AND utilisateur_has_matiere.matiere_idMatiere = matiere.idMatiere 
								AND classe.idClasse = ~ GROUP BY matiere.idMatiere');

define('GET_MOYENNE_CLASSE','SELECT appreciation 
								FROM trimestre, appreciation, utilisateur_has_statut, utilisateur								
								WHERE utilisateur.idUtilisateur =  ~
								AND trimestre.idtrimestre = ~');
								
define('GET_APPRECIATION','SELECT appreciation 
								FROM trimestre, appreciation, utilisateur_has_statut, utilisateur 
								WHERE utilisateur.idUtilisateur =  ~ 
								AND trimestre.idtrimestre = ~');

define('GET_MOYENNE_CLASSE_DEVOIR','SELECT ROUND(AVG(note),2) AS moyenne 
								FROM correctionDevoir, devoir, devoir_has_matiere, matiere 
								WHERE correctionDevoir.devoir_idDevoir = devoir.idDevoir 
								AND devoir.idDevoir = devoir_has_matiere.devoir_idDevoir 
								AND devoir_has_matiere.matiere_idMatiere = matiere.idMatiere 
								AND matiere.nomMatiere = ~
								GROUP BY devoir.idDevoir');
								
define('GET_NOTE_UTILISATEUR','SELECT note 
								FROM matiere, utilisateur_has_matiere, utilisateur, devoir, correctionDevoir 
								WHERE matiere.idMatiere = utilisateur_has_matiere.matiere_idMatiere 
								AND utilisateur_has_matiere.utilisateur_idUtilisateur = utilisateur.idUtilisateur 
								AND utilisateur.idUtilisateur = devoir.utilisateur_idUtilisateur 
								AND devoir.idDevoir = correctionDevoir.devoir_idDevoir 
								AND matiere.nomMatiere = ~
								AND utilisateur.idUtilisateur =  ~');
								
define('GET_INTITULE_DEVOIR','SELECT intitule 
								FROM matiere, utilisateur_has_matiere, utilisateur, devoir, correctionDevoir 
								WHERE matiere.idMatiere = utilisateur_has_matiere.matiere_idMatiere 
								AND utilisateur_has_matiere.utilisateur_idUtilisateur = utilisateur.idUtilisateur 
								AND utilisateur.idUtilisateur = devoir.utilisateur_idUtilisateur 
								AND devoir.idDevoir = correctionDevoir.devoir_idDevoir 
								AND utilisateur.idUtilisateur = ~
								AND matiere.nomMatiere = ~
								GROUP BY devoir.idDevoir');
								
define('GET_COMMENTAIRE_DEVOIR','SELECT commentaire 
								FROM matiere, utilisateur_has_matiere, utilisateur, devoir, correctionDevoir 
								WHERE matiere.idMatiere = utilisateur_has_matiere.matiere_idMatiere 
								AND utilisateur_has_matiere.utilisateur_idUtilisateur = utilisateur.idUtilisateur 
								AND utilisateur.idUtilisateur = devoir.utilisateur_idUtilisateur 
								AND devoir.idDevoir = correctionDevoir.devoir_idDevoir 
								AND utilisateur.idUtilisateur = ~
								AND matiere.nomMatiere = ~
								GROUP BY devoir.idDevoir');

define('GET_LISTE_DEVOIR','SELECT devoir.idDevoir 
								FROM matiere, utilisateur_has_matiere, utilisateur, devoir, correctionDevoir 
								WHERE matiere.idMatiere = utilisateur_has_matiere.matiere_idMatiere 
								AND utilisateur_has_matiere.utilisateur_idUtilisateur = utilisateur.idUtilisateur 
								AND utilisateur.idUtilisateur = devoir.utilisateur_idUtilisateur 
								AND devoir.idDevoir = correctionDevoir.devoir_idDevoir 
								AND  utilisateur.idUtilisateur = ~
								AND matiere.nomMatiere = ~');
			
define('GET_LISTE_MATIERE','SELECT matiere.idMatiere 
								FROM utilisateur, correctionDevoir, devoir, devoir_has_matiere, matiere  
								WHERE utilisateur.idUtilisateur = correctionDevoir.utilisateur_idUtilisateur 
								AND correctionDevoir.devoir_idDevoir = devoir.idDevoir 
								AND devoir.idDevoir = devoir_has_matiere.devoir_idDevoir 
								AND devoir_has_matiere.matiere_idMatiere = matiere.idMatiere 
								AND utilisateur.idUtilisateur = ~ GROUP BY matiere.idMatiere');

/* SERIE DES INSERT */

define('INSERT_DEVOIR','INSERT INTO devoir, devoir_has_matiere, matiere, classe, utilisateur (date, matiere, classe_idClasse, intitule, utilisateur_idUtilisateur)
						VALUES (~,~,~,~,~)
						WHERE utilisateur_idUtilisateur=idUtilisateur
						AND classe_idClasse=idClasse
						AND devoir_idDevoir=idDevoir
						AND matiere_idMatiere=idMatiere
						AND idUtilisateur=~');
						

?>