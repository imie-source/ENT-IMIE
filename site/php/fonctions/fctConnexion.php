
<?php

function connexion()	{
		
	include ("../config/connexionBDD.php");	
	$msgErreur ='<script type="text/javascript" language="javascript">alert(\'Identifiant ou Mot de Passe incorrect\');</script>';

// On met les variables utilisés du script PHP à FALSE.


$connexionOK = FALSE;

// On regarde si l'utilisateur a bien utilisé le module de connexion pour traiter les données.
if(isset($_POST["formCo"])){
   
   // On regarde si tout les champs sont remplis. Sinon on lui affiche un message d'erreur.   
	if(empty($_POST['pseudo']) && empty($_POST['pass']))	{
      
      $error = TRUE;
      
      echo "$msgErreur";
      
   }
   
   // Sinon si tout les champs sont remplis alors on regarde si le nom de compte rentré existe bien dans la base de données.
   else{
      
      $sql = "SELECT login FROM utilisateur WHERE login = '".$_POST["pseudo"]."' ";
      
      $req = mysql_query($sql);
      
      // Si oui, on continue le script...      
      if($sql){
         
         // On sélectionne toute les données de l'utilisateur dans la base de données.   
         $sql = "SELECT * FROM utilisateur WHERE login = '".$_POST["pseudo"]."' ";
      
         $req = mysql_query($sql);
         
         // Si la requête SQL c'est bien passé...      
         if($sql){
         
            // On récupère toute les données de l'utilisateur dans la base de données.
            $donnees = mysql_fetch_assoc($req);
            
            // Si le mot de passe entré à la même valeur que celui de la base de données, on l'autorise a se connecter...         
            if($_POST["pass"] == $donnees["mp"]){
            
               $connexionOK = TRUE;
               
               $connexionMSG = "Connexion au site réussie. Vous êtes désormais connecté !";
              
               $_SESSION["login"] = $_POST["pseudo"];
               $_SESSION["pass"] = $_POST["pass"];
			$sql = mysql_query("SELECT statut.libelleStatut FROM utilisateur_has_statut, utilisateur, statut WHERE Utilisateur.idUtilisateur = utilisateur_idUtilisateur AND statut_idStatut = statut.idStatut AND login = '".$_POST["pseudo"]."' ");
			$req = mysql_fetch_array($sql);

	switch($req["libelleStatut"])	{
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
            
               $error = TRUE;
            
               
            
            }
         
         }
         
         // Sinon on lui affiche un message d'erreur.      
         else{
         
            $error = TRUE;
         
            echo "$msgErreur";
         
         }
      
      }
      
      // Sinon on lui affiche un message d'erreur.      
      }else{
         
         $error = TRUE;
         
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

