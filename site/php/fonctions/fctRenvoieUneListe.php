<?php

/*	Fonction qui prend pour argument un tableau généré par la base de donnée
	ainsi qu'une url avec query string de forme url/page?variable=
			ex : renvoieUneListe($monTableau, "../php/page?classe=");
*/

function renvoieUneListe ($tableauBDD, $urlQuery) {
		//Créé la liste
		echo "<ul>\n";
		//Boucle pour dérouler tous les éléments du tableau
		for ($i=0; $i<count($tableauBDD); $i++){
			//un élément de la liste
			echo "\t<li>\n";
			//renvoie quelque chose comme : <a href="../php/page?classe=test"</a>
			echo "\t\t<a href=\"".$urlQuery.$tableauBDD[$i]."\">".$tableauBDD[$i]."</a>\n";
			echo "\t</li>\n";
		
		}
		echo '</ul>';
	}
?>