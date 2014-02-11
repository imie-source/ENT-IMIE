<?php
	include('/fonctions/fonctions.inc.php');
	include('/fonctions/fctConnexion.php');
	autorisationPage('formateur');
	
	$titrePage="Sélection de la classe";
	$tabClasses=["ITStart Rennes 01","CDPN Rennes","DL-ITS Rennes"];
	$listeClasses=renvoieUneListe($tabClasses, 'liste_devoirs_classe.php?classe=');
	
	
	include("../html/header.html");
	
	include("../html/formateur/liste_classes01.html");
	
	include("../html/footer.html");


?>