<!DOCTYPE html>

<?php
if(!isset($_COOKIE['uniqname']))
	header( 'Location: index.php');
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
      <li class="icon"><a href="create_event.php"><img class="plus1" src="images/plus.png"></a></li>
    </ul>
  </div>
</div>

<div class="tableOfEvents">
  <table>
    <tr class='event_item'>
        <td>$id</td>    
        <td>$name</td>  
        <td>$creator</td>
        <td>$distance</td>
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



<script type="text/javascript">
$(document).ready(
  function()
  {
    var ajaxCall = $.ajax("ajax/event_list.php")
    .done
    (
        function(result)
        {
            alert("success!");
            $(".tableOfEvents").append(result);
        }
    )
    .fail(function(result){alert("failed....");})
}




$(function() {
  $(".logout").click(
  	function()
  	{
  		setCookie("uniqname", "",  -1);
  		window.location = "index.php";
  	}
  );
});
</script>



