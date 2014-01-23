<?php

/* Connect to the MySQL database */
$db = mysql_connect("localhost", "root", "");
mysql_select_db("imie");

$devoir = $_POST['devoir'];
$date = $_POST['date'];
$matiere = $_POST['matiere'];
$classe = $_POST['classe'];

$requete = "INSERT INTO `imie`.`devoir` (`idDevoir` , `intitule` , `date`, `idMatiere`, `idClasse`) VALUES ( NULL ,  '".$devoir."', '".$date."', '".$matiere."', '".$classe."' )";

mysql_query($requete);

echo ('Le devoir intitul&eacute; '.$devoir.' pr&eacutevu pour '.$date.' a bien &eacutet&eacute ajout&eacute.') ;



?>