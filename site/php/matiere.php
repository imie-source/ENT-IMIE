<?php
	include ("../html/header.html");
	include("../php/fonctions/fctMatiere.php");

	$titreMatiere = choixMatiere();
	$lesMatieres = renvoieMatiere();
	
	include ("../html/stagiaire/matiere.html");
	include("../php/graph/radar.php");
	include ("../html/footer.html");
?> 