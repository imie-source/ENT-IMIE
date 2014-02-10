<?php

/*	Fonction qui prend pour argument un tableau généré par la base de donnée
	ainsi qu'une url avec query string de forme url/page?variable=
			ex : renvoieUneListe($monTableau, "../php/page?classe=");
*/

function renvoieUneListe ($tableauBDD, $urlQuery) {
		//Créé la liste
		$result="<ul>\n";
		//Boucle pour dérouler tous les éléments du tableau
		/* $nbElements=count($tableauBDD);
		for ($i=0; $i<$nbElements; $i++){ */
		foreach ($tableauBDD as $value) {
			//un élément de la liste
			$result.="\t<li>\n";
			//renvoie quelque chose comme : <a href="../php/page?classe=test"</a>
			$result.="\t\t<a href=\"".$urlQuery.$value."\">".$value."</a>\n";
			$result.="\t</li>\n";
		
		}
		$result.='</ul>';
		return $result;
	}
?>