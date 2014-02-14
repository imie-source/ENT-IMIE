<?php
/* 
	Fichier contenant toutes les constantes pour faire les requêtes 
	Les variables présentes dans les requêtes sont symbolisées par le symbole ~
	Nommage : TYPE_CIBLE_DEQUI
*/

/* SERIE DES SELECT */

define('GET_CLASSE_UTILISATEUR','SELECT session, libelleCursus, centreFormation
								FROM classe, cursus, centreFormation, utilisateur, utilisateur_has_classe
								WHERE idUtilisateur = utilisateur_idUtilisateur
								AND classe_idClasse = idClasse
								AND cursus_idCursus=idCursus
								AND centreFormation_idCentreFormation=idCentreFormation
								AND idUtilisateur =~');

/* SERIE DES INSERT */

?>