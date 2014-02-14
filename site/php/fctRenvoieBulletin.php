<?php
// Définition de la fonction renvoieBulletin qui affiche le bulletin de l'élève
function renvoieBulletin ($bulletin) {
	
		// Connexion à la base de donnée
		$db = mysql_connect("localhost", "root", "");
		mysql_select_db("imie");
		
		// Définition des variables correspondant au trimestre et à la classe de l'élève
		$trim = "1";
		$classe = "5";
		$eleve = $_POST['eleve'];
		
		// Définition des requêtes pour récupérer les données dans la base de données
		$moyenneEleve =  mysql_query ("SELECT nomMatiere, ROUND(AVG(note),2) AS moyenne FROM matiere, note, eleve WHERE matiere.idMatiere = note.idMatiere AND note.idEleve = eleve.idEleve AND eleve.idEleve =  '".$eleve."' GROUP BY matiere.idMatiere ");
		$moyClasse = mysql_query ("SELECT matiere.nomMatiere, ROUND(AVG(note),2) AS moyenne FROM note, matiere, eleve, classe WHERE note.idMatiere = matiere.idMatiere AND note.idEleve = eleve.idEleve AND eleve.idClasse = classe.idClasse AND classe.idClasse =  '".$classe."' GROUP BY matiere.idMatiere ");
		$com = mysql_query ("SELECT appreciation FROM appreciation WHERE idEleve =  '".$eleve."' AND trimestre =  '".$trim."' ");

		// Exécution des requêtes dans une variable
		$resultat1 = mysql_fetch_array($moyenneEleve);
		$resultat2 = mysql_fetch_array($moyClasse);
		$resultat3 = mysql_fetch_array($com);
		
		// Définition des requêtes pour récupérer les données dans la base de données
		$moyenne = mysql_query ("SELECT ROUND(AVG(note),2) AS moyenne FROM correctionDevoir, devoir, devoir_has_matiere, matiere WHERE correctionDevoir.devoir_idDevoir = devoir.idDevoir AND devoir.idDevoir = devoir_has_matiere.devoir_idDevoir AND devoir_has_matiere.matiere_idMatiere = matiere.idMatiere AND matiere.nomMatiere = '".$resultat1['nomMatiere']."' GROUP BY devoir.idDevoir ;");
		$note = mysql_query ("SELECT note FROM matiere, utilisateur_has_matiere, utilisateur, devoir, correctionDevoir WHERE matiere.idMatiere = utilisateur_has_matiere.matiere_idMatiere AND utilisateur_has_matiere.utilisateur_idUtilisateur = utilisateur.idUtilisateur AND utilisateur.idUtilisateur = devoir.utilisateur_idUtilisateur AND devoir.idDevoir = correctionDevoir.devoir_idDevoir AND matiere.nomMatiere = '".$resultat1['nomMatiere']."' AND utilisateur.idUtilisateur =  '".$eleve."'; ");
		$intitule = mysql_query ("SELECT intitule FROM matiere, utilisateur_has_matiere, utilisateur, devoir, correctionDevoir WHERE matiere.idMatiere = utilisateur_has_matiere.matiere_idMatiere AND utilisateur_has_matiere.utilisateur_idUtilisateur = utilisateur.idUtilisateur AND utilisateur.idUtilisateur = devoir.utilisateur_idUtilisateur AND devoir.idDevoir = correctionDevoir.devoir_idDevoir AND utilisateur.idUtilisateur = '".$eleve."' AND matiere.nomMatiere = '".$resultat1['nomMatiere']."' GROUP BY devoir.idDevoir ;");
		$commentaire = mysql_query ("SELECT commentaire FROM matiere, utilisateur_has_matiere, utilisateur, devoir, correctionDevoir WHERE matiere.idMatiere = utilisateur_has_matiere.matiere_idMatiere AND utilisateur_has_matiere.utilisateur_idUtilisateur = utilisateur.idUtilisateur AND utilisateur.idUtilisateur = devoir.utilisateur_idUtilisateur AND devoir.idDevoir = correctionDevoir.devoir_idDevoir AND utilisateur.idUtilisateur = '".$eleve."' AND matiere.nomMatiere = '".$resultat1['nomMatiere']."' GROUP BY devoir.idDevoir ;");
		$nbDevoir = mysql_query("SELECT devoir.idDevoir FROM matiere, utilisateur_has_matiere, utilisateur, devoir, correctionDevoir WHERE matiere.idMatiere = utilisateur_has_matiere.matiere_idMatiere AND utilisateur_has_matiere.utilisateur_idUtilisateur = utilisateur.idUtilisateur AND utilisateur.idUtilisateur = devoir.utilisateur_idUtilisateur AND devoir.idDevoir = correctionDevoir.devoir_idDevoir AND  utilisateur.idUtilisateur = '".$eleve."' AND matiere.nomMatiere = '" . $resultat1['nomMatiere'] . "' ");
		$nbMatiere = mysql_query ("SELECT COUNT(*) FROM utilisateur, correctionDevoir, devoir, devoir_has_matiere, matiere  WHERE utilisateur.idUtilisateur = correctionDevoir.utilisateur_idUtilisateur AND correctionDevoir.devoir_idDevoir = devoir.idDevoir AND devoir.idDevoir = devoir_has_matiere.devoir_idDevoir AND devoir_has_matiere.matiere_idMatiere = matiere.idMatiere AND utilisateur.idUtilisateur = '" . $eleve . "' GROUP BY matiere.idMatiere; ");
		
		// Exécution des requêtes dans une variable
		$resultat4 = mysql_fetch_array($moyenne);
		$resultat5 = mysql_fetch_array($note);
		$resultat6 = mysql_fetch_array($intitule);
		$resultat7 = mysql_fetch_array($commentaire);
		$resultat8 = mysql_fetch_array($nbDevoir);

		// Affichage des lignes du tableau contenant les variables
		echo "<tr><td><form id='matiere' action='matiere.php' method='post'>";
		echo "<input type='hidden' name='matiere' value='" ;
		echo utf8_encode($resultat1['nomMatiere']); 
		echo "'/><input type='submit' value='";
		echo utf8_encode($resultat1['nomMatiere']); 
		echo "' /></form>" ;
		echo "</td><td>";
		echo $resultat1['moyenne'];
		echo "</td><td></td><td></td><td>";
		echo $resultat2['moyenne'];
		echo "</td><td>";
		echo utf8_encode($resultat3['appreciation']);
		echo "</td></tr><tr><td></td><td></td><td>";
		echo utf8_encode($resultat6['intitule']);
		echo "</td><td>";
		echo $resultat5['note'];
		echo "</td><td>";
		echo $resultat4['moyenne'];
		echo "</td><td>";
		echo utf8_encode($resultat7['commentaire']);
		echo "</td></tr>";
			// Tant qu'il reste des lignes dans la requête nbDevoir qui affiche tout les devoirs	
			while (mysql_fetch_array($nbDevoir) != NULL) {
				// Affichage des lignes du tableau contenant les variables
				echo "<tr><td></td><td></td><td>";
				echo utf8_encode($resultat6['intitule']);
				echo "</td><td>";
				echo $resultat5['note'];
				echo "</td><td>";
				echo $resultat4['moyenne'];
				echo "</td><td>";
				echo utf8_encode($resultat7['commentaire']);
				echo "</td></tr>";
			}
			
			// Tant qu'il reste des lignes dans la requête nbMatiere qui affiche toutes les matières
			while (mysql_fetch_array($nbMatiere) != NULL) {
		// Exécution des requêtes dans une variable
		$resultat1 = mysql_fetch_array($moyenneEleve);
		$resultat2 = mysql_fetch_array($moyClasse);
		$resultat3 = mysql_fetch_array($com);
		
		// Définition des requêtes pour récupérer les données dans la base de données
		$moyenne = mysql_query ("SELECT ROUND(AVG(note),2) AS moyenne FROM correctionDevoir, devoir, devoir_has_matiere, matiere WHERE correctionDevoir.devoir_idDevoir = devoir.idDevoir AND devoir.idDevoir = devoir_has_matiere.devoir_idDevoir AND devoir_has_matiere.matiere_idMatiere = matiere.idMatiere AND matiere.nomMatiere = '".$resultat1['nomMatiere']."' GROUP BY devoir.idDevoir ;");
		$note = mysql_query ("SELECT note FROM matiere, utilisateur_has_matiere, utilisateur, devoir, correctionDevoir WHERE matiere.idMatiere = utilisateur_has_matiere.matiere_idMatiere AND utilisateur_has_matiere.utilisateur_idUtilisateur = utilisateur.idUtilisateur AND utilisateur.idUtilisateur = devoir.utilisateur_idUtilisateur AND devoir.idDevoir = correctionDevoir.devoir_idDevoir AND matiere.nomMatiere = '".$resultat1['nomMatiere']."' AND utilisateur.idUtilisateur =  '".$eleve."'; ");
		$intitule = mysql_query ("SELECT intitule FROM matiere, utilisateur_has_matiere, utilisateur, devoir, correctionDevoir WHERE matiere.idMatiere = utilisateur_has_matiere.matiere_idMatiere AND utilisateur_has_matiere.utilisateur_idUtilisateur = utilisateur.idUtilisateur AND utilisateur.idUtilisateur = devoir.utilisateur_idUtilisateur AND devoir.idDevoir = correctionDevoir.devoir_idDevoir AND utilisateur.idUtilisateur = '".$eleve."' AND matiere.nomMatiere = '".$resultat1['nomMatiere']."' GROUP BY devoir.idDevoir ;");
		$commentaire = mysql_query ("SELECT commentaire FROM matiere, utilisateur_has_matiere, utilisateur, devoir, correctionDevoir WHERE matiere.idMatiere = utilisateur_has_matiere.matiere_idMatiere AND utilisateur_has_matiere.utilisateur_idUtilisateur = utilisateur.idUtilisateur AND utilisateur.idUtilisateur = devoir.utilisateur_idUtilisateur AND devoir.idDevoir = correctionDevoir.devoir_idDevoir AND utilisateur.idUtilisateur = '".$eleve."' AND matiere.nomMatiere = '".$resultat1['nomMatiere']."' GROUP BY devoir.idDevoir ;");
		$nbDevoir = mysql_query("SELECT devoir.idDevoir FROM matiere, utilisateur_has_matiere, utilisateur, devoir, correctionDevoir WHERE matiere.idMatiere = utilisateur_has_matiere.matiere_idMatiere AND utilisateur_has_matiere.utilisateur_idUtilisateur = utilisateur.idUtilisateur AND utilisateur.idUtilisateur = devoir.utilisateur_idUtilisateur AND devoir.idDevoir = correctionDevoir.devoir_idDevoir AND  utilisateur.idUtilisateur = '".$eleve."' AND matiere.nomMatiere = '" . $resultat1['nomMatiere'] . "' ");
		
		// Exécution des requêtes dans une variable
		$resultat4 = mysql_fetch_array($moyenne);
		$resultat5 = mysql_fetch_array($note);
		$resultat6 = mysql_fetch_array($intitule);
		$resultat7 = mysql_fetch_array($commentaire);
		$resultat8 = mysql_fetch_array($nbDevoir);

				// Affichage des lignes du tableau contenant les variables
				echo "<tr><td><form id='matiere' action='matiere.php' method='post'>";
				echo "<input type='hidden' name='matiere' value='" ;
				echo utf8_encode($resultat1['nomMatiere']); 
				echo "'/><input type='submit' value='";
				echo utf8_encode($resultat1['nomMatiere']); 
				echo "' /></form>" ;
				echo "</td><td>";
				echo $resultat1['moyenne'];
				echo "</td><td></td><td></td><td>";
				echo $resultat2['moyenne'];
				echo "</td><td>";
				echo utf8_encode($resultat3['appreciation']);
				echo "</td></tr><tr><td></td><td></td><td>";
				echo utf8_encode($resultat6['intitule']);
				echo "</td><td>";
				echo $resultat5['note'];
				echo "</td><td>";
				echo $resultat4['moyenne'];
				echo "</td><td>";
				echo utf8_encode($resultat7['commentaire']);
				echo "</td></tr>";

					// Tant qu'il reste des lignes dans la requête nbDevoir qui affiche tout les devoirs	
					while (mysql_fetch_array($nbDevoir) != NULL)  {
					// Exécution des requêtes dans une variable
					$resultat4 = mysql_fetch_array($moyenne);
					$resultat5 = mysql_fetch_array($note); 
					$resultat6 = mysql_fetch_array($intitule);
					$resultat7 = mysql_fetch_array($commentaire);
					$resultat8 = mysql_fetch_array($nbDevoir);

					// Affichage des lignes du tableau contenant les variables
					echo "<tr><td></td><td></td><td>";
					echo utf8_encode($resultat6['intitule']);
					echo "</td><td>";
					echo $resultat5['note'];
					echo "</td><td>";
					echo $resultat4['moyenne'];
					echo "</td><td>";
					echo utf8_encode($resultat7['commentaire']);
					echo "</td></tr>";
				}
			}
}
?> //