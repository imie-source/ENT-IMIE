<?php
	
	$classe=$_GET['classe'];
	$titrePage="Liste des devoirs de ".$classe;
	
	include("../html/header.html");
	
	include("../html/formateur/liste_devoirs_classe.html");
	
	include("../html/footer.html");


?>