
<?php
	session_start();
	include ("../config/connexionBDD.php");	
	
/**
	* cnxBase fait la connexion à la base de données avec le module PDO
	*
	* @return mixed Objet PDO ou Chaîne de caractères décrivant l'erreur
 */
function cnxBase() {
	/* Rendre visible dans la fonction les variables "globales" du script */
	global $hote, $port, $utilisateur, $motdepasse, $nomBase;
	
	/* Connexion à la base de données */
	// Définition du DSN : Data Source Name
	$dsn = "mysql:host=$hote;port=$port;dbname=$nomBase";
	// Tentative de connexion à la base en instanciant une classe PDO
	try {
		// Création de l'instance de la classe PDO avec les paramètres de cnx
		$cnxPDO = new PDO($dsn, $utilisateur, $motdepasse);
	} catch(PDOException $exception) {
		/* En cas d'erreur, le constructeur de la classe PDO lève une exception
		   de type PDOException que l'on capture et qui est placée dans
		   la variable $exception */
		// Renvoie le message décrivant l'erreur
		return $exception->getMessage();
	}
	// Renvoie l'objet créé
	return $cnxPDO;
}

/**
	*connexion permet d'authentifier la connexion d'un utilisateur
	*
	*Après authentification, la fonction permet de charger les informations utilisateur utiles
	*à l'application dans $_SESSION
*/	
function connexion() {

	// On regarde si l'utilisateur a bien utilisé le module de connexion pour traiter les données.
	if(isset($_POST["formCo"])){
			//On récupère les infos utilisateur
			$tabRes=request(GET_UTILISATEUR);
			
			// Si le mot de passe entré est OK avec son login         
			if($_POST["pass"] == $tabRes[0]["mp"]){
						
				$_SESSION['id']=$tabRes[0]["idUtilisateur"];
				$_SESSION["login"]=$_POST["pseudo"];
				$_SESSION["pass"]=$_POST["pass"];
				$_SESSION['nom']=$tabRes[0]["nom"];
				$_SESSION['prenom']=$tabRes[0]["prenom"];
				$_SESSION['statut']=$tabRes[0]["libelleStatut"];
				//Renvoie au menu
				header('location: menu.php');
						
				} 
	//si le POST n'esxiste pas
	erreur(ERREUR_POST);
}
   
/**
	*autorisationPage permet de définir si un utilisateur à le doit de charger la page. Si l'utilisateur n'a le droit de charger la page, un message lui indique.
	*
	*@param string $statutAutorise Définie le statut que doit posséder l'utilisateur pour accéder à la page
*/
function autorisationPage($statutAutorise) {
	
	if(isset($_SESSION['statut'])){
		if($statutAutorise!=$_SESSION['statut']) {
			$retourAccueil='<!DOCTYPE html>
							<html>
							<p>Vous n\'avez pas accès à cette page</p>
							<p><a href="index.php">Retour à l\'accueil</a></p>
							</html>';
			die($retourAccueil);	
		}
	} else {
		die ('Mais d\'où venez-vous ?');
	}
}

?>

