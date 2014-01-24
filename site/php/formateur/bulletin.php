<!DOCTYPE html>
<?php

/* Connect to the MySQL database */
$db = mysql_connect("localhost", "root", "");
mysql_select_db("imie");
$requete =  mysql_query ("SELECT idMatiere, nomMatiere FROM matiere; ");
$ligne1 =  mysql_query ("SELECT matiere.nomMatiere, avg(note), intitule FROM eleve, matiere, note, devoir WHERE note.idDevoir=devoir.idDevoir AND note.idMatiere=matiere.idMatiere AND note.idEleve=eleve.idEleve AND eleve.idEleve='1'; ");
$ligne1p1 = mysql_query ("SELECT avg(note), commentaire FROM note, matiere WHERE idClasse='1'; ");
$moyenne1 = mysql_query ("SELECT avg(note) ");

?>

<html>
  <head>
    <meta charset="UTF-8">
    <title>Bulletin 'ITSTART Rennes'</title> <!-- afficher le nom de la classe -->
    <!-- <link rel="stylesheet" type="text/css" href="../css/cssDefault.css"> -->
  </head>
  <body>
	<header>
		<div>
			<a href="menu.html"><img src="../img/logo.jpg" alt="retour au menu principal"/></a>
		</div>
		<!-- Les infos profs seront définies en php-->
		<div>'Serge Dupond'</div> <!--Clic : menu pour déconnexion-->
		<div>'Développement JAVA'</div>
		<div>'Responsable pédagogique'</div>
	</header>
	<div>
		
		<div>
			<a href="liste_classes02.html">Retour choix de la classe</a>
		</div>
		
		<h1>'ITStart - Rennes'</h1> <!-- afficher la classe sélectionnée précédemment -->
		<table>
		<thead>
                <tr>
                    <td>Matière</td>
                </tr>
            <?php //On affiche les lignes du tableau une à une à l'aide d'une boucle
			if($resultat === FALSE) {
            die(mysql_error()); // pour voir les erreurs
            }
            while($resultat = mysql_fetch_array($ligne1))
            {
            ?>
                <tr>
                    <td><?php echo $resultat['nomMatiere'];?></td>
					<td><?php echo $resultat['avg(note)'];?></td>
					<td><?php echo $resultat['intitule'];?></td>
					<td><?php echo $resultat['commentaire'];?></td>
                </tr>
            <?php
            } //fin de la boucle, le tableau contient toute la BDD
            mysql_close(); //deconnection de mysql
            ?>
			<?php //On affiche les lignes du tableau une à une à l'aide d'une boucle
			if($resultat === FALSE) {
            die(mysql_error()); // pour voir les erreurs
            }
            while($resultat = mysql_fetch_array($ligne1p1))
            {
            ?>
                <tr>
                    <td><?php echo $resultat['avg(note)'];?></td>
					<td><?php echo $resultat['commentaire'];?></td>
                </tr>
            <?php
            } //fin de la boucle, le tableau contient toute la BDD
            mysql_close(); //deconnection de mysql
            ?>
			</thead>
        </table>
		<!-- liste déroulante des élèves de la classe à valider-->
		<form action="bulletin.html">
			<select>
				<option value="Michel Martin">Michel Martin</option>
				<option value="Edmonde Gogote">Edmonde Gogote</option>
				<option value="Gudule Durand">Gudule Durand</option>
				<option value="Joséphine lacroix">Joséphine lacroix</option>
				<option value="Michel Martin">Michel Martin</option>
				<option value="Michel Martin">Michel Martin</option>
				<option value="Michel Martin">Michel Martin</option>
				<option value="Michel Martin">Michel Martin</option>
				<option value="Michel Martin">Michel Martin</option>
				<option value="Michel Martin">Michel Martin</option>
				<option value="Michel Martin">Michel Martin</option>
				<option value="Michel Martin">Michel Martin</option>
				<option value="Michel Martin">Michel Martin</option>
			</select>
			<input type="submit" value="Sélectionner" />
		</form>
		
		<table>
				<thead>
					<tr>
						<th>Matière</th>
						<th>Moy. élève</th>
						<th>Devoir</th>
						<th>Note</th>
						<th>Moy. classe</th>
						<th>Commentaire</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<th>Développpement</th> <!-- domaine -->
						<th>15</th>
						<th></th>
						<th></th>
						<th>10</th>
						<th>Très assidu ce trimestre.</th>
					</tr>
					<tr>
						<th>JAVA</th> <!-- matière -->
						<th>12</th>
						<th></th>
						<th></th>
						<th>15</th>
						<th>Bon devoir</th>
					</tr>
					<tr>
						<th></th>
						<th></th>
						<th>programme #1</th>
						<th>15</th>
						<th>13</th>
						<th>Quelques erreurs.</th>
					</tr>
					
					<tr>
						<th></th>
						<th></th>
						<th>programme #2</th>
						<th>15</th>
						<th>13</th>
						<th>Quelques erreurs.</th>
					</tr>
					
					<tr>
						<th>C++</th> <!-- matière -->
						<th>12</th>
						<th></th>
						<th></th>
						<th>13</th>
						<th>Des oublis</th>
					</tr>
					
					<tr>
						<th></th>
						<th></th>
						<th>nom du devoir</th>
						<th>12</th>
						<th>16</th>
						<th>Très assidu ce trimestre.</th>
					</tr>
					<tr>
						<th>Windows</th> <!-- matière -->
						<th>14</th>
						<th></th>
						<th></th>
						<th>15</th>
						<th>Bon devoir</th>
					</tr>
					<tr>
						<th></th>
						<th></th>
						<th>devoir 2</th>
						<th>15</th>
						<th>14</th>
						<th>Quelques erreurs.</th>
					</tr>
					
					<tr>
						<th></th>
						<th></th>
						<th>truc</th>
						<th>12.7</th>
						<th>14</th>
						<th>Des oublis</th>
					</tr>
				
				</tbody>			
			</table>
		
	</div>
  </body>
</html>