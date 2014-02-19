<?php
	include('fonctions.inc.php');
	autorisationPage('formateur');
	
	//On charge les infos utiles our identifier la classe
	$tabClasse=request(GET_CLASSE_BY_ID,$_GET['classe']);
	//Retourne un tableau avec un id et une chaîne de caractères qui concatène les infos de la classe
	$tabClasse=arrayToString($tabClasse, 'idClasse', 'libelleCursus', 'centreFormation', 'session');
	//On récupère le nom complet de la classe
	$classe=$tabClasse[0][1];
	
	$titrePage="Liste des devoirs de ".$classe;
	
	//On charge les devoirs de la classe dans un tableau
	$tabDevoirs=request(GET_DEVOIRS_CLASSE, $_GET['classe']);
	//On renvoie une liste des devoirs de la classe en HTML
	$listeDevoirs=renvoieUneListe($tabDevoirs, 'saisie_notes.php?from=liste_devoirs_classe&devoir=', 'idDevoir', 'intitule');
	
	include("../html/header.html");
	include("../html/formateur/liste_devoirs_classe.html");
	include("../html/footer.html");


?>