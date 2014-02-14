<?php
function renvoieMatiere()	{

$lesMatieres = "";
	$devoir =array("QCM","CMQ", "LOS");
	$noteDevoir= array("13","14","15");
	$moyenneDevoir=array ("2","5","4") ;
	$commentaireDevoir=array("toujours aussi nul", "azerty", "qwerty");
	$c = count($devoir);
	for($i = 0; $i < $c; $i++) {
		$lesMatieres .=	"<div class='grid3 line row pa1 mb2' id='border'> 
							<div id='bold' class='line clear row'> Devoir " .  $devoir[$i]  .  " 
								<form action='../media/corrige.pdf'>
									<input type='submit' value='Correction' />
								</form> 
								<form action='../media/sujet.pdf'>
									<input type='submit' value='Sujet' />
								</form>
							</div> 
							<div>
								<div id='bold'> Note </div>
								<div> " . $noteDevoir[$i] ."\n </div>	
								<div id='bold' > Moyenne </div>
								<div> " . $moyenneDevoir[$i] . "\n </div> 
							</div>
							<div> 
								<div> Commentaire : <p id='border2'> "  . $commentaireDevoir[$i].  "\n </p> </div>
							</div>		
						</div>";
	}
	return $lesMatieres;
	
}
function choixMatiere()	{
$titreMatiere = ("Linux");
return $titreMatiere;
}
?>