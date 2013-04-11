<!DOCTYPE html>
<?php

$conn = connect_to_db_with_sqli();

//$id = $_GET[]; 
//$event_id = ;
//$uniqname
$event_id = 3;
$uniqname = "jasleung";

// check the table to make sure they haven't signed in already
$check = "SELECT * FROM attend WHERE uniqname=?";
$stmt = $conn->prepare($check);
$stmt->bind_param('s', 
	$uniqname
	);
$stmt->execute();
$stmt->store_result();

if($stmt->num_rows == 0)
{
	// then sign them in
	$query = "INSERT INTO `attend`(`event_id`, `uniqname`) VALUES (?, ?)";
	$stmt = $conn->prepare($query);
	$stmt->bind_param('ds', 
		$event_id,
		$uniqname
		);
	$stmt->execute();
	echo "You signed in";
}
else 
{
	echo "you already signed in";
}


function connect_to_db_with_sqli() {
	####################################
	# Database connection information   #
	#####################################

	$hostname = "localhost";
	$database = "mpowered";
	$username = "root";
	$password = "";

	$conn = new mysqli($hostname, $username, $password, $database) or die("<p> Error connecting to database. </p>");

	return $conn;
}
?>

<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
<link rel="stylesheet" type="text/css" href="style.css" />
<style type="text/css">
	.confirm_message {
		text-align: center;
		position:absolute;
		top:50%;
		width: 100%;
	}
</style>
<body>
	<div class="confirm_message">
		<div>
			<strong>Awesome, <?php echo $_GET["uniqname"];?>! 
				You signed into <?php echo $_GET["event_id"]; ?>.</strong>
		</div>
	</div>
	<a class="btn btn-inverse" href="catalog.php"><i class="icon-arrow-left"></i> Event List</a>
<script src="http://code.jquery.com/jquery-latest.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
</body>