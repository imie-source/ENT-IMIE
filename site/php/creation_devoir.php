<?php
	include('fonctions.inc.php');
	autorisationPage('formateur');
	
	$titrePage="Creation de Devoir";
	
	/* Création de la liste des matières de l'utilisateur */
	$tabMatieres=request(GET_MATIERE_UTILISATEUR, $_SESSION['id']);
	//Renvoie une liste déroulante avec les matières du formateur
	$listeMatieres=listeOption($tabMatieres,'idMatiere', 'nomMatiere');
	
	/* Création de la liste des classes de l'utilisateur */
	$tabClasses=request(GET_CLASSE_UTILISATEUR, $_SESSION['id']);
	//Retourne un tableau avec un id et une chaîne de caractères qui concatène les infos de la classe
	$tabClasses=arrayToString($tabClasses, 'idClasse', 'libelleCursus', 'centreFormation', 'session');
	//renvoie une liste déroulante avec les classes
	$listeClasses=listeOption($tabClasses, 0, 1);
	
	include("../html/header.html");
	include("../html/formateur/creation_devoir.html");
	include("../html/footer.html");

?>