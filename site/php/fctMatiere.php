<?php
function renvoieMatiere()	{
$lesMatieres = "";
	$devoir =array("QCM","CMQ", "LOS");
	$noteDevoir= array("13","14","15");
	$moyenneDevoir=array ("2","5","4") ;
	$commentaireDevoir=array("toujours aussi nul", "azerty", "qwerty");
	$c = count($devoir);
	for($i = 0; $i < $c; $i++) {
		$lesMatieres .= "<div> Devoir : ". $devoir[$i]. "\n<div> Note </div> " . $noteDevoir[$i] ."\n<div> <div> Moyenne </div> <div>" . $moyenneDevoir[$i] . "\n</div> <div> Commentaire : <p> "  . $commentaireDevoir[$i].  "\n</p>
		<div>
					<form action=\"../media/corrige.pdf\">
						<input type=\"submit\" value=\"Correction\" />
					</form>
					<form action=\"../media/sujet.pdf\">
						<input type=\"submit\" value=\"Sujet\" />
					</form>
				</div>
			</div>\n";
	}
	return $lesMatieres;
	
}

function choixMatiere()	{
$titreMatiere = ("Linux");
return $titreMatiere;
}
?>
