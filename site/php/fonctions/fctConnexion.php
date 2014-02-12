
<?php
	include ("../config/connexionBDD.php");	
	
	/**
	 * Connexion à la base de données avec le module PDO
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
	
function connexion()	{

	
	$msgErreur ='<script type="text/javascript" language="javascript">alert(\'Identifiant ou Mot de Passe incorrect\');</script>';


// On regarde si l'utilisateur a bien utilisé le module de connexion pour traiter les données.
if(isset($_POST["formCo"])){
   
   // On regarde si tout les champs sont remplis. Sinon on lui affiche un message d'erreur.   
	if(empty($_POST['pseudo']) || empty($_POST['pass']))	{
      echo "$msgErreur";
   }
   
   // Sinon si tout les champs sont remplis alors on regarde si le nom de compte rentré existe bien dans la base de données.
   else{
      $cnx = cnxBase ();
	  	// S'il y a un problème de connexion on renvoie l'erreur
		if (is_string($cnx)) {
			return $cnx;
		}
		
      $sql = "SELECT login FROM utilisateur WHERE login = '".$_POST["pseudo"]."' ";
      $result = $cnx->query($sql);

      // Si oui, on continue le script...      
      if(false!==$result){
         
        // On sélectionne toute les données de l'utilisateur dans la base de données.   
        $sql = "SELECT * FROM utilisateur WHERE login = '".$_POST["pseudo"]."' ";
		$result = $cnx->query($sql);
		// On récupère toute les données de l'utilisateur dans la base de données.
        $tabRes = $result->fetchAll(PDO::FETCH_ASSOC);
         
         // Si la requête SQL c'est bien passé...      
         if(false!==$result){
            
            // Si le mot de passe entré à la même valeur que celui de la base de données, on l'autorise a se connecter...         
            if($_POST["pass"] == $tabRes[0]["mp"]){
                      
              
               $_SESSION["login"] = $_POST["pseudo"];
               $_SESSION["pass"] = $_POST["pass"];
			   
			$sql = "SELECT statut.libelleStatut FROM utilisateur_has_statut, utilisateur, statut WHERE Utilisateur.idUtilisateur = utilisateur_idUtilisateur AND statut_idStatut = statut.idStatut AND login = '".$_POST["pseudo"]."' ";
			$result = $cnx->query($sql);
			$tabRes = $result->fetchAll(PDO::FETCH_ASSOC);

	switch($tabRes[0]["libelleStatut"])	{

				case "formateur":
								$_SESSION['nom']="Coudé";
								$_SESSION['prenom']="Serge";
								$_SESSION['matiere']="Dev";
								$_SESSION['statutParticulier']="Formateur";			
								$_SESSION['statut']="formateur";

								header('location: menu.php');
					break;
				case "stagiaire":
								$_SESSION['nom']="Durand";
								$_SESSION['prenom']="Gudule";
								$_SESSION['statut']="stagiaire";								
								$_SESSION['centreFormation']="Rennes";
								$_SESSION['session']="2013";
								$_SESSION['cursus']="IT START";
								
								header('location: menu.php');
					break;
				default:
					echo "Qui êtes vous ??";
				
			}
		}
    }
            
            // Sinon on lui affiche un message d'erreur.
            else{
            
			   echo "$msgErreur";
        
            }
         
         }
         
         // Sinon on lui affiche un message d'erreur.      
         else{

         
            echo "$msgErreur";
         
         }
      
      }
      
      // Sinon on lui affiche un message d'erreur.      
      }else{
         echo "$msgErreur";
      }
   
   }
   





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

