<?php
/* 
	Fichier contenant toutes les constantes pour faire les requêtes 
	Les variables présentes dans les requêtes sont symbolisées par le symbole ~
	Nommage : TYPE_CIBLE_DEQUI
*/

/* SERIE DES SELECT */

define('GET_CLASSE_UTILISATEUR','SELECT session, libelleCursus, centreFormation
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
							AND login =\'~\'~'); //Ajout d'un id fictif pour insérer l'apostrophe nécessaire (requête avec string)

/* SERIE DES INSERT */

?>