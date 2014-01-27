<!DOCTYPE html>
<?php

/* Connect to the MySQL database */
$db = mysql_connect("localhost", "root", "");
mysql_select_db("imie");

?>

<html>

  <head>
    <meta charset="UTF-8">
    <title>Création de devoirs</title>
    <!-- <link rel="stylesheet" type="text/css" href="../css/cssDefault.css"> -->
  </head>
  <body>
	<header>
		<div>
			<a href="menu.html"><img src="../img/logo.jpg" alt="retour au menu principal"/></a>
		</div>
		<!-- Les infos profs seront définies en php-->
		<p>'Serge Dupond'</p> <!--Clic : menu pour déconnexion-->
		<p>'Développement JAVA'</p>
		<p>'Responsable pédagogique'</p>
	</header>
	<div>
		
		<h1>Création d'un devoir</h1>
		
		<ul>
			<!-- toutes les infos matières et classes affichées dépendent du prof -->
			<form action="test.php" method="POST" >
				<li>
				
			<!--ouvre un popup pour rentrer la date proprement-->
			<link rel="stylesheet" typePreview post="text/css" href="calendrier/demos.css">
			<link rel="stylesheet" type="text/css" href="calendrier/jquery-ui.css">
			<script src="js/jquery-1.5.1.js"></script>
			<script src="js/jquery.ui.core.js"></script>
			<script src="js/jquery.ui.widget.js"></script>
			<script src="js/jquery.ui.datepicker.js"></script>
	
<script>
	$(function() {
		$( "#datepicker" ).datepicker();
		$( "#datepicker" ).datepicker( "option", "dateFormat", "yy-mm-dd");
	});
</script>

<div style="width:500px; height:auto; font-size:small;">
	<div class="demo">
				<p>Date :<input type="text" id="datepicker">
				</p>
	</div>
</div>

				</li>

				<li>
<?php
//Requête, exécution et création du jeu d'enregistrement
$requete = "SELECT idMatiere, nomMatiere FROM matiere WHERE idMatiere='1'; ";
$result  = mysql_query($requete,$db);
$matieres = mysql_fetch_array($result);	

   //Boucle sur la liste
	while ($matieres!=FALSE)
	{
		$mat=$matieres['nomMatiere'];
		$matiere=$matieres['idMatiere'];

?>
						<input type="radio" name="matiere" value="<?php echo $matiere; ?>" /><?php echo $mat; ?>
<?php
		$matieres=mysql_fetch_array($result);
	}
?>
<br/>
<?php
//Requête, exécution et création du jeu d'enregistrement
$requete = "SELECT idMatiere, nomMatiere FROM matiere WHERE idMatiere='2'; ";
$result  = mysql_query($requete,$db);
$matieres = mysql_fetch_array($result);	

   //Boucle sur la liste
	while ($matieres!=FALSE)
	{
		$mat=$matieres['nomMatiere'];
		$matiere=$matieres['idMatiere'];

?>
						<input type="radio" name="matiere" value="<?php echo $matiere; ?>" /><?php echo $mat; ?>
<?php
		$matieres=mysql_fetch_array($result);
	}
?>
<br/>
<?php
//Requête, exécution et création du jeu d'enregistrement
$requete = "SELECT idMatiere, nomMatiere FROM matiere WHERE idMatiere='3'; ";
$result  = mysql_query($requete,$db);
$matieres = mysql_fetch_array($result);	

   //Boucle sur la liste
	while ($matieres!=FALSE)
	{
		$mat=$matieres['nomMatiere'];
		$matiere=$matieres['idMatiere'];

?>
						<input type="radio" name="matiere" value="<?php echo $matiere; ?>" /><?php echo $mat; ?>
<?php
		$matieres=mysql_fetch_array($result);
	}
?>
<br/>
<?php
//Requête, exécution et création du jeu d'enregistrement
$requete = "SELECT idMatiere, nomMatiere FROM matiere WHERE idMatiere='4'; ";
$result  = mysql_query($requete,$db);
$matieres = mysql_fetch_array($result);	

   //Boucle sur la liste
	while ($matieres!=FALSE)
	{
		$mat=$matieres['nomMatiere'];
		$matiere=$matieres['idMatiere'];

?>
						<input type="radio" name="matiere" value="<?php echo $matiere; ?>" /><?php echo $mat; ?>
<?php
		$matieres=mysql_fetch_array($result);
	}
?>
<br/>
<?php
//Requête, exécution et création du jeu d'enregistrement
$requete = "SELECT idMatiere, nomMatiere FROM matiere WHERE idMatiere='5'; ";
$result  = mysql_query($requete,$db);
$matieres = mysql_fetch_array($result);	

   //Boucle sur la liste
	while ($matieres!=FALSE)
	{
		$mat=$matieres['nomMatiere'];
		$matiere=$matieres['idMatiere'];

?>
						<input type="radio" name="matiere" value="<?php echo $matiere; ?>" /><?php echo $mat; ?>
<?php
		$matieres=mysql_fetch_array($result);
	}
?>
<br/>
<?php
//Requête, exécution et création du jeu d'enregistrement
$requete = "SELECT idMatiere, nomMatiere FROM matiere WHERE idMatiere='6'; ";
$result  = mysql_query($requete,$db);
$matieres = mysql_fetch_array($result);	

   //Boucle sur la liste
	while ($matieres!=FALSE)
	{
		$mat=$matieres['nomMatiere'];
		$matiere=$matieres['idMatiere'];

?>
						<input type="radio" name="matiere" value="<?php echo $matiere; ?>" /><?php echo $mat; ?>
<?php
		$matieres=mysql_fetch_array($result);
	}
