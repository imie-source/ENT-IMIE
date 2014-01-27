<?php

/* pChart library inclusions */
include("C:/Program Files/EasyPHP-DevServer-13.1VC9/data/localweb/scripts/pChart/class/pData.class.php");
include("C:/Program Files/EasyPHP-DevServer-13.1VC9/data/localweb/scripts/pChart/class/pDraw.class.php");
include("C:/Program Files/EasyPHP-DevServer-13.1VC9/data/localweb/scripts/pChart/class/pRadar.class.php");
include("C:/Program Files/EasyPHP-DevServer-13.1VC9/data/localweb/scripts/pChart/class/pImage.class.php");
include("C:/Program Files/EasyPHP-DevServer-13.1VC9/data/localweb/scripts/pChart/class/pIndicator.class.php");

/* Connect to the MySQL database */
$db = mysql_connect("localhost", "root", "");
mysql_select_db("imie");

/* Build the query that will returns the data to graph */
$requete = "SELECT moyenne FROM moyenneeleve WHERE eleve = 'eleve1' ";
$result  = mysql_query($requete,$db) or die (mysql_error());
$MoyenneEleve = "";
 
while($row=mysql_fetch_array($result))
 {
	$moyenneEleve[] =$row["moyenne"];
	}

$requete = "SELECT MIN(moyenne) From moyenneeleve ";
$result = mysql_query($requete, $db) or die (mysql_error());
$moyenneMin = "";
 
while($row=mysql_fetch_array($result))
 {
	$moyenneMin[] = $row["MIN(moyenne)"];
	}

$requete = "SELECT moyenne From moyenneclasse Where classe = 'classe6' AND matiere='matiere6' ";
$result = mysql_query($requete, $db) or die (mysql_error());
$moyenneClasse = "";
 
while($row=mysql_fetch_array($result))
 {
	$moyenneClasse[] = $row["moyenne"];
	}

$requete = "SELECT MAX(moyenne) From moyenneeleve";
$result = mysql_query($requete, $db) or die (mysql_error());
$moyenneMax = "";
 
while($row=mysql_fetch_array($result))
 {
	$moyenneMax [] = $row["MAX(moyenne)"];
	}

/* Create and populate the pData object */
$MyData = new pData();
 
/* Create the pChart object */
$myPicture = new pImage(720,160,$MyData);
 
/* Turn of Antialiasing */
$myPicture->Antialias = FALSE;
 
/* Draw the background */
$Settings = array("R"=>170, "G"=>183, "B"=>87, "Dash"=>1, "DashR"=>190, "DashG"=>203, "DashB"=>107);
$myPicture->drawFilledRectangle(0,0,700,350,$Settings);
 
/* Overlay with a gradient */
$Settings = array("StartR"=>219, "StartG"=>231, "StartB"=>139, "EndR"=>1, "EndG"=>138, "EndB"=>68, "Alpha"=>50);
$myPicture->drawGradientArea(0,0,700,220,DIRECTION_VERTICAL,$Settings);
$Settings = array("StartR"=>1, "StartG"=>138, "StartB"=>68, "EndR"=>219, "EndG"=>231, "EndB"=>239, "Alpha"=>50);
$myPicture->drawGradientArea(0,222,700,350,DIRECTION_VERTICAL,$Settings);
 
/* Turn on Antialiasing */
$myPicture->Antialias = TRUE;
 
 
/* Write the chart title */ 
$myPicture->setFontProperties(array("FontName"=>"C:/Program Files/EasyPHP-DevServer-13.1VC9/data/localweb/imie/Library/fonts/verdana.ttf","FontSize"=>7));
$myPicture->drawText(150,35,"Statistiques",array("FontSize"=>7,"Align"=>TEXT_ALIGN_BOTTOMMIDDLE,"R"=>255,"G"=>255,"B"=>255));
 
 
/* Create the pIndicator object */ 
$Indicator = new pIndicator($myPicture);
 
