<?php
/* Include all the classes */ 
include("pChart2.1.4/class/pDraw.class.php"); 
include("pChart2.1.4/class/pImage.class.php"); 
include("pChart2.1.4/class/pData.class.php");

/* Create your dataset object */ 
$myData = new pData();


/* Build the query that will returns the data to graph */
//create pdo conection
$conn = new PDO("mysql:host=localhost:3306;dbname=userdb", "root", "");
//set the PDO error mode to exception
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//query database
$stmt = $conn->prepare("SELECT * FROM testdata");
$stmt->execute();

$timestamp = array();
$temperature = array();
$humidity = array();

//fetch results into arrays
while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    /* Push the results of the query in an array */
    $timestamp[] = $row["timestamp"];
    $temperature[] = $row["temperature"];
    $humidity[] = $row["humidity"];
}

/* Save the data in the pData array */
$myData->addPoints($timestamp, "Timestamp");
$myData->addPoints($temperature, "Temperature");
$myData->addPoints($humidity, "Humidity");

/* Put the timestamp column on the abscissa axis */
$myData->setAbscissa("Timestamp");

/* Associate the "Humidity" data serie to the second axis */
$myData->setSerieOnAxis("Humidity", 1);

/* Name this axis "Time" */
$myData->setXAxisName("Time");
/* Specify that this axis will display time values */
$myData->setXAxisDisplay(AXIS_FORMAT_TIME, "H:i");

/* First Y axis will be dedicated to the temperatures */
$myData->setAxisName(0, "Temperature");
$myData->setAxisUnit(0, "°C");

/* Second Y axis will be dedicated to humidity */
$myData->setAxisName(1, "Humidity");
$myData->setAxisUnit(0, "%");


/* Create a pChart object and associate your dataset */ 
$myPicture = new pImage(700,230,$myData);

/* Choose a nice font */
$myPicture->setFontProperties(array("FontName"=>"pChart2.1.4/fonts/Forgotte.ttf","FontSize"=>11));

/* Define the boundaries of the graph area */
$myPicture->setGraphArea(60,40,670,190);

/* Draw the scale, keep everything automatic */ 
$myPicture->drawScale();

/* Draw the scale, keep everything automatic */ 
$myPicture->drawSplineChart();

/* Build the PNG file and send it to the web browser */
$myPicture->Render("basic.png");

echo "done";
?>