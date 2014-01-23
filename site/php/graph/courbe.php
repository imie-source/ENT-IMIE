<html>

<?php

ini_set("display_errors",0);error_reporting(0);

/* Include the pData class */
include("C:/Program Files/EasyPHP-DevServer-13.1VC9/data/localweb/scripts/pChart/class/pDraw.class.php");
include("C:/Program Files/EasyPHP-DevServer-13.1VC9/data/localweb/scripts/pChart/class/pImage.class.php"); 
include("C:/Program Files/EasyPHP-DevServer-13.1VC9/data/localweb/scripts/pChart/class/pData.class.php"); 

/* Create the pData object */
$MyData = new pData();  
 
/* Connect to the MySQL database */
$db = mysql_connect("localhost", "root", "");
mysql_select_db("pchart");

/* Build the query that will returns the data to graph */
$requete = "SELECT * FROM `measures`";
$result  = mysql_query($requete,$db) or die (mysql_error());
$timestamp=""; $temperature=""; $humidity="";

while($row=mysql_fetch_array($result))
 {
  /* Push the results of the query in an array */
  $timestamp[]   = $row["timestamp"];
  $temperature[] = $row["temperature"];
  $humidity[]    = $row["Humidity"];
	}
 
/* Save the data in the pData array */
$MyData->addPoints($timestamp,"timestamp");
$MyData->addPoints($temperature,"temperature");
$MyData->addPoints($humidity,"Humidity");

/* Put the timestamp column on the abscissa axis */
$MyData->setAbscissa("timestamp");

/* Associate the "Humidity" data serie to the second axis */
$MyData->setSerieOnAxis("Humidity", 1);
 
/* Name this axis "Time" */
$MyData->setXAxisName("time");
 
/* Specify that this axis will display time values */
$MyData->setXAxisDisplay(AXIS_FORMAT_TIME,"H:i");

/* First Y axis will be dedicated to the temperatures */
$MyData->setAxisName(0,"temperature");
$MyData->setAxisUnit(0,"°C");
 
/* Second Y axis will be dedicated to humidity */
$MyData->setAxisName(1,"Humidity");
$MyData->setAxisUnit(0,"%");

/* Create a pChart object and associate your dataset */ 
$myPicture = new pImage(700,230,$MyData);
 
/* Choose a nice font */
$myPicture->setFontProperties(array("FontName"=>"fonts/Forgotte.ttf","FontSize"=>11));
 
/* Define the boundaries of the graph area */
$myPicture->setGraphArea(60,40,670,190);
 
/* Draw the scale, keep everything automatic */ 
$myPicture->drawScale();
 
/* Draw the scale, keep everything automatic */ 
$myPicture->drawSplineChart();
 
/* Build the PNG file and send it to the web browser */ 
$myPicture->Render("temp.png");

?>

</html>