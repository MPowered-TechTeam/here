<?php
include("../include/mysql_connect.php");

$conn = connect_to_db_with_sqli();

$name = $_REQUEST['name'];
$uniqname = $_COOKIE['uniqname'];

//$uniqname = $_COOKIE["uniqname"];

// Get lat and long
$lat = $_REQUEST['lat'];
$long = $_REQUEST['long'];

// Check to see if an event is already created
$check_uniqname = 'SELECT * FROM `event` WHERE 1';

echo $uniqname;
echo "<br/>";
echo $lat;
echo "<br/>";
echo $long;

$query = "INSERT INTO `event`(`name`, `creator`, `long`, `lat`) VALUES (?, ?, ?, ?)";
$stmt = $conn->prepare($query);
$stmt->bind_param('ssdd', 
	$name,
	$uniqname,
	$long,
	$lat
	);
$stmt->execute();

echo "<br/>";
echo "Submitted";
//if (1) 
//{
	// Get lat and long
	//mysql_query("INSERT INTO `event(`event_name``, `uniqname`, `long`, `lat`) VALUES ('$name','$uniqname', $long , $lat)");
//}
//else 
//{
//	echo "Login Error...";
//}

?>