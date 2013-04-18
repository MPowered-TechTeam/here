
<!DOCTYPE html>
<?php
	include("include/mysql_connect.php");
	include("include/functions.php");

	check_login();
	$conn = connect_to_db_with_sqli();

	if (!isset($_REQUEST['event_id'])) {

		header('Location: nav.php');
		die("ERROR: Please specify event_id. 'confirm.php?event_id='");
	}
	$event_id = $_REQUEST['event_id'];

	if (!owns_event($event_id, $_COOKIE['uniqname'])) {

		header("Location: nav.php");
	}
?>

<head>
	<title>Submit Page</title>
	<!-- Bootstrap -->
	<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
</head>
<body>
	<h1 class="event_name"><?php echo get_event_name($event_id); ?></h1>
	<button class="btn btn-inverse end_event">End Event</button>
	<button class="btn btn-inverse email_creator">Email Attendies List</button>
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

			$(".email_creator").click(function() {

				var event_name_to_send = $(".event_name").html();
				var message_body_to_send = $(".attendees").html();

				$.ajax({
		            type: "POST",
					url: "ajax/send_attendeenames.php",
					data: {event_name : event_name_to_send, message_body : message_body_to_send},
					success: function(text) {

						alert("email sent");
					},
					failure: function(text) {

						alert(text);
					}
				});
			});
		});
	</script>
</body>