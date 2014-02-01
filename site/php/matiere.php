<?php
	include ("../html/header.html");
	
	$titreMatiere=('ITStart');
	$devoir=('Linux');
	$noteDevoir=('15') ;
	$moyenneDevoir=('12') ;
	$commentaireDevoir=('toujours aussi nul');
	include("../php/fonctions/fctRenvoieMatiere.php");
	include ("../html/stagiaire/matiere.html");
	include("../php/graph/radar.php");
	include ("../html/footer.html");
?>