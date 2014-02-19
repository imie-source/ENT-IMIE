<?php
	include('fonctions.inc.php');
	autorisationPage('formateur');
	
	/**
		*arrayToString prend un tableau de chaînes de caractères et renvoie un tableau où sont concaténés les strings de chaque ligne
		*
		*Il prend en entré un tableau de type associatif et renvoie un tableau avec index numérique.
		*La première cellule de chaque ligne du tableau est un id
		*
		*@param array $tableau Tableau associatif contenant pour chaque ligne un id en première cellule et  des chaînes de caractères sur les 3 suivantes
		*@param integer $keyId Clef du champ d'identification
		*@param string $keyV1 Première chaîne de caractères
		*@param string $keyV2 Deuxième chaîne de caractères
		*@param string $keyV3 Troisième chaîne de caractères
		*@return array Tableau avec index numérique ou la première cellule de chaque ligne est un id et la seconde une chaôine de caractères
	*/
	function arrayToString($tableau, $keyId, $keyV1, $keyV2, $keyV3){
		$c=count($tableau);
		for($i=0; $i<$c; i++){
			$result[$i][0]=$keyId;
			$result[$i][1]=$keyV1.' '.$keyV2.' '.$keyV3;
		}
		return $result;
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