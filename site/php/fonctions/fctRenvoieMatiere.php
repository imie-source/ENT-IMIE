<?php

/*	Fonction qui prend pour argument un tableau généré par la base de donnée
	ainsi qu'une url avec query string de forme url/page?variable=
			ex : renvoieUneListe($monTableau, "../php/page?classe=");
*/

function renvoieUneMatiere ($tableauBDD) {
		foreach ($tableauBDD as $value) {
		echo "<div>" .$devoir. "</div>";
		echo "<div>note</div>";
		echo "<div>".$noteDevoir. "</div>";
		echo "<div>moy classe</div>";
		echo "<div>" .$moyenneDevoir. "</div>"; 	 
			
			echo "<div>";
				
		echo "<p>" .$commentaireDevoir."</p>";
				
				echo "<div>";
					echo '<form action="../media/corrige.pdf">';
						echo '<input type="submit" value="Correction" />';
					echo "</form>";
					echo '<form action="../media/sujet.pdf">';
						echo '<input type="submit" value="Sujet" />';
					echo "</form>";
				echo "</div>";
			echo "</div>";
			
		echo "</div>";
		}
	}
?>		
		