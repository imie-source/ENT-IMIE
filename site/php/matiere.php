<?php
	// Inclusion du header
	include ("../html/header.html");
	// Inclusion de la page fctMatiere pour affiché toute les notes.
	include("fctMatiere.php");
	// On vérifie le statut de l'utilisateur
	autorisationPage('stagiaire');
	/*	On associe le resultat de la fonction choixMatiere pour définir 
	le titre de la page matière suivant la matière selectionné dans le bulletin avec un $_POST
	*/
	$titreMatiere = choixMatiere();
	/* On associe le resultat de la fonction renvoieMatiere pour afficher 
	toute les données dans les tableaux sur la page matiere.php 
	*/
	$lesMatieres = renvoieMatiere();
	$moyenne = moyenneEleve();
	// Structure HTML de la page
	include ("../html/stagiaire/matiere.html");
	// Inclusion de la fonction de création du radar
	include("../php/graph/radar.php");
	// Inclusion Pied de Page
	include ("../html/footer.html");
?> 