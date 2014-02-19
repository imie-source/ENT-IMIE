<?php
	include('fonctions.inc.php');
	autorisationPage('formateur');

	
	//défini l'appelle de la page
	if(isset($_SERVER["HTTP_REFERER"])) {			//si vient d'une autre page 
		$origin=explode('?',$_SERVER["HTTP_REFERER"]);
		$origin=explode('/',$origin[0]);
		switch ($origin[4]) {							//test par rapport au nom de la page d'origine
			case 'creation_devoir.php':
				//renvoyer les posts dans la BDD
				$idDevoir=request(INSERT_DEVOIR,"'".$_POST['date']."'",$_POST['classe'], "'".$_POST['devoir']."'", $_SESSION['id']);
				
				//On charge les élèves de la classe dans un tableau
				$eleves=request(GET_STAGIAIRES_CLASSE,$_POST['classe']);
				
				$intitule=$_POST['devoir'];
				$date=$_POST['date'];
				
				break;
				
			case 'saisie_notes.php':
				//Détermine le nombre de $_POST['ideleve**'] existants
				$c=$_POST['countEleves'];
				
				/* Non Fonctionnel
				//upload du corrigé et du sujet
				$idDevoir=request('SELECT LAST_INSERT_ID() FROM devoir', '');
				$idDevoir=$idDevoir[0]['LAST_INSERT_ID()'];
				
				$uploadfile = '../data/sujet/test01.txt';
				die($_FILES['sujet']['name']);
				$resultat = move_uploaded_file($_FILES['sujet']['tmp_name'],$uploadfile);
				if ($resultat) echo "Transfert réussi"; */
				
				//renvoyer les notes dans la table notes
				for($i=0; $i<$c; ++$i){
					request(INSERT_CORRECTION, $_POST['ideleve'.$i], $_POST['devoir'], $_POST['note'.$i], "'".$_POST['com'.$i]."'");
				}
				//ouvre le menu
				header('Location: menu.php');
						
				break;
				
			case 'liste_devoirs_classe.php':
				$idDevoir=$_GET['devoir'];
				
				//On récupère l'intitulé du devoir et sa date
				$tabDevoir=request(GET_DEVOIR_BY_ID, $_GET['devoir']);
				$intitule=$tabDevoir[0]['intitule'];
				$date=$tabDevoir[0]['date'];
				//On récupère les corrections du devoir
				$eleves=request(GET_CORRECTION_DEVOIR, $_GET['devoir']);
				break;
				
			default:
				die ('Vous venez d\'où au juste ?');
		}
	} else {
		die ('Vous venez d\'où au juste ?');
	}
	
	/*
		Fonction qui prend un tableau en entrée et renvoie une ligne
		de tableau html avec une cellule qui est l'élément du tableau
		et deux cellules de saisie de texte.
	*/
	function tableauSaisie($tableauEleve, $idDevoir){
		$c=count($tableauEleve);
		$result='';
		for($i=0; $i<$c; $i++){
			if(isset($tableauEleve[$i]['note'])){
				$note=$tableauEleve[$i]['note'];
				$commentaire=$tableauEleve[$i]['commentaire'];
			} else {
				$note='';
				$commentaire='';
			}
			$result.= "<tr>\n";
			$result.="\t<th>" . $tableauEleve[$i]['prenom'].' '.$tableauEleve[$i]['nom']. "</th>\n";
			$result.="\t<input name=\"ideleve".$i."\" type=\"hidden\" value=\"".$tableauEleve[$i]['idUtilisateur']."\"/>\n";
			$result.= "\t<th><input type=\"text\" class=\"note\" name=\"note".$i."\" value=\"".$note."\"required/></th>\n";
			$result.= "\t<th><input type=\"text\" name=\"com".$i."\" value=\"".$commentaire."\" /></th>\n";
			$result.= "</tr>\n";
		}
		$result.= "\t<input name=\"countEleves\" type=\"hidden\" value=\"".$i."\"/>\n";
		$result.= "\t<input name=\"devoir\" type=\"hidden\" value=\"".$idDevoir."\"/>\n";
		return $result;
	}
	
	$titrePage = "Saisie des notes";
	$tabNotes=tableauSaisie($eleves, $idDevoir);
	
	include("../html/header.html");
	include("../html/formateur/saisie_notes.html");
	include("../html/footer.html");

?>