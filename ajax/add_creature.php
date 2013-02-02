<?php


connect_to_db();

$name = mysql_real_escape_string($_REQUEST['name']);
$type = mysql_real_escape_string($_REQUEST['type']);
$body = mysql_real_escape_string($_REQUEST['body']);
$skill = mysql_real_escape_string($_REQUEST['skill']);
$feature = mysql_real_escape_string($_REQUEST['feature']);

mysql_query("INSERT INTO `monsters`(`name`, `type`, `body`, `feature`, `skill`, `votes`) VALUES ('$name', '$type', '$body', '$feature', '$skill', 1)");

function connect_to_db() {
	####################################
	# Database connection information   #
	#####################################

	$hostname = "mobilemontable.cgnm4eaa2lfg.us-east-1.rds.amazonaws.com";
	$database = "MobilemonDB";
	$username = "mobile_tb";
	$password = "blueapple";

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