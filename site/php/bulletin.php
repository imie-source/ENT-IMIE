<?php

	include('fonctions.inc.php');
	
	$titrePage = "Bulletin";
	$eleve = '1';
	$classe = '1';
	$trim = '1';
	
	include("../html/header.html");
	include("fctRenvoieListeEleve.php");
	include("fctRenvoieBulletin.php");
	include("../html/stagiaire/bulletin.html");
	include("../html/footer.html");


?>