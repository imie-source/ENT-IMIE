<?php
	$titrePage = "Bulletin";
	
	include("../html/header.html");

	$eleve = '1';
	$classe = '1';
	$trim = '1';
	
	include("fctRenvoieListeEleve.php");
	include("fctRenvoieBulletin.php");
	include("../html/formateur/bulletin.html");
	include("../html/footer.html");


?>