<?php

?>
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
<link rel="stylesheet" type="text/css" href="style.css" />
<body class="slider_background">
<h2>
	Catalog
</h2>

<table class="table">
<?php

	$conn = connect_to_db_with_sqli();

	$query = "SELECT * FROM `monsters` WHERE 1 ORDER BY `votes` DESC";
	
	$stmt = $conn->prepare($query);
	$stmt->execute();
	$stmt->bind_result(
		$id,
		$name,
		$type,
		$body,
		$feature,
		$skill,
		$votes
		);

	echo "<tr><td>Name</td><td>Votes</td><td></td><td>";

	while ($stmt->fetch()) {

		echo "<tr class='creature'>
				<td>$name</td>
				<td>$type</td>
				<td width='50px'><button class='btn vote_up' up_target=$id prev_votes=$votes>
					<i class='icon-arrow-up'></i>
				</button></td>
			</tr>
			<tr class='details'>
				<td>
					$skill
				</td>
				<td>
					$body
				</td>
				<td width='50px'>
					$feature
				</td>
			</tr>";
	}

function connect_to_db_with_sqli() {
	####################################
	# Database connection information   #
	#####################################

	$hostname = "localhost";
	$database = "csescholars";
	$username = "cseschol";
	$password = "JAwNuTrJ";

	$conn = new mysqli($hostname, $username, $password, $database) or die("<p> Error connecting to database. </p>");

	return $conn;
}


?>
</table>
<script src="http://code.jquery.com/jquery-latest.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript">
	$(function() {
		$('.vote_up').click(function() {
			$.ajax({
	        		type: "POST",
			        url: "ajax/update_creature.php",
			        data: { id : $(this).attr('up_target') , prev_votes : $(this).attr('prev_votes')},
			        success: function(text) {
	       	 			
			        }
	        });
	        $(this).css('blind');
		});
		$('.details').hide();
		$('.creature').hover(function() {
			$(this).next().show();
		});
		$('.creature').mouseout(function() {
			$(this).next().hide();
		});
	});
</script>
</body>