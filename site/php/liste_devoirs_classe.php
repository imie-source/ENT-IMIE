<?php

	include("fonctions/fctRenvoieUneListe.php");
	
	$classe=$_GET['classe'];
	$titrePage="Liste des devoirs de ".$classe;
	$listeDevoirs=["Quizz Linux","TP creation de comptes","QCM Windows"];
	
	include("../html/header.html");
	
	include("../html/formateur/liste_devoirs_classe.html");
	
	include("../html/footer.html");


?>