<?php
	include('/fonctions/fonctions.inc.php');
	autorisationPage('formateur');
	
	$titrePage="Sélection de la classe";
	
	$tabClasses=["ITStart Rennes 01","CDPN Rennes","DL-ITS Rennes"];
	$cnx = cnxBase ();
	// S'il y a un problème de connexion on renvoie l'erreur
	if (is_string($cnx)) {
		die('<script type="text/javascript" language="javascript">alert(\'Erreur lors de la connexion à la base de données.\');</script>');
	}
	//préparation de la requête
	$sql = 'SELECT libelleCentreFormation, libelleCursus, session
			FROM utilisateur, utilisateur_has_classe, classe, centreFormation, cursus
			WHERE idUtilisateur = '.$_SESSION['idUtilisateur'].'
			AND utilisateur_idUtilisateur=idUtilisateur
			AND classe_idClasse=idClasse
			';
	$result = $cnx->query($sql);
	$tabClasses = $result->fetchAll(PDO::FETCH_BOTH);
	
	
	$listeClasses=renvoieUneListe($tabClasses, 'liste_devoirs_classe.php?classe=');
	
	
	include("../html/header.html");
	
	include("../html/formateur/liste_classes01.html");
	
	include("../html/footer.html");


?>