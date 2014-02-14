<?php
function renvoieMatiere()	{
include ("connexion.inc.php");
$cnx = cnxBase ();
$sql = 	"SELECT correctionDevoir.note, correctionDevoir.commentaire, devoir.moyenne, devoir.intitule
		FROM matiere, domaine, utilisateur_has_matiere, utilisateur, devoir_has_matiere, correctionDevoir, devoir
		WHERE matiere.idMatiere = devoir_has_matiere.devoir_idDevoir
		AND matiere.idMatiere = domaine.idDomaine
		AND matiere.idMatiere = utilisateur_has_matiere.utilisateur_idUtilisateur
		AND utilisateur.idUtilisateur = correctionDevoir.utilisateur_idUtilisateur
		AND utilisateur_has_matiere.utilisateur_idUtilisateur = utilisateur.idUtilisateur
		AND devoir_has_matiere.devoir_idDevoir = devoir.idDevoir
		AND devoir.idDevoir = correctionDevoir.devoir_idDevoir
		AND utilisateur.idUtilisateur = devoir.utilisateur_idUtilisateur
		AND 'Gudule' = utilisateur.idUtilisateur
		AND  'java' = matiere.nomMatiere;";
			$result = $cnx->query($sql);
			$tabRes = $result->fetchAll(PDO::FETCH_ASSOC);
			
$lesMatieres = "";
	$devoir =  $tabRes[0]["devoir.intitule"];
	$noteDevoir = $tabRes[0] ["correctionDevoir.note"];
	$moyenneDevoir=$tabRes[0] ["devoir.moyenne"];
	$commentaireDevoir= $tabRes[0]["correctionDevoir.commentaire"];
	$c = count($devoir);
	foreach  ($conn->query($sql) as $row)	{
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