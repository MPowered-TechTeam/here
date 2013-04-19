
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
	<title>Manage Event</title>
	<!-- Bootstrap -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="bootstrap/css/bootstrap-responsive.css" rel="stylesheet">
	<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
	<link href="nav_style.css" rel="stylesheet" media="screen">
	<style type="text/css">

	.input-append button {
		width: 5em;
	}

    /* Landscape phone to portrait tablet */
    @media (max-width: 767px) { 

    }
     
    /* Landscape phones and down */
    @media (max-width: 480px) {
	    
	    h1 {
			margin: 0 auto;
			text-align: center;
			margin-top: 150px;
			margin-bottom: 25px;
			line-height: 72px;
			font-size: 72px;
			vertical-align: center;
		}

		.manage_event_form > button {
			width: 40%;
			height: 5em;
		}

    }
	</style>
</head>
<body>
	<h1 class="event_name"><?php echo get_event_name($event_id); ?></h1>
	<div class="manage_event_form">
		<button type="submit" class="btn btn-inverse end_event">End Event</button>
		<button type="submit" class="btn btn-inverse email_creator">Email Attendies List</button>
		<div class="attendees">
			<table class="table">
				<tr>
					<th>
						<div class="input-append">
							<input class="uniqname" id="uniqname" type="text" placeholder="Uniqname">
							<button class="btn btn-inverse sign-in" type="button">Sign-in</button>
						</div>
						<br />
						<span class='sign_in_list_title'>Sign-In List</span>
					</th>
				</tr>
				<tbody class='attendies_list'>
				<?php
					
					get_attendies($event_id);
				?>
				</tbody>
			</table>
		</div>
	</div>
	<script src="http://code.jquery.com/jquery-latest.js"></script>
	<script src="bootstrap/js/bootstrap.min.js"></script>
	<script type="text/javascript">
		$(function() {

			$(".end_event").click(function() {

				$(this).attr('disabled','disabled');

				$.ajax({
		            type: "POST",
					url: "ajax/delete_event.php",
					data: {event_id : <?php echo $event_id; ?>},
					success: function(text) {

						window.location = "nav.php";
						$(".end_event").removeAttr('disabled');
					},
					failure: function(text) {

						alert(text);
						window.location = "nav.php";
						$(".end_event").removeAttr('disabled');
					}
				});
			});

			$(".email_creator").click(function() {

				var event_name_to_send = $(".event_name").html();
				var message_body_to_send = $(".attendies_list").html();

				$(this).attr('disabled','disabled');
				$(".email_creator").popover('destroy');

				$.ajax({
		            type: "POST",
					url: "ajax/send_attendeenames.php",
					data: {event_name : event_name_to_send, message : message_body_to_send},
					success: function(text) {

						$(".email_creator").removeAttr('disabled');
						$(".email_creator").popover({
							content: "<div style='text-align: center;'>Email sent.</div>",
							trigger: "manual",
							placement: "bottom"
						});
						$(".email_creator").popover('show');
						setInterval(function() {

							$(".email_creator").popover('hide');
						}, 5000);
					},
					failure: function(text) {

						$(".email_creator").removeAttr('disabled');
						$(".email_creator").popover({
							content: "<div style='text-align: center;'>" + text + "</div>",
							trigger: "manual",
							placement: "bottom"
						});
						$(".email_creator").popover('show');
						setInterval(function() {

							$(".email_creator").popover('hide');
						}, 5000);
					}
				});
			});

			var in_event_id;

			$(".sign-in").click(function() {

				in_event_id = <?php echo $event_id; ?>;
				var in_uniqname = $('#uniqname').val();

				if (in_uniqname == '')
					return;

				$(this).attr('disabled','disabled');
				$(".sign_in_list_title").popover('destroy');

				$.ajax({
					type: "POST",
					url: "ajax/add_uniqname.php",
					data: {event_id : in_event_id, uniqname : in_uniqname},
					success: function(text) {

						$(".sign_in_list_title").popover({
							content: "<div style='text-align: center;'>" + text + "</div>",
							trigger: "manual",
							placement: "bottom"
						});
						$(".sign_in_list_title").popover('show');
						setInterval(function() {

							$(".sign_in_list_title").popover('hide');
						}, 5000);

						$("#uniqname").val('');

						$.ajax({
							type: "POST",
							url: "ajax/get_attendies.php",
							data: {event_id : in_event_id},
							success: function(text) {

								$(".attendies_list").html(text);
								$(".sign-in").removeAttr('disabled');
							},
							failure: function(text) {

								alert("Unable to update table.");
								$(".sign-in").removeAttr('disabled');
							}
						});
					},
					failure: function(text) {

						alert(text);
						$(".sign-in").removeAttr('disabled');
					}
				})
			})
		});
	</script>
</body>