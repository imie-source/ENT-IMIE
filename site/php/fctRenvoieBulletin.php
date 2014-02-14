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
		$moyenne = mysql_query ("SELECT ROUND(AVG(note),2) AS moyenne FROM devoir, note, matiere WHERE note.idDevoir = devoir.idDevoir AND note.idMatiere = matiere.idMatiere AND nomMatiere = '".$resultat1['nomMatiere']."' GROUP BY devoir.idDevoir ;");
		$note = mysql_query ("SELECT note FROM matiere, note, devoir, eleve WHERE note.idDevoir = devoir.idDevoir AND note.idEleve = eleve.idEleve AND note.idMatiere = matiere.idMatiere AND nomMatiere = '".$resultat1['nomMatiere']."' AND eleve.idEleve =  '".$eleve."'; ");
		$intitule = mysql_query ("SELECT intitule FROM devoir, note, matiere, eleve WHERE note.idDevoir = devoir.idDevoir AND note.idMatiere = matiere.idMatiere AND note.idEleve = eleve.idEleve AND eleve.idEleve = '".$eleve."' AND nomMatiere = '".$resultat1['nomMatiere']."' GROUP BY devoir.idDevoir ;");
		$commentaire = mysql_query ("SELECT commentaire FROM devoir, note, matiere, eleve WHERE note.idDevoir = devoir.idDevoir AND note.idMatiere = matiere.idMatiere AND note.idEleve = eleve.idEleve AND eleve.idEleve = '".$eleve."' AND nomMatiere = '".$resultat1['nomMatiere']."' GROUP BY devoir.idDevoir ;");
		$nbDevoir = mysql_query("SELECT intitule FROM matiere, devoir, eleve, note WHERE note.idMatiere = matiere.idMatiere AND note.idDevoir = devoir.idDevoir AND eleve.idEleve = '3' AND matiere.nomMatiere = '" . $resultat1['nomMatiere'] . "' ");
		$nbMatiere = mysql_query("SELECT matiere.idMatiere FROM matiere, note, eleve WHERE matiere.idMatiere = note.idMatiere AND note.idEleve = eleve.idEleve AND eleve.idEleve = '".$eleve."' GROUP BY matiere.idMatiere");
		
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
				$moyenne = mysql_query ("SELECT ROUND(AVG(note),2) AS moyenne FROM devoir, note, matiere WHERE note.idDevoir = devoir.idDevoir AND note.idMatiere = matiere.idMatiere AND nomMatiere = '".$resultat1['nomMatiere']."' GROUP BY devoir.idDevoir ;");
				$note = mysql_query ("SELECT note FROM matiere, note, devoir, eleve WHERE note.idDevoir = devoir.idDevoir AND note.idEleve = eleve.idEleve AND note.idMatiere = matiere.idMatiere AND nomMatiere = '".$resultat1['nomMatiere']."' AND eleve.idEleve =  '".$eleve."'; ");
				$intitule = mysql_query ("SELECT intitule FROM devoir, note, matiere, eleve WHERE note.idDevoir = devoir.idDevoir AND note.idMatiere = matiere.idMatiere AND note.idEleve = eleve.idEleve AND eleve.idEleve = '".$eleve."' AND nomMatiere = '".$resultat1['nomMatiere']."' GROUP BY devoir.idDevoir ;");
				$commentaire = mysql_query ("SELECT commentaire FROM devoir, note, matiere, eleve WHERE note.idDevoir = devoir.idDevoir AND note.idMatiere = matiere.idMatiere AND note.idEleve = eleve.idEleve AND eleve.idEleve = '".$eleve."' AND nomMatiere = '".$resultat1['nomMatiere']."' GROUP BY devoir.idDevoir ;");
				$nbDevoir = mysql_query("SELECT intitule FROM matiere, devoir, eleve, note WHERE note.idMatiere = matiere.idMatiere AND note.idDevoir = devoir.idDevoir AND eleve.idEleve = '3' AND matiere.nomMatiere = '" . $resultat1['nomMatiere'] . "' ");
				
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