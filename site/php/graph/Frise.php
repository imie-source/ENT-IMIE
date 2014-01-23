<?php
/* pChart library inclusions */
include("C:/Program Files/EasyPHP-DevServer-13.1VC9/data/localweb/scripts/pChart/class/pData.class.php");
include("C:/Program Files/EasyPHP-DevServer-13.1VC9/data/localweb/scripts/pChart/class/pDraw.class.php");
include("C:/Program Files/EasyPHP-DevServer-13.1VC9/data/localweb/scripts/pChart/class/pRadar.class.php");
include("C:/Program Files/EasyPHP-DevServer-13.1VC9/data/localweb/scripts/pChart/class/pImage.class.php");
include("C:/Program Files/EasyPHP-DevServer-13.1VC9/data/localweb/scripts/pChart/class/pIndicator.class.php");

 /* Create and populate the pData object */
$MyData = new pData();
$MyData->addPoints(array(4,12,15,8,5,-5),"Probe 1");
$MyData->addPoints(array(7,2,4,14,8,3),"Probe 2");
$MyData->setAxisName(0,"Temperatures");
$MyData->setAxisUnit(0,"°C");
$MyData->addPoints(array("Jan","Feb","Mar","Apr","May","Jun"),"Labels");
$MyData->setSerieDescription("Labels","Months");
$MyData->setAbscissa("Labels");

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
	
 $requete = "SELECT MIN(Moyenne) From moyenneeleve ";
 $result = mysql_query($requete, $db) or die (mysql_error());
 $moyenneMin = "";
 
while($row=mysql_fetch_array($result))
 {
	$moyenneMin[] = $row["MIN(Moyenne)"];
	}
	
	
	
 $requete = "SELECT Moyenne From moyenneclasse Where Classe = 'classe6' AND matiere='matiere1' ";
 $result = mysql_query($requete, $db) or die (mysql_error());
 $moyenneClasse = "";
 
 while($row=mysql_fetch_array($result))
 {
	$moyenneClasse[] = $row["moyenne"];
	}
	
	
	
	
 $requete = "SELECT MAX(Moyenne) From moyenneeleve";
 $result = mysql_query($requete, $db) or die (mysql_error());
 $moyenneMax = "";
 
 while($row=mysql_fetch_array($result))
 {
	$moyenneMax [] = $row["MAX(Moyenne)"];
	}
	
	
 
/* Create the pChart object */
$myPicture = new pImage(700,150,$MyData);
 
/* Draw the background */
$Settings = array("R"=>170, "G"=>183, "B"=>87, "Dash"=>1, "DashR"=>190, "DashG"=>203, "DashB"=>107);
$myPicture->drawFilledRectangle(0,0,700,230,$Settings);
 
/* Overlay with a gradient */
$Settings = array("StartR"=>219, "StartG"=>231, "StartB"=>139, "EndR"=>1, "EndG"=>138, "EndB"=>68, "Alpha"=>50);
$myPicture->drawGradientArea(0,0,700,230,DIRECTION_VERTICAL,$Settings);
$myPicture->drawGradientArea(0,0,700,20,DIRECTION_VERTICAL,array("StartR"=>0,"StartG"=>0,"StartB"=>0,"EndR"=>50,"EndG"=>50,"EndB"=>50,"Alpha"=>80));
 
/* Add a border to the picture */
$myPicture->drawRectangle(0,0,699,229,array("R"=>0,"G"=>0,"B"=>0));
 
/* Write the picture title */ 
$myPicture->setFontProperties(array("FontName"=>"C:/Program Files/EasyPHP-DevServer-13.1VC9/data/localweb/imie/Library/fonts/verdana.ttf","FontSize"=>6));
$myPicture->drawText(10,13,"drawIndicator() - Create nice looking indicators",array("R"=>255,"G"=>255,"B"=>255));
 
/* Create the pIndicator object */ 
$Indicator = new pIndicator($myPicture);
 
$myPicture->setFontProperties(array("FontName"=>"C:/Program Files/EasyPHP-DevServer-13.1VC9/data/localweb/imie/Library/fonts/verdana.ttf","FontSize"=>6));
 
/* Define the indicator sections */
$IndicatorSections   = "";
$IndicatorSections[] = array("Start"=>0,"End"=>9, "Caption"=>"Low","R"=>152,"G"=>5,"B"=>5);
$IndicatorSections[] = array("Start"=>10,"End"=>15,"Caption"=>"Moderate","R"=>6,"G"=>25,"B"=>101);
$IndicatorSections[] = array("Start"=>16,"End"=>20,"Caption"=>"High","R"=>28,"G"=>63,"B"=>1);
 
/* Draw the 1st indicator */
$IndicatorSettings1 = array("Values"=>($moyenneEleve),"ValueFontName"=>"C:/Program Files/EasyPHP-DevServer-13.1VC9/data/localweb/imie/Library/fonts/verdana.ttf","ValueFontSize"=>15, "IndicatorSections"=>$IndicatorSections,"SubCaptionColorFactor"=>-40);
$IndicatorSettings2 = array("Values"=>($moyenneMin),"ValueFontName"=>"C:/Program Files/EasyPHP-DevServer-13.1VC9/data/localweb/imie/Library/fonts/verdana.ttf","ValueFontSize"=>15, "IndicatorSections"=>$IndicatorSections,"SubCaptionColorFactor"=>-40);
$IndicatorSettings3 = array("Values"=>($moyenneClasse),"ValueFontName"=>"C:/Program Files/EasyPHP-DevServer-13.1VC9/data/localweb/imie/Library/fonts/verdana.ttf","ValueFontSize"=>15, "IndicatorSections"=>$IndicatorSections,"SubCaptionColorFactor"=>-40);
$IndicatorSettings4 = array("Values"=>($moyenneMax),"ValueFontName"=>"C:/Program Files/EasyPHP-DevServer-13.1VC9/data/localweb/imie/Library/fonts/verdana.ttf","ValueFontSize"=>15, "IndicatorSections"=>$IndicatorSections,"SubCaptionColorFactor"=>-40);
$Indicator->draw(80,50,550,50,$IndicatorSettings1);
$Indicator->draw(10,50,550,50,$IndicatorSettings2);
$Indicator->draw(20,50,550,50,$IndicatorSettings3);
$Indicator->draw(30,50,550,50,$IndicatorSettings4);

 
/* Render the picture (choose the best way) */
$myPicture->Render("example.drawIndicator.png");

?>

<html>

<head></head>

<body>

<center><p><img src="example.drawIndicator.png"></p></center>

</body>

</html>