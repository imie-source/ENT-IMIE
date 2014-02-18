<?php
	include('fonctions.inc.php');
	autorisationPage('formateur');
	
	$titrePage="Sélection de la classe";
	
	$tabClasses=request(GET_CLASSE_UTILISATEUR,$_SESSION['idUtilisateur']);
	
	function concateneLignesTableau($tableauString){
		$c=count($tableau);
		for($i=0; $i<$c; $i++){
			$conc=''
			foreach($tableau[$i] as $value){
				$conc.=$value;
			}
			$result[]=$conc;
		}
		return $result;
	}
	
	$tabClasses=concateneLignesTableau($tabClasses);
	
	$listeClasses=renvoieUneListe($tabClasses, 'liste_devoirs_classe.php?classe=');
	
	
	include("../html/header.html");
	
	include("../html/formateur/liste_classes01.html");
	
	include("../html/footer.html");


?>