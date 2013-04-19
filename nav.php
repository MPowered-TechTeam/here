<!DOCTYPE html>

<?php
include("include/mysql_connect.php");
include("include/functions.php");

check_login();

$conn = connect_to_db_with_sqli();
//Check if user created event

$check = "SELECT id FROM event WHERE active=1 AND creator=?";
$stmt = $conn->prepare($check);
$stmt->bind_param('s', 
  $_COOKIE['uniqname']
  );
$stmt->bind_result(
  $event_id
  );
$stmt->execute();
$stmt->store_result();
$numrows = $stmt->num_rows;
$stmt->fetch();
?>

<script src="http://code.jquery.com/jquery-latest.js"></script>
<script src="index_cookie.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="bootstrap/css/bootstrap-responsive.css" rel="stylesheet">
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
<link href="nav_style.css" rel="stylesheet" media="screen">
<style type="text/css">


  /* Landscape phone to portrait tablet */
  @media (max-width: 767px) { 

  }
   
  /* Landscape phones and down */
  @media (max-width: 480px) { 
    #uniqtext
    {
      color: #FFF;
      font-size: 1.5em;
      vertical-align: middle;
      text-shadow: none;
    }
    .logout
    {
      margin-right: 0em;
      margin-left: 0em;
      height: 2em;
      width: 2em;
    }

    .plus1
    {
      margin-left: 0em;
      margin-right: 0em;
      height: 2em;
      width: 2em;
    }

    .instructions {
      font-size: 2em;
      text-align: center;
    }
  }
</style>

<div class="navbar navbar-inverse">
  <div class="navbar-inner">
    <a class="brand" href="#"><span id="uniqtext"><?php echo $_COOKIE["uniqname"]?><span></a>
    <ul class="nav pull-right">
      <li class="icon"><a href="#"><img class="logout" src="images/exit.png"></a></li>
      <li class="icon"><a id='link' href="create_event.php"><img class="plus1" src="images/plus.png"></a></li>
    </ul>
  </div>
</div>
<div class="instructions">
  Click Event To Sign-In
</div>
<br />
<div class="tableOfEvents">
  <table>
    <!--<tr>
      <td>ID</td>
      <td>Name</td>
      <td>Creator</td>
      <td>Distance</td>
    </tr>-->
  </table>
</div>

<script type="text/javascript" src="geoloc.js"></script>
<script type="text/javascript">
$(function() {

  if(<?php echo $numrows?> > 0)
  {
    $('.plus1').attr('src', 'images/about.png');
    $('#link').attr('href', 'manage_event.php?event_id=<?php echo $event_id; ?>');
  }

  $(".logout").click(
  	function()
  	{
  		setCookie("uniqname", "",  -1);
  		window.location = "index.php";
  	}
  );

  $(".tableOfEvents").on("click", ".event_item", function() {

    var event_id = $(this).find('.event_id').html();
    window.location = "confirm.php?event_id=" + event_id;
  });
});
</script>



