<?php

	/*
		notesTab(idEleve,note,commentaire) prend 3 arguments et renvoie un
		tableau qui les lie entre eux
	
	function notesTab(idEleve, note,commentaire){
	}
	*/
	
	//défini l'appelle de la page
	if(isset($_SERVER["HTTP_REFERER"])) { 				//si vient d'une autre page 
		$origin=explode('/',$_SERVER["HTTP_REFERER"]);	
		switch ($origin[4]) {							//test par rapport au nom de la page d'origine
			case 'creation_devoir.php':
				//renvoyer les posts dans la BDD
				$devoir['date']=$_POST['date'];
				$devoir['matiere']=$_POST['matiere'];
				$devoir['classe']=$_POST['classe'];
				$devoir['devoir']=$_POST['devoir'];
				$eleves= array (
					1=>"Michel",
					2=>"francis",
					3=>"marion",
					4=>"éric",
					5=>"Gudule"
				);
				break;
				
			case 'saisie_notes.php':
				//Détermine le nombre de $_POST['ideleve**'] existants
				$c=$_POST['countEleves'];
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
		$cpt=0;
		foreach ($tableauEleve as $key=>$value){
			echo "<tr>\n";
			echo utf8_encode("\t<th>" . $value . "</th>\n");
			echo "\t<input name=\"ideleve".$cpt."\" type=\"hidden\" value=\"".$key."\"/>\n";
			echo "\t<th><input type=\"text\" class=\"note\" name=\"note".$cpt."\" required/></th>\n";
			echo "\t<th><input type=\"text\" name=\"com".$cpt."\" /></th>\n";
			echo "</tr>\n";
			$cpt++;
		}
		echo "\t<input name=\"countEleves\" type=\"hidden\" value=\"".$cpt."\"/>\n";
	}
	
	$titrePage = "Saisie des notes";
	
	include("../html/header.html");
	include("../html/formateur/saisie_notes.html");
	include("../html/footer.html");

?>