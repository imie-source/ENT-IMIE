<?php

	function connexion()	{

	// Si le formulaire a �t� envoyer
	if(isset($_POST['formCo']))	{
	
		//Si le pseudo et le mot de passe a �t� rentrer
		if(!empty($_POST['pseudo']) && !empty($_POST['pass']))	{
		
			//Requ�te pour r�cup�rer le pseudo
			/*$requete= ("SELECT nom, prenom, email FROM eleve WHERE email = '" .$_POST['pseudo']. "' ");
			$result= mysql_query ($requete, $db);
			//Si on a un r�sultat
			if(mysql_num_rows($requete) == 1)	{
				$utilisateur = mysql_fetch_object($requete, $result);*/
					if ($_POST['pseudo'] == "Gudule")	{
				
					//On v�rifie le mot de passe
					/*if(md5($_POST['pass']) == $pseudo ->nomEleve ||  $pseudo ->nomProf)	{ */
					if ($_POST['pass'] == "1234")	{
					
						//Connexion r�ussi
						//Lancement de la s�ssion
						
						session_start ();
						$_SESSION['id'] = $utilisateur->id;
						$_SESSION['pseudo']= $pseudo->id;
						$_SESSION['nom']=$result;
						$_SESSION['prenom']=$result;
						
					/*if ($utilisateur = > "1000")	{
						header('location: formateur/menu.php');
					}	else	{*/
						header('location: menu.php');
				    } else {
                        echo '<script type="text/javascript" language="javascript">alert(\'ID ou mp incorrect\');</script>';
                    }
 
                } else {
                    echo 'Ce pseudo n\'existe pas dans notre base.';
                }
            } else {
                echo 'Vous devez remplir tous les champs !';
            }
        }
    }
	?>