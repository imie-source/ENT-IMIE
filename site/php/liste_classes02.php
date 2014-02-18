<?php
	include('fonctions.inc.php');
	autorisationPage('formateur');
	
	$titrePage="Sélection de la classe";
	
	$tabClasses=request(GET_CLASSE_UTILISATEUR,$_SESSION['idUtilisateur']);
	
	$tabClasses=["ITStart Rennes 01","CDPN Rennes","DL-ITS Rennes"];
	$listeClasses=renvoieUneListe($tabClasses, 'bulletin.php?classe=');
	
	include("../html/header.html");
	
	include("../html/formateur/liste_classes02.html");
	
	include("../html/footer.html");


?>