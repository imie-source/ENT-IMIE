<?php
	
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
				//renvoyer les notes dans la BDD
								
				//ouvre le menu
				include('/menu.php');
				die ();
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
				echo 'Vous venez d\'où au juste ?';
		}
	}
	
	/*
		Fonction qui prend un tableau en entrée et renvoie une ligne
		de tableau html avec une cellule qui est l'élément du tableau
		et deux cellules de saisie de texte.
	*/
	function tableauSaisie($tableauEleve){
		foreach ($tableauEleve as $key=>$value){
			echo "<tr>\n";
			echo utf8_encode("\t<th>" . $value . "</th>\n");
			echo "\t<input name=\"ideleve\" type=\"hidden\" value=\"".$key."\"/>\n";
			echo "\t<th><input type=\"text\" class=\"note\" name=\"note\" required/></th>\n";
			echo "\t<th><input type=\"text\" name=\"com\" /></th>\n";
			echo "</tr>\n";
		}
	}
	
	$titrePage = "Saisie des notes";
	
	include("../html/header.html");
	include("../html/formateur/saisie_notes.html");
	include("../html/footer.html");

?>