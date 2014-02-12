<?php
	session_start();
	
	include('/fonctions/fonctions.inc.php');

	$titrePage="Menu";
	
	include("../html/header.html");
	
	include("../html/".$_SESSION['statut']."/menu.html");
	
	include("../html/footer.html");


?>