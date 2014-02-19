<?php
	include('fonctions.inc.php');
	autorisationPage('formateur');

	
	//défini l'appelle de la page
	if(isset($_POST['from']) || isset($_GET['from'])) {//si vient d'une autre page 
		$origin=isset($_POST['from'])?$_POST['from']:$_GET['from'];
		switch ($origin) {//test par rapport au nom de la page d'origine
			case 'creation_devoir':
				//renvoyer les posts dans la BDD
				$idDevoir=request(INSERT_DEVOIR,"'".$_POST['date']."'",$_POST['classe'], "'".$_POST['devoir']."'", $_SESSION['id']);
				
				//On charge les élèves de la classe dans un tableau
				$eleves=request(GET_STAGIAIRES_CLASSE,$_POST['classe']);
				
				$intitule=$_POST['devoir'];
				$date=$_POST['date'];
				
				$from='saisie_notes';
				
				break;
				
			case 'saisie_notes':
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
				
			case 'liste_devoirs_classe':
				$idDevoir=$_GET['devoir'];
				
				//On récupère l'intitulé du devoir et sa date
				$tabDevoir=request(GET_DEVOIR_BY_ID, $_GET['devoir']);
				$intitule=$tabDevoir[0]['intitule'];
				$date=$tabDevoir[0]['date'];
				//On récupère les corrections du devoir
				$eleves=request(GET_CORRECTION_DEVOIR, $_GET['devoir']);
				
				$from='update';
				break;
				
			case 'update':
				$c=$_POST['countEleves'];
				//Mise à jour des notes et commentaires dans la BDD
				for($i=0; $i<$c; ++$i){
					request(UPDATE_CORRECTION, $_POST['note'.$i], "'".$_POST['com'.$i]."'", $_POST['ideleve'.$i], $_POST['devoir']);
				}
				//ouvre le menu
				header('Location: menu.php');
				break;
				
			default:
				die ('Vous venez d\'où au juste ?');
		}
	} else {
		die ('Vous venez d\'où au juste ?');
	}
	
	/**
		*Fonction qui prend un tableau et un id de devoir en entrée et renvoie un tableau en HTML avec les notes et les commentaires par élève
		*
		*@param array $tableauEleve Tableau contenant la liste des élèves et éventuellement leurs notes et commentaires pour le devoir
		*@param integer $idDevoir Id du devoir pour lequel on génère le tableau
		*@return string Tableau sous forme de code HTMl
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