/* Define the indicator sections */
$IndicatorSections   = "";
$IndicatorSections[] = array("Start"=>0,"End"=>10,"Caption"=>"","R"=>0,"G"=>142,"B"=>176);
$IndicatorSections[] = array("Start"=>10,"End"=>15,"Caption"=>"","R"=>108,"G"=>157,"B"=>49);
$IndicatorSections[] = array("Start"=>15,"End"=>20,"Caption"=>"","R"=>226,"G"=>74,"B"=>14);
$IndicatorSections2   = "";
$IndicatorSections2[] = array("Start"=>0,"End"=>10,"Caption"=>"Vous","R"=>0,"G"=>142,"B"=>176);
$IndicatorSections2[] = array("Start"=>10,"End"=>15,"Caption"=>"Vous","R"=>108,"G"=>157,"B"=>49);
$IndicatorSections2[] = array("Start"=>15,"End"=>20,"Caption"=>"Vous","R"=>226,"G"=>74,"B"=>14);
$IndicatorSections3   = "";
$IndicatorSections3[] = array("Start"=>0,"End"=>10,"Caption"=>"Classe","R"=>0,"G"=>142,"B"=>176);
$IndicatorSections3[] = array("Start"=>10,"End"=>15,"Caption"=>"Classe","R"=>108,"G"=>157,"B"=>49);
$IndicatorSections3[] = array("Start"=>15,"End"=>20,"Caption"=>"Classe","R"=>226,"G"=>74,"B"=>14);
$IndicatorSections4   = "";
$IndicatorSections4[] = array("Start"=>0,"End"=>10,"Caption"=>"","R"=>0,"G"=>142,"B"=>176);
$IndicatorSections4[] = array("Start"=>10,"End"=>15,"Caption"=>"","R"=>108,"G"=>157,"B"=>49);
$IndicatorSections4[] = array("Start"=>15,"End"=>20,"Caption"=>"","R"=>226,"G"=>74,"B"=>14);
 
/* Draw the 2nd indicator */
$IndicatorSettings1 = array("Values"=>($moyenneEleve), "CaptionLayout"=>INDICATOR_CAPTION_DEFAULT, "CaptionR"=>0, "CaptionG"=>0,"CaptionB"=>0,"DrawLeftHead"=>FALSE, "ValueDisplay"=>INDICATOR_VALUE_LABEL, 
"ValueFontName"=>"C:/Program Files/EasyPHP-DevServer-13.1VC9/data/localweb/imie/Library/fonts/verdana.ttf", "ValueFontSize"=>15, "IndicatorSections"=>$IndicatorSections2);
$IndicatorSettings2 = array("Values"=>($moyenneClasse),  "CaptionLayout"=>INDICATOR_CAPTION_DEFAULT, "CaptionR"=>0, "CaptionG"=>0,"CaptionB"=>0,"DrawLeftHead"=>FALSE, "ValueDisplay"=>INDICATOR_VALUE_LABEL, 
"ValueFontName"=>"C:/Program Files/EasyPHP-DevServer-13.1VC9/data/localweb/imie/Library/fonts/verdana.ttf", "ValueFontSize"=>15, "IndicatorSections"=>$IndicatorSections3);
$IndicatorSettings = array("Values"=>($moyenneMin), "CaptionLayout"=>INDICATOR_CAPTION_DEFAULT, "CaptionR"=>0, "CaptionG"=>0,"CaptionB"=>0,"DrawLeftHead"=>FALSE, 
"ValueFontName"=>"C:/Program Files/EasyPHP-DevServer-13.1VC9/data/localweb/imie/Library/fonts/verdana.ttf", "ValueFontSize"=>15, "IndicatorSections"=>$IndicatorSections);
$IndicatorSettings3 = array("Values"=>($moyenneMax),  "CaptionLayout"=>INDICATOR_CAPTION_DEFAULT, "CaptionR"=>0, "CaptionG"=>0,"CaptionB"=>0,"DrawLeftHead"=>FALSE,  
"ValueFontName"=>"C:/Program Files/EasyPHP-DevServer-13.1VC9/data/localweb/imie/Library/fonts/verdana.ttf", "ValueFontSize"=>15, "IndicatorSections"=>$IndicatorSections4);

$Indicator->draw(60,100,550,0,$IndicatorSettings2);
$Indicator->draw(60,100,550,0,$IndicatorSettings1);
$Indicator->draw(60,100,550,30,$IndicatorSettings);
$Indicator->draw(60,100,550,0,$IndicatorSettings3);

 
/* Render the picture (choose the best way) */
$myPicture->Render("example.mixed.png");

?>

<html>

<head><p></head>

<body>

<center><p><img src="example.mixed.png"></p></center>

</body>

</html>