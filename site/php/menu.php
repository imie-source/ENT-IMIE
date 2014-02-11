<?php
	include('/fonctions/fonctions.inc.php');
	include('/fonctions/fctConnexion.php');
	
	$titrePage="Menu";
	
	include("../html/header.html");
	
	include("../html/".$_SESSION['statut']."/menu.html");
	
	include("../html/footer.html");


?>