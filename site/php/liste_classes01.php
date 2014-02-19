<?php
	include('fonctions.inc.php');
	autorisationPage('formateur');
	
	$titrePage="Sélection de la classe";
	
	$tabClasses=request(GET_CLASSE_UTILISATEUR,$_SESSION['id']);
	
	$tabClasses=arrayToString($tabClasses, 'idClasse', 'libelleCursus', 'centreFormation', 'session');
	
	$listeClasses=renvoieUneListe($tabClasses, 'liste_devoirs_classe.php?classe=', 0, 1);
	
	
	include("../html/header.html");
	include("../html/formateur/liste_classes01.html");
	include("../html/footer.html");


?>