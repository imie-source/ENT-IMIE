<?php

/* Indique au serveur php de renvoyer de l'utf8 */
header( 'content-type: text/html; charset=utf-8' );

/* Inclusion des fonctions utiles à la connexion à la base de donnée */
include('connexion.inc.php');

/* Inclusion des constantes utiles aux fonctions */
include('constantes.inc.php');
include('requetes.inc.php');

/**
	*renvoieUneListe renvoie une liste html
	*
	*Elle prend pour argument un tableau généré par la base de donnée
	*ainsi qu'une url avec query string de forme url/page?variable=
	*		ex : renvoieUneListe($monTableau, "../php/page?classe=");
	*
	*@param array $tableauBDD Tableau contenant la liste des élèves d'une classe
	*@param string $urlQuery Chaîne de caractères qui est une url avec le début d'une query string
	*@return string Liste en HTML de type ul avec des liens gros et centrés, nécessite knacss
*/
function renvoieUneListe ($tableauBDD, $urlQuery) {
		//Créé la liste
		$result='<ul class = "unstyled ">'."\n";
		//Boucle pour dérouler tous les éléments du tableau
		/* $nbElements=count($tableauBDD);
		for ($i=0; $i<$nbElements; $i++){ */
		foreach ($tableauBDD as $value) {
			//un élément de la liste
			$result.="\t<li class = \"bigger mbm txtcenter\">\n";
			//renvoie quelque chose comme : <a href="../php/page?classe=test"</a>
			$result.="\t\t<a href=\"".$urlQuery.$value."\">".$value."</a>\n";
			$result.="\t</li>\n";
		
		}
		$result.='</ul>';
		return $result;
	}
	
/**
	*listeOption renvoie une suite d'<option> en HTML
	*
	*listeOption prend pour argument un tableau et renvoie les éléments
	*de ce tableau dans une suite de '<option>' avec pour value l'élément du
	*tableau
	*		ex : listeOption($tableau);
	*		--> <option value="valeur01">Valeur 01</option>
	*			<option value="valeur02">Valeur 02</option>
	*
	*@param array $tableau
	*@return string Suite d'instructions en HTLM de type <option>
*/
function listeOption ($tableau) {
	$result='';
	foreach($tableau as $value){
		$result.='<option value="'.$value.'">'.$value."</option>\n";
	}
	return $result;
	}
	
/**
	*erreur prend pour argument un type d'erreur et renvoie un string contenant du code HTML pour afficher l'erreur
	*
	*@param constant $typeErreur Type d'erreur définies dans constantes.inc.php
	*@return string Code HTML pour afficher l'erreur sous forme de pop-up javascript
*/
function erreur($typeErreur){
	switch($typeErreur){
		case 1:
			$erreur='Problème de connexion à la base de données.';
			break;
		case 2:
			$erreur='Mauvais identifiant ou mot de passe.';
			break;
		case 3:
			$erreur='Erreur lors de l\'envoi du formulaire, veuillez ressaisir les données.';
			break;
		case 4:
			$erreur='Erreur lors de la requête dans la base de donnée';
			break;
	}
	return '<script type="text/javascript" language="javascript">alert(\''.$erreur.'\');</script>';

}

function request($requete, $id){
	//Connexion à la BDD
	$cnx = cnxBase ();
	// S'il y a un problème de connexion on renvoie l'erreur
	if (is_string($cnx)) {
		erreur(ERREUR_CONNEXION_BDD);
	}
	$sql=$requete.$id;
	$result=$cnx->query($sql);
	$tabRes=$result->fetchAll(PDO::FETCH_ASSOC);
	
	if($tabRes!=false){
		return $tabRes;
	} else {
		erreur(ERREUR_REQUETE);
	}
}
?>