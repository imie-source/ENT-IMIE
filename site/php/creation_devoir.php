<?php
	include('fonctions.inc.php');
	autorisationPage('formateur');
	
	$classes=['ITStart','CDPN','DL'];
	$matieres=['JAVA','PHP','SQL'];
	
	$titrePage="Creation de Devoir";
	$listeMatieres=listeOption($matieres);
	$listeClasses=listeOption($classes);
	
	include("../html/header.html");
	
	include("../html/formateur/creation_devoir.html");
	
	include("../html/footer.html");


?>