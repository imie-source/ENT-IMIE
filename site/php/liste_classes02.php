<?php
	include('fonctions.inc.php');
	autorisationPage('formateur');
	
	$titrePage="Sélection de la classe";
	
	//On charge les infos utiles our identifier les classes du formateur
	$tabClasses=request(GET_CLASSE_UTILISATEUR,$_SESSION['id']);
	//Retourne un tableau avec un id et une chaîne de caractères qui concatène les infos des classes
	$tabClasses=arrayToString($tabClasses, 'idClasse', 'libelleCursus', 'centreFormation', 'session');
	//renvoie une liste déroulante avec les classes
	$listeClasses=renvoieUneListe($tabClasses, 'bulletin.php?classe=', 0, 1);
	
	include("../html/header.html");
	include("../html/formateur/liste_classes02.html");
	include("../html/footer.html");


?>