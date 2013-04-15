<!DOCTYPE html>

<?php
include("include/mysql_connect.php");

//Check if cookie isn't set
if(!isset($_COOKIE['uniqname']))
	header( 'Location: index.php');

$conn = connect_to_db_with_sqli();
//Check if user created event

$check = "SELECT * FROM attend WHERE uniqname=?";
$stmt = $conn->prepare($check);
$stmt->bind_param('s', 
  $_COOKIE['uniqname']
  );
$stmt->execute();
$stmt->store_result();
$numrows = $stmt->num_rows;
?>

<script src="http://code.jquery.com/jquery-latest.js"></script>
<script src="index_cookie.js"></script>
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
<link href="nav_style.css" rel="stylesheet" media="screen">

<div class="navbar navbar-inverse">
  <div class="navbar-inner">
    <a class="brand" href="#"><span id="uniqtext"><?php echo $_COOKIE["uniqname"]?><span></a>
    <ul class="nav pull-right">
      <li class="icon"><a href="#"><img class="logout" src="images/exit.png"></a></li>
      <li class="icon"><a id='link' href="create_event.php"><img class="plus1" src="images/plus.png"></a></li>
    </ul>
  </div>
</div>


//JASON"S STUFFFFF... I WAS ONLY TESTINGGGGG
//***********************************************
<div class = "test_table">
     <table id = "potatoes">
       <thead>
          <tr>
            <td>ID</td>
            <td>Name</td>
            <td>Creator</td>
            <td>Distance</td>
          </tr>
        </thead>
        <tb class='event_item'>
          <td>hello</td>    
          <td>my</td>  
          <td>nameis</td>
          <td>jason</td>
        </tb>
    </table>
</div>
<style>
  .test_table
  {
    border: 1px solid black;
  }
  .potatoes
  {
    width: 100%;
    height: 100px;
  }
</style>
//*************************************************

<div class="tableOfEvents">
  <table>
    <tr>
      <td>ID</td>
      <td>Name</td>
      <td>Creator</td>
      <td>Distance</td>
    </tr>
  </table>
</div>

<style>
  .tableOfEvents
  {
    margin: 0 auto;
    width: 100%;

  }


</style>

<script type="text/javascript" src="geoloc.js"></script>
<script type="text/javascript">
$(function() {

  if(<?php echo $numrows?> == 0)
  {
    $('.plus1').attr('src', 'images/about_touch.png');
    $('#link').attr('href', 'manage_event.php');
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



