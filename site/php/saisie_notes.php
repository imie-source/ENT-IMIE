<?php
	include('fonctions.inc.php');
	autorisationPage('formateur');

	/*
		notesTab(idEleve,note,commentaire) prend 3 arguments et renvoie un
		tableau qui les lie entre eux
	
	function notesTab(idEleve, note,commentaire){
	}
	*/
	
	//défini l'appelle de la page
	if(isset($_SERVER["HTTP_REFERER"])) {			//si vient d'une autre page 
		$origin=explode('?',$_SERVER["HTTP_REFERER"]);
		$origin=explode('/',$origin[0]);
		switch ($origin[4]) {							//test par rapport au nom de la page d'origine
			case 'creation_devoir.php':
				//renvoyer les posts dans la BDD
				request(INSERT_DEVOIR,"'".$_POST['date']."'",$_POST['classe'], "'".$_POST['devoir']."'", $_SESSION['id']);
				
				//On charge les élèves de la classe dans un tableau
				$eleves=request(GET_STAGIAIRES_CLASSE,$_POST['classe']);
				
				$intitule=$_POST['devoir'];
				$date=$_POST['date'];
				
				break;
				
			case 'saisie_notes.php':
				//Détermine le nombre de $_POST['ideleve**'] existants
				$c=$_POST['countEleves'];
				
				//upload du corrigé et du sujet
				$idDevoir=request('SELECT LAST_INSERT_ID() FROM devoir', '');
				$idDevoir=$idDevoir[0]['LAST_INSERT_ID()'];
				
				$uploadfile = '../data/sujet/test01.txt';
				die($_FILES['sujet']['name']);
				$resultat = move_uploaded_file($_FILES['sujet']['tmp_name'],$uploadfile);
				if ($resultat) echo "Transfert réussi";
				
				//renvoyer les notes dans la table notes
				for($i=0; $i<$c; ++$i){
					$notes[]=[$_POST['ideleve'.$i], $_POST['note'.$i], $_POST['com'.$i]];
				}
				//ouvre le menu
				header('Location: menu.php');
				
				/* //affichage pour test (commenter la ligne précédente
				for($i=0; $i<$c; ++$i){
					echo 'id : '.$notes[$i][0].'<br />';
					echo 'note : '.$notes[$i][1].'<br />';
					echo 'commentaire : '.$notes[$i][2].'<br />';
				} */		
				break;
				
			case 'liste_devoirs_classe.php':
				//charger la BDD
				$devoir['date']='2014-07-14';
				$devoir['devoir']='QCM Linux';
				$eleves= array (
					1=>"Michel",
					2=>"francis",
					3=>"marion",
					4=>"el niño",
					5=>"Gudule"
				);
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
	function tableauSaisie($tableauEleve){
		$c=count($tableauEleve);
		$result='';
		for($i=0; $i<$c; $i++){
			$result.= "<tr>\n";
			$result.="\t<th>" . $tableauEleve[$i]['prenom'].' '.$tableauEleve[$i]['nom']. "</th>\n";
			$result.="\t<input name=\"ideleve".$i."\" type=\"hidden\" value=\"".$tableauEleve[$i]['idUtilisateur']."\"/>\n";
			$result.= "\t<th><input type=\"text\" class=\"note\" name=\"note".$i."\" required/></th>\n";
			$result.= "\t<th><input type=\"text\" name=\"com".$i."\" /></th>\n";
			$result.= "</tr>\n";
		}
		$result.= "\t<input name=\"countEleves\" type=\"hidden\" value=\"".$i."\"/>\n";
		return $result;
	}
	
	$titrePage = "Saisie des notes";
	$tabNotes=tableauSaisie($eleves);
	
	include("../html/header.html");
	include("../html/formateur/saisie_notes.html");
	include("../html/footer.html");

?>