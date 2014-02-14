<?php
	include('fonctions.inc.php');
	autorisationPage('formateur');
	
	$classes=['ITStart','CDPN','DL'];
	/* RECUPERATION DES CLASSES DE L'UTILISATEUR */
	//Connexion à la BDD
	$cnx = cnxBase ();
	// S'il y a un problème de connexion on renvoie l'erreur
	if (is_string($cnx)) {
		erreur(ERREUR_CONNEXION_BDD);
	}
	
	$sql = "SELECT * FROM utilisateur_has_matiere, utilisateur, matiere WHERE idUtilisateur = utilisateur_idUtilisateur AND matiere_idMatiere = idMatiere AND idUtilisateur ="$_SESSION[';
	$result = $cnx->query($sql);
	$tabRes = $result->fetchAll(PDO::FETCH_ASSOC);
	$matieres=['JAVA','PHP','SQL'];
	
	$titrePage="Creation de Devoir";
	$listeMatieres=listeOption($matieres);
	$listeClasses=listeOption($classes);
	
	include("../html/header.html");
	
	include("../html/formateur/creation_devoir.html");
	
	include("../html/footer.html");


?>