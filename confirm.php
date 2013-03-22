<!DOCTYPE html>
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
			<strong>Awesome! You have signed into <?php echo $_GET["event_name"]; ?>.</strong>
		</div>
	</div>
<script src="http://code.jquery.com/jquery-latest.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
</body>