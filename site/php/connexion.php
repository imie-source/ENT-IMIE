<?php

	function connexion()	{
	include ("../config/connexionBDD.php")
	// Si le formulaire a été envoyer
	if(isset($_POST['formCo']))	{
	
		//Si le login et le mot de passe a été rentrer
		if(!empty($_POST['login']) && !empty($_POST['pass']))	{
		
			//Requête pour récupérer le login
			$requete= ("SELECT nom, prenom, email FROM eleve WHERE email = '" .$_POST['login']. "' ");
			$result= mysql_query ($requete, $db);
			//Si on a un résultat
			if(mysql_num_rows($requete) == 1)	{
				$utilisateur = mysql_fetch_object($requete, $result);
				
					//On vérifie le mot de passe
					if(md5($_POST['pass']) == $login ->nomEleve ||  $login ->nomProf)	{
					
						//Connexion réussi
						//Lancement de la séssion
						
						session_start ();
						$_SESSION['id'] = $utilisateur->id;
						$_SESSION['login']= $login->id;
						$_SESSION['nom']=$result;
						$_SESSION['prenom']=$result;
						
					if ($utilisateur = > "1000")	{
						header('location: formateur/menu.php');
					}	else	{
						header('location: stagiaire/menu.php');
				    } else {
                        echo 'Mauvais mot de passe pour cet utilisateur.';
                    }
 
                } else {
                    echo 'Ce login n\'existe pas dans notre base.';
                }
            } else {
                echo 'Vous devez remplir tous les champs !';
            }
        }
    }
	?>