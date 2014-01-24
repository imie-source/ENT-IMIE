<?php
session_start ();
	function connexion()	{
		$msgErreur ='<script type="text/javascript" language="javascript">alert(\'Identifiant ou Mot de Passe incorrect\');</script>';
		
		// Si le formulaire a été envoyer
		if(isset($_POST['formCo']))	{
		
			//Si le pseudo et le mot de passe a été rentrer
			if(!empty($_POST['pseudo']) && !empty($_POST['pass']))	{
			
				//Requête pour récupérer le pseudo
				/*$requete= ("SELECT nom, prenom, email FROM eleve WHERE email = '" .$_POST['pseudo']. "' ");
				$result= mysql_query ($requete, $db);
				//Si on a un résultat
				if(mysql_num_rows($requete) == 1)	{
					$utilisateur = mysql_fetch_object($requete, $result);*/
						if (($_POST['pseudo'] == "Gudule") && ($_POST['pass'] == "1234"))		{
					
						//On vérifie le mot de passe
						/*if(md5($_POST['pass']) == $pseudo ->nomEleve ||  $pseudo ->nomformateur)	{ */
						
							//Connexion réussi
							//Lancement de la séssion
						
							
							
						/*if ($utilisateur = > "1000")	{
							header('location: formateur/menu.php');
						}	else	{*/					
																  
						} else {
							echo $msgErreur;
							die();
						}           							                         
			} else {
					echo $msgErreur;
					die();
			}
			$statut = 'formateur';
			switch ($statut)	{
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
	?>