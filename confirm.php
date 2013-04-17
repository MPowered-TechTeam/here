<!DOCTYPE html>
<?php

include("include/mysql_connect.php");
include("include/functions.php");

check_login();
$conn = connect_to_db_with_sqli();

$event_id = $_REQUEST['event_id'];
$uniqname = $_COOKIE['uniqname'];

if (!isset($_REQUEST['event_id'])) {

	header('Location: nav.php');
	die("ERROR: Please specify event_id. 'confirm.php?event_id='");
}

$event_name = get_event_name($event_id);

// check the table to make sure they haven't signed in already
$check = "SELECT * FROM attend WHERE event_id=? AND uniqname=?";
$stmt = $conn->prepare($check);
$stmt->bind_param('is',
	$event_id, 
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
	$message = "You signed in to " . $event_name;
}
else 
{
	$message = "You already signed in to " . $event_name;
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
			<strong>Awesome, <?php echo $_COOKIE["uniqname"];?>! 
				<?php echo $message; ?>.</strong>
		</div>
	</div>
	<a class="btn btn-inverse" href="nav.php"><i class="icon-arrow-left"></i> Event List</a>
<script src="http://code.jquery.com/jquery-latest.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
</body>