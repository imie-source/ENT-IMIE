<?php
include ("fonctions.inc.php");
function renvoieMatiere()	{

	$tabRes=request(GET_MATIERE_UTILISATEUR, $_SESSION["id"],"'JAVA'");

			
$lesMatieres = "";
	$i = 0;

	
	foreach  ($tabRes as $c )	{
	
			$devoir[] =  $tabRes[$i]["intitule"];
			$noteDevoir[] = $tabRes[$i] ["note"];
			$moyenneDevoir[]=$tabRes[$i] ["moyenne"];
			$commentaireDevoir[]= $tabRes[$i]["commentaire"];
			$c = count($devoir);
		$lesMatieres .=	"<div class='container pa1 mb2' id='border'> 
							<div id='bold' class='txtcenter'> " .  $devoir[$i]  .  " 
								<form action='../media/corrige.pdf'>
									<input type='submit' class=\"mbs mts\" value='Correction' />
								</form> 
								<form action='../media/sujet.pdf'>
									<input type='submit' value='Sujet' />
								</form>
							</div> 
							<div>
								<div id='bold' class='ligne'> Note 
								<div class='mts'> " . $noteDevoir[$i] ."\n </div> </div>	
								<div id='bold' class='ligne' > Moyenne 
								<div class='mts'> " . $moyenneDevoir[$i] . "\n </div> </div>
								<div style='clear:both'> </div>
							</div>
							<div> 
								<p id='border2' class=\"pcasser mt0 pas\"> "  . $commentaireDevoir[$i].  "\n </p> 
							</div>		
						</div>"
						;
						$i++;
	}
	return $lesMatieres;

}
 function choixMatiere()	{
	$titreMatiere = "fuck";/*$_POST["matiere"];*/
	return $titreMatiere;
} 	
 function moyenneEleve()	{
	$tabRes=request(GET_MOYENNE_ELEVE, $_SESSION["id"]);
	
		$moyenne=$tabRes[0]["moyenne"];
		
	return $moyenne;
	}

?>
