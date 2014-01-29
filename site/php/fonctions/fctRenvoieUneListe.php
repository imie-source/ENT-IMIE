<?php

/*	Fonction qui prend pour argument un tableau généré par la base de donnée
	ainsi qu'une url avec query string de forme url/page?variable=
			ex : renvoieUneListe($monTableau, "../php/page?classe=");
*/

function renvoieUneListe ($tableauBDD, $urlQuery) {
		//Créé la liste
		echo "<ul>\n";
		//Boucle pour dérouler tous les éléments du tableau
		/* $nbElements=count($tableauBDD);
		for ($i=0; $i<$nbElements; $i++){ */
		foreach ($tableauBDD as $value) {
			//un élément de la liste
			echo "\t<li>\n";
			//renvoie quelque chose comme : <a href="../php/page?classe=test"</a>
			echo "\t\t<a href=\"".$urlQuery.$value."\">".$value."</a>\n";
			echo "\t</li>\n";
		
		}
		echo '</ul>';
	}
?>