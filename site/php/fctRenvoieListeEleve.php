<?php

function renvoieListeEleve ($listeE) {

		$db = mysql_connect("localhost", "root", "");
		mysql_select_db("imie");

		echo '<form action="bulletin.php" method=POST>';
		echo '<select name="eleve">';

		//Requète, exécution et création du jeu d'enregistrement
		$requete = "SELECT idEleve, prenom, nom FROM eleve; ";
		$result  = mysql_query($requete,$db);
		$listeEleve = mysql_fetch_array($result);
			
		//Boucle sur la liste
		while ($listeEleve!=FALSE) {
			$idEleve = $listeEleve['idEleve'];
			$prenom = $listeEleve['nom'];
			$nom = $listeEleve['prenom'];

			echo '<OPTION VALUE="';
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