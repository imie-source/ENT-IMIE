<?php

/*
	Fonction qui prend pour argument un tableau et renvoie les éléments
	de ce tableau dans une suite de <option> avec pour value l'élément du
	tableau
		ex : listeOption($tableau);
			--> <option value="valeur01">Valeur 01</option>
				<option value="valeur02">Valeur 02</option>
*/

function listeOption ($tableau) {
		foreach($tableau as $value){
			echo '<option value="'.$value.'">'.$value."</option>\n";
		}
	}
	
?>