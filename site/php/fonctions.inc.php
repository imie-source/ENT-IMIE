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
	*listeOption prend pour argument un tableau associatif avec un champ contenant l'id de la donnée et un aute champ sa valeur
	*Elle renvoie les éléments de ce tableau dans une suite de '<option>' avec pour value l'id et affiche la valeur
	*tableau
	*		ex : listeOption($tableau, $keyId, $keyValue);
	*		--> <option value="1">Valeur 01</option>
	*			<option value="2">Valeur 02</option>
	*
	*@param array $tableau
	*@param string $keyId Clef du champ de l'identifiant de la donnée à afficher
	*@param string $keyValue Clef du champ de la valeur de la donnée à afficher
	*@return string Suite d'instructions en HTLM de type <option>
*/
function listeOption ($tableau, $keyId, $keyValue) {
	$result='';
	$c=count($tableau);
	for($i=0; $i<$c; $i++){
		$result.='<option value="'.$tableau[$i][$keyId].'">'.$tableau[$i][$keyValue]."</option>\n";
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

/**
	*request prend comme argument la constante qui définie sa requête ainsi que les id nécessaires à celle-ci
	*
	*Les différentes requêtes sont stockées et documentées dans requetes.inc.php.
	*La fonction renvoie un tableau associatif ou une erreur
	*
	*@param string $requete Constante définie dans requetes.inc.php
	*@param integer $id0 Un id
	*@return mixed Retourne un tableau associatif si tout va bien
*/
function request($requete, $id0, $id1='' ,$id2='' , $id3='', $id4='', $id5=''){
	
	//Connexion à la BDD
	$cnx = cnxBase ();
	// S'il y a un problème de connexion on renvoie l'erreur
	if (is_string($cnx)) {
		die(erreur(ERREUR_CONNEXION_BDD));
	}
	
	/* PREPARATION DE LA REQUETE */
	
	//Récupération des éléments entre les ID dans un tableau
	$tabRequete=explode('~',$requete);
	
	//Insertion des ID dans la requête
	$sql='';
	$c=count($tabRequete);
	for($i=0; $i<$c; $i++){
		$v='id'.$i;
		$sql.=$tabRequete[$i].${$v};
	}

	//Récupération du premier terme de la requête qui définira le type de requête
	$type=explode(" ",$sql);
	$type=strtoupper(array_shift($type));
	
	/* EXECUTION DE LA REQUETE */
	
	//On créer l'exécution en fonction du type de la requête
	switch($type){
		case 'SELECT':
			$result=$cnx->query($sql);
			if($result!=false){
				//Affectation du résultat dans un tableau associatif
				$tabRes=$result->fetchAll(PDO::FETCH_ASSOC);
				
				//Si tout va bien on retourne sinon erreur
				if($tabRes!=false){
					return $tabRes;
				}
			}
			break;
		case 'INSERT':
			$result=$cnx->exec($sql);
				if ($result==false){
					die(erreur(ERREUR_REQUETE));
				}
			break;
		default:
			die(erreur(ERREUR_REQUETE));
	}

}


?>