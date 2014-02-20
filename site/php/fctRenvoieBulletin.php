<?php

// Définition de la fonction renvoieBulletin qui affiche le bulletin de l'élève
function renvoieBulletin ($bulletin) {
	
		// Connexion à la base de donnée
		$db = mysql_connect("10.3.0.245", "ENT", "ent");
		mysql_select_db("ENT");

		// Définition des variables
		$trim = "1";
		$classe = "1";
		@$eleve = $_POST['eleve'];
		$numMatiere = 0;
		$numDevoir = 0;
		
		// Définition des requêtes pour récupérer les données dans la base de données
		$moyenneEleve =  request(GET_MOYENNE_ELEVE, $eleve);
		$moyenneClasse = request(GET_MOYENNE_CLASSE, $classe);
		$appreciationEleve = request(GET_APPRECIATION, $eleve, $trim);
		$moyenneDevoirClasse = request(GET_MOYENNE_CLASSE_DEVOIR, $moyenneEleve[$numMatiere]['nomMatiere']);
		$note = request(GET_NOTE_UTILISATEUR, $moyenneEleve[$numMatiere]['nomMatiere'], $eleve);
		$intitule = request(GET_INTITULE_DEVOIR, $eleve, $moyenneEleve[$numMatiere]['nomMatiere']);
		$commentaire = request(GET_COMMENTAIRE_DEVOIR, $eleve, $moyenneEleve[$numMatiere]['nomMatiere']);
		
		$nbDevoir = mysql_query("SELECT idDevoir FROM matiere, utilisateur_has_matiere, utilisateur, devoir, correctionDevoir WHERE idMatiere = utilisateur_has_matiere.matiere_idMatiere AND utilisateur_has_matiere.utilisateur_idUtilisateur = idUtilisateur AND idUtilisateur = devoir.utilisateur_idUtilisateur AND idDevoir = correctionDevoir.devoir_idDevoir AND  idUtilisateur = '".$eleve."' AND nomMatiere = '" . $moyenneEleve[$numMatiere]['nomMatiere'] . "' ");
		$nbMatiere = mysql_query ("SELECT idMatiere FROM utilisateur, correctionDevoir, devoir, devoir_has_matiere, matiere  WHERE idUtilisateur = correctionDevoir.utilisateur_idUtilisateur AND correctionDevoir.devoir_idDevoir = idDevoir AND idDevoir = devoir_has_matiere.devoir_idDevoir AND devoir_has_matiere.matiere_idMatiere = idMatiere AND idUtilisateur = '" . $eleve . "' GROUP BY idMatiere; ");

		// Affichage des lignes du tableau contenant les variables
		echo "<tr><td><form id='matiere' action='matiere.php' method='post'>";
		echo "<input type='hidden' name='matiere' value='" ;
		echo utf8_encode($moyenneEleve[$numMatiere]['nomMatiere']); 
		echo "'/><input class='lienbulletin' type='submit' value='";
		echo utf8_encode($moyenneEleve[$numMatiere]['nomMatiere']); 
		echo "' /></form>" ;
		echo "</td><td>";
		echo $moyenneEleve[$numMatiere]['moyenne'];
		echo "</td><td></td><td></td><td>";
		echo $moyenneClasse[$numMatiere]['moyenne'];
		echo "</td><td>";
		echo utf8_encode($appreciationEleve[$numMatiere]['appreciation']);
		echo "</td></tr><tr><td></td><td></td><td>";
		echo utf8_encode($intitule[$numMatiere]['intitule']);
		echo "</td><td>";
		echo $note[$numMatiere]['note'];
		echo "</td><td>";
		echo $moyenneDevoirClasse[$numMatiere]['moyenne'];
		echo "</td><td>";
		echo utf8_encode($commentaire[$numMatiere]['commentaire']);
		echo "</td></tr>";
		
		// On incrémente la variable numMatiere pour changer le numéro de ligne de la matière
		$numMatiere = $numMatiere + 1;
		// On incrémente la variable numDevoir pour changer le numéro de ligne du devoir
		$numDevoir = $numDevoir + 1;
		
			// Tant qu'il reste des lignes dans la requête nbDevoir qui affiche tout les devoirs	
			while (mysql_fetch_array($nbDevoir) != NULL) {
				// Affichage des lignes du tableau contenant les variables
				echo "<tr><td></td><td></td><td>";
				echo utf8_encode($intitule[$numDevoir]['intitule']);
				echo "</td><td>";
				echo $note[$numDevoir]['note'];
				echo "</td><td>";
				echo $moyenneDevoirClasse[$numDevoir]['moyenne'];
				echo "</td><td>";
				echo utf8_encode($commentaire[$numDevoir]['commentaire']);
				echo "</td></tr>";
				// On incrémente la variable numDevoir pour changer le numéro de ligne du devoir
				$numDevoir = $numDevoir + 1;
			}
			
			// Tant qu'il reste des lignes dans la requête nbMatiere qui affiche toutes les matières
		while (mysql_fetch_array($nbMatiere) != NULL) {
		// Définition des requêtes pour récupérer les données dans la base de données
		$moyenneEleve =  request(GET_MOYENNE_ELEVE, $eleve);
		$moyenneClasse = request(GET_MOYENNE_CLASSE, $classe);
		$appreciationEleve = request(GET_APPRECIATION, $eleve, $trim);
		$moyenneDevoirClasse = request(GET_MOYENNE_CLASSE_DEVOIR, $moyenneEleve[$numMatiere]['nomMatiere']);
		$note = request(GET_NOTE_UTILISATEUR, $moyenneEleve[$numMatiere]['nomMatiere'], $eleve);
		$intitule = request(GET_INTITULE_DEVOIR, $eleve, $moyenneEleve[$numMatiere]['nomMatiere']);
		$commentaire = request(GET_COMMENTAIRE_DEVOIR, $eleve, $moyenneEleve[$numMatiere]['nomMatiere']);
		
		$nbDevoir = mysql_query("SELECT idDevoir FROM matiere, utilisateur_has_matiere, utilisateur, devoir, correctionDevoir WHERE idMatiere = utilisateur_has_matiere.matiere_idMatiere AND utilisateur_has_matiere.utilisateur_idUtilisateur = idUtilisateur AND idUtilisateur = devoir.utilisateur_idUtilisateur AND idDevoir = correctionDevoir.devoir_idDevoir AND  idUtilisateur = '".$eleve."' AND nomMatiere = '" . $moyenneEleve[$numMatiere]['nomMatiere'] . "' ");
		$nbMatiere = mysql_query ("SELECT idMatiere FROM utilisateur, correctionDevoir, devoir, devoir_has_matiere, matiere  WHERE idUtilisateur = correctionDevoir.utilisateur_idUtilisateur AND correctionDevoir.devoir_idDevoir = idDevoir AND idDevoir = devoir_has_matiere.devoir_idDevoir AND devoir_has_matiere.matiere_idMatiere = idMatiere AND idUtilisateur = '" . $eleve . "' GROUP BY idMatiere; ");

		// Affichage des lignes du tableau contenant les variables
		echo "<tr><td><form id='matiere' action='matiere.php' method='post'>";
		echo "<input type='hidden' name='matiere' value='" ;
		echo utf8_encode($moyenneEleve[$numMatiere]['nomMatiere']); 
		echo "'/><input class='lienbulletin' type='submit' value='";
		echo utf8_encode($moyenneEleve[$numMatiere]['nomMatiere']); 
		echo "' /></form>" ;
		echo "</td><td>";
		echo $moyenneEleve[$numMatiere]['moyenne'];
		echo "</td><td></td><td></td><td>";
		echo $moyenneClasse[$numMatiere]['moyenne'];
		echo "</td><td>";
		echo utf8_encode($appreciationEleve[$numMatiere]['appreciation']);
		echo "</td></tr><tr><td></td><td></td><td>";
		echo utf8_encode($intitule[$numMatiere]['intitule']);
		echo "</td><td>";
		echo $note[$numMatiere]['note'];
		echo "</td><td>";
		echo $moyenneDevoirClasse[$numMatiere]['moyenne'];
		echo "</td><td>";
		echo utf8_encode($commentaire[$numMatiere]['commentaire']);
		echo "</td></tr>";
		
		// On incrémente la variable numMatiere pour changer le numéro de ligne de la matière
		$numMatiere = $numMatiere + 1;
		// On incrémente la variable numDevoir pour changer le numéro de ligne du devoir
		$numDevoir = $numDevoir + 1;
		
			// Tant qu'il reste des lignes dans la requête nbDevoir qui affiche tout les devoirs	
			while (mysql_fetch_array($nbDevoir) != NULL) {
				// Affichage des lignes du tableau contenant les variables
				echo "<tr><td></td><td></td><td>";
				echo utf8_encode($intitule[$numDevoir]['intitule']);
				echo "</td><td>";
				echo $note[$numDevoir]['note'];
				echo "</td><td>";
				echo $moyenneDevoirClasse[$numDevoir]['moyenne'];
				echo "</td><td>";
				echo utf8_encode($commentaire[$numDevoir]['commentaire']);
				echo "</td></tr>";
				
				// On incrémente la variable numDevoir pour changer le numéro de ligne du devoir
				$numDevoir = $numDevoir + 1;
			}
		}
}
?>