<?php
	include('/fonctions/fctConnexion.php');
	autorisationPage('formateur');
	
	include("fonctions/fctRenvoieUneListe.php");
	
	$titrePage="Sélection de la classe";
	$tabClasses=["ITStart Rennes 01","CDPN Rennes","DL-ITS Rennes"];
	$listeClasses=renvoieUneListe($tabClasses, 'bulletin.php?classe=');
	
	include("../html/header.html");
	
	include("../html/formateur/liste_classes02.html");
	
	include("../html/footer.html");


?>