<?php
include ("fonctions.inc.php");
	// Fontion pour renvoyer les notes par rapport a la matière
 function renvoieMatiere()	{
/* Initialisation de la requete par l'apelle de la constante GET_DEVOIR_MATIERE_UTILISATEUR */
	$tabRes=request(GET_DEVOIR_MATIERE_UTILISATEUR, $_SESSION["id"],"'JAVA'");

	/* Initialisation des variables lesMatieres et i */		
	$lesMatieres = "";
	$i = 0;

	/*  Affichage de toute les notes dans des tableaux.(Génération du code HTML automatisé )*/
	foreach  ($tabRes as $c )	{
			/* Récupération dans des tableaux les différents champs de la requête SQL */
			$devoir[] =  $tabRes[$i]["intitule"];
			$noteDevoir[] = $tabRes[$i] ["note"];
			$moyenneDevoir[]=$tabRes[$i] ["moyenne"];
			$commentaireDevoir[]= $tabRes[$i]["commentaire"];
			/* Compte le nombre de réponse dans la requête SQL */
			$c = count($devoir);
			/* Code généré en HTML pour chaque résultat trouvé dans la requête SQL */
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
						/* Incrémentation de 1 */
						$i++;
	}
	/* Renvoie le résultat de la fonction */
	return $lesMatieres;

}
/* Fonction pour choisir la matière */
 function choixMatiere()	{
	$titreMatiere = "Java" /*$_POST["matiere"]; Version finale pour définir le titre de la page.*/ ;
	return $titreMatiere;
} 	
/* Fonction pour récupérer la moyenne de l'élève */
 function moyenneEleve()	{
	$tabRes=request(GET_MOYENNE_ELEVE, $_SESSION["id"]);
	/* Récupération de la moyenne de l'élève */
		$moyenne=$tabRes[0]["moyenne"];
	/* Renvoie le résultat de la fonction */
	return $moyenne;
	}

?>
