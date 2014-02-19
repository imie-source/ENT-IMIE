<?php

/* pChart library inclusions */
include("Library/class/pData.class.php");
include("Library/class/pDraw.class.php");
include("Library/class/pRadar.class.php");
include("Library/class/pImage.class.php");
 
 /* Create the pData object */
$MyData = new pData();  

/* Connect to the MySQL database */
$db = mysql_connect("10.3.0.245", "ENT", "ent");
mysql_select_db("ENT");
 
 /* Build the query that will returns the data to graph */
$requete = "SELECT moyenne FROM devoir WHERE matiere='matiere1' AND eleve='eleve1'";
$result  = mysql_query($requete,$db) or die (mysql_error());
$moyenne1="";

while($row=mysql_fetch_array($result))
 {
  /* Push the results of the query in an array */
  $moyenne1[]   = $row["moyenne"];
	}
 
   /* Build the query that will returns the data to graph */
$requete = "SELECT moyenne FROM moyenneeleve WHERE matiere='matiere2' AND eleve='eleve2'";
$result  = mysql_query($requete,$db) or die (mysql_error());
$moyenne2="";

while($row=mysql_fetch_array($result))
 {
  /* Push the results of the query in an array */
  $moyenne2[]   = $row["moyenne"];
	}
	
  /* Build the query that will returns the data to graph */
$requete = "SELECT moyenne FROM moyenneeleve WHERE matiere='matiere3' AND eleve='eleve3'";
$result  = mysql_query($requete,$db) or die (mysql_error());
$moyenne3="";

while($row=mysql_fetch_array($result))
 {
  /* Push the results of the query in an array */
  $moyenne3[]   = $row["moyenne"];
	}
	
/* Build the query that will returns the data to graph */
$requete = "SELECT moyenne FROM moyenneeleve WHERE matiere='matiere4' AND eleve='eleve4'";
$result  = mysql_query($requete,$db) or die (mysql_error());
$moyenne4="";
while($row=mysql_fetch_array($result))
 {
  /* Push the results of the query in an array */
  $moyenne4[]   = $row["moyenne"];
	}
	
/* Build the query that will returns the data to graph */
$requete = "SELECT moyenne FROM moyenneeleve WHERE matiere='matiere5' AND eleve='eleve5'";
$result  = mysql_query($requete,$db) or die (mysql_error());
$moyenne5="";
while($row=mysql_fetch_array($result))
 {
  /* Push the results of the query in an array */
  $moyenne5[]   = $row["moyenne"];
	}
	
/* Build the query that will returns the data to graph */
$requete = "SELECT moyenne FROM moyenneeleve WHERE matiere='matiere6' AND eleve='eleve6'";
$result  = mysql_query($requete,$db) or die (mysql_error());
$moyenne6="";
while($row=mysql_fetch_array($result))
 {
  /* Push the results of the query in an array */
  $moyenne6[]   = $row["moyenne"];
	}
	
/* Build the query that will returns the data to graph */
$requete = "SELECT moyenne FROM moyenneclasse WHERE matiere='matiere1' AND classe='classe1'";
$result  = mysql_query($requete,$db) or die (mysql_error());
$moyenne7="";
while($row=mysql_fetch_array($result))
 {
  /* Push the results of the query in an array */
  $moyenne7[]   = $row["moyenne"];
	}
	
/* Build the query that will returns the data to graph */
$requete = "SELECT moyenne FROM moyenneclasse WHERE matiere='matiere2' AND classe='classe2'";
$result  = mysql_query($requete,$db) or die (mysql_error());
$moyenne8="";
while($row=mysql_fetch_array($result))
 {
  /* Push the results of the query in an array */
  $moyenne8[]   = $row["moyenne"];
	}
	
/* Build the query that will returns the data to graph */
$requete = "SELECT moyenne FROM moyenneclasse WHERE matiere='matiere3' AND classe='classe3'";
$result  = mysql_query($requete,$db) or die (mysql_error());
$moyenne9="";
while($row=mysql_fetch_array($result))
 {
  /* Push the results of the query in an array */
  $moyenne9[]   = $row["moyenne"];
	}
	
/* Build the query that will returns the data to graph */
$requete = "SELECT moyenne FROM moyenneclasse WHERE matiere='matiere4' AND classe='classe4'";
$result  = mysql_query($requete,$db) or die (mysql_error());
$moyenne10="";
while($row=mysql_fetch_array($result))
 {
  /* Push the results of the query in an array */
  $moyenne10[]   = $row["moyenne"];
	}

/* Build the query that will returns the data to graph */
$requete = "SELECT moyenne FROM moyenneclasse WHERE matiere='matiere5' AND classe='classe5'";
$result  = mysql_query($requete,$db) or die (mysql_error());
$moyenne11="";
while($row=mysql_fetch_array($result))
 {
  /* Push the results of the query in an array */
  $moyenne11[]   = $row["moyenne"];
	}

