<?php

function renvoieListeEleve ($listeE) {

		// Connexion à la base de donnée
		$db = mysql_connect("10.3.0.245", "ENT", "ent");
		mysql_select_db("ENT");

		echo '<form action="bulletin.php" method=POST>';
		echo '<select name="eleve">';

		//Requète, exécution et création du jeu d'enregistrement contenant la liste des élèves
		$requete = "SELECT idUtilisateur, prenom, nom FROM utilisateur; ";
		$result  = mysql_query($requete,$db);
		$listeEleve = mysql_fetch_array($result);
			
		//Boucle sur la liste
		while ($listeEleve!=FALSE) {
			$idEleve = $listeEleve['idUtilisateur'];
			$prenom = $listeEleve['nom'];
			$nom = $listeEleve['prenom'];

			echo '<OPTION selected="selected" VALUE="';
			echo $idEleve; 
			echo '">';
			echo $prenom;
			$listeEleve = mysql_fetch_array($result);
		}

		echo "</select>";
		echo '<input type="submit" value="Sélectionner" />';
		echo "</form>";

}

?>