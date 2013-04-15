
<!DOCTYPE html>
<?php
	include("include/mysql_connect.php");
	include("include/functions.php");

	$conn = connect_to_db_with_sqli();
	$event_id = $_REQUEST['event_id'];
?>

<head>
	<title>Submit Page</title>
	<!-- Bootstrap -->
	<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
</head>
<body>
	<h1><?php echo get_event_name($event_id); ?></h1>
	<button type="submit" class="btn btn-inverse end_event">End Event</button>
	<button type="submit" class="btn btn-inverse">Email Attendees</button>
	<div class="attendees">
		<?php
			
			$query = "SELECT uniqname FROM `attend` WHERE event_id=?";
			$stmt = $conn->prepare($query);
			$stmt->bind_param('d', 
				$event_id
				);
			$stmt->bind_result(
				$uniqname
				);
			$stmt->execute();

			//$query = "SELECT uniqname, event_id FROM attended WHERE event_id=?";
	 		while($stmt->fetch()) 
			{ 
			 	Print "".$uniqname .  " <br>";
			} 
 			$stmt->close();
		?>
	</div>
	<script src="http://code.jquery.com/jquery-latest.js"></script>
	<script src="bootstrap/js/bootstrap.min.js"></script>
	<script type="text/javascript">
		$(function() {
			$(".end_event").click(function() {

				$.ajax({
		            type: "POST",
					url: "ajax/delete_event.php",
					data: {event_id : <?php echo $event_id; ?>},
					success: function(text) {

						window.location = "nav.php";
					},
					failure: function(text) {

						alert(text);
						window.location = "nav.php";
					}
				});
			});
		});
	</script>
</body>