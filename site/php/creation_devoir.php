<?php
	include('fonctions.inc.php');
	autorisationPage('formateur');
	
	$tabClasses=request(GET_CLASSE_UTILISATEUR, $_SESSION['id']);
	$tabMatieres=request(GET_MATIERE_UTILISATEUR, $_SESSION['id']);
	
	
	$titrePage="Creation de Devoir";
	/*$listeMatieres=listeOption($matieres);*/
	/* $listeClasses=listeOption($tabClasses[0]['libelleCursus']); */
	die($tabClasses[0]['libelleCursus']);
	
	include("../html/header.html");
	
	include("../html/formateur/creation_devoir.html");
	
	include("../html/footer.html");


?>