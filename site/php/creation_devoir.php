<!DOCTYPE html>
<?php

/* Connect to the MySQL database */
$db = mysql_connect("localhost", "root", "");
mysql_select_db("imie");

?>

<html>

  <head>
  
    <meta http-equiv="Content-type" content="text/html; charset=UTF-8"/> 
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
				
			<!--ouvre un popup pour rentrer la date proprement-->
			<li>
			<link rel="stylesheet" typePreview post="text/css" href="../css/calendrier/demos.css">
			<link rel="stylesheet" type="text/css" href="../css/calendrier/jquery-ui.css">
			<script src="../css/js/jquery-1.5.1.js"></script>
			<script src="../css/js/jquery.ui.core.js"></script>
			<script src="../css/js/jquery.ui.widget.js"></script>
			<script src="../css/js/jquery.ui.datepicker.js"></script>
	
            <script>
	            $(function() {
		        $( "#datepicker" ).datepicker();
		        $( "#datepicker" ).datepicker( "option", "dateFormat", "yy-mm-dd");
	            });
            </script>

            <div style="width:500px; height:auto; font-size:small;">
	        <div class="demo">
				<p>Date :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input name="date" type="text" id="datepicker" placeholder="Entrez la date du devoir...">
				</p>
	        </div>
            </div>

			</li>

				<li>Matière :
				<SELECT NAME="matiere">
<?php
//Requête, exécution et création du jeu d'enregistrement
$requete = "SELECT idMatiere, nomMatiere FROM matiere ; ";
$result  = mysql_query($requete,$db);
$matieres = mysql_fetch_array($result);	

   //Boucle sur la liste
	while ($matieres!=FALSE)
	{
		$mat=$matieres['nomMatiere'];
		$matiere=$matieres['idMatiere'];

?>
				<OPTION VALUE="<?php echo $matiere; ?>"><?php echo $mat; ?>
<?php
		$matieres=mysql_fetch_array($result);
	}
?>
</SELECT>
<br/>
<br/>

				</li>
				<li>Classe :&nbsp;&nbsp;
				<SELECT NAME="classe">
<?php
//Requête, exécution et création du jeu d'enregistrement
$requete = "SELECT idClasse, cursus FROM classe; ";
$result  = mysql_query($requete,$db);
$classes = mysql_fetch_array($result);	

   //Boucle sur la liste
	while ($classes!=FALSE)
	{
		$classe=$classes['cursus'];
		$class=$classes['idClasse'];

?>
			    <OPTION VALUE="<?php echo $class; ?>"><?php echo $classe; ?>
<?php
		$classes=mysql_fetch_array($result);
	}
?>
</SELECT>
<br/>
                </li>
				<br/>
				<li>
					Intitulé :&nbsp;&nbsp;&nbsp;<input type="text" name="devoir" placeholder="Entrez l'intitulé du devoir..."/>
				</li>

<br/>
					<input type="submit" value="Valider"/><!-- afficher un pop-up pour confirmer la création du devoir
															avec récapitulatif des infos (matière, classe, intitulé) -->
				</li>
			</form>
		</ul>
		
	</div>
  </body>
</html>