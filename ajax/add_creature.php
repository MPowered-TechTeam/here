<?php


connect_to_db();

$name = mysql_real_escape_string($_REQUEST['name']);
$type = mysql_real_escape_string($_REQUEST['type']);
$body = mysql_real_escape_string($_REQUEST['body']);
$skill = mysql_real_escape_string($_REQUEST['skill']);
$feature = mysql_real_escape_string($_REQUEST['feature']);

mysql_query("INSERT INTO `monsters`(`name`, `type`, `body`, `feature`, `skill`, `votes`) VALUES ('$name', '$type', '$body', '$feature', '$skill', 0)");

function connect_to_db() {
	####################################
	# Database connection information   #
	#####################################

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