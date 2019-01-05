<?php
	session_start();
	
	if(!isset($_SESSION['admin'])) {
		header("Location:index.php");
	}
	// Add new stock item to the database
	$enter_sql="INSERT INTO stock (name, categoryID, price, thumbnail, bigphoto, topline, description) 
  VALUES ('".mysqli_real_escape_string($dbc, $_SESSION['addstock']['name'])."', 
  '".mysqli_real_escape_string($dbc, $_SESSION['addstock']['categoryID'])."', 
  '".mysqli_real_escape_string($dbc, $_SESSION['addstock']['price'])."', 
  '".mysqli_real_escape_string($dbc, $_SESSION['addstock']['thumbnail'])."', 
  '".mysqli_real_escape_string($dbc, $_SESSION['addstock']['thumbnail'])."',
  '".mysqli_real_escape_string($dbc, $_SESSION['addstock']['topline'])."', 
  '".mysqli_real_escape_string($dbc, $_SESSION['addstock']['description'])."')";

	$enter_query=mysqli_query($dbc, $enter_sql);
	
	// Unset the addstock session
	unset($_SESSION['addstock']);
?>
<p>New stock item has been entered</p>
<p><a href="index.php?page=admin">Back to admin</a></p>