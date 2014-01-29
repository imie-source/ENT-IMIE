<?php
	
	function tableauSaisie($tableauEleve){
		foreach ($tableauEleve as $value){
			echo "<tr>\n";
			echo "\t<th>" . $value . "</th>\n";
			echo "\t<th><input type=\"text\"/></th>\n";
			echo "\t<th><input type=\"text\"/></th>\n";
			echo "</tr>\n";
		}
	}
	
	$titrePage = "Saisie des notes";
	$eleves = ["Michel", "françis", "marion", "antoine", "Gudule"];
	
	include("../html/header.html");
	include("../html/formateur/saisie_notes.html");
	include("../html/footer.html");

?>