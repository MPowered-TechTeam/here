
<!DOCTYPE html>
<head>
	<title>Submit Page</title>
	<!-- Bootstrap -->
	<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
</head>
<body>
	<h1>Event Name</h1>
	<form class="login_form">
		<br />
		<button type="submit" class="btn btn-inverse">End Event</button>
		<button type="submit" class="btn btn-inverse">Email Attendees</button>
	</form>
	<div class="attendees">
		<?php
			//$query = "SELECT uniqname, event_id FROM attended WHERE event_id=?";
	 		$data = mysql_query("SELECT uniqname, event_id FROM attended WHERE event_id=?") or die(mysql_error());
	 		while($info = mysql_fetch_array( $data )) 
			 { 
			 	Print "".$info['uniqname'] .  " <br>";
			 } 
		?>
	</div>
	<script src="http://code.jquery.com/jquery-latest.js"></script>
	<script src="bootstrap/js/bootstrap.min.js"></script>
</body>