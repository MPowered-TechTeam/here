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


>>>>>>> c9b27dbd2f82be3bb3f4d809094af39543a11bbc

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



