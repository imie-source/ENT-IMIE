<?php
	include('fonctions.inc.php');

	$titrePage="Menu";
	
	include("../html/header.html");
	
	include("../html/".$_SESSION['statut']."/menu.html");
	
	include("../html/footer.html");


?>