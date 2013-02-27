<?php


$con = connect_to_db();

$name = $_REQUEST['name'];
$login = $_REQUEST['login'];
$password = $_REQUEST['password'];

$result = mysql_query("SELECT * FROM sql_inject_login WHERE login='$login' AND password='$password'");

if (mysql_num_rows($result) == 1) {

	echo "Yay!";
	mysql_query("INSERT INTO `sql_inject_kudos`(`name`) VALUES ('$name')");
}
else {
	echo "Login Error...";
}

mysql_close($con);

function connect_to_db() {
	####################################
	# Database connection information   #
	#####################################

	$hostname = "";
	$database = "";
	$username = "";
	$password = "";

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