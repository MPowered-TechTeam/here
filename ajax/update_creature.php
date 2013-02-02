<?php


connect_to_db();

$id = $_REQUEST['id'];
$votes_plus1 = $_REQUEST['prev_votes'] + 1;

//mysql_query(
	echo "UPDATE `monsters` SET `votes` = $votes_plus1 WHERE 'id' = $id";//);

function connect_to_db() {
	####################################
	# Database connection information  #
	####################################

	$hostname = "localhost";
	$database = "csescholars";
	$username = "cseschol";
	$password = "JAwNuTrJ";

	$db = mysql_connect($hostname, $username, $password);
	if (!$db)
	{
		echo '<p>Error connecting to database!</p>';
		exit;
	}
	mysql_select_db($database, $db);

	return $db;
}

?>