/* Build the query that will returns the data to graph */
$requete = "SELECT moyenne FROM moyenneclasse WHERE matiere='matiere6' AND classe='classe6'";
$result  = mysql_query($requete,$db) or die (mysql_error());
$moyenne12="";
while($row=mysql_fetch_array($result))
 {
  /* Push the results of the query in an array */
  $moyenne12[]   = $row["moyenne"];
	}
 
 
 /* Prepare some nice data & axis config */ 
$MyData = new pData();   
$MyData->addPoints(($moyenne1),"ScoreA"); 
$MyData->addPoints(($moyenne2),"ScoreA");
$MyData->addPoints(($moyenne3),"ScoreA"); 
$MyData->addPoints(($moyenne4),"ScoreA"); 
$MyData->addPoints(($moyenne5),"ScoreA"); 
$MyData->addPoints(($moyenne6),"ScoreA"); 
$MyData->addPoints(($moyenne7),"ScoreB");
$MyData->addPoints(($moyenne8),"ScoreB");
$MyData->addPoints(($moyenne9),"ScoreB"); 
$MyData->addPoints(($moyenne10),"ScoreB"); 
$MyData->addPoints(($moyenne11),"ScoreB"); 
$MyData->addPoints(($moyenne12),"ScoreB"); 
$MyData->setSerieDescription("ScoreA","Moyenne Eleve");
$MyData->setSerieDescription("ScoreB","Moyenne Classe");
 
/* Create the X serie */ 
$MyData->addPoints(array("Matiere1","Matiere2","Matiere3","Matiere4","Matiere5","Matiere6"),"Labels");
$MyData->setAbscissa("Labels");
 
/* Create the pChart object */
$myPicture = new pImage(350,270,$MyData);
 
/* Draw a solid background */
$Settings = array("R"=>170, "G"=>217, "B"=>91, "Dash"=>1, "DashR"=>199, "DashG"=>237, "DashB"=>111);
$myPicture->drawFilledRectangle(0,0,700,230,$Settings);
 
/* Overlay some gradient areas */
$Settings = array("StartR"=>194, "StartG"=>231, "StartB"=>44, "EndR"=>43, "EndG"=>107, "EndB"=>58, "Alpha"=>50);
$myPicture->drawGradientArea(0,0,700,230,DIRECTION_VERTICAL,$Settings);
$myPicture->drawGradientArea(0,0,700,20,DIRECTION_VERTICAL,array("StartR"=>0,"StartG"=>0,"StartB"=>0,"EndR"=>50,"EndG"=>50,"EndB"=>50,"Alpha"=>100));
 
/* Draw the border */
$myPicture->drawRectangle(0,0,699,229,array("R"=>0,"G"=>0,"B"=>0));
 
/* Write the title */
$myPicture->setFontProperties(array("FontName"=>"C:/Program Files/EasyPHP-DevServer-13.1VC9/data/localweb/imie/Library/fonts/verdana.ttf","FontSize"=>8));
$myPicture->drawText(10,13,"Radar IMIE",array("R"=>255,"G"=>255,"B"=>255));
 
/* Define general drawing parameters */
$myPicture->setFontProperties(array("FontName"=>"C:/Program Files/EasyPHP-DevServer-13.1VC9/data/localweb/imie/Library/fonts/verdana.ttf","FontSize"=>8,"R"=>80,"G"=>80,"B"=>80));
$myPicture->setShadow(TRUE,array("X"=>2,"Y"=>2,"R"=>0,"G"=>0,"B"=>0,"Alpha"=>10));
 
/* Create the radar object */
$SplitChart = new pRadar();

/* Draw the 1st radar chart */
$myPicture->setGraphArea(10,25,340,225);
$Options = array("Layout"=>RADAR_LAYOUT_STAR,"BackgroundGradient"=>array("StartR"=>255,"StartG"=>255,"StartB"=>255,"StartAlpha"=>100,"EndR"=>207,"EndG"=>227,"EndB"=>125,"EndAlpha"=>50));
$SplitChart->drawRadar($myPicture,$MyData,$Options);
 
/* Write down the legend */
$myPicture->setFontProperties(array("FontName"=>"C:/Program Files/EasyPHP-DevServer-13.1VC9/data/localweb/imie/Library/fonts/verdana.ttf","FontSize"=>8));
$myPicture->drawLegend(80,250,array("Style"=>LEGEND_BOX,"Mode"=>LEGEND_HORIZONTAL));
 
/* Render the picture */
$myPicture->Render("drawradar.png");

?>

<html>

<head></head>

<body>

<center><p><img src="drawradar.png"></p></center>

</body>

</html>