?>
<br/>
<?php
//Requête, exécution et création du jeu d'enregistrement
$requete = "SELECT idMatiere, nomMatiere FROM matiere WHERE idMatiere='7'; ";
$result  = mysql_query($requete,$db);
$matieres = mysql_fetch_array($result);	

   //Boucle sur la liste
	while ($matieres!=FALSE)
	{
		$mat=$matieres['nomMatiere'];
		$matiere=$matieres['idMatiere'];

?>
						<input type="radio" name="matiere" value="<?php echo $matiere; ?>" /><?php echo $mat; ?>
<?php
		$matieres=mysql_fetch_array($result);
	}
?>
<br/>
<?php
//Requête, exécution et création du jeu d'enregistrement
$requete = "SELECT idMatiere, nomMatiere FROM matiere WHERE idMatiere='8'; ";
$result  = mysql_query($requete,$db);
$matieres = mysql_fetch_array($result);	

   //Boucle sur la liste
	while ($matieres!=FALSE)
	{
		$mat=$matieres['nomMatiere'];
		$matiere=$matieres['idMatiere'];

?>
						<input type="radio" name="matiere" value="<?php echo $matiere; ?>" /><?php echo $mat; ?>
<?php
		$matieres=mysql_fetch_array($result);
	}
?>
<br/>
<?php
//Requête, exécution et création du jeu d'enregistrement
$requete = "SELECT idMatiere, nomMatiere FROM matiere WHERE idMatiere='9'; ";
$result  = mysql_query($requete,$db);
$matieres = mysql_fetch_array($result);	

   //Boucle sur la liste
	while ($matieres!=FALSE)
	{
		$mat=$matieres['nomMatiere'];
        $matiere=$matieres['idMatiere'];

?>
						<input type="radio" name="matiere" value="<?php echo $matiere; ?>" /><?php echo $mat; ?>
<?php
		$matieres=mysql_fetch_array($result);
	}
?>
<br/>
<?php
//Requête, exécution et création du jeu d'enregistrement
$requete = "SELECT idMatiere, nomMatiere FROM matiere WHERE idMatiere='10'; ";
$result  = mysql_query($requete,$db);
$matieres = mysql_fetch_array($result);	

   //Boucle sur la liste
	while ($matieres!=FALSE)
	{
		$mat=$matieres['nomMatiere'];
		$matiere=$matieres['idMatiere'];

?>
						<input type="radio" name="matiere" value="<?php echo $matiere; ?>" /><?php echo $mat; ?>
<?php
		$matieres=mysql_fetch_array($result);
	}
?>
<br/>
<br/>

				</li>
				<li>
<?php
//Requête, exécution et création du jeu d'enregistrement
$requete = "SELECT idClasse, cursus FROM classe WHERE idClasse='1'; ";
$result  = mysql_query($requete,$db);
$classes = mysql_fetch_array($result);	

   //Boucle sur la liste
	while ($classes!=FALSE)
	{
		$classe=$classes['cursus'];
		$class=$classes['idClasse'];

?>
						<input type="radio" name="classe" value="<?php echo $class; ?>" /><?php echo $classe; ?>
<?php
		$classes=mysql_fetch_array($result);
	}
?>
<br/>
<?php
//Requête, exécution et création du jeu d'enregistrement
$requete = "SELECT idClasse, cursus FROM classe WHERE idClasse='2'; ";
$result  = mysql_query($requete,$db);
$classes = mysql_fetch_array($result);	

   //Boucle sur la liste
	while ($classes!=FALSE)
	{
		$classe=$classes['cursus'];
	    $class=$classes['idClasse'];

?>
						<input type="radio" name="classe" value="<?php echo $class; ?>" /><?php echo $classe; ?>
<?php
		$classes=mysql_fetch_array($result);
	}
?>
<br/>
<?php
//Requête, exécution et création du jeu d'enregistrement
$requete = "SELECT idClasse, cursus FROM classe WHERE idClasse='3'; ";
$result  = mysql_query($requete,$db);
$classes = mysql_fetch_array($result);	

   //Boucle sur la liste
	while ($classes!=FALSE)
	{
		$classe=$classes['cursus'];
		$class=$classes['idClasse'];

?>
						<input type="radio" name="classe" value="<?php echo $class; ?>" /><?php echo $classe; ?>
<?php
		$classes=mysql_fetch_array($result);
	}
?>
<br/>
<?php
//Requête, exécution et création du jeu d'enregistrement
$requete = "SELECT idClasse, cursus FROM classe WHERE idClasse='4'; ";
$result  = mysql_query($requete,$db);
$classes = mysql_fetch_array($result);	

   //Boucle sur la liste
	while ($classes!=FALSE)
	{
		$classe=$classes['cursus'];
		$class=$classes['idClasse'];

?>
						<input type="radio" name="classe" value="<?php echo $class; ?>" /><?php echo $classe; ?>
<?php
		$classes=mysql_fetch_array($result);
	}
?>

                </li>
				<br/>
				<li>
					<input type="text" name="devoir" placeholder="Entrez l'intitulé du devoir..."/>
				</li>
				<li>
					<input type="submit" value="Valider"/><!-- afficher un pop-up pour confirmer la création du devoir
															avec récapitulatif des infos (matière, classe, intitulé) -->
				</li>
			</form>
		</ul>
		
	</div>
  </body>
</html>