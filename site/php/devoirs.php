<?php
	include('fonctions/fonctions.inc.php');
	autorisationPage('formateur');
	
	$titrePage="Devoirs";
	
	include("../html/header.html");
	
	include("../html/formateur/devoirs.html");
	
	include("../html/footer.html");


?>