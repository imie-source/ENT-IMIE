<?php
	include('fonctions.inc.php');
	autorisationPage('formateur');
	
	/**
		*tableauListe renvoie un tableau de string à partir d'un tableau associatif avec plein de champs
		*
		*Nécessite la fonction arrayToString définie dans fonctions.inc.php.
		*La fonction tableauListe est propre à la page creation_devoir.php
		*
		*@param array Tableau associatif de chaînes de caractères
		*@return array Tableau de type index numérique
	*/
	function tableauListe($tableau){
		$c=count($tableau);
		for($i=0; $i<$c; $i++){
			$listeString[]=arrayToString($tableau[$i]);
		}
		return $listeString;
	}
	
	$titrePage="Creation de Devoir";
	
	/* Création de la liste des matières de l'utilisateur */
	$tabMatieres=request(GET_MATIERE_UTILISATEUR, $_SESSION['id']);
	$listeMatieres=tableauListe($tabMatieres);
	$listeMatieres=listeOption($listeMatieres);
	
	/* Création de la liste des classes de l'utilisateur */
	$tabClasses=request(GET_CLASSE_UTILISATEUR, $_SESSION['id']);
	$listeClasses=tableauListe($tabClasses);
	$listeClasses=listeOption($listeClasses);
	
	include("../html/header.html");
	include("../html/formateur/creation_devoir.html");
	include("../html/footer.html");

?>